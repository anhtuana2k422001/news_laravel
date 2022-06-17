<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Category;
use App\Models\Post;

class TagController extends Controller
{
    public function index(){
        // view all categories in web
    }

    public function show(Tag $tag){
        $recent_posts = Post::latest()->take(5)->get();
        $categories  = Category::where('name','!=','Chưa phân loại')->withCount('posts')->orderBy('created_at','DESC')->take(10)->get();
        $tags = Tag::latest()->take(50)->get();

        $category_new = Category::where('name','!=','Chưa phân loại')->orderBy('id','DESC')->take(4)->get();
        foreach($category_new as $category_new_item ){
            $posts_new_category[] = Post::where('category_id',$category_new_item->id)->orderBy('created_at','DESC')->take(1)->get();
        }
        
        return view('tags.show', [
            'tag' => $tag,
            'posts' => $tag->posts()->paginate(8) , 
            'recent_posts' => $recent_posts,
            'categories' => $categories, 
            'tags' => $tags,
            'posts_new_category' => $posts_new_category,
        ]);
    }
}
