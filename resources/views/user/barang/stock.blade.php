<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="flex items-center">
                <h2 class="text-2xl font-bold text-gray-800 flex items-center">
                    <i data-feather="bar-chart" class="mr-2"></i>
                    Statistik Barang
                </h2>
            </div>

            <a href="{{ route('welcome') }}">
                <div class="mask mask-circle w-10 h-10 bg-accent hover:opacity-80 transition">
                    <img src="{{ asset('images/profile.png') }}" alt="Logo" class="w-full h-full p-1 object-cover">
                </div>
            </a>
        </div>
    </x-slot>


    <div class="py-10 p-10">
        <div class="max-w-6xl mx-auto space-y-6 mb-50">

            <!-- Ringkasan Data -->
            <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 gap-6">
                <div class="card bg-base-100 shadow border p-6">
                    <h2 class="card-title mb-4">Grafik Jumlah Stok per Barang</h2>
                    <div class="relative w-full h-[200px]">
                        <canvas id="stokChart"></canvas>
                    </div>
                </div>

                <x-dashboard-card
                    title="Total Barang"
                    :value="$totalStok"
                    description="Data Jumlah Barang Keseluruhan."
                    icon="box"

                />
            </div>

            <!-- Tabel Barang -->
           
        </div>
    </div>
   @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // Otomatis hilangkan alert sukses (kodenya tetap)
            setTimeout(function () {
                let alert = document.getElementById('success-alert');
                if (alert) {
                    alert.remove(); 
                }
            }, 3000); 

            feather.replace();
        </script>

        {{-- Chart Stok --}}
        <script>
            const ctx = document.getElementById('stokChart').getContext('2d');
            const stokChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($barangs->pluck('name')) !!},
                    datasets: [{
                        label: 'Jumlah Stok',
                        data: {!! json_encode($barangs->pluck('quantity')) !!},
                        backgroundColor: 'rgba(59, 130, 246, 0.6)',
                        borderColor: 'rgba(59, 130, 246, 1)',
                        borderWidth: 1,
                        borderRadius: 6,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
        </script>
    @endpush

</x-app-layout>
