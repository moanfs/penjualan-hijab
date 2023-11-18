<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class DownloadController extends Controller
{
    public function produk()
    {
        $data = Product::all();
        // dd($data);
        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();
        // Header
        $activeWorksheet->setCellValue('A1', 'Nama');
        $activeWorksheet->setCellValue('B1', 'Harga');
        $activeWorksheet->setCellValue('C1', 'Diskon');
        $activeWorksheet->setCellValue('D1', 'Jumlah');

        $row = 2;
        foreach ($data as $produk) {
            $activeWorksheet->setCellValue('A' . $row, $produk->nama);
            $activeWorksheet->setCellValue('B' . $row, $produk->price);
            $activeWorksheet->setCellValue('C' . $row, $produk->discount);
            $activeWorksheet->setCellValue('D' . $row, $produk->amount);
            $row++;
        }

        // Buat response
        $response = response()->stream(
            function () use ($spreadsheet) {
                $writer = new Xlsx($spreadsheet);
                $writer->save('php://output');
            },
            200,
            [
                'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'Content-Disposition' => 'attachment; filename="dataproduk.xlsx"',
            ]
        );

        return $response;
    }
    public function penjualan()
    {
        $data = Order::join('products', 'products.id', '=', 'orders.product_id')
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->whereNot('orders.status', 0)
            ->get(['users.name as username', 'orders.totalselurh', 'orders.nama_jasa', 'orders.status_pay', 'products.nama as namaproduk', 'orders.amount as jumlahpesan'])->all();
        // dd($data);
        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();
        // Header
        $activeWorksheet->setCellValue('A1', 'Nama Pembeli');
        $activeWorksheet->setCellValue('B1', 'Nama Produk');
        $activeWorksheet->setCellValue('C1', 'Jumlah Pesanan');
        $activeWorksheet->setCellValue('D1', 'Total Pembayaran');
        $activeWorksheet->setCellValue('E1', 'Status Pembayaran');
        $activeWorksheet->setCellValue('F1', 'Kurir');


        $row = 2;
        foreach ($data as $produk) {
            $activeWorksheet->setCellValue('A' . $row, $produk->username);
            $activeWorksheet->setCellValue('B' . $row, $produk->namaproduk);
            $activeWorksheet->setCellValue('C' . $row, $produk->jumlahpesan);
            $activeWorksheet->setCellValue('D' . $row, $produk->totalselurh);
            $activeWorksheet->setCellValue('E' . $row, $produk->status_pay);
            $activeWorksheet->setCellValue('F' . $row, $produk->nama_jasa);

            $row++;
        }

        // Buat response
        $response = response()->stream(
            function () use ($spreadsheet) {
                $writer = new Xlsx($spreadsheet);
                $writer->save('php://output');
            },
            200,
            [
                'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'Content-Disposition' => 'attachment; filename="data_penjualan.xlsx"',
            ]
        );

        return $response;
    }

    public function users()
    {
        $data = User::all();
        // dd($data);
        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();
        // Header
        $activeWorksheet->setCellValue('A1', 'Nama');
        $activeWorksheet->setCellValue('B1', 'Email');
        $activeWorksheet->setCellValue('C1', 'Alamat');
        $activeWorksheet->setCellValue('D1', 'Kota');

        $row = 2;
        foreach ($data as $user) {
            $activeWorksheet->setCellValue('A' . $row, $user->name);
            $activeWorksheet->setCellValue('B' . $row, $user->email);
            $activeWorksheet->setCellValue('C' . $row, $user->address);
            $activeWorksheet->setCellValue('D' . $row, $user->city);
            $row++;
        }

        // Buat response
        $response = response()->stream(
            function () use ($spreadsheet) {
                $writer = new Xlsx($spreadsheet);
                $writer->save('php://output');
            },
            200,
            [
                'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'Content-Disposition' => 'attachment; filename="datauser.xlsx"',
            ]
        );

        return $response;
    }

    public function pesanan()
    {
        $data = Order::join('products', 'products.id', '=', 'orders.product_id')
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->get(['users.name as username', 'orders.totalselurh', 'orders.nama_jasa', 'orders.resi', 'orders.status_pay', 'products.nama as namaproduk', 'orders.amount as jumlahpesan'])->all();
        // dd($data);
        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();
        // Header
        $activeWorksheet->setCellValue('A1', 'Nama Pembeli');
        $activeWorksheet->setCellValue('B1', 'Nama Produk');
        $activeWorksheet->setCellValue('C1', 'Jumlah Pesanan');
        $activeWorksheet->setCellValue('D1', 'Total Pembayaran');
        $activeWorksheet->setCellValue('E1', 'Status Pembayaran');
        $activeWorksheet->setCellValue('F1', 'Kurir');
        $activeWorksheet->setCellValue('F1', 'Resi');


        $row = 2;
        foreach ($data as $produk) {
            $activeWorksheet->setCellValue('A' . $row, $produk->username);
            $activeWorksheet->setCellValue('B' . $row, $produk->namaproduk);
            $activeWorksheet->setCellValue('C' . $row, $produk->jumlahpesan);
            $activeWorksheet->setCellValue('D' . $row, $produk->totalselurh);
            $activeWorksheet->setCellValue('E' . $row, $produk->status_pay);
            $activeWorksheet->setCellValue('F' . $row, $produk->nama_jasa);
            $activeWorksheet->setCellValue('F' . $row, $produk->resi);

            $row++;
        }

        // Buat response
        $response = response()->stream(
            function () use ($spreadsheet) {
                $writer = new Xlsx($spreadsheet);
                $writer->save('php://output');
            },
            200,
            [
                'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'Content-Disposition' => 'attachment; filename="datapesanan.xlsx"',
            ]
        );

        return $response;
    }
}
