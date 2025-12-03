@extends('layout.main')
@section('content')

<div class="body-wrapper">
    <div class="container-fluid">
        <!-- -------------------------------------------------------------- -->
        <!-- Breadcrumb -->
        <!-- -------------------------------------------------------------- -->
        <div
            class="font-weight-medium shadow-none position-relative overflow-hidden mb-7"
        >
            <div class="card-body px-0">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="font-weight-medium mb-0">Dashboard</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a
                                        class="text-muted text-decoration-none"
                                        href=""
                                        >Home
                                    </a>
                                </li>
                                <li
                                    class="breadcrumb-item text-muted"
                                    aria-current="page"
                                >
                                    Dashboard
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Row -->
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body p-9">
                        <div class="hstack gap-9">
                            <div class="round-56 rounded-circle text-white d-flex align-items-center justify-content-center text-bg-danger">
                                <i class="ti ti-trending-up fs-6"></i>
                            </div>
                            <div class="align-self-center">
                                <h3 class="mb-1 fs-6">8</h3>
                                <span class="text-muted">Kunjungan Hari Ini</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body p-9">
                        <div class="hstack gap-9">
                            <div class="round-56 rounded-circle text-white d-flex align-items-center justify-content-center text-bg-warning">
                                <i class="ti ti-trending-up fs-6"></i>
                            </div>
                            <div class="align-self-center">
                                <h3 class="mb-1 fs-6">10</h3>
                                <span class="text-muted">Kunjungan Bulan Ini</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body p-9">
                        <div class="hstack gap-9">
                            <div class="round-56 rounded-circle text-white d-flex align-items-center justify-content-center text-bg-info">
                                <i class="ti ti-trending-up fs-6"></i>
                            </div>
                            <div class="align-self-center">
                                <h3 class="mb-1 fs-6">18</h3>
                                <span class="text-muted">Total Kunjungan</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection