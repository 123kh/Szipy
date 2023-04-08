<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 
use App\Models\Deliveryboy;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class deliveryboycontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       
  


        $users = User::
        join ('deliveryboy','deliveryboy.user_id','=','users.id')
        -> select('users.*','deliveryboy.Account_No','deliveryboy.Branch')
        ->get();
 
        return view('delivery_boy', ['user'=>$users]);

      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user= new User;
        $user->fullname=$request->get('name');
        $user->mobile_number=$request->get('contact_no');
        $user->email=$request->get('email_id');
        $user->username=$request->get('username');
        $user->password=Hash::make($request->password);
        $user->role=4;
        $user->save(); 

        $delivery= new Deliveryboy;
       
        $delivery->user_id=$user->id;
        $delivery->Account_No=$request->get('account_no');
        $delivery->Branch=$request->get('branch');
        $delivery->save(); 
        return redirect(route('delivery'));
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
        $delivery=deliveryboy::where('id',$id)->delete();
        return redirect(route('delivery'));

    }
}
