<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Additem;
use App\Models\Maincategory;
use App\Models\Assignitem;
use App\Models\Restrovendor;

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
        join ('restrovendor','restrovendor.id','=','additems.Restro_Id')
        ->join ('maincategory','maincategory.id','=','additems.Main_Category_id')
        // ->join ('itemmaster','itemmaster.id','=','additems.Item_Name_id')
        ->orderby('additems.id','desc')
        ->select('additems.*','maincategory.main','restrovendor.Restro_Name')//,'additems.*','itemmaster.Item_Name'
        ->get();

        $restrovendor = Restrovendor::all();
        $main = Maincategory::all();
        $item = Assignitem::all();
        return view('additem', ['mains'=>$main,'additems'=>$additem,'items'=>$item ,'restro'=>$restrovendor]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $filename='';
        if($request->hasFile('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').'.'.$file->getClientOriginalExtension();
            $file->move(public_path('restro_img/'), $filename);
        }


        $request->validate([
           
            'main_category' => 'required',
            'restro_name' => 'required'

        ]);

    //    DB::table('city')->insert([
    //     'city'=> $request->city,
    //    ]);
       
    //    return redirect(route('index'));
        $additem= new additem;
        $additem->Restro_Id=$request->get('restro_name');
        $additem->Main_Category_id=$request->get('main_category');
        $additem->Item_Name=$request->get('item_name');
        $additem->Item_Rate_Retail=$request->get('item_rate');
        // $additem->Item_Rate_Hotel=$request->get('item_rate_hotel'); 
        $additem->Variant=$request->get('variant');
        $additem->Flavour=$request->get('flavour');
        $additem->Item_Image =  $filename;
        
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
    public function edit(Additem $additem,$id)
    {
        $edit_additem = Additem::find($id); 
        $additem =Additem::
        join ('restrovendor','restrovendor.id','=','additems.Restro_Id')
        ->join ('maincategory','maincategory.id','=','additems.Main_Category_id')
        // ->join ('itemmaster','itemmaster.id','=','additems.Item_Name_id')
        ->orderby('additems.id','desc')
        ->select('additems.*','maincategory.main')//,'additems.*','itemmaster.Item_Name'
        ->get();

        $restrovendor = Restrovendor::all();
        $main = Maincategory::all();
        $item = Assignitem::all();
        return view('editadditem',['edit_additem'=>$edit_additem,'additem'=>$additem,'mains'=>$main,'item' => $item,'restrovendor'=>$restrovendor]);
       
        
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


        $filename='';
        if($request->old_image && $request->old_image != null){
           
            $filename=$request->old_image;
        }

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('restro_img/'), $filename);
            $data['image']= $filename;
        }


        Additem::where('id',$request->id)->update([ 
            'Restro_Id'=>$request->restro_name,
            'Main_Category_id'=>$request->main_category,
                'Item_Name'=>$request->item_name,
                'Item_Rate_Retail'=>$request->item_rate_retail,
    			// 'Item_Rate_Hotel'=>$request->item_rate_hotel,
                'Variant'=>$request->variant,
                'Flavour'=>$request->flavour,
                'Item_Image'=>$filename,
                'Description'=>$request->description

    ]);

      return redirect(route('additem'))->with(['success'=>true,'message'=>'Successfully Updated !']);
    }

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
 

