@extends('admin_layout')
@section('admin_content')
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Thêm mã giảm giá</h4>
                <?php
                $message = Session::get('message');
                if ($message) {
                    echo $message;
                    Session::put('message', null);
                }
                ?>
                <form class="forms-sample" method="POST" action="{{ URL::to('/insert-coupon-code') }}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputUsername1">Tên mã giảm giá</label>
                        <input type="text" class="form-control" id="exampleInputUsername1"
                            name="coupon_name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Mã giảm giá</label>
                        <input type="text" class="form-control" id="exampleInputUsername1"
                            name="coupon_code">
                    </div>
                    {{-- <div class="form-group">
                        <label for="exampleInputUsername1">Số lượng mã giảm giá</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" name="coupon_time">
                    </div> --}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tính năng</label>
                        <select class="form-control" name="coupon_condition">
                            <option value="0">------Chọn------</option>
                            <option value="1">Giảm theo giá tiền</option>
                            <option value="2">Giảm theo phần trăm</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Nhập số % or số tiền giảm</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" name="coupon_number">
                    </div>

                    <input type="submit" name="add_coupon" class="btn btn-primary me-2" value="Thêm mã giảm">
                </form>
            </div>
        </div>
    </div>
@endsection
