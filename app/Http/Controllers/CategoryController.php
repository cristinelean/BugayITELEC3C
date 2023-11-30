<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    public function index()
    {
        return view("category");
    }

    public function addCategory(Request $request): RedirectResponse
    {
        // Validate the request...

        $Category = new Category;

        $Category->category_name = $request->name;
        $Category->user_id = $request->id;

        $Category->save();

        return Redirect()->route('category')->with('success','Category added successfully!');
    }
    public function EditCat($id)
    {
        $update = Category::find($id);
        return view('edit', compact('update'));
    }

    public function UpdateCat(Request $request, $id): RedirectResponse
    {
        // Validate the request...
        $updatedCategory = Category::find($id);

        $updatedCategory->category_name = $request->input('name');
        $updatedCategory->user_id = $request->input('id');

        $updatedCategory->save();

        return Redirect()->route('category')->with('success','Category updated successfully!');
    }

    public function RemoveCat($id) {
        Category::find($id)->delete();
        return Redirect()->route('category')->with('success','Category removed successfully!');
    }

    public function RestoreCat($id) {
        Category::withTrashed()->find($id)->restore();
        return Redirect()->route('category')->with('success','Category restored successfully!');
    }

    public function DeleteCat($id) {
        Category::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->route('category')->with('success','Category deleted successfully!');
    }
}

