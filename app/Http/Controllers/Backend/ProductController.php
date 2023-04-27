<?php

namespace App\Http\Controllers\backend;

use Carbon\Carbon;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\SubSubCategory;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function ProductAdd()
    {
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('backend.products.product_add', compact('categories', 'brands'));
    } // End method

    public function ProductStore(Request $request)
    {

        $image = $request->file('main_thambnail');
        $imageName = hexdec(uniqid()). '.' .$image->getClientOriginalName();
        Image::make($image)->resize(917,1000)->save('uploads/products/thambnail/'.$imageName);
        $save_url = 'uploads/products/thambnail/'.$imageName;


        $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->cate_id,
            'subcategory_id' => $request->subcate_id,
            'subsubcategory_id' => $request->subsubcate_id,
            'product_name_en' => $request->product_eng,
            'product_name_ar' => $request->product_ar,
            'product_slug_en' => strtolower(str_replace(' ', '-', $request->product_eng )),
            'product_slug_ar' => strtolower(str_replace(' ', '-', $request->product_ar )),

            'product_code' => $request->product_code,
            'product_qty' => $request->product_quantity,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_ar' => $request->product_tags_ar,
            'product_size_en' => $request->product_size_en,
            'product_size_ar' => $request->product_size_ar,
            'product_color_en' => $request->product_colors_en,
            'product_color_ar' => $request->product_colors_ar,

            'selling_price' => $request->product_selling_price,
            'discount_price' => $request->product_discount_price,
            'short_descp_en' => $request->short_desc_en,
            'short_descp_ar' => $request->short_desc_ar,
            'long_descp_en' => $request->long_desc_en,
            'long_descp_ar' => $request->long_desc_ar,
            'product_thambnail' =>$save_url,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'status' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);



        ////////////////Multi Image Insert ////////////

        $images = $request->file('multi_img');
        foreach($images as $img){
            $Image_gen = hexdec(uniqid()). '.' .$img->getClientOriginalName();
            Image::make($img)->resize(917,1000)->save('uploads/products/multi-image/'.$Image_gen);
            $photo_name = 'uploads/products/multi-image/'.$Image_gen;

        MultiImg::insert([
            'product_id' => $product_id,
            'photo_name' => $photo_name,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
    }
        $notification = array(
            'message' => "Product has inserted successfully",
            'alert-type' => "success",
        );
        return redirect()->back()->with($notification);

    }

    public function ProductMange()
    {
        $products = product::latest()->get();
        return view('backend.products.product_view' , compact('products'));
    }

    public function ProductEdit($id){

		$categories = Category::latest()->get();
		$brands = Brand::latest()->get();
		$subcategories = SubCategory::latest()->get();
		$subsubcategories = SubSubCategory::latest()->get();
		$product = Product::findOrFail($id);
		$multiImgs = MultiImg::where('product_id',$id)->get();
		return view('backend.products.product_edit',compact('categories','brands','subcategories','subsubcategories','product','multiImgs'));

	}


    public function ProductUpdate(Request $request)
    {
        $id =$request->id;

        Product::findOrFail($id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->cate_id,
            'subcategory_id' => $request->subcate_id,
            'subsubcategory_id' => $request->subsubcate_id,
            'product_name_en' => $request->product_eng,
            'product_name_ar' => $request->product_ar,

            'product_code' => $request->product_code,
            'product_qty' => $request->product_quantity,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_ar' => $request->product_tags_ar,
            'product_size_en' => $request->product_size_en,
            'product_size_ar' => $request->product_size_ar,
            'product_color_en' => $request->product_colors_en,
            'product_color_ar' => $request->product_colors_ar,

            'selling_price' => $request->product_selling_price,
            'discount_price' => $request->product_discount_price,
            'short_descp_en' => $request->short_desc_en,
            'short_descp_ar' => $request->short_desc_ar,
            'long_descp_en' => $request->long_desc_en,
            'long_descp_ar' => $request->long_desc_ar,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'status' => 1,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => "Product has updated successfully",
            'alert-type' => "success",
        );
        return redirect()->route('product.mange')->with($notification);
    }

public function UpdateImages(Request $request)
{
    $imgs = $request->multi_img;

        foreach ($imgs as $id => $img) {
        $imgDel = MultiImg::findOrFail($id);
        unlink($imgDel->photo_name);

        $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(917,1000)->save('uploads/products/multi-image/'.$make_name);
        $uploadPath = 'uploads/products/multi-image/'.$make_name;

        MultiImg::where('id',$id)->update([
            'photo_name' => $uploadPath,
            'updated_at' => Carbon::now(),

        ]);

        } // end foreach

        $notification = array(
            'message' => 'Product Image Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    } // end Method


    public function UpdateThambnail(Request $request)
    {
        $pro_id = $request->id;
 	$oldImage = $request->old_img;
 	unlink($oldImage);

    $image = $request->file('product_thambnail');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(917,1000)->save('uploads/products/thambnail/'.$name_gen);
    	$save_url = 'uploads/products/thambnail/'.$name_gen;

    	Product::findOrFail($pro_id)->update([
    		'product_thambnail' => $save_url,
    		'updated_at' => Carbon::now(),

    	]);

         $notification = array(
			'message' => 'Product Image Thambnail Updated Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);
    }

    public function ProductImageDelete($id)
    {
        $img = MultiImg::find($id)->photo_name;
        unlink($img);
        MultiImg::find($id)->delete();

        $notification = array(
			'message' => 'Product Image Deleted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
    } // end Method


    public function ProductInactive($id)
    {
        Product::findOrFail($id)->update(['status' => 0]);
        $notification = array(
			'message' => 'Product Inactive',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
    } // end Method

    public function ProductActive($id)
    {
        Product::findOrFail($id)->update(['status' => 1]);
        $notification = array(
			'message' => 'Product Active',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
    } // end Method


    public function ProductDelete($id)
    {

        $multi_images = MultiImg::where('product_id',$id)->get();
        foreach ($multi_images as $img) {
            unlink($img->photo_name);
            MultiImg::where('product_id',$id)->delete();
        }

        $product= Product::findOrfail($id);
        unlink($product->product_thambnail);
        Product::findOrfail($id)->delete();

        $notification = array(
			'message' => 'Product Deleted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
    }
}



