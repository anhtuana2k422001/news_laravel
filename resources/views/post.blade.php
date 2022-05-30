@extends('main_layouts.master')

@section('title', $post->title. ' | HUTECH NEWS ')

@section('custom_css')
	<style>
		/* .class-single .desc img{
			width: 100%;
		} */
	</style>
@endsection

@section('content')

<div class="colorlib-classes">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<div class="row row-pb-lg">
							<div class="col-md-12 animate-box">
								<div class="classes class-single">
									<div class="classes-img" style="background-image: url({{ asset($post->image ? 'storage/' .$post->image->path : 'storage/placeholders/placeholder-image.jpg'  )}});">
									</div>
									<div class="desc desc2">
										{!! $post->body !!}
										<!-- <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their.</p> -->
										<!-- <p><a href="#" class="btn btn-primary btn-outline btn-lg">Live Preview</a> or <a href="#" class="btn btn-primary btn-lg">Download File</a></p> -->
										<p>Người viết: {{ $post->author->name }}</p>
										<p>Thời gian: {{ $post->created_at->diffForHumans() }}</p>
									</div>
								</div>
							</div>
						</div>
						<div class="row row-pb-lg animate-box">
							<div class="col-md-12">

								<h2 class="colorlib-heading-2">{{ count($post->comments) }} Bình luận</h2>

								@foreach($post->comments as $comment)
								<div id="comment_{{ $comment->id }}" class="review">
									<!-- <div class="user-img" style="background-image: url(/blog_template/images/person1.jpg)"></div> -->
									<div class="user-img" style="background-image: url({{ $comment->user->image ? asset('storage/' .$comment->user->image->path.'') : 'https://bloganchoi.com/wp-content/uploads/2022/02/avatar-trang-y-nghia.jpeg' }});"></div>
									<div class="desc">
										<h4>
											<span class="text-left">{{ $comment->user->name }}</span>
											<span class="text-right">{{ $comment->created_at->diffForHumans() }}</span>
										</h4>
										<p>{{ $comment->the_comment }}</p>
										<p class="star">
											<span class="text-left"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
										</p>
									</div>
						   		</div>
								@endforeach

							</div>
						</div>
				
						<div class="row animate-box">
							<div class="col-md-12">

								<x-blog.message :status="'success'"/>

								<h2 class="colorlib-heading-2">Hãy viết gì đó</h2>

								@auth	
								<form method="POST" action="{{ route('posts.add_comment', $post )}}">
									@csrf

									<div class="row form-group">
										<div class="col-md-12">
											<!-- <label for="message">Message</label> -->
											<textarea name="the_comment" id="message" cols="30" rows="10" class="form-control" placeholder="Đánh giá bài viết này"></textarea>
										</div>
									</div>

									<div class="form-group">
										<input type="submit" value="Bình luận" class="btn btn-primary">
									</div>
								</form>
								@endauth

								@guest
								<p class="lead">
									<a href="{{ route('login') }}">Đăng nhập</a> hoặc 
									<a href="{{ route('register') }}">Đăng ký</a> để bình luận bài viết
								</p>
								@endguest

							</div>
						</div>
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

@section('custom_js')
<script>
	setTimeout(() => {
		$(".global-message").fadeOut();
	}, 5000)
</script>
@endsection