@extends('admin_layout')
@section('admin_content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Liệt kê mã giảm giá</h4>

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
                                <th>Tên mã giảm giá</th>
                                <th>Mã giảm giá</th>
                                {{-- <th>Số lượng giảm giá</th> --}}
                                <th>Điều kiện giảm giá</th>
                                <th>Số giảm</th>
                                <th>Quản lý</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($coupon as $key => $cou)
                                <tr>
                                    <td>{{ $cou->coupon_name }}</td>
                                    <td>{{ $cou->coupon_code }}</td>
                                    {{-- <td>{{ $cou->coupon_time }}</td> --}}
                                    <td>
                                        <?php
                                    if($cou->coupon_condition == 1){
                                    ?>
                                        Giảm theo tiền
                                        <?php    
                                    }else{
                                    ?>
                                        Giảm theo %
                                        <?php
                                    }
                                    ?>
                                    </td>
                                    <td>
                                        <?php
                                    if($cou->coupon_condition == 1){
                                    ?>
                                        Giảm {{ $cou->coupon_number }} VNĐ
                                        <?php    
                                    }else{
                                    ?>
                                        Giảm {{ $cou->coupon_number }} %
                                        <?php
                                    }
                                    ?>
                                    </td>
                                    <td>
                                        <a onclick="return confirm('Bạn chắc chắn muốn xóa mã này?')"
                                            href="{{ URL::to('/delete-coupon/' . $cou->coupon_id) }}"><i class="fa fa-close"
                                                style="color:red;font-size:18pt  "></i></a>


                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
