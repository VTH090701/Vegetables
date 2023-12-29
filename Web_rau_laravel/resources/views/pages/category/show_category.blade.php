@extends('layout')
@section('content')
    <section class="breadcrumb-section set-bg" data-setbg="{{ 'public/frontend/img/breadcrumb.jpg' }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Organi Shop</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Danh mục sản phẩm</h4>
                            <ul>
                                @foreach ($category as $key => $cate)
                                    <li><a
                                            href="{{ URL::to('danh-muc-san-pham-' . $cate->category_id) }}">{{ $cate->category_name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">

                    <div class="row">
                        @foreach ($category_by_id as $key => $product)
                                <div class="col-lg-4 col-md-6 col-sm-6">

                                    <div class="product__item">
                                        <div class="product__item__pic set-bg"
                                            data-setbg="{{ URL::to('public/uploads/product/' . $product->product_image) }}">
                                            <ul class="product__item__pic__hover">
                                                {{-- <li><a href="#"><i class="fa fa-heart"></i></a></li> --}}
                                                <li><a href="{{ URL::to('/chi-tiet-san-pham-' . $product->product_id) }}"><i class="fa fa-eye"></i></a></li>
                                                {{-- <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li> --}}
                                            </ul>
                                        </div>
                                        <div class="product__item__text">
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
                    <div class="product__pagination">
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
