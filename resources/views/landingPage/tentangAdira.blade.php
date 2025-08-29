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
                <li><a href="/menu" class="hover:underline">Menu</a></li>
                <li><a href="/tentangAdira" class="hover:underline">Tentang Adira</a></li>
                <li><a href="/contactUs" class="hover:underline">Contact Us</a></li>
            </ul>
        </div>

        <!-- Menu (mobile) -->
        <div id="mobile-menu" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out md:hidden">
            <ul class="flex flex-col items-center gap-3 mt-4 font-bold">
                <li><a href="/adiraAlamSutera\" class="hover:underline">Home</a></li>
                <li><a href="/simulasi" class="hover:underline">Simulasi</a></li>
                <li><a href="/menu" class="hover:underline">Menu</a></li>
                <li><a href="/tentangAdira" class="hover:underline">Tentang Adira</a></li>
                <li><a href="#" class="hover:underline">Contact Us</a></li>
            </ul>
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <main class="font-serif mt-10 max-w-6xl px-4 mx-auto">
        <img src="{{ asset('landing_page/harga-wajar-admf-2021-3.jpg')}}" alt="gambar ADIRA Alam Sutera"
            class="w-full max-w-lg mx-auto mb-[40px]" />

        <div>
            <h1 class="text-2xl border-b-4 border-b-yellow-300 pb-4">Tentang Adira Finance</h1>
        </div>

        <div class="flex flex-col gap-5 my-5">
            <p>
                Adira Finance atau PT Adira Dinamika Multi Finance Tbk didirikan pada tahun 1990 dan mulai beroperasi
                pada
                tahun 1991. Sejak awal, Adira Finance berkomitmen untuk menjadi perusahaan pembiayaan terbaik dan
                terkemuka
                di Indonesia. Adira Finance hadir untuk melayani beragam pembiayaan seperti kendaraan bermotor baik baru
                ataupun bekas. Melihat adanya potensi ini, Adira Finance mulai melakukan penawaran umum melalui sahamnya
                pada tahun 2004 dan Bank Danamon menjadi pemegang saham mayoritas sebesar 75%. Melalui beberapa tindakan
                korporasi, saat ini Bank Danamon memiliki kepemilikan saham sebesar 92,07% atas Adira Finance. Sebagai
                anak
                perusahaan Bank Danamon, Adira Finance menjadi bagian dari MUFG Group yang merupakan salah satu bank
                terbesar di dunia.
            </p>

            <p>
                Adira Finance telah menjadi perusahaan terkemuka di sektor pembiayaan yang melayani beragam merek dan
                produk. Di tahun 2017 Adira Finance menghadirkan platform e-commerce pembiayaan multiguna jasa
                dicicilaja
                (dot) com, marketplace jual beli kendaraan momobil (dot) id, dan diikuti momotor (dot) id pada tahun
                2018.
                Pada tanggal 20 Februari 2020, Adira Finance meluncurkan inovasi baru di bidang digital yaitu aplikasi
                layanan konsumen Adiraku untuk memberikan pengalaman bertransaksi secara real time dengan mudah, aman
                dan
                nyaman. Hingga 31 Maret 2020, Adira Finance mengoperasikan 452 jaringan usaha di seluruh Indonesia
                dengan
                didukung oleh lebih dari 17.500 karyawan, untuk melayani 3 juta konsumen dengan jumlah piutang yang
                dikelola
                mencapai Rp 54,7 triliun.
            </p>

            <p>
                Sejak tahun 2014, Adira Finance berhasil mendapatkan peringkat idAAA merupakan pemeringkat tertinggi
                yang
                diberikan oleh lembaga pemeringkat Indonesia yaitu Pefindo. Perusahaan juga memperoleh peringkat
                investment
                grade di tahun 2019 yaitu Baa2 oleh Moody’s dan BBB oleh Fitch, kedua peringkat internasional tersebut
                merupakan investment grade yang sama dengan peringkat negara Indonesia. Peringkat ini secara signifikan
                memperkuat kemampuan Perusahaan untuk mengakses sumber pendanaan yang lebih kompetitif.
            </p>

            <p>
                Adira Finance senantiasa berupaya untuk memberikan kontribusi kepada bangsa dan negara Indonesia.
                Melalui
                identitas dan janji brand “Sahabat Setia Selamanya”, Adira Finance berkomitmen untuk menjalankan misi
                yang
                berujung pada peningkatan kesejahteraan masyarakat Indonesia. Hal itu dilakukan melalui penyediaan
                produk
                dan layanan yang beragam sesuai siklus kehidupan konsumen dari pembiayaan multiguna, perlengkapan rumah
                tangga dan elektronik (durables), otomotif (motor dan mobil), hingga pembiayaan umroh (Syariah).
            </p>
        </div>

        <div class="grid md:grid-cols-2 gap-3 my-5">
            <div>
                <img src="{{ asset('landing_page/peta-indonesia-png-9.png')}}" alt="Peta Indonesia" class="w-full">
            </div>

            <div class="flex flex-col gap-3 items-center text-center font-bold justify-center text-[22px]">
                <p>Ajukan Sekarang!</p>
                <p>Cabang Adira Terdekat</p>
                <p>Di Kota Anda</p>
            </div>
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="bg-gray-600 text-white py-10 px-6 mt-10 text-sm md:text-base">
        <div class="max-w-6xl mx-auto grid gap-10 md:grid-cols-3">

            <!-- Kontak -->
            <div>
                <div class="flex items-start gap-4">
                    <img src="{{ asset('landing_page/live-chat.png')}}" alt="Live Chat"
                        class="w-12 h-12 object-contain" />
                    <div>
                        <p class="font-bold">Call Center Adira</p>
                        <p>0821 1375 1469</p>
                        <p>0899 8258 067</p>
                    </div>
                </div>
                <div class="mt-6">
                    <p class="font-bold mb-1">Kantor Adira Finance Alam Sutera</p>
                    <p class="leading-relaxed">
                        No.8, Jl. Raya Serpong Kilometer 7 No.38, Pakulonan, Serpong Utara, South Tangerang City, Banten
                        15325
                    </p>
                </div>
            </div>

            <!-- Layanan -->
            <div>
                <p class="text-lg font-bold mb-4">Layanan Kami</p>
                <ul class="space-y-2">
                    <li>Gadai BPKB Mobil</li>
                    <li>Gadai BPKB Motor</li>
                    <li>
                        <a href="https://dicicilaja.com/010524001489" class="text-blue-500">
                            Gabung Mitra AXI Ibnu Hajar Adira Finance
                        </a>
                    </li>
                    <li>
                        <a href="https://dicicilaja.com/010525001635" class="text-blue-500">
                            Gabung Mitra AXI Bahrudin Adira Finance
                        </a>
                    </li>
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
</body>

</html>
