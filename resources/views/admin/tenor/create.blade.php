<x-layout.admin>
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-home"></i>
            </span> Tambah Tenor
            </h3>
            <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                <span></span>Tenor <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                </li>
            </ul>
            </nav>
        </div>

        <div class="row">       
            <div class="col-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tenor</h4>
                        <p class="card-description"> Masukkan sesuai perintah </p>
                        <form class="forms-sample" method="post" action="{{route('tenor.store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName1">Tenor</label>
                                <input type="text" name="tenor" class="form-control" id="exampleInputName1" placeholder="Hanya Angka ex: 12">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Satuan</label>
                                <input type="text" name="satuan" class="form-control" id="exampleInputEmail3" placeholder="bulan">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Asuransi Rate</label>
                                <select name="asuransiRate" id="" class="form-control">
                                    <option value="">-</option>
                                    @foreach ($query as $row)
                                        <option value="{{$row->id}}">{{$row->asuransi_rate}}{{$row->satuan}}</option>
                                    @endforeach
                                </select>
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