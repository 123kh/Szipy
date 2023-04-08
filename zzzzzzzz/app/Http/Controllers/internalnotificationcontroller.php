<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\internalnotificationcontroller;
 use App\Models\Internalnotification;

class internalnotificationcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $internal = Internalnotification::all();

        return view('internal_notification', ['internal'=>$internal]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
            $internal= new Internalnotification;
            $internal->Title=$request->get('title');
            $internal->Date=$request->get('date');
            $internal->Declaration=$request->get('declaration');
            $internal->save(); 
            return redirect(route('internal'));
            
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
        $internal=internalnotification::where('id',$id)->delete();
        return redirect(route('internal'));
    }
}
