<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Product;
use App\Models\Province;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class OrderController extends Controller
{
    private $apiKey = '57a8d5402fd6c08dbb10a18e5e595e65';
    public $provinsi_id, $kota_id, $jasa, $daftarProvinsi, $daftarkota;

    public function store(Request $request)
    {
        // $toko = User::where('role', 'admin')->first();
        // // dd($toko);
        // $response = Http::withHeaders([
        //     'key' => '57a8d5402fd6c08dbb10a18e5e595e65'
        // ])->get('https://api.rajaongkir.com/starter/city');
        // $cities = $response['rajaongkir']['results'];

        // $responseCost = Http::withHeaders([
        //     'key' => '57a8d5402fd6c08dbb10a18e5e595e65'
        // ])->get('	https://api.rajaongkir.com/starter/cost', [
        //     // 'origin'=> $request->
        // ]);
        // $cities = City::get();
        $rajaOngkir = new RajaOngkir($this->apiKey);
        $this->daftarProvinsi = RajaOngkir::kota()->all();
        // dd($this->daftarProvinsi);
        // $this->provinsi_id = 3;
        // if ($this->provinsi_id) {
        //     $this->daftarkota = RajaOngkir::kota()->dariProvinsi($this->provinsi_id)->get();
        //     // dd($this->daftarkota);
        // }

        // dd($response->json());
        $id_produk = $request->product_id;
        $jumlah = $request->quntity;
        if ($jumlah < 1) {
            return redirect()->back()->with('gagal', 'Jumlah Pesanan Tidak Boleh Kosong');
        }
        $produk = Product::where('id', $id_produk)->first();
        $user = User::where('id', auth()->id())->first();
        if ($produk->dis_status == 1) {
            $harga = $produk->price - $produk->discount;
        } else {
            $harga = $produk->price;
        }
        $total = $harga * $jumlah;
        // dd($user);
        return view('frontend.order', [
            'produk' => $produk,
            'jumlah'    => $jumlah,
            'harga' => $harga,
            'total' => $total,
            'user' => $user,
            'cities' =>  RajaOngkir::kota()->all(),
        ]);
    }
}
