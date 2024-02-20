<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index(){
        // ? EAGER LOADING con il nome del metodo presente all'interno del model
        $posts = Post::with('user', 'category', 'tags','socialNetworks')->paginate(20);
        return response()->json(
            [
                "success" => true,
                "results" => $posts
            ]);
    }

    public function show(Post $post){
        return response()->json([
            "success" => true,
            "results" => $post
        ]);
    }

    public function search(Request $request){
        $data = $request->all();

        if ( isset($data['title'])){
            $stringa = $data['title'];
            $posts = Post::where('title', 'LIKE', "%{$stringa}%")->get();
        } elseif ( is_null($data['title'])) {
            $posts = Post::all();
        } else {
            abort(404);
        }

        return response()->json([
            "success" => true,
            "results" => $posts,
            "matches" => count($posts)
        ]);
    }
}
