<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\MultiImg;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index()
    {
        $categories = Category::with('subcategries')->orderBy('category_name_en' , 'ASC')->get();
        $products = Product::where('status',1)->orderBy('id','DESC')->limit(6)->get();
        $sliders = Slider::where('status', 1)->orderBy('id' , 'DESC')->get();
        $featured_products = Product::where('status',1)->where('featured' , 1)->orderBy('id','DESC')->limit(6)->get();
        $hot_deals = Product::where('status',1)->where('hot_deals' , 1)->where('discount_price', '!=' , NULL)->orderBy('id','DESC')->limit(3)->get();
        $special_offers = Product::where('status',1)->where('special_offer' , 1)->orderBy('id','DESC')->limit(4)->get();

        $category_skip_0 = Category::skip(0)->first();
        $product_skip_0 = Product::where('category_id' , $category_skip_0->id)->limit(6)->get();

        $category_skip_1 = Category::skip(1)->first();
        $product_skip_1 = Product::where('category_id' , $category_skip_1->id)->limit(6)->get();


        return view('frontend.index', compact('categories','sliders','products', 'featured_products', 'hot_deals' , 'special_offers' , 'category_skip_0', 'product_skip_0', 'category_skip_1', 'product_skip_1'));
    }
    public function userProfile()
    {
        $user = User::find(Auth::user()->id);
        return view('frontend.profile.user_profile', compact('user'));
    }
    public function userProfileStore(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if($request->file('photo')){
            $file= $request->file('photo');
            $fileName = date('YmdHi'). $file->getClientOriginalName();
            if($user->profile_photo_path){
                unlink(public_path('uploads/frontend_images/'.$user->profile_photo_path));
            }
            $file->move(public_path('uploads/frontend_images/'),$fileName);
            $user->profile_photo_path = $fileName;
        }
        $user->save();

        $notification = array(
            'message' => "User Profile has updated successfully",
            'alert-type' => "success",
        );

        return redirect()->route('dashboard')->with($notification);
    }

    public function userLogout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    public function userChangePassword()
    {
        $user = User::find(Auth::user()->id);
        return view('frontend.profile.change_password' , compact('user'));
    }
    public function userPasswordStore(Request $request)
    {
        $request->validate([
            'new_password' => 'required|confirmed',
        ]);
        $user = User::find(Auth::user()->id);

        if(Hash::check($request->old_password, $user->password)){
            $user->password = Hash::make($request->new_password);
            $user->save();
            Auth::logout();
            $notification = array(
                'message' => "User Profile has updated successfully",
                'alert-type' => "success",
            );
            return redirect()->route('login')->with($notification);

        }
        else{
            return redirect()->back();
        }
    }

    public function productDetails($id)
    {
        $my_product = Product::find($id);
                // return $product;
        $hot_deals = Product::where('status',1)->where('hot_deals' , 1)->where('discount_price', '!=' , NULL)->orderBy('id','DESC')->limit(3)->get();

        $color_en = $my_product->product_color_en;
        $product_color_en = explode(',' , $color_en);

        $color_ar = $my_product->product_color_ar;
        $product_color_ar = explode(',' , $color_ar);

        $size_en = $my_product->product_size_en;
        $product_size_en = explode(',' , $size_en);

        $size_ar = $my_product->product_size_ar;
        $product_size_ar = explode(',' , $size_ar);


        $multi_images = MultiImg::where('product_id' , $id)->get();

        $related_products = Product::where('status',1)->where('category_id' , $my_product->category_id)->where('id' ,'!=' , $id)->orderBy('id','DESC')->get();
        return view('frontend.product.product_details', compact('my_product', 'hot_deals', 'multi_images', 'product_color_en' ,'product_color_ar' ,
        'product_size_ar', 'product_size_en' , 'related_products'));

    }

	public function TagWiseProduct($tag){
		$products = Product::where('status',1)->where('product_tags_en',$tag)->orWhere('product_tags_ar',$tag)->orderBy('id','DESC')->paginate(3);
        //return $products;
        $categories = Category::orderBy('category_name_en','ASC')->get();
		return view('frontend.tags.tags_view',compact('products', 'categories'));
	}

  // Subcategory wise data
  public function SubCatWiseProduct($subcat_id,$slug){
    $products = Product::where('status',1)->where('subcategory_id',$subcat_id)->orderBy('id','DESC')->paginate(6);
    $categories = Category::orderBy('category_name_en','ASC')->get();
    return view('frontend.product.subcategory_view',compact('products','categories'));

}

// Sub-Subcategory wise data
public function SubSubCatWiseProduct($subsubcat_id,$slug){
    $products = Product::where('status',1)->where('subsubcategory_id',$subsubcat_id)->orderBy('id','DESC')->paginate(6);
    $categories = Category::orderBy('category_name_en','ASC')->get();
    return view('frontend.product.sub_subcategory_view',compact('products','categories'));

}



}
