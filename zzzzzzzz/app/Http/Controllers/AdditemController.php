<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Additem;
use App\Models\Maincategory;
use App\Models\Itemmaster;

class AdditemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $additem =Additem::
        join ('maincategory','maincategory.id','=','additems.Main_Category_id')
        ->join ('itemmaster','itemmaster.id','=','additems.Item_Name_id')
        ->orderby('additems.id','desc')
        ->select('additems.*','maincategory.main','additems.*','itemmaster.Item_Name')
        ->get();


        $main = Maincategory::all();
        $item = Itemmaster::all();
        return view('additem', ['mains'=>$main,'additems'=>$additem,'items'=>$item]);
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
        $additem= new additem;
        $additem->Main_Category_id=$request->get('main_category');
        $additem->Item_Name_id=$request->get('item_name');
        $additem->Item_Rate_Retail=$request->get('item_rate_retail');
        $additem->Item_Rate_Hotel=$request->get('item_rate_hotel'); 
        $additem->Variant=$request->get('variant');
        $additem->Flavour=$request->get('flavour');
        $additem->Item_Image=$request->get('item_image');
        
        $additem->Description=$request->get('description');
        $additem->save(); 
        return redirect(route('additem'));
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
    public function destroy(additem $additem,$id)
    {
        $additem=Additem::where('id',$id)->delete();
        return redirect(route('additem'));
    }
}
 

