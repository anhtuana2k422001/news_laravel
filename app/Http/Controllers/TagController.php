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

        // Bài viết nổi bật
        $outstanding_posts = Post::approved()->where('category_id', '!=',  $category_unclassified->id )->take(5)->get();
        
        return view('tags.show', [
            'tag' => $tag,
            'posts' => $tag->posts()->paginate(8) , 
            'recent_posts' => $recent_posts,
            'categories' => $categories, 
            'tags' => $tags,
            'posts_new' => $posts_new,
            'outstanding_posts' => $outstanding_posts,
        ]);
    }
}
