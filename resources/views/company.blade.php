{{-- resources/views/company.blade.php --}}
@extends('layouts.front') {{-- atau layout publik buatan sendiri --}}

@section('content')
        {{-- Header --}}
        <nav class="bg-white border-gray-200 dark:bg-gray-900">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
                <a href="https://flowbite.com" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <svg  xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="48" class="text-gray-800 dark:text-white" height="48" viewBox="0,0,240.1375,256">
                        <g fill="currentColor" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(11.34249,11.34249)"><path d="M10.69336,-0.02539l-0.69141,0.50195c-0.04345,0.03153 -0.08097,0.0686 -0.12305,0.10156c-0.28156,0.22057 -0.53216,0.47164 -0.74805,0.74805l-8.54492,8.54492c-0.7724,0.77263 -0.7724,2.05549 0,2.82813l9.89648,9.89648l0.69141,-0.50195c0.04344,-0.03154 0.08099,-0.06859 0.12305,-0.10156c0.28145,-0.22061 0.53221,-0.47161 0.74805,-0.74805l8.54492,-8.54492c0.7724,-0.77263 0.7724,-2.05549 0,-2.82813zM10.63281,2.74219l8.54297,8.54297l-6.33398,6.33398c-0.16945,-0.80098 -0.4745,-1.56606 -0.93555,-2.24023l4.08984,-4.08984l-4.61328,-4.66211c-0.67814,-0.69743 -1.08727,-1.60794 -1.17578,-2.57617c-0.0069,-0.48144 0.16836,-0.9172 0.42578,-1.30859zM8.33398,4.95117c0.16884,0.80073 0.47501,1.56219 0.93555,2.23633c0.00032,0.00047 -0.00032,0.00148 0,0.00195l-4.09375,4.0918l4.61328,4.66211c0.67869,0.69633 1.08978,1.60657 1.17969,2.57422c0.0072,0.48223 -0.16799,0.91852 -0.42578,1.31055l-8.54297,-8.54297zM10.60352,8.68164l2.57226,2.59961l-2.60742,2.60742l-2.57227,-2.59961z"></path></g></g>
                    </svg>
                    <span class="self-center text-2xl font-semibold whitespace-nowrap text-gray-800 dark:text-white">Ukansee</span>
                </a>
                {{-- Bagian Autentikasi --}}
                @if (Route::has('login'))
                    <div class="flex items-center space-x-6 rtl:space-x-reverse">
                        @auth
                            {{-- Dashboard --}}
                            <a href="{{ route('dashboard') }}" class="text-sm text-gray-700 dark:text-white hover:underline {{ request()->routeIs('dashboard') ? 'font-bold' : '' }}">
                                Dashboard
                            </a>

                            {{-- Barang --}}
                            <a href="{{ auth()->user()->role === 'admin' ? route('admin.barang.index') : route('user.barang.index') }}"
                                class="text-sm text-gray-700 dark:text-white hover:underline {{ request()->is('*barang*') ? 'font-bold' : '' }}">
                                Barang
                            </a>

                            {{-- Settings --}}
                            <a href="{{ route('profile.edit') }}"
                                class="text-sm text-gray-700 dark:text-white hover:underline {{ request()->routeIs('profile.edit') ? 'font-bold' : '' }}">
                                Settings
                            </a>

                            {{-- Logout --}}
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="text-sm text-red-600 dark:text-red-400 hover:underline">Logout</button>
                            </form>
                        @else
                            {{-- Login --}}
                            <a href="{{ route('login') }}" class="text-sm text-blue-600 dark:text-blue-500 hover:underline">Login</a>

                            {{-- Register --}}
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-sm text-blue-600 dark:text-blue-500 hover:underline">Register</a>
                            @endif
                        @endauth
                        <button id="theme-toggle" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                                <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                                 <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                        </button>
                    </div>
                @endif
            {{-- End Autentikasi --}}
            </div>
        </nav>
    <nav class=" bg-gray-50 dark:bg-gray-800 max-w-screen-xl mx-auto m-3 shadow-md">
            <div class="w-full p-4 md:py-8 rounded-lg border border-gray-200 dark:border-gray-700">
                <div class="flex justify-center items-center ">
                    <ul class="flex flex-row font-medium mt-0 space-x-8 rtl:space-x-reverse text-sm">
                        <li>
                            <a href="/" class="text-gray-900 dark:text-white hover:underline" aria-current="page">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('company') }}" class="text-gray-900 dark:text-white hover:underline">Company</a>
                        </li>
                        <li>
                            <a href="{{ route('team') }}" class="text-gray-900 dark:text-white hover:underline">Team</a>
                        </li>
                        <li>
                            <a href="{{ route('features') }}" class="text-gray-900 dark:text-white hover:underline">Features</a>
                        </li>
                        
                    </ul>
                </div>
            </div>
    </nav>
   <div class="flex flex-col items-center justify-center px-4 py-12 mx-auto max-w-screen-xl text-center">
        <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Selamat Datang di <span class="font-semibold text-blue-600">Ukansee</h1></span>
        <p class="text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400 mt-4 mb-8">
            Sistem Inventory Barang unggulan dari Agresia, dirancang untuk memudahkan pengelolaan stok dan operasional bisnis Perusahaan secara efektif dan efisien.
        </p>
    </div>

          <!-- Isi -->
        <div class="grid md:grid-cols-2 gap-8 px-4 max-w-screen-xl mx-auto mb-12">
            <div class="bg-gray-100 dark:bg-gray-800 p-6 rounded-lg shadow">
                <div class="flex items-center mb-3 space-x-2 rtl:space-x-reverse">
                    <i data-feather="info" class="w-6 h-6 text-blue-500 mr-2"></i>
                    <h3 class="text-3xl font-bold dark:text-white">Tentang Agresia</h3>
                </div>
                <p class="text-gray-700 dark:text-gray-300">
                    Agresia adalah perusahaan teknologi yang berfokus pada pengembangan sistem informasi untuk mendukung operasional bisnis. Kami berkomitmen untuk membangun solusi yang relevan dan berdampak langsung terhadap kinerja tim Anda.
                </p>
            </div>

            <div class="bg-gray-100 dark:bg-gray-800 p-6 rounded-lg shadow">
                <div class="flex items-center mb-3 space-x-2 rtl:space-x-reverse">
                    <i data-feather="layers" class="w-6 h-6 text-blue-500 mr-2"></i>
                    <h3 class="text-3xl font-bold dark:text-white">Tentang Ukansee</h3>
                </div>
                    <ul class=" pl-5 text-gray-700 dark:text-gray-300 space-y-2 leading-9">
                        <li>📦 Manajemen Barang: tambah, ubah, hapus data barang, kategori, dan supplier.</li>
                        <li>📈 Riwayat Restock: catatan otomatis setiap kali stok diperbarui.</li>
                        <li>🔔 Notifikasi: pemberitahuan real-time untuk admin saat restock dilakukan.</li>
                        <li>📊 Dashboard Statistik: tampilan visual jumlah stok dan aktivitas terkini.</li>
                        <li>🔐 Login Aman: autentikasi admin dan staf dengan sistem hak akses.</li>
                    </ul>
                </div>
            </div>

            <!-- Manfaat -->
            <div class="bg-gray-100 dark:bg-gray-800 p-6 rounded-lg shadow-lg max-w-4xl mx-auto text-left">
                <div class="flex items-center mb-4 space-x-2 rtl:space-x-reverse">
                    <i data-feather="thumbs-up" class="w-8 h-8 text-blue-500 mr-3"></i>
                    <h2 class="text-3xl font-extrabold dark:text-white">Manfaat</h2>
                </div>
                <ul class=" pl-5 text-gray-700 dark:text-gray-300 space-y-2 text-lg leading-9">
                    <li><strong>⏱ Efisiensi waktu:</strong> Proses restock dan pencatatan jadi lebih cepat.</li>
                    <li><strong>📘 Transparansi tinggi:</strong> Semua aktivitas dicatat otomatis dan bisa dilacak.</li>
                    <li><strong>📍 Kontrol penuh:</strong> Admin mendapatkan notifikasi langsung atas semua perubahan.</li>
                    <li><strong>📞 Kemudahan support:</strong> Sistem mudah digunakan dengan dokumentasi terarah.</li>
                </ul>
            </div>
        </div>

<script>
  feather.replace();
</script>

        
</div>
@endsection
