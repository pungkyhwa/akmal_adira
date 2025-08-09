<x-layout.admin>
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-home"></i>
            </span> Update Biaya Mitra
            </h3>
            <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                <span></span>Fee Admin <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                </li>
            </ul>
            </nav>
        </div>

        <div class="row">       
            <div class="col-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Fee Admin</h4>
                        <p class="card-description"> Masukkan sesuai perintah </p>
                        @foreach($biayaMitra as $row)
                        <form class="forms-sample" method="post" action="{{route('biayaMitra.update',$row->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="exampleInputName1">Fee Mitra</label>
                                <input type="text" name="biaya_mitra" class="harga form-control" value="{{$row->biaya_mitra}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Minimal Pinjaman</label>
                                <input type="text" name="min_pinjaman" class="harga form-control" value="{{$row->min_pinjaman}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Maximal Pinjaman</label>
                                <input type="text" name="max_pinjaman" class="harga form-control" value="{{$row->max_pinjaman}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Tenor</label>
                                <select name="id_tenor" id="" class="form-control">
                                    <option value="{{$row->tenor->id}}">{{$row->tenor->tenor}} {{$row->tenor->satuan}}</option>
                                    @foreach ($tenor as $row1)
                                        <option value="{{$row1->id}}">{{$row1->tenor}} {{$row1->satuan}}</option>
                                    @endforeach
                                </select>
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
    <script src="https://cdn.jsdelivr.net/npm/autonumeric@4.10.5/dist/autoNumeric.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new AutoNumeric.multiple('.harga', {
                digitGroupSeparator: '.',     // Pemisah ribuan → titik
                decimalCharacter: ',',        // Pemisah desimal → koma
                decimalPlaces: 0,              // Jumlah angka desimal
                modifyValueOnWheel: false      // Nonaktifkan scroll ubah nilai
            });
            
        });
    </script>
</x-layout>