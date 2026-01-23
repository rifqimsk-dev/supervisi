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
                            <h4 class="card-title">Manajemen User</h4>
                            <a href="{{ route('user.create') }}" class="btn btn-outline-danger mt-2">
                                <i class="ti ti-plus"></i> User Baru
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
                                            <th>Nama</th>
                                            <th>Departemen</th>
                                            <th>Jabatan</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($user as $row)
                                        <tr>
                                            <td>
                                                <span class="fw-semibold">{{ $row->name }}</span>
                                                <span class="d-block fs-2">{{ $row->email }}</span>
                                            </td>
                                            <td>{{ $row->departemen->name }}</td>
                                            <td>{{ $row->jabatan }}</td>
                                            <td>{{ $row->role }}</td>
                                            <td>
                                                @if($row->status === 1)
                                                <span class="badge bg-success-subtle text-success fs-2">
                                                    <i class="ti ti-user"></i> Active
                                                </span>
                                                @else
                                                <span class="badge bg-danger-subtle text-danger fs-2">
                                                    <i class="ti ti-user"></i> Suspend
                                                </span>
                                                @endif
                                            </td>
                                            <td>
                                                <ul class="list-unstyled mb-0 d-flex align-items-center">
                                                    <li class="position-relative" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Detail">
                                                        <a class="text-dark px-2 fs-5 bg-hover-primary nav-icon-hover position-relative z-index-5" href="{{ route('user.edit', encrypt($row->id)) }}">
                                                            <i class="ti ti-search"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        @endforeach
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