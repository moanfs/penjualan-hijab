<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class DownloadController extends Controller
{
    public function produk()
    {
        $data = Product::get();
        // dd($data);
        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();
        // Header
        $activeWorksheet->setCellValue('A1', 'Nama');
        $activeWorksheet->setCellValue('B1', 'Harga');
        $activeWorksheet->setCellValue('C1', 'Diskon');
        $activeWorksheet->setCellValue('C1', 'Jumlah');

        $data = Product::get(['nama', 'price', 'discount', 'amount']);
        $activeWorksheet->fromArray([$data]);
        $writer = new Xlsx($spreadsheet);
        // $writer->save('hello world.xlsx');
        $filename = 'data_produk.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . urlencode($filename) . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
