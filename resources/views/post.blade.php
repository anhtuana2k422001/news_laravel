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
                                    @foreach($postTheSame as $postTheSame)
                                        <li class="col-sm-12 pbottom--30">
											<!-- Post Item Start -->
											<div class="post--item post--layout-3">
												<div class="post--img">
													<a href="{{ route('posts.show', $postTheSame) }}"
														class="thumb">
                                                        <img src="{{ asset($postTheSame->image ? 'storage/' .$postTheSame->image->path : 'storage/placeholders/placeholder-image.png')}}"
															alt="">
                                                    </a>

													<div class="post--info">
													
														<div class="title">
															<h3  class="h4">
																<a href="{{ route('posts.show', $postTheSame) }}" class="btn-link">{{ $postTheSame->title }}</a>
															</h3>
                                                            <p style="font-size:16px" >
																<span >{{ $postTheSame->excerpt }}</span>
                                                            </p>
														</div>

                                                        <ul style="padding-top:10px" class="nav meta ">
															<li><a href="javascript:;">{{ $postTheSame->author->name }}</a>
															</li>
															<li><a href="javascript:;">{{ $postTheSame->created_at->locale('vi')->diffForHumans() }}</a></li>
                                                            <li><a  href="javascript:;"><i class="fa fm fa-comments"></i>{{ count($postTheSame->comments) }}</a></li>
														</ul>
													</div>
												</div>
											</div>
											<!-- Post Item End -->
										</li>
                                        @endforeach

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
                            <div class="widget--title">
                                <h2 class="h4">Tin tức nổi bật</h2>
                                <i class="icon fa fa-newspaper-o"></i>
                            </div>

                            <!-- List Widgets Start -->
                            <div class="list--widget list--widget-1">
                                <div class="list--widget-nav" data-ajax="tab">
                                    <ul class="nav nav-justified">
                                        <li>
                                            <a href="javascript:;" data-ajax-action="load_widget_hot_news">Tin nóng</a>
                                        </li>
                                        <li class="active">
                                            <a href="javascript:;" data-ajax-action="load_widget_trendy_news">Xu hướng</a>
                                        </li>
                                        <li>
                                            <a href="javascript:;" data-ajax-action="load_widget_most_watched">Xem nhiều nhất</a>
                                        </li>
                                    </ul>
                                </div>

                                <!-- Post Items Start -->
                                <div class="post--items post--items-3" data-ajax-content="outer">
                                    <ul class="nav" data-ajax-content="inner">
                                        @foreach($outstanding_posts as $outstanding_post)
                                            <li>
                                                <!-- Post Item Start -->
                                                <div class="post--item post--layout-3">
                                                    <div class="post--img">
                                                        <a href="{{ route('posts.show', $outstanding_post) }}" class="thumb"><img
                                                                src="{{ asset($outstanding_post->image ? 'storage/' .$outstanding_post->image->path : 'storage/placeholders/placeholder-image.png')}}"
                                                                alt=""></a>
                                                        <div class="post--info">
                                                            <ul class="nav meta">
                                                                <li><a href="javascript:;">{{ $outstanding_post->created_at->locale('vi')->diffForHumans() }}</a></li>
                                                                <li><a  href="javascript:;"><i class="fa fm fa-comments"></i>{{ count($outstanding_post->comments) }}</a></li>
                                                            </ul>

                                                            <div class="title">
                                                                <h3 class="h4"><a href="{{ route('posts.show', $outstanding_post) }}"
                                                                        class="btn-link">{{ $outstanding_post->title}}</a>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Post Item End -->
                                            </li>
                                            @endforeach
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
											Theo bạn thì giải đội bóng nào sẽ vô địch WoldCup 2022 ?</h3>
									</li>

									<li class="options">
										<form action="#">
											<div class="checkbox">
												<label>
													<input type="checkbox" name="option-1">
													<img src="{{ asset('kcnew/frontend/img/Flag_barzill.png') }}" alt="Brasil" srcset="">
													<span>Brasil</span>
												</label>

												<p>55%<span style="width: 55%;"></span></p>
											</div>

											<div class="checkbox">
												<label>
													<input type="checkbox" name="option-2">
													<img src="{{ asset('kcnew/frontend/img/Flag_Agrennal.png') }}" alt="Brasil" srcset="">
													<span>Argentina</span>
												</label>

												<p>28%<span style="width: 28%;"></span></p>
											</div>

											<div class="checkbox">
												<label>
													<input type="checkbox" name="option-2">
													<img src="{{ asset('kcnew/frontend/img/Flag_tay_ban_nha.png') }}" alt="Brasil" srcset="">
													<span>Tây Ban Nha</span>
												</label>

												<p>12%<span style="width: 12%;"></span></p>
											</div>
											<div class="checkbox">
												<label>
													<input type="checkbox" name="option-2">
													<img src="{{ asset('kcnew/frontend/img/Flag_bo-dao-nha.png') }}" alt="Brasil" srcset="">
													<span>Bồ Đào Nha</span>
												</label>

												<p>05%<span style="width: 05%;"></span></p>
											</div>

											<button type="submit" class="btn btn-primary">Vote Ngay</button>
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
							<div class="widget--title">
								<h2 class="h4">Quảng cáo</h2>
								<i class="icon fa fa-bullhorn"></i>
							</div>

							<!-- Ad Widget Start -->
							<div class="ad--widget--banner">
								<a href="https://mwc.com.vn/products/giay-sandal-nu-mwc-nusd--2887?c=N%C3%82U">
									<img src="{{ asset('kcnew/frontend/img/ads-img/banner_quangcao.png') }}" alt="">
								</a>
							</div>
							<!-- Ad Widget End -->
						</div>
						<!-- Widget End -->

                    </div>
                </div>
                <!-- Main Sidebar End -->
            </div>
        </div>
    </div>
    <!-- Main Content Section End -->


    <!-- 
        <x-blog.side-categories :categories="$categories"/>
        <x-blog.side-recent_posts :recent_posts="$recent_posts"/>
        <x-blog.side-tags :tags="$tags"/>
    -->
		

@endsection

@section('custom_js')
<script>
	setTimeout(() => {
		$(".global-message").fadeOut();
	}, 5000)
</script>
@endsection