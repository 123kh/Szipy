<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Maincategory;
use Illuminate\Support\Facades\DB;

class maincategorycontroller extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $main = Maincategory::all();
       return view('main_category', ['main'=>$main]);
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
        $main= new Maincategory;
        $main->main=$request->get('main');
        $main->save(); 
        return redirect(route('maincategory'));
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $main_edit = Maincategory::find($id); 
    $main = Maincategory::all();
    return view('editmain',['main_edit'=>$main_edit,'main'=>$main]);
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
        Maincategory::where('id',$request->id)->update(
    		[
    			
    			'main'=>$request->main,
    		]);
    	return redirect()->route('maincategory')->with(['success'=>true,'message'=>'Successfully Updated !']);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $main=Maincategory::where('id',$id)->delete();
        return redirect(route('maincategory'));

    }
}


