<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;

class BlogController extends Controller
{
    public function getAllBlogPost()
    {
        $posts = Post::with('user', 'category')->orderBy('id', 'desc')->get();
        return response()->json([
            'posts' => $posts
        ], 200);
    }

    public function getPostById($id)
    {
        $post = Post::with('user', 'category')->where('id', $id)->first();
        return response()->json([
            'post' => $post
        ], 200);
    }

    public function getAllCategory()
    {
        $categories = Category::all();
        return response()->json([
            'categories' => $categories
        ], 200);
    }

    public function getAllPostByCatId($id)
    {
        $posts = Post::with('user', 'category')->where('cat_id', $id)->orderBy('id', 'desc')->get();
        return response()->json([
            'posts' => $posts
        ], 200);
    }

    public function searchPost()
    {


        $search = \Request::get('s');
        if ($search != null) {
            $posts = Post::with('user', 'category')
                ->where('title', 'LIKE', "%$search%")
                ->orWhere('description', 'LIKE', "%$search%")
                ->get();
            return response()->json([
                'posts' => $posts
            ], 200);
        } else {
            return $this->getAllBlogPost();
        }

    }

    public function latestPost()
    {
        $posts = Post::with('user', 'category')->orderBy('id', 'desc')->get();
        return response()->json([
            'posts' => $posts
        ], 200);
    }

}
