<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    private $rules = [
        'title' => ['required', 'min:3', 'string', 'max:255'],
        'category_id' => ['exists:categories,id'],
        'tags' => ['exists:tags,id'],
        'post_image' => ['image', 'required'],
        'content' => ['min:20', 'required'],
        'date' => ['date', 'required'],
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $posts = Post::where('user_id', Auth::id())->orderBy('date')->get();
        $posts = Post::orderBy('date', 'DESC')->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Create new post';
        $post = new Post();
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('post', 'pageTitle', 'categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate($this->rules);
        $data['user_id'] = Auth::id();

        if (!isset($data['tags'])){
            $data['tags'] = [];
        }

        $imageSrc = Storage::put('uploads/posts', $data['post_image']);
        $data['post_image'] = $imageSrc;

        $post = Post::create($data);
        $post->tags()->sync($data['tags']);


        return redirect()->route('admin.posts.show', $post)->with('message', $post->title . ' has been created succesfully!')->with('alert-class', 'success');;
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->validate($this->rules);
        // $post->user_id = Auth::id();
        $data['user_id'] = Auth::id();

        if (!isset($data['tags'])){
            $data['tags'] = [];
        }

        $imageSrc = Storage::put('uploads/posts', $data['post_image']);
        $data['post_image'] = $imageSrc;


        $post->update($data);

        return redirect()->route('admin.posts.show', $post)->with('message', $post->title . ' has been updated succesfully!')->with('alert-class', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('message', $post->title . ' has been deleted succesfully!')->with('alert-class', 'danger');
    }

    public function deletedIndex(){
        $posts = Post::onlyTrashed()->get();
        return view('admin.posts.deleted-index', compact('posts'));
    }

    public function deletedShow(string $id){
        $post = Post::withTrashed()->where('id', $id)->first();
        return view('admin.posts.deleted-show', compact('post'));
    }

    public function deletedRestore(string $id){
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->restore();

        return redirect()->route('admin.posts.show', $post);
    }

    public function deletedDestroy(string $id){
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->tags()->detach(); // ? rimuovi tutti i collegamenti con me
        $post->forceDelete();

        return redirect()->route('admin.posts.deleted.index');
    }
}
