<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Kategori') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-base-200 shadow-md rounded p-6">
                <form action="{{ route('admin.supplier.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="label">Nama</label>
                        <input type="text" name="name" class="input input-bordered w-full" required>
                    </div>
                    <div class="mb-4">
                        <label class="label">Contact</label>
                        <input type="text" name="contact_info" class="input input-bordered w-full" required>
                    </div>
                    <div class="mt-6">
                        <button class="btn btn-primary">Simpan</button>
                        <a href="{{ route('admin.supplier.index') }}" class="btn btn-secondary ml-2">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>