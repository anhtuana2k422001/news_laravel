@extends('main_layouts.master')

@section('title',' TDQ - Danh mục tin tức')

@section('content')

<div class="colorlib-blog">
			<div class="container">
				<div class="row">
					<div class="col-md-12 categories_col">
                        <div class="row">
                            @if(! count($category_all))
                                <p class="lead">Không có danh mục tin tức nào.</p>
                            @else

                            @forelse($category_all as $category)
                            <div class="col-md-3">
                                <div class="block-21 d-flex animate-box post">
                                    <div class="text">
                                    <h3 class="heading"><a href="{{ route('categories.show', $category) }}">{{ $category->name }}</a></h3>
                                    <div class="meta">
                                        <div><a class="date" href="#"><span class="icon-calendar"></span>{{ $category->created_at->locale('vi')->diffForHumans() }}</a></div>
                                        <div><a href="#"><span class="icon-user2"></span>{{ $category->user->name }} </a></div>
                                        <div class="posts-count"><a href="{{ route('categories.show', $category) }}"><span class="icon-tag"></span> {{$category->posts_count}}</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                        {{ $category_all->links() }}
					</div>
				</div>
			</div>
		</div>
	
@endsection

	