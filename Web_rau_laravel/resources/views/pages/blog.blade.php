@extends('layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Tin Tức mới nhất</h2>
                </div>
                <div class="featured__controls">
                    {{-- <ul>
                        <li class="active" data-filter="*">All</li>
                        <li data-filter=".oranges">Oranges</li>
                        <li data-filter=".fresh-meat">Fresh Meat</li>
                        <li data-filter=".vegetables">Vegetables</li>
                        <li data-filter=".fastfood">Fastfood</li>
                    </ul> --}}
                </div>
            </div>
        </div>

        <div class="row">
            <h3 style="font-weight: bolder">Tặng khuyến mãi tri ân các khách hàng của website nhân nhịp lễ 30/4, 1/5</h3>
        </div>
        <hr>
        <div class="row">
            <h4>
                Lễ 30-4 và 1-5 năm nay trùng hợp rơi vào các ngày cuối tuần nên kỳ nghỉ lễ được
                kéo dài 4 ngày. Đây là cơ hội lý tưởng cho các gia đình mua sắm những món như rau củ quả gia vị nêm nếm
                với giá tiết kiệm mà trong những ngày bận rộn không sắm được.
            </h4>

        </div>
        <div class="row mt-3">
            <img src="{{ 'public/frontend/img/blog/anh-blog.jpeg' }}">
        </div>
        <div class="row mt-3">
            <h4 style="font-weight: bolder">
                Đối với ngày lễ 30/4
            </h4>
        </div>
        <hr>
        <div class="row">
            <h5>Website sẽ để mã khuyến mãi "F304" ở đây cho tất cả các quý khách hàng của website
                , mã giảm giá sẽ hết hạn 23:59 PM ngày 30/4 nên quý khách
                hàng hãy nhanh tay mua sắm nào. Quý khách hàng chỉ cần nhập mã
                "F304" vào ô nhập mã giảm giá trong trang giỏ hàng thì khách hàng
                sẽ được quyền lợi giảm 10.000VNĐ trong tổng hóa đơn của mình. </h5>
        </div>
        <div class="row mt-3">
            <h4 style="font-weight: bolder">
                Đối với ngày lễ 1/5
            </h4>
        </div>
        <hr>
        <div class="row">
            <h5>Website sẽ để mã khuyến mãi "F105" ở đây cho tất cả các quý khách hàng của website
                , mã giảm giá sẽ hết hạn 23:59 PM ngày 1/5 nên quý khách
                hàng hãy nhanh tay mua sắm nào. Quý khách hàng chỉ cần nhập mã
                "F105" vào ô nhập mã giảm giá trong trang giỏ hàng thì khách hàng
                sẽ được quyền lợi giảm 10% trong tổng hóa đơn của mình. </h5>
        </div>
        <div class="row mt-3">
            <h4 style="font-weight: bolder">
                Lời tri ân
            </h4>
        </div>
        <hr>
        <div class="row">
            <h5>Nhân dịp lễ 30/4, 1/5, chúng tôi xin gửi tới Quý khách hàng lời cảm ơn chân thành nhất. Nếu không có sự ủng
                hộ của các bạn sẽ không có chúng tôi ngày hôm nay. Chúc bạn và gia đình một kỳ nghĩ thật vui vẻ và ý nghĩa
            </h5>
        </div>
    </div>
    </div>
@endsection
