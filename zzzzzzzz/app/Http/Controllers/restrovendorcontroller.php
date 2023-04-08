<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Restrovendor;
use App\Models\City;
class restrovendorcontroller extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $restro =Restrovendor::
        join('city11','city11.id','=','restrovendor.City_id')
        ->orderby('restrovendor.id','desc')
        ->select('restrovendor.*','city11.city')
        ->get();

        $city = City::all();

       return view('restro_vendor', ['restros'=>$restro,'city'=>$city]);
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {


        $request->validate([
            'latitude' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'longitude' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        
        ]);
    

        $restro= new Restrovendor;
        $restro->Restro_Name=$request->get('restro_name');
        $restro->Address=$request->get('address');
        $restro->Contact_no=$request->get('contact_no');
        $restro->City_Id=$request->get('city');
        $restro->Password=$request->get('password');
        $restro->Latitude=$request->get('latitude');
        $restro->Longitude=$request->get('longitude');
        $restro->save(); 
        return redirect(route('restro'));
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
        $restro=restrovendor::where('id',$id)->delete();
        return redirect(route('restro'));

    }
}


