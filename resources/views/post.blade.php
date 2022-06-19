@extends('main_layouts.master')

@section('title', $post->title. ' - TDQ ')

@section('custom_css')
	<style>
		.post--body.post--content{
			color: black;
			font-family: "Source Sans Pro", sans-serif;
			font-size: 18px;
		}

		.text.capitalize{
			text-transform: capitalize !important;
		}

		.author-info,
		.post-time{
			margin: 0;
			font-size: 14px !important;
			text-align: right;
		}

	</style>
@endsection

@section('content')

<!-- Main Breadcrumb Start -->
<div class="main--breadcrumb">
	<div class="container">
			<ul class="breadcrumb">
				<li><a href="http://127.0.0.1:8000" class="btn-link"><i class="fa fm fa-home"></i>Trang Chủ</a></li>
				<li><a href="{{ route('categories.show', $post->category ) }}" class="btn-link">{{ $post->category->name }}</a></li>
				<li class="active"><span>{{ $post->title }}</span></li>
			</ul>
	</div>
</div>
	<!-- Main Breadcrumb End -->

<!-- Main Content Section Start -->
<div class="main-content--section pbottom--30">
        <div class="container">
            <div class="row">
                <!-- Main Content Start -->
                <div class="main--content col-md-8" data-sticky-content="true">
                    <div class="sticky-content-inner">
                        <!-- Post Item Start -->
                        <div class="post--item post--single post--title-largest pd--30-0">
                            <div class="post--cats">
                                <ul class="nav">
                                    <li><span><i class="fa fa-folder-open-o"></i></span></li>
									@for($i = 0; $i <  count($post->tags) ; $i++)
                                    <li><a class="text capitalize" href="{{ route('tags.show',  $post->tags[$i]) }}">{{ $post->tags[$i]->name }}</a></li>
									@endfor
                                </ul>
                            </div>

                            <div class="post--info">
                                <ul class="nav meta">
									<li class="text capitalize"><a href="#">{{ $post->created_at->locale('vi')->translatedFormat('l'), }} {{  $post->created_at->locale('vi')->format('d/m/Y') }}<a></li>
                                    <li><a href="#">{{ $post->author->name }}</a></li>
                                    <li><span><i class="fa fm fa-eye"></i>{{ $post->views }}</span></li>
                                    <li><a href="#"><i class="fa fm fa-comments-o"></i>{{ count($post->comments) }}</a></li>
                                </ul>

                                <div class="title">
                                    <h2 class="h4">{{ $post->title }}</h2>
                                </div>
                            </div>
                            <div class="post--body post--content">
								{!! $post->body !!}
                            </div>
                        </div>
                        <!-- Post Item End -->

                        <!-- Advertisement Start -->
                        <div class="ad--space pd--20-0-40">
							<p class="author-info">Người viết: {{ $post->author->name }}</p>
							<p class="post-time">Thời gian: {{ $post->created_at->locale('vi')->diffForHumans() }}</p>
                        </div>
                        <!-- Advertisement End -->

                        <!-- Post Tags Start -->
                        <div class="post--tags">
                            <ul class="nav">
                                <li><span><i class="fa fa-tags"></i> Từ khóa </span></li>
								@for($i = 0; $i <  count($post->tags) ; $i++)
                                    <li><a class="text capitalize" href="{{ route('tags.show',  $post->tags[$i]) }}">{{ $post->tags[$i]->name }}</a></li>
								@endfor
                            </ul>
                        </div>
                        <!-- Post Tags End -->

                        <!-- Post Social Start -->
                        <div class="post--social pbottom--30">
                            <span class="title"><i class="fa fa-share-alt"></i> Chia sẻ </span>

                            <!-- Social Widget Start -->
                            <div class="social--widget style--4">
                                <ul class="nav">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                    <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                                </ul>
                            </div>
                            <!-- Social Widget End -->
                        </div>
                        <!-- Post Social End -->

                    
                        <!-- Comment List Start -->
                        <div class="comment--list pd--30-0">
                            <!-- Post Items Title Start -->
                            <div class="post--items-title">
                                <h2 class="h4">{{ count($post->comments) }} bình luận</h2>
                                <i class="icon fa fa-comments-o"></i>
                            </div>
                            <!-- Post Items Title End -->

                            <ul class="comment--items nav">
							@foreach($post->comments as $comment)
                                <li>
                                    <!-- Comment Item Start -->
                                   <div class="comment--item clearfix">
										<div class="comment--img float--left">
											<img src="{{ $comment->user->image ?  asset('storage/' . $comment->user->image->path) : asset('storage/placeholders/user_placeholder.jpg') }}" alt="">
										</div>
										<div class="comment--info">
											<div class="comment--header clearfix">
												<p class="name">{{ $comment->user->name }}</p>
												<p class="date">{{ $comment->created_at->locale('vi')->diffForHumans() }}</p>
												<a href="http://127.0.0.1:8000/report3" class="reply"><i class="fa fa-flag"></i></a>
											</div>
											<div class="comment--content">
												<p>{{ $comment->the_comment }}</p>
												<p class="star">
													<span class="text-left"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
												</p>
											</div>
										</div>
                                    </div>
                                    <!-- Comment Item End -->
                                </li>
								@endforeach
                            </ul>
                        </div>
                        <!-- Comment List End -->

                        <!-- Comment Form Start -->
                        <div class="comment--form pd--30-0">
                            <!-- Post Items Title Start -->
                            <div class="post--items-title">
								<h2 class="h4">Viết bình luận</h2>
								
                                <i class="icon fa fa-pencil-square-o"></i>
                            </div>
                            <!-- Post Items Title End -->
							
                            <div class="comment-respond">
								<x-blog.message :status="'success'"/>
								@auth	
								<form method="POST" action="{{ route('posts.add_comment', $post )}}">
									@csrf

									<div class="row form-group">
										<div class="col-md-12">
											<textarea name="the_comment" id="message" cols="30" rows="5" class="form-control" placeholder="Đánh giá bài viết này"></textarea>
										</div>
									</div>

									<div class="form-group">
										<input type="submit" value="Bình luận" class="btn btn-primary">
									</div>
								</form>
                                </form>
								@endauth
								@guest
								<p class="h4">
									<a href="{{ route('login') }}">Đăng nhập</a> hoặc 
									<a href="{{ route('register') }}">Đăng ký</a> để bình luận bài viết
								</p>
								@endguest
                            </div>

                        </div>
                        <!-- Comment Form End -->

						    <!-- Post Related Start -->
						<div class="post--related ptop--30">
                            <!-- Post Items Title Start -->
                            <div class="post--items-title" data-ajax="tab">
                                <h2 class="h4">Có thể bạn cũng thích</h2>
                            </div>
                            <!-- Post Items Title End -->
                           
							<!-- Post Items Start -->
                            <div class="post--items post--items-2" data-ajax-content="outer">
                                <ul class="nav row" data-ajax-content="inner">
                                    	<li class="col-sm-6 pbottom--30">
                                            <!-- Post Item Start -->
                                            <div class="post--item post--layout-1">
                                                <div class="post--img">
                                                    <a href="http://127.0.0.1:8000/bai-viet-hoat-dong-du-lich-khap-3-mien-soi-dong-trong-dip-nghi-le-304-va-15" class="thumb"><img
                                                            src="{{ asset($post->image ? 'storage/' . $post->image->path : 'storage/placeholders/placeholder-image.png'  )}}" alt=""></a>
                                                    <a href="http://127.0.0.1:8000/properti/du-lich"
                                                        class="cat">Du lịch</a>
                                                    <a href="#" class="icon"><i class="fa fa-flash"></i></a>

                                                    <div class="post--info">
                                                        <ul class="nav meta">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <li><a href="#">Lâm Thùy Linh</a>
                                                                    </li>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <li><a href="#">2022-05-04</a></li>
                                                        </ul>

                                                        <div class="title">
                                                            <h3 class="h4"><a
                                                                    href="http://127.0.0.1:8000/bai-viet-hoat-dong-du-lich-khap-3-mien-soi-dong-trong-dip-nghi-le-304-va-15"
                                                                    class="btn-link">Hoạt động du lịch khắp 3 miền sôi động trong dịp nghỉ lễ 30/4 và 1/5</a></h3>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="post--content">
                                                    <p>Trong đợt nghỉ lễ 30/4 và 1/5, đã có khoảng 5 triệu lượt khách đi du lịch, cho thấy du lịch đã thực sự phục hồi sau thời gian dài bị ảnh hưởng nặng nề bởi dịch COVID-19.}}</p>
                                                </div>

                                                <div class="post--action">
                                                    <a href="#">Continue Reading... </a>
                                                </div>
                                            </div>
                                            <!-- Post Item End -->
                                        </li>
                                         <li class="col-sm-6 pbottom--30">
                                            <!-- Post Item Start -->
                                            <div class="post--item post--layout-1">
                                                <div class="post--img">
                                                    <a href="http://127.0.0.1:8000/bai-viet-an-giang-don-khoang-300000-luot-khach-tham-quan-trong-4-ngay-nghi-le" class="thumb"><img
                                                            src="{{ asset($post->image ? 'storage/' . $post->image->path : 'storage/placeholders/placeholder-image.png'  )}}" alt=""></a>
                                                    <a href="http://127.0.0.1:8000/properti/du-lich"
                                                        class="cat">Du lịch</a>
                                                    <a href="#" class="icon"><i class="fa fa-flash"></i></a>

                                                    <div class="post--info">
                                                        <ul class="nav meta">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <li><a href="#">Lâm Thùy Linh</a>
                                                                    </li>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <li><a href="#">2022-05-04</a></li>
                                                        </ul>

                                                        <div class="title">
                                                            <h3 class="h4"><a
                                                                    href="http://127.0.0.1:8000/bai-viet-an-giang-don-khoang-300000-luot-khach-tham-quan-trong-4-ngay-nghi-le"
                                                                    class="btn-link">An Giang đón khoảng 300.000 lượt khách tham quan trong 4 ngày nghỉ lễ</a></h3>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="post--content">
                                                    <p>Giám đốc Sở Văn hoá Thể thao và Du lịch An Giang Nguyễn Khánh Hiệp cho biết, trong 4 ngày nghỉ lễ 30.4 và 1.5, ngành du lịch đón khoảng 300.000 lượt khách tham quan, tăng 50% so với cùng kỳ năm 2021.}}</p>
                                                </div>

                                                <div class="post--action">
                                                    <a href="#">Continue Reading... </a>
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
                        <!-- Post Related End -->

                    </div>
                </div>
                <!-- Main Content End -->

                <!-- Main Sidebar Start -->
                <div class="main--sidebar col-md-4 ptop--30 pbottom--30" data-sticky-content="true">
                    <div class="sticky-content-inner">
                        <!-- Widget Start -->
                        <div class="widget">
                            <!-- Ad Widget Start -->
                            <div class="ad--widget">
                                <a href="https://mwc.com.vn/products/giay-sandal-nu-mwc-nusd--2887?c=N%C3%82U">
                                    <img src="http://127.0.0.1:8000/public/frontend/img/ads-img/300x250_banner_mwc2.jpg" alt="">
                                </a>
                            </div>
                            <!-- Ad Widget End -->
                        </div>
                        <!-- Widget End -->

                        <!-- Widget Start -->
                        <div class="widget">
                            <div class="widget--title">
                                <h2 class="h4">Kết nối với chúng tôi</h2>
                                <i class="icon fa fa-share-alt"></i>
                            </div>

                            <!-- Social Widget Start -->
                            <div class="social--widget style--1">
                                <ul class="nav">
                                    <li class="facebook">
                                        <a href="#">
                                            <span class="icon"><i class="fa fa-facebook-f"></i></span>
                                            <span class="count">521</span>
                                            <span class="title">Likes</span>
                                        </a>
                                    </li>
                                    <li class="twitter">
                                        <a href="#">
                                            <span class="icon"><i class="fa fa-twitter"></i></span>
                                            <span class="count">3297</span>
                                            <span class="title">Followers</span>
                                        </a>
                                    </li>
                                    <li class="google-plus">
                                        <a href="#">
                                            <span class="icon"><i class="fa fa-google-plus"></i></span>
                                            <span class="count">596282</span>
                                            <span class="title">Followers</span>
                                        </a>
                                    </li>
                                    <li class="rss">
                                        <a href="#">
                                            <span class="icon"><i class="fa fa-rss"></i></span>
                                            <span class="count">521</span>
                                            <span class="title">Subscriber</span>
                                        </a>
                                    </li>
                                    <li class="vimeo">
                                        <a href="#">
                                            <span class="icon"><i class="fa fa-vimeo"></i></span>
                                            <span class="count">3297</span>
                                            <span class="title">Followers</span>
                                        </a>
                                    </li>
                                    <li class="youtube">
                                        <a href="#">
                                            <span class="icon"><i class="fa fa-youtube-square"></i></span>
                                            <span class="count">596282</span>
                                            <span class="title">Subscriber</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Social Widget End -->
                        </div>
                        <!-- Widget End -->

                        <!-- Widget Start -->
                        <div class="widget">
                            <div class="widget--title">
                                <h2 class="h4">NHẬN TIN TỨC MỚI</h2>
                                <i class="icon fa fa-envelope-open-o"></i>
                            </div>

                            <!-- Subscribe Widget Start -->
                            <div class="subscribe--widget">
                                <div class="content">
                                    <p>Đăng ký bản tin của chúng tôi để nhận tin tức mới nhất, tin tức phổ biến và cập nhật
                                        độc quyền.</p>
                                </div>

                                <form
                                    action="https://themelooks.us13.list-manage.com/subscribe/post?u=79f0b132ec25ee223bb41835f&id=f4e0e93d1d"
                                    method="post" name="mc-embedded-subscribe-form" target="_blank"
                                    data-form="mailchimpAjax">
                                    <div class="input-group">
                                        <input type="email" name="EMAIL" placeholder="E-mail address"
                                            class="form-control" autocomplete="off" required>

                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-lg btn-default active"><i
                                                    class="fa fa-paper-plane-o"></i></button>
                                        </div>
                                    </div>

                                    <div class="status"></div>
                                </form>
                            </div>
                            <!-- Subscribe Widget End -->
                        </div>
                        <!-- Widget End -->

                        <!-- Widget Start -->
                        <div class="widget">
                            <div class="widget--title">
                                <h2 class="h4">Tin tức nổi bật</h2>
                                <i class="icon fa fa-newspaper-o"></i>
                            </div>

                            <!-- List Widgets Start -->
                            <div class="list--widget list--widget-1">
                                <div class="list--widget-nav" data-ajax="tab">
                                    <ul class="nav nav-justified">
                                        <li>
                                            <a href="#" data-ajax-action="load_widget_hot_news">Tin nóng</a>
                                        </li>
                                        <li class="active">
                                            <a href="#" data-ajax-action="load_widget_trendy_news">Xu hướng</a>
                                        </li>
                                        <li>
                                            <a href="#" data-ajax-action="load_widget_most_watched">Xem nhiều nhất</a>
                                        </li>
                                    </ul>
                                </div>

                                <!-- Post Items Start -->
                                <div class="post--items post--items-3" data-ajax-content="outer">
                                    <ul class="nav" data-ajax-content="inner">
                                                                                    <li>
                                                <!-- Post Item Start -->
                                                <div class="post--item post--layout-3">
                                                    <div class="post--img">
                                                        <a href="http://127.0.0.1:8000/bai-viet-lich-su-san-francisco-thanh-pho-vang-cua-xu-so-co-hoa" class="thumb"><img
                                                                src="public/uploads/tintuc/1.jpg"
                                                                alt=""></a>

                                                        <div class="post--info">
                                                            <ul class="nav meta">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <li><a href="#">Huỳnh Thị Tuyết Nhi</a>
                                                                        </li>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <li><a href="#">2022-05-13</a></li>
                                                            </ul>

                                                            <div class="title">
                                                                <h3 class="h4"><a href="http://127.0.0.1:8000/bai-viet-lich-su-san-francisco-thanh-pho-vang-cua-xu-so-co-hoa"
                                                                        class="btn-link">Lịch sử San Francisco - thành phố vàng của xứ sở cờ hoa</a>
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
                                                        <a href="http://127.0.0.1:8000/bai-viet-hoa-loa-ken-tu-vuon-ra-pho" class="thumb"><img
                                                                src="public/uploads/tintuc/img_5055.jpg"
                                                                alt=""></a>

                                                        <div class="post--info">
                                                            <ul class="nav meta">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <li><a href="#">Huỳnh Thị Tuyết Nhi</a>
                                                                        </li>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <li><a href="#">2022-05-13</a></li>
                                                            </ul>

                                                            <div class="title">
                                                                <h3 class="h4"><a href="http://127.0.0.1:8000/bai-viet-hoa-loa-ken-tu-vuon-ra-pho"
                                                                        class="btn-link">Hoa loa kèn, từ vườn ra phố</a>
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
                                                        <a href="http://127.0.0.1:8000/bai-viet-kham-pha-nhung-tuyen-duong-sat-dep-nhat-chau-au" class="thumb"><img
                                                                src="public/uploads/tintuc/s.jpg"
                                                                alt=""></a>

                                                        <div class="post--info">
                                                            <ul class="nav meta">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <li><a href="#">Huỳnh Thị Tuyết Nhi</a>
                                                                        </li>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <li><a href="#">2022-05-13</a></li>
                                                            </ul>

                                                            <div class="title">
                                                                <h3 class="h4"><a href="http://127.0.0.1:8000/bai-viet-kham-pha-nhung-tuyen-duong-sat-dep-nhat-chau-au"
                                                                        class="btn-link">Khám phá những tuyến đường sắt đẹp nhất châu Âu</a>
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
                                                        <a href="http://127.0.0.1:8000/bai-viet-ioniq-5-khong-chi-than-thien-moi-truong-ma-con-thoi-trang" class="thumb"><img
                                                                src="public/uploads/tintuc/ioniq26-4-av.jpg"
                                                                alt=""></a>

                                                        <div class="post--info">
                                                            <ul class="nav meta">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <li><a href="#">Huỳnh Thị Tuyết Nhi</a>
                                                                        </li>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <li><a href="#">2022-05-13</a></li>
                                                            </ul>

                                                            <div class="title">
                                                                <h3 class="h4"><a href="http://127.0.0.1:8000/bai-viet-ioniq-5-khong-chi-than-thien-moi-truong-ma-con-thoi-trang"
                                                                        class="btn-link">IONIQ 5 - Không chỉ thân thiện môi trường mà còn thời trang</a>
                                                                </h3>
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

                        <!-- Widget Start -->
                        <div class="widget">
                            <div class="widget--title">
                                <h2 class="h4">Quảng cáo</h2>
                                <i class="icon fa fa-bullhorn"></i>
                            </div>

                            <!-- Ad Widget Start -->
                            <div class="ad--widget">
                                <a href="https://mwc.com.vn/products/giay-sandal-nu-mwc-nusd--2887?c=N%C3%82U">
                                    <img src="http://127.0.0.1:8000/public/frontend/img/ads-img/300x250_banner_mwc.jpg" alt="">
                                </a>
                            </div>
                            <!-- Ad Widget End -->
                        </div>
                        <!-- Widget End -->

                        <!-- Widget Start -->
                        <div class="widget">
                            <div class="widget--title" data-ajax="tab">
                                <h2 class="h4">BÌNH CHỌN</h2>

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
                                        <h3 class="h4">Theo bạn thì giải vô địch bóng đá nào hay nhất từ
                                            ​​trước đến nay?</h3>
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
                                        <h3 class="h4">Bạn có nghĩ rằng chi phí gửi tiền đến điện thoại di động
                                            nên giảm?</h3>
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
                                <h2 class="h4">Ý kiến người đọc</h2>

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
                                                        <span class="thumb">
                                                            <img src="img/widgets-img/readers-opinion-01.png" alt="">
                                                        </span>

                                                        <div class="post--info">
                                                            <div class="title">
                                                                <h3 class="h4">Việt Nam vô địch</h3>
                                                            </div>

                                                            <ul class="nav meta">
                                                                <li><span> by Trần Thoại Mỹ</span>
                                                                </li>
                                                                <li><span>2022-05-20</span></li>
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
                                                        <span class="thumb">
                                                            <img src="img/widgets-img/readers-opinion-01.png" alt="">
                                                        </span>

                                                        <div class="post--info">
                                                            <div class="title">
                                                                <h3 class="h4">Hay</h3>
                                                            </div>

                                                            <ul class="nav meta">
                                                                <li><span> by Trần Thoại Mỹ</span>
                                                                </li>
                                                                <li><span>2022-05-19</span></li>
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
                                                        <span class="thumb">
                                                            <img src="img/widgets-img/readers-opinion-01.png" alt="">
                                                        </span>

                                                        <div class="post--info">
                                                            <div class="title">
                                                                <h3 class="h4">sxcsc</h3>
                                                            </div>

                                                            <ul class="nav meta">
                                                                <li><span> by Đặng Thủ Khoa</span>
                                                                </li>
                                                                <li><span>2022-05-13</span></li>
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
                                                        <span class="thumb">
                                                            <img src="img/widgets-img/readers-opinion-01.png" alt="">
                                                        </span>

                                                        <div class="post--info">
                                                            <div class="title">
                                                                <h3 class="h4">Hay</h3>
                                                            </div>

                                                            <ul class="nav meta">
                                                                <li><span> by Lâm Thùy Linh</span>
                                                                </li>
                                                                <li><span>2022-05-04</span></li>
                                                            </ul>
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
                                                                <li><a href="#">Lâm Thùy Linh</a></li>
                                                                <li><a href="#">2022-05-04</a></li>
                                                            </ul>

                                                            <div class="title">
                                                                <h3 class="h4"><a
                                                                        href="http://127.0.0.1:8000/bai-viet-an-giang-don-khoang-300000-luot-khach-tham-quan-trong-4-ngay-nghi-le"
                                                                        class="btn-link">An Giang đón khoảng 300.000 lượt khách tham quan trong 4 ngày nghỉ lễ</a>
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
                                                                <li><a href="#">Lâm Thùy Linh</a></li>
                                                                <li><a href="#">2022-05-04</a></li>
                                                            </ul>

                                                            <div class="title">
                                                                <h3 class="h4"><a
                                                                        href="http://127.0.0.1:8000/bai-viet-an-giang-bat-ke-doi-giet-me-roi-dam-anh-ruot-tu-vong"
                                                                        class="btn-link">An Giang: Bắt kẻ đòi giết mẹ rồi đâm anh ruột tử vong</a>
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
                                                        <a href="http://127.0.0.1:8000/bai-viet-thiet-bi-bien-nuoc-bien-thanh-nuoc-uong-vuot-chuan-who"
                                                            class="thumb"><img
                                                                src="public/uploads/tintuc/screenshot_165162813514.png"
                                                                alt=""></a>

                                                        <div class="post--info">
                                                            <ul class="nav meta">
                                                                <li><a href="#">Lâm Thùy Linh</a></li>
                                                                <li><a href="#">2022-05-04</a></li>
                                                            </ul>

                                                            <div class="title">
                                                                <h3 class="h4"><a
                                                                        href="http://127.0.0.1:8000/bai-viet-thiet-bi-bien-nuoc-bien-thanh-nuoc-uong-vuot-chuan-who"
                                                                        class="btn-link">Thiết bị biến nước biển thành nước uống vượt chuẩn WHO</a>
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
                                                        <a href="http://127.0.0.1:8000/bai-viet-sot-xuat-huyet-tai-tp-hcm-dang-o-muc-bao-dong"
                                                            class="thumb"><img
                                                                src="public/uploads/tintuc/sotxuathuyet1.jpg"
                                                                alt=""></a>

                                                        <div class="post--info">
                                                            <ul class="nav meta">
                                                                <li><a href="#">Trần Ngọc Thái Nguyên</a></li>
                                                                <li><a href="#">2022-05-13</a></li>
                                                            </ul>

                                                            <div class="title">
                                                                <h3 class="h4"><a
                                                                        href="http://127.0.0.1:8000/bai-viet-sot-xuat-huyet-tai-tp-hcm-dang-o-muc-bao-dong"
                                                                        class="btn-link">Sốt xuất huyết tại TP HCM đang ở mức báo động</a>
                                                                </h3>
                                                            </div>
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
                    </div>
                </div>
                <!-- Main Sidebar End -->
            </div>
        </div>
    </div>
    <!-- Main Content Section End -->


	<div class="colorlib-classes">
			<div class="container">
				<div class="row">
					<!-- SIDEBAR: start -->
					<div class="col-md-8 animate-box">
					
					</div>
					<div class="col-md-4 animate-box">
						<div class="sidebar">
							<x-blog.side-categories :categories="$categories"/>
							<x-blog.side-recent_posts :recent_posts="$recent_posts"/>
							<x-blog.side-tags :tags="$tags"/>
						</div>
					</div>
				</div>
			</div>	
		</div>

@endsection

@section('custom_js')
<script>
	setTimeout(() => {
		$(".global-message").fadeOut();
	}, 5000)
</script>
@endsection