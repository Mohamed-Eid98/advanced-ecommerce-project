<?php

namespace App\Http\Controllers\backend;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\SubSubCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubSubCategoryRequest;

class SubSubCategoryController extends Controller
{

public function SubSubCategoryView()
{
    $categories = Category::orderBy('category_name_en' , 'ASC')->get();
    $subsubcategories = SubSubCategory::latest()->get();
    return view('backend.categories.subsubcategory_view' , compact('subsubcategories','categories'));
}

public function SubCategoryAjax($id)
{
    $sub_cate = SubCategory::where('category_id' , $id)->orderBy('subcategory_name_en' , 'ASC')->get();
    // dd($sub_cate);
    return response()->json($sub_cate);
}
public function SubSubCategoryAjax($id)
{
    $sub_sub_cate = SubSubCategory::where('subcategory_id' , $id)->orderBy('subsubcategory_name_en' , 'ASC')->get();
    // dd($sub_cate);
    return response()->json($sub_sub_cate);
}

public function SubSubCategoryStore(SubSubCategoryRequest $request)
{

SubSubCategory::insert([
    'category_id' => $request->cate_id,
    'subcategory_id' => $request->subcate_id,
    'subsubcategory_name_en' => $request->subsubcategory_eng,
    'subsubcategory_name_ar' => $request->subsubcategory_ar,
    'subsubcategory_slug_en' => strtolower(str_replace('' , '-', $request->subsubcategory_eng)),
    'subsubcategory_slug_ar' => strtolower(str_replace('' , '-', $request->subsubcategory_ar)),
]);
$notification = array(
    'message' => "SubSubCategory has added successfully",
    'alert-type' => "success",
);

return redirect()->back()->with($notification);
}

public function SubSubCategoryEdit($id)
{
    $subsubcategory = SubSubCategory::find($id);
    $categories = Category::get();
    $subcategories = SubCategory::get();
    return view('backend.categories.subsubcategory_edit' , compact('subsubcategory','categories', 'subcategories'));
}

public function SubSubCategoryUpdate(Request $request)
{
    $id  = $request->id;

SubSubCategory::find($id)->update([
    'category_id' => $request->cate_id,
    'subcategory_id' => $request->subcate_id,
    'subsubcategory_name_en' => $request->subsubcategory_eng,
    'subsubcategory_name_ar' => $request->subsubcategory_ar,
    'subsubcategory_slug_en' => strtolower(str_replace('' , '-', $request->subsubcategory_eng)),
    'subsubcategory_slug_ar' => strtolower(str_replace('' , '-', $request->subsubcategory_ar)),
]);

    $notification = array(
        'message' => "SubSubCategory has updated successfully",
        'alert-type' => "info",
    );
        return redirect()->route('subsubcategory.all')->with($notification);

}

public function SubSubCategoryDelete($id)
{
    SubSubCategory::find($id)->delete();
    $notification = array(
        'message' => "SubSubCategory has deleted successfully",
        'alert-type' => "success",
    );
    return redirect()->back()->with($notification);

}


}
