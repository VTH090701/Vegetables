@extends('layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Sản phẩm nổi bật</h2>
                </div>
                <div class="featured__controls">
                    {{-- <ul>
                        <li class="active" data-filter="*">All</li>
                        <li data-filter=".oranges">Oranges</li>
                        <li data-filter=".fresh-meat">Fresh Meat</li>
                        <li data-filter=".vegetables">Vegetables</li>
                        <li data-filter=".fastfood">Fastfood</li>
                    </ul> --}}
                </div>
            </div>
        </div>
        @if (session('alert'))
            <section class='alert alert-success'>{{ session('alert') }}</section>
        @endif
        <div class="row featured__filter">
            @foreach ($product_views as $key => $product)
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg"
                            data-setbg="{{ URL::to('public/uploads/product/' . $product->product_image) }}">
                            <ul class="featured__item__pic__hover">
                                {{-- <li><a href="#"><i class="fa fa-heart"></i></a></li> --}}
                                <li><a href="{{ URL::to('/chi-tiet-san-pham-' . $product->product_id) }}"><i
                                            class="fa fa-eye"></i></a></li>

                                {{-- <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li> --}}
                            </ul>
                        </div>
                        <div class="featured__item__text">

                            <h6><a href="#">{{ $product->product_name }}</a></h6>
                            <h5>{{ number_format($product->product_price) . ' ' . 'VNĐ' }}</h5>
                            <form method="POST" action="{{ URL::to('/save-cart') }}">
                                @csrf
                                <div class="mt-2">
                                    <input type="text" value="1" min="1" name="qty" size="6">
                                    <input name="productid_hidden" type="hidden" value="{{ $product->product_id }}">
                                    <input type="hidden" name="quantity" value="{{ $product->product_quantity }}">

                                    <input type="submit" value="Thêm giỏ hàng"
                                        style="background: #7fad39; border-radius: 10px; color: white; border-color:#7fad39;">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
@endsection
