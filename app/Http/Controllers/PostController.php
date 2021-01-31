<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function index()
    {
        //$posts = Post::where('is_approved','1')->where('status','1')->paginate(12);

        // local scope defined in Post Model
        $posts = Post::latest()->approved()->published()->paginate(12);

        return view('posts', compact('posts'));
    }

    public function details($slug)
    {
            $post = Post::where('slug', $slug)->approved()->published()->first();
            //$randomposts = Post::all()->random(3);
            //$randomposts = Post::inRandomOrder()->where('is_approved','1')->where('status','1')->limit(3)->get();

            $randomposts = Post::approved()->published()->take(3)->inRandomOrder()->get();

            $blogKey = 'blog_'. $post->id;

            if(!Session::has($blogKey))
            {
                $post->increment('view_count');
                Session::put($blogKey, 1);
            }
                
            return view('post', compact('post', 'randomposts'));
    }

    public function postByCategory($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $posts = $category->posts()->approved()->published()->get();

        return view('category_posts', compact('category', 'posts'));
    }

    public function postByTag($slug)
    {
        $tag = Tag::where('slug', $slug)->first();
        $posts = $tag->posts()->approved()->published()->get();

        return view('tag_posts', compact('tag', 'posts'));
    }
}
