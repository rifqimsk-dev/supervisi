@extends('layout.main')
@section('content')

<div class="body-wrapper">
    <div class="container-fluid">
        <!-- Row -->
        <div class="row">
            <!-- Sales Overview -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="{{ url()->previous() }}" class="btn p-0 bg-white">
                                <i class="ti ti-arrow-left fs-8 me-4"></i>
                            </a>
                            Tambah Akun Baru
                        </h4>
                        <form class="floating-labels mt-4 pt-2" action="{{ route('user.store') }}" method="post">
                            @csrf
                            <div class="form-group mb-4">
                                <input
                                    type="text"
                                    name="name"
                                    value="{{ @old('name') }}"
                                    class="form-control @error('name') is-invalid @enderror"
                                    id="name"
                                />
                                <label for="name">Nama</label>
                                @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group mb-4">
                                <input
                                    type="text"
                                    name="email"
                                    value="{{ @old('email') }}"
                                    class="form-control @error('email') is-invalid @enderror"
                                    id="email"
                                />
                                <label for="email">Email</label>
                                @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group mb-4">
                                <input
                                    type="text"
                                    name="telepon"
                                    value="{{ @old('telepon') }}"
                                    class="form-control @error('telepon') is-invalid @enderror"
                                    id="telepon"
                                />
                                <label for="telepon">No HP</label>
                                @error('telepon')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group mb-4">
                                <input
                                    type="text"
                                    name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    id="password"
                                />
                                <label for="password">Password</label>
                                @error('password')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group mb-4">
                                <label for="role">Role</label>
                                <select name="role" class="form-control @error('role') is-invalid @enderror" id="role">
                                    <option value="" selected disabled></option>
                                    <option value="admin">Admin</option>
                                    <option value="kadep">Kadep</option>
                                    <option value="user">User</option>
                                </select>
                                @error('role')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group mb-4">
                                <label for="departemen_id">Departemen</label>
                                <select name="departemen_id" class="form-control @error('departemen_id') is-invalid @enderror" id="departemen_id">
                                    <option value="" selected disabled></option>
                                    @foreach ($departemen as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group mb-4">
                                <input
                                    type="text"
                                    name="jabatan"
                                    value="{{ @old('jabatan') }}"
                                    class="form-control @error('jabatan') is-invalid @enderror"
                                    id="jabatan"
                                />
                                <label for="jabatan">Jabatan</label>
                                @error('jabatan')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger rounded-2">
                                    <i class="ti ti-send me-2"></i>Simpan
                                </button>
                                <button type="reset" class="btn btn-light rounded-2">
                                    <i class="ti ti-arrow-back-up fs-4 me-2"></i
                                    >Batal
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection