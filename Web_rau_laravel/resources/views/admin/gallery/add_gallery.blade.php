@extends('admin_layout')
@section('admin_content')

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Thêm thư viện ảnh</h4>
                <?php
                $message = Session::get('message');
                if ($message) {
                    echo $message;
                    Session::put('message', null);
                }
                ?>


                <form action="{{ url('/insert-gallery-' . $pro_id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-3" align="right">

                        </div>
                        <div class="col-md-6">
                            <input type="file" class="form-control" id="file" name="file[]" accept="image/*"
                                multiple>
                            <span id="error_gallery">
                            </span>
                        </div>
                        <div class="col-md-3">
                            <input type="submit" name="upload" name="taianh" value="Tải ảnh"
                                class="btn btn-success btn-xs">
                        </div>
                    </div>
                </form>
                <div class="panel-body">
                    <input type="hidden" value="{{ $pro_id }}" name="pro_id" class="pro_id">
                    <form>
                        @csrf
                        <div id="gallery_load">

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection
