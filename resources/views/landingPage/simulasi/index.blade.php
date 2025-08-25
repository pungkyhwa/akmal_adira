<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ADIRA Finance Alam Sutera</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="{{ asset('landing_page/1590461312Logo Adira 2.jpg')}}" type="image/x-icon">
    <style>
        .whatsapp-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            background-color: #25D366;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .whatsapp-button img {
            width: 35px;
            height: 35px;
        }

        .whatsapp-button:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>

<body class="bg-white text-gray-800">
    <a href="https://api.whatsapp.com/send?phone=6285156320270&text=Halo%20saya%20ingin%20bertanya"
        class="whatsapp-button" target="_blank" aria-label="Chat via WhatsApp">
        <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp">
    </a>
    <!-- NAVBAR -->
    <nav class="bg-yellow-300 py-4 px-6 shadow-md font-serif">
        <div class="flex items-center justify-between md:justify-center">
            <img src="{{ asset('landing_page/logo-adira-mutifinance.png')}}" alt="Logo" class="w-[120px] md:mr-10" />

            <!-- Hamburger (mobile) -->
            <button id="menu-button" class="md:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-gray-800" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <!-- Menu (desktop) -->
            <ul class="hidden md:flex gap-12 font-bold items-center">
                <li><a href="/adiraAlamSutera" class="hover:underline">Home</a></li>
                <li><a href="/simulasi" class="hover:underline">Simulasi</a></li>
                <li><a href="/tentangAdira" class="hover:underline">Tentang Adira</a></li>
                <li><a href="#" class="hover:underline">Contact Us</a></li>
            </ul>
        </div>

        <!-- Menu (mobile) -->
        <div id="mobile-menu" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out md:hidden">
            <ul class="flex flex-col items-center gap-3 mt-4 font-bold">
                <li><a href="/adiraAlamSutera" class="hover:underline">Home</a></li>
                <li><a href="/simulasi" class="hover:underline">Simulasi</a></li>
                <li><a href="/tentangAdira" class="hover:underline">Tentang Adira</a></li>
                <li><a href="#" class="hover:underline">Contact Us</a></li>
            </ul>
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <main class="font-serif mt-10 max-w-5xl px-6 mx-auto">
        <h1 class="text-2xl font-bold border-b-4 border-yellow-300 pb-4 text-gray-800">
            Simulasi
        </h1>

        <form action="{{ route('simulasi.storeSimulasi')}}" method="POST"
            class="mt-8 bg-white shadow-lg rounded-lg p-6 space-y-6 border border-gray-200">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Jenis Kendaraan -->
                <div>
                    <label for="jns_kendaraan" class="block text-sm font-semibold text-gray-700 mb-1">
                        Jenis Kendaraan
                    </label>
                    <select id="jns_kendaraan" name="jnsKendaraan" required
                        class="w-full rounded-md border-gray-300 focus:border-yellow-400 focus:ring focus:ring-yellow-200">
                        <option value="">--Pilih Jenis Kendaraan--
                        </option>
                        @foreach ($jnsKendaraan as $item)
                            <option value="{{ $item->id }}">{{ $item->jns_kendaraan }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Merk Kendaraan -->
                <div>
                    <label for="merk_kendaraan" class="block text-sm font-semibold text-gray-700 mb-1">
                        Merk Kendaraan
                    </label>
                    <select id="merk_kendaraan" name="merkKendaraan"
                        class="w-full rounded-md border-gray-300 focus:border-yellow-400 focus:ring focus:ring-yellow-200"
                        @change="loadMerek()">
                        <option value="" {{ old('merekKendaraan') ? '' : 'selected' }}>--Pilih Merk Kendaraan--
                        </option>
                    </select>
                </div>

                <!-- Tipe Kendaraan -->
                <div>
                    <label for="tipe_kendaraan" class="block text-sm font-semibold text-gray-700 mb-1">
                        Tipe Kendaraan
                    </label>
                    <select id="tipe_kendaraan" name="tipeKendaraan"
                        class="w-full rounded-md border-gray-300 focus:border-yellow-400 focus:ring focus:ring-yellow-200"
                        @change="loadTipe()">
                        <option value="">--Pilih Tipe Kendaraan--
                        </option>
                    </select>
                </div>

                <!-- Tahun Kendaraan -->
                <div>
                    <label for="thn_kendaraan" class="block text-sm font-semibold text-gray-700 mb-1">
                        Tahun Kendaraan
                    </label>
                    <select id="thn_kendaraan" name="thnKendaraan"
                        class="w-full rounded-md border-gray-300 focus:border-yellow-400 focus:ring focus:ring-yellow-200"
                        @change="loadTahun()">
                        <option value="">--Pilih Tahun Kendaraan--
                        </option>
                    </select>
                </div>

                <!-- Harga Kendaraan -->
                <div class="sm:col-span-2">
                    <label for="harga_kendaraan" class="block text-sm font-semibold text-gray-700 mb-1">
                        Harga Kendaraan
                    </label>
                    <input id="harga_kendaraan" type="text" name="hargaKendaraan" required
                        class="w-full rounded-md border-gray-300 focus:border-yellow-400 focus:ring focus:ring-yellow-200" />
                </div>

                <!-- Tenor -->
                <div>
                    <label for="tenor" class="block text-sm font-semibold text-gray-700 mb-1">
                        Tenor
                    </label>
                    <select id="tenor" name="tenor" required
                        class="w-full rounded-md border-gray-300 focus:border-yellow-400 focus:ring focus:ring-yellow-200">
                        <option value="" disabled {{ old('tenor') ? '' : 'selected' }}>--Pilih Tenor--</option>
                        @foreach ($tenor as $item)
                            <option value="{{ $item->id }}">{{ $item->tenor }} {{ $item->satuan }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Maksimal Pencairan -->
                <div>
                    <label for="maks_pencairan" class="block text-sm font-semibold text-gray-700 mb-1">
                        Pencairan
                    </label>
                    <input id="maks_pencairan" type="text" name="maksPencairan" required
                        class="w-full rounded-md border-gray-300 focus:border-yellow-400 focus:ring focus:ring-yellow-200" />
                    <p id="info-maks" class="text-xs text-gray-500 mt-1"></p>
                </div>
            </div>

            <!-- Tombol Submit -->
            <div class="pt-4">
                <button type="submit"
                    class="w-full sm:w-auto px-6 py-2 bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold rounded-md shadow-md transition">
                    Proses Simulasi
                </button>
            </div>
        </form>

        @if(session('success'))
            <div class="mt-8 bg-white shadow-lg rounded-lg p-6 border border-gray-200">
                <h2 class="text-xl font-bold mb-4 text-center text-gray-800">Hasil Simulasi</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-4">
                    <div class="flex justify-between border-b pb-2">
                        <span class="font-semibold">Pencairan:</span>
                        <span>Rp {{session('results.maksimal_pencairan')}}</span>
                    </div>
                </div>
            </div>
            <div class="mt-6 p-4 bg-yellow-50 rounded-lg border border-yellow-200">
                <div class="text-center">
                    <p class="text-lg font-bold">Angsuran per Bulan</p>
                    <p class="text-2xl font-bold text-yellow-600 mt-2">Rp. {{ session('results.angsuran_per_bulan') }}
                    </p>
                </div>
            </div>
            </div>

            <div class="mt-6 text-center">
                <a href="/simulasi/dataCalonPeminjam"
                    class="inline-block px-6 py-2 bg-yellow-500 hover:bg-yellow-600 text-white font-semibold rounded-md shadow-md transition"
                    target="_blank">
                    Ajukan Pinjaman
                </a>
            </div>
            </div>
        @endif
    </main>


    <!-- FOOTER -->
    <footer class="bg-gray-600 text-white py-10 px-6 mt-10 text-sm md:text-base w-full bottom-0 relative">
        <div class="max-w-6xl mx-auto grid gap-10 md:grid-cols-3">

            <!-- Kontak -->
            <div>
                <div class="flex items-start gap-4">
                    <img src="{{ asset('landing_page/live-chat.png')}}" alt="Live Chat"
                        class="w-12 h-12 object-contain" />
                    <div>
                        <p class="font-bold">Call Center Adira</p>
                        <p>0821 1375 1469</p>
                    </div>
                </div>
                <div class="mt-6">
                    <p class="font-bold mb-1">Kantor Pusat Adira Finance</p>
                    <p class="leading-relaxed">
                        Jl. Raya Serpong Km 7 No.38,<br />
                        Pakulonan, Serpong Utara,<br />
                        Tangerang Selatan, Banten 15325
                    </p>
                </div>
            </div>

            <!-- Layanan -->
            <div>
                <p class="text-lg font-bold mb-4">Layanan Kami</p>
                <ul class="space-y-2">
                    <li>Gadai BPKB Mobil</li>
                    <li>Gadai BPKB Motor</li>
                    <li>Gabung Mitra AXI Adira Finance</li>
                </ul>
            </div>

            <!-- Logo & ID -->
            <div class="text-center md:text-left">
                <div class="space-y-3 mb-4">
                    <img src="{{ asset('landing_page/axi.jpeg')}}" alt="AXI Logo" class="w-24 mx-auto md:mx-0" />
                    <img src="{{ asset('landing_page/Artboard_2__1_.png')}}" alt="Adira Logo"
                        class="w-24 mx-auto md:mx-0" />
                    <img src="{{ asset('landing_page/blob.png')}}" alt="Blob" class="w-24 mx-auto md:mx-0" />
                </div>
                <p class="text-sm">Ibnu Hajar - ID AXI 010525001658</p>
                <p class="text-sm">Bahrudin - ID AXI 010525001635</p>
            </div>

        </div>
    </footer>


    <script>
        const menuBtn = document.getElementById("menu-button");
        const mobileMenu = document.getElementById("mobile-menu");

        menuBtn.addEventListener("click", () => {
            mobileMenu.classList.toggle("max-h-0");
            mobileMenu.classList.toggle("max-h-40");
        });
    </script>


    {{-- jQuery load dulu --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function () {

            function parseRupiahToNumber(rupiah) {
                return parseInt(rupiah.replace(/\./g, '').replace(/[^0-9]/g, '')) || 0;
            }

            function formatRupiah(angka) {
                return new Intl.NumberFormat('id-ID').format(angka);
            }

            // function updateMaksPencairan(harga) {
            //     let batasMaksimal = Math.floor(harga * 0.8);
            //     $('#maks_pencairan').val(formatRupiah(batasMaksimal));
            //     $('#info-maks').text(`Maksimal pencairan: Rp ${formatRupiah(batasMaksimal)}`);
            // }

            // Cek jika input maks_pencairan diubah manual
            // $('#maks_pencairan').on('input', function() {
            //     let harga = parseRupiahToNumber($('#harga_kendaraan').val());
            //     let batasMaksimal = Math.floor(harga * 0.8);
            //     let nilaiInput = parseRupiahToNumber($(this).val());

            //     if (nilaiInput > batasMaksimal) {
            //         $(this).val(formatRupiah(batasMaksimal));
            //     } else {
            //         $(this).val(formatRupiah(nilaiInput));
            //     }
            // });

            // Load kendaraan via AJAX
            function loadMerek() {
                let jns = $('#jns_kendaraan').val();

                if (jns) {
                    $.ajax({
                        url: `/merek-kendaraan/${jns}`,
                        method: 'GET',
                        success: function (data) {
                            let $merkSelect = $('#merk_kendaraan');
                            $merkSelect.empty().append('<option value="">--Pilih Merk Kendaraan--</option>');

                            if (data.length > 0) {
                                data.forEach(function (item) {
                                    $merkSelect.append(`<option value="${item.id}">${item.merek_kendaraan}</option>`);
                                });
                            }
                        },
                        error: function () {
                            alert('Gagal mengambil data merek kendaraan.');
                        }
                    });
                }
            }

            $('#jns_kendaraan').on('change', loadMerek);

            function loadTipe() {
                let merk = $('#merk_kendaraan').val();

                if (merk) {
                    $.ajax({
                        url: `/tipe-kendaraan/${merk}`,
                        method: 'GET',
                        success: function (data) {
                            let $tipeSelect = $('#tipe_kendaraan');
                            $tipeSelect.empty().append('<option value="">--Pilih Tipe Kendaraan--</option>');

                            if (data.length > 0) {
                                data.forEach(function (item) {
                                    $tipeSelect.append(`<option value="${item.id}">${item.tipe_kendaraan}</option>`);
                                });
                            }
                        },
                        error: function () {
                            alert('Gagal mengambil data tipe kendaraan.');
                        }
                    });
                }
            }

            $('#merk_kendaraan').on('change', loadTipe);

            function loadTahun() {
                let tipe = $('#tipe_kendaraan').val();

                if (tipe) {
                    $.ajax({
                        url: `/tahun-kendaraan/${tipe}`,
                        method: 'GET',
                        success: function (data) {
                            let $tahunKendaraan = $('#thn_kendaraan');
                            $tahunKendaraan.empty().append('<option value="">--Pilih Tahun Kendaraan--</option>');

                            if (data.length > 0) {
                                data.forEach(function (item) {
                                    $tahunKendaraan.append(`<option value="${item.id}">${item.tahun_kendaran}</option>`);
                                });
                            }
                        },
                        error: function () {
                            alert('Gagal mengambil data tahun kendaraan.');
                        }
                    });
                }
            }

            $('#tipe_kendaraan').on('change', loadTahun);



            function loadHarga() {
                let jns = $('#jns_kendaraan').val();
                let merk = $('#merk_kendaraan').val();
                let tipe = $('#tipe_kendaraan').val();
                let thn = $('#thn_kendaraan').val();

                if (jns && merk && tipe && thn) {
                    $.ajax({
                        url: `/harga-kendaraan/${jns}/${merk}/${tipe}/${thn}`,
                        method: 'GET',
                        success: function (data) {
                            if (data && data.harga) {
                                let harga = data.harga;
                                $('#harga_kendaraan').val(formatRupiah(harga));
                                updateMaksPencairan(harga);
                            } else {
                                $('#harga_kendaraan').val('');
                                $('#maks_pencairan').val('');
                                $('#info-maks').text('');
                            }
                        }
                    });
                }
            }

            $('#jns_kendaraan, #merk_kendaraan, #tipe_kendaraan, #thn_kendaraan').on('change', loadHarga);
        });
    </script>
</body>

</html>
