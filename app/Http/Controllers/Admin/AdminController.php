<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Category;
use App\Models\Supplier;


class AdminController extends Controller
{
     public function index() 
    {
        $totalBarang = Barang::count();
        $totalKategori = Category::count();
        $totalSupplier = Supplier::count();
        $totalStok = Barang::sum('quantity');
        $stokMinimum = Barang::where('quantity', '<=', 5)->count(); 

        $barangs = Barang::with(['category', 'supplier'])->latest()->take(5)->get(); // ringkasan

        return view('admin.dashboard', compact(
            'totalBarang',
            'totalKategori',
            'totalSupplier',
            'totalStok',
            'stokMinimum',
            'barangs'
        ));
    }
}
