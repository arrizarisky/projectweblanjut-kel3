<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Category;
use App\Models\RestockHistories;
use App\Models\Supplier;
use App\Models\RestockNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{

    public function getAll() 
    {
        $barangs = Barang::with(['category', 'supplier'])->latest()->get();
        return response()->json($barangs);
    }
    public function index()
    {
        $barangs = Barang::with(['category', 'supplier'])->latest()->get();
        $unreadRestocks = \App\Models\RestockNotification::where('is_read', false)->count();

        if (auth()->user()->usertype === 'admin') {
            return view('admin.barang.index', compact('barangs', 'unreadRestocks'));
        } else {
            return view('user.barang.index', compact('barangs'));
        }
    }

    public function create()
    {
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('admin.barang.create', compact('categories', 'suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
        ]);

        Barang::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
            'supplier_id' => $request->supplier_id,
            'created_by' => Auth::id(),
        ]);

        return redirect()->route('admin.barang.index')->with('success', 'Barang berhasil ditambahkan');
    }

    public function edit(Barang $barang)
    {
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('admin.barang.edit', compact('barang', 'categories', 'suppliers'));
    }

    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'name' => 'required|max:100',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
        ]);

        $barang->update($request->all());

        return redirect()->route('admin.barang.index')->with('success', 'Barang berhasil diperbarui');
    }

    public function destroy(Barang $barang)
    {
        $barang->delete();
        return redirect()->route('admin.barang.index')->with('success', 'Barang berhasil dihapus');
    }

    public function restockForm(Barang $barang)
    {
        return view('user.barang.restock', compact('barang'));
    }

    public function restock(Request $request, Barang $barang)
    {
        $request->validate([
            'stok' => 'required|integer|min:1',
        ]);

        $barang->increment('quantity', $request->stok);

        // Create a new restock history entry
        RestockHistories::create([
        'user_id' => auth()->id(),
        'barang_id' => $barang->id,
        'jumlah' => $request->stok,
        ]);

        RestockNotification::create([
            'barang_id' => $barang->id,
            'user_id' => Auth::id(),
            'is_read' => false,
        ]);


        return redirect()->route('dashboard')->with('success', 'Stok barang berhasil diperbarui');
    }

    public function restockHistory()
    {
        \App\Models\RestockNotification::where('is_read', false)->update(['is_read' => true]);
        $histories = RestockHistories::with(['user', 'barang'])->latest()->get();
      
        return view('admin.barang.restockHistory', compact('histories'));
    }
    public function restockHistoryUser()
    {
        $histories = RestockHistories::with(['user', 'barang'])
            ->where('user_id', auth()->id())
            ->latest()
            ->get();
        return view('user.barang.restockHistory', compact('histories'));
    }

     public function stock(Request $request) 
    {
        $barangs = Barang::with(['category', 'supplier'])->latest()->get();
        $totalStok = Barang::sum('quantity');
        return view('user.barang.stock', compact('barangs', 'totalStok'));
    }

    public function stockIndex()
    {
        // Tandai semua notifikasi sebagai sudah dibaca
        RestockNotification::where('is_read', false)->update(['is_read' => true]);

        $barangs = Barang::with('category')->get();
        return view('admin.barang.stock', compact('barangs'));
    }
    
}
