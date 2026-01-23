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
                        <form action="{{ route('kunjungan.store') }}" method="post" class="mt-4 pt-2">
                            @csrf
                            <div class="form-group mb-4">
                                <label class="fw-semibold mb-2" for="tanggal">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" id="tanggal" value="{{ date('Y-m-d') }}"/>
                                @error('tanggal')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label class="fw-semibold mb-2" for="dealer">Dealer</label>
                                <select name="dealer_id" id="dealer" class="select2 form-control">
                                    <option value="" disabled selected>Pilih Dealer</option>
                                    @foreach ($mst_dealer as $row)
                                    <option value="{{ $row->id }}">{{ $row->dealer_name }}</option>
                                    @endforeach
                                </select>
                                @error('dealer_id')
                                    {{ $message }}
                                @enderror
                            </div>
                            <label class="fw-semibold mb-2" for="tujuan">Tujuan</label>
                            <div class="form-group mb-4">
                                <input type="text" name="tujuan" class="form-control" id="tujuan" placeholder="Masukkan Tujuan"/>
                                @error('tujuan')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label class="fw-semibold mb-2" for="inventaris">Inventaris</label>
                                <select name="inventaris_id" id="inventaris" class="form-control">
                                    <option value="" disabled selected>Pilih Inventaris</option>
                                    @foreach ($mst_inventaris as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                                @error('inventaris_id')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label class="fw-semibold mb-2" for="alamat">Alamat</label>
                                <input type="text" name="alamat" placeholder="Masukkan Alamat" class="form-control" id="alamat"/>
                                <input type="hidden" name="latitude" id="latitude">
                                <input type="hidden" name="longitude" id="longitude">
                                @error('alamat')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="form-group">
                                <button class="btn btn-danger">
                                    <i class="ti ti-send me-2"></i>Simpan
                                </button>
                                <button type="reset" class="btn btn-light">
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

<script>
    function initMap() {
        const center = { lat: -6.2, lng: 106.816666 }; // Jakarta
        const map = new google.maps.Map(document.createElement('div')); // peta tidak ditampilkan
        const input = document.getElementById('alamat');

        const searchBox = new google.maps.places.SearchBox(input);

        searchBox.addListener('places_changed', () => {
            const places = searchBox.getPlaces();
            if (!places || places.length === 0) return;

            const place = places[0];
            if (!place.geometry) return;

            console.log(place.formatted_address);

            document.getElementById('latitude').value = place.geometry.location.lat();
            document.getElementById('longitude').value = place.geometry.location.lng();
        });
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA3PjnzT9jDh5RnEPBaAxJJFTq7rql-AJw&libraries=places&callback=initMap" async defer></script>


@endsection