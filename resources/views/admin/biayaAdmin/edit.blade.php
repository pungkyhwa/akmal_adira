<x-layout.admin>
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-home"></i>
                </span>Edit Biaya Admin
            </h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <span></span>Biaya Admin <i
                            class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="row">
            <div class="col-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Biaya Admin</h4>
                        <p class="card-description"> Masukkan sesuai perintah </p>
                        <form class="forms-sample" method="post" action="{{route('biayaAdmin.update', $data->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="exampleInputName1">Rate</label>
                                <select name="id_rate" id="id_rate" class="form-control">
                                    <option value="" disabled {{ old('id_rate') ? '' : 'selected' }}>--Pilih Rate--
                                    </option>
                                    @foreach ($rate as $item)
                                        <option value="{{$item->id}}" {{old('id_rate', $data->id_rate) == $item->id ? 'selected' : ''}}>
                                            {{$item->rate}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_rate')
                                    <div class="text-sm text-red-500">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Tenor</label>
                                <select name="id_tenor" id="id_tenor" class="form-control">
                                    <option value="" disabled {{ old('id_tenor') ? '' : 'selected' }}>--Pilih Tenor--
                                    </option>
                                    @foreach ($tenor as $item)
                                        <option value="{{$item->id}}" {{old('id_tenor', $data->id_tenor) == $item->id ? 'selected' : ''}}>
                                            {{$item->tenor}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_tenor')
                                    <div class="text-sm text-red-500">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="biaya_admin">Biaya Admin</label>
                                <input type="text" name="biaya_admin" class="form-control" id="biaya_admin"
                                    placeholder="Biaya Admin" value="{{$data->biaya_admin}}">
                                @error('biaya_admin')
                                    <div class="text-sm text-red-500">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="min_pinjaman">Minimal Pinjaman</label>
                                <input type="text" name="min_pinjaman" class="form-control" id="min_pinjaman"
                                    placeholder="Minimal Pinjaman" value="{{$data->min_pinjaman}}">
                                @error('min_pinjaman')
                                    <div class="text-sm text-red-500">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="max_pinjaman">Maximal Pinjaman</label>
                                <input type="text" name="max_pinjaman" class="form-control" id="max_pinjaman"
                                    placeholder="Maximal Pinjaman" value="{{$data->max_pinjaman}}">
                                @error('max_pinjaman')
                                    <div class="text-sm text-red-500">
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
</x-layout.admin>
