<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuppliersController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::latest()->get();
        return view('admin.supplier.index', compact('suppliers'));
    }

    public function create()
    {
        return view('admin.supplier.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:suppliers,name',
            'contact_info' => 'nullable|string|max:200',
        ]);

        Supplier::create([
            'name' => $request->name,
            'contact_info' => $request->contact_info,
            'created_by' => Auth::id(), 
        ]);

        return redirect()->route('admin.supplier.index')->with('success', 'Supplier berhasil ditambahkan');
    }

    public function edit(Supplier $supplier)
    {
        return view('admin.supplier.edit', compact('supplier'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:suppliers,name,' . $supplier->id,
            'contact_info' => 'nullable|string|max:200',
        ]);

        $supplier->update([
            'name' => $request->name,
            'contact_info' => $request->contact_info,
        ]);

        return redirect()->route('admin.supplier.index')->with('success', 'Supplier berhasil diperbarui');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route('admin.supplier.index')->with('success', 'Supplier berhasil dihapus');
    }
}
