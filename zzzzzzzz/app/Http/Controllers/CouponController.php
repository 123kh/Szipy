<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\CouponController; 
use App\Models\Coupon;
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
        $coupon= new Coupon;
        $coupon->Select_Vendor_id=$request->get('select_vendor');
        $coupon->Coupon_Name=$request->get('coupon_name');
        $coupon->Coupon_Code=$request->get('coupon_code');
        $coupon->Discount_Type=$request->get('discount_type');
        $coupon->Value=$request->get('value');
        $coupon->Minimum_Order_Amount=$request->get('minimum_order_amount');
        $coupon->save(); 
        return redirect(route('coupon'));
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
        $coupon=Coupon::where('id',$id)->delete();
        return redirect(route('coupon'));

    }
}




