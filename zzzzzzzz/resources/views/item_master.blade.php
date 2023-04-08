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
                                            <h6 style="color:#000; background-color:#FFCC00; width:15%; min-height:25px; padding-top:5px;" align="center"><span class=""></span> <strong>Item Master</strong></h6>
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
                                <h5 class="panel-title" style="color:#FFFFFF; background-color:#0a0536; width:100%; font-size:14px;" align="center"><i class="fa fa-users"></i> Item Master</h5>
                            <div class="panel-body" style="margin-top:-10px; margin-bottom:-5px;">
                                <div class="form-group">
                               
                                    <form role="form"  method="POST" action="{{route('item_master')}}">
                                    {{csrf_field()}}
                                    <div class="col-md-12">
                                        <div class="form-group" style="margin-top:-10px;">   
                                                         
                                         
                                            <div class="col-sm-2" style="margin-top: 15px;">
                                                <div class="form-group ">
                                                    <label>Main Category<font color="#FF0000">*</font></label>
                                               


                                                       
                                                    <select class="form-control select" data-live-search="true" name="main_category">
                                                        <option value="select">Select</option>
                                                @foreach ($mains as $data)
                                                                        <option value="{{ $data->id }}">
                                                                            {{$data->main}}
                                                                        </option>
                                                                    @endforeach
                                        </select>
                                                        
                                                </div>
                                            </div>
                                         

                                            <div class="col-sm-2" style="margin-top: 15px;">
                                                <div class="form-group ">
                                                    <label>Item Name<font color="#FF0000">*</font></label>
                                                    <input type="text" placeholder=" Enter Here" class="form-control" name="item_name" required input/>

                                                </div>
                                            </div>
                                         
                                            <div class="col-sm-2" style="margin-top: 15px;">
                                                <div class="form-group ">
                                                    <label>Other Food<font color="#FF0000">*</font></label>
                                                    <input type="text" placeholder=" Enter Here" class="form-control" name="other_food" required input/>

                                                </div>
                                            </div>
                                         
                                                
                                                
                                           </div>     
    
                                        <div class="col-md-1" style="margin-top:2vh;">
      
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
                                        <h5 class="panel-title" style="color:#FFFFFF; background-color:#0a0536; width:100%; font-size:14px;" align="center"><i class="fa fa-users"></i> Item Master</h5>
                                      
                                    <div class="panel-body" style="margin-top:-10px; margin-bottom:-15px;">
                                        <table class="table datatable">
                                            <thead>
                                                <tr>
                                                    
                                                    <th>Sr.no</th>
                                                    <th>Main Category</th>
                                                    <th>Item Name</th>
                                                    <th>Other Food</th>
                                                
                                               <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($item as $item)
                                                 <tr>
                                                    <td>{{$loop->index+1}}</td>
                                                    <td>{{$item->main}}</td>
                                                    <td>{{$item->Item_Name}}</td>
                                                   <td>{{$item->Other_Food}}</td>
                                                    <td>
                                                    
                                                        <button style="background-color:#0066cc; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit Item"><i class="fa fa-edit" style="margin-left:5px;"></i></button>              
                                                        <a href="{{route('destroy-item',$item->id)}}"><button style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Delete Item"><i class="fa fa-trash-o" style="margin-left:5px;"></i></button>                                              
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