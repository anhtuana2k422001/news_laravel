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

        // $tags = explode(',', $request->input('tags'));
        // $tags_ids = [];
        // foreach ($tags as $tag) {
        //     $tag_ob = Tag::create(['name'=> trim($tag)]);
        //     $tags_ids[]  = $tag_ob->id;
        // }

        // if (count($tags_ids) > 0)
        //     $post->tags()->sync( $tags_ids ); 
        
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
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success','Xóa bài viết thành công.');
    }
}
