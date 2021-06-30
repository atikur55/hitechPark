<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CountryContact;
use Carbon\Carbon;

class CountryContactController extends Controller
{
    public function create_country_contact()
    {
    	return view('admin.country_contact.create');
    }
    public function country_contact_post(Request $request)
    {
    	$request->validate([
    		'title' => 'required',
    		'country_one' => 'required',
    		'country_two' => 'required',
    		'country_three' => 'required',
    		'country_four' => 'required',
    	]);

    	CountryContact::insert([
    		'title' => $request->title,
    		'country_one' => $request->country_one,
    		'country_two' => $request->country_two,
    		'country_three' => $request->country_three,
    		'country_four' => $request->country_four,
    		'created_at' => Carbon::now(),
    	]);
        return back()->with('success','Country Contact Create Successfully');
    }
    public function view_create_country()
    {
    	$all_countries = CountryContact::orderBy('id','desc')->get();
    	return view('admin.country_contact.view',compact('all_countries'));
    }
}
