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

<script>
	$(document).on('click', '.send-comment-btn', (e) => {
		e.preventDefault();
		let $this = e.target;

		let csrf_token = $($this).parents("form").find("input[name='_token']").val();
		let the_comment =  $($this).parents("form").find("textarea[name='the_comment']").val();
		let post_title =  $('.post_title').text() ; 

		let count_comment =  $('.post_count_comment').text() ; 
        let ListComment = $('.comment--items');

		let formData = new FormData();
		formData.append('_token', csrf_token);
		formData.append('the_comment', the_comment);
		formData.append('post_title', post_title);
	


		$.ajax({
			url: "{{ route('posts.addCommentUser') }}",
			data: formData,
			type: 'POST',
			dataType: 'JSON',
			processData: false,
			contentType: false,
			success: function (data) {
				if(data.success){

                    console.log(data.result);
                  
                    // Xử lý thêm comment vào bài viết tạm thời
                    count_comment = Number(count_comment) + 1;
                    $('.comment_error').text('');

                    $('.post_count_comment').text(count_comment);
                    const htmls  = (() =>{
                    return `
                            @auth
                                <li>
                                    <div class="comment--item clearfix">
                                        <div class="comment--img float--left">
                                            <img style="border-radius: 50%; margin: auto; background-size: cover ;  width: 68px; height: 68px;   background-image: url({{ auth()->user()->image ?  asset('storage/' . auth()->user()->image->path) : asset('storage/placeholders/user_placeholder.jpg') }})"  alt="">
                                        </div>
                                        <div class="comment--info">
                                            <div class="comment--header clearfix">
                                            <p class="name">{{ auth()->user()->name }}</p> 
                                                <p class="date">vừa xong</p>
                                                <a href="javascript:;" class="reply"><i class="fa fa-flag"></i></a>
                                            </div>
                                            <div class="comment--content">
                                                <p>${data.result['the_comment']}</p>
                                                <p class="star">
                                                    <span class="text-left"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endauth
                        `
                        });
                    ListComment.append(htmls);


					$('.global-message').addClass('alert alert-info');
					$('.global-message').fadeIn();
					$('.global-message').text(data.message);

					clearData( $($this).parents("form"), [
						'the_comment',
					]);

					setTimeout(() => {
						$(".global-message").fadeOut();
					}, 5000)

				}else{
                    $('.comment_error').text(data.errors);
				}
			}
		})
	})
</script>

@endsection