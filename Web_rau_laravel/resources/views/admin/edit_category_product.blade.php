@extends('admin_layout')
@section('admin_content')

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Cập nhật danh mục sản phẩm</h4>
                <?php
                $message = Session::get('message');
                if ($message) {
                    echo $message;
                    Session::put('message', null);
                }
                ?>
                @foreach ( $edit_category_product as $key => $edit_val )
                    
                <form class="forms-sample" method="POST" action="{{ URL::to('/update-category-product-'. $edit_val->category_id) }}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputUsername1">Tên danh mục</label>
                        <input type="text" class="form-control" id="exampleInputUsername1"
                            name="category_product_name" value="{{$edit_val->category_name}}" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mô tả danh mục</label>
                        <textarea style="resize: none;height: 80px;" class="form-control" id="exampleInputUsername1"
                            name="category_product_desc">{{$edit_val->category_desc}}
                        </textarea>
                    </div>

                    {{-- <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Hiển thị</label>
                        <select class="form-control" name="category_product_status">
                            <option value="0">Ẩn</option>
                            <option value="1">Hiển thị</option>

                        </select>
                    </div> --}}
                    <input type="submit" name="update_category_product" class="btn btn-primary me-2" value="Cập nhật danh mục">
                </form>
                @endforeach

            </div>
        </div>
    </div>

@endsection
