
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
                                            <h6 style="color:#000; background-color:#FFCC00; width:15%; min-height:25px; padding-top:5px;" align="center"><span class=""></span> <strong>Vendor-Registration</strong></h6>
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
                                <h5 class="panel-title" style="color:#FFFFFF; background-color:#0a0536; width:100%; font-size:14px;" align="center"><i class="fa fa-users"></i> Vendor-Registration</h5>
                            <div class="panel-body" style="margin-top:-10px; margin-bottom:-5px;">
                                <div class="form-group">
                               
                                    <form role="form"  method="POST" action="{{route('vendor_registration')}}">
                                    {{csrf_field()}}
                                    <div class="col-md-12">
                                        <div class="form-group" style="margin-top:-10px;">   
                                                         
                                            <div class="col-md-2" style="margin-top:15px;">
                                                <label>User Name<font color="#FF0000">*</font></label>
                                                <input type="text" placeholder=" User Name" class="form-control" name="user_name" required input/>
                                            </div>

                                         
                                            <div class="col-md-2" style="margin-top:15px;">
                                                <label>Id<font color="#FF0000">*</font></label>
                                                <input type="text" placeholder=" Id" class="form-control" name="id" required input/>
                                            </div>

                                             
                                            <div class="col-md-2" style="margin-top:15px;">
                                                <label>Password<font color="#FF0000">*</font></label>
                                                <input type="text" placeholder=" Password" class="form-control" name="password" required input/>
                                            </div>

                                            <div class="col-md-2" style="margin-top:15px;">
                                                <label>Contact No<font color="#FF0000">*</font></label>
                                                <input type="text" placeholder=" Contact No." class="form-control" name="contact_no" required input/>
                                            </div>


                                           
                                            <div class="col-md-2" style="margin-top:15px;">
                                                <label>Latitude<font color="#FF0000">*</font></label>
                                                <input type="text" placeholder=" Latitude" class="form-control" name="latitude" required input/>
                                            </div>

                                            <div class="col-md-2" style="margin-top:15px;">
                                                <label>Longitude<font color="#FF0000">*</font></label>
                                                <input type="text" placeholder="longitude" class="form-control" name="longitude" required input/>
                                            </div>
                                           </div>     
    
                                        <div class="col-md-1" style="margin-top:2vh; padding-left:49%;">
      
                                                <div class="input-group" style="margin-top:0px; margin-bottom:30px;">
                                                   
                                                    <button type="submit" class="btn btn-primary"> Submit </button>
                                                </div>
                                        </div> 
                                    </div>
                                </div>
                                </form>
                            </div>
                          </div>
                     
                        </div>
              </div>
                     

                          <div>
                           <div class="row">
                             <div class="col-md-12" style="margin-top:-15px;">
                                <div class="panel panel-default">
            
                                    <div class="col-md-12" style="margin-top:15px;">
                                        <h5 class="panel-title" style="color:#FFFFFF; background-color:#0a0536; width:100%; font-size:14px;" align="center"><i class="fa fa-users"></i> Vendor-Registration</h5>
                                      
                                    <div class="panel-body" style="margin-top:-10px; margin-bottom:-15px;">
                                        <table class="table datatable">
                                            <thead>
                                                <tr>
                                                    
                                                    <th>Sr.no</th>
                                                    <th>User Name</th>
                                                    <th>ID</th>
                                                    <th>Password</th>
                                                    <th>Contact No.</th>
                                                    <th>Latitude</th>
                                                    <th>Longitude</th>
                                                 <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($vendor as $vendor)
                                                 <tr>
                                                    <td>{{$loop->index+1}}</td>
                                                    <td>{{$vendor->User_Name}}</td>
                                                    <td>{{$vendor->Em_Id}}</td>
                                                    <td>{{$vendor->Password}}</td>
                                                    <td>{{$vendor->Contact_No}}</td>
                                                    <td>{{$vendor->Latitude}}</td>
                                                    <td>{{$vendor->Longitude}}</td>
                                                    
                                                    <td>
                                                    <a href="{{route('destroy-vendor',$vendor->id)}}">
                                                        <button style="background-color:#0066cc; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit Item"><i class="fa fa-edit" style="margin-left:5px;"></i></button>              
                                                        <button style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Delete Item"><i class="fa fa-trash-o" style="margin-left:5px;"></i></button>                                              
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