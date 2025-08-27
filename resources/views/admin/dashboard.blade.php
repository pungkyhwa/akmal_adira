<x-layout.admin>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .table-purple thead tr {
            background: linear-gradient(to right, #da8cff, #9a55ff);
            border: 1px solid #9b9b9b;

        }

        .table-purple thead th {
            background: transparent;
            color: white;
            text-align: center;
            vertical-align: middle;
        }

        /* Striping dan hover */
        .table-striped>tbody>tr:nth-of-type(odd) {
            background-color: #f2f0f5;
            text-align: center;
            border: 1px solid #9b9b9b;
        }

        .table-striped>tbody>tr:nth-of-type(even) {
            background-color: #ffffff;
            text-align: center;
            border: 1px solid #9b9b9b;
        }

        .table-purple tbody tr:hover {
            background-color: #e2d6f3;
        }

        /* Pagination ungu */
        .pagination .page-link {
            color: #6f42c1;
        }

        .pagination .page-item.active .page-link {
            background-color: #6f42c1;
            border-color: #6f42c1;
            color: white;
        }

        .pagination .page-link:hover {
            background-color: #6f42c1;
            color: white;
        }


        .search-bar {
            max-width: 300px;
        }

        h4.text-purple {
            color: #6f42c1 !important;
        }
    </style>
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-home"></i>
                </span> Dashboard
            </h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <span></span>Overview <i
                            class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                    <div class="card-body">
                        <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Calon Nasabah Terdaftar <i
                                class="fa fa-user-o fa-1x float-end"></i>
                        </h4>
                        <h2 class="mb-5">{{ $totalCalonNasabah }}</h2>
                        <h6 class="card-text d-flex align-items-center gap-2"><i
                                class="fa fa-arrow-circle-o-right"></i><a href="{{ route('dataCalonNasabah.index')}}"
                                class="text-white text-decoration-none">Data Calon Nasabah</a></h6>
                    </div>
                </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                    <div class="card-body">
                        <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Nasabah Terdaftar Bulan Ini <i
                                class="fa fa-users fa-1x float-end"></i>
                        </h4>
                        <h2 class="mb-5">{{ $totalCalonNasabahBulanIni }}</h2>
                        <h6 class="card-text d-flex align-items-center gap-2"><i
                                class="fa fa-arrow-circle-o-right"></i><a href="{{ route('dataCalonNasabah.index')}}"
                                class="text-white text-decoration-none">Data Calon Nasabah</a></h6>
                    </div>
                </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                    <div class="card-body">
                        <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Pengunjung Website Hari Ini <i
                                class="fa fa-user-o fa-1x float-end"></i>
                        </h4>
                        <h2 class="mb-5">{{ $visitorHariIni }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Calon Nasabah Terbaru</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-purple">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Calon Nasabah</th>
                                        <th>Tenor</th>
                                        <th>Pinjaman</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data as $row)
                                        <tr>
                                            <td>{{ ($data->currentPage() - 1) * $data->perPage() + $loop->iteration }}
                                            </td>
                                            <td>{{$row->namaktp}}</td>
                                            <td>{{$row->idTenor->tenor}} {{$row->idTenor->satuan}}</td>
                                            <td>{{number_format($row->jumlah_pinjaman, 0, ',', '.')}}</td>
                                            <td>
                                                <div class="d-flex justify-content-center gap-2 flex-wrap">
                                                    <a href="{{route('dataCalonNasabah.show', $row->id)}}"
                                                        class="btn btn-success">Detail</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">Belum Ada Data.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <br>
                        <!-- Pagination & Info Jumlah Data -->
                        {{-- <div class="d-flex justify-content-between align-items-center">
                            <div class="text-muted">
                                Menampilkan data ke {{ $data->firstItem() }} sampai
                                {{ $data->lastItem() }} dari total {{ $data->total() }} data.
                            </div>
                            <div>
                                {{ $data->appends(['search' => request('search')])->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</x-layout.admin>
