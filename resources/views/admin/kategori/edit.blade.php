<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Kategori') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-base-200 shadow-md rounded p-6">
                <form action="{{ route('admin.kategori.update', $kategori) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="label">Nama Kategori</label>
                        <input type="text" name="name" class="input input-bordered w-full" value="{{ old('name', $kategori->name) }}" required>
                    </div>

                    <div class="mt-6">
                        <button class="btn btn-primary">Update</button>
                        <a href="{{ route('admin.kategori.index') }}" class="btn btn-secondary ml-2">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
