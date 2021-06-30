<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enquiry;
use Carbon\Carbon;
use Nexmo\Laravel\Facade\Nexmo;
use App\Mail\UploadsFile;
use Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Mail;
use Auth;
use PDF;

class ClientEnquiryController extends Controller
{
    public function create()
    {
    	return view('client.enquiry');
    }
    public function sent_enquiry(Request $request)
    {
    	$request->validate([
    		'name' => 'required',
    		// 'website' => 'required',
    		// 'company' => 'required',
    		'email' => 'required|email',
    		'phone' => 'required|regex:/(01)[0-9]{9}/',
    		// 'notes' => 'required',
    		// 'address' => 'required',
    		'date' => 'required',
    		'priority' => 'required',
            
    	]);
    	
    //     $uploaded_mp3 = $request->file('file');
    //     $new_uploaded_mp3_name = time().rand().'.'.$uploaded_mp3->getClientOriginalExtension();
    //     $new_uploaded_mp3_location = base_path('public/uploads/mp3/');
    //     $uploaded_mp3->move($new_uploaded_mp3_location,$new_uploaded_mp3_name);

    // 	Enquiry::insert([
    // 		'name' => $request->name,
    // 		'website' => $request->website,
    // 		'company' => $request->company,
    // 		'email' => $request->email,
    // 		'phone' => $request->phone,
    // 		'notes' => $request->notes,
    // 		'address' => $request->address,
    // 		'date' => $request->date,
    //         'priority' => $request->priority,
    // 		'file' => $new_uploaded_mp3_name,
    // 		'created_at' => Carbon::now(),
    // 	]);
    
        if(empty($request->file))
        {
            Enquiry::insert([
                'name' => $request->name,
                'website' => $request->website,
                'company' => $request->company,
                'email' => $request->email,
                'phone' => $request->phone,
                'notes' => $request->notes,
                'address' => $request->address,
                'date' => $request->date,
                'priority' => $request->priority,
                // 'file' => $new_uploaded_mp3_name,
                'created_at' => Carbon::now(),
            ]);
        }
        else
        {
        $uploaded_mp3 = $request->file('file');
        $new_uploaded_mp3_name = time().rand().'.'.$uploaded_mp3->getClientOriginalExtension();
        $new_uploaded_mp3_location = base_path('public/uploads/mp3/');
        $uploaded_mp3->move($new_uploaded_mp3_location,$new_uploaded_mp3_name);

        Enquiry::insert([
            'name' => $request->name,
            'website' => $request->website,
            'company' => $request->company,
            'email' => $request->email,
            'phone' => $request->phone,
            'notes' => $request->notes,
            'address' => $request->address,
            'date' => $request->date,
            'priority' => $request->priority,
            'file' => $new_uploaded_mp3_name,
            'created_at' => Carbon::now(),
        ]);
        }

        Mail::to($request->email)->send(new UploadsFile);

        // Sent SMS
        if ($request->priority == 'High') {
            //     $nexmo = app('Nexmo\Client');
            //     $nexmo->message()->send([
            //     'to'   => '01760012664',
            //     'from' => $request->phone,
            //     'text' => 'SMS Sent Successfully',
            // ]);
            $basic  = new \Nexmo\Client\Credentials\Basic('0f5ebe38', 'odsPS0RnDdw37DkG');
            $client = new \Nexmo\Client($basic);

            $message = $client->message()->send([
                'to' => '8801712881721',
                'from' => $request->phone,
                'text' => 'I am highly interest to work with you.',
            ]);
        }

        
        // End SMS
    	return back()->with('success','Your Information Send Successfully');
    }
    public function view_enquiry()
    {
    	$enquiries = Enquiry::orderBy('id','desc')->get();
    	return view('client.view',compact('enquiries'));
    }
    public function delete_enquiry($enquiry_id)
    {
        Enquiry::find($enquiry_id)->delete();
        return back()->with('delete','Enquiry Data Delete Successfully');
    }
}
