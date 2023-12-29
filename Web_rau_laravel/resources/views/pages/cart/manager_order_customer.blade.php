@extends('layout')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ 'public/frontend/img/breadcrumb.jpg ' }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Đơn hàng của bạn</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Đơn hàng của bạn</a>
                            <span>Đơn hàng của bạn</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <section class="checkout spad">

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    {{-- <h4 class="card-title">Liệt kê đơn hàng của bạn</h4> --}}

                    <div class="table-responsive">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tình trạng</th>
                                    <th>Ngày tháng đặt hàng</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                
                                ?>
                                @foreach ($order as $key => $order)
                                    <tr>

                                        <td>
                                            <?php
                                            $i++;
                                            
                                            echo $i;
                                            ?>
                                        </td>
                                        <td>
                                            @if ($order->order_status == 1)
                                                Chưa xử lý
                                            @else
                                                Đã xử lý - Đang giao
                                            @endif
                                        </td>



                                        <td>{{ $order->created_at }}</td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        </div>
    </section>
@endsection
