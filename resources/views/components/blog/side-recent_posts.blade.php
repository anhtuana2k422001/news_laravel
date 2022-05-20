@props(['recent_posts'])
<div class="side">
<h3 class="sidebar-heading">Tin nổi bật</h3>
    @foreach($recent_posts as $recent_posts)
        <div class="f-blog">
            <a href="{{ route('posts.show', $recent_posts) }}" class="blog-img" style="background-image: url({{ asset('storage/' .$recent_posts->image->path.'')}});">
            </a>
            <div class="desc">
                <p class="admin"><span>{{ $recent_posts->created_at->diffForHumans()  }}</spann></p>
                <h2>
                    <a href="blog.html">
                        {{\Str::limit($recent_posts->title, 20)}}
                    </a></h2>
                <p>{{ $recent_posts->excerpt }}</p>
            </div>
        </div>
    @endforeach
</div>