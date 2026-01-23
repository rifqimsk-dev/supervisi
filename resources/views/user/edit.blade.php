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
                            Detail dan Update User
                        </h4>
                        <form class="floating-labels mt-4 pt-2" action="{{ route('user.update', encrypt($user->id)) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-4">
                                <label for="name">Nama</label>
                                <input
                                    type="text"
                                    name="name"
                                    value="{{ @old('name', $user->name) }}"
                                    class="form-control @error('name') is-invalid @enderror"
                                    id="name"
                                />
                                @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group mb-4">
                                <label for="email">Email</label>
                                <input
                                    type="text"
                                    name="email"
                                    value="{{ @old('email', $user->email) }}"
                                    class="form-control @error('email') is-invalid @enderror"
                                    id="email"
                                />
                                @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group mb-4">
                                <label for="telepon">No HP</label>
                                <input
                                    type="text"
                                    name="telepon"
                                    value="{{ @old('telepon', $user->telepon) }}"
                                    class="form-control @error('telepon') is-invalid @enderror"
                                    id="telepon"
                                />
                                @error('telepon')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group mb-4">
                                <label for="password">Password</label>
                                <input
                                    type="text"
                                    name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    id="password"
                                />
                                <small>Isi jika mengubah password</small>
                                @error('password')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group mb-4">
                                <label for="role">Role</label>
                                <select name="role" class="form-control @error('role') is-invalid @enderror" id="role">
                                    <option value="" selected disabled>Pilih Role</option>
                                    <option {{ ($user->role == 'admin') ? 'selected' : '' }} value="admin">Admin</option>
                                    <option {{ ($user->role == 'kadep') ? 'selected' : '' }} value="kadep">Kadep</option>
                                    <option {{ ($user->role == 'user') ? 'selected' : '' }} value="user">User</option>
                                </select>
                                @error('role')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group mb-4">
                                <label for="departemen_id">Departemen</label>
                                <select name="departemen_id" class="form-control @error('departemen_id') is-invalid @enderror" id="departemen_id">
                                    <option value="" selected disabled>Pilih Departemen</option>
                                    @foreach ($departemen as $row)
                                    <option {{ $user->departemen_id == $row->id ? 'selected' : '' }} value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group mb-4">
                                <label for="jabatan">Jabatan</label>
                                <input
                                    type="text"
                                    name="jabatan"
                                    value="{{ @old('jabatan', $user->jabatan) }}"
                                    class="form-control @error('jabatan') is-invalid @enderror"
                                    id="jabatan"
                                />
                                @error('jabatan')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">
                                    <i class="ti ti-send me-2"></i>Simpan
                                </button>
                                <a href="" data-bs-toggle="modal" data-bs-target="#hapus" class="btn bg-danger-subtle text-danger float-end"><i class="ti ti-trash"></i> Hapus</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="hapus" tabindex="-1" aria-labelledby="hapus" aria-hidden="true">
    <div class="modal-dialog modal-m">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="myModalLabel">
                    Hapus Data
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4>Apakah anda yakin ingin menghapus data ini ?</h4>
                <p>
                    Data akan dihapus secara permanen dan tidak bisa dipulihkan kembali
                </p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('user.destroy', encrypt($user->id)) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn bg-danger-subtle text-danger  waves-effect">
                        <i class="ti ti-trash"></i> 
                        Ya, Hapus
                    </button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@endsection