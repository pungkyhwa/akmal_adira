<x-layout.admin>
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-home"></i>
            </span> Update Tipe Kendaraan
            </h3>
            <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                <span></span>Tipe Kendaraan <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                </li>
            </ul>
            </nav>
        </div>

        <div class="row">       
            <div class="col-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tipe Kendaraan</h4>
                        <p class="card-description"> Masukkan sesuai perintah </p>
                        @foreach($tipeKendaraan as $row)
                        <form class="forms-sample" method="post" action="{{route('tipeKendaraan.update',$row->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="exampleInputName1">Tipe Kendaraan</label>
                                <input type="text" name="tipe_kendaraan" class="form-control" value="{{$row->tipe_kendaraan}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Kode Tipe</label>
                                <input type="text" name="kode_tipe" class="form-control" value="{{$row->kode_tipe}}">
                            </div>
                            
                                <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                                <button class="btn btn-secondary">Cancel</button>
                        </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>