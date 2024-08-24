@include('dashboard.layouts.header')
@include('dashboard.layouts.sidebar')

<main class="content">
    <div class="container-fluid p-0">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Welcome back, {{ Auth::user()->name }}!</h5>
                <p class="card-text">We're glad to see you again.</p>
            </div>
        </div>
    </div>
</main>

@include('dashboard.layouts.footer')
