<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Tambah Stok Barang</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-2xl mx-auto bg-base-200 p-6 rounded shadow">
            <form action="{{ route('user.barang.restock.store', $barang->id) }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="label">Nama Barang</label>
                    <input type="text" class="input input-bordered w-full" value="{{ $barang->name }}" disabled>
                </div>

                <div class="mb-4">
                    <label class="label">Stok Saat Ini</label>
                    <input type="text" class="input input-bordered w-full" value="{{ $barang->quantity }}" disabled>
                </div>

                <div class="mb-4">
                    <label class="label">Tambah Stok</label>
                    <input type="number" name="stok" class="input input-bordered w-full" required min="1">
                </div>

                <button class="btn btn-success">Simpan</button>
                <a href="{{ route('dashboard') }}" class="btn btn-secondary ml-2">Batal</a>
            </form>
        </div>
    </div>
</x-app-layout>
