@extends('admin_layout')
@section('admin_content')
    <div class="container-fluid">
        <style type="text/css">
            p.title_thongke {
                text-align: center;
                font-size: 20px;
                font-weight: bold;
            }

            form {
                display: flex;
            }
        </style>
        {{-- <h3>Chào mừng bạn đến với Admin</h3> --}}
        <div class="row">
            <p class="title_thongke">Thống kê đơn hàng doanh số</p>
            <form autocomplete="off">

                @csrf
                <div class="col-md-2">
                    <p>Từ ngày:<input type="text" id="datepicker" class="form-control"></p>
                    <input type="button" id="btn-dashboard-filter" class="bth bth-primary btn-sm" value="Lọc kết quả">
                </div>
                <div class="col-md-2">
                    <p>Đến ngày:<input type="text" id="datepicker2" class="form-control"></p>
                </div>
                <div class="col-md-2">
                    <p>
                        Lọc theo:
                        <select class="dashboard-filter form-control">
                            <option>--Chọn--</option>
                            <option value="7ngay">7 ngày qua</option>
                            <option value="thangtruoc">Tháng trước</option>
                            <option value="thangnay">Tháng này</option>
                            <option value="365ngayqua">365 ngày qua</option>
                        </select>
                    </p>
                </div>
            </form>
            <div id="myfirstchart" style="height: 250px;"></div>

        </div>
        <div class="row">
            <div class="col-md-4 col-xs-12">
                <p class="title_thongke">Thống kê tổng sản phẩm đơn hàng</p>
                <div id="donut" ></div>
            </div>
            <div class="col-md-4 col-xs-12">
                <style type="text/css">
                    ol.list_views{
                        margin: 10px 0;
                        color: #fff;
                    }
                    ol.listviews a {
                        color: orange;
                        font-weight: 400;
                    }
                </style>
                <h3>Sản phẩm xem nhiều</h3>
                <ol class="list_views">
                    @foreach ($product_views as $key =>$pro )
                        <li>
                            <a target="_blank" href="{{ URL::to('/chi-tiet-san-pham-' . $pro->product_id) }}">{{$pro->product_name}}|
                                <span style="color:black">{{$pro->product_views}}</span></a>
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>
        <div class="row"></div>
    </div>
@endsection
