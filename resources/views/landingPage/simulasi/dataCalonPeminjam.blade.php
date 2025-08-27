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
                <li><a href="/contactUs" class="hover:underline">Contact Us</a></li>
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
        <!-- Modal -->
        <div id="modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">

            <!-- Konten Modal -->
            <div class="bg-white rounded-lg shadow-xl max-w-2xl w-full p-6 text-center relative">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Penting!</h2>

                <!-- Scrollable Content -->
                <div class="text-gray-600 text-sm mb-6 max-h-96 overflow-y-auto text-left space-y-4">
                    <p>
                        <strong>KEBIJAKAN PRIVASI & SYARAT DAN KETENTUAN UMUM</strong><br>
                        DENGAN MENDAFTARKAN DIRI ANDA DI LAYANAN DICICILAJA.COM INI, BERARTI ANDA,
                        SELAKU PEMILIK AKUN / CALON NASABAH MENYETUJUI SYARAT DAN KETENTUAN DI BAWAH INI
                        (UNTUK SELANJUTNYA DISEBUT “SYARAT DAN KETENTUAN”).
                    </p>
                    <p>
                        Dicicilaja.com adalah website yang digunakan dan dikelola oleh PT Adira Dinamika Multi
                        Finance Tbk, (“Adira Finance”) sebagai pendukung usaha dalam memberikan fasilitas pembiayaan.
                    </p>
                    <p>
                        Pemilik akun/calon nasabah adalah pihak yang mendaftarkan diri di dicicilaja.com untuk
                        menggunakan layanan yang disediakan oleh dicicilaja.com.
                    </p>
                    <p>
                        Adira Finance berhak untuk melakukan pembekuan dan/atau penutupan Akun tanpa syarat apabila
                        ditemukan hal-hal yang melanggar hukum positif yang berlaku di Indonesia, dan/atau melanggar
                        asusila, norma dan kewajaran berdasarkan pertimbangan dan penilaian sendiri dari Adira Finance.
                    </p>
                    <p>
                        Adira Finance dapat membantu pemilik akun/calon nasabah untuk melakukan pemblokiran Akun
                        berdasarkan permintaan pemilik akun/calon nasabah dan membantu pemilik akun/calon nasabah untuk
                        mengembalikan Akun kepada Pemilik Akun.
                    </p>
                    <p>
                        Pemilik akun/calon nasabah harus mematuhi prosedur, instruksi, panduan dan/atau pedoman yang
                        ditetapkan oleh Adira Finance dalam website dicicilaja.com dari waktu ke waktu.
                    </p>
                    <p>
                        Segala penyalahgunaan User ID dan Password Dicicilaja.com merupakan tanggung jawab pemilik
                        akun/calon nasabah. pemilik akun/calon nasabah membebaskan Adira Finance dari segala tuntutan
                        yang mungkin timbul, baik dari pihak lain maupun pemilik akun/calon nasabah sendiri sebagai
                        akibat penyalahgunaan User ID dan Password.
                    </p>
                    <p>
                        Pemilik akun / calon nasabah menjamin bahwa data yang diisi pada Website Dicicilaja | Solusi
                        Semua Kebutuhan Anda diberikan secara benar dan sah kepada Adira Finance
                    </p>
                    <p>
                        Pemilik akun / calon nasabah setuju bahwa seluruh data yang diisi oleh Pemilik Akun pada website
                        Dicicilaja
                    </p>
                    <p>
                        <em>“Adira Finance Terdaftar dan Diawasi oleh OJK”</em>
                    </p>
                </div>

                <!-- Tombol -->
                <button id="closeModal" class="w-full px-6 py-2 bg-yellow-500 hover:bg-yellow-600
                        text-white font-semibold rounded-lg shadow-md transition">
                    Saya Mengerti
                </button>
            </div>
        </div>

        <h1 class="text-2xl font-bold border-b-4 border-yellow-300 pb-4 text-gray-800">
            Jenis Program Cicilan :
        </h1>

        <form action="{{ route('simulasi.storeDataCalonNasabah')}}" method="POST" enctype="multipart/form-data"
            class="mt-8 bg-white shadow-lg rounded-lg p-6 space-y-6 border border-gray-200">
            @csrf

            <h3 class="text-lg font-bold text-yellow-400 border-b-2 border-yellow-300">Dana Multiguna</h3>
            <div class="flex flex-wrap flex-col">
                <div>
                    <label for="jumlah_pinjaman" class="flex text-sm font-semibold text-gray-700 mb-1 gap-2">
                        Jumlah Pinjaman<p class="text-red-500">*</p>
                    </label>
                    <input type="text"
                        class="w-full rounded-md border focus:border-yellow-400 focus:ring focus:ring-yellow-200 px-3"
                        name="jumlah_pinjaman" id="jumlah_pinjaman"
                        value="{{ session('simulasi_results.jumlahPinjaman') }}" readonly>
                </div>
            </div>

            <h3 class="text-yellow-400 font-bold text-lg border-b-2 border-yellow-300">Data Calon Peminjam</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="namaktp" class="flex text-sm font-semibold text-gray-700 mb-1 gap-2">
                        Nama Sesuai KTP tanpa Gelar <p class="text-red-500">*</p>
                    </label>
                    <input type="text"
                        class="w-full rounded-md border focus:border-yellow-400 focus:ring focus:ring-yellow-200 px-3"
                        placeholder="Contoh : Bambang Marimo" name="namaktp" id="namaktp">
                </div>

                <div>
                    <label for="nik" class="flex text-sm font-semibold text-gray-700 mb-1 gap-2">
                        No KTP <p class="text-red-500">*</p>
                    </label>
                    <input type="text"
                        class="w-full rounded-md border focus:border-yellow-400 focus:ring focus:ring-yellow-200 px-3"
                        id="nik" name="nik">
                </div>

                <div>
                    <label for="nohp" class="flex text-sm font-semibold text-gray-700 mb-1 gap-2">
                        No Handphone <p class="text-red-500">*</p>
                    </label>
                    <input id="nohp" type="text" name="nohp" required
                        class="w-full rounded-md border focus:border-yellow-400 focus:ring focus:ring-yellow-200 px-3" />
                </div>

                <div>
                    <label for="email" class="flex gap-2 text-sm font-semibold text-gray-700 mb-1">
                        Email Address <p class="text-red-500">*</p>
                    </label>
                    <input type="email" id="email" name="email"
                        class="w-full rounded-md border focus:border-yellow-400 focus:ring focus:ring-yellow-200 px-3">
                </div>

                <div>
                    <label for="provinsi" class="flex gap-2 text-sm font-semibold text-gray-700 mb-1">
                        Provinsi Domisili <p class="text-red-500">*</p>
                    </label>
                    <input id="provinsi" type="text" name="provinsi" required
                        class="w-full rounded-md border focus:border-yellow-400 focus:ring focus:ring-yellow-200 px-3" />
                </div>

                <div>
                    <label for="kota" class="flex gap-2 text-sm font-semibold text-gray-700 mb-1">
                        Kota Domisili <p class="text-red-500">*</p>
                    </label>
                    <input id="kota" type="text" name="kota" required
                        class="w-full rounded-md border focus:border-yellow-400 focus:ring focus:ring-yellow-200 px-3" />
                </div>

                <div>
                    <label for="kecamatan" class="flex gap-2 text-sm font-semibold text-gray-700 mb-1">
                        Kecamatan <p class="text-red-500">*</p>
                    </label>
                    <input id="kecamatan" type="text" name="kecamatan" required
                        class="w-full rounded-md border focus:border-yellow-400 focus:ring focus:ring-yellow-200 px-3" />
                </div>

                <div>
                    <label for="kelurahan" class="flex gap-2 text-sm font-semibold text-gray-700 mb-1">
                        Kelurahan <p class="text-red-500">*</p>
                    </label>
                    <input id="kelurahan" type="text" name="kelurahan" required
                        class="w-full rounded-md border focus:border-yellow-400 focus:ring focus:ring-yellow-200 px-3" />
                </div>

                <div class="sm:col-span-2">
                    <label for="alamat" class="flex gap-2 text-sm font-semibold text-gray-700 mb-1">
                        Alamat Domisili <p class="text-red-500">*</p>
                    </label>
                    <textarea id="alamat" type="text" name="alamat" required
                        class="w-full rounded-md border focus:border-yellow-400 focus:ring focus:ring-yellow-200 px-3" />
                    </textarea>
                </div>

                <div>
                    <label for="tmp_lahir" class="flex gap-2 text-sm font-semibold text-gray-700 mb-1">
                        Tempat Lahir <p class="text-red-500">*</p>
                    </label>
                    <input id="tmp_lahir" type="text" name="tmp_lahir" required
                        class="w-full rounded-md border focus:border-yellow-400 focus:ring focus:ring-yellow-200 px-3" />
                </div>

                <div>
                    <label for="tgl_lahir" class="flex gap-2 text-sm font-semibold text-gray-700 mb-1">
                        Tanggal Lahir <p class="text-red-500">*</p>
                    </label>
                    <input id="tgl_lahir" type="date" name="tgl_lahir" required
                        class="w-full rounded-md border focus:border-yellow-400 focus:ring focus:ring-yellow-200 px-3" />
                </div>

                <div>
                    <label for="nm_ibu" class="flex gap-2 text-sm font-semibold text-gray-700 mb-1">
                        Nama Ibu Kandung <p class="text-red-500">*</p>
                    </label>
                    <input id="nm_ibu" type="text" name="nm_ibu" required
                        class="w-full rounded-md border focus:border-yellow-400 focus:ring focus:ring-yellow-200 px-3" />
                </div>

                <div>
                    <label for="tgl_janji" class="flex gap-2 text-sm font-semibold text-gray-700 mb-1">
                        Tanggal Janji Survey <p class="text-red-500">*</p>
                    </label>
                    <input id="tgl_janji" type="date" name="tgl_janji" required
                        class="w-full rounded-md border focus:border-yellow-400 focus:ring focus:ring-yellow-200 px-3" />
                </div>

            </div>

            <h3 class="text-yellow-400 text-lg font-bold border-b-2 border-yellow-300">Informasi Pinjaman</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="tenor" class="flex gap-2 text-sm font-semibold text-gray-700 mb-1">
                        Tenor <p class="text-red-500">*</p>
                    </label>
                    <!-- Tampilan ke user -->
                    <input type="text" value="{{ $tenor->tenor }} {{ $tenor->satuan }}"
                        class="w-full rounded-md border focus:border-yellow-400 focus:ring focus:ring-yellow-200 px-3"
                        readonly />

                    <!-- Data yang terkirim ke DB -->
                    <input type="hidden" name="tenor" value="{{ $tenor->tenor }}">
                </div>

                <div>
                    <label for="npwp" class="flex gap-2 text-sm font-semibold text-gray-700 mb-1">
                        Punya NPWP? <p class="text-red-500">*</p>
                    </label>
                    <select id="npwp" name="npwp"
                        class="w-full rounded-md border focus:border-yellow-400 focus:ring focus:ring-yellow-200" />
                    <option value="" disabled {{ old('npwp') ? '' : 'selected'}}>Pilih Opsi</option>
                    <option value="ya">Ya</option>
                    <option value="tidak">Tidak</option>
                    </select>
                </div>

                <div>
                    <label for="pekerjaan" class="flex gap-2 text-sm font-semibold text-gray-700 mb-1">
                        Pekerjaan? <p class="text-red-500">*</p>
                    </label>
                    <select id="pekerjaan" name="pekerjaan" required
                        class="w-full rounded-md border focus:border-yellow-400 focus:ring focus:ring-yellow-200" />
                    <option value="" disabled {{ old('pekerjaan') ? '' : 'selected'}}>Pilih Opsi</option>
                    <option value="Peg. Negeri">Peg. Negeri</option>
                    <option value="TNI / Polisi">TNI / Polisi</option>
                    <option value="Peg. Swasta Formal">Peg. Swasta Formal</option>
                    <option value="Peg. Swasta Non Formal">Peg. Swasta Non Formal</option>
                    <option value="Wiraswasta Formal">Wiraswasta Formal</option>
                    <option value="Wiraswasta Non Formal">Wiraswasta Non Formal</option>
                    <option value="Profesional">Profesional</option>
                    <option value="Lain-Lain">Lain-Lain</option>
                    <option value="Pep & High Risk Cust">Pep & High Risk Cust</option>
                    </select>
                </div>

                <div>
                    <label for="lama_bekerja" class="flex gap-2 text-sm font-semibold text-gray-700 mb-1">
                        Lama Bekerja <p class="text-red-500">*</p>
                    </label>
                    {{-- 0 - 2 tahun --}}
                    {{-- 3 - 5 tahun --}}
                    {{-- > 5 tahun --}}
                    {{-- <input id="lama_bekerja" type="text" name="lama_bekerja" required
                        class="w-full rounded-md border focus:border-yellow-400 focus:ring focus:ring-yellow-200 px-3" />
                    --}}
                    <select name="lama_bekerja" id="lama_bekerja"
                        class="w-full rounded-md border focus:border-yellow-400 focus:ring focus:ring-yellow-200"
                        required>
                        <option value="" disabled {{ old('lama_bekerja') ? '' : 'selected'}}>Pilih Opsi</option>
                        <option value="0 - 2 tahun">0 - 2 tahun</option>
                        <option value="3 - 5 tahun">3 - 5 tahun</option>
                        <option value="> 5 tahun">> 5 tahun</option>
                    </select>
                </div>
            </div>

            <h3 class="text-yellow-400 text-lg font-bold border-b-2 border-yellow-300">Informasi Lainnya</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="plat_kendaraan" class="flex gap-2 text-sm font-semibold text-gray-700 mb-1">
                        Plat Kendaaraan <p class="text-red-500">*</p></label>
                    <input type="text" required id="plat_kendaraan" name="plat_kendaraan"
                        class="w-full rounded-md border focus:border-yellow-400 focus:ring focus:ring-yellow-200 px-3">
                </div>
            </div>

            <h3 class="text-yellow-400 text-lg font-bold border-b-2 border-yellow-300">Scan Data Diri</h3>
            <div class="flex flex-col gap-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label for="foto_ktp" class="flex gap-2 text-sm font-semibold text-gray-700 mb-1"> Foto KTP
                        </label>
                        <input type="file" name="foto_ktp" id="foto_ktp"
                            class="w-full rounded-md border focus:border-yellow-400 focus:ring focus:ring-yellow-200 px-3">
                    </div>

                    <div>
                        <label for="foto_stnk" class="flex gap-2 text-sm font-semibold text-gray-700 mb-1"> Foto
                            BPKB/STNK </label>
                        <input type="file" id="foto_stnk" name="foto_stnk"
                            class="w-full rounded-md border focus:border-yellow-400 focus:ring focus:ring-yellow-200 px-3">
                    </div>

                    <div>
                        <label for="foto_stnk" class="flex gap-2 text-sm font-semibold text-gray-700 mb-1"> Foto
                            Kartu Keluarga </label>
                        <input type="file" id="foto_kartu_keluarga" name="foto_kk"
                            class="w-full rounded-md border focus:border-yellow-400 focus:ring focus:ring-yellow-200 px-3">
                    </div>
                </div>
            </div>

            <div class="flex flex-col gap-2">
                <div class="flex gap-2 items-start">
                    <input type="checkbox" id="syaratCheckbox" required>
                    <label for="syaratCheckbox">
                        Dengan ini Saya secara sadar telah membaca dan menyetujui
                        <span class="font-semibold">Syarat & Ketentuan</span> yang berlaku
                    </label>
                </div>
            </div>

            <!-- Tombol Submit -->
            <div class="pt-4 text-center">
                <!-- Button untuk buka modal -->
                <button
                    class="w-full sm:w-auto px-6 py-2 bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold rounded-md shadow-md transition">
                    Ajukan Cicilan
                </button>
            </div>
        </form>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#jumlah_pinjaman').on('input', function () {
                let value = $(this).val().replace(/[^0-9]/g, '');
                if (value === '') {
                    $(this).val('Rp. 0');
                    return;
                }
                const numberValue = parseInt(value, 10);
                $(this).val('Rp. ' + new Intl.NumberFormat('id-ID').format(numberValue));
            }).trigger('input'); // Format nilai awal
        });
    </script>

    <script>
        function openModal() {
            const checkbox = document.getElementById('syaratCheckbox');
            const errorMsg = document.getElementById('errorMsg');

            if (!checkbox.checked) {
                errorMsg.classList.remove('hidden'); // tampilkan error
                return;
            }

            errorMsg.classList.add('hidden'); // sembunyikan error kalau sudah dicentang
            document.getElementById('myModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('myModal').classList.add('hidden');
        }
    </script>

    <script>
        const menuBtn = document.getElementById("menu-button");
        const mobileMenu = document.getElementById("mobile-menu");

        menuBtn.addEventListener("click", () => {
            mobileMenu.classList.toggle("max-h-0");
            mobileMenu.classList.toggle("max-h-40");
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const modal = document.getElementById("modal");
            const closeBtn = document.getElementById("closeModal");
            closeBtn.addEventListener("click", function () {
                modal.style.display = "none";
            });
        });
    </script>
</body>

</html>
