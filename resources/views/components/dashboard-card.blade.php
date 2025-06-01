@props(['title', 'value', 'description','icon'=> '', 'color' => 'primary'])

<div class="card bg-base-100 shadow-xl border border-gray-100 transition delay-150 duration-300 ease-in-out hover:-translate-y-1 hover:scale-110 hover:bg-accent hover:text-emerald-900">
    
    <div class="card-body ">
       <div class="flex space-x-4">
           <i data-feather="{{ $icon }}"></i>
           <h2 class="card-title text-2xl">{{ $title }}</h2>
       </div>
        <p class="text-7xl font-bold text-{{ $color }}">{{ $value }}</p>
        <p class="text-sm text-gray-500">{{ $description }}</p>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        feather.replace();
    });
</script>