@extends('layout')
@section('content')
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> --}}

    <section class="breadcrumb-section set-bg" data-setbg="{{ 'public/frontend/img/breadcrumb.jpg ' }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Đăng nhập</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Đăng nhập</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">

            <div class="row justify-content-around">

                <form class="col-md-6 bg-light p-3" method="POST" action="{{URL::to('/login-customer')}}">
                    <h3 class="text-center text-uppercase">Đăng nhập tài khoản</h3>
                    <?php
                    $message = Session::get('message');
                    if ($message) {
                        echo $message;
                        Session::put('message', null);
                    }
                    ?>
                    @csrf
                    <div class="form-group">
                        <label for="">Email:</label>
                        <input type="email" name="email_acc" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Mật khẩu:</label>
                        <input type="password" name="pwd_acc" id="" class="form-control">
                    </div>
                    <hr>
                    <div class="form-group">
                        <input type="submit" name="" id="" value="Đăng nhập" class="form-control">
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
