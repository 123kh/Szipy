<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Maincategory;
class SliderController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $slider= Slider::
        join ('maincategory','maincategory.id','=','sliders.Main_Category_id')
        ->select('sliders.*','maincategory.main')
        ->get();
        $maincategorys = Maincategory::all();
        // $slider = Slider::all();
       return view('slider', ['slider'=>$slider,'maincategory'=>$maincategorys]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    //    DB::table('city')->insert([
    //     'city'=> $request->city,
    //    ]);
       
    //    return redirect(route('index'));
    $filename='';
    if($request->hasFile('image')){
        $file= $request->file('image');
        $filename= date('YmdHi').'.'.$file->getClientOriginalExtension();
        $file->move(public_path('restro_img/'), $filename);
    }

    
        $slider= new slider;
        $slider->Main_Category_id=$request->get('main_category');
        $slider->upload_image= $filename;
        $slider->save(); 
        return redirect(route('slider'));

      
    }

 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit(city $city,$id)
    // {
    //     $cityedit = city::find($id); 
    //     $city = city::all();
    //     return view('editcity',['citys'=>$cityedit,'city'=>$city]);
       
        
    // }
   
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request)
    // {
    //     city::where('id',$request->id)->update([ 'city'=>$request->city,]);

    //   return redirect()->route('city')->with(['success'=>true,'message'=>'Successfully Updated !']);
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider,$id)
    {
        $slider=Slider::where('id',$id)->delete();
        return redirect(route('slider'));
    }
}


