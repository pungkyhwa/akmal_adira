<x-layout.admin>
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-home"></i>
            </span> Tambah Biaya Mitra
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
                        <h4 class="card-title">Fee Aksi</h4>
                        <p class="card-description"> Masukkan sesuai perintah </p>
                        <form class="forms-sample" method="post" action="{{route('biayaMitra.store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName1">Fee Mitra</label>
                                <input type="text" name="biaya_mitra" class="harga form-control" placeholder="Hanya Angka ex: 5000000">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Minimal Pinjaman</label>
                                <input type="text" name="min_pinjaman" class="harga form-control" placeholder="Hanya Angka ex: 5000000">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Maximal Pinjaman</label>
                                <input type="text" name="max_pinjaman" class="harga form-control" placeholder="Hanya Angka ex: 5000000">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Tenor</label>
                                <select name="id_tenor" id="" class="form-control">
                                    <option value="">-</option>
                                    @foreach ($tenor as $row)
                                        <option value="{{$row->id}}">{{$row->tenor}} {{$row->satuan}}</option>
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
