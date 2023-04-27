<?php

namespace App\Http\Controllers\backend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function CategoryView()
    {
        $categories = Category::latest()->get();
        return view('backend.categories.category_view' , compact('categories'));
    }
    public function CategoryStore(CategoryRequest $request)
    {

    Category::insert([
        'category_name_en' => $request->category_eng,
        'category_name_ar' => $request->category_ar,
        'category_slug_en' => strtolower(str_replace('' , '-', $request->category_eng)),
        'category_slug_ar' => strtolower(str_replace('' , '-', $request->category_ar)),
        'category_icon' => $request->category_icon,
    ]);
    $notification = array(
        'message' => "Category has added successfully",
        'alert-type' => "success",
    );

    return redirect()->back()->with($notification);
}
public function CategoryEdit($id)
{
    $category = Category::find($id);
    return view('backend.categories.category_edit' , compact('category'));
}
public function CategoryUpdate(Request $request)
{
    $id  = $request->id;

Category::find($id)->update([
    'category_name_en' => $request->category_eng,
    'category_name_ar' => $request->category_ar,
    'category_slug_en' => strtolower(str_replace('' , '-', $request->category_eng)),
    'category_slug_ar' => strtolower(str_replace('' , '-', $request->category_ar)),
    'category_icon' => $request->category_icon,
]);

    $notification = array(
        'message' => "Category has updated successfully",
        'alert-type' => "info",
    );
        return redirect()->route('category.all')->with($notification);

}

public function CategoryDelete($id)
{
    Category::find($id)->delete();
    $notification = array(
        'message' => "Category has deleted successfully",
        'alert-type' => "success",
    );
    return redirect()->back()->with($notification);

}

}
