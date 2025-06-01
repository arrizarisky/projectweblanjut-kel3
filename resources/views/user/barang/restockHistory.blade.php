<x-app-layout>
      <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Riwayat Restock</h2>
    </x-slot>

    <div class="container mx-auto mt-10 px-4">
        <ul class="list bg-base-100 rounded-box shadow-md ">
        
        <li class="p-4 pb-2 text-lg opacity-60 tracking-wide" id="search-table">History</li> 
        @foreach ($histories as $history)     
        <li class="list-row " >
            <div>
            <div>{{ $history->barang->name }}</div>
            <div class="text-xs uppercase font-semibold opacity-60">{{ $history->user->name }}</div>
            </div>
            <p class="list-col-wrap text-xs">
            {{ $history->created_at->format('d M Y H:i') }}
            </p>
            <i data-feather="clock"></i>
        </li>
        @endforeach
        </ul>
        <a href="{{ route('dashboard') }}" class="btn btn-sm btn-primary p-5 mt-3">Back</a>
    </div>
</x-app-layout>
