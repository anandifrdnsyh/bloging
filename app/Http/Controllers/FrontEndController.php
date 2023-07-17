<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\User;
use App\Tag;

class FrontEndController extends Controller
{
    public function index()
    {
        // $dd = Category::all()->find(1)->posts()->orderBy('created_at', 'desc' )->take(3)->get();
        // dd($dd);
        // dd( Category::find(2));
        return view('index')
                        ->with('categories', Category::take(5)->get())
                        ->with('first_post', Post::orderBy('created_at' , 'desc')->first())
                        ->with('second_post', Post::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first())
                        ->with('thrid_post', Post::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first())
                        ->with('career', Category::find(1))
                        ->with('toturials', Category::find(2));
    }
    public function SinglePost($slug)
    {
        $post = Post::where('slug' , $slug)->first();
        // dd($post);
       $next = Post::where('id', '>', $post->id)->max('id');
       $prev = Post::where('id', '<', $post->id)->max('id');
        // dd($prev);

       $user = User::find(1);

        return view('single')->with('post', $post)
                                        ->with('categories', Category::take(5)->get())
                                        ->with('user', $user)
                                        ->with('next', Post::find($next))
                                        ->with('prev', Post::find($prev))
                                        ->with('tagg', Tag::all());
    }
}
