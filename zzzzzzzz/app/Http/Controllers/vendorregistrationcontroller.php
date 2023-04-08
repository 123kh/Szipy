<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\vendorregistrationcontroller; 
use App\Models\Vendorregistration;

class vendorregistrationcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendor = Vendorregistration::all();

        return view('vendor_registration', ['vendor'=>$vendor]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    { 
        // dd($request->all()); 
        $vendor= new Vendorregistration;
        $vendor->User_Name=$request->get('user_name');
        $vendor->Em_Id=$request->get('id');
        $vendor->Password=$request->get('password');
        $vendor->Contact_No=$request->get('contact_no');
        $vendor->Latitude=$request->get('latitude');
        $vendor->Longitude=$request->get('longitude');
        $vendor->save(); 
        return redirect(route('vendor'));
    //  echo json_encode($vendor);  
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
        $vendor=vendorregistration::where('id',$id)->delete();
        return redirect(route('vendor'));
    }
}
