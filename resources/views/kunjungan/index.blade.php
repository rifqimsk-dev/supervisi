@extends('layout.main')
@section('content')

    
<div class="body-wrapper">
    <div class="container-fluid">
        <!-- Row -->
        <div class="row">
            <!-- Sales Overview -->
            <div class="col-lg-12">
                <div class="datatables">
                    <!-- start Zero Configuration -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Data Kunjungan <span class="badge text-bg-dark"><i class="me-2 ti ti-calendar"></i>Desember</span></h4>
                            <a href="{{ route('kunjungan.create') }}" class="btn btn-outline-danger mt-2">
                                <i class="ti ti-plus"></i> Data Baru
                            </a>
                            <a href="" class="btn btn-light mt-2">
                                <i class="ti ti-database-export"></i> Export
                            </a>
                            <a href="" class="btn btn-light mt-2">
                                <i class="ti ti-filter"></i> Filter
                            </a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive mt-3">
                                <table
                                    id="zero_config"
                                    class="table text-nowrap align-middle"
                                >
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Nama</th>
                                            <th>Dealer</th>
                                            <th>Tujuan</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i=0; $i < 10; $i++)
                                        <tr>
                                            <td>12/12/2025</td>
                                            <td>
                                                <span class="fw-semibold">Rifaldi</span>
                                                <span class="d-block fs-2">IT Development</span>
                                                <span class="d-block fs-2">Programmer</span>
                                            </td>
                                            <td>
                                                <span class="fw-semibold">MPS Pandeglang</span>
                                                <span class="d-block fs-2">Jl. Raya Pandeglang - Serang, Karangtanjung, Pandeglang, Banten</span>
                                            </td>
                                            <td>Monitoring dealer</td>
                                            <td>
                                                <span class="badge bg-warning-subtle text-warning fs-2">Waiting</span>
                                            </td>
                                            <td>
                                                <ul class="list-unstyled mb-0 d-flex align-items-center">
                                                    <li class="position-relative" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Detail">
                                                        <a class="text-dark px-2 fs-5 bg-hover-primary nav-icon-hover position-relative z-index-5" href="{{ route('kunjungan.show', 1) }}">
                                                            <i class="ti ti-search"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- end Zero Configuration -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection