<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class PostsController extends Controller
{
    public function show(Post $post){
        
        $recent_posts = Post::latest()->take(5)->get();
        $categories  = Category::where('name','!=','Chưa phân loại')->withCount('posts')->orderBy('created_at','DESC')->take(10)->get();
        $tags = Tag::latest()->take(50)->get();

        $category_new = Category::where('name','!=','Chưa phân loại')->orderBy('id','DESC')->take(4)->get();
        foreach($category_new as $category_new_item ){
            $posts_new_category[] = Post::where('category_id',$category_new_item->id)->orderBy('created_at','DESC')->take(1)->get();
        }

        // Tăng lượt xem khi xem bài viết
        $post->views =  ($post->views) + 1;
        $post->save();

        return view('post', [ 
            'post' => $post,
            'recent_posts' => $recent_posts,
            'categories' => $categories, 
            'tags' => $tags,
            'posts_new_category' => $posts_new_category,
        ]);
    }

    public function addComment(Post $post)
    {
        $attributes = request()->validate([
            'the_comment' => 'required|min:5|max:300']);

        $attributes['user_id'] = auth()->id();

        $comment = $post->comments()->create($attributes);

        return redirect('/posts/' . $post->slug . '#comment_' . $comment->id)->with('success', 'Bạn vừa bình luận thành công.');

    }

   
}
