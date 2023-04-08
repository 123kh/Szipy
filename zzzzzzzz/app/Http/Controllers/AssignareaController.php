<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AssignareaController;
use App\Models\Assignarea;
use App\Models\City;
use App\Models\Area;
use App\Models\Restrovendor;

class AssignareaController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assignarea =Assignarea::
        join ('city11','city11.id','=','assignareas.City_id')
        ->join ('areas','areas.id','=','assignareas.Area_id')
        ->join ('restrovendor','restrovendor.id','=','assignareas.Select_Vendor_id')
        ->orderby('assignareas.id','desc')
        ->select('assignareas.*','city11.city','assignareas.*','areas.Area','assignareas.*','restrovendor.Restro_Name')
        ->get();
     // $restrovendors= Restrovendor::orderby('Restro_Name','asc')->get(["Restro_Name","id"]);
 
        $city = City::all();
        $area = Area::all();
        $restrovendor = Restrovendor::all();
        return view('assign_area', ['citys'=>$city,'assignareas'=>$assignarea,'areas'=>$area,'restrovendors'=>$restrovendor]);
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
        $assignarea= new assignarea;
        $assignarea->Select_Vendor_id=$request->get('select_vendor_id');
        $assignarea->City_id=$request->get('city_id');
        $assignarea->Area_id=$request->get('area_id');
        $assignarea->save(); 
        return redirect(route('assignarea'));
    }

 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit(city $city,$id)
    // {
    //     $city = city::find($id); 
    //     $city = city::all();
    //     return view('editcity',['city'=>$city,'city'=>$city]);
       
        
    // }
   
   
    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
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
    public function destroy(assignarea $assignarea,$id)
    {
        $assignarea=assignarea::where('id',$id)->delete();
        return redirect(route('assignarea'));
    }
}




