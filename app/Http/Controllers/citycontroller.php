<?php

namespace App\Http\Controllers;

use  App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class citycontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $city = City::all();
       return view('city', ['city'=>$city]);
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
        $city= new city;
        $city->city=$request->get('city');
        $city->save(); 
        return redirect(route('city'));
    }

 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(city $city,$id)
    {
        $cityedit = City::find($id); 
        $city = City::all();
        return view('editcity',['citys'=>$cityedit,'city'=>$city]);
       
        
    }
   
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        city::where('id',$request->id)->update([ 'city'=>$request->city]);

      return redirect()->route('city')->with(['success'=>true,'message'=>'Successfully Updated !']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(city $city,$id)
    {
        $city=city::where('id',$id)->delete();
        return redirect(route('city'));
    }
}
