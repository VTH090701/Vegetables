@extends('layout')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ 'public/frontend/img/breadcrumb.jpg ' }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <?php
                        $content = Cart::content();
                        ?>
                        <?php
                        $message = Session::get('message');
                        if ($message) {
                            echo $message;
                            Session::put('message', null);
                        }
                        ?>
                        @if (session('alert'))
                            <section class='alert alert-success'>{{ session('alert') }}</section>
                        @endif
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Hình ảnh </th>
                                    <th></th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($content as $v_content)
                                    <tr>
                                        <td class="shoping__cart__item">
                                            <img src="{{ URL::to('public/uploads/product/' . $v_content->options->image) }}"
                                                alt="" width="100" height="100">
                                            <h5>{{ $v_content->name }}</h5>
                                        </td>
                                        <td></td>
                                        <td class="shoping__cart__price">
                                            {{ number_format($v_content->price) . ' ' . 'VNĐ' }}
                                        </td>
                                        <td class="shoping__cart__quantity">

                                            <div class="quantity">
                                                <form method="POST" action="{{ URL::to('/update-cart-quantity') }}">
                                                    @csrf
                                                    <input class="cart_quantity_input" type="text" name="quantity_cart"
                                                        value="{{ $v_content->qty }}" size="2">
                                                    <input type="hidden" value="{{ $v_content->rowId }}" name="rowId_cart"
                                                        class="form-control">
                                                    <input type="hidden" value="{{ $v_content->weight }}"
                                                        name="quantity_kho_cart" class="form-control">
                                                    <input type="submit" value="Cập nhật" name="update_qty">
                                                </form>
                                            </div>

                                        </td>
                                        <td class="shoping__cart__total">
                                            {{ number_format($v_content->price * $v_content->qty) . ' ' . 'VNĐ' }}
                                        </td>
                                        <td class="shoping__cart__item__close">
                                            <a href="{{ URL::to('/delete-to-cart-' . $v_content->rowId) }}"><i
                                                    class="icon_close" style="font-size:18pt;color:red;"></i></a>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <?php
                                    
                                    ?>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="#" class="primary-btn cart-btn">Tiếp tục mua sắm</a>
                        {{-- <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</a> --}}
                        @if (Session::get('coupon'))
                            <a href="{{ URL::to('/unset-coupon') }}" class="primary-btn cart-btn"
                                style="float: right;background-color:rgb(177, 40, 42);color:white ">Xóa mã giảm</a>
                        @endif
                    </div>

                </div>

                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Mã giảm giá</h5>
                            <form action="{{ URL::to('/check-coupon') }}" method="POST">
                                @csrf
                                <input type="text" name="coupon1" placeholder="Nhập mã giảm giá">
                                {{-- <button type="submit" class="site-btn">Đồng ý</button> --}}
                                <input type="submit" class="site-btn" value="Đồng ý" style="color: white"
                                    name="check_coupon">

                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <span>
                                <li>Tổng tiền <span>{{ Cart::total(0) . ' ' . ' VNĐ' }}</span></li>
                                <li>

                                    @if (Session::get('coupon'))
                                        @foreach (Session::get('coupon') as $key => $cou)
                                            @if ($cou['coupon_condition'] == 2)
                                                Mã giảm giá: {{ $cou['coupon_number'] }} %
                                                <p>
                                                    @php
                                                        $total_coupon = 0;
                                                        $total_coupon = (((int) Cart::total(0) * $cou['coupon_number']) / 100) * 1000;
                                                        // echo '<p><li>Tổng đã giảm giảm: ' .(((int)Cart::subtotal(0) * (int)$cou['coupon_number'])/100)*1000 .'VNĐ</li></p>';
                                                        echo '<p><li>Số tiền giảm: ' . number_format($total_coupon) . ' ' . 'VNĐ</li></p>';
                                                        // $after = (  $total_coupon-(int)Cart::total()*10 ) *10;
                                                        $after = (int) Cart::total() * 1000 - $total_coupon;
                                                    @endphp
                                                </p>
                                                <p>
                                <li>Tổng tiền sau khi giảm : {{ number_format($after) . ' ' . 'VNĐ' }}</li>
                                </p>
                            @else
                                Mã giảm giá: {{ number_format($cou['coupon_number']) . ' ' . 'VNĐ' }}
                                <p>
                                    @php
                                        $total_coupon = 0;
                                        $total_coupon = (int) Cart::total() * 1000 - $cou['coupon_number'];
                                        echo '<p><li>Số tiền giảm: ' . number_format($cou['coupon_number']) . ' ' . 'VNĐ</li></p>';
                                    @endphp
                                </p>
                                <p>
                                    <li>Tổng tiền sau khi giảm : {{ number_format($total_coupon) . ' ' . 'VNĐ' }} </li>
                                </p>
                                @endif
                                @endforeach
                                @endif

                            </span></li>
                            {{-- <li>Subtotal <span>{{ Cart::subtotal(0) . ' ' . ' VNĐ' }}</span></li> --}}
                        </ul>
                        {{-- <a href="{{ URL::to('/login-checkout') }}" class="primary-btn">Thanh toán</a> --}}
                        <?php
                        $customer_id=Session::get('customer_id');
                        $shipping_id=Session::get('shipping_id');

                        if($customer_id!=NULL && $shipping_id == NULL){
                        ?>
                        <a href="{{ URL::to('/checkout') }}" class="primary-btn">Thanh toán</a>
                        <?php
                        }elseif($customer_id!=NULL && $shipping_id != NULL){
                        ?>
                        <a href="{{ URL::to('/payment') }}" class="primary-btn">Thanh toán</a>



                        <?php
                        }else{
                        ?>
                        <a href="{{ URL::to('/login-checkout') }}" class="primary-btn">Thanh toán</a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->
@endsection
