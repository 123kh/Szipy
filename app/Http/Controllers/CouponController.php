<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Coupon;
use App\Models\City;
use App\Models\Assignitem;
use App\Models\Restrovendor;
class CouponController extends Controller
{
    
    public function index()
    {

       $coupon =Coupon::
       join ('restrovendor','restrovendor.id','=','coupons.Select_Vendor_id')
       ->orderby('coupons.id','desc')
       ->select('coupons.*','restrovendor.Restro_Name')
       ->get();
    // $restrovendors= Restrovendor::orderby('Restro_Name','asc')->get(["Restro_Name","id"]);

       $restrovendor = Restrovendor::all();

       return view('coupon', ['restro'=>$restrovendor,'coupon'=>$coupon]);
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

 
        $request->validate([
            
            'discount_type' => 'required',
            'select_vendor' => 'required',  
            ]);

        $coupon= new Coupon;
        $coupon->Select_Vendor_id=$request->get('select_vendor');
        $coupon->Coupon_Name=$request->get('coupon_name');
        $coupon->Coupon_Code=$request->get('coupon_code');
        $coupon->Discount_Type=$request->get('discount_type');
        $coupon->Value=$request->get('value');
        $coupon->Minimum_Order_Amount=$request->get('minimum_order_amount');
        $coupon->start_date=$request->get('start_date');
        $coupon->end_date=$request->get('end_date');
  
        $coupon->save(); 
        return redirect(route('coupon'));
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $couponedit = Coupon::find($id); 
        $coupon =Coupon::
        join ('restrovendor','restrovendor.id','=','coupons.Select_Vendor_id')
        ->orderby('coupons.id','desc')
        ->select('coupons.*','restrovendor.Restro_Name')
        ->get();
     // $restrovendors= Restrovendor::orderby('Restro_Name','asc')->get(["Restro_Name","id"]);
 
        $restrovendor = Restrovendor::all();

    
        return view('editcoupon',['couponedit'=>$couponedit,'coupon'=>$coupon,'restrovendor'=>$restrovendor]);
       
        
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

        
        // $request->validate([
        //     //     'latitude' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        //     //     'longitude' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        //         'Discount Type' => 'required'
        //     ]);

        Coupon::where('id',$request->id)->update([ 
            'Select_Vendor_id'=>$request->select_vendor,
            'Coupon_Name'=>$request->coupon_name,
            'Coupon_Code'=>$request->coupon_code,
            'Discount_Type'=>$request->discount_type,
            'Value'=>$request->value,
            'Minimum_Order_Amount'=>$request->minimum_order_amount
        ]);

      return redirect(route('coupon'))->with(['success'=>true,'message'=>'Successfully Updated !']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon=Coupon::where('id',$id)->delete();
        return redirect(route('coupon'));

    }
}




