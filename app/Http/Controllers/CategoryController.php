<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller

{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addCategory(Request $request)
    {

        $this->validate($request, [
            'cat_name' => 'required|min:2|max:50'
        ]);
        $category = New Category();
        $category->cat_name = $request->cat_name;
//        $category->save();
        return ['message' => 'OK'];
    }

    public function allCategory()
    {
        $categories = Category::all();
        return response()->json([
            'categories' => $categories
        ], 200);
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
    }

    public function editCategory($id)
    {
        $category = Category::find($id);
        return response()->json([
            'category' => $category
        ], 200);
    }

    public function updateCategory(Request $request, $id)
    {
        $this->validate($request, [
            'cat_name' => 'required|min:2|max:50'
        ]);
        $category = Category::find($id);
        $category->cat_name = $request->cat_name;
        $category->save();
    }

    public function selectedCategory($ids)
    {
        $all_id = explode(',', $ids);
        foreach ($all_id as $id) {
            $category = Category::find($id);
            $category->delete();
        }
    }
}
