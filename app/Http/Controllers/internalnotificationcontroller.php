<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        $request->validate([
           
                'description' => 'required'
            ]);
    

            $internal= new Internalnotification;
            $internal->Title=$request->get('title');
            $internal->Date=$request->get('date');
            $internal->Description=$request->get('description');
            $internal->save(); 
            return redirect(route('internal'));
            
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $internal = Internalnotification::find($id); 
        $internalnotifications = Internalnotification::all();
        return view('editinternalnotifi',['internal'=>$internal,'internalnotifications'=>$internalnotifications]);
       
        
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
        Internalnotification::where('id',$request->id)->update([ 
            'Title'=>$request->title,
            'Date'=>$request->date,
            'Description'=>$request->description
        ]);

      return redirect()->route('internal')->with(['success'=>true,'message'=>'Successfully Updated !']);
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
