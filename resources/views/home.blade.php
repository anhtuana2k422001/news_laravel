@extends('main_layouts.master')

@section('title','HUTECH NEWS | Trang chủ')

@section('content')

<div class="wrapper">

	<!-- Main Content Section Start -->
	<div class="main-content--section pbottom--30">
		<div class="container">
			<!-- Main Content Start -->
			<div class="main--content">
				<!-- Post Items Start -->
				<div class="post--items post--items-1 pd--30-0">
					<div class="row gutter--15">
						<div class="col-md-6">
							<div class="row gutter--15">

								@foreach ($postnew1 as $postnew1)
								<div class="col-xs-6 col-xss-12">
									<!-- Post Item Start -->
									<div class="post--item post--layout-1 post--title-large">
										<div class="post--img">
											<a href="{{ route('posts.show', $postnew1) }}"
												class="thumb"><img
													src="{{ asset($postnew1->image ? 'storage/' .$postnew1->image->path : 'storage/placeholders/placeholder-image.png'  )}}"
													alt=""></a>
											<a href="{{ route('categories.show', $category_new[0]) }}" class="cat">{{ $category_new[0]->name }}</a>

											<a href="#" class="icon"><i class="fa fa-flash"></i></a>
											<div class="post--info">
												<ul class="nav meta">
													<li><a href="#">{{ $postnew1->author->name }}</a></li>
													<li><a href="#">{{ $postnew1->created_at->diffForHumans() }}</a></li>
												</ul>
												<div class="title">
													<h2 class="h4"><a href="{{ route('posts.show', $postnew1) }}" class="btn-link">{{ $postnew1->title }}</a>
													</h2>
												</div>
											</div>
										</div>
									</div>
									<!-- Post Item End -->
								</div>
								@endforeach
								
								@foreach ($postnew2 as $postnew2)
								<div class="col-xs-6 col-xss-12">
									<!-- Post Item Start -->
									<div class="post--item post--layout-1 post--title-large">
										<div class="post--img">
											<a href="{{ route('posts.show', $postnew2) }}"
												class="thumb"><img
													src="{{ asset($postnew2->image ? 'storage/' .$postnew2->image->path : 'storage/placeholders/placeholder-image.png'  )}}"
													alt=""></a>
											<a href="{{ route('categories.show', $category_new[1]) }}" class="cat">{{ $category_new[1]->name }}</a>

											<a href="#" class="icon"><i class="fa fa-flash"></i></a>
											<div class="post--info">
												<ul class="nav meta">
													<li><a href="#">{{ $postnew2->author->name }}</a></li>
													<li><a href="#">{{ $postnew2->created_at->diffForHumans() }}</a></li>
												</ul>
												<div class="title">
													<h2 class="h4"><a href="{{ route('posts.show', $postnew2) }}" class="btn-link">{{ $postnew2->title }}</a>
													</h2>
												</div>
											</div>
										</div>
									</div>
									<!-- Post Item End -->
								</div>
								@endforeach

								@foreach ($postnew3 as $postnew3)
								<div class="col-sm-12 hidden-sm hidden-xs">
									<!-- Post Item Start -->
									<div class="post--item post--layout-1 post--title-larger">
										<div class="post--img">
											<a href="{{ route('posts.show', $postnew3) }}"
												class="thumb"><img
													src="{{ asset($postnew3->image ? 'storage/' .$postnew3->image->path : 'storage/placeholders/placeholder-image.png'  )}}"
													style="height:200px" alt=""></a>

											<a href="{{ route('categories.show', $category_new[2]) }}" class="cat">{{ $category_new[2]->name }}</a>

											<a href="#" class="icon"><i class="fa fa-fire"></i></a>

											<div class="post--info">
												<ul class="nav meta">
													<li><a href="#">{{ $postnew3->author->name }}</a></li>
													<li><a href="#">{{ $postnew3->created_at->diffForHumans() }}</a></li>
												</ul>

												<div class="title">
													<h2 class="h4"><a
															href="{{ route('posts.show', $postnew3) }}"
															class="btn-link">{{ $postnew3->title }}</a></h2>
												</div>
											</div>
										</div>
									</div>
									<!-- Post Item End -->
								</div>
								@endforeach

							</div>
						</div>

						@foreach ($postnew4 as $postnew4)
						<div class="col-md-6">
							<!-- Post Item Start -->
							<div class="post--item post--layout-1 post--title-larger">
								<div class="post--img">
									<a href="{{ route('posts.show', $postnew4) }}"
										class="thumb"><img src="{{ asset($postnew4->image ? 'storage/' .$postnew4->image->path : 'storage/placeholders/placeholder-image.png'  )}}" alt=""></a>

									<a href="{{ route('categories.show', $category_new[3]) }}" class="cat">{{ $category_new[3]->name }}</a>

									<a href="#" class="icon"><i class="fa fa-flash"></i></a>

									<div class="post--info">
										<ul class="nav meta">
											<li><a href="#">{{ $postnew4->author->name }}</a></li>
											<li><a href="#">{{ $postnew4->created_at->diffForHumans() }}</a></li>
										</ul>

										<div class="title">
											<h2 class="h4"><a
													href="{{ route('posts.show', $postnew4) }}"
													class="btn-link">{{ $postnew4->title }}</a>
											</h2>
										</div>
									</div>
								</div>
							</div>
							<!-- Post Item End -->
						</div>
						@endforeach

					</div>
				</div>
				<!-- Post Items End -->
			</div>
			<!-- Main Content End -->

			<div class="row">
				<!-- Main Content Start -->
				<div class="main--content col-md-8 col-sm-7" data-sticky-content="true">
					<div class="sticky-content-inner">
						<div class="row">
							<!-- World News Start -->
							<div class="col-md-6 ptop--30 pbottom--30">
								<!-- Post Items Title Start -->
								<div class="post--items-title" data-ajax="tab">
									<h2 class="h4">{{ $category_home[0]->name }}</h2>
								</div>
								<!-- Post Items Title End -->

								<!-- Post Items Start -->
								<div class="post--items post--items-2" data-ajax-content="outer">
									<ul class="nav row gutter--15" data-ajax-content="inner">
								
									
										<li class="col-xs-12">
											<!-- Post Item Start -->
											<div class="post--item post--layout-1">
												<div class="post--img">
													<a href="{{ route('posts.show', $post_category_home1[0]) }}"
														class="thumb"><img src="{{ asset($post_category_home1[0]->image ? 'storage/' . $post_category_home1[0]->image->path : 'storage/placeholders/placeholder-image.png'  )}}"
															alt=""></a>

													<a href="#" class="icon"><i class="fa fa-flash"></i></a>

													<div class="post--info">
														<ul class="nav meta">
															<li><a href="#">{{ $post_category_home1[0]->author->name }}</a></li>
															<li><a href="#">{{ $post_category_home1[0]->created_at->diffForHumans() }}</a></li>
														</ul>

														<div class="title">
															<h3 class="h4"><a
																	href="{{ route('posts.show', $post_category_home1[0]) }}"
																	class="btn-link">{{ $post_category_home1[0]->title }}</a>
															</h3>
														</div>
													</div>
												</div>
											</div>
											<!-- Post Item End -->
										</li>

										@for ($i = 1; $i <= 4; $i++)
											@if($i==1 || $i == 3 )
											<li class="col-xs-12">
												<!-- Divider Start -->
												<hr class="divider">
												<!-- Divider End -->
											</li>
											@endif 
											<li class="col-xs-6">
												<!-- Post Item Start -->

												<div class="post--item post--layout-2">
													<div class="post--img">
														<a href="{{ route('posts.show', $post_category_home1[$i]) }}"
															class="thumb"><img
																src="{{ asset($post_category_home1[$i]->image ? 'storage/' . $post_category_home1[$i]->image->path : 'storage/placeholders/placeholder-image.png'  )}}"
																alt=""></a>

														<div class="post--info">
															<ul class="nav meta">
																<li><a href="#">{{ $post_category_home1[$i]->author->name }}</a></li>
																<li><a href="#">{{ $post_category_home1[$i]->created_at->diffForHumans() }}</a></li>
															</ul>

															<div class="title">
																<h3 class="h4"><a
																		href="{{ route('posts.show', $post_category_home1[$i]) }}"
																		class="btn-link">{{ $post_category_home1[$i]->title }}</a>
																</h3>
															</div>
														</div>
													</div>
												</div>
												<!-- Post Item End -->
											</li>
										@endfor
									</ul>

								</div>
								<!-- Post Items End -->
							</div>
							<!-- World News End -->

							<!-- Technology Start -->
							<div class="col-md-6 ptop--30 pbottom--30">
								<!-- Post Items Title Start -->
								<div class="post--items-title" data-ajax="tab">
									<h2 class="h4">{{ $category_home[1]->name }}</h2>

								</div>
								<!-- Post Items Title End -->

								<!-- Post Items Start -->
								<div class="post--items post--items-3" data-ajax-content="outer">
									<ul class="nav" data-ajax-content="inner">
								
										<li>
											<!-- Post Item Start -->
											<div class="post--item post--layout-1">
												<div class="post--img">
													<a href="{{ route('posts.show', $post_category_home2[0]) }}"
														class="thumb"><img
															src="{{ asset($post_category_home2[0]->image ? 'storage/' . $post_category_home2[0]->image->path : 'storage/placeholders/placeholder-image.png'  )}}"
															alt=""></a>
												
													<a href="#" class="icon"><i class="fa fa-flash"></i></a>

													<div class="post--info">
														<ul class="nav meta">
															<li><a href="#">{{ $post_category_home2[0]->author->name }}</a></li>
															<li><a href="#">{{ $post_category_home2[0]->created_at->diffForHumans() }}</a></li>
														</ul>

														<div class="title">
															<h3 class="h4"><a
																	href="{{ route('posts.show', $post_category_home2[0]) }}"
																	class="btn-link">{{ $post_category_home2[0]->title }}</a>
															</h3>
														</div>
													</div>
												</div>
											</div>
											<!-- Post Item End -->
										</li>
										@for ($i = 1; $i <= 4; $i++)
										<li>
											<!-- Post Item Start -->
											<div class="post--item post--layout-3">
												<div class="post--img">
													<a href="{{ route('posts.show', $post_category_home2[$i]) }}"
														class="thumb"><img
															src="{{ asset($post_category_home2[$i]->image ? 'storage/' . $post_category_home2[$i]->image->path : 'storage/placeholders/placeholder-image.png'  )}}"
															alt=""></a>

													<div class="post--info">
														<ul class="nav meta">
															<li><a href="#">{{ $post_category_home2[$i]->author->name }}</a></li>
															<li><a href="#">{{ $post_category_home2[$i]->created_at->diffForHumans() }}</a></li>
														</ul>

														<div class="title">
															<h3 class="h4"><a
																	href="{{ route('posts.show', $post_category_home2[$i]) }}"
																	class="btn-link">{{ $post_category_home2[$i]->title }}</a>
															</h3>
														</div>
													</div>
												</div>
											</div>
											<!-- Post Item End -->
										</li>
										@endfor

									</ul>


								</div>
								<!-- Post Items End -->
							</div>
							<!-- Technology End -->

							<!-- Finance Start -->
							<div class="col-md-12 ptop--30 pbottom--30">
								<!-- Post Items Title Start -->
								<div class="post--items-title" data-ajax="tab">
									<h2 class="h4">Giáo dục</h2>


								</div>
								<!-- Post Items Title End -->

								<!-- Post Items Start -->
								<div class="post--items post--items-2" data-ajax-content="outer">
									<ul class="nav row" data-ajax-content="inner">
										<li class="col-md-6">
											<!-- Post Item Start -->
											<div class="post--item post--layout-2">
												<div class="post--img">
													<a href="http://127.0.0.1:8000/bai-viet-bo-gd-dt-luu-y-gi-voi-thi-sinh-khi-dang-ky-du-thi-tot-nghiep-thpt-tu-4-5"
														class="thumb"><img
															src="./public/uploads/tintuc/screenshot_165162823557.png"
															alt=""></a>
													<a href="http://127.0.0.1:8000/properti/thi-cu" class="cat">Thi
														cử</a>
													<a href="#" class="icon"><i class="fa fa-star-o"></i></a>

													<div class="post--info">
														<ul class="nav meta">
															<li><a href="#">Lâm Thùy Linh</a></li>
															<li><a href="#">2022-05-04</a></li>
														</ul>

														<div class="title">
															<h3 class="h4"><a
																	href="http://127.0.0.1:8000/bai-viet-bo-gd-dt-luu-y-gi-voi-thi-sinh-khi-dang-ky-du-thi-tot-nghiep-thpt-tu-4-5"
																	class="btn-link">Bộ GD-ĐT lưu ý gì với thí sinh
																	khi đăng ký dự thi tốt nghiệp THPT
																	từ 4-5?</a>
															</h3>
														</div>
													</div>
												</div>
											</div>
											<!-- Post Item End -->

											<hr class="mar_bottom15 ">

											<ul class="list_news_show_home">
												<li class="boder_link_show_home">
													<h3 class="h3"><a
															href=".public/bai-viet-droptop-phien-ban-tien-linh">Droptop
															phiên bản Tiến Linh.</a></h3>
												</li>
												<li class="boder_link_show_home">
													<h3 class="h3"><a
															href=".public/bai-viet-tphcm-ra-mat-dich-vu-xe-dap-cong-cong">TPHCM
															ra mắt dịch vụ xe đạp công
															cộng.</a></h3>
												</li>
												<li>
													<h3 class="h3"><a
															href=".public/bai-viet-vong-tron-lua-tu-vu-tru-khac-hien-ra-gan-chung-ta-khoa-hoc-boi-roi">Vòng
															tròn lửa
															&quot;từ vũ trụ khác&quot; hiện ra gần chúng ta, khoa
															học bối rối.</a></h3>
												</li>
											</ul>

										</li>
										<li class="col-md-6">
											<ul class="nav row">
												<li class="col-xs-12 hidden-md hidden-lg">
													<!-- Divider Start -->
													<hr class="divider">
													<!-- Divider End -->
												</li>
												<li class="col-xs-6">
													<!-- Post Item Start -->
													<div class="post--item post--layout-2">
														<div class="post--img">
															<a href="http://127.0.0.1:8000/bai-viet-bo-cong-an-cong-bo-de-thi-tham-khao-bai-thi-danh-gia-tuyen-sinh-nam-2022"
																class="thumb"><img
																	src="./public/uploads/tintuc/bo-cong-an-cong-bo-de-thi-tham-khao-bai-thi-danh-gia-tuyen-sinh37.jpeg"
																	alt=""></a>

															<div class="post--info">
																<ul class="nav meta">
																	<li><a href="#">Trần Ngọc Thái Nguyên</a>
																	</li>
																	<li><a href="#">2022-05-19</a></li>
																</ul>

																<div class="title">
																	<h3 class="h4"><a
																			href="http://127.0.0.1:8000/bai-viet-bo-cong-an-cong-bo-de-thi-tham-khao-bai-thi-danh-gia-tuyen-sinh-nam-2022"
																			class="btn-link">Bộ Công an công bố đề
																			thi tham khảo bài thi đánh giá tuyển
																			sinh năm 2022</a></h3>
																</div>
															</div>
														</div>
													</div>
													<!-- Post Item End -->
												</li>
												<li class="col-xs-6">
													<!-- Post Item Start -->
													<div class="post--item post--layout-2">
														<div class="post--img">
															<a href="http://127.0.0.1:8000/bai-viet-de-thi-thu-vao-lop-10-mon-toan-nam-2022-o-ha-noi"
																class="thumb"><img
																	src="./public/uploads/tintuc/Screenshot 2022-05-19 11165889.png"
																	alt=""></a>

															<div class="post--info">
																<ul class="nav meta">
																	<li><a href="#">Trần Ngọc Thái Nguyên</a>
																	</li>
																	<li><a href="#">2022-05-19</a></li>
																</ul>

																<div class="title">
																	<h3 class="h4"><a
																			href="http://127.0.0.1:8000/bai-viet-de-thi-thu-vao-lop-10-mon-toan-nam-2022-o-ha-noi"
																			class="btn-link">Đề thi thử vào lớp 10
																			môn Toán năm 2022 ở Hà Nội</a></h3>
																</div>
															</div>
														</div>
													</div>
													<!-- Post Item End -->
												</li>


												<li class="col-xs-12">
													<!-- Divider Start -->
													<hr class="divider">
													<!-- Divider End -->
												</li>

												<li class="col-xs-6">
													<!-- Post Item Start -->
													<div class="post--item post--layout-2">
														<div class="post--img">
															<a href="http://127.0.0.1:8000/bai-viet-mo-dot-cao-diem-tuyen-truyen-phong-chong-duoi-nuoc-cho-tre-em-hoc-sinh"
																class="thumb"><img
																	src="./public/uploads/tintuc/boi.jpg"
																	alt=""></a>

															<div class="post--info">
																<ul class="nav meta">
																	<li><a href="#">Huỳnh Thị Tuyết Nhi</a>
																	</li>
																	<li><a href="#">2022-05-13</a></li>
																</ul>

																<div class="title">
																	<h3 class="h4"><a
																			href="http://127.0.0.1:8000/bai-viet-mo-dot-cao-diem-tuyen-truyen-phong-chong-duoi-nuoc-cho-tre-em-hoc-sinh"
																			class="btn-link">Mở đợt cao điểm tuyên
																			truyền phòng, chống đuối nước cho trẻ
																			em, học sinh</a></h3>
																</div>
															</div>
														</div>
													</div>
													<!-- Post Item End -->
												</li>
												<li class="col-xs-6">
													<!-- Post Item Start -->
													<div class="post--item post--layout-2">
														<div class="post--img">
															<a href="http://127.0.0.1:8000/bai-viet-bo-gd-dt-luu-y-gi-voi-thi-sinh-khi-dang-ky-du-thi-tot-nghiep-thpt-tu-4-5"
																class="thumb"><img
																	src="./public/uploads/tintuc/screenshot_165162823557.png"
																	alt=""></a>

															<div class="post--info">
																<ul class="nav meta">
																	<li><a href="#">Lâm Thùy Linh</a>
																	</li>
																	<li><a href="#">2022-05-04</a></li>
																</ul>

																<div class="title">
																	<h3 class="h4"><a
																			href="http://127.0.0.1:8000/bai-viet-bo-gd-dt-luu-y-gi-voi-thi-sinh-khi-dang-ky-du-thi-tot-nghiep-thpt-tu-4-5"
																			class="btn-link">Bộ GD-ĐT lưu ý gì với
																			thí sinh khi đăng ký dự thi tốt
																			nghiệp THPT từ 4-5?</a></h3>
																</div>
															</div>
														</div>
													</div>
													<!-- Post Item End -->
												</li>
											</ul>
										</li>
									</ul>


								</div>
								<!-- Post Items End -->
							</div>
							<!-- Finance End -->

							<!-- Politics Start -->
							<div class="col-md-6 ptop--30 pbottom--30">
								<!-- Post Items Title Start -->
								<div class="post--items-title" data-ajax="tab">
									<h2 class="h4">Thể thao</h2>


								</div>
								<!-- Post Items Title End -->

								<!-- Post Items Start -->
								<div class="post--items post--items-2" data-ajax-content="outer">
									<ul class="nav row gutter--15" data-ajax-content="inner">
										<li class="col-xs-12">
											<!-- Post Item Start -->
											<div class="post--item post--layout-1">
												<div class="post--img">
													<a href="http://127.0.0.1:8000/bai-viet-droptop-phien-ban-tien-linh"
														class="thumb"><img
															src="./public/uploads/tintuc/Screenshot 2022-05-20 0804264.png"
															alt=""></a>
													<a href="http://127.0.0.1:8000/properti/bong-da"
														class="cat">Bóng đá</a>
													<a href="#" class="icon"><i class="fa fa-fire"></i></a>

													<div class="post--info">
														<ul class="nav meta">
															<li><a href="#">Trần Ngọc Thái Nguyên</a>
															</li>
															<li><a href="#">2022-05-20</a></li>
														</ul>

														<div class="title">
															<h3 class="h4"><a
																	href="http://127.0.0.1:8000/bai-viet-droptop-phien-ban-tien-linh"
																	class="btn-link">Droptop phiên bản Tiến Linh</a>
															</h3>
														</div>
													</div>
												</div>
											</div>
											<!-- Post Item End -->
										</li>
										<li class="col-xs-12">
											<!-- Divider Start -->
											<hr class="divider">
											<!-- Divider End -->
										</li>
										<li class="col-xs-6">
											<!-- Post Item Start -->
											<div class="post--item post--layout-2">
												<div class="post--img">
													<a href="http://127.0.0.1:8000/bai-viet-droptop-phien-ban-tien-linh"
														class="thumb"><img
															src="./public/uploads/tintuc/Screenshot 2022-05-20 0804264.png"
															alt=""></a>

													<div class="post--info">
														<ul class="nav meta">
															<li><a href="#">Trần Ngọc Thái Nguyên</a>
															</li>
															<li><a href="#">2022-05-20</a></li>
														</ul>

														<div class="title">
															<h3 class="h4"><a
																	href="http://127.0.0.1:8000/bai-viet-droptop-phien-ban-tien-linh"
																	class="btn-link">Droptop phiên bản Tiến Linh</a>
															</h3>
														</div>
													</div>
												</div>
											</div>
											<!-- Post Item End -->
										</li>
										<li class="col-xs-6">
											<!-- Post Item Start -->
											<div class="post--item post--layout-2">
												<div class="post--img">
													<a href="http://127.0.0.1:8000/bai-viet-%E2%80%9Cgoc-khuat%E2%80%9D-tren-duong-dua-f1"
														class="thumb"><img
															src="./public/uploads/tintuc/3-164911456480898.jpg"
															alt=""></a>

													<div class="post--info">
														<ul class="nav meta">
															<li><a href="#">Lâm Thùy Linh</a>
															</li>
															<li><a href="#">2022-05-19</a></li>
														</ul>

														<div class="title">
															<h3 class="h4"><a
																	href="http://127.0.0.1:8000/bai-viet-%E2%80%9Cgoc-khuat%E2%80%9D-tren-duong-dua-f1"
																	class="btn-link">“Góc khuất” trên đường đua
																	F1</a></h3>
														</div>
													</div>
												</div>
											</div>
											<!-- Post Item End -->
										</li>

										<li class="col-xs-12">
											<!-- Divider Start -->
											<hr class="divider">
											<!-- Divider End -->
										</li>
										<li class="col-xs-6">
											<!-- Post Item Start -->
											<div class="post--item post--layout-2">
												<div class="post--img">
													<a href="http://127.0.0.1:8000/bai-viet-droptop-phien-ban-tien-linh"
														class="thumb"><img
															src="./public/uploads/tintuc/Screenshot 2022-05-20 0804264.png"
															alt=""></a>

													<div class="post--info">
														<ul class="nav meta">
															<li><a href="#">Trần Ngọc Thái Nguyên</a>
															</li>
															<li><a href="#">2022-05-20</a></li>
														</ul>

														<div class="title">
															<h3 class="h4"><a
																	href="http://127.0.0.1:8000/bai-viet-droptop-phien-ban-tien-linh"
																	class="btn-link">Droptop phiên bản Tiến Linh</a>
															</h3>
														</div>
													</div>
												</div>
											</div>
											<!-- Post Item End -->
										</li>
										<li class="col-xs-6">
											<!-- Post Item Start -->
											<div class="post--item post--layout-2">
												<div class="post--img">
													<a href="http://127.0.0.1:8000/bai-viet-%E2%80%9Cgoc-khuat%E2%80%9D-tren-duong-dua-f1"
														class="thumb"><img
															src="./public/uploads/tintuc/3-164911456480898.jpg"
															alt=""></a>

													<div class="post--info">
														<ul class="nav meta">
															<li><a href="#">Lâm Thùy Linh</a>
															</li>
															<li><a href="#">2022-05-19</a></li>
														</ul>

														<div class="title">
															<h3 class="h4"><a
																	href="http://127.0.0.1:8000/bai-viet-%E2%80%9Cgoc-khuat%E2%80%9D-tren-duong-dua-f1"
																	class="btn-link">“Góc khuất” trên đường đua
																	F1</a></h3>
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
							<!-- Politics End -->

							<!-- Sports Start -->
							<div class="col-md-6 ptop--30 pbottom--30">
								<!-- Post Items Title Start -->
								<div class="post--items-title" data-ajax="tab">
									<h2 class="h4">Khoa học</h2>
								</div>
								<!-- Post Items Title End -->

								<!-- Post Items Start -->
								<div class="post--items post--items-3" data-ajax-content="outer">
									<ul class="nav" data-ajax-content="inner">
										<li>
											<!-- Post Item Start -->
											<div class="post--item post--layout-1">
												<div class="post--img">
													<a href="http://127.0.0.1:8000/bai-viet-dai-duong-on-ao-nhung-anh-huong-tu-o-nhiem-tieng-on-den-sinh-vat-bien"
														class="thumb"><img src="./public/uploads/tintuc/3.jpg"
															alt=""></a>
													<a href="http://127.0.0.1:8000/properti/sinh-vat"
														class="cat">Sinh vật</a>
													<a href="#" class="icon"><i class="fa fa-eye"></i></a>

													<div class="post--info">
														<ul class="nav meta">
															<li><a href="#">Trần Ngọc Thái Nguyên</a>
															</li>
															<li><a href="#">2022-05-13</li>
														</ul>

														<div class="title">
															<h3 class="h4"><a
																	href="http://127.0.0.1:8000/bai-viet-dai-duong-on-ao-nhung-anh-huong-tu-o-nhiem-tieng-on-den-sinh-vat-bien"
																	class="btn-link">Đại dương ồn ào: Những ảnh
																	hưởng từ ô nhiễm tiếng ồn đến sinh vật biển</a>
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
													<a href="http://127.0.0.1:8000/bai-viet-nhieu-dau-hieu-la-tu-lo-den-trung-tam-ngan-ha-quai-vat-troi-day"
														class="thumb"><img
															src="./public/uploads/tintuc/Nhieu-dau-hieu-la-tu-lo-den-trung-tam-Ngan-Ha-Quai-vat-troi-day_15.jpg"
															alt=""></a>

													<div class="post--info">
														<ul class="nav meta">
															<li><a href="#">Lâm Thùy Linh</a>
															</li>
															<li><a href="#">2022-05-19</a></li>
														</ul>

														<div class="title">
															<h3 class="h4"><a
																	href="http://127.0.0.1:8000/bai-viet-nhieu-dau-hieu-la-tu-lo-den-trung-tam-ngan-ha-quai-vat-troi-day"
																	class="btn-link">Nhiều dấu hiệu lạ từ lỗ đen
																	trung tâm Ngân Hà: Quái vật trỗi dậy?</a></h3>
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
													<a href="http://127.0.0.1:8000/bai-viet-vong-tron-lua-tu-vu-tru-khac-hien-ra-gan-chung-ta-khoa-hoc-boi-roi"
														class="thumb"><img
															src="./public/uploads/tintuc/untitled-1652759097579171955646392.jpg"
															alt=""></a>

													<div class="post--info">
														<ul class="nav meta">
															<li><a href="#">Lâm Thùy Linh</a>
															</li>
															<li><a href="#">2022-05-19</a></li>
														</ul>

														<div class="title">
															<h3 class="h4"><a
																	href="http://127.0.0.1:8000/bai-viet-vong-tron-lua-tu-vu-tru-khac-hien-ra-gan-chung-ta-khoa-hoc-boi-roi"
																	class="btn-link">Vòng tròn lửa &quot;từ vũ trụ
																	khác&quot; hiện ra gần chúng ta, khoa học bối
																	rối</a></h3>
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
													<a href="http://127.0.0.1:8000/bai-viet-video-ky-la-loai-muc-heo-song-duoi-bien-sau"
														class="thumb"><img
															src="./public/uploads/tintuc/Screenshot 2022-05-19 10092726.png"
															alt=""></a>

													<div class="post--info">
														<ul class="nav meta">
															<li><a href="#">Lâm Thùy Linh</a>
															</li>
															<li><a href="#">2022-05-19</a></li>
														</ul>

														<div class="title">
															<h3 class="h4"><a
																	href="http://127.0.0.1:8000/bai-viet-video-ky-la-loai-muc-heo-song-duoi-bien-sau"
																	class="btn-link">Video: Kỳ lạ loài mực heo sống
																	dưới biển sâu</a></h3>
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
													<a href="http://127.0.0.1:8000/bai-viet-phat-hien-hoa-thach-cac-loai-ca-heo-tien-su-tai-thuy-si"
														class="thumb"><img
															src="./public/uploads/tintuc/hoathachrongbien40.jpg"
															alt=""></a>

													<div class="post--info">
														<ul class="nav meta">
															<li><a href="#">Lâm Thùy Linh</a>
															</li>
															<li><a href="#">2022-05-19</a></li>
														</ul>

														<div class="title">
															<h3 class="h4"><a
																	href="http://127.0.0.1:8000/bai-viet-phat-hien-hoa-thach-cac-loai-ca-heo-tien-su-tai-thuy-si"
																	class="btn-link">Phát hiện hóa thạch các loài cá
																	heo tiền sử tại Thụy Sĩ</a></h3>
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
													<a href="http://127.0.0.1:8000/bai-viet-phat-hien-hoa-thach-cac-loai-ca-heo-tien-su-tai-thuy-si"
														class="thumb"><img
															src="./public/uploads/tintuc/hoathachrongbien40.jpg"
															alt=""></a>

													<div class="post--info">
														<ul class="nav meta">
															<li><a href="#">Lâm Thùy Linh</a>
															</li>
															<li><a href="#">2022-05-19</a></li>
														</ul>

														<div class="title">
															<h3 class="h4"><a
																	href="http://127.0.0.1:8000/bai-viet-phat-hien-hoa-thach-cac-loai-ca-heo-tien-su-tai-thuy-si"
																	class="btn-link">Phát hiện hóa thạch các loài cá
																	heo tiền sử tại Thụy Sĩ</a></h3>
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
							<!-- Sports End -->
						</div>
					</div>
				</div>
				<!-- Main Content End -->

				<!-- Main Sidebar Start -->
				<div class="main--sidebar col-md-4 col-sm-5 ptop--30 pbottom--30" data-sticky-content="true">
					<div class="sticky-content-inner">
						<!-- Widget Start -->
						<div class="widget">
							<div class="widget--title">
								<h2 class="h4">Tin tức nổi bật</h2>
								<i class="icon fa fa-newspaper-o"></i>
							</div>

							<!-- List Widgets Start -->
							<div class="list--widget list--widget-1">
								<!-- Post Items Start -->
								<div class="post--items post--items-3" data-ajax-content="outer">
									<ul class="nav" data-ajax-content="inner">
										
										@foreach($outstanding_posts as $outstanding_post)
										<li>
											<!-- Post Item Start -->
											<div class="post--item post--layout-3">
												<div class="post--img">
													<a href="{{ route('posts.show', $outstanding_post) }}"
														class="thumb"><img
															src="{{ asset($outstanding_post->image ? 'storage/' .$outstanding_post->image->path : 'storage/placeholders/placeholder-image.png')}}"
															alt=""></a>

													<div class="post--info">
														<ul class="nav meta">
															<li><a href="#">{{ $outstanding_post->author->name }}</a>
															</li>
															<li><a href="#">{{ $outstanding_post->created_at->diffForHumans()}}</a></li>
														</ul>

														<div class="title">
															<h3 class="h4">
																<a href="{{ route('posts.show', $outstanding_post) }}" class="btn-link">{{ $outstanding_post->title }} </a>
															</h3>
														</div>
													</div>
												</div>
											</div>
											<!-- Post Item End -->
										</li>
										@endforeach
									
									</ul>


								</div>
								<!-- Post Items End -->
							</div>
							<!-- List Widgets End -->
						</div>
						<!-- Widget End -->

						<!-- Widget Start -->
						<div class="widget">
							<!-- Ad Widget Start -->
							<div class="ad--widget--banner">
								<div class="row">
									<div class="col-sm-12">
										<a
											href="https://mwc.com.vn/products/giay-sandal-nu-mwc-nusd--2887?c=N%C3%82U">
											<img src="./public/frontend/img/ads-img/banner_quangcao1.png" alt="">
										</a>
									</div>
								</div>
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
							<div class="social--widget style--2">
								<ul class="nav row gutter--20">
									<li class="col-md-12 facebook">
										<a href="https://www.facebook.com/ngoccam651">
											<span class="icon">
												<i class="fa fa-facebook"></i>
												<span>Share</span>
											</span>

											<span class="text">
												<span>Facebook</span>
												<span>3.12 k</span>
											</span>
										</a>
									</li>

									<li class="col-md-12 twitter">
										<a href="#">
											<span class="icon">
												<i class="fa fa-twitter"></i>
												<span>Tweet</span>
											</span>

											<span class="text">
												<span>Twitter</span>
												<span>869</span>
											</span>
										</a>
									</li>

									<li class="col-md-12 google-plus">
										<a href="#">
											<span class="icon">
												<i class="fa fa-google-plus"></i>
												<span>Share</span>
											</span>

											<span class="text">
												<span>Google+</span>
												<span>639</span>
											</span>
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
								<h2 class="h4">Nhận tin tức mới</h2>
								<i class="icon fa fa-envelope-open-o"></i>
							</div>

							<!-- Subscribe Widget Start -->
							<div class="subscribe--widget">
								<div class="content">
									<p>Đăng ký bản tin của chúng tôi để nhận tin tức mới nhất, tin tức phổ biến và
										cập nhật độc quyền.
									</p>
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
								<h2 class="h4">Quảng cáo</h2>
								<i class="icon fa fa-bullhorn"></i>
							</div>

							<!-- Ad Widget Start -->
							<div class="ad--widget--banner">
								<a href="https://mwc.com.vn/products/giay-sandal-nu-mwc-nusd--2887?c=N%C3%82U">
									<img src="./public/frontend/img/ads-img/banner_quangcao.png" alt="">
								</a>
							</div>
							<!-- Ad Widget End -->
						</div>
						<!-- Widget End -->
					</div>
				</div>
				<!-- Main Sidebar End -->
			</div>

			<!-- Main Content Start -->
			<div class="main--content pd--30-0">
				<!-- Post Items Title Start -->
				<div class="post--items-title" data-ajax="tab">
					<h2 class="h4">Audio &amp; Videos</h2>
				</div>
				<!-- Post Items Title End -->

				<!-- Post Items Start -->
				<div class="post--items post--items-4" data-ajax-content="outer">
					<ul class="nav row" data-ajax-content="inner">
						<li class="col-md-8">
							<!-- Post Item Start -->
							<div class="post--item post--layout-1 post--type-video post--title-large">
								<div class="post--img">
									<a href="https://www.youtube.com/watch?v=5qap5aO4i9A" class="thumb"><img
											src="./public/uploads/tintuc/saostar-e07muxpzwxvkmngo45.jpg" alt=""></a>
									<a href="http://127.0.0.1:8000/properti/dien-anh" class="cat">Điện ảnh</a>
									<a href="#" class="icon"><i class="fa fa-eye"></i></a>

									<div class="post--info">
										<ul class="nav meta">
											<li><a href="#">Trần Ngọc Thái Nguyên</a>
											</li>
											<li><a href="#">2022-05-19</a></li>
										</ul>

										<div class="title">
											<h2 class="h4"><a
													href="http://127.0.0.1:8000/bai-viet-du-phuong-hanh-giu-nguyen-dan-cast-lam-canh-tan-tiep-tuc-nen-duyen-voi-trieu-le-dinh"
													class="btn-link">Dữ Phượng Hành giữ nguyên dàn cast, Lâm Canh
													Tân tiếp tục nên
													duyên với Triệu Lệ Dĩnh?</a></h2>
										</div>
									</div>
								</div>
							</div>
							<!-- Post Item End -->

							<!-- Divider Start -->
							<hr class="divider hidden-md hidden-lg">
							<!-- Divider End -->
						</li>
						<li class="col-md-4">
							<ul class="nav">
								<li>
									<!-- Post Item Start -->
									<div class="post--item post--type-audio post--layout-3">
										<div class="post--img">
											<a href="https://vov.vn/quan-su-quoc-phong/nga-sap-san-xuat-hang-loat-uav-tan-cong-hang-nang-okhotnik-post944826.vov"
												class="thumb"><img
													src="./public/uploads/tintuc/Screenshot 2022-05-19 11284867.png"
													alt=""></a>

											<div class="post--info">
												<ul class="nav meta">
													<li><a href="#">Trần Ngọc Thái Nguyên</a>
													</li>
													<li><a href="#">2022-05-19</a></li>
												</ul>

												<div class="title">
													<h3 class="h4"><a
															href="http://127.0.0.1:8000/bai-viet-nga-sap-san-xuat-hang-loat-uav-tan-cong-hang-nang-okhotnik"
															class="btn-link">Nga sắp sản xuất hàng loạt UAV tấn công
															hạng nặng
															Okhotnik</a></h3>
												</div>
											</div>
										</div>
									</div>
									<!-- Post Item End -->
								</li>
								<li>
									<!-- Post Item Start -->
									<div class="post--item post--type-audio post--layout-3">
										<div class="post--img">
											<a href="https://zingnews.vn/video-canh-binh-si-ukraine-dau-hang-tai-phao-dai-cuoi-cung-o-mariupol-post1318589.html"
												class="thumb"><img
													src="./public/uploads/tintuc/Screenshot 2022-05-19 11242884.png"
													alt=""></a>

											<div class="post--info">
												<ul class="nav meta">
													<li><a href="#">Trần Ngọc Thái Nguyên</a>
													</li>
													<li><a href="#">2022-05-19</a></li>
												</ul>

												<div class="title">
													<h3 class="h4"><a
															href="http://127.0.0.1:8000/bai-viet-canh-binh-si-ukraine-dau-hang-tai-phao-dai-cuoi-cung-o-mariupol"
															class="btn-link">Cảnh binh sĩ Ukraine đầu hàng tại
															&#039;pháo đài cuối
															cùng ở Mariupol&#039;</a></h3>
												</div>
											</div>
										</div>
									</div>
									<!-- Post Item End -->
								</li>
								<li>
									<!-- Post Item Start -->
									<div class="post--item post--type-audio post--layout-3">
										<div class="post--img">
											<a href="https://www.youtube.com/watch?v=5qap5aO4i9A" class="thumb"><img
													src="./public/uploads/tintuc/saostar-e07muxpzwxvkmngo45.jpg"
													alt=""></a>

											<div class="post--info">
												<ul class="nav meta">
													<li><a href="#">Trần Ngọc Thái Nguyên</a>
													</li>
													<li><a href="#">2022-05-19</a></li>
												</ul>

												<div class="title">
													<h3 class="h4"><a
															href="http://127.0.0.1:8000/bai-viet-du-phuong-hanh-giu-nguyen-dan-cast-lam-canh-tan-tiep-tuc-nen-duyen-voi-trieu-le-dinh"
															class="btn-link">Dữ Phượng Hành giữ nguyên dàn cast, Lâm
															Canh Tân tiếp
															tục nên duyên với Triệu Lệ Dĩnh?</a></h3>
												</div>
											</div>
										</div>
									</div>
									<!-- Post Item End -->
								</li>
								<li>
									<!-- Post Item Start -->
									<div class="post--item post--type-audio post--layout-3">
										<div class="post--img">
											<a href="https://vtc.vn/video-ky-la-loai-muc-heo-song-duoi-bien-sau-ar677498.html"
												class="thumb"><img
													src="./public/uploads/tintuc/Screenshot 2022-05-19 10092726.png"
													alt=""></a>

											<div class="post--info">
												<ul class="nav meta">
													<li><a href="#">Trần Ngọc Thái Nguyên</a>
													</li>
													<li><a href="#">2022-05-19</a></li>
												</ul>

												<div class="title">
													<h3 class="h4"><a
															href="http://127.0.0.1:8000/bai-viet-video-ky-la-loai-muc-heo-song-duoi-bien-sau"
															class="btn-link">Video: Kỳ lạ loài mực heo sống dưới
															biển sâu</a></h3>
												</div>
											</div>
										</div>
									</div>
									<!-- Post Item End -->
								</li>
							</ul>
						</li>
					</ul>


				</div>
				<!-- Post Items End -->
			</div>
			<!-- Main Content End -->

			<!-- Advertisement Start -->
			<div class="ad--space pd--30-0">
				<a href="https://burine.vn/">
					<img src="./public/frontend/img/ads-img/970x90_banner_burine.png" alt="" class="center-block">
				</a>
			</div>
			<!-- Advertisement End -->

			<div class="row">
				<!-- Main Content Start -->
				<div class="main--content col-md-8 col-sm-7" data-sticky-content="true">
					<div class="sticky-content-inner">
						<div class="row">
							<!-- Health and fitness Start -->
							<div class="col-md-6 ptop--30 pbottom--30">
								<!-- Post Items Title Start -->
								<div class="post--items-title" data-ajax="tab">
									<h2 class="h4">Đời sống</h2>


								</div>
								<!-- Post Items Title End -->

								<!-- Post Items Start -->
								<div class="post--items post--items-3" data-ajax-content="outer">
									<ul class="nav" data-ajax-content="inner">
										<li>
											<!-- Post Item Start -->
											<div class="post--item post--layout-1">
												<div class="post--img">
													<a href="http://127.0.0.1:8000/bai-viet-luong-thap-nguoi-lao-dong-tung-quan-khong-dam-lap-gia-dinh-thuong-xuyen-di-vay"
														class="thumb"><img
															src="./public/uploads/tintuc/img_0203.jpg" alt=""></a>
													<a href="http://127.0.0.1:8000/properti/hon-nhan"
														class="cat">Hôn nhân</a>
													<a href="#" class="icon"><i class="fa fa-star-o"></i></a>

													<div class="post--info">
														<ul class="nav meta">
															<li><a href="#">Huỳnh Thị Tuyết Nhi</a>
															</li>
															<li><a href="#">2022-05-13</a></li>
														</ul>

														<div class="title">
															<h3 class="h4"><a
																	href="http://127.0.0.1:8000/bai-viet-luong-thap-nguoi-lao-dong-tung-quan-khong-dam-lap-gia-dinh-thuong-xuyen-di-vay"
																	class="btn-link">Lương thấp người lao động túng
																	quẫn: Không dám
																	lập gia đình, thường xuyên đi vay</a></h3>
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
													<a href="http://127.0.0.1:8000/bai-viet-10-loai-thuc-pham-ho-tro-dieu-tri-viem-loet-da-day"
														class="thumb"><img
															src="./public/uploads/tintuc/10-loai-thuc-pham-ho-tro-dieu-tri-viem-loet-da-day_181.jpg"
															alt=""></a>

													<div class="post--info">
														<ul class="nav meta">
															<li><a href="#">Lâm Thùy Linh</a>
															</li>
															<li><a href="#">2022-05-19</a></li>
														</ul>

														<div class="title">
															<h3 class="h4"><a
																	href="http://127.0.0.1:8000/bai-viet-10-loai-thuc-pham-ho-tro-dieu-tri-viem-loet-da-day"
																	class="btn-link">10 loại thực phẩm hỗ trợ điều
																	trị viêm loét dạ
																	dày</a></h3>
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
													<a href="http://127.0.0.1:8000/bai-viet-thuc-pham-giup-tieu-mo-giai-doc-xoa-nhan-lai-ngua-ca-viem-nhiem-phu-khoa"
														class="thumb"><img
															src="./public/uploads/tintuc/Thuc-pham-giup-tieu-mo-giai-doc-xoa-nhan-lai-ngua-ca-viem-nhiem-phu-khoa_42.jpg"
															alt=""></a>

													<div class="post--info">
														<ul class="nav meta">
															<li><a href="#">Lâm Thùy Linh</a>
															</li>
															<li><a href="#">2022-05-19</a></li>
														</ul>

														<div class="title">
															<h3 class="h4"><a
																	href="http://127.0.0.1:8000/bai-viet-thuc-pham-giup-tieu-mo-giai-doc-xoa-nhan-lai-ngua-ca-viem-nhiem-phu-khoa"
																	class="btn-link">Thực phẩm giúp tiêu mỡ, giải
																	độc, xóa nhăn lại
																	ngừa cả viêm nhiễm phụ khoa</a></h3>
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
													<a href="http://127.0.0.1:8000/bai-viet-bac-si-da-lieu-chi-ra-6-quy-tac-vang%E2%80%9D-trong-cham-soc-da-mua-he"
														class="thumb"><img
															src="./public/uploads/tintuc/bac-si-da-lieu-chi-ra-6-quy-tac-vang-trong-cham-soc-da-mua-he-255.png"
															alt=""></a>

													<div class="post--info">
														<ul class="nav meta">
															<li><a href="#">Trần Ngọc Thái Nguyên</a>
															</li>
															<li><a href="#">2022-05-19</a></li>
														</ul>

														<div class="title">
															<h3 class="h4"><a
																	href="http://127.0.0.1:8000/bai-viet-bac-si-da-lieu-chi-ra-6-quy-tac-vang%E2%80%9D-trong-cham-soc-da-mua-he"
																	class="btn-link">Bác sĩ da liễu chỉ ra 6
																	&quot;quy tắc vàng”
																	trong chăm sóc da mùa hè</a></h3>
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
													<a href="http://127.0.0.1:8000/bai-viet-5-cong-thuc-duong-da-bang-da-vien-khien-da-dep-cang-bong-khong-the-ngo"
														class="thumb"><img
															src="./public/uploads/tintuc/5-cong-thuc-duong-da-bang-da-vien-khien-da-dep-cang-bong-khong-the-ngo_193.jpg"
															alt=""></a>

													<div class="post--info">
														<ul class="nav meta">
															<li><a href="#">Trần Ngọc Thái Nguyên</a>
															</li>
															<li><a href="#">2022-05-19</a></li>
														</ul>

														<div class="title">
															<h3 class="h4"><a
																	href="http://127.0.0.1:8000/bai-viet-5-cong-thuc-duong-da-bang-da-vien-khien-da-dep-cang-bong-khong-the-ngo"
																	class="btn-link">5 công thức dưỡng da bằng đá
																	viên khiến da đẹp
																	căng bóng không thể ngờ</a></h3>
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
							<!-- Health and fitness End -->

							<!-- Lifestyle Start -->
							<div class="col-md-6 ptop--30 pbottom--30">
								<!-- Post Items Title Start -->
								<div class="post--items-title" data-ajax="tab">
									<h2 class="h4">Pháp luật</h2>


								</div>
								<!-- Post Items Title End -->

								<!-- Post Items Start -->
								<div class="post--items post--items-2" data-ajax-content="outer">
									<ul class="nav row gutter--15" data-ajax-content="inner">

										<li class="col-xs-12">
											<!-- Post Item Start -->
											<div class="post--item post--layout-1">
												<div class="post--img">
													<a href="http://127.0.0.1:8000/bai-viet-loat-chinh-sach-ve-nguoi-lao-dong-tien-luong-co-hieu-luc-tu-thang-112021"
														class="thumb"><img
															src="./public/uploads/tintuc/chinh-sach-co-hieu-luc-tu-thang-11-2021-dspl.jpg"
															alt=""></a>
													<a href="http://127.0.0.1:8000/properti/cong-van"
														class="cat">Công văn</a>
													<a href="#" class="icon"><i class="fa fa-heart-o"></i></a>

													<div class="post--info">
														<ul class="nav meta">
															<li><a href="#">Huỳnh Thị Tuyết Nhi</a>
															</li>
															<li><a href="#">2022-05-13</a></li>
														</ul>

														<div class="title">
															<h3 class="h4"><a
																	href="http://127.0.0.1:8000/bai-viet-loat-chinh-sach-ve-nguoi-lao-dong-tien-luong-co-hieu-luc-tu-thang-112021"
																	class="btn-link">Loạt chính sách về người lao
																	động, tiền lương
																	có hiệu lực từ tháng 11/2021</a>
															</h3>
														</div>
													</div>
												</div>
											</div>
											<!-- Post Item End -->
										</li>
										<li class="col-xs-12">
											<!-- Divider Start -->
											<hr class="divider">
											<!-- Divider End -->
										</li>
										<li class="col-xs-6">
											<!-- Post Item Start -->
											<div class="post--item post--layout-2">
												<div class="post--img">
													<a href="http://127.0.0.1:8000/bai-viet-quang-nam-26-nam-nu-vao-karaoke-choi-ma-tuy"
														class="thumb"><img
															src="./public/uploads/tintuc/screenshot_165162793959.png"
															alt=""></a>

													<div class="post--info">
														<ul class="nav meta">
															<li><a href="#">Lâm Thùy Linh</a>
															</li>
															<li><a href="#">2022-05-04</a></li>
														</ul>

														<div class="title">
															<h3 class="h4"><a
																	href="http://127.0.0.1:8000/bai-viet-quang-nam-26-nam-nu-vao-karaoke-choi-ma-tuy"
																	class="btn-link">Quảng Nam: 26 nam, nữ vào
																	karaoke chơi ma
																	túy</a></h3>
														</div>
													</div>
												</div>
											</div>
											<!-- Post Item End -->
										</li>
										<li class="col-xs-6">
											<!-- Post Item Start -->
											<div class="post--item post--layout-2">
												<div class="post--img">
													<a href="http://127.0.0.1:8000/bai-viet-tong-thong-nga-yeu-cau-phap-va-phuong-tay-gay-ap-luc-de-ukraine-cham-dut-hanh-dong-tan-bao"
														class="thumb"><img
															src="./public/uploads/tintuc/screenshot_165162755821.png"
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
																	phương Tây gây
																	áp lực để Ukraine &#039;chấm dứt hành động tàn
																	bạo&#039;</a>
															</h3>
														</div>
													</div>
												</div>
											</div>
											<!-- Post Item End -->
										</li>
										<li class="col-xs-12">
											<!-- Divider Start -->
											<hr class="divider">
											<!-- Divider End -->
										</li>
										<li class="col-xs-6">
											<!-- Post Item Start -->
											<div class="post--item post--layout-2">
												<div class="post--img">
													<a href="http://127.0.0.1:8000/bai-viet-quang-nam-26-nam-nu-vao-karaoke-choi-ma-tuy"
														class="thumb"><img
															src="./public/uploads/tintuc/screenshot_165162793959.png"
															alt=""></a>

													<div class="post--info">
														<ul class="nav meta">
															<li><a href="#">Lâm Thùy Linh</a>
															</li>
															<li><a href="#">2022-05-04</a></li>
														</ul>

														<div class="title">
															<h3 class="h4"><a
																	href="http://127.0.0.1:8000/bai-viet-quang-nam-26-nam-nu-vao-karaoke-choi-ma-tuy"
																	class="btn-link">Quảng Nam: 26 nam, nữ vào
																	karaoke chơi ma
																	túy</a></h3>
														</div>
													</div>
												</div>
											</div>
											<!-- Post Item End -->
										</li>
										<li class="col-xs-6">
											<!-- Post Item Start -->
											<div class="post--item post--layout-2">
												<div class="post--img">
													<a href="http://127.0.0.1:8000/bai-viet-tong-thong-nga-yeu-cau-phap-va-phuong-tay-gay-ap-luc-de-ukraine-cham-dut-hanh-dong-tan-bao"
														class="thumb"><img
															src="./public/uploads/tintuc/screenshot_165162755821.png"
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
																	phương Tây gây
																	áp lực để Ukraine &#039;chấm dứt hành động tàn
																	bạo&#039;</a>
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
							<!-- Lifestyle End -->

							<div class="col-md-12 ptop--30 pbottom--30">
								<!-- Post Items Title Start -->
								<div class="post--items-title" data-ajax="tab">
									<h2 class="h4">Giải trí</h2>


								</div>
								<!-- Post Items Title End -->

								<!-- Post Items Start -->
								<div class="post--items post--items-2" data-ajax-content="outer">
									<ul class="nav row" data-ajax-content="inner">
										<li class="col-md-6">
											<!-- Post Item Start -->
											<div class="post--item post--layout-2">
												<div class="post--img">
													<a href="http://127.0.0.1:8000/bai-viet-bo-gd-dt-luu-y-gi-voi-thi-sinh-khi-dang-ky-du-thi-tot-nghiep-thpt-tu-4-5"
														class="thumb"><img
															src="./public/uploads/tintuc/screenshot_165162823557.png"
															alt=""></a>
													<a href="http://127.0.0.1:8000/properti/thi-cu" class="cat">Thi
														cử</a>
													<a href="#" class="icon"><i class="fa fa-star-o"></i></a>

													<div class="post--info">
														<ul class="nav meta">
															<li><a href="#">Lâm Thùy Linh</a></li>
															<li><a href="#">2022-05-04</a></li>
														</ul>

														<div class="title">
															<h3 class="h4"><a
																	href="http://127.0.0.1:8000/bai-viet-bo-gd-dt-luu-y-gi-voi-thi-sinh-khi-dang-ky-du-thi-tot-nghiep-thpt-tu-4-5"
																	class="btn-link">Bộ GD-ĐT lưu ý gì với thí sinh
																	khi đăng ký dự thi tốt nghiệp THPT
																	từ 4-5?</a>
															</h3>
														</div>
													</div>
												</div>
											</div>
											<!-- Post Item End -->

											<hr class="mar_bottom15 ">

											<ul class="list_news_show_home">
												<li class="boder_link_show_home">
													<h3 class="h3"><a
															href=".public/bai-viet-droptop-phien-ban-tien-linh">Droptop
															phiên bản Tiến Linh.</a></h3>
												</li>
												<li class="boder_link_show_home">
													<h3 class="h3"><a
															href=".public/bai-viet-tphcm-ra-mat-dich-vu-xe-dap-cong-cong">TPHCM
															ra mắt dịch vụ xe đạp công
															cộng.</a></h3>
												</li>
												<li>
													<h3 class="h3"><a
															href=".public/bai-viet-vong-tron-lua-tu-vu-tru-khac-hien-ra-gan-chung-ta-khoa-hoc-boi-roi">Vòng
															tròn lửa
															&quot;từ vũ trụ khác&quot; hiện ra gần chúng ta, khoa
															học bối rối.</a></h3>
												</li>
											</ul>
										</li>
										<li class="col-md-6">
											<ul class="nav row">
												<li class="col-xs-12 hidden-md hidden-lg">
													<!-- Divider Start -->
													<hr class="divider">
													<!-- Divider End -->
												</li>
												<li class="col-xs-6">
													<!-- Post Item Start -->
													<div class="post--item post--layout-2">
														<div class="post--img">
															<a href="http://127.0.0.1:8000/bai-viet-bo-cong-an-cong-bo-de-thi-tham-khao-bai-thi-danh-gia-tuyen-sinh-nam-2022"
																class="thumb"><img
																	src="./public/uploads/tintuc/bo-cong-an-cong-bo-de-thi-tham-khao-bai-thi-danh-gia-tuyen-sinh37.jpeg"
																	alt=""></a>

															<div class="post--info">
																<ul class="nav meta">
																	<li><a href="#">Trần Ngọc Thái Nguyên</a>
																	</li>
																	<li><a href="#">2022-05-19</a></li>
																</ul>

																<div class="title">
																	<h3 class="h4"><a
																			href="http://127.0.0.1:8000/bai-viet-bo-cong-an-cong-bo-de-thi-tham-khao-bai-thi-danh-gia-tuyen-sinh-nam-2022"
																			class="btn-link">Bộ Công an công bố đề
																			thi tham khảo bài thi đánh giá tuyển
																			sinh năm 2022</a></h3>
																</div>
															</div>
														</div>
													</div>
													<!-- Post Item End -->
												</li>
												<li class="col-xs-6">
													<!-- Post Item Start -->
													<div class="post--item post--layout-2">
														<div class="post--img">
															<a href="http://127.0.0.1:8000/bai-viet-de-thi-thu-vao-lop-10-mon-toan-nam-2022-o-ha-noi"
																class="thumb"><img
																	src="./public/uploads/tintuc/Screenshot 2022-05-19 11165889.png"
																	alt=""></a>

															<div class="post--info">
																<ul class="nav meta">
																	<li><a href="#">Trần Ngọc Thái Nguyên</a>
																	</li>
																	<li><a href="#">2022-05-19</a></li>
																</ul>

																<div class="title">
																	<h3 class="h4"><a
																			href="http://127.0.0.1:8000/bai-viet-de-thi-thu-vao-lop-10-mon-toan-nam-2022-o-ha-noi"
																			class="btn-link">Đề thi thử vào lớp 10
																			môn Toán năm 2022 ở Hà Nội</a></h3>
																</div>
															</div>
														</div>
													</div>
													<!-- Post Item End -->
												</li>


												<li class="col-xs-12">
													<!-- Divider Start -->
													<hr class="divider">
													<!-- Divider End -->
												</li>

												<li class="col-xs-6">
													<!-- Post Item Start -->
													<div class="post--item post--layout-2">
														<div class="post--img">
															<a href="http://127.0.0.1:8000/bai-viet-mo-dot-cao-diem-tuyen-truyen-phong-chong-duoi-nuoc-cho-tre-em-hoc-sinh"
																class="thumb"><img
																	src="./public/uploads/tintuc/boi.jpg"
																	alt=""></a>

															<div class="post--info">
																<ul class="nav meta">
																	<li><a href="#">Huỳnh Thị Tuyết Nhi</a>
																	</li>
																	<li><a href="#">2022-05-13</a></li>
																</ul>

																<div class="title">
																	<h3 class="h4"><a
																			href="http://127.0.0.1:8000/bai-viet-mo-dot-cao-diem-tuyen-truyen-phong-chong-duoi-nuoc-cho-tre-em-hoc-sinh"
																			class="btn-link">Mở đợt cao điểm tuyên
																			truyền phòng, chống đuối nước cho trẻ
																			em, học sinh</a></h3>
																</div>
															</div>
														</div>
													</div>
													<!-- Post Item End -->
												</li>
												<li class="col-xs-6">
													<!-- Post Item Start -->
													<div class="post--item post--layout-2">
														<div class="post--img">
															<a href="http://127.0.0.1:8000/bai-viet-bo-gd-dt-luu-y-gi-voi-thi-sinh-khi-dang-ky-du-thi-tot-nghiep-thpt-tu-4-5"
																class="thumb"><img
																	src="./public/uploads/tintuc/screenshot_165162823557.png"
																	alt=""></a>

															<div class="post--info">
																<ul class="nav meta">
																	<li><a href="#">Lâm Thùy Linh</a>
																	</li>
																	<li><a href="#">2022-05-04</a></li>
																</ul>

																<div class="title">
																	<h3 class="h4"><a
																			href="http://127.0.0.1:8000/bai-viet-bo-gd-dt-luu-y-gi-voi-thi-sinh-khi-dang-ky-du-thi-tot-nghiep-thpt-tu-4-5"
																			class="btn-link">Bộ GD-ĐT lưu ý gì với
																			thí sinh khi đăng ký dự thi tốt
																			nghiệp THPT từ 4-5?</a></h3>
																</div>
															</div>
														</div>
													</div>
													<!-- Post Item End -->
												</li>
											</ul>
										</li>
									</ul>


								</div>
								<!-- Post Items End -->
							</div>


							<!-- Photo Gallery Start -->
							<div class="col-md-12 ptop--30 pbottom--30">
								<!-- Post Items Title Start -->
								<div class="post--items-title" data-ajax="tab">
									<h2 class="h4">Kinh tế</h2>

								</div>
								<!-- Post Items Title End -->

								<!-- Post Items Start -->
								<div class="post--items post--items-1" data-ajax-content="outer">
									<ul class="nav row gutter--15" data-ajax-content="inner">
										<li class="col-md-12">
											<!-- Post Item Start -->
											<div class="post--item post--layout-1 post--title-large">
												<div class="post--img">
													<a href="http://127.0.0.1:8000/bai-viet-bac-ninh-thao-go-kho-khan-cho-doanh-nghiep-trong-va-ngoai-nuoc"
														class="thumb"><img
															src="./public/uploads/tintuc/bi-thu-tinh-uy-bac-ninh-dao-hong-lan-phat-bieu-tai-hoi-nghi.jpg"
															alt=""></a>
													<a href="http://127.0.0.1:8000/properti/kinh-doanh"
														class="cat">Kinh doanh</a>
													<a href="#" class="icon"><i class="fa fa-eye"></i></a>

													<div class="post--info">
														<ul class="nav meta">
															<li><a href="#">Lâm Thùy Linh</a>
															</li>
															<li><a href="#">2022-05-13</a></li>
														</ul>

														<div class="title text-xxs-ellipsis">
															<h2 class="h4"><a
																	href="http://127.0.0.1:8000/bai-viet-bac-ninh-thao-go-kho-khan-cho-doanh-nghiep-trong-va-ngoai-nuoc"
																	class="btn-link">Bắc Ninh: Tháo gỡ khó khăn cho
																	doanh nghiệp
																	trong và ngoài nước</a></h2>
														</div>
													</div>
												</div>
											</div>
											<!-- Post Item End -->
										</li>
										<li class="col-md-4 col-xs-6 col-xxs-12">
											<!-- Post Item Start -->
											<div class="post--item post--layout-1">
												<div class="post--img">
													<a href="http://127.0.0.1:8000/bai-viet-nhieu-co-hoi-cho-lao-dong-viet-nam-lam-viec-tai-nhat-ban-dai-loan"
														class="thumb"><img
															src="./public/uploads/tintuc/PH_1637205353090-165292405669546.jpg"
															alt=""></a>

													<div class="post--info">
														<ul class="nav meta">
															<li><a href="#">Lâm Thùy Linh</a>
															</li>
															<li><a href="#">2022-05-19</a></li>
														</ul>

														<div class="title">
															<h2 class="h4"><a
																	href="http://127.0.0.1:8000/bai-viet-nhieu-co-hoi-cho-lao-dong-viet-nam-lam-viec-tai-nhat-ban-dai-loan"
																	class="btn-link">Nhiều cơ hội cho lao động Việt
																	Nam làm việc tại
																	Nhật Bản, Đài Loan</a></h2>
														</div>
													</div>
												</div>
											</div>
											<!-- Post Item End -->
										</li>
										<li class="col-md-4 col-xs-6 col-xxs-12">
											<!-- Post Item Start -->
											<div class="post--item post--layout-1">
												<div class="post--img">
													<a href="http://127.0.0.1:8000/bai-viet-vang-trong-nuoc-giu-gia-vang-the-gioi-tang-nhe"
														class="thumb"><img
															src="./public/uploads/tintuc/tin_gia_vang_moi_nhat_ngay_19597.jpg"
															alt=""></a>

													<div class="post--info">
														<ul class="nav meta">
															<li><a href="#">Trần Ngọc Thái Nguyên</a>
															</li>
															<li><a href="#">2022-05-19</a></li>
														</ul>

														<div class="title">
															<h2 class="h4"><a
																	href="http://127.0.0.1:8000/bai-viet-vang-trong-nuoc-giu-gia-vang-the-gioi-tang-nhe"
																	class="btn-link">Vàng trong nước giữ giá, vàng
																	thế giới tăng
																	nhẹ</a></h2>
														</div>
													</div>
												</div>
											</div>
											<!-- Post Item End -->
										</li>
										<li class="col-md-4 col-xs-6 col-xxs-12">
											<!-- Post Item Start -->
											<div class="post--item post--layout-1">
												<div class="post--img">
													<a href="http://127.0.0.1:8000/bai-viet-bac-ninh-thao-go-kho-khan-cho-doanh-nghiep-trong-va-ngoai-nuoc"
														class="thumb"><img
															src="./public/uploads/tintuc/bi-thu-tinh-uy-bac-ninh-dao-hong-lan-phat-bieu-tai-hoi-nghi.jpg"
															alt=""></a>

													<div class="post--info">
														<ul class="nav meta">
															<li><a href="#">Lâm Thùy Linh</a>
															</li>
															<li><a href="#">2022-05-13</a></li>
														</ul>

														<div class="title">
															<h2 class="h4"><a
																	href="http://127.0.0.1:8000/bai-viet-bac-ninh-thao-go-kho-khan-cho-doanh-nghiep-trong-va-ngoai-nuoc"
																	class="btn-link">Bắc Ninh: Tháo gỡ khó khăn cho
																	doanh nghiệp
																	trong và ngoài nước</a></h2>
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
							<!-- Photo Gallery End -->
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
											<img src="./public/frontend/img/ads-img/150x150_banner_baoin.jpg"
												alt="">
										</a>
									</div>

									<div class="col-sm-6">
										<a href="https://baomoi.com/chu-tich-ho-chi-minh/top/114.epi">
											<img src="./public/frontend/img/ads-img/150x150_banner_hcm_02-min.png"
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
															src="./public/frontend/img/person1.jpg" alt=""></span>

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
														src="./public/frontend/img/person1.jpg" alt=""></span>

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
														src="./public/frontend/img/person1.jpg" alt=""></span>

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
														src="./public/frontend/img/person1.jpg" alt=""></span>

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
																	lượt khách tham
																	quan trong 4 ngày nghỉ lễ</a></h3>
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
																	rồi đâm anh ruột
																	tử vong</a></h3>
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
																	phương Tây gây
																	áp lực để Ukraine &#039;chấm dứt hành động tàn
																	bạo&#039;</a>
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
															<li><a href="#">Lâm Thùy Linh</a>
															</li>
															<li><a href="#">2022-05-04</a></li>
														</ul>

														<div class="title">
															<h3 class="h4"><a
																	href="http://127.0.0.1:8000/bai-viet-thiet-bi-bien-nuoc-bien-thanh-nuoc-uong-vuot-chuan-who"
																	class="btn-link">Thiết bị biến nước biển thành
																	nước uống vượt
																	chuẩn WHO</a></h3>
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

</div>

<div class="colorlib-blog" style="display: none !important">
	<div class="container">
		<div class="row">
			<div class="col-md-8 post_col">

			@if(! count($posts))
				<p class="lead">Không có bài tin tức nào.</p>
			@else

			@forelse($posts as $post)

			<div class="block-21 d-flex animate-box post">
				<a href="{{ route('posts.show', $post) }}" class="blog-img" style="background-image: url({{ asset('storage/' .$post->image->path.'')}});"></a>
				<div class="text">
					<h3 class="heading"><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h3>
					<p class="excerpt">{{ $post->excerpt }}</p></p>
					<div class="meta">
						<div><a class="date" href="#"><span class="icon-calendar"></span>{{ $post->created_at->diffForHumans() }}</a></div>
						<div><a href="#"><span class="icon-user2"></span>{{ $post->author->name }} </a></div>
						<div class="comments-count"><a href="{{ route('posts.show', $post) }}#post-comments"><span class="icon-chat"></span> {{$post->comments_count}}</a></div>
					</div>
				</div>
				</div>
				@endforeach
				@endif
				<!-- phân trang -->
				{{$posts->links() }} 
			</div>

			<!-- SIDEBAR: start -->
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

	