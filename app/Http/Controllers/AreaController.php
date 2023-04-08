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

        $request->validate([
            
                
                'select_city' => 'required',
               
            ]);

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
    public function edit($id)
    {
        $edit_area = Area::find($id); 
        $areac = Area::
        leftjoin ('city11','city11.id','=','areas.Select_City_id')
        ->orderby('areas.id','desc')
        ->select('areas.*','city11.city')
        ->get();

        $city = City::all();
        
        return view('editarea',['edit_area'=>$edit_area,'areac'=>$areac,'city'=>$city]);
       
        
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
        Area::where('id',$request->id)->update([ 
            'Select_City_id'=>$request->select_city,
            'Area'=>$request->area
        ]);

      return redirect(route('area'))->with(['success'=>true,'message'=>'Successfully Updated !']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(area $area,$id)
    {
        $area=Area::where('id',$id)->delete();
        return redirect(route('area'));
    }
}


