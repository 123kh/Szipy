<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {              
        return view('login');
    }

    public function check_login(Request $request){
    //  dd($request->all()); //yaha hamne dd ka use kiya hi kyki hame request se data print karna tha and code end karna tha
     // if (auth()->attempt(array('email' => $request['email'], 'password' => $request['password']))) 
    
     if (($request['email']=='admin@gmail.com' && $request['password']=='123456'))
        {  
           return redirect()->route('maincategory');
       }
       else{
        // echo "error','Invalid Login Credentials.";
        // dd($request->password);
         return redirect()->back()->with('error','Invalid Login Credentials.');  
           }     
    }

     
public function gallery_panel()
{
  
   if(Auth::User())
   {
 $check=Index::all();

 return view('main_category',compact('check'));
   }
   else{
      return redirect()->route('login');

   }
}

public function log_out()
{
   Auth::logout();
  
  return redirect()->route('login');
}

}
