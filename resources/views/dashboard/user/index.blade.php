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
            <h1 class="h3">Data User</h1>
        </div>

        <div class="row">

            <div class="col-12 col-xl-12">
                <div class="card">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{$user->id ?? ''}}</td>
                                    <td>{{$user->name ?? ''}}</td>
                                    <td>{{$user->role ?? ''}}</td>                                
                                    <td class="table-action">
                                        <div class="d-flex align-items-center">
                                            <form
                                                action="{{route('changerole', ['id' => $user->id])}}"
                                                method="post" id="{{ $user->id }}">
                                                @csrf
                                                @method('PUT')
                                                <button class="btn btn-sm btn-warning" type="submit"
                                                     title="Ubah Role">
                                                    Ubah Role
                                                </button>
                                            </form>
                                            <form
                                                action="{{route('user.destroy', ['id' => $user->id])}}"
                                                method="post" id="{{ $user->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger" type="submit"
                                                     title="Hapus User">
                                                    Hapus User
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada data travel</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
</main>


@include('dashboard.layouts.footer')
