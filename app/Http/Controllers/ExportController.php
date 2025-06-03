<?php
namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BarangExport;

class ExportController extends Controller
{
    public function exportPDF()
    {
        $barang = Barang::all();
        $pdf = Pdf::loadView('exports.barang_pdf', compact('barang'));
        return $pdf->download('data-barang.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new BarangExport, 'data-barang.xlsx');
    }
}
