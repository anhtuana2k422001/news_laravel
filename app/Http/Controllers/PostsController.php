<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Validator;

class PostsController extends Controller
{
    public function show(Post $post){
        
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

        
        // Bài viết tương tự 
        $postTheSame = Post::latest()->approved()->where('category_id', $post->category->id)->where('id', '!=' , $post->id)->take(5)->get(); ;
        

        // Bài viết nổi bật
        $outstanding_posts = Post::approved()->where('category_id', '!=',  $category_unclassified->id )->take(5)->get();
        
        // Tăng lượt xem khi xem bài viết
        $post->views =  ($post->views) + 1;
        $post->save();

        return view('post', [ 
            'post' => $post,
            'recent_posts' => $recent_posts,
            'categories' => $categories, 
            'tags' => $tags,
            'posts_new' => $posts_new,
            'postTheSame' =>  $postTheSame, // Bài viết tương tự
            'outstanding_posts' => $outstanding_posts, // bài viết xu hướng
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

    public function addCommentUser(){
        $data = array();
        $data['success'] = 0;
        $data['errors'] = [];

        $rules = [
            'the_comment' => 'required|min:5|max:300',
            'post_title' => 'required',
        ];

        $validated = Validator::make( request()->all(), $rules);

        if($validated->fails()){
            $data['errors'] = $validated->errors()->first('the_comment');
      
            $data['message'] = "Khổng thể bình luận";

        }else{
            $attributes = $validated->validated();
            $post = Post::where('title', $attributes['post_title'])->first();

            $comment['the_comment'] = $attributes['the_comment']; 
            $comment['post_id'] = $post->id ; 
            $comment['user_id'] = auth()->id();

            $post->comments()->create($comment);

            $data['success'] = 1;
            $data['message'] = "Bạn đã bình luận thành công !";
            $data['result'] = $comment;
        }
  
        return response()->json($data);
    }

    

   
}
