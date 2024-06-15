<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Banner;
use Carbon\Carbon;
use Image;
class BannerController extends Controller
{
public function __construct()
{
    $this->middleware('auth');
    $this->middleware('checkadmin');
}
//=======================================Banner Page View Start========================================>
function bannerPage(){
    $banners = Banner::latest()->paginate(5);
    return view('banner.banner',compact('banners'));
}
//=======================================Banner Page View End========================================>

//=======================================Banner Page Data Insert Start========================================>
function bannerInsert(Request $request){
    $request->validate([
        'title_one'=>'required',     
        'title_two'=>'required',     
        'sub_title'=>'required',
        'banner_photo'=>'required',
    ]);

    $random_photo_name = Str::random(10).time().".".$request->banner_photo->getClientOriginalExtension();
    $banner_photo = $request->file('banner_photo');
    Image::make($banner_photo)->resize(1920, 900)->save(base_path('public/uplods/banner_photo/').$random_photo_name);

    Banner::insert($request->except('_token','banner_photo')+[
        'banner_photo' =>$random_photo_name,
        'created_at' => Carbon::now(),   
    ]);
    return response()->json('File Update Successfull');
}
//=======================================Banner Page Data Insert End========================================>

//=======================================Banner Page Update Start========================================>
function bannerUpdate(Request $request){
    $request->validate([
        'title_one'=>'required',     
        'title_two'=>'required',     
        'sub_title'=>'required',
    ]);


    if ($request->hasFile('banner_new_photo')){
        //Delete Old Photo Start
        $old_photo_path = base_path('public/uplods/banner_photo/').Banner::find($request->id)->banner_photo;
        unlink($old_photo_path);
        
        //Upload New Photo Start-------------------------------------->
        $random_photo_name = Str::random(10).time().".".$request->banner_new_photo->getClientOriginalExtension();
        $banner_photo = $request->file('banner_new_photo');
        Image::make($banner_photo)->resize(1920, 900)->save(base_path('public/uplods/banner_photo/').$random_photo_name);
        //Upload New Photo End-------------------------------------->
        Banner::where('id',$request->id)->update([
            'title_one' =>$request->title_one,
            'title_two' =>$request->title_two,
            'sub_title' =>$request->sub_title,
            'banner_photo' =>$random_photo_name,
        ]);
       }
       Banner::where('id',$request->id)->update([
        'title_one' =>$request->title_one,
        'title_two' =>$request->title_two,
        'sub_title' =>$request->sub_title,
   ]);
      

      return response()->json('File Update Successfull');
}
//=======================================Banner Page Update End========================================>

//=======================================Banner Page Item Delete Start========================================>
function bannerDelete(Request $request){
    if (Banner::where('id',$request->banner_id)->exists()){
      $old_photo_path = base_path('public/uplods/banner_photo/').Banner::find($request->banner_id)->banner_photo;
      unlink($old_photo_path);
      Banner::find($request->banner_id)->delete();
    }

    return response()->json([
        'status' => 'success',
    ]);
}
//=======================================Banner Page Item Delete End========================================>

//=======================================Banner Page Pagination Start========================================>
function bannerPagination(Request $request){
    $banners = Banner::latest()->paginate(5);
    return view('pagination/banner',compact('banners'))->render();
  
}
//=======================================Banner Page Pagination End========================================>

//======================================= bannerSearch Start========================================>
function bannerSearch(Request $request){
    $banners = Banner::where('title_one','like','%'.$request->search_string.'%')
    ->orWhere('title_two','like','%'.$request->search_string.'%')
     ->orderBy('id','desc')
     ->paginate(5);
     if($banners->count() >= 1){
         return view('pagination/banner',compact('banners'))->render();
     }else{
        return response()->json([
            'status' => 'nothing_found'
       ]);
     }
}
//======================================= bannerSearch End========================================>

//=======================================Banner Page View Start========================================>
//=======================================Banner Page View End========================================>


}
