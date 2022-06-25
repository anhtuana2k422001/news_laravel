<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class CategoryController extends Controller
{
    
    public function index(){
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

        return view('categories.index', [
            'categories' => $categories = Category::where('name','!=','Chưa phân loại')->orderBy('created_at','DESC')->take(10)->get(),
            'category_all' => Category::where('name','!=','Chưa phân loại')->orderBy('created_at','DESC')->withCount('posts')->paginate(100),
            'posts_new' => $posts_new,
      
        ]);
    }

    public function show(Category $category){

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
        
        return view('categories.show', [
            'category' => $category,
            'posts' => $category->posts()->approved()->orderBy('created_at','DESC')->paginate(10) ,
            'recent_posts' => $recent_posts,
            'categories' => $categories, 
            'tags' => $tags,
            'posts_new' => $posts_new,
            'outstanding_posts' => $outstanding_posts, // bài viết xu hướng
        ]);
    }
}
