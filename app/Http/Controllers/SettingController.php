<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
function Setting(){
    $settings = Setting::all();
    return view('setting.index',compact('settings'));
}

function SettingUpdate(Request $request){
    $validator = Validator::make($request->all(),[
        'about_title' => 'required',
        'history' => 'required',
        'choose' => 'required',
        'testimonial' => 'required',
        'contact_title' => 'required',
        'contact_des' => 'required',
      ]);
      if ($validator->passes()) {
        foreach ($request->except('_token') as $key => $value){
            Setting::where('setting_name',$key)->update([
             'setting_value' => $value
            ]);
         }
      }else{
        return redirect()->route('setting')->withErrors( $validator);

      }
      
      return redirect('setting')->with('setting_message','Profile Update Successfull');
}

}
