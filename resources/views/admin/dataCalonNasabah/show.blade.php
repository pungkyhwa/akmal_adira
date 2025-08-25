<x-layout.admin>
    <style>
        h4.text-purple {
            color: #6f42c1 !important;
        }
    </style>

    <div class="content-wrapper">
        <!-- Header -->
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-home"></i>
                </span>
                Detail Data Calon Nasabah
            </h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <span></span>
                        Data Calon Nasabah
                        <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Content -->
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-5 text-purple">Data Calon Nasabah</h4>

                        <div class="row">
                            <!-- Kolom Kiri -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" value="{{ $data->namaktp }}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label>NIK</label>
                                    <input type="text" value="{{ $data->nik }}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Nomor HP</label>
                                    <input type="text" value="{{ $data->nohp }}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" value="{{ $data->email }}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Provinsi</label>
                                    <input type="text" value="{{ $data->provinsi }}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Kota</label>
                                    <input type="text" value="{{ $data->kota }}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Kecamatan</label>
                                    <input type="text" value="{{ $data->kecamatan }}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Kelurahan</label>
                                    <input type="text" value="{{ $data->kelurahan }}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" value="{{ $data->alamat }}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input type="text" value="{{ $data->tmp_lahir }}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="text" value="{{ $data->tgl_lahir }}" class="form-control" readonly>
                                </div>
                            </div>

                            <!-- Kolom Kanan -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Ibu</label>
                                    <input type="text" value="{{ $data->nm_ibu }}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Janji</label>
                                    <input type="text" value="{{ $data->tgl_janji }}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Merk Kendaraan</label>
                                    <input type="text" value="{{ $data->idMerkKendaraan->merek_kendaraan ?? '-' }}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Tahun Kendaraan</label>
                                    <input type="text" value="{{ $data->idTahunKendaraan->tahun_kendaran ?? '-' }}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Tenor</label>
                                    <input type="text" value="{{ $data->idTenor->tenor ?? '' }} {{ $data->idTenor->satuan ?? '' }}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label>NPWP</label>
                                    <input type="text" value="{{ $data->npwp === 'ya' ? 'Punya NPWP' : 'Tidak Punya NPWP' }}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Pekerjaan</label>
                                    <input type="text" value="{{ $data->pekerjaan }}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Lama Bekerja</label>
                                    <input type="text" value="{{ $data->lama_bekerja }}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Plat Kendaraan</label>
                                    <input type="text" value="{{ $data->plat_kendaraan }}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Foto KTP</label><br>
                                    <a href="{{ asset('fotoKtp/'.$data->foto_ktp) }}" target="_blank" class="btn btn-sm btn-primary">
                                        Lihat Foto
                                    </a>
                                </div>
                                <div class="form-group">
                                    <label>Foto STNK / BPKP</label><br>
                                    <a href="{{ asset('fotoStnkBpkb/'.$data->foto_stnk) }}" target="_blank" class="btn btn-sm btn-primary">
                                        Lihat Foto
                                    </a>
                                </div>
                                <div class="form-group">
                                    <label>Foto Kartu Keluarga</label><br>
                                    <a href="{{ asset('fotoStnkBpkb/'.$data->foto_stnk) }}" target="_blank" class="btn btn-sm btn-primary">
                                        Lihat Foto
                                    </a>
                                </div>
                            </div>
                        </div> <!-- end row -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout.admin>
