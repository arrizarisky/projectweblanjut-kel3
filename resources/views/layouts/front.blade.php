<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles & Scripts (Vite) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white dark:bg-gray-900 text-gray-900 dark:text-white font-sans antialiased">
    
    <!-- Navbar atau header opsional di sini -->
    
    <!-- Main Content -->
    <main class="min-h-screen">
        @yield('content')
    </main>

    <!-- Footer opsional -->
      <footer class="bg-white rounded-lg shadow-sm dark:bg-gray-900 m-4">
            <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
                <div class="sm:flex sm:items-center sm:justify-between">
                    <a href="https://flowbite.com/" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                       <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="48" height="48" class="text-lime-700 dark:text-white" viewBox="0,0,240.1375,256">
                        <g fill="currentColor" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(11.34249,11.34249)"><path d="M10.69336,-0.02539l-0.69141,0.50195c-0.04345,0.03153 -0.08097,0.0686 -0.12305,0.10156c-0.28156,0.22057 -0.53216,0.47164 -0.74805,0.74805l-8.54492,8.54492c-0.7724,0.77263 -0.7724,2.05549 0,2.82813l9.89648,9.89648l0.69141,-0.50195c0.04344,-0.03154 0.08099,-0.06859 0.12305,-0.10156c0.28145,-0.22061 0.53221,-0.47161 0.74805,-0.74805l8.54492,-8.54492c0.7724,-0.77263 0.7724,-2.05549 0,-2.82813zM10.63281,2.74219l8.54297,8.54297l-6.33398,6.33398c-0.16945,-0.80098 -0.4745,-1.56606 -0.93555,-2.24023l4.08984,-4.08984l-4.61328,-4.66211c-0.67814,-0.69743 -1.08727,-1.60794 -1.17578,-2.57617c-0.0069,-0.48144 0.16836,-0.9172 0.42578,-1.30859zM8.33398,4.95117c0.16884,0.80073 0.47501,1.56219 0.93555,2.23633c0.00032,0.00047 -0.00032,0.00148 0,0.00195l-4.09375,4.0918l4.61328,4.66211c0.67869,0.69633 1.08978,1.60657 1.17969,2.57422c0.0072,0.48223 -0.16799,0.91852 -0.42578,1.31055l-8.54297,-8.54297zM10.60352,8.68164l2.57226,2.59961l-2.60742,2.60742l-2.57227,-2.59961z"></path></g></g>
                        </svg>
                        <span class="self-center text-2xl font-semibold whitespace-nowrap text-gray-800 dark:text-white">Ukansee</span>
                    </a>
                    <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                        <li>
                            <a href="#" class="hover:underline me-4 md:me-6">About</a>
                        </li>
                        <li>
                            <a href="#" class="hover:underline me-4 md:me-6">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="#" class="hover:underline me-4 md:me-6">Licensing</a>
                        </li>
                        <li>
                            <a href="#" class="hover:underline">Contact</a>
                        </li>
                    </ul>
                </div>
                <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
                <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2025 <a href=" {{ route('welcome') }} " class="hover:underline">Ukansee™</a>. All Rights Reserved.</span>
            </div>
        </footer>
    <!-- End Footer -->
    <!-- Script eksternal -->
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

    <!-- Dark mode toggle script -->
    <script>
       feather.replace(); 
        const themeToggleBtn = document.getElementById('theme-toggle');
        const darkIcon = document.getElementById('theme-toggle-dark-icon');
        const lightIcon = document.getElementById('theme-toggle-light-icon');

        if (localStorage.getItem('color-theme') === 'dark' || 
            (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
            darkIcon?.classList.remove('hidden');
        } else {
            lightIcon?.classList.remove('hidden');
        }

        themeToggleBtn?.addEventListener('click', function () {
            darkIcon?.classList.toggle('hidden');
            lightIcon?.classList.toggle('hidden');

            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
            }
        });
    </script>

    @stack('scripts')
</body>
</html>
