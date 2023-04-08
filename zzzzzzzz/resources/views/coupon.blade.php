
@extends('layout')

@section ('content')






  <!-- PAGE CONTENT WRAPPER -->
  <div class="page-content-wrap">
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                           <div class="panel-body">
                                <div class="form-group">
                                
                                        <div class="col-md-12" style="margin-bottom:-5px;" align="center">
                                            <h6 style="color:#000; background-color:#FFCC00; width:15%; min-height:25px; padding-top:5px;" align="center"><span class=""></span> <strong>Coupon</strong></h6>
                                        </div>  
                                   </div>      
                               </div>           
                                         
                                
                            </div>
                        </div>
                    </div>
                </div>

              <div class="row">
                    <div class="col-md-12" >
                 
                        <div class="panel panel-default">
                                <h5 class="panel-title" style="color:#FFFFFF; background-color:#0a0536; width:100%; font-size:14px;" align="center"><i class="fa fa-users"></i> Coupon</h5>
                            <div class="panel-body" style="margin-top:-10px; margin-bottom:-5px;">
                                <div class="form-group">
                               
                                    <form role="form" method="POST" action="{{route('create_coupon')}}">
                                    {{csrf_field()}}
                                    <div class="col-md-12">
                                        <div class="form-group" style="margin-top:-20px;">   
                                                         
                                            <div class="col-md-2" style="margin-top:30px;">
                                                <label>Select Vendor<font color="#FF0000">*</font></label>
                                                <select class="form-control select" data-live-search="true" name="select_vendor">
                                                <option value="select">Select</option>
                                                @foreach ($restro as $data)
                                                                        <option value="{{ $data->id }}">
                                                                            {{$data->Restro_Name}}
                                                                        </option>
                                                                    @endforeach
                                        </select>
                                            </div>
                                            <div class="col-md-2" style="margin-top: 30px;">

                                            <label>Coupon Name<font color="#FF0000">*</font></label>
                                                <input type="text" placeholder="Coupon Name" class="form-control" name="coupon_name" required input/>
                                                <!-- <div class="form-group ">
                                                    <label>Coupon Name<font color="#FF0000">*</font></label>
                                                    <select class="form-control select" data-live-search="true" name="select_vendor">
                                        @foreach ($errors as $restros)
                                                  <option value="{{$restros->id}}">{{$restros->Restro_Name}}</option>
                                           @endforeach
                                        </select>
                                                </div> -->
                                            </div>
                                            <div class="col-md-2" style="margin-top:30px;">
                                                <label>Coupon Code<font color="#FF0000">*</font></label>
                                                <input type="text" placeholder="Coupon Name" class="form-control" name="coupon_code" required input/>
                                            </div>
                                         
                                            <div class="col-md-2" style="margin-top:30px;">
                                                <label>Discount Type<font color="#FF0000">*</font></label>
                                                <select class="form-control select" data-live-search="true" name="discount_type">
                                                    <option value="select">Select</option>
                                                <option value="discount">Discount (&#37;)</option>   
                                                <option value=" rupees">Discount (&#8377;)</option>   

                                                </select>
                                                </div>
                                            </div>

                                            <div class="col-md-1" style="margin-top:15px;">
                                                <label>Value<font color="#FF0000">*</font></label>
                                                <input type="number"  placeholder="Value"  class="form-control" name="value" required input/>
                                            </div>
                                         <div class="col-md-2" style="margin-top:15px;">
                                                <label>Minimum Order Amount<font color="#FF0000">*</font></label>
                                                <input type="number" placeholder="Minimum Order Amount"  class="form-control" name="minimum order amount" required input/>
                                            </div>
                                      
          
    
                                        <div class="col-md-1" style="margin-top:2vh;">
      
                                                <div class="input-group" style="margin-top:15px; margin-bottom:30px;">
                                                   
                                                    <button type="submit" class="btn btn-primary">Add </button>
                                                </div>
                                        </div> </div>  
                                    </div>
                                </div>
                                </form>
                     

                          <div>
                           <div class="row">
                             <div class="col-md-12" style="margin-top:-15px;">
                                <div class="panel panel-default">
            
                                    <div class="col-md-12" style="margin-top:15px;">
                                        <h5 class="panel-title" style="color:#FFFFFF; background-color:#0a0536; width:100%; font-size:14px;" align="center"><i class="fa fa-users"></i> Coupon</h5>
                                      
                                    <div class="panel-body" style="margin-top:-10px; margin-bottom:-15px;">
                                        <table class="table datatable">
                                            <thead>
                                                <tr>
                                                    
                                                    <th>Sr.no</th>
                                                    <th>Select Vendor </th>
                                                    <th>Coupon Name</th>
                                                    <th>Coupon Code</th>
                                                    <th>Discount Type</th>
                                                    <th>Value</th>
                                                    <th>Minimum Order Amount</th>
                                                 <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($coupon as $coupon)
                                                 <tr>
                                                 <td>{{$loop->index+1}}</td>
                                                    <td>{{$coupon->Restro_Name}}</td>
                                                    <td>{{$coupon->Coupon_Name}}</td>
                                                    <td>{{$coupon->Coupon_Code}}</td>
                                                    <td>{{$coupon->Discount_Type}}</td>
                                                    <td>{{$coupon->Value}}</td>
                                                    <td>{{$coupon->Minimum_Order_Amount}}</td>
                                                    
                                                    <td>
                                                  

                                                        <button style="background-color:#0066cc; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit Item"><i class="fa fa-edit" style="margin-left:5px;"></i></button>              
                                                        <a href="{{route('destroy-coupon',$coupon->id)}}"> <button style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Delete Item"><i class="fa fa-trash-o" style="margin-left:5px;"></i></button>  </a>                                            
                                                    </td>
                                                </tr>
                                              
                                                @endforeach 
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                                    
                                    <div class="col-md-3" style="margin-top:15px;"></div>
                                    
                                    
                                </div>
                               
    
                            </div>
                        </div>            
                        
                   </div>
        </div>            
       
    </div>




 @stop