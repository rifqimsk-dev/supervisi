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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body p-9">
                        Selamat datang
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection