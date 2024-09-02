<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all categories from the database
        $categories = Category::all();
        return view('dashboard/category/indexCategory', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Show the form for creating a new category
        return view('dashboard/category/createCategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Create a new category
        Category::create([
            'name' => $request->name,
        ]);

        // Redirect to the categories index page
        return redirect()->route('allCategories')->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        // Show details of a specific category
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category , string $id)
    {
        $category = Category::find($id);
        return view('dashboard/category/editCategories', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

       $category = Category::find($id);
        $category->update([
            'name' => $request->name,
        ]);

        // Redirect to the categories index page
        return redirect()->route('allCategories')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category ,string $id)
    {
        $category= Category::find($id);
        $category->delete();

        // Redirect to the categories index page
        return redirect()->route('allCategories')->with('success', 'Category deleted successfully.');
    }
}
