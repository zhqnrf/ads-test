@include('dashboard.layouts.header')
@include('dashboard.layouts.sidebar')

<main class="content">
    <form action="{{ route('destination.update', ['destination' => $origin->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="container-fluid p-0">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1 class="h3">Ubah Data Origin</h1>
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </div>

            <div class="row">

                <div class="col-md-12 col-xl-12">

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row col-md-12">
                                        <div class="col-md-12 mb-3">
                                            <label for="origin_name" class="form-label">Nama Origin</label>
                                            <input type="text" class="form-control" id="origin_name" name="origin_name"
                                                placeholder="Nama travel" value="{{$origin->origin_name ?? ''}}">
                                            @error('origin_name')
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
