<?php 
use Carbon\Carbon;
use App\Models\Category;
use App\Models\Post;
$now = Carbon::now('Asia/Ho_Chi_Minh')->locale('vi');
$categoryFooter  = Category::where('name','!=','Chưa phân loại')->withCount('posts')->orderBy('created_at','DESC')->take(12)->get();
$categories = Category::where('name','!=','Chưa phân loại')->orderBy('created_at','DESC')->take(10)->get();

/*----- Lấy ra 4 bài viết mới nhất theo các danh mục khác nhau -----*/
$category_unclassified = Category::where('name','Chưa phân loại')->first();
$posts_new[0]= Post::latest()->approved()
             ->where('category_id','!=', $category_unclassified->id )
              ->take(1)->get();
$posts_new[1] = Post::latest()->approved()
            ->where('category_id','!=', $category_unclassified->id )
            ->where('category_id','!=', $posts_new[0][0]->category->id )
            ->take(1)->get();
$posts_new[2] = Post::latest()->approved()
            ->where('category_id','!=', $category_unclassified->id )
            ->where('category_id','!=', $posts_new[0][0]->category->id )
            ->where('category_id','!=', $posts_new[1][0]->category->id )
            ->take(1)->get();
$posts_new[3] = Post::latest()->approved()
            ->where('category_id','!=', $category_unclassified->id )
            ->where('category_id','!=', $posts_new[0][0]->category->id )
            ->where('category_id','!=', $posts_new[1][0]->category->id)
            ->where('category_id','!=', $posts_new[2][0]->category->id )
            ->take(1)->get();

?>
@extends('main_layouts.master')

@section('title','TDQ - Không tìm thấy trang')
@section('content')
<div class="wrapper">
	<!-- Main Content Section Start -->
	<div class="main-content--section pbottom--30">
		<div class="container">
            <div class="row">
                <div class="cold-md-8 offset-md-2 text-center">
                    <h1 style="font-size: 162px; color: green; font-weight: bold;">404</h1>
                    <h2 class="h2">Trang không tồn tại</h2>
                    <p>Chúng tôi xin lỗi, trang bạn yêu cầu có thể được tìm thấy. Vui lòng quay lại trang chủ.</p>
                    <a href="{{ route('home') }}" class="btn btn-primary">Quay lại trang chủ</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
