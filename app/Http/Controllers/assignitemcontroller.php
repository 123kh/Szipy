<?php

namespace App\Http\Controllers;

use App\Models\Additem;
use Illuminate\Http\Request;

use App\Models\Assignitem;
use App\Models\Restrovendor;
use App\Models\Maincategory;
use App\Models\Itemname;

class assignitemcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $assign =Assignitem::
        join ('restrovendor','restrovendor.id','=','assignitem.Restro_Id')
        ->join ('maincategory','maincategory.id','=','assignitem.Main_Category_id')
        ->join('additems','additems.id','=','assignitem.item_name_id')
        ->orderby('assignitem.id','desc')
        ->select('assignitem.*','restrovendor.Restro_Name','assignitem.*','maincategory.main','additems.Item_Name')
        ->get();

        // $assign  =Assignitem::
        // join ('restrovendor','restrovendor.id','=','assignitem.Restro_Id')
        // ->join ('maincategory','maincategory.id','=','assignitem.Main_Category_id')
        // ->join('additems','additems.id','=','assignitem.item_name_id')
        // ->orderby('assignitem.id','desc')
        // ->select('assignitem.*','restrovendor.Restro_Name','assignitem.*','maincategory.main','additems.Item_Name')
        // ->groupby('assignitem.Restro_Id')
        // ->get();
      

        $restrovendor = Restrovendor::all();
        $maincategorys = Maincategory::all();
        $additem= Additem::orderby('Item_Name','asc')->get(["Item_Name","id"]);
        return view('assign_item',['assign'=>$assign,'restro'=>$restrovendor,'maincategory'=>$maincategorys,'additem'=>$additem]);
    }


    public function getitem(Request $request)
    {
        $data= Additem::where("Main_Category_id",$request->main_category_id)
        ->get(["Item_Name","id"]);
     
        return response()->json($data);
       
    }
        

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $request->validate([
            
            'restro_name' => 'required',
            'main_category' => 'required',
            'item_name_id' => 'required'
            ]);

            // if(isset($request->item_name_id) && count($request->item_name_id)>0){
            //     foreach($request->item_name_id as $item)
            //     {
            //         $assign= new Assignitem;
            //         $assign->Restro_Id=$request->get('restro_name');
            //         $assign->Main_Category_id=$request->get('main_category');
            //         $assign->item_name_id=  $item;
            //         $assign->save(); 
            //     }
                
            // }

        $assign= new Assignitem;
        $assign->Restro_Id=$request->get('restro_name');
        $assign->Main_Category_id=$request->get('main_category');
        $assign->item_name_id= $request->item_name_id;
        $assign->save(); 
        return redirect(route('assign'));
       
    }
  /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Assignitem $assign,$id)
    {
        $assign_edit = Assignitem::find($id);
        $assign =Assignitem::
        join ('restrovendor','restrovendor.id','=','assignitem.Restro_Id')
        ->join ('maincategory','maincategory.id','=','assignitem.Main_Category_id')
    
        ->orderby('assignitem.id','desc')
        ->select('assignitem.*','restrovendor.Restro_Name','assignitem.*','maincategory.main')
        ->get();

        $restrovendor = Restrovendor::all();
        $maincategorys = Maincategory::all(); 
        $additem= Additem::orderby('Item_Name','asc')->get(["Item_Name","id"]);
     

        return view('editassignitem',['assign_edit'=>$assign_edit,'assign'=>$assign,'restrovendor'=>$restrovendor,'maincategorys'=>$maincategorys,'additem'=>$additem]);
       
        
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

        $item_name='';
        if($request->old_name && $request->old_name != null){
           
            $item_name=$request->old_name;

        }
        Assignitem::where('id',$request->id)->update([ 
            'Restro_Id'=>$request->restro_name,
            'Main_Category_id'=>$request->main_category,
            'item_name_id'=>$item_name,
           
        ]);

      return redirect(route('assign'))->with(['success'=>true,'message'=>'Successfully Updated !']);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $assign=assignitem::where('id',$id)->delete();
        return redirect(route('assign'));
    }
}
