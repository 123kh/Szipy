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
                                            <h6 style="color:#000; background-color:#FFCC00; width:15%; min-height:25px; padding-top:5px;" align="center"><span class=""></span> <strong> Assign Item To</strong></h6>
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
                                <h5 class="panel-title" style="color:#FFFFFF; background-color:#0a0536; width:100%; font-size:14px;" align="center"><i class="fa fa-users"></i> Assign Item To</h5>
                            <div class="panel-body" style="margin-top:-10px; margin-bottom:-5px;">
                                <div class="form-group">
                               
                                    <form role="form"  method="POST" action="{{route('assign_item')}}">
                                    {{csrf_field()}}
                                    <div class="col-md-12">
                                        <div class="col-md-4"></div>
                                        <div class="form-group" style="margin-top:-10px;">   
                                                         
                                         
                                            <div class="col-sm-2" style="margin-top: 15px;">
                                                <div class="form-group ">
                                                    <label>Restro Name<font color="#FF0000">*</font></label>
                                                    <select class="form-control select" data-live-search="true" name="restro_name">
                                                    <option value="select">Select</option>
                                        @foreach ($restro as $restros)
                                                  <option value="{{$restros->id}}">{{$restros->Restro_Name}}</option>
                                           @endforeach
                                        </select>
                                                </div>
                                            </div>

                                            <div class="col-md-2" style="margin-top:15px;">
                                                <label>Main Category<font color="#FF0000">*</font></label>
                                                <select class="form-control select" data-live-search="true" name="main_category">
                                                <option value="select">Select</option>
                                        @foreach ($maincategory as $maincategorys)
                                                  <option value="{{$maincategorys->id}}">{{$maincategorys->main}}</option>
                                           @endforeach
                                        </select>
</div>
                                        </div>


    
                                       </div>     

    
                                        
                                    </div>

                                    
                                    <div class="col-sm-1" style="margin-left:27%; margin-top:5px;">
                                        <div class="form-group ">
                                            <label class="check"><input type="checkbox" class="icheckbox" checked="checked"/>Manda</label>

                                        </div>
                                   </div>   
                                    <div class="col-sm-1" style="margin-top:5px ;" >
                                        <div class="form-group ">
                                            <label class="check"><input type="checkbox" class="icheckbox" checked="checked"/>Cake</label>

                                        </div>
                                   </div>     

                                   <div class="col-sm-2" style="margin-top:5px ;">
                                    <div class="form-group ">
                                        <label class="check"><input type="checkbox" class="icheckbox" checked="checked"/>Other Food</label>

                                    </div>
                                </div>

                                <div class="col-md-1" >
      
                                    <div class="input-group" style="margin-top:5px; margin-bottom:30px;">
                                       
                                        <button type="submit" class="btn btn-primary">Add </button>
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
                                        <h5 class="panel-title" style="color:#FFFFFF; background-color:#0a0536; width:100%; font-size:14px;" align="center"><i class="fa fa-users"></i> Assign Item To</h5>
                                      
                                    <div class="panel-body" style="margin-top:-10px; margin-bottom:-15px;">
                                        <table class="table datatable">
                                            <thead>
                                                <tr>
                                                    
                                                    <th>Sr.no</th>
                                                    <th>Restro Name</th>
                                                    <th>Main Category</th>
                                                
                                               <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($assign as $assign)
                                                 <tr>
                                                    <td>{{$loop->index+1}}</td>
                                                    <td>{{$assign->Restro_Name}}</td>
                                                    <td>{{$assign->main}}</td>
                                                    <td>
                                                    
                                                        <button style="background-color:#0066cc; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit Item"><i class="fa fa-edit" style="margin-left:5px;"></i></button>              
                                                        <a href="{{route('destroy-assign',$assign->id)}}"><button style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Delete Item"><i class="fa fa-trash-o" style="margin-left:5px;"></i></button> </a>                                             
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