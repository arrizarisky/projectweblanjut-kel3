<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Kategori') }}
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
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-base-200 p-6 rounded shadow-md">
                <div class="mb-4">
                    <a href=" {{ route('admin.kategori.create') }} " class="btn btn-primary"><i data-feather="plus"></i> Tambah Kategori</a>
                   
                </div>
                <div class="overflow-x-auto">
                    <table class="table w-full">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                             @forelse($categories as $index => $kategori)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $kategori->name }}</td>
                                    <td class="space-x-2">
                                        <a href="{{ route('admin.kategori.edit', $kategori) }}" class="btn btn-sm btn-warning"><i data-feather="edit"></i></a>
                                        <form action="{{ route('admin.kategori.destroy', $kategori) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-error" onclick="return confirm('Yakin ingin menghapus?')"><i data-feather="trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">Belum ada data kategori</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
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
