@extends('admin_layout')
@section('admin_content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Liệt kê khách hàng</h4>

                <div class="table-responsive">
                    <?php
                    $message = Session::get('message');
                    if ($message) {
                        echo $message;
                        Session::put('message', null);
                    }
                    ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Tên khách hàng</th>
                                <th>Email</th>
                                {{-- <th>Số lượng giảm giá</th> --}}
                                <th>Mật khẩu</th>
                                <th>Phone</th>
                                {{-- <th>Quản lý</th> --}}

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customer as $key => $cus)
                                <tr>
                                    <td>{{ $cus->customer_name }}</td>
                                    <td>{{ $cus->customer_email }}</td>
                                    <td>{{ $cus->customer_password }}</td>

                                    <td>{{ $cus->customer_phone }}</td>
                                    {{-- <td>{{ $cou->coupon_time }}</td> --}}

                                    {{-- <td>
                                        <a href="{{ URL::to('/edit-customer-' . $cus->customer_id) }}"><i class="fa fa-edit"
                                                style="color:green;font-size:15pt  "></i></a>|
                                        <a onclick="return confirm('Bạn chắc chắn muốn xóa sản phẩm này?')"
                                            href="{{ URL::to('/delete-customer/' . $cus->customer_id) }}"><i
                                                class="fa fa-close" style="color:red;font-size:18pt  "></i></a>
                                    </td> --}}
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
