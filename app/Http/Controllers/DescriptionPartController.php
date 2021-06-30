<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Description;
use Carbon\Carbon;

class DescriptionPartController extends Controller
{
    public function create_description()
    {
    	return view('admin.description.create');
    }
    public function description_post(Request $request)
    {
    	$request->validate([
    		'heading' => 'required',
    		'short_heading' => 'required',
    		'button' => 'required',
    		'case_head' => 'required',
    		'ca_one_title' => 'required',
    		'ca_one_btn' => 'required',
    		'ca_two_title' => 'required',
    		'ca_two_btn' => 'required',
    	]);

    	Description::insert([
    		'heading' => $request->heading,
    		'short_heading' => $request->short_heading,
    		'button' => $request->button,
    		'case_head' => $request->case_head,
    		'ca_one_title' => $request->ca_one_title,
    		'ca_one_btn' => $request->ca_one_btn,
    		'ca_two_title' => $request->ca_two_title,
    		'ca_two_btn' => $request->ca_two_btn,
    		'created_at' => Carbon::now(),
    	]);
        return back()->with('success','Description Create Successfully');
    }
    public function view_description()
    {
    	$all_description = Description::orderBy('id','desc')->get();
    	return view('admin.description.view',compact('all_description'));
    }
    public function active_description($description_id)
    {
    	$description = Description::find($description_id);
    	if ($description->status == 0) {
    		Description::find($description_id)->update([
    			'status' => 1,
    		]);
    	}
    	Description::where('id','!=',$description_id)->update([
    		'status' => 0,
    	]);
    	return back();
    }
    public function edit_description($description_id)
    {
    	$description = Description::find($description_id);
    	return view('admin.description.edit',compact('description'));
    }
    public function edit_description_post(Request $request)
    {
    	$request->validate([
    		'heading' => 'required',
    		'short_heading' => 'required',
    		'button' => 'required',
    		'case_head' => 'required',
    		'ca_one_title' => 'required',
    		'ca_one_btn' => 'required',
    		'ca_two_title' => 'required',
    		'ca_two_btn' => 'required',
    	]);

    	Description::find($request->id)->update([
    		'heading' => $request->heading,
    		'short_heading' => $request->short_heading,
    		'button' => $request->button,
    		'case_head' => $request->case_head,
    		'ca_one_title' => $request->ca_one_title,
    		'ca_one_btn' => $request->ca_one_btn,
    		'ca_two_title' => $request->ca_two_title,
    		'ca_two_btn' => $request->ca_two_btn,
    		'created_at' => Carbon::now(),
    	]);
        return back()->with('success','Description Update Successfully');
    }
    public function delete_description($description_id)
    {
    	Description::find($description_id)->delete();
    	return back()->with('delete','Description Delete Successfully');
    }
}
