<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class AboutController extends Controller
{

    public function __invoke(Request $request)
    {
        $category_new = Category::where('name','!=','Chưa phân loại')->orderBy('id','DESC')->take(4)->get();
        foreach($category_new as $category_new_item ){
            $posts_new_category[] = Post::where('category_id',$category_new_item->id)->orderBy('created_at','DESC')->take(1)->get();
        }
        
        return view('about',[
            'categories' => $categories = Category::where('name','!=','Chưa phân loại')->orderBy('created_at','DESC')->take(10)->get(),
            'posts_new_category' => $posts_new_category,
        ]);
    }
}
