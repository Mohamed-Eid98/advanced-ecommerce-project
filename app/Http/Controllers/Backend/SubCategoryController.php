<?php

namespace App\Http\Controllers\backend;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoryRequest;

class SubCategoryController extends Controller
{
    public function SubCategoryView()
    {
        $categories = Category::orderBy('category_name_en' , 'ASC')->get();
        $subcategories = SubCategory::latest()->get();
        return view('backend.categories.subcategory_view' , compact('subcategories','categories'));
    }

    public function SubCategoryStore(SubCategoryRequest $request)
    {

    SubCategory::insert([
        'category_id' => $request->cate_id,
        'subcategory_name_en' => $request->subcategory_eng,
        'subcategory_name_ar' => $request->subcategory_ar,
        'subcategory_slug_en' => strtolower(str_replace('' , '-', $request->subcategory_eng)),
        'subcategory_slug_ar' => strtolower(str_replace('' , '-', $request->subcategory_ar)),
    ]);
    $notification = array(
        'message' => "SubCategory has added successfully",
        'alert-type' => "success",
    );

    return redirect()->back()->with($notification);
}

    public function SubCategoryEdit($id)
    {
        $subcategory = SubCategory::find($id);
        $categories = Category::get();
        return view('backend.categories.subcategory_edit' , compact('subcategory','categories'));
    }

public function SubCategoryUpdate(Request $request)
{
    $id  = $request->id;

SubCategory::find($id)->update([
    'category_id' => $request->cate_id,
    'subcategory_name_en' => $request->subcategory_eng,
    'subcategory_name_ar' => $request->subcategory_ar,
    'subcategory_slug_en' => strtolower(str_replace('' , '-', $request->subcategory_eng)),
    'subcategory_slug_ar' => strtolower(str_replace('' , '-', $request->subcategory_ar)),
]);

    $notification = array(
        'message' => "SubCategory has updated successfully",
        'alert-type' => "info",
    );
        return redirect()->route('subcategory.all')->with($notification);

}

public function SubCategoryDelete($id)
{
    SubCategory::find($id)->delete();
    $notification = array(
        'message' => "SubCategory has deleted successfully",
        'alert-type' => "success",
    );
    return redirect()->back()->with($notification);

}




}
