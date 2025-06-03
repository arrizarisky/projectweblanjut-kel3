<?php

namespace App\Exports;

use App\Models\Barang;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BarangExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Barang::select('id', 'name', 'description', 'price', 'quantity', 'created_at')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Barang',
            'Deskripsi',
            'Harga Satuan',
            'Jumlah',
            'Tanggal Dibuat',
        ];
    }
}
