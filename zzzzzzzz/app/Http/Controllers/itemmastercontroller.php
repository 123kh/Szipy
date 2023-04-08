<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\itemmastercontroller;
 use App\Models\Itemmaster;
 use App\Models\Maincategory;

class itemmastercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


      
        $itemmaster =Itemmaster::
        join ('maincategory','maincategory.id','=','itemmaster.Main_Category_id')
        ->orderby('itemmaster.id','desc')
        ->select('itemmaster.*','maincategory.main')
        ->get();

        $main = Maincategory::all();
        return view('item_master', ['mains'=>$main,'item'=>$itemmaster]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $item= new Itemmaster;
        $item->Main_Category_id=$request->get('main_category');
        $item->Item_Name=$request->get('item_name');
        $item->Other_Food=$request->get('other_food');
        $item->save(); 
        return redirect(route('item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item=itemmaster::where('id',$id)->delete();
        return redirect(route('item'));
    }
}
