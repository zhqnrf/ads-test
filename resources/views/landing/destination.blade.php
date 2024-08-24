@include('landing.layouts.header')

<section id="destination" class="destination-section ptb-100 pt-0 bg-light">
    <div class="container">
        <h2 class="justify-content-center">Destinasi</h2>
        <div class="row mb-4 justify-content-center">
            <div class="col-12">
                <form action="{{ url()->current() }}" method="GET">
                    <div class="row gy-3 justify-content-center align-items-center">
                        <div class="col-lg-2 col-md-4 col-sm-6 m-0">
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
                        <div class="col-lg-2 col-md-4 col-sm-6">
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
                        <div class="col-lg-2 col-md-4 col-sm-6">
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
                        <div class="col-lg-2 col-md-4 col-sm-6 ms-4">
                            <input type="number" name="price" class="form-control" value="{{ request('price') }}"
                                aria-label="Select Price" placeholder="Enter Price" style="border: 1px solid #000">
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-6">
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
