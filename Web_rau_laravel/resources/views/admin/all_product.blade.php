@extends('admin_layout')
@section('admin_content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Liệt kê sản phẩm</h4>

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
                                <th>Tên sản phẩm</th>
                                <th>Số lượng sản phẩm</th>
                                <th>Thư viện ảnh</th>
                                <th>Giá bán</th>
                                <th>Giá gốc</th>
                                <th>Hình ảnh sản phẩm</th>
                                <th>Danh mục</th>
                                <th>Hiển thị</th>
                                <th>Quản lý</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_product as $key => $pro)
                                <tr>
                                    <td>{{ $pro->product_name }}</td>
                                    <td>{{ $pro->product_quantity }}</td>
                                    <td><a href="{{URL::to('add-gallery-' .$pro->product_id)}}">Thêm thư viện ảnh</a></td>
                                    <td>{{ $pro->product_price }}</td>
                                    <td>{{ $pro->product_cost }}</td>

                                    <td><img src="public/uploads/product/{{ $pro->product_image }}" width="100" height="100"></td>
                                    <td>{{ $pro->category_name }}</td>

                                    <td>
                                            <?php
                                    if($pro->product_status == 0){
                                    ?>
                                            <a href="{{ URL::to('/active-product/' . $pro->product_id) }}"><span
                                                    class="fa-thumb-styling fa fa-thumbs-down" style="font-size: 18pt;color: red"></span></a>
                                            {{-- Ẩn --}}
                                            <?php    
                                    }else{
                                    ?>
                                            <a href="{{ URL::to('/unactive-product/' . $pro->product_id) }}"><span
                                                    class="fa-thumb-styling fa fa-thumbs-up" style="font-size: 18pt"></span></a>
                                            {{-- Hiển thị --}}

                                            <?php
                                    }
                                    ?>
                                    </td>
                                    <td>
                                        <a href="{{ URL::to('/edit-product-' .$pro->product_id) }}"><i
                                                class="fa fa-edit" style="color:green;font-size:15pt  "></i></a>|
                                        <a onclick="return confirm('Bạn chắc chắn muốn xóa sản phẩm này?')" href="{{ URL::to('/delete-product/' .$pro->product_id) }}"><i
                                                class="fa fa-close" style="color:red;font-size:18pt  "></i></a>
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
