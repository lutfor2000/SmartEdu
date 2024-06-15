<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Aboutsummery;
use Carbon\Carbon;

class AboutsummaryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
//==============About Summary Page View Start===================================================>
function aboutSummery(){
    $summarys = Aboutsummery::latest()->get();
    return view('about.summary',compact('summarys'));
}
//==============About Summary Page View End===================================================>

//==============About Summary DataInsert Start===================================================>
function SummeryPost(Request $request){
    $validator = Validator::make($request->all(),[
        'summary_title'=>'required',     
        'summary_description'=>'required',     
        'summary_icon'=>'required',
    ]);

    if ($validator->passes()) {
        Aboutsummery::insert($request->except('_token')+[
            'created_at' => Carbon::now(),
        ]);
        session()->flash('summery_status','Summary Item Add Successfull ');
        return response()->json([
            'status' => true,
            'errors' => []
         ]);

    } else {
        return response()->json([
            'status' => false,
            'errors' => $validator->errors()
         ]);
    }
    
}
//==============About Summary DataInsert End===================================================>

//==============About Summary Update Start===================================================>
function SummeryUpdate(Request $request){
    $validator = Validator::make($request->all(),[
        'summary_title'=>'required',     
        'summary_description'=>'required',     
        'summary_icon'=>'required',
    ]);

    if ($validator->passes()) {
        Aboutsummery::where('id',$request->id)->update($request->except('_token'));

        session()->flash('summery_status','Summary Item Update Successfull ');
        return response()->json([
            'status' => true,
            'errors' => []
         ]);

    } else {
        return response()->json([
            'status' => false,
            'errors' => $validator->errors()
         ]);
    }
}
//==============About Summary Update End===================================================>

//==============About Summary Delete Start===================================================>
function SummeryDelete(Request $request){
    if (Aboutsummery::where('id',$request->summary_id)->exists()){
        Aboutsummery::find($request->summary_id)->delete();
      }
  
      return response()->json([
          'status' => 'success',
      ]);
}
//==============About Summary Delete End===================================================>

//==============About Summary Page View Start===================================================>
//==============About Summary Page View End===================================================>



}
