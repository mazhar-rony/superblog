<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('is_approved','1')->where('status','1')->paginate(12);

        return view('posts', compact('posts'));
    }

    public function details($slug)
    {
            $post = Post::where('slug', $slug)->first();
            //$randomposts = Post::all()->random(3);
            $randomposts = Post::inRandomOrder()->where('is_approved','1')->where('status','1')->limit(3)->get();

            $blogKey = 'blog_'. $post->id;

            if(!Session::has($blogKey))
            {
                $post->increment('view_count');
                Session::put($blogKey, 1);
            }
                
            return view('post', compact('post', 'randomposts'));
    }
}
