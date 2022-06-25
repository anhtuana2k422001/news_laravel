<?php 
use App\Models\Post;
use App\Models\Category;

    // Bài viết nổi bật
    $category_hot = Category::where('name','!=','Chưa phân loại')->first();
    $outstanding_posts_hots = Post::approved()
            ->where('category_id',  $category_hot->id )
            ->orderBy('created_at','DESC')
            ->take(5)->get();
    $outstanding_posts_views =  Post::approved()->orderBy('views','DESC')->take(5)->get();

 ?>

@props(['outstanding_posts'] )
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
                    <a  class="outstandPosts" href="#" data-ajax-action="load_widget_hot_news">Tin nóng</a>
                </li>
                <li class="active">
                    <a class="outstandPosts" href="" data-ajax-action="load_widget_trendy_news">Xu hướng</a>
                </li>
                <li>
                    <a class="outstandPosts" href="" data-ajax-action="load_widget_most_watched">Xem nhiều nhất</a>
                </li>
            </ul>
        </div>

        <!-- Post Items Start -->
        <div class="post--items post--items-3" data-ajax-content="outer">
            <ul class="nav listPost" data-ajax-content="inner">
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
                                        <li><span><i class="fa fm fa-eye"></i>{{ $outstanding_post->views }}</span></li>
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
            <!-- <div class="preloader bg--color-0--b" data-preloader="1">
                <div class="preloader--inner"></div>
            </div> -->
            <!-- Preloader End -->
        </div>
        <!-- Post Items End -->
    </div>
    <!-- List Widgets End -->
</div>
<!-- Widget End -->

@section('custom_js')

<script>
	setTimeout(() => {
		$(".global-message").fadeOut();
	}, 5000)
</script>

<script>
        const outstandPosts = document.querySelectorAll('.outstandPosts');
        outstandPosts.forEach((item, index)=>{
            $(item).click(function(e){

                const ListPost=  $('.listPost');
                const ListPost_item = $('.listPost li');
                ListPost_item.remove();
                if(index==0){
                    const htmls  = (() =>{
                    return `
                        @foreach($outstanding_posts_hots as $outstanding_posts_hot)
                            <li>
                                <div class="post--item post--layout-3">
                                    <div class="post--img">
                                        <a href="{{ route('posts.show', $outstanding_posts_hot) }}" class="thumb"><img
                                                src="{{ asset($outstanding_posts_hot->image ? 'storage/' .$outstanding_posts_hot->image->path : 'storage/placeholders/placeholder-image.png')}}"
                                                alt=""></a>
                                        <div class="post--info">
                                            <ul class="nav meta">
                                                <li><a href="javascript:;">{{ $outstanding_posts_hot->created_at->locale('vi')->diffForHumans() }}</a></li>
                                                <li><a  href="javascript:;"><i class="fa fm fa-comments"></i>{{ count($outstanding_posts_hot->comments) }}</a></li>
                                                <li><span><i class="fa fm fa-eye"></i>{{ $outstanding_posts_hot->views }}</span></li>
                                            </ul>

                                            <div class="title">
                                                <h3 class="h4"><a href="{{ route('posts.show', $outstanding_posts_hot) }}"
                                                        class="btn-link">{{ $outstanding_posts_hot->title}}</a>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    `
                        });
                    ListPost.append(htmls);
                }
                if(index==1){
                    const htmls  = (() =>{
                    return `
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
                                                <li><span><i class="fa fm fa-eye"></i>{{ $outstanding_post->views }}</span></li>
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
                    `
                        });
                    ListPost.append(htmls);
                }
                if(index==2){
                    const htmls  = (() =>{
                    return `
                         @foreach($outstanding_posts_views as $outstanding_posts_view)
                            <li>
                                <div class="post--item post--layout-3">
                                    <div class="post--img">
                                        <a href="{{ route('posts.show', $outstanding_posts_view) }}" class="thumb"><img
                                                src="{{ asset($outstanding_posts_view->image ? 'storage/' .$outstanding_posts_view->image->path : 'storage/placeholders/placeholder-image.png')}}"
                                                alt=""></a>
                                        <div class="post--info">
                                            <ul class="nav meta">
                                                <li><a href="javascript:;">{{ $outstanding_posts_view->created_at->locale('vi')->diffForHumans() }}</a></li>
                                                <li><a  href="javascript:;"><i class="fa fm fa-comments"></i>{{ count($outstanding_posts_view->comments) }}</a></li>
                                                <li><span><i class="fa fm fa-eye"></i>{{ $outstanding_posts_view->views }}</span></li>
                                            </ul>

                                            <div class="title">
                                                <h3 class="h4"><a href="{{ route('posts.show', $outstanding_posts_view) }}"
                                                        class="btn-link">{{ $outstanding_posts_view->title}}</a>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    `
                        });
                    ListPost.append(htmls);
                }


            });
        });
</script>

@endsection