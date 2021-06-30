<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use Carbon\Carbon;
use Image;

class BannerPartController extends Controller
{
    public function create_banner()
    {
    	return view('admin.banner.create');
    }
    public function banner_post(Request $request)
    {
    	$request->validate([
    		'title' => 'required|string',
    		'button' => 'required|string',
    		'image' => 'required|mimes:jpeg,jpg,png,gif',
    	]);

    	$banner_id = Banner::insertGetId([
    		'title' => $request->title,
    		'button' => $request->button,
    		'created_at' => Carbon::now(),
    	]);

    	$uploaded_banner_photo = $request->file('image');
        $new_banner_photo_name = $banner_id.'.'.$uploaded_banner_photo->extension();
        $new_banner_photo_location = base_path('public/uploads/banner/'.$new_banner_photo_name);
        Image::make($uploaded_banner_photo)->resize(1402,657)->save($new_banner_photo_location);

        Banner::find($banner_id)->update([
          'image' => $new_banner_photo_name,
        ]);
        return back()->with('success','Banner Create Successfully');
    }
    public function view_banner()
    {
    	$all_banner = Banner::orderBy('id','desc')->get();
    	return view('admin.banner.view',compact('all_banner'));
    }
    public function active_banner($banner_id)
    {
    	$banner = Banner::find($banner_id);
    	if ($banner->status == 0) {
    		Banner::find($banner_id)->update([
    			'status' => 1,
    		]);
    	}
    	Banner::where('id','!=',$banner_id)->update([
    		'status' => 0,
    	]);
    	return back();
    }
    public function edit_banner($banner_id)
    {
    	$banner = Banner::find($banner_id);
    	return view('admin.banner.edit',compact('banner'));
    }
    public function edit_banner_post(Request $request)
    {
    	$request->validate([
    		'title' => 'required|string',
    		'button' => 'required|string',
    		'image' => 'mimes:jpeg,jpg,png,gif',
    	]);

    	$get_image = Banner::find($request->id);
        $request->all();
        if ($request->hasFile('image')) {
          if ($get_image->item_image != 'photo.jpg') {
            $delete_location = base_path('public/uploads/banner/'.$get_image->image);
            unlink($delete_location);
          }
        $uploaded_banner_photo = $request->file('image');
        $new_banner_photo_name = $get_image->id.'.'.$uploaded_banner_photo->extension();
        $new_banner_photo_location = base_path('public/uploads/banner/'.$new_banner_photo_name);
        Image::make($uploaded_banner_photo)->resize(1402,657)->save($new_banner_photo_location);
        $get_image->image = $new_banner_photo_name;
        }
        $get_image->title = $request->title;
        $get_image->button = $request->button;
        $get_image->save();
        return back()->with('success','Banner Edit Successfully');
    }
    public function delete_banner($banner_id)
    {
    	Banner::find($banner_id)->delete();
    	return back()->with('delete','Banner Delete Successfully');
    }
}
