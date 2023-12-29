@extends('admin_layout')
@section('admin_content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Liệt kê danh mục sản phẩm</h4>

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
                                <th>Tên danh mục</th>
                                <th>Hiển thị</th>
                                <th>Quản lý</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_category_product as $key => $cate_pro)
                                <tr>
                                    <td>{{ $cate_pro->category_name }}</td>
                                    <td>
                                            <?php
                                    if($cate_pro->category_status == 0){
                                    ?>
                                            <a href="{{ URL::to('/active-category-product/' . $cate_pro->category_id) }}"><span
                                                    class="fa-thumb-styling fa fa-thumbs-down" style="font-size: 18pt;color: red"></span></a>
                                            {{-- Ẩn --}}
                                            <?php    
                                    }else{
                                    ?>
                                            <a href="{{ URL::to('/unactive-category-product/' . $cate_pro->category_id) }}"><span
                                                    class="fa-thumb-styling fa fa-thumbs-up" style="font-size: 18pt"></span></a>
                                            {{-- Hiển thị --}}

                                            <?php
                                    }
                                    ?>
                                    </td>
                                    <td>
                                        <a href="{{ URL::to('/edit-category-product-' . $cate_pro->category_id) }}"><i
                                                class="fa fa-edit" style="color:green;font-size:15pt  "></i></a>|
                                        <a onclick="return confirm('Bạn chắc chắn muốn xóa danh mục này?')" href="{{ URL::to('/delete-category-product/' . $cate_pro->category_id) }}"><i
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
