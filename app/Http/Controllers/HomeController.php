<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        
        $posts = Post::latest()
        ->approved()
        // where('approved',1)
        ->withCount('comments')->paginate(8); // phân trang 8 bài
        
        $recent_posts = Post::latest()->take(5)->get();

        $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();
        
        $tags = Tag::latest()->take(50)->get();



        // Lấy ra 4 danh mục tin tức mới nhất
        $category_new = Category::orderBy('created_at','ASC')->take(4)->get();
        $stt = 0;
        foreach($category_new as $category ){
            $stt = $stt + 1;
            if($stt === 1)
                $post_new_1 = Post::where('category_id',$category->id)->orderBy('created_at','DESC')->take(1)->get();
            if($stt === 2)
                $post_new_2 = Post::where('category_id',$category->id)->orderBy('created_at','DESC')->take(1)->get();
            if($stt === 3)
                $post_new_3 = Post::where('category_id',$category->id)->orderBy('created_at','DESC')->take(1)->get();
            if($stt === 4)
                $post_new_4 = Post::where('category_id',$category->id)->orderBy('created_at','DESC')->take(1)->get();
        }

        // Lấy ra tin nổi bật
        $outstanding_posts = Post::latest()->take(5)->get();



        return view('home', [ 
            'posts' => $posts,
            'postnew1' => $post_new_1,
            'postnew2' =>  $post_new_2,
            'postnew3' => $post_new_3,
            'postnew4' =>  $post_new_4,
            'recent_posts' => $recent_posts,
            'outstanding_posts' => $outstanding_posts,
            'categories' => $categories, 
            'category_new' => $category_new, 
            'tags' => $tags,
        ]);
    }
}
 