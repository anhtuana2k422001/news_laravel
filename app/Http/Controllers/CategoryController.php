<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class CategoryController extends Controller
{
    
    public function index(){
        $category_new = Category::where('name','!=','Chưa phân loại')->orderBy('id','DESC')->take(4)->get();
        foreach($category_new as $category_new_item ){
            $posts_new_category[] = Post::where('category_id',$category_new_item->id)->orderBy('created_at','DESC')->take(1)->get();
        }
        
        return view('categories.index', [
            'categories' => $categories = Category::where('name','!=','Chưa phân loại')->orderBy('created_at','DESC')->take(10)->get(),
            'category_all' => Category::where('name','!=','Chưa phân loại')->withCount('posts')->paginate(100),
            'posts_new_category' => $posts_new_category,
        ]);
    }


    public function show(Category $category){

        $recent_posts = Post::latest()->take(5)->get();
        $categories  = Category::where('name','!=','Chưa phân loại')->withCount('posts')->orderBy('created_at','DESC')->take(10)->get();
        $tags = Tag::latest()->take(50)->get();

        $category_new = Category::where('name','!=','Chưa phân loại')->orderBy('id','DESC')->take(4)->get();
        foreach($category_new as $category_new_item ){
            $posts_new_category[] = Post::where('category_id',$category_new_item->id)->orderBy('created_at','DESC')->take(1)->get();
        }
        
        return view('categories.show', [
            'category' => $category,
            'posts' => $category->posts()->paginate(8) ,
            'recent_posts' => $recent_posts,
            'categories' => $categories, 
            'tags' => $tags,
            'posts_new_category' => $posts_new_category,
        ]);
    }
}
