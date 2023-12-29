@extends('admin_layout')
@section('admin_content')
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Thêm danh mục sản phẩm</h4>
                <?php
                $message=Session::get('message');
                if($message){
                  echo $message;
                  Session::put('message',null);
                }
              ?>
                <form class="forms-sample" method="POST" action="{{URL::to('/save-category-product')}}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputUsername1">Tên danh mục</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" name="category_product_name"placeholder="Tên danh mục">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mô tả danh mục</label>
                        <textarea style="resize: none;height: 80px;" class="form-control" id="exampleInputUsername1" name="category_product_desc" placeholder="Mô tả danh mục">
                        </textarea>
                    </div>
 
                    <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Hiển thị</label>
                        <select class="form-control" name="category_product_status">
                            <option value="0">Ẩn</option>
                            <option value="1">Hiển thị</option>

                        </select>
                    </div>
                    <input type="submit" class="btn btn-primary me-2" value="Thêm danh mục">
                </form>
            </div>
        </div>
    </div>
@endsection
