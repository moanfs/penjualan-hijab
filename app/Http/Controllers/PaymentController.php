<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Veritrans\Veritrans;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
// use Kavist\RajaOngkir\Facades\RajaOngkir;
use Kavist\RajaOngkir\RajaOngkir;

class PaymentController extends Controller
{
    // private $apiKey = '9f4cbb907415618801c626dd68723d41';

    // untuk cek ongkos kirim
    public function cekongkir(Request $request)
    {
        // dd($cartid);
        $rajaOngkir = new RajaOngkir(env('RAJAONGKIR_API_KEY'));
        // dd($rajaOngkir);
        $daftarProvinsi = $rajaOngkir->ongkosKirim([
            'origin'        => 155,     // ID kota/kabupaten asal
            'destination'   => $request->destination,      // ID kota/kabupaten tujuan
            'weight'        => $request->weight,    // berat barang dalam gram
            'courier'       => $request->courier    // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
        ]);
        $produkid = $request->produk;

        $result = $daftarProvinsi->get();
        // dd($result);
        // nama jasa
        $nama_jasa = $result[0]['name'];
        // dd($nama_jasa);
        $service = $result[0]['costs'][0]['service'];
        // dd($service);
        foreach ($result[0]['costs'] as $jenis) {
            $layanan[] = array(
                $description = $jenis['description'],
                $service = $jenis['service'],
            );
        }
        // dd($layanan);
        foreach ($result[0]['costs'] as $row) {
            $hasil[] = array(
                'destination' => $request->destination,
                'biaya'        => $row['cost'][0]['value'],
                'etd'        => $row['cost'][0]['etd'],
            );
        }
        // dd($hasil);
        //hapus cart jika produk dari cart
        if (!empty($request->cartid)) {
            $cart = Carts::where('id', $request->cartid);
            $cart->delete();
        }

        $this->validate($request, [
            'amount' => 'required',
            'destination' => 'required',
            'address' => 'required'
        ]);

        $order = Order::create([
            'product_id'    => $request->produk,
            'user_id'    => auth()->id(),
            'amount'    => $request->amount,
            'city'      => $request->destination,
            'address' => $request->address,

        ]);

        $idorder = $order->id;
        // dd($idorder);
        return view('frontend.cekogkir', compact('hasil', 'nama_jasa', 'idorder', 'produkid'));
    }
    public function checkout(Request $request)
    {

        $user = User::where('id', auth()->id())->first();
        $order = Order::where('id', $request->idorder)->first();

        $produk = Order::join('products', 'products.id', '=', 'orders.product_id')
            ->where('products.id', $request->produkid)
            ->first();
        $jumlahdibeli = Order::where('orders.id', $request->idorder)->first();
        // dd($jumlahdibeli);
        if ($produk->dis_status == 1) {
            $harga = $produk->price - $produk->discount;
        } else {
            $harga = $produk->price;
        }
        $biayaongkir = $request->biayaongkir;
        // dd($harga);
        $totalsamaongkir = $harga + $request->biayaongkir;
        // dd($totalsamaongkir);
        // dd($produk);

        $order->update([
            'nama_jasa' => $request->namajasa,
            'totalselurh' => $totalsamaongkir,
            'ongkir'    => $request->biayaongkir,
            'etd'    => $request->estimasi
            // 'status'    => 1
        ]);

        return view('frontend.checkout', compact('produk', 'user', 'totalsamaongkir', 'harga', 'jumlahdibeli', 'biayaongkir'));
    }

    public function pesan(Request $request)
    {

        $updateProduk = Product::where('id', $request->idproduk)->first();
        $dibeli = Order::where('id', $request->idorder)->first();

        $karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
        $shuffle  = substr(str_shuffle($karakter), 0, 16);
        if ($request->nama_bank == 'bca') {
            $kode_pay = 4830495393;
        } else {
            $kode_pay = 1770006248352;
        }
        $kode_pay = rand();
        $dibeli->update([
            'resi' => $shuffle,
            'status_pay' => 'Unpaid',
            'nama_bank' => $request->nama_bank,
            'kode_pay'  => $kode_pay,
            'status'    => 1
        ]);

        $updateProduk->update([
            'amount' => $updateProduk->amount -= $dibeli->amount
        ]);

        return view('frontend.kodepembayaran', [
            'kodepay' => $kode_pay,
            'nama_bank' => $request->nama_bank
        ]);
    }

    public function daftartransaksi()
    {

        // dd($daftar);
        return view('frontend.daftartransaksi', [
            'daftar' => Order::join('products', 'products.id', '=', 'orders.product_id')
                ->where('user_id', auth()->id())
                ->get(['products.nama', 'orders.*']),
        ]);
    }

    public function selesai(Request $request)
    {
        $order = Order::where('id', $request->id)->first();

        $this->validate($request, [
            'bukti'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $bukti = $request->file('bukti');
        $bukti->storeAs('public/bukti', $bukti->hashName());

        $order->update([
            'status' => 2,
            'status_pay' => 'Paid',
            'bukti' => $bukti->hashName()
        ]);
        return redirect()->back()->with('success', 'Bukti Pembayaran Berhasil Diupload');
    }

    public function bayarulang(Request $request)
    {
        $order = Order::where('id', $request->id)->first();
        $this->validate($request, [
            'bukti'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $bukti = $request->file('bukti');
        $bukti->storeAs('public/bukti', $bukti->hashName());

        Storage::delete('public/bukti/' . $order->bukti);

        $order->update([
            'konfimasiadmin' => 'ulang',
            'bukti' => $bukti->hashName()
        ]);
        return redirect()->back()->with('success', 'Bukti Pembayaran Berhasil Diupload');
    }
}
