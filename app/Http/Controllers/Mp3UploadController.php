<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;

class Mp3UploadController extends Controller
{
    public function mp3upload()
    {
    	return view('client.upload');
    }
    public function upload_post(Request $request)
    {
    	// $uploaded_voice_mp3 = $request->file('voice_mp3');
     //    $new_voice_mp3_name = time().rand().'.'.$uploaded_voice_mp3->extension();
     //    // echo $new_voice_mp3_name;die();
     //    $new_voice_mp3_location = base_path('public/uploads/mp3/'.$new_voice_mp3_name);

     //    // Image::make($uploaded_voice_mp3)save($new_banner_photo_location);

     //    // Voice::find($)->update([
     //    //   'image' => $new_banner_photo_name,
     //    // ]);

        // if($request->hasFile('file')){
        //     $uniqueid=uniqid();
        //     $original_name=$request->file('voice_mp3')->getClientOriginalName();
        //     $size=$request->file('voice_mp3')->getSize();
        //     $extension=$request->file('voice_mp3')->getClientOriginalExtension();
        //     $name=Carbon::now()->format('Ymd').'_'.$uniqueid.'.'.$extension;
        //     $imagepath=url('/storage/uploads/files/'.$name);
        //     $path=$request->file('voice_mp3')->storeAs('public/uploads/files/',$name);  
        //    }
        
        // return back()->with('success','Banner Create Successfully');
    }
}
