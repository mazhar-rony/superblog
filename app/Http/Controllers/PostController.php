<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
   public function details($slug)
   {
        $post = Post::where('slug', $slug)->first();
        //$randomposts = Post::all()->random(3);
        $randomposts = Post::inRandomOrder()->where('is_approved','1')->limit(3)->get();
            
        return view('post', compact('post', 'randomposts'));
   }
}
