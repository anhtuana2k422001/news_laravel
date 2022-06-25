@extends('main_layouts.master')

@section('title', $tag->name . ' HUTECH NEWS | Thẻ')

@section('content')
<!-- Main Breadcrumb Start -->
<div class="main--breadcrumb">
	<div class="container">
			<ul class="breadcrumb">
				<li><a href="{{ route('home') }}" class="btn-link"><i class="fa fm fa-home"></i>Trang Chủ</a></li>
				<li><span class="active" >{{ $tag->name }}</span></li>
			</ul>
	</div>
</div>
<!-- Main Breadcrumb End -->

<div class="main-content--section pbottom--30">
	<div class="container">
		<div class="row">
			<div class="main--content col-md-8" data-sticky-content="true">
				<div class="sticky-content-inner">
					<div class="post--item post--single post--title-largest pd--30-0">

						@if(! count($posts))
							<p class="lead">Không có thẻ nào cả !</p>
						@else

						@forelse($posts as $post)

						<div class="block-21 d-flex animate-box post">
							<a href="{{ route('posts.show', $post) }}" class="blog-img" style="background-image: url({{ asset($post->image ? 'storage/' .$post->image->path : 'storage/placeholders/placeholder-image.png'  )}});"></a>
							<div class="text">
							<h3 class="heading"><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h3>
							<p class="excerpt">{{ $post->excerpt }}</p></p>
							<div class="meta">
								<div><a class="date" href="#"><span class="icon-calendar"></span>{{ $post->created_at->locale('vi')->diffForHumans() }}</a></div>
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
				</div>
			</div>

			<!-- SIDEBAR: start -->
			<div class="main--sidebar col-md-4 ptop--30 pbottom--30" data-sticky-content="true">
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
			</div>
			<!-- Main Sidebar End -->

		</div>
	</div>
</div>
	
@endsection

	