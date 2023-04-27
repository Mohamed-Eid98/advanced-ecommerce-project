<?php

namespace App\Http\Controllers\Backend;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    public function BrandView()
    {
        $brands = Brand::latest()->get();
        return view('backend.brands.brand_view' , compact('brands'));
    }
    public function BrandStore(BrandRequest $request)
    {
        $image = $request->file('brand_img');
        $imageName = hexdec(uniqid()). '.' . $image->getClientOriginalName();
        Image::make($image)->resize(300,300)->save('uploads/brand/' .$imageName);
        $save_url = 'uploads/brand/' .$imageName;

    Brand::insert([
        'brand_name_en' => $request->brand_eng,
        'brand_name_ar' => $request->brand_ar,
        'brand_slug_en' => strtolower(str_replace('' , '-', $request->brand_eng)),
        'brand_slug_ar' => strtolower(str_replace('' , '-', $request->brand_ar)),
        'brand_image' => $save_url,
    ]);
    $notification = array(
        'message' => "Brand has added successfully",
        'alert-type' => "success",
    );

    return redirect()->back()->with($notification);
}

    public function BrandEdit($id)
    {
        $brand = Brand::find($id);
        return view('backend.brands.brand_edit' , compact('brand'));
    }
    public function BrandUpdate(Request $request)
    {
        $id  = $request->id;
        $old_image  = $request->image;

        $notification = array(
            'message' => "Brand has updated successfully",
            'alert-type' => "info",
        );

        $brand = Brand::find($id);
        if( $request->brand_img ){
            unlink($old_image);
            $image = $request->file('brand_img');
            $imageName = hexdec(uniqid()). '.' . $image->getClientOriginalName();
            Image::make($image)->resize(300,300)->save('uploads/brand/' .$imageName);
            $save_url = 'uploads/brand/' .$imageName;

            Brand::findOrFail($id)->update([
                'brand_name_en' => $request->brand_eng,
                'brand_name_ar' => $request->brand_ar,
                'brand_slug_en' => strtolower(str_replace('' , '-', $request->brand_eng)),
                'brand_slug_ar' => strtolower(str_replace('' , '-', $request->brand_ar)),
                'brand_image' => $save_url,
            ]);
            return redirect()->route('brand.all')->with($notification);
        }else{
            Brand::findOrFail($id)->update([
                'brand_name_en' => $request->brand_eng,
                'brand_name_ar' => $request->brand_ar,
                'brand_slug_en' => strtolower(str_replace('' , '-', $request->brand_eng)),
                'brand_slug_ar' => strtolower(str_replace('' , '-', $request->brand_ar)),
            ]);
            return redirect()->route('brand.all')->with($notification);
        }
    }

    public function BrandDelete($id)
    {
        $brand = Brand::find($id);
        $image = $brand->brand_image;
        unlink($image);
        Brand::find($id)->delete();
        $notification = array(
            'message' => "Brand has deleted successfully",
            'alert-type' => "success",
        );
        return redirect()->back()->with($notification);



    }



}
