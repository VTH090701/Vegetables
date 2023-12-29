@extends('layout')
@section('content')
    <section class="breadcrumb-section set-bg" data-setbg="{{ 'public/frontend/img/breadcrumb.jpg ' }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">

            <div class="checkout__form">
                <h4 class="text-center">Điền mẫu thông tin gửi hàng</h4>
                <div class="row justify-content-around">
                    <div class="col-lg-8 col-md-6 ">
 
                        <form method="POST">
                            @csrf
                            <div class="checkout__input">
                                <p>Email<span>*</span></p>
                                <input type="text" name="shipping_email" class="shipping_email">
                            </div>
                            <div class="checkout__input">
                                <p>Họ và tên<span>*</span></p>
                                <input type="text" name="shipping_name" class="shipping_name">
                            </div>
                            <div class="checkout__input">
                                <p>Địa chỉ<span>*</span></p>
                                <input type="text" placeholder="Street Address" name="shipping_address"
                                    class="shipping_address checkout__input__add">
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <p>Điện thoại<span>*</span></p>
                                        <input type="text" name="shipping_phone" class="shipping_phone">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <p>Ghi chú đơn hàng<span>*</span></p>
                                        <input type="text" placeholder="Ghi chú đơn hàng của bạn" name="shipping_note"
                                            class="shipping_note">
                                    </div>
                                </div>
                            </div>
                            @if (Session::get('coupon'))
                                @foreach (Session::get('coupon') as $key => $cou)
                                    <input type="hidden" name="order_coupon" class="order_coupon"
                                        value="{{ $cou['coupon_code'] }}">
                                @endforeach
                            @else
                                <input type="hidden" name="order_coupon" class="order_coupon" value="Không có">
                            @endif
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <p>Hình thức thanh toán<span>*</span></p>
                                        <select name="payment_select" class="payment_select form-control"
                                            name="payment_select">

                                            <option value="0">Tiền mặt</option>
                                            <option value="1">Chuyển khoản</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="checkout__input">
                                <input type="button" value="Xác nhận đơn hàng" name="send_order" class="send_order">
                            </div>
                        </form>



                    </div>
                    <?php
                    $content = Cart::content();
                    ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Giỏ hàng của bạn</h4>
                            <div class="checkout__order__products">Sản phẩm <span>Tổng tiền</span></div>
                            @foreach ($content as $v_content)
                                <ul>


                                    <li>{{ $v_content->name }}<span>
                                            {{ number_format($v_content->price * $v_content->qty) . ' ' . 'VNĐ' }}</span>
                                    </li>


                                </ul>
                                <div class="checkout__input__checkbox">
                            @endforeach
                        </div>



                        @if (Session::get('coupon'))
                            @foreach (Session::get('coupon') as $key => $cou)
                                @if ($cou['coupon_condition'] == 2)
                                    <div class="checkout__order__total">Mã giảm giá:<span>
                                            {{ $cou['coupon_number'] }} %</span></div>

                                    @php
                                        $total_coupon = 0;
                                        $total_coupon = (((int) Cart::total(0) * $cou['coupon_number']) / 100) * 1000;
                                        echo '<div class="checkout__order__total">Số tiền giảm:<span> ' . number_format($total_coupon) . ' ' . 'VNĐ</span></div>';
                                        $after = (int) Cart::total() * 1000 - $total_coupon;
                                    @endphp

                                    <div class="checkout__order__total">Tổng tiền sau giảm:<span>
                                            {{ number_format($after) . ' ' . 'VNĐ' }}</span></div>
                                @else
                                    <div class="checkout__order__total">Mã giảm giá:<span>
                                            {{ number_format($cou['coupon_number']) . ' ' . 'VNĐ' }}</span></div>

                                    @php
                                        $total_coupon = 0;
                                        $total_coupon = (int) Cart::total() * 1000 - $cou['coupon_number'];
                                        echo '<div class="checkout__order__total"> Số tiền giảm:<span> ' . number_format($cou['coupon_number']) . ' ' . 'VNĐ</span></div>';
                                    @endphp

                                    <div class="checkout__order__total">Tổng tiền sau giảm :<span>
                                            {{ number_format($total_coupon) . ' ' . 'VNĐ' }}</span></div>
                                @endif
                            @endforeach
                        @endif


                    </div>

                </div>
            </div>

        </div>
        </div>
    </section>
    {{-- <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code
                    </h6>
                </div>
            </div>
            <div class="checkout__form">
                <h4>Billing Details</h4>
                <form action="#">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Fist Name<span>*</span></p>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Country<span>*</span></p>
                                <input type="text">
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" placeholder="Street Address" class="checkout__input__add">
                                <input type="text" placeholder="Apartment, suite, unite ect (optinal)">
                            </div>
                            <div class="checkout__input">
                                <p>Town/City<span>*</span></p>
                                <input type="text">
                            </div>
                            <div class="checkout__input">
                                <p>Country/State<span>*</span></p>
                                <input type="text">
                            </div>
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input type="text">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="acc">
                                    Create an account?
                                    <input type="checkbox" id="acc">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <p>Create an account by entering the information below. If you are a returning customer
                                please login at the top of the page</p>
                            <div class="checkout__input">
                                <p>Account Password<span>*</span></p>
                                <input type="text">
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="diff-acc">
                                    Ship to a different address?
                                    <input type="checkbox" id="diff-acc">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input">
                                <p>Order notes<span>*</span></p>
                                <input type="text"
                                    placeholder="Notes about your order, e.g. special notes for delivery.">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products <span>Total</span></div>
                                <ul>
                                    <li>Vegetable’s Package <span>$75.99</span></li>
                                    <li>Fresh Vegetable <span>$151.99</span></li>
                                    <li>Organic Bananas <span>$53.99</span></li>
                                </ul>
                                <div class="checkout__order__subtotal">Subtotal <span>$750.99</span></div>
                                <div class="checkout__order__total">Total <span>$750.99</span></div>
                                <div class="checkout__input__checkbox">
                                    <label for="acc-or">
                                        Create an account?
                                        <input type="checkbox" id="acc-or">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua.</p>
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Check Payment
                                        <input type="checkbox" id="payment">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Paypal
                                        <input type="checkbox" id="paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section> --}}
@endsection
