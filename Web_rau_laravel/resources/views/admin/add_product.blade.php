@extends('admin_layout')
@section('admin_content')
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Thêm sản phẩm</h4>
                <?php
                $message=Session::get('message');
                if($message){
                  echo $message;
                  Session::put('message',null);
                }
              ?>
                <form class="forms-sample" method="POST" action="{{URL::to('/save-product')}}" enctype="multipart/form-data"> 
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputUsername1">Tên sản phẩm</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" name="product_name"placeholder="Tên sản phẩm">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Số lượng sản phẩm</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" name="product_quantity"placeholder="Số lượng sản phẩm">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Giá bán</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" name="product_price"placeholder="Giá sản phẩm">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Giá gốc</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" name="product_cost"placeholder="Giá sản phẩm">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Hình ảnh sản phẩm</label>
                        <input type="file" class="form-control" id="exampleInputUsername1" name="product_image"placeholder="Hình ảnh sản phẩm">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mô tả sản phẩm</label>
                        <textarea style="resize: none;height: 80px;" class="form-control" id="exampleInputUsername1" name="product_desc" placeholder="Mô tả sản phẩm">
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nội dung sản phẩm</label>
                        <textarea style="resize: none;height: 80px;" class="form-control" id="exampleInputUsername1" name="product_content" placeholder="Nội dụng sản phẩm">
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Danh mục sản phẩm</label>
                        <select class="form-control" name="product_cate">
                            @foreach ($cate_product as $key => $cate )
                                
                            <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Hiển thị</label>
                        <select class="form-control" name="product_status">
                            <option value="0">Ẩn</option>
                            <option value="1">Hiển thị</option>

                        </select>
                    </div>
                    <input type="submit" class="btn btn-primary me-2" value="Thêm sản phẩm">
                </form>
            </div>
        </div>
    </div>
@endsection
