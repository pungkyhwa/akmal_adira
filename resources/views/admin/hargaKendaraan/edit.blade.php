<x-layout.admin>
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-home"></i>
                </span> Edit Harga Kendaraan
            </h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <span></span>Harga Kendaraan <i
                            class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="row">
            <div class="col-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Harga Kendaraan</h4>
                        <p class="card-description"> Masukkan sesuai perintah </p>
                        <form class="forms-sample" method="post" action="{{route('hargaKendaraan.update', $data->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="exampleInputName1">Merk Kendaraan</label>
                                <select name="id_merek_kendaraan" id="id_merek_kendaraan" class="form-control">
                                    <option value="" disabled {{ old('id_merek_kendaraan') ? '' : 'selected' }}>--Pilih
                                        Merek Kendaraan--
                                    </option>
                                    @foreach ($merkKendaraan as $item)
                                        <option value="{{$item->id}}" {{old('id_merek_kendaraan', $data->id_merek_kendaraan) == $item->id ? 'selected' : ''}}>
                                            {{$item->merek_kendaraan}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_merek_kendaraan')
                                    <div class="text-danger small">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Tipe Kendaraan</label>
                                <select name="id_tipe_kendaraan" id="id_tipe_kendaraan" class="form-control">
                                    <option value="" disabled {{ old('id_tipe_kendaraan') ? '' : 'selected' }}>--Pilih
                                        Tipe Kendaraan--
                                    </option>
                                    @foreach ($tipeKendaraan as $item)
                                        <option value="{{$item->id}}" {{old('id_tipe_kendaraan', $data->id_tipe_kendaraan) == $item->id ? 'selected' : ''}}>
                                            {{$item->tipe_kendaraan}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_tipe_kendaraan')
                                    <div class="text-danger small">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="id_jns_kendaraan">Jenis Kendaraan</label>
                                <select name="id_jns_kendaraan" id="id_jns_kendaraan" class="form-control">
                                    <option value="" disabled {{ old('id_jns_kendaraan') ? '' : 'selected' }}>--Pilih
                                        Jenis Kendaraan--
                                    </option>
                                    @foreach ($tipeKendaraan as $item)
                                        <option value="{{$item->id}}" {{old('id_jns_kendaraan', $data->id_jns_kendaraan) == $item->id ? 'selected' : ''}}>
                                            {{$item->jns_kendaraan}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_jns_kendaraan')
                                    <div class="text-danger small">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="id_tahun_kendaraan">Tahun Kendaraan</label>
                                <select name="id_tahun_kendaraan" id="id_tahun_kendaraan" class="form-control">
                                    <option value="" disabled {{ old('id_tahun_kendaraan') ? '' : 'selected' }}>--Pilih
                                        Tahun Kendaraan--
                                    </option>
                                    @foreach ($thnKendaraan as $item)
                                        <option value="{{$item->id}}" {{old('id_tahun_kendaraan', $data->id_tahun_kendaraan) == $item->id ? 'selected' : ''}}>
                                            {{$item->tahun_kendaraan}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_tahun_kendaraan')
                                    <div class="text-danger small">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="text" name="harga" class="form-control" id="harga"
                                    placeholder="Minimal Pinjaman" value="{{$data->harga}}">
                                @error('harga')
                                    <div class="text-danger small">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="aktif">Aktif</label>
                                <input type="text" name="aktif" class="form-control" id="aktif"
                                    placeholder="Maximal Pinjaman" value="{{$data->aktif}}">
                                @error('aktif')
                                    <div class="text-danger small">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                            <button class="btn btn-secondary">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </x-layout>
