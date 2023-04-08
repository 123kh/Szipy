<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Deliveryboy;
use App\Models\Restrovendor;
use App\Models\User;
use App\Models\City;
use App\Models\Maincategory;
use App\Models\Internalnotification;
use App\Models\Slider;
use App\Http\Controllers\deliveryboycontroller;
use App\Http\Controllers\restrovendorcontroller;


class ApiController extends Controller
{




    public function send_mobile_verify_otp(Request $request)
    {
        $otp = rand(1000, 9999); //this random function will generate number in range of 1000-9999
        //sms send code start
        $name = 'Sir/Mam';
        $msg = 'Dear ' . $name . ', Your OTP is ' . $otp . '. Send by WEBMEDIA';
        $msg = urlencode($msg);
        $to = $request->mobile;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.msg91.com/api/v5/otp?template_id=6093eb78e9bef15c4705b2b2&mobile=+1" . $to . "&authkey=353377AvqejzJvymQ601a89f9P1&otp=" . $otp,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "{\"var\":\"1233\",\"Value2\":\"Param2\",\"Value3\":\"Param3\"}",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/json",
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        //sms send sms end
        return response()->json($otp);
    }

    // public function user_registration(Request $request)
    // {
    //     $checkuser = User::where('mobile_no', $request->mobile_no);
    //     if ($checkuser == $request->mobile_no) {
    //         return response()->json(['status' => true, 'data' => $checkuser]);
    //     } else {
    //         $insert = User::create([
    //             'user_id' => $request->user_id,
    //             'mobile_no' => $request->mobile_no,
    //             'verify' => 1,
    //         ]);
    //         return response()->json($insert);
    //     }
    // }

    public function user_registration(Request $request)
    {
        $user = User::where('mobile_number', '=', $request->mobile_number)->first();
        if (isset($user) && $user != null) {
            //   return $user;
            return response()->json(['status' => true, 'data' => $user]);
        } else {
            // dd(1);
            $insert = User::create([
                'email' => $request->email,
                'mobile_number' => $request->mobile_number,
                // 'city' => $request->city,
                'verify' => 1,
            ]);
            return response()->json(['status' => true, 'data' => $insert]);
        }
    }





    // ........api for delivery login...... //

    public function delivery_api(Request $request)
    {
        $checkuser = User::where('username', $request->username)->first();
        if ($checkuser && Hash::check($request->password, $checkuser->password)) {
            return response()->json(['status' => true, 'data' => $checkuser]); //array
        } else {
            return response()->json(['status' => false, 'message' => 'User Not Found']); //array
        }
    }

    // .........end.......//





    //     public function user_registration(Request $request)
    //  {

    //     $insert=User::create(
    //         [
    //      'name'=>$request->name, //user-id ye table field hai oe $req->user-id ye data form se aa raha hai
    //      'email'=>$request->email,

    //      'mobile_number'=>$request->mobile_number,
    //     'address'=>$request->address,
    //     'city'=>$request->city,
    //     ]);
    //     if($insert->id)
    //     {
    //         return response()->json(['status'=>true,'message'=>' Recorded Successfully']);
    //     }
    //     else{
    //         return response()->json(['status'=>false,'message'=>'Something Error Occure At Server']);
    //     }
    //  }




    //  public function send_mobile_verify_otp(Request $request)
    //     {
    //         $otp = rand(1000, 9999); //this random function will generate number in range of 1000-9999
    //      //sms send code start
    //      $name = 'Sir/Mam';
    //      $msg = 'Dear ' . $name . ', Your OTP is ' . $otp . '. Send by WEBMEDIA';
    //      $msg = urlencode($msg);
    //      $to = $request->mobile;
    //      $curl = curl_init();
    //      curl_setopt_array($curl, array(
    //          CURLOPT_URL => "https://api.msg91.com/api/v5/otp?template_id=6093eb78e9bef15c4705b2b2&mobile=+1" . $to . "&authkey=353377AvqejzJvymQ601a89f9P1&otp=" . $otp,
    //          CURLOPT_RETURNTRANSFER => true,
    //          CURLOPT_ENCODING => "",
    //          CURLOPT_MAXREDIRS => 10,
    //          CURLOPT_TIMEOUT => 30,
    //          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //          CURLOPT_CUSTOMREQUEST => "GET",
    //          CURLOPT_POSTFIELDS => "{\"var\":\"1233\",\"Value2\":\"Param2\",\"Value3\":\"Param3\"}",
    //          CURLOPT_HTTPHEADER => array(
    //              "content-type: application/json"
    //          ),
    //      ));

    //      $response = curl_exec($curl);
    //      $err = curl_error($curl);
    //      curl_close($curl);
    //      //sms send sms end
    //         return response()->json($otp);
    //     }



    public function delivery(Request $request)
    {
        $check = Deliveryboy::where('Contact_No', '=', $request->contact_no)->exists() || Deliveryboy::where('Contact_No', '=', $request->Contact_no)->exists();

        if ($check) {

            return response()->json(['status' => true, 'message' => 'User Already Exist']);
        } else {
            // dd(1);
            $insert = Deliveryboy::create([
                // 'user_id' => $request->user_id,
                'Contact_No' => $request->contact_no,
                'Name' => $request->name,
                'Email_Id' => $request->email_id,
                'Account_No' => $request->account_no,
                'Branch' => $request->branch,
                // 'city' => $request->city,
                'verify' => 1
            ]);

            return response()->json($insert);
        }
    }

    public function restro(Request $request)
    {
        $check = Restrovendor::where('Contact_no', '=', $request->contact_no)->exists() || Restrovendor::where('Contact_no', '=', $request->Contact_no)->exists();

        if ($check) {

            return response()->json(['status' => true, 'message' => 'User Already Exist']);
        } else {
            // dd(1);
            $insert = Restrovendor::create([
                // 'user_id' => $request->user_id,
                'Contact_No' => $request->contact_no,
                'Restro_Name' => $request->restro_name,
                'Address' => $request->address,
                'City_Id' => $request->city_id,
                'Password' => $request->password,
                'Latitude' => $request->latitude,
                'Longitude' => $request->longitude,
                'verify' => 1
            ]);

            return response()->json($insert);
        }
    }
    public function get_user(Request $request)
    {
        $get_user = User::find($request->id);

        if ($get_user) {
            return response()->json(['status' => true, 'data' => $get_user]);
        } else {
            return response()->json(['status' => false, 'message' => 'data not found']);
        }
    }

    public function get_restro(Request $request)
    {
        $get_restro = Restrovendor::find($request->id);

        if ($get_restro) {
            return response()->json(['status' => true, 'data' => $get_restro]);
        } else {
            return response()->json(['status' => false, 'message' => 'data not found']);
        }
    }

        

    public function get_delivery(Request $request)
    {
        $get_delivery = Deliveryboy::find($request->id);

        if($get_delivery) {
            return response()->json(['status' => true, 'data' => $get_delivery]);
        } else {
            return response()->json(['status' => false, 'message' => 'data not found']);
        }
    }



    public function get_notification(Request $request)
    {
        $get_notification = Internalnotification::orderBy('id', 'desc')->get();
        if($get_notification) {
            return response()->json(['status' => true, 'data' => $get_notification]);
        } else {
            return response()->json(['status' => false, 'message' => 'data not found']);
        }
    }


    public function get_maincategory(Request $request)
    {
        $get_maincategory = Maincategory::orderBy('id', 'desc')->get();
        if($get_maincategory) {
            return response()->json(['status' => true, 'data' => $get_maincategory]);
        } else {
            return response()->json(['status' => false, 'message' => 'data not found']);
        }
    }



    // public function get_state(Request $request)
    // {
    //     $get_state = state::orderBy('state', 'asc')->get();
    //     if ($get_state) {
    //         return response()->json(['status' => true, 'data' => $get_state]);
    //     } else {
    //         return response()->json(['status' => false, 'message' => 'data not found']);
    //     }
    // }


    public function get_city(Request $request)
    {
        $get_city = City::
        //where('state_id',$request->state_id)
           orderBy('City', 'asc')->get();
        if ($get_city) {
            return response()->json(['status' => true, 'data' => $get_city]);
        } else {
            return response()->json(['status' => false, 'message' => 'data not found']);
        }
    }


    public function get_slider(Request $request)
    {
        $get_slider = Slider::orderBy('id', 'desc')->get();
        if($get_slider) {
            return response()->json(['status' => true, 'data' => $get_slider]);
        } else {
            return response()->json(['status' => false, 'message' => 'data not found']);
        }
    }

    

public function update_restro(Request $request)
{
    $restro_vendor = Restrovendor::where('id', $request->id)->update([
        'Restro_Name' => $request->Restro_Name,
        'Address' => $request->Address,
        'Contact_No' => $request->Contact_No
    ]);
    if ($restro_vendor) {
        return response()->json(['status' => true, 'message' => 'Data Updated Successfully']); //array
    } else {
        return response()->json(['status' => false, 'message' => 'User Not Found']); //array
    }
}


public function update_user(Request $request)
{
    $user = User::where('id', $request->id)->update([
        'fullname' => $request->fullname,
        // 'username' => $request->username,
        'email' => $request->email,
        'mobile_number' => $request->mobile_number,
        // 'password' => $request->password
    ]);
    if ($user) {
        return response()->json(['status' => true, 'message' => 'Data Updated Successfully']); //array
    } else {
        return response()->json(['status' => false, 'message' => 'User Not Found']); //array
    }
}


public function update_deliveryboy(Request $request)
{
    $delivery = Deliveryboy::where('id', $request->id)->update([
        'user_id' => $request->user_id,
        'Account_No' => $request->Account_No,
        'Branch' => $request->Branch,
       
    ]);
    if ($delivery) {
        return response()->json(['status' => true, 'message' => 'Data Updated Successfully']); //array
    } else {
        return response()->json(['status' => false, 'message' => 'User Not Found']); //array
    }
}


}




