<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category', ['categories' => Category::get()->toTree()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoryData = $request->validate([
            'name' => 'required|unique:categories',
            'slug' => 'required|unique:categories,slug|alpha_dash',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        Category::create($categoryData);
        flash()->overlay(__('admin/category.created', ['category' => $categoryData['name']]), __('admin/category.great'))->success()->important();

        return redirect('admin/categories');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $categoryData = $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id,
            'slug' => 'required|alpha_dash|unique:categories,slug,' . $category->id,
        ]);

        $category->update($categoryData);
        flash()->overlay(__('admin/category.updated', ['category' => $categoryData['name']]), __('admin/category.great'))->success()->important();

        return redirect('admin/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        flash()->overlay(__('admin/category.deleted', ['category' => $category->name]), __('admin/category.great'))->success()->important();

        return redirect('admin/categories');
    }
}
