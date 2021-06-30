<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enquiry;
use Carbon\Carbon;
use PDF;

class DownloadController extends Controller
{
    public function download_pdf(Request $request)
    {
    	$from_date = $request->from_date;
    	$to_date = $request->to_date;
    	$prioriry = $request->priority;

    	$get_data = Enquiry::whereBetween('date',[$from_date,$to_date])->where('priority',$prioriry)->get();
    // 	dd($get_data);die();
    	// $payrol_all = Payroll::all();
        // $get_logo = AppInfo::where('status',1)->first();
        $enquiry_pdf = PDF::loadView('client.download.enquiry_pdf', $get_data,compact('get_data'));
        $dynamic_name = "Enquiry-List-".'_'.Carbon::now()->format('d-m-Y').".pdf";
        return $enquiry_pdf->download($dynamic_name);

    	// return view('client.filter',compact('get_data'));
    }
    public function download_mp3($id)
    {
        $file = Enquiry::findOrFail($id);
        $download = public_path().'/uploads/mp3/'.$file->file;
        return response()->download($download);
        // echo $download;
        // die();
        // return response()->download(asset($file->file),$file->file);
    }
}
