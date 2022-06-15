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
        ->withCount('comments')->paginate(8); 
        // phân trang 8 bài

   
        
        $recent_posts = Post::latest()->take(5)->get();


        $categories = Category::where('name','!=','Chưa phân loại')->orderBy('created_at','DESC')->take(10)->get();
        // $categories = Category::where('name','!=','Chưa phân loại')->withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();
        
        $tags = Tag::latest()->take(50)->get();

        
        $category_new = Category::orderBy('created_at','ASC')->take(4)->get();
        $stt = 0;
        foreach($category_new as $category_new_item ){
            // Tạo tin tức mới nhất cho layout master
            $stt = $stt + 1;
            if($stt === 1)
                $post_new_1 = Post::where('category_id',$category_new_item->id)->orderBy('created_at','DESC')->take(1)->get();
            if($stt === 2)
                $post_new_2 = Post::where('category_id',$category_new_item->id)->orderBy('created_at','DESC')->take(1)->get();
            if($stt === 3)
                $post_new_3 = Post::where('category_id',$category_new_item->id)->orderBy('created_at','DESC')->take(1)->get();
            if($stt === 4)
                $post_new_4 = Post::where('category_id',$category_new_item->id)->orderBy('created_at','DESC')->take(1)->get();
        }

        // Lấy ra tin nổi bật
        $outstanding_posts = Post::latest()->take(5)->get();

        // Lấy ra tất cả danh mục tin tức 
        $stt_home = 0;
        $category_home = Category::where('name','!=','Chưa phân loại')->orderBy('created_at','DESC')->take(10)->get();
        foreach($category_home as $category_item ){
            // Tạo tin tức mới nhất cho layout master
            $stt_home = $stt_home + 1;    
            if($stt_home === 1)
                $post_category_home1 =  Post::latest()->approved()->withCount('comments')->where('category_id',$category_item->id)->take(5)->get();
            if($stt_home === 2)
                $post_category_home2 =  Post::latest()->approved()->withCount('comments')->where('category_id',$category_item->id)->take(5)->get();
         }

        // Lấy ra tất cả bài viết
        $posts_all = Post::latest()->approved()->withCount('comments')->get(); 

        return view('home', [ 
            'posts' => $posts,
            'postnew1' => $post_new_1,
            'postnew2' =>  $post_new_2,
            'postnew3' => $post_new_3,
            'postnew4' =>  $post_new_4,
            'recent_posts' => $recent_posts,
            'post_category_home1' => $post_category_home1, // Bài viết danh mục 1
            'post_category_home2' => $post_category_home2, // Bài viết danh mục 1
            'outstanding_posts' => $outstanding_posts, // Bài viết nỗi bật
            'categories' => $categories, 
            'category_new' => $category_new, // danh mục có bài viết mới
            'category_home' => $category_home, 
            'tags' => $tags,
        ]);
    }
}
 