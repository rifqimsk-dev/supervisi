@extends('layout.main')
@section('content')

<style>
    .form-izin {
        font-family: Arial, Helvetica, sans-serif;
        color: #000;
    }
    .ttd {
        font-size: 12px;
        margin-top: 30px;
        font-family: Arial, Helvetica, sans-serif;
        color: #000;
    }
</style>
    
<div class="body-wrapper">
    <div class="container-fluid">
        <!-- Row -->
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="px-4 py-3 border-bottom">
                        <h4 class="card-title mb-0">
                            Kunjungan 
                            @php
                                $color = match($kunjungan->status) {
                                    'waiting'   => 'warning',
                                    'approved'  => 'success',
                                    default     => 'slate'
                                };

                                $view_temuan = match(Auth::user()->role) {
                                    'kadep'   => 'd-none',
                                    'user'  => '',
                                    default     => ''
                                };

                                $disable_temuan = match(Auth::user()->role) {
                                    'kadep'   => 'readonly',
                                    'user'  => '',
                                    default     => ''
                                };
                            @endphp
                            <span class="badge bg-{{ $color }} float-end">
                                {{ $kunjungan->status }}
                            </span>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-4 row">
                            <label class="form-label col-sm-3 fw-medium">Nama</label>
                            <div class="col-sm-9">
                                <span class="fw-semibold">{{ $kunjungan->user->name }}</span>
                                <span class="d-block fs-2">{{ $kunjungan->user->departemen->name }}</span>
                                <span class="d-block fs-2">{{ $kunjungan->user->jabatan }}</span>
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label class="form-label col-sm-3 fw-medium">Dealer</label>
                            <div class="col-sm-9">
                                <span class="fw-semibold">{{ $kunjungan->dealer->dealer_name }}</span>
                                <span class="d-block fs-2">{{ $kunjungan->alamat }}</span>
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label class="form-label col-sm-3 fw-medium">Tujuan</label>
                            <div class="col-sm-9">
                                <span>{{ $kunjungan->tujuan }}</span>
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label class="form-label col-sm-3 fw-medium">Inventaris yg digunakan</label
                            >
                            <div class="col-sm-9">
                                {{ $kunjungan->inventaris->name }}
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label class="form-label col-sm-3 fw-medium">Tanggal</label
                            >
                            <div class="col-sm-9">
                                {{ \Carbon\Carbon::parse($kunjungan->tanggal)->locale('id')->translatedFormat('l, d F Y') }}
                            </div>
                        </div>

                        @if ($kunjungan->status == "approved" && Auth::user()->role == "user")
                            <a href="{{ route('kunjungan.download', encrypt($kunjungan->id)) }}" class="btn btn-sm btn-danger" target="_blank"><i class="ti ti-download"></i> Download</a>
                        @endif
                        
                        @if (Auth::user()->role == "kadep")
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#approve" class="btn btn-danger"><i class="ti ti-check me-1"></i>Approve</button>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            @if ($kunjungan->status == "approved")
            <div class="col-lg-12">
                <div class="card">
                    <div class="px-4 py-3 border-bottom">
                        <h4 class="card-title mb-0">Isi Temuan Dealer</h4>
                    </div>

                    <form action="{{ route('temuan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="kunjungan_id" value="{{ $kunjungan->id }}">
                        <div class="card-body">
                            <div class="mb-4 row">
                                <label class="form-label col-sm-2 fw-medium">People</label>
                                <div class="col-sm-6">
                                    <textarea name="people" id="people" class="form-control" {{ $disable_temuan }} style="border: 1px solid #d0d0d0" cols="30" rows="10">{{ old('people', $temuan->people ?? '') }}</textarea>
                                </div>
                                <div class="col-sm-4">
                                    <input type="file" name="file_people" id="" class="form-control mb-2 {{ $view_temuan }} form-control-file">
                                    <img src="{{ asset('storage/'.$temuan->file_people) }}" class="rounded-2" width="100%">
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label class="form-label col-sm-2 fw-medium">Premises</label>
                                <div class="col-sm-6">
                                    <textarea name="premises" id="premises" class="form-control" {{ $disable_temuan }} style="border: 1px solid #d0d0d0" cols="30" rows="10">{{ old('premises', $temuan->premises ?? '') }}</textarea>
                                </div>
                                <div class="col-sm-4">
                                    <input type="file" name="file_premises" id="" class="form-control mb-2 {{ $view_temuan }} form-control-file">
                                    <img src="{{ asset('storage/'.$temuan->file_premises) }}" class="rounded-2" width="100%">
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label class="form-label col-sm-2 fw-medium">Process</label>
                                <div class="col-sm-6">
                                    <textarea name="process" id="process" class="form-control" {{ $disable_temuan }} style="border: 1px solid #d0d0d0" cols="30" rows="10">{{ old('process', $temuan->process ?? '') }}</textarea>
                                </div>
                                <div class="col-sm-4">
                                    <input type="file" name="file_process" id="" class="form-control mb-2 {{ $view_temuan }} form-control-file">
                                    <img src="{{ asset('storage/'.$temuan->file_process) }}" class="rounded-2" width="100%">
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-10">
                                    <button class="btn btn-danger {{ $view_temuan }}"><i class="ti ti-check me-1"></i>Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endif
            
        </div>
    </div>
</div>

<div class="modal fade" id="approve" tabindex="-1" aria-labelledby="tambah" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="myModalLabel">
                    Approve Izin Kunjungan
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('kunjungan.approve', encrypt($kunjungan->id)) }}" method="POST" class="floating-labels">
                <div class="modal-body">
                    @csrf
                    @method('PATCH')
                    <div class="form-group mb-4">
                        <input type="text" name="catatan_status" class="form-control @error('catatan_status') is-invalid @enderror" id="catatan_status"/>
                        <span class="bar"></span>
                        <label for="catatan_status">Masukkan status</label>
                        @error('catatan_status')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" id="btn-save">
                        <i class="ti ti-check"></i> 
                        Approve
                    </button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@endsection