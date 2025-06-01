<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between ">
            <h2 class="text-2xl font-bold text-gray-800 ">
                {{ __('Dashboard Inventaris') }}
            </h2>
            <div class="mask mask-circle w-10 h-10 bg-accent hover:opacity-80 transition hover:rotate-45">
                <img src="{{ asset('images/profile.png') }}" alt="Logo" class="w-full h-full p-1 object-cover">
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Card: Welcome -->
            <div class="card bg-gray-800 shadow-md border mb-5 border-gray-100">
                <div class="card-body">
                    <h2 class="card-title">Selamat Datang 🎉</h2>
                    <p class="text-gray-700">Halo, <span class="font-semibold">{{ Auth::user()->name }}</span>!</p>
                    <p class="text-sm text-gray-500">Kamu masuk sebagai <strong>{{ Auth::user()->usertype }}</strong>.</p>
                </div>
            </div>
            <div class="grid grid-cols-3 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- Card: Statistics -->
                    <x-dashboard-card 
                        title="Total Barang" 
                        :value="$totalBarang" 
                        description="Jumlah total barang yang tercatat dalam sistem." 
                        icon="database"
                    />

                    <x-dashboard-card 
                        title="Stok Minimum" 
                        :value="$stokMinimum" 
                        description="Barang yang stoknya di bawah minimum." 
                        color="red-500"
                        icon="server"
                    />

                    <x-dashboard-card 
                        title="Total Supplier" 
                        :value="$totalSupplier" 
                        description="Jumlah supplier yang terdaftar dalam sistem." 
                        icon="user"
                    />
                    <x-dashboard-card 
                        title="Total Stock" 
                        :value="$totalStok" 
                        description="Jumlah stok keseluruhan barang." 
                        icon="layers"
                    />
                    <x-dashboard-card 
                        title="Total Kategori" 
                        :value="$totalKategori"
                        description="Jumlah kategori barang yang terdaftar." 
                        icon="grid"

                    />
                
            </div>    

            <!-- Table Placeholder -->
            <div class="card bg-base-100 mt-6 shadow border mb-40">
                <div class="card-body">
                    <h2 class="card-title">Data Barang</h2>
                    <p class="text-sm text-gray-500 mb-2">Berikut adalah daftar barang yang terdaftar dalam sistem.</p>
                    <div class="overflow-x-auto mt-4">
                        <table id="search-table" class="table table-zebra w-full text-sm">
                            <thead>
                                <tr class="bg-base-200">
                                    <th>ID</th>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Stok</th>
                                    <th>Price</th>
                                    <th>Created By</th>
                                    <th>Description</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach ($barangs as $barang)
                                <tr>
                                    <td>{{ $barang->id }}</td>
                                    <td>{{ $barang->name }}</td>
                                    <td>{{ $barang->category->name }}</td>
                                    <td>{{ $barang->quantity }}</td>
                                    <td>Rp {{ number_format($barang->price, 2, ',', '.') }}</td>
                                    <td>id {{ $barang->supplier->created_by }}</td>
                                    <td>{{ $barang->description }}</td>
                                    <td class="flex gap-2">
                                        <a href="{{ route('admin.barang.edit', $barang->id) }}" class="btn btn-sm btn-warning"><i data-feather="edit"></i></a>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
 
</x-app-layout>
