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
            Jenis Program Cicilan :
        </h1>

        <form action="{{ route('simulasi.storeDataCalonNasabah')}}" method="POST"
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
                        name="jumlah_pinjaman" id="jumlah_pinjaman" value="Rp. 0">
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
                    <label for="noktp" class="flex text-sm font-semibold text-gray-700 mb-1 gap-2">
                        No KTP <p class="text-red-500">*</p>
                    </label>
                    <input type="text"
                        class="w-full rounded-md border focus:border-yellow-400 focus:ring focus:ring-yellow-200 px-3"
                        id="noktp" name="noktp">
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

            <h3 class="text-lg text-yellow-400 font-bold border-b-2 border-yellow-300">Informasi Jaminan</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="merk_kendaraan" class="flex gap-2 text-sm font-semibold text-gray-700 mb-1">
                        Merk Kendaraan <p class="text-red-500">*</p>
                    </label>
                    <select id="merk_kendaraan" type="text" name="merk_kendaraan" required
                        class="w-full rounded-md border focus:border-yellow-400 focus:ring focus:ring-yellow-200" />
                    <option value="" disabled {{old('merk_kendaraan') ? '' : 'selected'}}>Pilih Merk</option>
                    @foreach ($merkKendaraan as $item)
                        <option value="{{$item->id}}" {{ old('merk_kendaraan') == $item->id ? 'selected' : ''}}>{{$item->merek_kendaraan}}</option>
                    @endforeach
                    </select>
                </div>
                <div>
                    <label for="thn_kendaraan" class="flex gap-2 text-sm font-semibold text-gray-700 mb-1">
                        Tahun Kendaraan<p class="text-red-500">*</p>
                    </label>
                    <select id="thn_kendaraan" type="text" name="thn_kendaraan" required
                        class="w-full rounded-md border focus:border-yellow-400 focus:ring focus:ring-yellow-200" />
                    <option value="">Contoh: 2016</option>
                    </select>
                </div>
            </div>

            <h3 class="text-yellow-400 text-lg font-bold border-b-2 border-yellow-300">Informasi Pinjaman</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="tenor" class="flex gap-2 text-sm font-semibold text-gray-700 mb-1">
                        Tenor <p class="text-red-500">*</p>
                    </label>
                    <select id="tenor" type="text" name="tenor" required
                        class="w-full rounded-md border focus:border-yellow-400 focus:ring focus:ring-yellow-200" />
                    <option value="" disabled {{old('tenor') ? '' : 'selected'}}>Pilih Opsi</option>
                    @foreach ($tenor as $item)
                        <option value="{{ $item->id }}" {{old('tenor') == $item->id ? 'selected' : ''}}>{{$item->tenor}} {{$item->satuan}}
                        </option>
                    @endforeach
                    </select>
                </div>

                <div>
                    <label for="npwp" class="flex gap-2 text-sm font-semibold text-gray-700 mb-1">
                        Punya NPWP? <p class="text-red-500">*</p>
                    </label>
                    <select id="npwp" type="text" name="npwp"
                        class="w-full rounded-md border focus:border-yellow-400 focus:ring focus:ring-yellow-200" />
                    <option value=""></option>
                    </select>
                </div>

                <div>
                    <label for="pekerjaan" class="flex gap-2 text-sm font-semibold text-gray-700 mb-1">
                        Pekerjaan? <p class="text-red-500">*</p>
                    </label>
                    <select id="pekerjaan" type="text" name="pekerjaan" required
                        class="w-full rounded-md border focus:border-yellow-400 focus:ring focus:ring-yellow-200" />
                    <option value=""></option>
                    </select>
                </div>

                <div>
                    <label for="lama_bekerja" class="flex gap-2 text-sm font-semibold text-gray-700 mb-1">
                        Lama Bekerja <p class="text-red-500">*</p>
                    </label>
                    <input id="lama_bekerja" type="text" name="lama_bekerja" required
                        class="w-full rounded-md border focus:border-yellow-400 focus:ring focus:ring-yellow-200" />
                </div>
            </div>

            <h3 class="text-yellow-400 text-lg font-bold border-b-2 border-yellow-300">Informasi Lainnya</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="plat_kendaraan" class="flex gap-2 text-sm font-semibold text-gray-700 mb-1">
                        Plat Kendaaraan <p class="text-red-500">*</p></label>
                    <input type="text" required id="plat_kendaraan" name="plat_kendaraan"
                        class="w-full rounded-md border focus:border-yellow-400 focus:ring focus:ring-yellow-200">
                </div>
            </div>

            <h3 class="text-yellow-400 text-lg font-bold border-b-2 border-yellow-300">Scan Data Diri</h3>
            <div class="flex flex-col gap-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label for="foto_ktp" class="flex gap-2 text-sm font-semibold text-gray-700 mb-1"> Foto KTP
                        </label>
                        <input type="file" name="foto_kip" id="foto_kip"
                            class="w-full rounded-md border focus:border-yellow-400 focus:ring focus:ring-yellow-200">
                    </div>

                    <div>
                        <label for="foto_stnk" class="flex gap-2 text-sm font-semibold text-gray-700 mb-1"> Foto
                            BPKB/STNK </label>
                        <input type="file" id="foto_stnk" name="foto_stnk"
                            class="w-full rounded-md border focus:border-yellow-400 focus:ring focus:ring-yellow-200">
                    </div>
                </div>

                <div>
                    <label for="voucher">Voucher Code</label>
                    <input type="text"
                        class="w-full rounded-md border focus:border-yellow-400 focus:ring focus:ring-yellow-200"
                        id="voucher" name="voucher">
                </div>
            </div>

            <div class="flex gap-2">
                <input type="checkbox">
                <label for="">Dengan ini Saya secara sadar telah membaca dan menyetujui Syarat & ketentuan yang
                    berlaku</label>
            </div>

            <!-- Tombol Submit -->
            <div class="pt-4 text-center">
                <button type="submit"
                    class="w-full sm:w-auto px-6 py-2 bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold rounded-md shadow-md transition">
                    Ajukan Cicilan
                </button>
            </div>
        </form>
    </main>


    <!-- FOOTER -->
    <footer class="bg-gray-600 text-white py-10 px-6 mt-10 text-sm md:text-base w-full">
        <div class="max-w-6xl mx-auto grid gap-10 md:grid-cols-3">

            <!-- Kontak -->
            <div>
                <div class="flex items-start gap-4">
                    <img src="{{ asset('landing_page/live-chat.png')}}" alt="Live Chat"
                        class="w-12 h-12 object-contain" />
                    <div>
                        <p class="font-bold">Call Center Adira</p>
                        <p>08xxxxxxxxxx</p>
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
                <p class="text-sm">Bambang Marimo - ID AXI 01320102302</p>
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
</body>

</html>
