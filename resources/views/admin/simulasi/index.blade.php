<x-layout.admin>
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-home"></i>
                </span> Tampil Simulasi
            </h3>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Simulasi</h4>
                        <p class="card-description">Tabel Berisi Simulasi</p>
                        <form action="{{ route('simulasi.storeSimulasi') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label>Jenis Kendaraan</label>
                                <select id="jns_kendaraan" class="form-control" name="jnsKendaraan">
                                    <option value="">--Pilih Jenis Kendaraan--</option>
                                    @foreach ($jnsKendaraan as $item)
                                        <option value="{{ $item->id }}">{{ $item->jns_kendaraan }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Merk Kendaraan</label>
                                <select id="merk_kendaraan" class="form-control" name="merkKendaraan">
                                    <option value="">--Pilih Merk Kendaraan--</option>
                                    @foreach ($merkKendaraan as $item)
                                        <option value="{{ $item->id }}">{{ $item->merek_kendaraan }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Tipe Kendaraan</label>
                                <select id="tipe_kendaraan" class="form-control" name="tipeKendaraan">
                                    <option value="">--Pilih Tipe Kendaraan--</option>
                                    @foreach ($tipeKendaraan as $item)
                                        <option value="{{ $item->id }}">{{ $item->tipe_kendaraan }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Tahun Kendaraan</label>
                                <select id="thn_kendaraan" class="form-control" name="thnKendaraan">
                                    <option value="">--Pilih Tahun Kendaraan--</option>
                                    @foreach ($thnKendaraan as $item)
                                        <option value="{{ $item->id }}">{{ $item->tahun_kendaran }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Harga Kendaraan</label>
                                <input type="text" id="harga_kendaraan" class="form-control" name="hargaKendaraan"
                                    readonly>
                            </div>

                            <div class="form-group">
                                <label>Tenor</label>
                                <select id="tenor" class="form-control" name="tenor">
                                    <option value="">--Pilih Tenor--</option>
                                    @foreach ($tenor as $item)
                                        <option value="{{ $item->id }}">{{ $item->tenor }} {{ $item->satuan }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Maksimal Pencairan</label>
                                <input type="text" id="maks_pencairan" class="form-control" name="maksPencairan">
                                <small class="text-muted" id="info-maks"></small>
                            </div>

                            <button class="btn btn-primary" type="submit">Proses</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

            function updateMaksPencairan(harga) {
                let batasMaksimal = Math.floor(harga * 0.8);
                $('#maks_pencairan').val(formatRupiah(batasMaksimal));
                $('#info-maks').text(`Maksimal pencairan: Rp ${formatRupiah(batasMaksimal)}`);
            }

            // Cek jika input maks_pencairan diubah manual
            $('#maks_pencairan').on('input', function () {
                let harga = parseRupiahToNumber($('#harga_kendaraan').val());
                let batasMaksimal = Math.floor(harga * 0.8);
                let nilaiInput = parseRupiahToNumber($(this).val());

                if (nilaiInput > batasMaksimal) {
                    $(this).val(formatRupiah(batasMaksimal));
                } else {
                    $(this).val(formatRupiah(nilaiInput));
                }
            });

            // Load harga kendaraan via AJAX
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
</x-layout.admin>
