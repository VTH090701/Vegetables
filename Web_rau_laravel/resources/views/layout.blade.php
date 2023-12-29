<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ 'public/frontend/css/bootstrap.min.css' }}" type="text/css">
    <link rel="stylesheet" href="{{ 'public/frontend/css/font-awesome.min.css' }}" type="text/css">
    <link rel="stylesheet" href="{{ 'public/frontend/css/elegant-icons.css' }}" type="text/css">
    <link rel="stylesheet" href="{{ 'public/frontend/css/nice-select.css' }}" type="text/css">
    <link rel="stylesheet" href="{{ 'public/frontend/css/jquery-ui.min.css' }}" type="text/css">
    <link rel="stylesheet" href="{{ 'public/frontend/css/owl.carousel.min.css' }}" type="text/css">
    <link rel="stylesheet" href="{{ 'public/frontend/css/slicknav.min.css' }}" type="text/css">
    <link rel="stylesheet" href="{{ 'public/frontend/css/style.css' }}" type="text/css">

    {{-- Boostrap --}}


</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="{{ URL::to('/trang-chu') }}"><img src="{{ 'public/frontend/img/logo.png' }}" alt=""></a>
        </div>
        {{-- <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div> --}}
        <div class="humberger__menu__widget">
            {{-- <div class="header__top__right__language">
                <img src="{{ 'public/frontend/img/language.png' }}" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div> --}}
            <div class="header__top__right__auth">
                <?php
                $customer_id=Session::get('customer_id');
                if($customer_id!=NULL){
                ?>
                <a href="{{ URL::to('/logout-checkout') }}"><i class="fa fa-user"></i> Đăng xuất</a>
                <?php
                }else{
                ?>

                <a href="{{ URL::to('/dang-nhap') }}"><i class="fa fa-user"></i> Đăng nhập</a>

                <?php
                }
                ?>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="{{ URL::to('/trang-chu') }}">Trang chủ</a></li>
                <li><a href="./blog.html">Tin tức</a></li>
                <li><a href="{{ URL::to('/show-cart') }}">Giỏ hàng</a></li>
                {{-- <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./shop-details.html">Shop Details</a></li>
                        <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                        <li><a href="./checkout.html">Check Out</a></li>
                        <li><a href="./blog-details.html">Blog Details</a></li>
                    </ul>
                </li> --}}

                {{-- <li><a href="./contact.html">Contact</a></li> --}}
                <?php
                $customer_id=Session::get('customer_id');
                if($customer_id!=NULL){
                ?>
                <li><a href="{{ URL::to('/manager-order-customer') }}">Đơn hàng của bạn</a></li>
                <?php
                }
                ?>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        {{-- <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                <li>Free Shipping for all Order of $99</li>
            </ul>
        </div> --}}
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            {{-- <ul>
                                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                                <li>Free Shipping for all Order of $99</li>
                            </ul> --}}
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            {{-- <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div> --}}
                            {{-- <div class="header__top__right__language">
                                <img src="{{ 'public/frontend/img/language.png' }}" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Spanis</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div> --}}
                            <div class="header__top__right__auth">
                                <?php
                                $customer_id=Session::get('customer_id');
                                if($customer_id!=NULL){
                                ?>
                                <a href="{{ URL::to('/logout-checkout') }}"><i class="fa fa-user"></i> Đăng xuất</a>
                                <?php
                                }else{
                                ?>

                                <a href="{{ URL::to('/dang-nhap') }}"><i class="fa fa-user"></i> Đăng nhập</a>

                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{ URL::to('/trang-chu') }}"><img src="{{ 'public/frontend/img/logo.png' }}"
                                alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="{{ URL::to('/trang-chu') }}">Trang chủ</a></li>
                            <li><a href="{{ URL::to('/blog') }}">Tin tức</a></li>
                            <li><a href="{{ URL::to('/show-cart') }}">Giỏ hàng</a></li>

                            {{-- <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./shop-details.html">Shop Details</a></li>
                                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                    <li><a href="./checkout.html">Check Out</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul>
                            </li> --}}
                            {{-- <li><a href="./blog.html">Blog</a></li> --}}

                            <?php
                            $customer_id=Session::get('customer_id');
                            if($customer_id!=NULL){
                            ?>
                            <li><a href="{{ URL::to('/manager-order-customer-' . $customer_id) }}">Đơn hàng của bạn</a>
                            </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
                {{-- <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>$150.00</span></div>
                    </div>
                </div> --}}
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Danh mục sản phẩm</span>
                        </div>

                        <ul>
                            @foreach ($category as $key => $cate)
                                <li><a
                                        href="{{ URL::to('danh-muc-san-pham-' . $cate->category_id) }}">{{ $cate->category_name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="{{ URL::to('/tim-kiem') }}" method="POST">
                                @csrf
                                <div class="hero__search__categories">
                                    Tất cả danh mục
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" name="keywords_submit"
                                    placeholder="Nhập tên sản phẩm bạn cần tìm">
                                <button type="submit" name="search_items" class="site-btn">Search</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>0914549857</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                    <div class="hero__item set-bg" data-setbg="{{ 'public/frontend/img/hero/banner.jpg' }}">
                        <div class="hero__text">
                            <span>FRUIT FRESH</span>
                            <h2>Vegetable <br />100% Organic</h2>
                            <p>Free Pickup and Delivery Available</p>
                            <a href="#" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Featured Section Begin -->
    <section class="featured spad">
        @yield('content')
    </section>
    <!-- Featured Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img src="{{ 'public/frontend/img/logo.png' }}"
                                    alt=""></a>
                        </div>
                        <ul>
                            <li>Address: Đường 3/2, quận Ninh Kiều, thành phố Cần Thơ </li>
                            {{-- <li>Phone: 0914549857</li> --}}
                            <li>Email: thanhhieu0907@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget ">
                        <h6>Thời gian hoạt động</h6>
                        <ul>
                            <li>Thứ 2-Thứ 6: 8AM - 5PM</li>
                            <li>Thứ 7-CN: 8AM - 12AM</li>
                        </ul>


                    </div>
                    <div class="footer__widget">
                        <h6>Chính sách hoạt động</h6>
                        <ul>
                            <li>Cung cấp rau củ quả sỉ số lượng lớn</li>
                            <li>Cung cấp cho siêu thị - Cửa hàng</li>
                            <li>Giao rau tận nhà - Giá tại vườn</li>
                        </ul>

                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text">
                            <p>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | This template is made with <i
                                    class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com"
                                    target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->

    <script src="{{ 'public/frontend/js/jquery-3.3.1.min.js' }}"></script>
    <script src="{{ 'public/frontend/js/bootstrap.min.js' }}"></script>
    <script src="{{ 'public/frontend/js/jquery.nice-select.min.js' }}"></script>
    <script src="{{ 'public/frontend/js/jquery-ui.min.js' }}"></script>
    <script src="{{ 'public/frontend/js/jquery.slicknav.js' }}"></script>
    <script src="{{ 'public/frontend/js/mixitup.min.js' }}"></script>
    <script src="{{ 'public/frontend/js/owl.carousel.min.js' }}"></script>
    <script src="{{ 'public/frontend/js/main.js' }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {

            load_comment();
            function load_comment() {
                var product_id = $('.comment_product_id').val();
                var _token = $('input[name ="_token"]').val();
                // alert(product_id);
                $.ajax({
                    url: "{{ url('/load-comment') }}",
                    method: "POST",
                    data: {
                        product_id: product_id,
                        _token: _token
                    },
                    success: function(data) {
                        $('#comment_show').html(data);
                    }
                });
            }
            $('.send-comment').click(function(){
                var product_id = $('.comment_product_id').val();
                var comment_name = $('.comment_name').val();
                var comment_content = $('.comment_content').val();
                var _token = $('input[name ="_token"]').val();

                $.ajax({
                    url: "{{ url('/send-comment') }}",
                    method: "POST",
                    data: {
                        product_id: product_id,
                        comment_name:comment_name,
                        comment_content:comment_content,
                        _token: _token
                    },
                    success: function(data) {
                        
                        $('#notify_comment').html('<span class="text text-success">Thêm bình luận thành công, bình luận đang chờ duyệt</span>')
                        load_comment();
                        $('#notify_comment').fadeOut(9000);
                        $('.comment_name').val('');
                        $('.comment_content').val('');
                    }
                });
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.send_order').click(function() {
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                    title: 'Xác nhận đặt hàng',
                    text: "Đơn hàng sẽ không được hoàn trả khi đã đặt, bạn có chắc chắn muốn đặt hàng",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Xác nhận',
                    cancelButtonText: 'Không, trở lại',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        swalWithBootstrapButtons.fire(
                            'Thành công!',
                            'Đơn hàng của bạn đã gửi thành công, cảm ơn bạn vì đã đặt hàng',
                            'success'
                        )
                        var shipping_email = $('.shipping_email').val();
                        var shipping_name = $('.shipping_name').val();
                        var shipping_address = $('.shipping_address').val();
                        var shipping_phone = $('.shipping_phone').val();
                        var shipping_note = $('.shipping_note').val();
                        var shipping_method = $('.payment_select').val();
                        var order_coupon = $('.order_coupon').val();
                        var _token = $('input[name ="_token"]').val();
                        $.ajax({
                            url: "{{ url('/confirm-order') }}",
                            method: "POST",
                            data: {
                                shipping_email: shipping_email,
                                shipping_name: shipping_name,
                                shipping_address: shipping_address,
                                shipping_phone: shipping_phone,
                                shipping_note: shipping_note,
                                shipping_method: shipping_method,
                                order_coupon: order_coupon,
                                _token: _token
                            }
                            // success: function() {
                            //     alert('Đặt hàng thành công');
                            // }
                        });
                        window.setTimeout(function() {
                            location.reload();
                        }, 3000);
                    } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            'Đóng!',
                            'Đơn hàng của bạn gửi thất bại',
                            'error'
                        )
                    }
                })

            });
        });
    </script>

</body>

</html>
