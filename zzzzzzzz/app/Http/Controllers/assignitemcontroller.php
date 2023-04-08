<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\assignitemcontroller; 
use App\Models\Assignitem;
use App\Models\Restrovendor;
use App\Models\Maincategory;

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
        ->orderby('assignitem.id','desc')
        ->select('assignitem.*','restrovendor.Restro_Name','assignitem.*','maincategory.main')
        ->get();


        $restrovendor = Restrovendor::all();
        $maincategorys = Maincategory::all();

        return view('assign_item', ['assign'=>$assign,'restro'=>$restrovendor,'maincategory'=>$maincategorys]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $assign= new Assignitem;
        $assign->Restro_Id=$request->get('restro_name');
        $assign->Main_Category_id=$request->get('main_category');
        $assign->save(); 
        return redirect(route('assign'));
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
        $assign=assignitem::where('id',$id)->delete();
        return redirect(route('assign'));
    }
}
