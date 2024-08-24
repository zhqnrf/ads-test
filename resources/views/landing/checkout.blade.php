@include('landing.layouts.header')

<section id="cart" class="cart-section pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="cart-table-container">
                    <table class="table table-cart">
                        <thead>
                            <tr>
                                <th class="product-col">Nama</th>
                                <th class="price-col">Harga</th>
                                <th class="qty-col">Kuantitas</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carts as $cart)
                                <tr class="product-row">
                                    <td class="product-col">
                                        <figure class="product-image-container">
                                            <a class="product-image">
                                                <img src="{{ asset($cart->travel->travel_picture) }}" alt="product">
                                            </a>
                                        </figure>
                                        <h3 class="product-title">
                                            <a>{{ $cart->travel->travel_name ?? '' }}</a>
                                        </h3>
                                    </td>
                                    <td>Rp. {{ number_format($cart->travel->travel_price ?? '') }}</td>
                                    <td>
                                        <input class="quantity form-control" value="{{ $cart->quantity ?? '' }}"
                                            type="text">
                                    </td>
                                    <td>Rp. {{ number_format($cart->quantity * $cart->travel->travel_price) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" class="clearfix">
                                    <div class="float-left">
                                        <a href="{{ route('destinasi') }}" class="btn btn-outline-secondary">Lihat
                                            Destinasi Lain</a>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="cart-summary">
                    <h3>Summary</h3>
                    <table class="table table-totals">
                        <tbody>
                            <tr>
                                <td>Subtotal</td>
                                <td>{{ number_format($totalCost ?? '0') }}</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>Order Total</td>
                                <td>Rp. {{ number_format($totalCost ?? '0') }}</td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="checkout-methods">
                        <button type="button" class="btn btn-block btn-sm btn-primary checkout">Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('js')
    <script>
        $(document).ready(function() {
            $('.checkout').on('click', function() {
                $.ajax({
                    url: '{{ route('checkout') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        toastr.success(response.message, 'Success');
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText); // Log the error response
                        toastr.error('An error occurred while checking out the items.',
                            'Error');
                    }
                });
            });
        });
    </script>
@endpush

@include('landing.layouts.footer')
