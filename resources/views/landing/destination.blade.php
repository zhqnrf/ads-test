@include('landing.layouts.header')

<section id="destination" class="destination-section ptb-100 bg-light">
    <div class="container">
        <div class="section-title">
            <h2>Destinasi</h2>
            <p>Perjalanan telah membantu kami memahami makna hidup dan membuat kami menjadi orang yang lebih baik.
                Setiap kali kami bepergian, kami melihat dunia dengan mata yang baru.</p>
        </div>

        <div class="row mb-4 justify-content-center">
            <div class="col-md-8">
                <form action="{{ url()->current() }}" method="GET">
                    <div class="row justify-content-center align-items-center m-auto">
                        <div class="col-lg-3 col-md-3">
                            <select class="form-select" name="origin" aria-label="Select Origin">
                                <option selected value="">Choose Origin</option>
                                @foreach ($origins as $origin)
                                    <option value="{{ $origin->id }}"
                                        {{ request('origin') == $origin->id ? 'selected' : '' }}>
                                        {{ $origin->origin_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <select class="form-select" name="destination" aria-label="Select Destination">
                                <option selected value="">Choose Destination</option>
                                @foreach ($origins as $origin)
                                    <option value="{{ $origin->id }}"
                                        {{ request('destination') == $origin->id ? 'selected' : '' }}>
                                        {{ $origin->origin_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <select class="form-select" name="departure" aria-label="Select Departure Time">
                                <option selected value="">Choose Departure Time</option>
                                @foreach ($departures as $departure)
                                    <option value="{{ $departure->id }}"
                                        {{ request('departure') == $departure->id ? 'selected' : '' }}>
                                        {{ $departure->departure_category }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-2 col-md-3 ms-5">
                            <button class="btn btn-primary w-100" type="submit">Filter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Travel Cards Section -->
        <div class="row filtr-container">
            @foreach ($travels as $travel)
                <div class="col-lg-4 col-md-6 filtr-item" data-category="1" data-sort="value">
                    <div class="item-single mb-30">
                        <div class="image">
                            <img src="{{ asset($travel->travel_picture ?? '') }}" alt="Demo Image">
                        </div>
                        <div class="content">
                            <h3>
                                <a>{{ $travel->travel_name ?? 'N/A' }}</a>
                            </h3>
                            <span>Origin/Destination:</span>
                            <span>{{ $travel->origin->origin_name ?? 'N/A' }} /
                                {{ $travel->destination->origin_name ?? 'N/A' }}</span>
                            <hr>
                            <ul class="list">
                                <li><i class="bx bx-time"></i>{{ $travel->departure->departure_category ?? 'N/A' }}
                                </li>
                                <li>Rp. {{ number_format($travel->travel_price) }}</li>
                            </ul>
                            <button data-id="{{ $travel->id }}" class="btn btn-primary mt-3 add-to-cart">Add to
                                Cart</button>
                        </div>
                        <div class="spacer"></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@push('js')
    <script>
        $(document).ready(function() {
            $('.add-to-cart').on('click', function() {
                var travelId = $(this).data('id');

                $.ajax({
                    url: '{{ route('add.to.cart', ':id') }}'.replace(':id',
                        travelId),
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        toastr.success(response.message, 'Success');
                    },
                    error: function(xhr) {
                        toastr.error('An error occurred while adding to cart.', 'Error');
                    }
                });
            });
        });
    </script>
@endpush

@include('landing.layouts.footer')
