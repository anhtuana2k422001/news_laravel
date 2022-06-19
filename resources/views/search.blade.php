@extends('main_layouts.master')
@section('title', $title. ' - TDQ ')

@section('content')
  <!-- Main Breadcrumb Start -->
  <div class="main--breadcrumb">
        <div class="container">
                <ul class="breadcrumb">
                    <li><a href="home-1.html" class="btn-link"><i class="fa fm fa-home"></i>Home</a></li>
                    <li class="active"><span>{{ $title }}</span></li>
                </ul>
            </div>
        </div>
        <!-- Main Breadcrumb End -->

        <!-- Main Content Section Start -->
        <div class="main-content--section pbottom--30">
            <div class="container">
                <div class="row">
                    <!-- Main Content Start -->
                    <div class="main--content col-md-8 col-sm-7" data-sticky-content="true">
                        <div class="sticky-content-inner">
                            <div class="row">

                                <!-- Books and Magazine Start -->
                                <div class="col-md-12 ptop--30 pbottom--30">
                                    <!-- Post Items Title Start -->
                                    <div class="post--items-title" data-ajax="tab">
                                        <h2 class="h4">{{ $posts->count() }} {{ $title }} {{ $time }}: <span style="color: black; background-color: #f7f201;" class="h4">{{$key}}</span></h2>
                                       
                                    </div>
                                    <!-- Post Items Title End -->

                                    <!-- Post Items Start -->
                                    <div class="post--items post--items-2" data-ajax-content="outer">
                                        <ul class="nav" data-ajax-content="inner">
											@for($i =0 ; $i < count($posts) ; $i++)
                                            <li>
                                                <!-- Post Item Start -->
                                                <div class="post--item">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="post--img">
                                                                <a href="{{ route('posts.show', $posts[$i] ) }}"
                                                                    class="thumb"><img
                                                                        src="{{ asset($posts[$i]->image ? 'storage/' . $posts[$i]->image->path : 'storage/placeholders/placeholder-image.png'  )}}"
                                                                        alt=""></a>
                                                                <a href="{{ route('categories.show', $posts[$i]->category) }}"
                                                                    class="cat">{{ $posts[$i]->category->name }}</a>

                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="post--info">
                                                                <ul class="nav meta">
																	<li><span>{{ $posts[$i]->author->name }}</a></li>
																	<li><span>{{ $posts[$i]->created_at->locale('vi')->diffForHumans() }}</span></li>
                                                                    <li><a href="#"><i class="fa fm fa-eye"></i>{{ $posts[$i]->views }}</span></li>
                                                                    <li><a href="{{ route('posts.show', $posts[$i] ) }}"><i class="fa fm fa-comments"></i>{{ count($posts[$i]->comments) }}</a></li>
                                                                </ul>


                                                                <div class="title">
                                                                    <h2 class="h3" style="color:black"><a
                                                                            href="{{ route('posts.show', $posts[$i] ) }}"
                                                                            class="btn-link">{{ $posts[$i]->title }}</a></h3>
                                                                </div>
                                                            </div>

                                                            <div class="post--content">
                                                                <p>{{ $posts[$i]->excerpt }}</p>
                                                            </div>

                                                            <div class="post--action">
                                                                <a class="btn btn-link" href="{{ route('posts.show', $posts[$i] ) }}">Đọc thêm</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Post Item End -->
                                            </li>

                                            <li>
                                                <!-- Divider Start -->
                                                <hr class="divider">
                                                <!-- Divider End -->
                                            </li>

											@endfor
                                        </ul>
                                        {{ $posts->links() }} 

                                    </div>
                                    <!-- Post Items End -->
						
                                </div>
                                <!-- Books and Magazine End -->
                                <!-- Photo Gallery Start -->
                            </div>
                        </div>
                    </div>
                    <!-- Main Content End -->

                    <!-- Main Sidebar Start -->
                    <div class="main--sidebar col-md-4 col-sm-5 ptop--30 pbottom--30" data-sticky-content="true">
                        <div class="sticky-content-inner">
                            <!-- Widget Start -->
                            <div class="widget">
                                <div class="widget--title" data-ajax="tab">
                                    <h2 class="h4">Bình chọn</h2>

                                    <div class="nav">
                                        <a href="#" class="prev btn-link" data-ajax-action="load_prev_poll_widget">
                                            <i class="fa fa-long-arrow-left"></i>
                                        </a>

                                        <span class="divider">/</span>

                                        <a href="#" class="next btn-link" data-ajax-action="load_next_poll_widget">
                                            <i class="fa fa-long-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>

                                <!-- Poll Widget Start -->
                                <div class="poll--widget" data-ajax-content="outer">
                                    <ul class="nav" data-ajax-content="inner">
                                        <li class="title">
                                            <h3 class="h4">
                                                Theo bạn thì giải vô địch bóng đá nào hay nhất từ ​​trước đến nay?</h3>
                                        </li>

                                        <li class="options">
                                            <form action="#">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="option-1">
                                                        <span>Brazil 2014</span>
                                                    </label>

                                                    <p>65%<span style="width: 65%;"></span></p>
                                                </div>

                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="option-2">
                                                        <span>South Africa 2010</span>
                                                    </label>

                                                    <p>28%<span style="width: 28%;"></span></p>
                                                </div>

                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="option-2">
                                                        <span>Germany 2006</span>
                                                    </label>

                                                    <p>07%<span style="width: 07%;"></span></p>
                                                </div>

                                                <button type="submit" class="btn btn-primary">Vote Now</button>
                                            </form>
                                        </li>
                                    </ul>

                                    <!-- Preloader Start -->
                                    <div class="preloader bg--color-0--b" data-preloader="1">
                                        <div class="preloader--inner"></div>
                                    </div>
                                    <!-- Preloader End -->
                                </div>
                                <!-- Poll Widget End -->
                            </div>
                            <!-- Widget End -->

                            <!-- Widget Start -->
                            <div class="widget">
                                <div class="widget--title" data-ajax="tab">
                                    <h2 class="h4">Bình chọn</h2>

                                    <div class="nav">
                                        <a href="#" class="prev btn-link" data-ajax-action="load_prev_poll_widget">
                                            <i class="fa fa-long-arrow-left"></i>
                                        </a>

                                        <span class="divider">/</span>

                                        <a href="#" class="next btn-link" data-ajax-action="load_next_poll_widget">
                                            <i class="fa fa-long-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>

                                <!-- Poll Widget Start -->
                                <div class="poll--widget" data-ajax-content="outer">
                                    <ul class="nav" data-ajax-content="inner">
                                        <li class="title">
                                            <h3 class="h4">
                                                Bạn có nghĩ rằng chi phí gửi tiền đến điện thoại di động nên giảm?</h3>
                                        </li>

                                        <li class="options">
                                            <form action="#">
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="option-1">
                                                        <span>Yes</span>
                                                    </label>

                                                    <p>65%<span style="width: 65%;"></span></p>
                                                </div>

                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="option-1">
                                                        <span>No</span>
                                                    </label>

                                                    <p>28%<span style="width: 28%;"></span></p>
                                                </div>

                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="option-1">
                                                        <span>Average</span>
                                                    </label>

                                                    <p>07%<span style="width: 07%;"></span></p>
                                                </div>

                                                <button type="submit" class="btn btn-primary">Vote Now</button>
                                            </form>
                                        </li>
                                    </ul>

                                    <!-- Preloader Start -->
                                    <div class="preloader bg--color-0--b" data-preloader="1">
                                        <div class="preloader--inner"></div>
                                    </div>
                                    <!-- Preloader End -->
                                </div>
                                <!-- Poll Widget End -->
                            </div>
                            <!-- Widget End -->

                            <!-- Widget Start -->
                            <div class="widget">
                                <!-- Ad Widget Start -->
                                <div class="ad--widget">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <a href="https://docbao.qdnd.vn/readding">
                                                <img src="http://127.0.0.1:8000/public/frontend/img/ads-img/150x150_banner_baoin.jpg"
                                                    alt="">
                                            </a>
                                        </div>

                                        <div class="col-sm-6">
                                            <a href="https://baomoi.com/chu-tich-ho-chi-minh/top/114.epi">
                                                <img src="http://127.0.0.1:8000/public/frontend/img/ads-img/150x150_banner_hcm_02-min.png"
                                                    alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Ad Widget End -->
                            </div>
                            <!-- Widget End -->

                            <!-- Widget Start -->
                            <div class="widget">
                                <div class="widget--title" data-ajax="tab">
                                    <h2 class="h4">Ý KIẾN NGƯỜI ĐỌC</h2>
                                </div>

                                <!-- List Widgets Start -->
                                <div class="list--widget list--widget-2" data-ajax-content="outer">
                                    <!-- Post Items Start -->
                                    <div class="post--items post--items-3">
                                        <ul class="nav" data-ajax-content="inner">
                                            <li>
                                                <!-- Post Item Start -->
                                                <div class="post--item post--layout-3">
                                                    <div class="post--img">
                                                        <span class="thumb"><img
                                                                src="http://127.0.0.1:8000/public/frontend/img/widgets-img/readers-opinion-01.png"
                                                                alt=""></span>

                                                        <div class="post--info">
                                                            <div class="title">
                                                                <h3 class="h4">hay</h3>
                                                            </div>

                                                            <ul class="nav meta">
                                                                <li><span> Huỳnh Thị Tuyết Nhi
                                                                    </span></li>
                                                                <li><span>16 April 2017</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Post Item End -->
                                            </li>
                                            <li>
                                                <!-- Post Item Start -->
                                                <div class="post--item post--layout-3">
                                                    <div class="post--img">
                                                        <span class="thumb"><img
                                                                src="http://127.0.0.1:8000/public/frontend/img/widgets-img/readers-opinion-01.png"
                                                                alt=""></span>

                                                        <div class="post--info">
                                                            <div class="title">
                                                                <h3 class="h4">Ho</h3>
                                                            </div>

                                                            <ul class="nav meta">
                                                                <li><span> Huỳnh Thị Tuyết Nhi
                                                                    </span></li>
                                                                <li><span>16 April 2017</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Post Item End -->
                                            </li>
                                            <li>
                                                <!-- Post Item Start -->
                                                <div class="post--item post--layout-3">
                                                    <div class="post--img">
                                                        <span class="thumb"><img
                                                                src="http://127.0.0.1:8000/public/frontend/img/widgets-img/readers-opinion-01.png"
                                                                alt=""></span>

                                                        <div class="post--info">
                                                            <div class="title">
                                                                <h3 class="h4">QUá hay</h3>
                                                            </div>

                                                            <ul class="nav meta">
                                                                <li><span> Lâm Thùy Linh
                                                                    </span></li>
                                                                <li><span>16 April 2017</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Post Item End -->
                                            </li>
                                            <li>
                                                <!-- Post Item Start -->
                                                <div class="post--item post--layout-3">
                                                    <div class="post--img">
                                                        <span class="thumb"><img
                                                                src="http://127.0.0.1:8000/public/frontend/img/widgets-img/readers-opinion-01.png"
                                                                alt=""></span>

                                                        <div class="post--info">
                                                            <div class="title">
                                                                <h3 class="h4">Hay</h3>
                                                            </div>

                                                            <ul class="nav meta">
                                                                <li><span> Lâm Thùy Linh
                                                                    </span></li>
                                                                <li><span>16 April 2017</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Post Item End -->
                                            </li>
                                        </ul>


                                    </div>
                                    <!-- Post Items End -->
                                </div>
                                <!-- List Widgets End -->
                            </div>
                            <!-- Widget End -->

                            <!-- Widget Start -->
                            <div class="widget">
                                <div class="widget--title" data-ajax="tab">
                                    <h2 class="h4">Lựa chọn của biên tập viên</h2>


                                </div>

                                <!-- List Widgets Start -->
                                <div class="list--widget list--widget-1" data-ajax-content="outer">
                                    <!-- Post Items Start -->
                                    <div class="post--items post--items-3">
                                        <ul class="nav" data-ajax-content="inner">
                                            <li>
                                                <!-- Post Item Start -->
                                                <div class="post--item post--layout-3">
                                                    <div class="post--img">
                                                        <a href="http://127.0.0.1:8000/bai-viet-an-giang-don-khoang-300000-luot-khach-tham-quan-trong-4-ngay-nghi-le"
                                                            class="thumb"><img
                                                                src="public/uploads/tintuc/screenshot_165162628234.png"
                                                                alt=""></a>

                                                        <div class="post--info">
                                                            <ul class="nav meta">
                                                                <li><a href="#">Lâm Thùy Linh</a>
                                                                </li>
                                                                <li><a href="#">2022-05-04</a></li>
                                                            </ul>

                                                            <div class="title">
                                                                <h3 class="h4"><a
                                                                        href="http://127.0.0.1:8000/bai-viet-an-giang-don-khoang-300000-luot-khach-tham-quan-trong-4-ngay-nghi-le"
                                                                        class="btn-link">An Giang đón khoảng 300.000
                                                                        lượt khách tham quan trong 4 ngày nghỉ lễ</a>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Post Item End -->
                                            </li>
                                            <li>
                                                <!-- Post Item Start -->
                                                <div class="post--item post--layout-3">
                                                    <div class="post--img">
                                                        <a href="http://127.0.0.1:8000/bai-viet-an-giang-bat-ke-doi-giet-me-roi-dam-anh-ruot-tu-vong"
                                                            class="thumb"><img
                                                                src="public/uploads/tintuc/screenshot_165162648513.png"
                                                                alt=""></a>

                                                        <div class="post--info">
                                                            <ul class="nav meta">
                                                                <li><a href="#">Lâm Thùy Linh</a>
                                                                </li>
                                                                <li><a href="#">2022-05-04</a></li>
                                                            </ul>

                                                            <div class="title">
                                                                <h3 class="h4"><a
                                                                        href="http://127.0.0.1:8000/bai-viet-an-giang-bat-ke-doi-giet-me-roi-dam-anh-ruot-tu-vong"
                                                                        class="btn-link">An Giang: Bắt kẻ đòi giết mẹ
                                                                        rồi đâm anh ruột tử vong</a></h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Post Item End -->
                                            </li>
                                            <li>
                                                <!-- Post Item Start -->
                                                <div class="post--item post--layout-3">
                                                    <div class="post--img">
                                                        <a href="http://127.0.0.1:8000/bai-viet-tong-thong-nga-yeu-cau-phap-va-phuong-tay-gay-ap-luc-de-ukraine-cham-dut-hanh-dong-tan-bao"
                                                            class="thumb"><img
                                                                src="public/uploads/tintuc/screenshot_165162755821.png"
                                                                alt=""></a>

                                                        <div class="post--info">
                                                            <ul class="nav meta">
                                                                <li><a href="#">Lâm Thùy Linh</a>
                                                                </li>
                                                                <li><a href="#">2022-05-04</a></li>
                                                            </ul>

                                                            <div class="title">
                                                                <h3 class="h4"><a
                                                                        href="http://127.0.0.1:8000/bai-viet-tong-thong-nga-yeu-cau-phap-va-phuong-tay-gay-ap-luc-de-ukraine-cham-dut-hanh-dong-tan-bao"
                                                                        class="btn-link">Tổng thống Nga yêu cầu Pháp và
                                                                        phương Tây gây áp lực để Ukraine &#039;chấm dứt
                                                                        hành động tàn bạo&#039;</a></h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Post Item End -->
                                            </li>
                                            <li>
                                                <!-- Post Item Start -->
                                                <div class="post--item post--layout-3">
                                                    <div class="post--img">
                                                        <a href="http://127.0.0.1:8000/bai-viet-thiet-bi-bien-nuoc-bien-thanh-nuoc-uong-vuot-chuan-who"
                                                            class="thumb"><img
                                                                src="public/uploads/tintuc/screenshot_165162813514.png"
                                                                alt=""></a>

                                                        <div class="post--info">
                                                            <ul class="nav meta">
                                                                <li><a href="#">Lâm Thùy Linh</a>
                                                                </li>
                                                                <li><a href="#">2022-05-04</a></li>
                                                            </ul>

                                                            <div class="title">
                                                                <h3 class="h4"><a
                                                                        href="http://127.0.0.1:8000/bai-viet-thiet-bi-bien-nuoc-bien-thanh-nuoc-uong-vuot-chuan-who"
                                                                        class="btn-link">Thiết bị biến nước biển thành
                                                                        nước uống vượt chuẩn WHO</a></h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Post Item End -->
                                            </li>
                                        </ul>

                                        <!-- Preloader Start -->
                                        <div class="preloader bg--color-0--b" data-preloader="1">
                                            <div class="preloader--inner"></div>
                                        </div>
                                        <!-- Preloader End -->
                                    </div>
                                    <!-- Post Items End -->
                                </div>
                                <!-- List Widgets End -->
                            </div>
                            <!-- Widget End -->
                        </div>
                    </div> <!-- Main Sidebar End -->
                </div>
            </div>
        </div>
        <!-- Main Content Section End -->
@endsection

