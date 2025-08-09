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
                </span> Tampil Biaya Admin
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
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Biaya Admin</h4>
                        <p class="card-description">Tabel Berisi Biaya Admin</p>

                        <!-- Search -->
                        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">

                            <!-- Tombol Tambah Data (kiri) -->
                            <a class="btn btn-gradient-primary me-2" href="{{ route('biayaAdmin.create') }}">
                                Tambah Data
                            </a>

                            <!-- Form Search (kanan) -->
                            <form action="{{ route('biayaAdmin.index') }}" method="GET" class="d-flex mb-3">
                                <div class="input-group">
                                    <input type="text" name="cari" class="form-control search-bar"
                                        placeholder="Cari...">
                                    <button class="btn btn-gradient-primary" type="submit">Cari</button>
                                </div>
                            </form>

                        </div>

                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-purple">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Rate</th>
                                        <th>Tenor</th>
                                        <th>Biaya Admin</th>
                                        <th>Minimal Pinjaman</th>
                                        <th>Maximal Pinjaman</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($data as $row)
                                        <tr>
                                            <td>{{ ($data->currentPage() - 1) * $data->perPage() + $loop->iteration }}</td>
                                            <td>{{$row->rate->rate}}</td>
                                            <td>{{$row->tenor->tenor}}</td>
                                            <td>{{$row->biaya_admin}}</td>
                                            <td>{{$row->min_pinjaman}}</td>
                                            <td>{{$row->max_pinjaman}}</td>
                                            <td>
                                                <div class="d-flex justify-content-center gap-2 flex-wrap">
                                                    <a href="{{route('biayaAdmin.edit', $row->id)}}"
                                                        class="btn btn-success">edit</a>
                                                    <form action="{{route('biayaAdmin.destroy', $row->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">hapus</button>
                                                    </form>
                                                </div>

                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7">Data Belum Ditambahkan.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <br>
                        <!-- Pagination & Info Jumlah Data -->
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-muted">
                                Menampilkan data ke {{ $data->firstItem() }} sampai {{ $data->lastItem() }} dari total
                                {{ $data->total() }} data.
                            </div>
                            <div>
                                {{ $data->appends(['search' => request('search')])->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </x-layout>
