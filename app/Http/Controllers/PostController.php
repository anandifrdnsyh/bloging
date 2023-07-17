<?php

namespace App\Http\Controllers;
use App\Category;
use App\Post;
use Session;
use App\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('admin.posts.index')->with('posts', Post::all());
        // $post = Post::all();
        // $data = $post->toArray();

        // $response = [
        //     'success' => true,
        //     'data' => $data,
        //     'message' => 'Books retrieved successfully.'
        // ];

        // return response()->json($response, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $tag = Tag::all();
        $categories = Category::all();

        if($categories->count() == 0 ||  $tag->count() == 0)
        {
            // Create Seesion
            Session::flash('info', ' you must have some categories before attempting to create a post');
            return redirect()->back();
        }

        return view('admin.posts.create')->with('categories', $categories)
                                                            ->with('tags', Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
         $this->validate($request, [
            'title' => 'required',
            'featured' => 'required|image',
            'content' => 'required',
            'category_id'=>'required',
            'tags'=> 'required'
            ]);
            //Cara Menyimpan foto
            $featured = $request ->featured;
            $featured_new_name = time().$featured->getClientOriginalName();
            $featured->move('uploads/posts', $featured_new_name);

            $post =  Post::create([
               'title' => $request->title,
                'content' => $request->content,
                'featured' => 'uploads/posts/' . $featured_new_name,
                'category_id' => $request->category_id,
                'slug' => str_slug($request->title)

            ]);
            // hanya bisa insert ke pivote table Many to Many  attach
            $post->tags()->attach($request->tags);

            Session::flash('success', 'Post Created succesfully');
            return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        // dd($post->tag);
        return view('admin.posts.edit')->with('post', $post)
                                                        ->with('categories', Category::all())
                                                        ->with('tags', Tag::all());
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            // 'featured' => 'required|image',
            'content' => 'required',
            'category_id' => 'required'
        ]);

        $post = Post::find($id);

        if($request->hasFile('featured'))
        {
            $featured = $request->featured;

            $featured_new_name = time() . $featured->getClientOriginalName();

            $featured->move('uploads/posts', $featured_new_name);

            $post->featured = 'uploads/posts' .$featured_new_name;

        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        //sync adalah ?
        $post->tags()->sync($request->tags);

        $post->save();

        return redirect()->route('post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post -> delete();
        Session::flash('success', 'Post Created succesfully');
        return redirect()->back();

    }

    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();
        return view('admin.posts.trashed')->with('posts', $posts);
    }

    public function kill($id)
    {
       $post = Post::withTrashed()->where('id', $id)->first();

       $post->forceDelete();

        return redirect()->back();
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        $post -> restore();
        return redirect()->route('post');
    }

}
