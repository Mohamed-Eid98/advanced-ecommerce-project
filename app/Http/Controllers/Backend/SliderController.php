<?php

namespace App\Http\Controllers\Backend;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function SliderView()
    {
        $sliders = Slider::latest()->get();
        return view('backend.sliders.slider_view' , compact('sliders'));
    }

    public function SliderStore(Request $request)
    {
        $request->validate([
            'slider_img' => 'required'
        ],
        [
            'slider_img.required' => 'Plz Choose one Image'
        ]);


    	$image = $request->file('slider_img');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(870,370)->save('uploads/slider/'.$name_gen);
    	$save_url = 'uploads/slider/'.$name_gen;

        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'slider_img' => $save_url,
        ]);

	    $notification = array(
			'message' => 'Slider Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
    }

    public function SliderEdit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('backend.sliders.slider_edit' , compact('slider'));
    }

    public function SliderUpdate(Request $request)
    {
        $id = $request->id;
        $old_img = $request->old_image;

        if($request->slider_img){
            unlink($old_img);
            $image = $request->file('slider_img');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(870,370)->save('uploads/slider/'.$name_gen);
            $save_url = 'uploads/slider/'.$name_gen;

            Slider::findOrFail($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'slider_img' => $save_url,
            ]);
        } else{
            Slider::findOrFail($id)->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);
        }

        $notification = array(
			'message' => 'Slider Inserted Successfully',
			'alert-type' => 'info'
		);

		return redirect()->route('slider.mange')->with($notification);
    }

    public function SliderInactive($id)
    {
        Slider::findOrFail($id)->update([ 'status'  => 0]);

        $notification = array(
			'message' => 'Slider updated Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
    }

    public function SliderActive($id)
    {
        Slider::findOrFail($id)->update([ 'status'  => 1]);

        $notification = array(
			'message' => 'Slider updated Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
    }

    public function SliderDelete($id)
    {
        $slider = Slider::findOrFail($id);
        unlink($slider->slider_img);
        Slider::findOrFail($id)->delete();

        $notification = array(
			'message' => 'Slider deleted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    }
}
