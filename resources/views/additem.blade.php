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
                                                <h6 style="color:#000; background-color:#FFCC00; width:15%; min-height:25px; padding-top:5px;" align="center"><span class=""></span> <strong>Add Item</strong></h6>
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
                                    <h5 class="panel-title" style="color:#FFFFFF; background-color:#0a0536; width:100%; font-size:14px;" align="center"><i class="fa fa-users"></i> Add-Item</h5>
                                <div class="panel-body" style="margin-top:-10px; margin-bottom:-5px;">
                                    <div class="form-group">
                                             
                                    @if(count($errors)>0)
                     <ul class="alert alert-danger">
                         @foreach($errors->all() as $error)
                         <li>{{ $error }} </li>
                         @endforeach
                     </ul>
                     @endif

                                    	<form role="form"  method="POST" enctype="multipart/form-data" action="{{route('create_additem')}}">
                                        {{ csrf_field()}}
                                        <div class="col-md-12">
                                            <div class="form-group" style="margin-top:-10px;">   
                                                       
                                            

                                            <div class="col-md-2" style="margin-top:15px;">
                                            <label>Restro Name<font color="#FF0000">*</font></label>
                                            <select class="form-control select" data-live-search="true" name="restro_name">
                                                <option value="">Select</option>
                                                @foreach ($restro as $restros)
                                                    <option value="{{ $restros->id }}">{{ $restros->Restro_Name }}</option>
                                                @endforeach
                                            </select>                         </div>




                                                <div class="col-md-2" style="margin-top:15px;">
                                                	<label>Main Category<font color="#FF0000">*</font></label>
                                                    <select class="form-control select" data-live-search="true" name="main_category">
                                                    <option value="">Select</option>
                                                @foreach ($mains as $data)
                                                                        <option value="{{ $data->id }}">
                                                                            {{$data->main}}
                                                                        </option>
                                                                    @endforeach
                                        </select>                                                </div>

                                             
                                                <div class="col-md-2" style="margin-top:15px;">
                                                <div class="form-group ">
                                                    <label>Item Name<font color="#FF0000">*</font></label>
                                                    <input type="text" placeholder=" Enter Here" class="form-control" name="item_name" required input/>

                                                </div>
                                                </div>

                                                <div class="col-md-2" style="margin-top:15px;">
                                                	<label>Item Rate/Kg<font color="#FF0000">*</font></label>
                                                    <input type="text" placeholder="Item Rate/Kg" class="form-control" name="item_rate" required input/>
                                                </div>

                        
                            
                                            
                                            <div class="col-md-2" style="margin-top:15px;">
                                                <label>Item Rate/Piece<font color="#FF0000">*</font></label>
                                                <input type="text" placeholder=" Item Rate/Piece" class="form-control" name="variant" required input/>
                                            </div> 

                                           
                                                
                                             
                                            <div class="col-md-2" style="margin-top:15px;">
                                                <label>Flavour<font color="#FF0000">*</font></label>
                                                <input type="text" placeholder=" Flavour" class="form-control" name="flavour" required input/>
                                            </div> 

                                            
                                          

                                                <div class="col-md-2" style="margin-top:15px;">
                                                <label>Item Image<font color="#FF0000">*</font></label>
                                                <input type="file" placeholder=" Item Image" class="form-control" name="image" required input/>
                                            </div>

                                            <div class="col-md-3" style="margin-top:15px;">
                                                <label>Description<font color="#FF0000">*</font></label>
                                                 <textarea  class="form-control" name="description" cols="4" rows="2"></textarea>
                                                 </div>

                         
                                            
                                            
                                               <div class="col-md-1" style="margin-top:2vh;">
          

                                                    <div class="input-group" style="margin-top:20px; margin-bottom:30px;">
                                                       
                                                    	<button type="submit" class="btn btn-primary"> Add </button>
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
                                            <h5 class="panel-title" style="color:#FFFFFF; background-color:#0a0536; width:100%; font-size:14px;" align="center"><i class="fa fa-users"></i> Add-Item</h5>
                                          
                                        <div class="panel-body" style="margin-top:-10px; margin-bottom:-15px;">
                                            <table class="table datatable">
                                                <thead>
                                                    <tr>
                                                        
                                                        <th>Sr.no</th>
                                                        <th>Restro Name</th>
                                                        <th>Main Category</th>
                                                        <th>Item Name</th>
                                                        <th>Item Rate/kg</th>
                                                        <!-- <th>Item Rate [For Hotel]</th> -->
                                                        <th>Item Rate/piece</th>
                                                        <th>Flavour</th>
                                                        <th>Item Image</th>
                                                        <th>Description</th>
                                                     <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($additems as $additem)
                                                     <tr>
                                                        <td>{{$loop->index+1}}</td>
                                                        <td>{{$additem->Restro_Name }}</td>
                                                        <td>{{$additem->main}}</td>
                                                        <td>{{$additem->Item_Name}}</td>
                                                        <td>{{$additem->Item_Rate_Retail}}</td>
                                                        <!-- <td>{{$additem->Item_Rate_Hotel}}</td> -->
                                                        <td>{{$additem->Variant}}</td>
                                                        <td>{{$additem->Flavour}}</td>
                                                        <td>
                                                            <a href="{{asset('restro_img/')}}/{{$additem->Item_Image}}">{{$additem->Item_Image}}</a>
                                                            
                                                        </td>
                                                        <td>{{$additem->Description}}</td>
                                                        <td>
                                                        
                                                      
                                                        <a href="{{route('edit-additem',$additem->id)}}">  <button style="background-color:#0066cc; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit Item"><i class="fa fa-edit" style="margin-left:5px;"></i></button>              
                                                            <a href="{{route('destroy-additem',$additem->id)}}"> <button style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Delete Item"><i class="fa fa-trash-o" style="margin-left:5px;"></i></button></a>                                           
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