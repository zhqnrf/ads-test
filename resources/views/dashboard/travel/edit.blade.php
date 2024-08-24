@include('dashboard.layouts.header')
@include('dashboard.layouts.sidebar')

<main class="content">
    <form action="{{ route('travels.update', ['travel' => $travel->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="container-fluid p-0">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1 class="h3">Ubah Data Travel</h1>
                <button type="submit" class="btn btn-primary">Ubah Data</button>
            </div>

            <div class="row">

                <div class="col-md-12 col-xl-12">

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row col-md-12">
                                        <div class="col-md-12 mb-3">
                                            <label for="travel_name" class="form-label">Nama Travel</label>
                                            <input type="text" class="form-control" id="travel_name"
                                                name="travel_name" placeholder="Nama travel"
                                                value="{{ $travel->travel_name ?? '' }}">
                                            @error('travel_name')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="travel_price" class="form-label">Harga Travel / Hari</label>
                                            <input type="number" class="form-control" id="travel_price"
                                                name="travel_price" placeholder="Harga Travel"
                                                value="{{ $travel->travel_price ?? '' }}">
                                            @error('travel_price')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="id_origin" class="form-label">Travel Origin</label>
                                            <select class="form-control" name="id_origin" id="id_origin">
                                                @foreach ($origins as $origin)
                                                    <option value="{{ $origin->id ?? '' }}"
                                                        {{ $origin->id == $travel->id_origin ? 'selected' : '' }}>
                                                        {{ $origin->origin_name ?? '' }}</option>
                                                @endforeach
                                            </select>
                                            @error('id_origin')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="id_destination" class="form-label">Travel
                                                Destination</label>
                                            <select class="form-control" name="id_destination" id="id_destination">
                                                @foreach ($origins as $origin)
                                                    <option value="{{ $origin->id ?? '' }}"
                                                        {{ $origin->id == $travel->id_destination ? 'selected' : '' }}>
                                                        {{ $origin->origin_name ?? '' }}</option>
                                                @endforeach
                                            </select>
                                            @error('id_destination')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="departure_time" class="form-label">Departure Time</label>
                                            <select class="form-control" name="id_departure" id="id_departure">
                                                @foreach ($departures as $departure)
                                                    <option value="{{ $departure->id ?? '' }}"
                                                        {{ $departure->id == $travel->id_departure ? 'selected' : '' }}>
                                                        {{ $departure->departure_category ?? '' }}</option>
                                                @endforeach
                                            </select>
                                            @error('departure_time')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="travel_picture" class="form-label">Gambar</label>
                                            <input type="file" name="travel_picture" id="travel_picture"
                                                class="form-control" accept="image/*">
                                            @error('travel_picture')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>

@include('dashboard.layouts.footer')
