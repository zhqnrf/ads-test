@include('landing.layouts.header')

<section id="cart" class="cart-section pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
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
                            @foreach ($orders as $order)
                                <tr class="product-row">
                                    <td class="product-col">
                                        <figure class="product-image-container">
                                            <a class="product-image">
                                                <img src="{{ asset($order->travel->travel_picture) }}" alt="product">
                                            </a>
                                        </figure>
                                        <h3 class="product-title">
                                            <a>{{ $order->travel->travel_name ?? '' }}</a>
                                        </h3>
                                    </td>
                                    <td>Rp. {{ number_format($order->travel->travel_price ?? '') }}</td>
                                    <td>
                                        <input class="quantity form-control" value="{{ $order->quantity ?? '' }}"
                                            type="text" disabled>
                                    </td>
                                    <td>Rp. {{ number_format($order->quantity * $order->travel->travel_price) }}</td>
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
        </div>
    </div>
</section>


@include('landing.layouts.footer')
