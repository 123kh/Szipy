<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 
use App\Models\Deliveryboy;
use App\Models\User;
use Hash;


class deliveryboycontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role',4)->get();

        return view('delivery_boy', ['user'=>$users]);

      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {


        $request->validate([
            
            'contact_no' => 'required|min:10',
                
            ]);
        $user= new User;
        $user->fullname=$request->get('name');
        $user->mobile_number=$request->get('contact_no');
        $user->email=$request->get('email_id');
        $user->username=$request->get('username');
        $user->Password=$request->get('password');
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
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Deliveryboy $delivery,$id)
    {
        $delivery_edit = User::find($id); 
        $delivery = User::where('role',4)->get();
        return view('editdelivery',['delivery_edit'=>$delivery_edit,'delivery'=>$delivery]);
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
        User::where('id',$request->id)->update([
            
            'fullname'=>$request->name,
            'mobile_number'=>$request->contact_no,
            'email'=>$request->email_id,
            'username'=>$request->username,
            'password'=>$password
        ]);
        Deliveryboy::where('user_id',$request->id)->update([
          
            'Account_No'=>$request->account_no,
            
            'Branch'=>$request->branch,
        ]);

        return redirect()->route('delivery')->with(['success'=>true,'message'=>'Successfully Updated !']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $delivery=User::where('id',$id)->delete();
        return back();

    }
}
