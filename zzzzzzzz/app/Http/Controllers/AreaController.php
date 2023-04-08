<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Area;
use App\Models\City;
class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $area =Area::
        join ('city11','city11.id','=','areas.Select_City_id')
        ->orderby('areas.id','desc')
        ->select('areas.*','city11.city')
        ->get();
     // $restrovendors= Restrovendor::orderby('Restro_Name','asc')->get(["Restro_Name","id"]);
 
        $city = City::all();
 
        return view('area', ['city'=>$city,'area'=>$area]);
       
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
        $area= new area;
        $area->Select_City_id=$request->get('select_city');
        $area->Area=$request->get('area');
        $area->save(); 
        return redirect(route('area'));
    }

 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(area $area,$id)
    {
        $area = area::find($id); 
        $area = Area::all();
        return view('editarea',['area'=>$area,'area'=>$area]);
       
        
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
        area::where('id',$request->id)->update([ 'area'=>$request->area,]);

      return redirect()->route('area')->with(['success'=>true,'message'=>'Successfully Updated !']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(area $area,$id)
    {
        $area=area::where('id',$id)->delete();
        return redirect(route('area'));
    }
}


