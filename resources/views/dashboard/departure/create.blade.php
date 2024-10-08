@include('dashboard.layouts.header')
@include('dashboard.layouts.sidebar')

<main class="content">
    <form action="{{ route('departure.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container-fluid p-0">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1 class="h3">Tambah Data Kategori</h1>
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
                                            <label for="departure_category" class="form-label">Nama Kategori</label>
                                            <input type="text" class="form-control" id="departure_category" name="departure_category"
                                                placeholder="Nama kategori">
                                            @error('departure_category')
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
