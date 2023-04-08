<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Restrovendor;
use App\Models\City;
use Hash;
class restrovendorcontroller extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $restros =Restrovendor::
        leftjoin('city11','city11.id','=','restrovendor.City_Id')
        ->orderby('restrovendor.id','desc')
        ->select('restrovendor.*','city11.city')
        ->get();

        $city = City::all();

       return view('restro_vendor',['restro'=>$restros,'city'=>$city]);
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
        //     'latitude' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        //     'longitude' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'contact_no' => 'required|min:10',
            'city' => 'required',
           
        ]);
        $filename='';
        if($request->hasFile('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').'.'.$file->getClientOriginalExtension();
            $file->move(public_path('restro_img/'), $filename);
        }

       
    

        $restro= new Restrovendor;
        $restro->Restro_Name=$request->get('restro_name');
        $restro->Address=$request->get('address');
        $restro->Contact_no=$request->get('contact_no');
        $restro->City_Id=$request->get('city');
        $restro->Restro_Image= $filename;
        $restro->Password=$request->get('password');
        $restro->Latitude=$request->get('latitude');
        $restro->Longitude=$request->get('longitude');
        $restro->save(); 
        return redirect(route('restro'));
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit_restros = Restrovendor::find($id); 
        $restros= Restrovendor:: 
        leftjoin('city11','city11.id','=','restrovendor.City_Id')
        ->orderby('restrovendor.id','desc')
        ->select('restrovendor.*','city11.city')
        ->get();

        $city = City::all();
        return view('editrestro',['restros'=>$restros,'restroedit'=>$edit_restros,'city'=>$city]);
        // return view('restro_vendor', ['restros'=>$restros,'city'=>$city]);
        
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
      
        $password=$request->old_password;
        if(isset($request->password) && $request->password!=null)
        {      $password=Hash::make($request->password);

        }

        $filename='';
        if($request->old_image && $request->old_image != null){
           
            $filename=$request->old_image;

            
        }
        if($request->hasFile('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').'.'.$file->getClientOriginalExtension();
            $file->move(public_path('restro_img/'), $filename);
        }

 

        Restrovendor::where('id',$request->id)->update([ 
            //column_name             name_attribute 
            'Restro_Name'=>$request->restro_name,
            'Address'=>$request->address,
            'Contact_No'=>$request->contact_no,
            'City_Id'=>$request->city,
            'Restro_Image'=>$filename,
            'Password'=>$password,
            'Latitude'=>$request->latitude,
            'Longitude'=>$request->longitude,
            

    
    ]);

      return redirect(route('restro'))->with(['success'=>true,'message'=>'Successfully Updated !']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $restro=Restrovendor::where('id',$id)->delete();
        return redirect(route('restro'));

    }
}


