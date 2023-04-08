<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Deliveryboy;
use App\Models\Restrovendor;
use App\Models\User;
use App\Models\City;
use App\Models\Maincategory;
use App\Models\Assignitem;
use App\Models\Internalnotification;
use App\Models\Slider;
use App\Models\Additem;
use App\Models\Card;
use App\Models\Order;
use Carbon\Carbon;
use App\Models\Coupon;
use DB;


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
        $check = Restrovendor::where('Contact_no', '=', $request->contact_no)->exists();

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
      
           orderBy('City', 'asc')->get();
        if ($get_city) {
            return response()->json(['status' => true, 'data' => $get_city]);
        } else {
            return response()->json(['status' => false, 'message' => 'data not found']);
        }
    }


    // public function get_slider(Request $request)
    // {
    //     $get_slider = Slider::orderBy('id', 'desc')->get();
    //     if($get_slider) {
    //         return response()->json(['status' => true, 'data' => $get_slider]);
    //     } else {
    //         return response()->json(['status' => false, 'message' => 'data not found']);
    //     }
    // }
    // public function get_itemname(Request $request)
    // {
    //     $get_itemname = Additem::select('additems.Item_Name')->orderBy('id', 'desc')->get();

    //     if($get_itemname) {
    //         return response()->json(['status' => true, 'data' => $get_itemname]);
    //     } else {
    //         return response()->json(['status' => false, 'message' => 'data not found']);
    //     }
    // }


    // public function get_itemjoinname(Request $request)
    // {
    //     $get_itemjoinname = assignitem::where('Restro_Id',$request->Restro_Id)
    //     ->join ('restrovendor','restrovendor.id','=','assignitem.Restro_Id')

    //     ->join('additems','additems.id','=','assignitem.item_name_id')
    //     ->orderby('assignitem.id','desc')
    //     ->select('assignitem.*','restrovendor.Restro_Name','additems.Item_Name')
    //     ->get();
    //     if($get_itemjoinname) {
    //         return response()->json(['status' => true, 'data' => $get_itemjoinname]);
    //     } else {
    //         return response()->json(['status' => false, 'message' => 'data not found']);
    //     }
    // }

    

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

// public function get_lat_long(Request $request)
//   {
//     $current_date = date('Y-m-d');
//     $check_exit = Restrovendor::
//       orderby('id', 'desc')->first();
//     $calculated_distance = 0;
//     $tracking = new Restrovendor;
//     // $tracking->Main_Category_id = $request->get('Main_Category_id');
    
//     $tracking->latitude = $request->get('latitude');
//     $tracking->longitude = $request->get('longitude');
//     $tracking->distance = $calculated_distance;
//     if ($check_exit) {
//       $distance = $this->calculate_distance($request->get('latitude'), $request->get('longitude'), $check_exit->latitude, $check_exit->longitude);
//       $tracking->distance = $distance;
//     }
//     $tracking->save();
//   }

public function get_restro_by_category(Request $request)
{
  $get_restro_id = Additem::where('Main_Category_id', $request->Main_Category_id)
  ->groupBy('Restro_Id')->get()->pluck('Restro_Id');
  $get_restro_details = Restrovendor::select('id','Restro_Name','Latitude','Longitude','Restro_Image' )
  ->whereIn('id', $get_restro_id)
  ->get();
 
$restro_with_distance=[];
  foreach($get_restro_details as $key=>$restro_detail){
   $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$request->Latitude.",".$request->Longitude."&destinations=".$restro_detail->Latitude.",".$restro_detail->Longitude."&mode=driving&&key=AIzaSyDkFrL3p2KR9iAmFiuhmkszKgMHIon1Y0E";
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $url);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
   curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
   $response = curl_exec($ch);
   curl_close($ch);
   $response_a = json_decode($response, true);
   $dist = $response_a['rows'][0]['elements'][0]['distance']['text'];
   if((float)$dist<=1000){  //this will return hotel under 5km. you can change the value
       $restro_with_distance[$key]['restro_name']=$restro_detail->Restro_Name;
       $restro_with_distance[$key]['restro_id']=$restro_detail->id;
       $restro_with_distance[$key]['distance']=(float)$dist;
   }
  }
  if(count($get_restro_details)>0) {
      return response()->json(['status' => true, 'data' => $restro_with_distance]);
  } else {
      return response()->json(['status' => false, 'message' => 'data not found']);
  }
}
//restro_id item_name
public function get_additem(Request $request)
{
    $get_additem = Additem::where('Restro_Id', $request->Restro_Id)
    ->leftjoin ('restrovendor','restrovendor.id','=','additems.Restro_Id')
    // ->join('additems','additems.id','=','assignitem.item_name_id')
    ->select('additems.*','restrovendor.Restro_Name','restrovendor.Address', 'restrovendor.Restro_Image',)
    ->get();
    if($get_additem) {
        return response()->json(['status' => true, 'data' => $get_additem]);
    } else {
        return response()->json(['status' => false, 'message' => 'data not found']);
    }
}

//serch restro item
// public function get_search_restro_item(request $request)
// {
//     $get_search_restro_item = Restrovendor::
//     where([
//         'Latitude'=>$request->Latitude,
//         'item_type'=>$request->item_type
//     ])  
//    ->get()->pluck('Restro_Name');

      
//     if($get_search_restro_item) {
//         return response()->json(['status' => true, 'data' => $get_search_restro_item]);
//     } else {
//         return response()->json(['status' => false, 'message' => 'data not found']);
//     }

// }

public function get_slider(Request $request)
{
    $get_slider = Slider::where('Main_Category_id', $request->Main_Category_id)
    ->join ('maincategory','maincategory.id','=','sliders.Main_Category_id')
    ->select('sliders.*','maincategory.main','sliders.*','sliders.upload_image')
    ->get();
  
    if(count($get_slider)>0) {
        return response()->json(['status' => true, 'data' => $get_slider]);
    } else {
        return response()->json(['status' => false, 'message' => 'data not found']);
    }
}


// public function get_search_restro_item(Request $request)
// {

//     $item_ids= Additem::Where('Item_Name', 'like', '%' .$request->Item_Name. '%')
//     ->get()->pluck('id')->toArray();
   
//   $get_restro_id = Assignitem::whereIn('item_name_id', $item_ids)   
//   ->groupby('Restro_Id')->get()->pluck('Restro_Id');//groupby= get data without any duplicate value
  
//   $restro_details = Restrovendor::select('id','Restro_Name','Latitude','Longitude')
//   ->whereIn('id', $get_restro_id)   
//   ->get();
  
  
// $restro_with_distance=[];
// $restro_ids=[];
//   foreach($restro_details as $key=>$restro_details){
//    $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$request->latitude.",".$request->longitude."&destinations=".$restro_details->Latitude.",".$restro_details->Longitude."&mode=driving&&key=AIzaSyDkFrL3p2KR9iAmFiuhmkszKgMHIon1Y0E";
//    $ch = curl_init();
//    curl_setopt($ch, CURLOPT_URL, $url);
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//    curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
//    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
//    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//    $response = curl_exec($ch);
//    curl_close($ch);
//    $response_a = json_decode($response, true);
//    if(isset($response_a['rows'][0]['elements'][0]['distance'])){
//    $dist = $response_a['rows'][0]['elements'][0]['distance']['text'];
//    if((float)$dist<=5){  //this will return hotel under 5km. you can change the value
//        $restro_with_distance[$key]['restro_id']=$restro_details->id;
//        $restro_with_distance[$key]['distance']=(float)$dist;
//        $restro_ids[]=$restro_details->id;
//    }
//    }  
//   }

//   $restro_details = Assignitem::
//   join('restrovendor','restrovendor.id','=','assignitem.Restro_Id')
//   ->join('additems', function ($join) use ($item_ids) {
//     $join->on('additems.id','=','assignitem.item_name_id')
//       ->whereIn('additems.id', $item_ids);
//   })
//   ->whereIn('assignitem.Restro_Id', $restro_ids) 
//   ->select('additems.Item_Name','additems.Item_Image','additems.Item_Rate_Retail','restrovendor.Restro_Name','assignitem.Restro_Id')  
//   ->get();

// //   $restro_details = Assignitem::with(['items' => function($q) use($item_ids) {
// //     $q->whereIn('id',$item_ids);
// //     }])     
// //   ->join('restrovendor','restrovendor.id','=','assignitem.Restro_Id')  
// //   ->whereIn('assignitem.Restro_Id', $restro_ids) 
// //   ->whereIn('assignitem.item_name_id',$item_ids) 
// //   ->select('restrovendor.Restro_Name','assignitem.Restro_Id','assignitem.item_name_id')  
// //   ->get();
  
  
//   if(count($restro_details)>0) {
//       return response()->json(['status' => true, 'data' => $restro_details]);
//   } else {
//       return response()->json(['status' => false, 'message' => 'data not found']);
//   }
   
// }


public function get_search_restroitem(Request $request){
                                //colm name                              //variable_name
    $get_item = Additem::where('Item_Name', 'like', '%' .$request->serach_keyword. '%')
    ->orWhere('Restro_Name', 'like', '%' .$request->serach_keyword. '%')
    ->leftjoin ('restrovendor','restrovendor.id','=','additems.Restro_Id')
    ->join('maincategory','maincategory.id','=','additems.Main_Category_id')   
    ->orderby('additems.id','desc')
    ->select('maincategory.main','restrovendor.id','restrovendor.Restro_Name','additems.Item_Name','restrovendor.Latitude','restrovendor.Longitude')
    ->get();
    // echo json_encode($get_item);
    // exit();
 
  $restro_with_distance=[];

    foreach($get_item as $key=>$restro_details){
     $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$request->Latitude.",".$request->Longitude."&destinations=".$restro_details->Latitude.",".$restro_details->Longitude."&mode=driving&&key=AIzaSyDkFrL3p2KR9iAmFiuhmkszKgMHIon1Y0E";
     $ch = curl_init();
     curl_setopt($ch, CURLOPT_URL, $url);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
     curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
     $response = curl_exec($ch);
     curl_close($ch);
     $response_a = json_decode($response, true);
     
     if(isset($response_a['rows'][0]['elements'][0]['distance'])){
     $dist = $response_a['rows'][0]['elements'][0]['distance']['text'];
     if((float)$dist<=10){  //this will return hotel under 5km. you can change the value
         $restro_with_distance[$key]['restro_id']=$restro_details->id;
         $restro_with_distance[$key]['Item_Name']=$restro_details->Item_Name;
         $restro_with_distance[$key]['Restro_Name']=$restro_details->Restro_Name;
         $restro_with_distance[$key]['distance']=(float)$dist;

     }
     }  
    }
  
    if($get_item) {
        return response()->json(['status' => true, 'data' => $restro_with_distance]);
    } else {
        return response()->json(['status' => false, 'message' => 'data not found']);
    }
     
  }
  

  public function image_upload(Request $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('restro_img/'), $filename);
            return response()->json(['status' => true, 'data' => $filename]);
        }
        $image = new User();
        $image->Photo = $filename;
    }



    public function get_additem_id(Request $request)
{
    $get_additem = Additem::where('additems.id', $request->id)
    ->leftjoin ('restrovendor','restrovendor.id','=','additems.Restro_Id')
    // ->join('additems','additems.id','=','assignitem.item_name_id')
    ->select('additems.*','restrovendor.Restro_Name','restrovendor.Address', 'restrovendor.Restro_Image')
    ->get();
    if($get_additem) {
        return response()->json(['status' => true, 'data' => $get_additem]);
    } else {
        return response()->json(['status' => false, 'message' => 'data not found']);
    }
}



//additem post api
public function post_additem(Request $request){
    $insert = Additem::create([
      
        'Restro_Id' => $request->Restro_Id,
        'Main_Category_id' => $request->Main_Category_id,
        'Item_Name' => $request->Item_Name,
        'Item_Rate_Retail'=>$request->Item_Rate_Retail,
        'Variant' => $request->Variant,
        'Flavour' => $request->Flavour,
        'Item_Image' => $request->Item_Image,
        'Description' => $request->Description,
        'status'=>'active',
        'verify' => 1
    ]);
    if($insert) {
        return response()->json(['status' => true, 'message' => 'Data Has Been Submitted']);
    } else {
        return response()->json(['status' => false, 'message' => 'data not found']);
    }
    
    }
    
//restrovendor post api
public function post_restrovendor(Request $request){
    $insert = Restrovendor::create([
    
        
        'Restro_Name' => $request->Restro_Name,
        'Address' => $request->Address,
        'Contact_No' => $request->Contact_No,
        'Restro_Image'=>$request->Restro_Image,
        'Business_Name'=>$request->Business_Name,
        'business_catagory'=>$request->business_catagory,
        'licence_number'=>$request->licence_number,
        'licence'=>$request->licence,
        'bank_detail'=>$request->bank_detail,
        'status'=>'inactive',
        'verify' => 1
    ]);
    if($insert) {
        return response()->json(['status' => true, 'message' => 'data has been submitted']);
    } else {
        return response()->json(['status' => false, 'message' => 'data not found']);
    }
    
    }

    // public function post_card(Request $request){
    //     $insert = Card::create([
        
            
    //         'restro_id' => $request->restro_id,
    //         'item_id' => $request->item_id,
    //         'item_piece' => $request->item_piece,
    //         'item_kg'=>$request->item_kg,
    //         'order_id'=>$request->order_id,
        
    //         'status'=>'pending',
    //         'verify' => 1
    //     ]);
    //     if($insert) {
    //         return response()->json(['status' => true, 'message' => 'data has been submitted']);
    //     } else {
    //         return response()->json(['status' => false, 'message' => 'data not found']);
    //     }
        
    //     }

        
    public function post_order(Request $request){
        $insert = Order::create([
        
                     //order id generate
            'order_id' => 'OD'.time(),
            'restro_id' => $request->restro_id,
            'total' => $request->total,
            'discount'=>$request->discount,
            'payment_mode'=>$request->payment_mode,
            'address'=>$request->address,
            'delivery_type'=>$request->delivery_type,
            'contact'=>$request->contact,
            'coupon_code'=>$request->coupon_code,
           
            'user_id'=>$request->user_id,
            
            'order_date'=>$request->order_date,

            'status'=> "ordered",
            'verify' => 1
        ]);
        if($insert) {
            return response()->json(['status' => true, 'message' => 'data has been submitted']);
        } else {
            return response()->json(['status' => false, 'message' => 'data not found']);
        }
        
        }

   public function remove_cart(Request $request)
    {
        $remove = Card::where('item_id', $request->item_id)
        ->where('restro_id', $request->restro_id)
        ->delete();
        if ($remove) {
            return response()->json(['status' => true, 'message' => 'Data Deleted Successfully']); //array
        } else {
            return response()->json(['status' => false, 'message' => 'User Not Found']); //array
        }
    }

  
    // public function get_history(Request $request)
    // {
    //     $get_order_conf = Order::
    //         where('order_id', $request->order_id)
          
    //         ->get();
    //     if ($get_order_conf) {
    //         return response()->json(['status' => true, 'data' => $get_order_conf]);
    //     } else {
    //         return response()->json(['status' => false, 'message' => 'data not found']);
    //     }
    // }

    





    public function post_card(Request $request){

        $delete=Card::where('user_id',$request->user_id)
        ->where('restro_id','!=',$request->restro_id)->delete();
        $item_details= Additem ::find($request->item_id);
        $insert = Card::create([
            'user_id' => $request->user_id,
            'restro_id' => $request->restro_id,
            'item_id' => $request->item_id,
            // 'item_name' => $item_details->Item_Name,
            // 'item_piece' => $item_details->Variant,
            // 'item_kg'=>$item_details->Item_Rate_Retail,
            'order_id'=>$request->order_id,
            'weight_type'=>$request->weight_type,
            'weight'=>$request->weight,
            'total'=>$request->total,
            'status'=>'pending',
            'verify' => 1
        ]);
        if($insert) {
            return response()->json(['status' => true, 'message' => 'data has been submitted']);
        } else {
            return response()->json(['status' => false, 'message' => 'data not found']);
        }
        }



      
        // total
        public function get_cart(Request $request)
        {
            $get_cart = Card::
                where('cards.user_id', $request->user_id)                       //total krne ke liye
                ->select('cards.*','restrovendor.Restro_Name','additems.Item_Name')
                ->leftjoin('restrovendor','restrovendor.id','=','cards.restro_id')
                ->leftjoin('additems','additems.id','=','cards.item_id')        
              ->groupBy('cards.id')
                ->where('user_id', $request->user_id)
                // ->orderBy('id', 'desc')
                ->get();


            $get_count=DB::table('cards')
            ->where('cards.user_id',$request->user_id)
            ->sum('total');
            echo json_encode(['total'=>$get_count,'count'=>$get_cart]);
            

            if ($get_count) {
                return response()->json(['status' => true, 'data' => $get_count]);
            } else {
                return response()->json(['status' => false, 'message' => 'data not found']);
            }
        }
        public function get_order(Request $request)
        {
            $get_order = Order::
                where('orders.restro_id', $request->restro_id)
                ->leftjoin('restrovendor','restrovendor.id','=','orders.restro_id')
             
                ->select('orders.*','restrovendor.Restro_Name')
                ->get();
            if ($get_order) {
                return response()->json(['status' => true, 'data' => $get_order]);
            } else {
                return response()->json(['status' => false, 'message' => 'data not found']);
            }
        }
        // public function get_coupon(Request $request)
        // {
           
 
        //     $coupon = Coupon::
        //     where('Select_Vendor_id', $request->Select_Vendor_id)
        //     ->where('status',1)
        //     ->whereDate('start_date','<=',carbon::now()->format('Y-m-d'))
        //     ->whereDate('end_date','>=',carbon::now()->format('Y-m-d'))

       
        //     ->get();
        
        //     if(count($coupon)>0) {
        //         return response()->json(['status' => true, 'data' => $coupon]);
        //     } else {
        //         return response()->json(['status' => false, 'message' => 'data not found']);
        //     }
          
        // }


        public function get_coupon(Request $request)
        {
           

            $coupon = Coupon::
            where('Select_Vendor_id', $request->Select_Vendor_id)
            // ->leftjoin('restrovendor','restrovendor.id','coupons.Select_Vendor_id')
            ->where('status',1)
            ->whereDate('start_date','<=',carbon::now()->format('Y-m-d'))
            ->whereDate('end_date','>=',carbon::now()->format('Y-m-d'))
    //    ->select('coupons.*','restrovendor.Restro_Name')
      
            ->get();
            
            if(count($coupon)>0) 
            {
                return response()->json(['status' => true, 'data' => $coupon]);
            } else {
                return response()->json(['status' => false, 'message' => 'data not found']);
            }
          
        }



public function get_card_details(Request $request)
        {
            $get_cart = Card::
                where('cards.user_id', $request->user_id)                       //total krne ke liye
                ->select('cards.*','restrovendor.Restro_Name','additems.Item_Name','coupons.Coupon_Code','additems.Variant','additems.Flavour','additems.Item_Image','additems.Description','additems.status','additems.Item_Rate_Retail')
                ->leftjoin('restrovendor','restrovendor.id','=','cards.restro_id')
                ->leftjoin('coupons','coupons.id','=','cards.coupon_code_id')
                ->leftjoin('additems','additems.id','=','cards.item_id') 
                ->leftjoin('users','users.id','=','cards.user_id')     
                ->select('cards.*','users.*')   
              ->groupBy('cards.id')
                ->where('user_id', $request->user_id)
                
                // ->orderBy('id', 'desc')
                ->get();


            $get_count=DB::table('cards')
            ->where('cards.user_id',$request->user_id)
            ->sum('total');
            // echo json_encode(['total'=>$get_count,'count'=>$get_cart]);
            

            if ($get_count) {
                return response()->json(['status' => $get_count, 'data' => $get_cart]);
            } else {
                return response()->json(['status' => false, 'message' => 'data not found']);
            }
        }



        public function get_history_card_order(Request $request)
        {
            $get_cart_order = Card::
                where('cards.user_id', $request->user_id)                       //total krne ke liye
                ->select('cards.*','restrovendor.Restro_Name','additems.Item_Name','coupons.Coupon_Code')
                ->leftjoin('restrovendor','restrovendor.id','=','cards.restro_id')
                ->leftjoin('coupons','coupons.id','=','cards.coupon_code_id')
                ->leftjoin('additems','additems.id','=','cards.item_id') 
                ->leftjoin('users','users.id','=','cards.user_id')     
                ->leftjoin('orders','orders.id','=','orders.order_id')     
                
                ->select('cards.*','orders.*')   
              ->groupBy('cards.id')
                
                // ->orderBy('id', 'desc')
                ->get();


            // echo json_encode(['total'=>$get_count,'count'=>$get_cart]);
            

            if ($get_cart_order) {
                return response()->json(['status' => true, 'data' => $get_cart_order]);
            } else {
                return response()->json(['status' => false, 'message' => 'data not found']);
            }
        }


        public function get_byorderid_card_order(Request $request)
        {
            $get_cart_order = Card::
                where('cards.order_id', $request->order_id)                       //total krne ke liye
                ->select('cards.*','restrovendor.Restro_Name','additems.Item_Name','coupons.Coupon_Code')
                ->leftjoin('restrovendor','restrovendor.id','=','cards.restro_id')
                ->leftjoin('coupons','coupons.id','=','cards.coupon_code_id')
                ->leftjoin('additems','additems.id','=','cards.item_id') 
                ->leftjoin('users','users.id','=','cards.user_id')     
                ->leftjoin('orders','orders.id','=','orders.order_id')     
                
                ->select('cards.*','orders.*')   
              ->groupBy('cards.id')
                
                // ->orderBy('id', 'desc')
                ->get();


            // echo json_encode(['total'=>$get_count,'count'=>$get_cart]);
            

            if ($get_cart_order) {
                return response()->json(['status' => true, 'data' => $get_cart_order]);
            } else {
                return response()->json(['status' => false, 'message' => 'data not found']);
            }
        }

        public function post_orderapi(Request $request){

            // $delete=Card::where('user_id',$request->user_id)
            // ->where('restro_id','!=',$request->restro_id)->delete();
            // $item_details= Additem ::find($request->item_id);
            $insert = Order::create([
                'order_id' => $request->order_id,
                'restro_id' => $request->restro_id,
                'total' => $request->total,
                // 'item_name' => $item_details->Item_Name,
                // 'item_piece' => $item_details->Variant,
                // 'item_kg'=>$item_details->Item_Rate_Retail,
                'discount' => $request->discount,
                'payment_mode' => $request->payment_mode,
                'address' => $request->address,

                'delivery_type'=>$request->delivery_type,
                'contact'=>$request->contact,
                'coupon_code'=>$request->coupon_code,
                'assign_delivery'=>$request->assign_delivery,
                'user_id' => $request->user_id,

                'approval'=>$request->approval,
                'order_date'=>$request->order_date,
                'status'=>'pending',
                'lat'=>$request->lat,
                'long'=>$request->long,
                
                'verify' => 1
            ]);
            if($insert) {
                return response()->json(['status' => true, 'message' => 'data has been submitted']);
            } else {
                return response()->json(['status' => false, 'message' => 'data not found']);
            }
            }

            public function get_order_history(Request $request)
            {
                $get_order_history = Order::
                    where('orders.user_id', $request->user_id)                       //total krne ke liye
                  
                    ->leftjoin('restrovendor','restrovendor.id','=','orders.restro_id')
                    // ->leftjoin('coupons','coupons.id','=','orders.coupon_code_id')
                    // ->leftjoin('additems','additems.id','=','orders.item_id') 
                    ->leftjoin('users','users.id','=','orders.user_id')     
                    // ->leftjoin('orders','orders.id','=','orders.order_id')     
                    
                    // ->select('orders.*','orders.')   
                //   ->groupBy('cards.id')
                    
                    ->orderBy('id', 'desc')
                    ->select('orders.*','restrovendor.Restro_Name')
                    ->get();
    
    
                    if ($get_order_history) {
                        return response()->json(['status' => true, 'data' => $get_order_history]);
                    } else {
                        return response()->json(['status' => false, 'message' => 'data not found']);
                    }

    }}



