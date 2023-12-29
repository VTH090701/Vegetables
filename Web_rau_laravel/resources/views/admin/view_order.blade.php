@extends('admin_layout')
@section('admin_content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Thông tin khách hàng đăng nhập</h4>

                <div class="table-responsive">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Tên người mua</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>{{ $customer->customer_name }}</td>
                                <td>{{ $customer->customer_email }}</td>
                                <td>{{ $customer->customer_phone }}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Thông tin vận chuyển hàng hóa</h4>

                <div class="table-responsive">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Tên người vận chuyển</th>
                                <th>Địa chỉ</th>
                                <th>Số điện thoại</th>
                                <th>Email</th>
                                <th>Ghi chú</th>
                                <th>Hình thức thanh toán</th>

                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>{{ $shipping->shipping_name }}</td>
                                <td>{{ $shipping->shipping_address }}</td>
                                <td>{{ $shipping->shipping_phone }}</td>
                                <td>{{ $shipping->shipping_email }}</td>
                                <td>{{ $shipping->shipping_note }}</td>
                                <td>
                                    @if ($shipping->shipping_phone == 0)
                                        Chuyển khoản
                                    @else
                                        Tiền mặt
                                    @endif
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Liệt kê chi tiết đơn hàng</h4>

                <div class="table-responsive">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng kho</th>
                                <th>Mã giảm giá</th>
                                <th>Số lượng</th>
                                <th>Giá bán</th>
                                <th>Tổng tiền</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 0;
                                
                            @endphp
                            @foreach ($order_details as $key => $order_details)
                                @php
                                    $i++;
                                    $total = 0;
                                    $total += $order_details->product_price * $order_details->product_sales_quantity;
                                    
                                @endphp
                                <tr class="color_qty_{{ $order_details->product_id }}">
                                    <td>{{ $order_details->product_name }}</td>
                                    <td>{{ $order_details->product->product_quantity }}</td>

                                    <td>
                                        @if ($order_details->product_coupon != 'Không có')
                                            {{ $order_details->product_coupon }}
                                        @else
                                            Không mã
                                        @endif
                                    </td>

                                    <td>
                                        {{ $order_details->product_sales_quantity }}
                                        {{-- <input type="hidden" name="product_sales_quantity" class="product_sales_quantity"
                                            value="{{ $order_details->product_sales_quantity }}"> --}}
                                        <input type="hidden" name="order_product_id" class="order_product_id"
                                            value="{{ $order_details->product_id }}">

                                        <input type="hidden" name="order_qty_storage"
                                            class="order_qty_storage_{{ $order_details->product_id }}"
                                            value="{{ $order_details->product->product_quantity }}">
                                        <input type="hidden" name="product_sales_quantity"
                                            class="order_qty_{{ $order_details->product_id }}"
                                            value="{{ $order_details->product_sales_quantity }}">
                                    </td>
                                    <td>{{ $order_details->product_price }}</td>
                                    <td>{{ $order_details->product_price * $order_details->product_sales_quantity }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="6">
                                    @php
                                        $total_coupon = 0;
                                        $total_after_coupon = 0;
                                    @endphp
                                    @if ($coupon_condition == 2)
                                        @php
                                            $total_after_coupon = ($total * $coupon_number) / 100;
                                            echo 'Tổng giảm: ' . $total_after_coupon . 'VNĐ</br>';
                                            $total_coupon = $total - $total_after_coupon;
                                            
                                        @endphp
                                    @else
                                        @php
                                            echo 'Tổng giảm: ' . $coupon_number . 'VNĐ</br>';
                                            $total_coupon = $total - $coupon_number;
                                        @endphp
                                    @endif
                                    Thanh toán: {{ $total_coupon }} VNĐ
                                </td>
                                {{-- @foreach ($order as $key => $for)
                                    <td colspan="6">
                                        <form>
                                            @csrf
                                            <input type="hidden" value="2" name="order_status" class="order_status">
                                            <input type="hidden" value="{{ $for->order_id }}" name="order_id"
                                                class="order_id">
                                            <input type="submit"
                                                style="padding: 10px;border-radius: 10px;background-color:rgb(36, 28, 182);
                                                color:beige;font-weight:bolder;"
                                                value="Tiếp nhận đơn hàng">
                                            
                                        </form>
                                    </td>
                                @endforeach --}}
                            </tr>
                            <tr>
                                <td colspan="6">
                                    @foreach ($order as $key => $or)
                                        @if ($or->order_status == 1)
                                            <form>
                                                @csrf
                                                <select class="form-control order_details1 ">

                                                    <option id="{{ $or->order_id }}" selected value="1">Chưa xử lý
                                                    </option>
                                                    <option id="{{ $or->order_id }}" value="2">Đã xử lý - đã giao hàng
                                                    </option>
                                                </select>
                                            </form>
                                        @else
                                            <form>
                                                @csrf
                                                <select class="form-control order_details1 ">
                                                    <option disabled id="{{ $or->order_id }}" value="1">Chưa xử lý</option>
                                                    <option id="{{ $or->order_id }}" selected value="2">Đã xử lý - đã
                                                        giao hàng
                                                    </option>
                                                </select>
                                            </form>
                                        @endif
                                    @endforeach

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
