<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Barang') }}
        </h2>
    </x-slot>
    <div class="container mx-auto px-4 pt-3 sm:px-6 lg:px-8">
        @if (session('success'))
        <div id="success-alert" role="alert" class="alert alert-success">
             <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
             </svg>
             <span>  {{ session('success') }} </span>
         </div>
        @endif
    </div>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end mb-4">
                <a href="{{ route('admin.barang.create') }}" class="btn btn-primary"><i data-feather="plus"></i>Tambah Barang</a>
            </div>
            <div class="bg-base-200 shadow-sm sm:rounded-lg p-6 ">
                <table class="table w-full">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Supplier</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>
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
                                <td class="flex gap-2">
                                    <a href="{{ route('admin.barang.edit', $barang->id) }}" class="btn btn-sm btn-warning "><i data-feather="edit"></i></a>
                                    <form action="{{ route('admin.barang.destroy', $barang->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-error"><i data-feather="trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                        <a href="{{ route('export.barang.pdf') }}" class="btn btn-outline btn-error">Download PDF</a>
                        <a href="{{ route('export.barang.excel') }}" class="btn btn-success">Download Excel</a>
            </div>
        </div>
    </div>
    @push('scripts')
    <script>
        setTimeout(function () {
            let alert = document.getElementById('success-alert');
            if (alert) {
                alert.remove(); // atau gunakan alert.classList.add('hidden');
            }
        }, 3000); 
    
    feather.replace();

    </script>
    @endpush
</x-app-layout>
