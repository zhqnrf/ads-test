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
            <h1 class="h3">Data Kategori Departure</h1>
            <a href="{{ route('departure.create') }}" class="btn btn-primary">Tambah Data</a>
        </div>

        <div class="row">

            <div class="col-12 col-xl-12">
                <div class="card">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kategori</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($departures as $departure)
                                <tr>
                                    <td>{{$departure->id ?? ''}}</td>
                                    <td>{{$departure->departure_category ?? ''}}</td>                      
                                    <td class="table-action">
                                        <div class="d-flex align-items-center">
                                            <a href="{{ route('departure.edit', ['departure' => $departure->id]) }}"
                                                class="btn btn-warning btn-sm" title="EDIT"
                                                style="margin-right: 0.25rem;color: white;"><i
                                                    class="fas fa-edit"></i></a>
                                            <form
                                                action="{{ route('departure.destroy', ['departure' => $departure->id]) }}"
                                                method="post" id="{{ $departure->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger" type="button"
                                                    onclick="confirmDelete({{ $departure->id }})" title="DELETE">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada data departure</td>
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
