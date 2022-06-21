<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class AdminPostsController extends Controller
{

    private $rules = [
        'title' => 'required|max:200',
        'slug' => 'required|max:200',
        'excerpt' => 'required|max:300',
        'category_id' => 'required|numeric',
        // 'thumbnail' => 'required|mimes:jpg,png,webp,svg,jpeg|dimensions:max-width:300,max-height:227',
        'body' => 'required',
    ];

    public function index()
    {
        return view('admin_dashboard.posts.index', [
            // 'posts' => Post::with('category')->get(),
            'posts' => Post::with('category')->orderBy('id','ASC')->paginate(20),
        ]);
    }

    public function create()
    {
        return view('admin_dashboard.posts.create',[
            'categories' => Category::pluck('name', 'id')
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->rules);
        $validated['user_id'] = auth()->id();
        $post = Post::create($validated);

        if($request->has('thumbnail'))
        {
            $thumbnail = $request->file('thumbnail');
            $filename = $thumbnail->getClientOriginalName();
            $file_extension = $thumbnail->getClientOriginalExtension();
            $path   = $thumbnail->store('images', 'public');
            
            $post->image()->create([
                'name' => $filename,
                'extension' => $file_extension,
                'path' => $path
            ]);
        }

        $tags = explode(',', $request->input('tags'));
        $tags_ids = [];
        foreach ($tags as $tag) {
            $tag_ob = Tag::create(['name'=> trim($tag)]);
            $tags_ids[]  = $tag_ob->id;
        }

        if (count($tags_ids) > 0)
            $post->tags()->sync( $tags_ids ); 
        
        // $tags = explode(',', $request->input('tags'));
        // $tags_ids = [];
        // foreach ($tags as $tag) {

        //     $tag_exits = $post->tags()->where('name', trim($tag))->count();
        //     if( $tag_exits == 0){
        //         $tag_ob = Tag::create(['name'=> $tag]);
        //         $tags_ids[]  = $tag_ob->id;
        //     }
            
        // }

        // if (count($tags_ids) > 0)
        //     $post->tags()->syncWithoutDetaching( $tags_ids );

        return redirect()->route('admin.posts.create')->with('success', 'Thêm bài viết thành công.');
    }

    public function show($id)
    {
        //
    }


    public function edit(Post $post){
        $tags = '';
        foreach($post->tags as $key => $tag){
            $tags .= $tag->name;
            if($key !== count($post->tags) - 1)
                $tags .= ', ';
        }
        
        return view('admin_dashboard.posts.edit',[
            'post' => $post,
            'tags' => $tags,
            'categories' => Category::pluck('name', 'id')
        ]);
    }


    public function update(Request $request, Post $post)
    {
        $this->rules['thumbnail'] = 'nullable|file||mimes:jpg,png,webp,svg,jpeg|dimensions:max-width:800,max-height:300';
        $validated = $request->validate($this->rules);
        $validated['approved'] = $request->input('approved') !== null; 
        $post->update($validated);

        if($request->has('thumbnail'))
        {
            $thumbnail = $request->file('thumbnail');
            $filename = $thumbnail->getClientOriginalName();
            $file_extension = $thumbnail->getClientOriginalExtension();
            $path   = $thumbnail->store('images', 'public');
            
            $post->image()->update([
                'name' => $filename,
                'extension' => $file_extension,
                'path' => $path
            ]);
        }

        $tags = explode(',', $request->input('tags'));
        $tags_ids = [];
        foreach ($tags as $tag) {

            $tag_exits = $post->tags()->where('name', trim($tag))->count();
            if( $tag_exits == 0){
                $tag_ob = Tag::create(['name'=> $tag]);
                $tags_ids[]  = $tag_ob->id;
            }
            
        }

        if (count($tags_ids) > 0)
            $post->tags()->syncWithoutDetaching( $tags_ids ); 

        return redirect()->route('admin.posts.edit', $post)->with('success', 'Sửa viết thành công.');
    }

    public function destroy(Post $post)
    {
        $post->tags()->delete();
        $post->comments()->delete();
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success','Xóa bài viết thành công.');
    }


    // Hàm tạo slug tự động
    public function to_slug(Request $request) {
        $str = $request->title;
        $data['success'] = 1;
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
        $data['message'] =  $str;
        return response()->json($data);
    }

    


}
