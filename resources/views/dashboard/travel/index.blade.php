@include('dashboard.layouts.header')
@include('dashboard.layouts.sidebar')

<main class="content">
    <div class="container-fluid p-0">

        @if (session('status'))
            <div class="alert alert-{{ session('status') }} alert-dismissible" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <div class="alert-message">
                    {{ session('message') }}
                </div>
            </div>
        @endif

        <div class="mb-3 d-flex justify-content-between align-items-center">
            <h1 class="h3">Data Travel</h1>
            <a href="{{ route('travels.create') }}" class="btn btn-primary">Tambah Data</a>
        </div>

        <div class="row">

            <div class="col-12 col-xl-12">
                <div class="card">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Origin / Destinasi</th>
                                <th>Departure</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($travels as $travel)
                                <tr>
                                    <td>{{ $travel->id ?? '' }}</td>
                                    <td>{{ $travel->travel_name ?? '' }}</td>
                                    <td>{{ $travel->travel_price ?? '' }}</td>
                                    <td>{{ $travel->origin->origin_name ?? '' }} /
                                        {{ $travel->destination->origin_name ?? '' }}</td>
                                    <td>{{ $travel->departure->departure_category ?? '' }}</td>
                                    <td>
                                        @if ($travel->travel_picture)
                                            <img src="{{ asset($travel->travel_picture) }}" alt="Travel Picture"
                                                class="img-fluid" loading="lazy"
                                                style="max-width: 100px; max-height: 100px; object-fit: cover;">
                                        @else
                                            No picture available
                                        @endif
                                    </td>
                                    <td class="table-action">
                                        <div class="d-flex align-items-center">
                                            <a href="{{ route('travels.edit', ['travel' => $travel->id]) }}"
                                                class="btn btn-warning btn-sm" title="EDIT"
                                                style="margin-right: 0.25rem;color: white;"><i
                                                    class="fas fa-edit"></i></a>
                                            <form action="{{ route('travels.destroy', ['travel' => $travel->id]) }}"
                                                method="post" id="{{ $travel->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger" type="button"
                                                    onclick="confirmDelete({{ $travel->id }})" title="DELETE">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Tidak ada data travel</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
</main>

@push('js')
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah kamu yakin menghapus data ini?',
                text: "Tindakan ini tidak dapat dibatalkan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(id).submit();
                }
            });
        }
    </script>
@endpush

@include('dashboard.layouts.footer')
