<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-gray-800">Dashboard Staff</h2>
             <a href="{{ route('welcome') }}">
                <div class="mask mask-circle w-10 h-10 bg-accent hover:opacity-80 transition">
                    <img src="{{ asset('images/profile.png') }}" alt="Logo" class="w-full h-full p-1 object-cover">
                </div>
            </a>

        </div>
    </x-slot>

    <div class="py-10 p-10">
        <div class="max-w-6xl mx-auto space-y-6">

            <!-- Ringkasan Data -->
            <div class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-3 gap-6">
                <x-dashboard-card
                    title="Total Barang"
                    :value="$totalBarang"
                    description="Data Barang Aktif saat ini."
                    icon="server"

                />
           

                <x-dashboard-card
                    title="Stock Menipis"
                    :value="$stokMinimum"
                    color="emerald-900"
                    description="Barang yang akan habis dalam waktu dekat."
                    icon="box"
                />
                <div class="card bg-base-100 shadow border transition delay-150 duration-300 ease-in-out hover:-translate-y-1 hover:scale-110 hover:bg-accent hover:text-emerald-900">
                    <div class="card-body">
                        <i data-feather="trello"></i>
                        <h2 class="card-title">Riwayat Tambah Stok</h2>
                        <div class="text-sm text-gray-500 overflow-y-auto max-h-40 pr-2">
                            {{-- @forelse ($Histories as $history)
                                <hr class="my-1">
                                <div class="mb-2">
                                    <strong>Nama:</strong> {{ $history->barang->name }} <br>
                                    <strong>Jumlah Stock:</strong> {{ $history->jumlah }} <br>
                                    <strong>Ditambahkan Oleh:</strong> {{ $history->user->name }} <br>
                                    <strong>Tanggal:</strong> {{ $history->created_at->format('d M Y H:i') }}
                                </div>
                            @empty
                                <p>Tidak ada riwayat.</p>
                            @endforelse --}}
                            <a href="{{ route('user.barang.restockHistory') }}" class="btn btn-sm btn-primary">Lihat Riwayat</a>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabel Barang -->
            <div class="card bg-base-100 shadow border mt-6 mb-50">
                <div class="card-body">
                    <h2 class="card-title">Dashboard</h2>

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table id="search-table" class="table table-zebra w-full">
                            <thead>
                                <tr class="bg-base-200">
                                    <th>
                                        <span class="flex items-center">
                                            ID
                                        </span>
                                    </th>
                                    <th>
                                        <span class="flex items-center">
                                            Nama Barang
                                        </span>
                                    </th>
                                    <th>
                                        <span class="flex items-center">
                                            Kategori
                                        </span>
                                    </th>
                                    <th>
                                        <span class="flex items-center">
                                            Stok
                                        </span>
                                    </th>
                                    <th>
                                        <span class="flex items-center">
                                               Harga
                                        </span>
                                    </th>
                                    <th>
                                        <span class="flex items-center">
                                               Created By
                                        </span>
                                    </th>
                                    <th>
                                        <span class="flex items-center">
                                               Description
                                        </span>
                                    </th>
                                    <th>
                                        <span class="flex items-center">
                                               
                                        </span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                  @foreach ($barangs as $barang)
                                        <tr>
                                            <td class="whitespace-nowrap">{{ $barang->id }}</td>
                                            <td>{{ $barang->name }}</td>
                                            <td>{{ $barang->category->name }}</td>
                                            <td>{{ $barang->quantity }}</td>
                                            <td>Rp {{ number_format($barang->price, 2, ',', '.') }}</td>
                                            <td>id {{ $barang->supplier->created_by }}</td>
                                            <td>{{ $barang->description }}</td>
                                            <td class="flex gap-2">
                                                <a href="{{ route('user.barang.restock', $barang->id) }}" class="btn btn-sm btn-success"> <i data-feather="plus"></i>Add Stock</a>
                                            </td>
                                        </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            setTimeout(function () {
                let alert = document.getElementById('success-alert');
                if (alert) {
                    alert.remove(); 
                }
            }, 3000); 

            feather.replace();
        </script>
    @endpush
</x-app-layout>
