@extends('admin_layout')
@section('admin_content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Liệt kê bình luận</h4>
                <div id="notify_comment"></div>
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
                                <th>Duyệt</th>
                                <th>Tên người gửi</th>
                                <th>Bình luận</th>
                                <th>Ngày gửi</th>
                                <th>Sản phẩm</th>
                                {{-- <th>Quản lý</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($comment as $key => $comm)
                                <tr>
                                    <td>
                                        {{-- @if ($comm->comment_status == 1)
                                                <input type="button" data-comment_status="0"
                                                    data-comment_id="{{ $comm->comment_id }}"
                                                    id="{{ $comm->comment_product_id }}"
                                                    class="btn btn-primary btn-xs comment_duyet_btn" value="Duyệt">
                                            @else
                                                <input type="button" data-comment_status="1"
                                                    data-comment_id="{{ $comm->comment_id }}"
                                                    id="{{ $comm->comment_product_id }}"
                                                    class="btn btn-danger btn-xs comment_duyet_btn" value="Bỏ Duyệt">
                                            @endif --}}
                                            <?php
                                            if($comm->comment_status == 1){
                                            ?>
                                                    <a href="{{ URL::to('/duyet-comment/' . $comm->comment_id) }}"><span
                                                            class="fa-thumb-styling fa fa-thumbs-down" style="font-size: 18pt;color: red"></span></a>
                                                    {{-- Ẩn --}}
                                                    <?php    
                                            }else{
                                            ?>
                                                    <a href="{{ URL::to('/khongduyet-comment/' . $comm->comment_id) }}"><span
                                                            class="fa-thumb-styling fa fa-thumbs-up" style="font-size: 18pt"></span></a>
                                                    {{-- Hiển thị --}}
                                                    <?php
                                            }
                                            ?>
                                    </td>

                                    <td>{{ $comm->comment_name }}</td>
                                    <td>
                                        {{ $comm->comment }}
                                    </td>
                                    <td>{{ $comm->comment_date }}</td>
                                    <td><a href="{{ url('/chi-tiet-san-pham-' . $comm->product->product_id) }}">
                                            {{ $comm->product->product_name }}</a>
                                    </td>

                                    {{-- <td>
                                        <a href=""><i class="fa fa-edit" style="color:green;font-size:15pt  "></i></a>|
                                        <a onclick="return confirm('Bạn chắc chắn muốn bình luận này?')" href=""><i
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
