@extends('layout')
@section('content')
    <section class="breadcrumb-section set-bg" data-setbg="{{ 'public/frontend/img/breadcrumb.jpg ' }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Vegetable’s Package</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <a href="./index.html">Vegetables</a>
                            <span>Vegetable’s Package</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="product-details spad">
        <div class="container">
            @foreach ($details_product as $key => $value)
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="product__details__pic">
                            <div class="product__details__pic__item">
                                <img class="product__details__pic__item--large"
                                    src="{{ URL::to('public/uploads/product/' . $value->product_image) }}" alt="">
                            </div>
                            <div class="product__details__pic__slider owl-carousel">
                                @foreach ($gallery as $key => $gal)
                                    <img data-imgbigurl="{{ 'public/uploads/gallery/' . $gal->gallery_image }}"
                                        src="{{ 'public/uploads/gallery/' . $gal->gallery_image }}"
                                        alt="{{ $gal->gallery_name }}">
                                @endforeach

                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="product__details__text">
                            <h3>{{ $value->product_name }}</h3>
                            {{-- <div class="product__details__rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-o"></i>
                                <span>(18 reviews)</span>
                            </div> --}}
                            <div class="product__details__price">{{ number_format($value->product_price) . ' ' . 'VNĐ' }}
                            </div>
                            {{-- <p>Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam
                                vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet
                                quam vehicula elementum sed sit amet dui. Proin eget tortor risus.</p> --}}
                            {{-- <p>Số lượng còn lại: {{ $value->product_quantity }} </p> --}}
                            <p>Giao hàng tận nhà nội thành Cần Thơ với đơn hàng tối thiểu 200.000đ.</p>
                            @if (session('alert'))
                                <section class='alert alert-success'>{{ session('alert') }}</section>
                            @endif
                            <div class="product__details__quantity">
                                <form method="POST" action="{{ URL::to('/save-cart') }}">
                                    @csrf
                                    <div class="quantity">
                                        <div class="">
                                            <input type="number" value="1" min="1" name="qty"
                                                style="height: 50px;" size="15">
                                            <input type="hidden" name="productid_hidden" value="{{ $value->product_id }}">

                                            <input type="hidden" name="quantity" value="{{ $value->product_quantity }}">

                                            <input type="submit" class="primary-btn" value="Thêm giỏ hàng"
                                                style="border: 3px solid #555;border-radius:5px ">

                                        </div>
                                    </div>

                                </form>

                            </div>
                            {{-- <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a> --}}
                            <ul>
                                <li><b>Số lượng sản phẩm:</b> <span>{{ $value->product_quantity }}</span></li>

                                <li><b>Nơi sản xuất: </b> <span>Trai trạng rau Organic</span></li>
                                <li><b>Danh mục: </b> <span>{{ $value->category_name }}</span></li>
                                {{-- <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li> --}}
                                <li><b>Hạn sử dụng</b> <span>5-10 ngày kể từ ngày mua sản phẩm</span></li>

                                {{-- <li><b>Share on</b>
                                    <div class="share">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-instagram"></i></a>
                                        <a href="#"><i class="fa fa-pinterest"></i></a>
                                    </div>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="product__details__tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tabs-3" role="tab"
                                        aria-selected="false">Bình luận sản phẩm</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " data-toggle="tab" href="#tabs-1" role="tab"
                                        aria-selected="true">Tóm tắt sản phẩm</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                        aria-selected="false">Thông tin sản phẩm</a>
                                </li>

                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-3" role="tabpanel">
                                    <div class="product__details__tab__desc">
                                        <style>
                                            .style_comment {
                                                border: 1px solid #dddd;
                                                border-radius: 10px;
                                                background: #F0F0E9;
                                            }
                                        </style>
                                        <form>
                                            @csrf
                                            <input type="hidden" name="comment_product_id"
                                                value="{{ $value->product_id }}" class="comment_product_id">
                                            <div class="col-md-7">
                                                <div id="comment_show"></div>
                                            </div>
                                                

                                            <p></p>
                                        </form>
                                        {{-- <div class="row style_comment">
                                            <div class="col-md-2">
                                               
                                                <img width="50%" src="{{ 'public/frontend/img/avatar_icon.png' }}">
                                            </div>
                                            <div class="col-md-10">
                                                <p>Hieu vo</p>
                                                <p>àdàdasdfasdfasdfasdfasdfasdfasdfdasfs</p>
                                            </div>

                                        </div> --}}
                                    </div>
                                    <p></p>
                                    <p><b>Viết đánh giá của bạn</b></p>
                                    <form action="#">
                                        <span>
                                            <input style="width: 50%;" type="text" placeholder="Tên bình luận" class="comment_name">
                                        </span>
                                        <p></p>
                                        <textarea rows="9" cols="70" style="width: 100%;" name="comment" class="comment_content" placeholder="Nội dung bình luận"></textarea>
                                        <div id="notify_comment"></div>

                                        <button type="button" class="send-comment" style="background: #7fad39; border-radius: 10px; color: white; border-color:#7fad39;" >Gửi bình luận</button>
                                    </form>
                                </div>

                                <div class="tab-pane " id="tabs-1" role="tabpanel">
                                    <div class="product__details__tab__desc">
                                        {{-- <h6>Products Infomation</h6> --}}
                                        <p>{{ $value->product_desc }}</p>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tabs-2" role="tabpanel">
                                    <div class="product__details__tab__desc">
                                        {{-- <h6>Products Infomation</h6> --}}
                                        <p>{{ $value->product_content }}</p>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            @endforeach

        </div>
    </section>

    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Sản phẩm liên quan</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($related_product as $key => $rel_pro)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg"
                                data-setbg="{{ URL::to('public/uploads/product/' . $rel_pro->product_image) }}">
                                <ul class="product__item__pic__hover">
                                    <li><a href="{{ URL::to('/chi-tiet-san-pham-' . $rel_pro->product_id) }}"><i
                                                class="fa fa-eye"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="#">{{ $rel_pro->product_name }}</a></h6>
                                <h5>{{ number_format($rel_pro->product_price) . ' ' . 'VNĐ' }}</h5>
                                <form method="POST" action="{{ URL::to('/save-cart') }}">
                                    @csrf
                                    <div class="mt-2">
                                        <input type="text" value="1" min="1" name="qty"
                                            size="6">
                                        <input name="productid_hidden" type="hidden"
                                            value="{{ $rel_pro->product_id }}">
                                        <input type="hidden" name="quantity" value="{{ $rel_pro->product_quantity }}">

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
    </section>
@endsection
