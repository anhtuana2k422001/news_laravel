<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class AboutController extends Controller
{

    public function __invoke(Request $request)
    {
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
        
        return view('about',[
            'categories' => $categories = Category::where('name','!=','Chưa phân loại')->orderBy('created_at','DESC')->take(10)->get(),
            'posts_new' => $posts_new,
        ]);
    }
}
