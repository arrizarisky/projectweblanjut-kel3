<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Barang') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-base-200 shadow-md rounded p-6">
                <form action="{{ route('admin.barang.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="label">Nama Barang</label>
                        <input type="text" name="name" class="input input-bordered w-full" required>
                    </div>

                    <div class="mb-4">
                        <label class="label">Kategori</label>
                        <select name="category_id" class="select select-bordered w-full">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="label">Supplier</label>
                        <select name="supplier_id" class="select select-bordered w-full">
                            @foreach ($suppliers as $supplier)
                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="label">Harga</label>
                        <input type="number" name="price" step="0.01" class="input input-bordered w-full" required>
                    </div>

                    <div class="mb-4">
                        <label class="label">Jumlah</label>
                        <input type="number" name="quantity" class="input input-bordered w-full" required>
                    </div>

                    <div class="mb-4">
                        <label class="label">Deskripsi</label>
                        <textarea name="description" class="textarea textarea-bordered w-full"></textarea>
                    </div>

                    <div class="mt-6">
                        <button class="btn btn-primary">Simpan</button>
                        <a href="{{ route('admin.barang.index') }}" class="btn btn-secondary ml-2">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>