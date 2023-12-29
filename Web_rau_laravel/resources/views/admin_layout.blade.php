<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Star Admin2 </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ 'public/backend/vendors/feather/feather.css' }}">
    <link rel="stylesheet" href="{{ 'public/backend/vendors/mdi/css/materialdesignicons.min.css' }}">
    <link rel="stylesheet" href="{{ 'public/backend/vendors/ti-icons/css/themify-icons.css' }}">
    <link rel="stylesheet" href="{{ 'public/backend/vendors/typicons/typicons.css' }}">
    <link rel="stylesheet" href="{{ 'public/backend/vendors/simple-line-icons/css/simple-line-icons.css' }}">
    <link rel="stylesheet" href="{{ 'public/backend/vendors/css/vendor.bundle.base.css' }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ 'public/backend/vendors/datatables.net-bs4/dataTables.bootstrap4.css' }}">
    <link rel="stylesheet" href="{{ 'public/backend/js/select.dataTables.min.css' }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ 'public/backend/css/vertical-layout-light/style.css' }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ 'public/backend/images/favicon.png' }}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- Chart --}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    {{-- Morris chart js --}}
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>
    <div class="container-scroller">
        <div class="row p-0 m-0 proBanner" id="proBanner">
            <div class="col-md-12 p-0 m-0">
                <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
                    <div class="ps-lg-1">
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates,
                                and more with this template!</p>
                            <a href="https://www.bootstrapdash.com/product/star-admin-pro/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo"
                                target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="https://www.bootstrapdash.com/product/star-admin-pro/"><i
                                class="mdi mdi-home me-3 text-white"></i></a>
                        <button id="bannerClose" class="btn border-0 p-0">
                            <i class="mdi mdi-close text-white me-0"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <div class="me-3">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-bs-toggle="minimize">
                        <span class="icon-menu"></span>
                    </button>
                </div>
                <div>
                    <a class="navbar-brand brand-logo" href="{{ URL::to('/dashboard') }}">
                        <img src="{{ 'public/backend/images/logo.svg' }}" alt="logo" />
                    </a>
                    <a class="navbar-brand brand-logo-mini" href="{{ URL::to('/dashboard') }}">
                        <img src="{{ 'public/backend/images/logo-mini.svg' }}" alt="logo" />
                    </a>
                </div>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-top">
                <ul class="navbar-nav">
                    <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                        <h1 class="welcome-text">Good Morning, <span class="text-black fw-bold">
                                <?php
                                $name = Session::get('admin_name');
                                if ($name) {
                                    echo $name;
                                }
                                ?>
                            </span></h1>
                        <h3 class="welcome-sub-text">Your performance summary this week </h3>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <form class="search-form" action="#">
                            <i class="icon-search"></i>
                            <input type="search" class="form-control" placeholder="Search Here" title="Search here">
                        </form>
                    </li>


                    <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                        <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img class="img-xs rounded-circle" src="{{ 'public/backend/images/faces/face8.jpg' }}"
                                alt="Profile image"> </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                            <div class="dropdown-header text-center">
                                <img class="img-md rounded-circle" src="{{ 'public/backend/images/faces/face8.jpg' }}"
                                    alt="Profile image">
                                <p class="mb-1 mt-3 font-weight-semibold">
                                    <?php
                                    $name = Session::get('admin_name');
                                    if ($name) {
                                        echo $name;
                                    }
                                    ?> </p>
                                <hr>
                            </div>
                            {{-- <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile <span class="badge badge-pill badge-danger">1</span></a>
              <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-message-text-outline text-primary me-2"></i> Messages</a>
              <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-calendar-check-outline text-primary me-2"></i> Activity</a>
              <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-help-circle-outline text-primary me-2"></i> FAQ</a> --}}
                            <a class="dropdown-item" href="{{ URL::to('/logout') }}"><i
                                    class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-bs-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            <div class="theme-setting-wrapper">
                <div id="settings-trigger"><i class="ti-settings"></i></div>
                <div id="theme-settings" class="settings-panel">
                    <i class="settings-close ti-close"></i>
                    <p class="settings-heading">SIDEBAR SKINS</p>
                    <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                        <div class="img-ss rounded-circle bg-light border me-3"></div>Light
                    </div>
                    <div class="sidebar-bg-options" id="sidebar-dark-theme">
                        <div class="img-ss rounded-circle bg-dark border me-3"></div>Dark
                    </div>
                    <p class="settings-heading mt-2">HEADER SKINS</p>
                    <div class="color-tiles mx-0 px-4">
                        <div class="tiles success"></div>
                        <div class="tiles warning"></div>
                        <div class="tiles danger"></div>
                        <div class="tiles info"></div>
                        <div class="tiles dark"></div>
                        <div class="tiles default"></div>
                    </div>
                </div>
            </div>
            <div id="right-sidebar" class="settings-panel">
                <i class="settings-close ti-close"></i>
                <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="todo-tab" data-bs-toggle="tab" href="#todo-section"
                            role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="chats-tab" data-bs-toggle="tab" href="#chats-section"
                            role="tab" aria-controls="chats-section">CHATS</a>
                    </li>
                </ul>
                <div class="tab-content" id="setting-content">
                    <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel"
                        aria-labelledby="todo-section">
                        <div class="add-items d-flex px-3 mb-0">
                            <form class="form w-100">
                                <div class="form-group d-flex">
                                    <input type="text" class="form-control todo-list-input"
                                        placeholder="Add To-do">
                                    <button type="submit" class="add btn btn-primary todo-list-add-btn"
                                        id="add-task">Add</button>
                                </div>
                            </form>
                        </div>
                        <div class="list-wrapper px-3">
                            <ul class="d-flex flex-column-reverse todo-list">
                                <li>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox">
                                            Team review meeting at 3.00 PM
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox">
                                            Prepare for presentation
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox">
                                            Resolve all the low priority tickets due today
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                                <li class="completed">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox" checked>
                                            Schedule meeting for next week
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                                <li class="completed">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox" checked>
                                            Project review
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                            </ul>
                        </div>
                        <h4 class="px-3 text-muted mt-5 fw-light mb-0">Events</h4>
                        <div class="events pt-4 px-3">
                            <div class="wrapper d-flex mb-2">
                                <i class="ti-control-record text-primary me-2"></i>
                                <span>Feb 11 2018</span>
                            </div>
                            <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
                            <p class="text-gray mb-0">The total number of sessions</p>
                        </div>
                        <div class="events pt-4 px-3">
                            <div class="wrapper d-flex mb-2">
                                <i class="ti-control-record text-primary me-2"></i>
                                <span>Feb 7 2018</span>
                            </div>
                            <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
                            <p class="text-gray mb-0 ">Call Sarah Graves</p>
                        </div>
                    </div>
                    <!-- To do section tab ends -->
                    <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
                        <div class="d-flex align-items-center justify-content-between border-bottom">
                            <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
                            <small
                                class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 fw-normal">See
                                All</small>
                        </div>
                        <ul class="chat-list">
                            <li class="list active">
                                <div class="profile"><img src="images/faces/face1.jpg" alt="image"><span
                                        class="online"></span></div>
                                <div class="info">
                                    <p>Thomas Douglas</p>
                                    <p>Available</p>
                                </div>
                                <small class="text-muted my-auto">19 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="images/faces/face2.jpg" alt="image"><span
                                        class="offline"></span></div>
                                <div class="info">
                                    <div class="wrapper d-flex">
                                        <p>Catherine</p>
                                    </div>
                                    <p>Away</p>
                                </div>
                                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                                <small class="text-muted my-auto">23 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="images/faces/face3.jpg" alt="image"><span
                                        class="online"></span></div>
                                <div class="info">
                                    <p>Daniel Russell</p>
                                    <p>Available</p>
                                </div>
                                <small class="text-muted my-auto">14 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="images/faces/face4.jpg" alt="image"><span
                                        class="offline"></span></div>
                                <div class="info">
                                    <p>James Richardson</p>
                                    <p>Away</p>
                                </div>
                                <small class="text-muted my-auto">2 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="images/faces/face5.jpg" alt="image"><span
                                        class="online"></span></div>
                                <div class="info">
                                    <p>Madeline Kennedy</p>
                                    <p>Available</p>
                                </div>
                                <small class="text-muted my-auto">5 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="images/faces/face6.jpg" alt="image"><span
                                        class="online"></span></div>
                                <div class="info">
                                    <p>Sarah Graves</p>
                                    <p>Available</p>
                                </div>
                                <small class="text-muted my-auto">47 min</small>
                            </li>
                        </ul>
                    </div>
                    <!-- chat tab ends -->
                </div>
            </div>
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ URL::to('/dashboard') }}">
                            <i class="mdi mdi-grid-large menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item nav-category">Manager</li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                            aria-controls="ui-basic">
                            <i class="menu-icon mdi mdi-floor-plan"></i>
                            <span class="menu-title">Danh mục</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{ URL::to('/add-category-product') }}">Thêm danh mục</a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{ URL::to('/all-category-product') }}">Liệt kê danh mục</a></li>
                            </ul>
                        </div>
                    </li>
                    <hr>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false"
                            aria-controls="ui-basic">
                            <i class="menu-icon mdi mdi-floor-plan"></i>
                            <span class="menu-title">Sản phẩm</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="form-elements">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{ URL::to('/add-product') }}">Thêm
                                        sản phẩm</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ URL::to('/all-product') }}">Liệt
                                        kê sản phẩm</a></li>
                            </ul>
                        </div>
                    </li>
                    <hr>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false"
                            aria-controls="ui-basic">
                            <i class="menu-icon mdi mdi-floor-plan"></i>
                            <span class="menu-title">Bình luận</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="tables">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{ URL::to('/comment') }}">Liệt
                                        kê bình luận</a></li>
                            </ul>
                        </div>
                    </li>
                    <hr>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#tables1" aria-expanded="false"
                            aria-controls="ui-basic">
                            <i class="menu-icon mdi mdi-floor-plan"></i>
                            <span class="menu-title">Khách hàng</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="tables1">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{ URL::to('/all-customer') }}">Liệt
                                        kê khách hàng</a></li>
                            </ul>
                        </div>
                    </li>
                    <hr>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false"
                            aria-controls="ui-basic">
                            <i class="menu-icon mdi mdi-floor-plan"></i>
                            <span class="menu-title">Đơn hàng</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="charts">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{ URL::to('/manage-order') }}">Quản
                                        lý đơn hàng</a></li>
                            </ul>
                        </div>
                    </li>
                    <hr>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#chart" aria-expanded="false"
                            aria-controls="ui-basic">
                            <i class="menu-icon mdi mdi-floor-plan"></i>
                            <span class="menu-title">Giảm giá</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="chart">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{ URL::to('/insert-coupon') }}">Thêm mã giảm giá</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ URL::to('/list-coupon') }}">Danh
                                        sách mã giảm giá</a></li>

                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        @yield('admin_content')
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a
                                href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a>
                            from BootstrapDash.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All
                            rights reserved.</span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="{{ 'public/backend/vendors/js/vendor.bundle.base.js' }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ 'public/backend/vendors/chart.js/Chart.min.js' }}"></script>
    <script src="{{ 'public/backend/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js' }}"></script>
    <script src="{{ 'public/backend/vendors/progressbar.js/progressbar.min.js' }}"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ 'public/backend/js/off-canvas.js' }}"></script>
    <script src="{{ 'public/backend/js/hoverable-collapse.js' }}"></script>
    <script src="{{ 'public/backend/js/template.js' }}"></script>
    <script src="{{ 'public/backend/js/settings.js' }}"></script>
    <script src="{{ 'public/backend/js/todolist.js' }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ 'public/backend/js/jquery.cookie.js' }}" type="text/javascript"></script>
    <script src="{{ 'public/backend/js/dashboard.js' }}"></script>
    <script src="{{ 'public/backend/js/Chart.roundedBarCharts.js' }}"></script>
    {{-- Chart --}}
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    {{-- Morris chart js --}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <!-- End custom js for this page-->

    {{-- Duyệt bình luận --}}
    {{-- <script type="text/javascript">
        $('.comment_duyet_btn').click(function() {
            var comment_status = $(this).data('comment_status');
            var comment_id = $(this).data('comment_id');
            var comment_product_id = $(this).attr('id');


            if (comments_status == 0) {
                var alert = 'Thay đổi duyệt thành công';
            } else {
                var alert = 'Thay đổi không duyệt thành công';

            }
            $.ajax({
                url: "{{ url('/allow-comment') }}",
                method: "POST",

                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content');
                },
                data: {
                    comment_status: comment_status,
                    comment_id: comment_id,
                    comment_product_id: comment_product_id

                },
                success: function(data) {
                    $('#notify_comment').html('<span>'.alert.
                        ' </span>');

                }
            });
        });
    </script> --}}
    <script type="text/javascript">
        $(document).ready(function() {
            load_gallery();

            function load_gallery() {
                var pro_id = $('.pro_id').val();
                var _token = $('input[name ="_token"]').val();
                // alert(pro_id);
                $.ajax({
                    url: "{{ url('/select-gallery') }}",
                    method: "POST",
                    data: {
                        pro_id: pro_id,
                        _token: _token
                    },
                    success: function(data) {
                        $('#gallery_load').html(data);
                    }
                });
            }

            $('#file').change(function() {
                var error = '';
                var files = $('#file')[0].files;

                if (files.length > 5) {
                    error += '<p>Bạn chỉ tối đa được 5 ảnh</p>';
                } else if (files.length == '') {
                    error += '<p>Bạn không được bỏ trống ảnh</p>';
                } else if (files.size > 200000000) {
                    error += '<p>File ảnh không được lớn hơn 2MB</p>';
                }

                if (error == '') {


                } else {
                    // let html1= '<span class="text-danger">'.error.'</span>';
                    // $('#error_gallery').html(html1);

                    $('#file').val('');
                    // $('#error_gallery').html('<span class="text-danger">'.error.'</span>');
                    return false;
                }

            });


            $(document).on('blur', '.edit_gal_name', function() {
                var gal_id = $(this).data('gal_id');
                var gal_text = $(this).text();
                var _token = $('input[name ="_token"]').val();
                $.ajax({
                    url: "{{ url('/update-gallery-name') }}",
                    method: "POST",
                    data: {
                        gal_id: gal_id,
                        gal_text: gal_text,
                        _token: _token
                    },
                    success: function(data) {
                        load_gallery();
                        $('#error_gallery').html(
                            '<span class="text-danger">Cập nhật sản phẩm thành công</span>');

                    }
                });

            });


            $(document).on('click', '.delete-gallery', function() {
                var gal_id = $(this).data('gal_id');
                var _token = $('input[name ="_token"]').val();
                if (confirm('Bạn có muốn xóa ảnh này?')) {
                    $.ajax({
                        url: "{{ url('/delete-gallery') }}",
                        method: "POST",
                        data: {
                            gal_id: gal_id,

                            _token: _token
                        },
                        success: function(data) {
                            load_gallery();
                            $('#error_gallery').html(
                                '<span class="text-danger">Xóa hình ảnh thành công</span>');

                        }
                    });
                }
            });

            $(document).on('change', '.file_image', function() {

                var gal_id = $(this).data('gal_id');
                var image = document.getElementById('file-' + gal_id).files[0];
                // var _token = $('input[name ="_token"]').val();

                var form_data = new FormData();

                form_data.append("file", document.getElementById('file-' + gal_id).files[0]);
                form_data.append("gal_id", gal_id);


                $.ajax({
                    url: "{{ url('/update-gallery') }}",
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: form_data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        load_gallery();
                        $('#error_gallery').html(
                            '<span class="text-danger">Cập nhật hình ảnh thành công</span>');

                    }
                });

            });

        });
    </script>
    <script type="text/javascript">
        $('.order_details1').change(function() {
            var order_status = $(this).val();
            var order_id = $(this).children(":selected").attr("id");
            var _token = $('input[name ="_token"]').val();
            // alert(order_status);

            //lay so luong
            quantity = [];
            $("input[name='product_sales_quantity']").each(function() {
                quantity.push($(this).val());
            });
            order_product_id = [];
            $("input[name='order_product_id']").each(function() {
                order_product_id.push($(this).val());
            })
            j = 0;
            for (i = 0; i < order_product_id.length; i++) {
                //so luong khach dat
                var order_qty = $('.order_qty_' + order_product_id[i]).val();
                //so luong ton kho
                var order_qty_storage = $('.order_qty_storage_' + order_product_id[i]).val();
                if (parseInt(order_qty) > parseInt(order_qty_storage)) {
                    j = j + 1;
                    if (j = 1) {
                        alert('Số lượng bán trong kho không đủ');
                    }
                    $('.color_qty_' + order_product_id[i]).css('background', '#CC0000');
                }
            }
            if (j == 0) {
                $.ajax({
                    url: "{{ url('/update-order-qty') }}",
                    method: "POST",
                    data: {
                        _token: _token,
                        order_status: order_status,
                        order_id: order_id,
                        quantity: quantity,
                        order_product_id: order_product_id
                    },
                    success: function(data) {
                        alert('Đã cập nhật số lượng vào kho ');
                        location.reload();
                    }
                });

            }


        });
    </script>
    <script text="javascript">
        $(function() {
            $("#datepicker").datepicker({
                dateFormat: "yy-mm-dd"
            });
            $("#datepicker2").datepicker({
                dateFormat: "yy-mm-dd"
            });
        });
    </script>
    <script text="javascript">
        $(document).ready(function() {

            chart30daysorder();

            var chart = new Morris.Bar({
                element: 'myfirstchart',
                lineColors: ['#819C79', '#fc8710', '#FF6541', '#A4ADD3', '#766B56'],
                parseTime: false,
                hideHover: 'auto',
                xkey: 'period',
                ykeys: ['order', 'sales', 'profit', 'quantity'],
                labels: ['đơn hàng', 'doanh số', 'lợi nhuận', 'số lượng']


            });

            function chart30daysorder() {
                var _token = $('input[name ="_token"]').val();
                $.ajax({
                    url: "{{ url('/days-order') }}",
                    method: "POST",
                    dataType: "JSON",
                    data: {
                        _token: _token
                    },
                    success: function(data) {
                        chart.setData(data);
                    }
                });
            }
            $('.dashboard-filter').change(function() {
                var dashboard_value = $(this).val();
                var _token = $('input[name ="_token"]').val();
                // alert(dashboard_vaule);
                $.ajax({
                    url: "{{ url('/dashboard-filter') }}",
                    method: "POST",
                    dataType: "JSON",
                    data: {
                        dashboard_value: dashboard_value,
                        _token: _token
                    },
                    success: function(data) {
                        chart.setData(data);
                    }
                });

            });
            $("#btn-dashboard-filter").click(function() {
                var _token = $('input[name ="_token"]').val();

                var from_date = $('#datepicker').val();
                var to_date = $('#datepicker2').val();
                $.ajax({
                    url: "{{ url('/filter-by-date') }}",
                    method: "POST",
                    dataType: "JSON",
                    data: {
                        from_date: from_date,
                        to_date: to_date,
                        _token: _token
                    },
                    success: function(data) {
                        chart.setData(data);
                    }
                });

            });

        });
    </script>
    <script type="text/javascript">
        var colorDanger = "#FF1744";
        Morris.Donut({
            element: 'donut',
            resize: true,
            colors: [
                '#ce616a',
                '#ce8f61',
                '#4842f5',
            ],

            data: [{
                    label: "San pham",
                    value: <?php echo $app_product; ?>
                },

                {
                    label: "Don hang",
                    value: <?php echo $app_order; ?>
                },

                {
                    label: "Khach hang",
                    value: <?php echo $app_customer; ?>
                }
            ]
        });
    </script>

</body>

</html>
