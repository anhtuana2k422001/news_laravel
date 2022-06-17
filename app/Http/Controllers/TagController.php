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
        // $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();
        $tags = Tag::latest()->take(50)->get();
        
        return view('tags.show', [
            'tag' => $tag,
            'posts' => $tag->posts()->paginate(8) , 
            'recent_posts' => $recent_posts,
            'categories' => $categories, 
            'tags' => $tags,
        ]);
    }
}
