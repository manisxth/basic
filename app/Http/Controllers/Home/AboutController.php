<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Image;

class AboutController extends Controller
{
    
  public function AboutPage(){
    
  $aboutpage = About::find(1);


  return view('admin.about_page.about_page_all',compact('aboutpage'));

}

     public function UpdateAbout(Request $request){

        $about_id = $request->id;

        if ($request->file('about_image')) {
            $image = $request->file('about_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg

            Image::make($image)->resize(800,852)->save('upload/aboutpage/'.$name_gen);
            $save_url = 'upload/aboutpage/'.$name_gen;


              About::findOrFail($about_id)->update([

                'title' => $request->title,
                'long_description'=>$request->long_description,
                'about_image'=>$save_url,


              ]);

             $notification = array(

            'message'=>'AboutPage Updated With Image successfully',
            'alert-type'=> 'success'
            );

        return redirect()->back()->with($notification);

       }


else{

  About::findOrFail($about_id)->update([

                'title' => $request->title,
                'long_description'=>$request->long_description,
                


              ]);

              $notification = array(

            'message'=>'AboutPage Updated WithOut Image successfully',
            'alert-type'=> 'success'
            );

        return redirect()->back()->with($notification);

}//end else


 }
public function


}
