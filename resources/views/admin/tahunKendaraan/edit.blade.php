<x-layout.admin>
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-home"></i>
            </span> Update Tahun Kendaraan
            </h3>
            <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                <span></span>Tahun Kendaraan <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                </li>
            </ul>
            </nav>
        </div>

        <div class="row">       
            <div class="col-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tahun Kendaraan</h4>
                        <p class="card-description"> Masukkan sesuai perintah </p>
                        @foreach($tahunKendaraan as $row)
                        <form class="forms-sample" method="post" action="{{route('tahunKendaraan.update',$row->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="exampleInputName1">Tahun Kendaraan</label>
                                <input type="text" name="tahun_kendaraan" class="form-control" value="{{$row->tahun_kendaran}}">
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