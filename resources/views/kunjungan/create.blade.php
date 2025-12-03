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
                            <a href="{{ url()->previous() }}" class="btn p-0">
                                <i class="ti ti-arrow-left fs-8 me-4"></i>
                            </a>
                            Tambah Kunjungan Baru
                        </h4>
                        <form class="mt-4 pt-2">
                            <div class="form-group mb-4">
                                <label class="fw-semibold mb-2" for="tanggal">Tanggal</label>
                                <input
                                    type="date"
                                    name="tanggal"
                                    class="form-control"
                                    id="tanggal"
                                    value="{{ date('Y-m-d') }}"
                                />
                            </div>
                            <div class="form-group mb-4">
                                <label class="fw-semibold mb-2" for="Nama">Departemen</label>
                                <select name="departemen" id="departemen" class="form-control">
                                    <option value="" disabled selected>Pilih Departemen</option>
                                    <option value="">IT</option>
                                </select>
                            </div>
                            <label class="fw-semibold mb-2" for="Nama">Nama</label>
                            <div class="form-group mb-4">
                                <input
                                    type="text"
                                    name="nama"
                                    class="form-control"
                                    id="Nama"
                                    placeholder="Masukkan Nama"
                                />
                            </div>
                            <div class="form-group mb-4">
                                <label class="fw-semibold mb-2" for="Nama">Dealer</label>
                                <select name="dealer" id="dealer" class="form-control">
                                    <option value="" disabled selected>Pilih Dealer</option>
                                    <option value="">MPS Pandeglang</option>
                                </select>
                            </div>
                            <label class="fw-semibold mb-2" for="tujuan">Tujuan</label>
                            <div class="form-group mb-4">
                                <input
                                    type="text"
                                    name="tujuan"
                                    class="form-control"
                                    id="tujuan"
                                    placeholder="Masukkan Tujuan"
                                />
                            </div>
                            <div class="form-group mb-4">
                                <label class="fw-semibold mb-2" for="Nama">Inventaris</label>
                                <select name="inventaris" id="inventaris" class="form-control">
                                    <option value="" disabled selected>Pilih Inventaris</option>
                                    <option value="">MObil</option>
                                </select>
                            </div>
                            <div class="form-group mb-4">
                                <label class="fw-semibold mb-2" for="Nama">Alamat</label>
                                <select name="alamat" id="alamat" class="form-control">
                                    <option value="" disabled selected>Pilih Alamat</option>
                                    <option value="">.....</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-danger">
                                    <i class="ti ti-send me-2"></i>Simpan
                                </button>
                                <button class="btn btn-light">
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