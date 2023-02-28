<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    protected $validationRules = [
            'title' => ['required'],
            'slug' => [],
            'content' => 'required'
        ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('post_date', 'DESC')->paginate(15);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create', ['post' => new Post()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->validationRules);

        $data['author'] = Auth::user()->name;
        $data['slug'] = Str::slug($data['title']);
        $data['post_date'] = now()->format('Y-m-d H-i-s');
        $newPost = new Post();
        $newPost->fill($data);
        $newPost->save();

        return redirect()->route('admin.posts.index')->with('message','Post $newPost->title has benn created succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $nextPost = Post::where('post_date', '<', $post->post_date)->orderBy('post_date', 'DESC')->first();
        $previousPost = Post::where('post_date', '>', $post->post_date)->orderBy('post_date')->first();
        return view('admin.posts.show', compact('post', 'previousPost', 'nextPost'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        array_push($this->validationRules['title'],['slug'], Rule::unique('posts')->ignore($post->id));
        $data = $request->validate($this->validationRules);
        $data['slug'] = Str::slug($data['title']);
        $data['post_date'] = now()->format('Y-m-d H-i-s');
        $post->update($data);
        return redirect()->route('admin.posts.show', compact('post'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('message', "Post \"$post->title\" has been deleted sucesfully");
    }
}
