<?php 
use Carbon\Carbon;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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

@section('title','TDQ - Thông tin tài khoản')
@section('content')

@auth
<?php $user = User::where('id', auth()->user()->id)->first(); ?>
<div class="main--breadcrumb">
    <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}" class="btn-link"><i class="fa fm fa-home"></i>Trang chủ</a></li>
                <li class="active"><span>Tài khoản</span></li>
            </ul>
        </div>
    </div>
 
	<!-- Main Content Section Start -->
	<div class="main-content--section pbottom--30">
		<div class="container">
            <h3 class="page-header">Thông tin cá nhân</h3>
            <div class="row">
             
                <form action="{{ route('update') }}" method="post"  enctype="multipart/form-data" >
                    @csrf

                    <!-- left column -->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="text-center">
                            <img style="    border: 4px solid #979993; border-radius: 50%; margin: auto; background-size: cover ;  width: 180px; height: 180px;   background-image: url({{ auth()->user()->image ?  asset('storage/' . auth()->user()->image->path) : asset('storage/placeholders/user_placeholder.jpg') }})"  alt="">
                            <div class="mb-3">
                            <label for="input_image" class="form-label">Ảnh đai diện</label>
                            <input style="background-color: #ffffff; color: black;"  name="image" type="file" class="form-control text-center center-block well well-sm" id="input_image" >
                                @error('image')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-8 col-sm-6 col-xs-12">
                        <div class="form-body mt-4">
                            <div class="row">
                                    <div class="col-lg-6">
                                        <div class="border border-3 p-4 rounded">

                                            <div style="margin-bottom: 30px;" class="mb-3">
                                                <label for="input_name" class="form-label">Họ Tên</label>
                                                <input name="name" type="text"  class="form-control" id="input_name" value='{{ old("name", $user->name ) }}'>
                                            
                                                @error('name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div style="margin-bottom: 30px;" class="mb-3">
                                                <label for="input_email" class="form-label">Email</label>
                                                <input name="email" type="email" class="form-control" id="input_email" value='{{ old("email", $user->email) }}'>
                                            
                                                @error('email')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <button class="btn btn-primary" type="submit">Cập nhật</button>

                                            <a class="btn btn-danger" href="{{ route('home') }}">Quay lại</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                    
            </div>
        </div>
    </div>
  
</div>
@endauth

@guest
    <div class="wrapper">
	<!-- Main Content Section Start -->
	<div class="main-content--section pbottom--30">
		<div class="container">
            <div class="row">
                <div class="cold-md-8 offset-md-2 text-center">
                    <h1 style="font-size: 162px; color: green; font-weight: bold;">404</h1>
                    <h2>Trang không tồn tại</h2>
                    <p>Chúng tôi xin lỗi, trang bạn yêu cầu có thể được tìm thấy. Vui lòng quay lại trang chủ.</p>
                    <a href="{{ route('home') }}" class="btn btn-primary">Quay lại trang chủ</a>
                </div>
            </div>
        </div>
    </div>
    </div>
@endguest

@endsection
