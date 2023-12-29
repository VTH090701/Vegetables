@extends('admin_layout')
@section('admin_content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Liệt kê đơn hàng</h4>

                <div class="table-responsive">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Mã đơn hàng</th>
                                <th>Tình trạng</th>
                                <th>Ngày tháng đặt hàng</th>


                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($order as $key => $order)
                                <tr>
                                    <td>{{ $order->order_id }}</td>

                                    <td>
                                        @if ($order->order_status == 1)
                                            Đơn hàng mới
                                        @else
                                            Đã xử lý - Đang giao
                                        @endif
                                    </td>



                                    <td>{{ $order->created_at }}</td>
                                    <td>
                                        <a href="{{ URL::to('/view-order-' . $order->order_id) }}"><i class="fa fa-eye"
                                                style="color:green;font-size:15pt  "></i></a> 
                                                {{-- |
                                        <a onclick="return confirm('Bạn chắc chắn muốn xóa đơn hàng này?')"
                                            href="{{ URL::to('/delete-order/' . $order->order_id) }}"><i class="fa fa-close"
                                                style="color:red;font-size:18pt  "></i></a> --}}
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
