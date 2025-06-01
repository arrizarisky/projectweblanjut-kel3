<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Barang') }}
        </h2>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-x-auto bg-base-200 shadow-sm sm:rounded-lg p-6">
                <table id="search-table" class="table table-zebra w-full">
                    <thead>
                        <tr class="bg-base-200">
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Supplier</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barangs as $barang)
                            <tr>
                                <td>{{ $barang->name }}</td>
                                <td>{{ $barang->category->name }}</td>
                                <td>{{ $barang->supplier->name }}</td>
                                <td>Rp {{ number_format($barang->price, 2, ',', '.') }}</td>
                                <td>{{ $barang->quantity }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
