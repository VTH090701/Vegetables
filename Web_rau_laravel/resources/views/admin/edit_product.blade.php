@extends('admin_layout')
@section('admin_content')
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Cập nhật sản phẩm</h4>
                <?php
                $message = Session::get('message');
                if ($message) {
                    echo $message;
                    Session::put('message', null);
                }
                ?>
                @foreach ($edit_product as $key => $pro)
                    <form class="forms-sample" method="POST" action="{{ URL::to('/update-product-' . $pro->product_id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="exampleInputUsername1" name="product_name"
                                value="{{ $pro->product_name }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Số lượng sản phẩm</label>
                            <input type="text" class="form-control" id="exampleInputUsername1" name="product_quantity"
                                value="{{ $pro->product_quantity }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Giá bán</label>
                            <input type="text" class="form-control" id="exampleInputUsername1" name="product_price"
                                value="{{ $pro->product_price }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Giá gốc</label>
                            <input type="text" class="form-control" id="exampleInputUsername1" name="product_cost"
                                value="{{ $pro->product_cost }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Hình ảnh sản phẩm</label>
                            <input type="file" class="form-control" id="exampleInputUsername1" name="product_image">
                            <img src="public/uploads/product/{{ $pro->product_image }}" width="100" height="100">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô tả sản phẩm</label>
                            <textarea style="resize: none;height: 80px;" class="form-control" id="exampleInputUsername1" name="product_desc">
                            {{ $pro->product_desc }}
                        </textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nội dung sản phẩm</label>
                            <textarea style="resize: none;height: 80px;" class="form-control" id="exampleInputUsername1" name="product_content">
                            {{ $pro->product_content }}

                        </textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputConfirmPassword1">Danh mục sản phẩm</label>
                            <select class="form-control" name="product_cate">
                                @foreach ($cate_product as $key => $cate)
                                    @if ($cate->category_id == $pro->category_id)
                                        <option selected value="{{ $cate->category_id }}">{{ $cate->category_name }}
                                        </option>
                                    @else
                                        <option value="{{ $cate->category_id }}">{{ $cate->category_name }}</option>
                                    @endif
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputConfirmPassword1">Hiển thị</label>
                            <select class="form-control" name="product_status">
                                {{-- <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option> --}}
                                @if ($pro->product_status == 1)
                                    <option selected value="1">Hiển thị</option>
                                    <option value="0">Ẩn</option>
                                @else
                                <option selected value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                                @endif
                            </select>
                        </div>
                        <input type="submit" class="btn btn-primary me-2" value="Cập nhật sản phẩm">
                    </form>
                @endforeach

            </div>
        </div>
    </div>
@endsection
