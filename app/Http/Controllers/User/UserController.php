<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Barang;
use App\Models\RestockHistories;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request) 
    {
        
        $totalBarang = Barang::count();
        $totalKategori = Category::count();
        $totalSupplier = Supplier::count();
        $totalStok = Barang::sum('quantity');
        $stokMinimum = Barang::where('quantity', '<=', 5)->count(); 
        
        $barangs = Barang::with(['category', 'supplier'])->latest()->take(5)->get();
        
        // Ambil history restock milik user yang login
        // $Histories = RestockHistories::with('barang', 'user')
        // ->where('user_id', auth()->id())
        // ->latest()
        // ->take(3) // misalnya hanya tampilkan 5 terakhir
        // ->get();
        

        return view('dashboard', compact(
            'barangs',
            'totalBarang',
            'totalKategori',
            'totalSupplier',
            'totalStok',
            'stokMinimum',
            // 'Histories',
        ));

    }

   
}
