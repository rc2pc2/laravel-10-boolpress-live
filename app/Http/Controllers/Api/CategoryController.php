<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::with('posts')->paginate(20);
        return response()->json($categories);
    }

    public function show(string $id){
        $category = Category::with('posts')->findOrFail($id);
        return response()->json($category);
    }

}
