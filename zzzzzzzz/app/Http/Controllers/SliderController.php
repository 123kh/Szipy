<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = Slider::all();
       return view('slider', ['slider'=>$slider]);
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
        $slider= new slider;
        $slider->upload_image=$request->get('upload_image');
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


