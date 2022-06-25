@extends('main_layouts.master')
@section('title','TDQ - Tin Nóng')

@section('content')
  <!-- Main Breadcrumb Start -->
  <div class="main--breadcrumb">
        <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{ route('home') }}" class="btn-link"><i class="fa fm fa-home"></i>Trang chủ</a></li>
                    <li class="active"><span>Tin nóng</span></li>
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
                                    <!-- Post Items Start -->
                                    <div class="post--items post--items-2" data-ajax-content="outer">
                                        <ul class="nav" data-ajax-content="inner">
                                            @for ($i = 0 ; $i < 4 ; $i++ )
                                                @for ($j = 0 ; $j < 5 ; $j++ )
                                                    <li>
                                                        <!-- Post Item Start -->
                                                        <div class="post--item">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="post--img">
                                                                        <a href="{{ route('posts.show', $hotPosts_category[$j][$i] ) }}"
                                                                            class="thumb"><img
                                                                                src="{{ asset($hotPosts_category[$j][$i]->image ? 'storage/' . $hotPosts_category[$j][$i]->image->path : 'storage/placeholders/placeholder-image.png'  )}}"
                                                                                alt=""></a>
                                                                        <a href="{{ route('categories.show', $hotPosts_category[$j][$i]->category) }}"
                                                                            class="cat">{{ $hotPosts_category[$j][$i]->category->name }}</a>

                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="post--info">
                                                                        <ul class="nav meta">
                                                                            <li><span>{{ $hotPosts_category[$j][$i]->author->name }}</a></li>
                                                                            <li><span>{{ $hotPosts_category[$j][$i]->created_at->locale('vi')->diffForHumans() }}</span></li>
                                                                            <li><a href="#"><i class="fa fm fa-eye"></i>{{ $hotPosts_category[$j][$i]->views }}</span></li>
                                                                            <li><a href="{{ route('posts.show', $hotPosts_category[$j][$i] ) }}"><i class="fa fm fa-comments"></i>{{ count($hotPosts_category[$j][$i]->comments) }}</a></li>
                                                                        </ul>


                                                                        <div class="title">
                                                                            <h2 class="h3" style="color:black"><a
                                                                                    href="{{ route('posts.show', $hotPosts_category[$j][$i] ) }}"
                                                                                    class="btn-link">{{ $hotPosts_category[$j][$i]->title }}</a></h3>
                                                                        </div>
                                                                    </div>

                                                                    <div class="post--content">
                                                                        <p>{{ $hotPosts_category[$j][$i]->excerpt }}</p>
                                                                    </div>

                                                                    <div class="post--action">
                                                                        <a class="btn btn-link" href="{{ route('posts.show', $hotPosts_category[$j][$i] ) }}">Đọc thêm</a>
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
											@endfor
                                        </ul>

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
                        <x-blog.side-outstanding_posts :outstanding_posts="$outstanding_posts"/>
                        <!-- Widget End -->

                        <!-- Widget Start -->
                        <x-blog.side-vote />
                        <!-- Widget End -->

                        <!-- Widget Start -->
                        <x-blog.side-ad_banner />
                        <!-- Widget End -->

                    </div>
                    </div> <!-- Main Sidebar End -->
                </div>
            </div>
        </div>
        <!-- Main Content Section End -->
@endsection

