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
                                            <h6 style="color:#000; background-color:#FFCC00; width:15%; min-height:25px; padding-top:5px;" align="center"><span class=""></span> <strong> Delivery Boy</strong></h6>
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
                                <h5 class="panel-title" style="color:#FFFFFF; background-color:#0a0536; width:100%; font-size:14px;" align="center"><i class="fa fa-map-marker"></i> Delivery Boy</h5>
                            <div class="panel-body" style="margin-top:-10px; margin-bottom:-5px;">
                                <div class="form-group">
                               
                                    <form role="form" method="POST" action="{{route('delivery_boy')}}" >
                                    {{csrf_field()}}

                                    @if(count($errors)>0)
                     <ul class="alert alert-danger">
                         @foreach($errors->all() as $error)
                         <li>{{ $error }} </li>
                         @endforeach
                     </ul>
                     @endif
                                    <div class="col-md-12">
                                        <div class="form-group" style="margin-top:-10px;">   
                                                         
                                            <div class="col-md-2" style="margin-top:15px;">
                                                <label> Name<font color="#FF0000">*</font></label>
                                                <input type="text" placeholder="Name" class="form-control" name="name" required input/>
                                            </div>

                                         
                                            <div class="col-md-2" style="margin-top:15px;">
                                                <label>Contact No<font color="#FF0000">*</font></label>
                                                <input type="number" placeholder=" Contact No" class="form-control" name="contact_no" required input/>
                                            </div>

                                             
                                            <div class="col-md-2" style="margin-top:15px;">
                                                <label>Email Id<font color="#FF0000">*</font></label>
                                                <input type="email" placeholder="Email Id" class="form-control" name="email_id" required input/>
                                            </div>

                                            <div class="col-md-2" style="margin-top:15px;">
                                                <label>Account No.<font color="#FF0000">*</font></label>
                                                <input type="number" placeholder="Account No" class="form-control" name="account_no" required input/>
                                            </div>
                                            <div class="col-md-2" style="margin-top:15px;">
                                                <label>User Name<font color="#FF0000">*</font></label>
                                                <input type="text" placeholder="User Name" class="form-control" name="username" required input/>
                                            </div>

                                            <div class="col-md-2" style="margin-top:15px;">
                                                <label>Password<font color="#FF0000">*</font></label>
                                                <input type="password" placeholder="Password" class="form-control" name="password" required input/>
                                            </div>
                                            <div class="col-md-2" style="margin-top: 15px;">
                                                <div class="form-group ">
                                                    <label>Branch<font color="#FF0000">*</font></label>
                                                    <input type="text" placeholder="Branch" class="form-control" name="branch" required input/>
                                                    <!-- <select id="person_select" name="person_select" class="form-control select" name="branch" multiple="multiple" required="">
                                                <option value="a1"> SBI </option>
                                                <option value="a2"> BOI</option>
                                                <option value="a3">BOM</option>
                                              
                                             </select> -->
                                                </div>
                                                
                                            </div>


                                          
                                           </div>     
    
                                        <div class="col-md-1" style="margin-top:2vh; ">
      
                                                <div class="input-group" style="margin-top:20px; margin-bottom:30px;">
                                                   
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
                                        <h5 class="panel-title" style="color:#FFFFFF; background-color:#0a0536; width:100%; font-size:14px;" align="center"><i class="fa fa-map-marker"></i> Delivery Boy</h5>
                                      
                                    <div class="panel-body" style="margin-top:-10px; margin-bottom:-15px;">
                                        <table class="table datatable">
                                            <thead>
                                                <tr>
                                                    
                                                    <th>Sr.no</th>
                                                    <th>Name</th>
                                                    <th>Contact No</th>
                                                    <th>Email ID</th>
                                                    <th>Account No</th>
                                                    <th>User Name</th>
                                                    <!-- <th>Password</th> -->
                                                    <th>Branch</th>
                                                    
                                                   
                                                 <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($user as $delivery)
                                            
                                                 <tr>
                                                    <td>{{$loop->index+1}}</td>
                                                    <td>{{$delivery->fullname}}</td>
                                                    <td>{{$delivery->mobile_number}}</td>
                                                    <td>{{$delivery->email}}</td>
                                                    <td>{{$delivery->delivery_details->Account_No ?? 'NA'}}</td>
                                                    <td>{{$delivery->username}}</td>
                                                    <!-- <td>{{$delivery->password}}</td> -->
                                                    <td>{{$delivery->delivery_details->Branch ?? 'NA'}}</td>
                                                   
                                                    <td>
                                                    
                                                    <a href="{{route('edit-delivery',$delivery->id)}}"> <button style="background-color:#0066cc; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit Item"><i class="fa fa-edit" style="margin-left:5px;"></i></button>    </a>          
                                                        <a href="{{route('destroy-delivery',$delivery->id)}}">   <button style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Delete Item"><i class="fa fa-trash-o" style="margin-left:5px;"></i></button> </a>                                             
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