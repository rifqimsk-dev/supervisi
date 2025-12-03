@extends('layout.main')
@section('content')
    
<div class="body-wrapper">
    <div class="container-fluid">
        <!-- Row -->
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="px-4 py-3 border-bottom">
                        <h4 class="card-title mb-0">Kunjungan <span class="badge bg-warning float-end"><i class="ti ti-clock me-1"></i>Waiting</span></h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-4 row">
                            <label class="form-label col-sm-3 fw-medium">Nama</label>
                            <div class="col-sm-9">
                                <span class="fw-semibold">Rifaldi</span>
                                <span class="d-block fs-2">IT Development</span>
                                <span class="d-block fs-2">Programmer</span>
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label class="form-label col-sm-3 fw-medium">Dealer</label>
                            <div class="col-sm-9">
                                <span class="fw-semibold">MPS Pandeglang</span>
                                <span class="d-block fs-2">Jl. Raya Pandeglang - Serang, Karangtanjung, Pandeglang, Banten</span>
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label class="form-label col-sm-3 fw-medium">Tujuan</label>
                            <div class="col-sm-9">
                                <span>Monitoring Dealer</span>
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label class="form-label col-sm-3 fw-medium">Inventaris yg digunakan</label
                            >
                            <div class="col-sm-9">
                                Mobil kantor
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#approve" class="btn btn-danger"><i class="ti ti-check me-1"></i>Approve</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card">
                    <div class="px-4 py-3 border-bottom">
                        <h4 class="card-title mb-0">Isi Temuan Dealer</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-4 row">
                            <label class="form-label col-sm-2 fw-medium">People</label>
                            <div class="col-sm-6">
                                <textarea name="" id="people" class="form-control" style="border: 1px solid #d0d0d0" cols="30" rows="10"></textarea>
                            </div>
                            <div class="col-sm-4">
                                <input type="file" name="" id="" class="form-control form-control-file">
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label class="form-label col-sm-2 fw-medium">Premises</label>
                            <div class="col-sm-6">
                                <textarea name="" id="premises" class="form-control" style="border: 1px solid #d0d0d0" cols="30" rows="10"></textarea>
                            </div>
                            <div class="col-sm-4">
                                <input type="file" name="" id="" class="form-control form-control-file">
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label class="form-label col-sm-2 fw-medium">Process</label>
                            <div class="col-sm-6">
                                <textarea name="" id="process" class="form-control" style="border: 1px solid #d0d0d0" cols="30" rows="10"></textarea>
                            </div>
                            <div class="col-sm-4">
                                <input type="file" name="" id="" class="form-control form-control-file">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-10">
                                <button class="btn btn-danger"><i class="ti ti-check me-1"></i>Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
            <form action="" method="POST" class="floating-labels">
                <div class="modal-body">
                    @csrf
                    <div class="form-group mb-4">
                        <input
                            type="text"
                            name="catatatan"
                            class="form-control @error('catatatan') is-invalid @enderror"
                            id="catatatan"
                        />
                        <span class="bar"></span>
                        <label for="catatan">Masukkan catatan</label>
                        @error('catatan')
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