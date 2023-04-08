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
                                <h6 style="color:#000; background-color:#FFCC00; width:15%; min-height:25px; padding-top:5px;" align="center"><span class=""></span> <strong>Main Category</strong></h6>
                            </div>  
                       </div>      
                   </div>           
                             
                    
                </div>
            </div>
        </div>
    </div>

  <div class="row">
    <div class="col-md-3"></div>

        <div class="col-md-6" >
     
            <div class="panel panel-default">
                    <h5 class="panel-title" style="color:#FFFFFF; background-color:#0a0536; width:100%; font-size:14px;" align="center"><i class="fa fa-users"></i> Main-Category</h5>
                <div class="panel-body" style="margin-top:-10px; margin-bottom:-5px;">
                    <div class="form-group">
                   
                        <form role="form" method="POST" action="{{route('main_category')}}">
                            {{csrf_field()}}
                        <div class="col-md-12">
                            <div class="form-group" style="margin-top:-10px;">   
                                             
                             <div class="col-md-3"></div>
                                <div class="col-md-4" style="margin-top: 15px;">
                                    <div class="form-group ">
                                        <label>Main Category<font color="#FF0000">*</font></label>
                                        <input type="text" placeholder="Main-Category"  name="main" class="form-control" required input/>

                                    </div>
                                </div>
                       
                                    
                                    
                               </div>     

                            <div class="col-md-1" style="margin-top:2vh;">

                                    <div class="input-group" style="margin-top:0px; margin-bottom:30px;">
                                       
                                        <button type="submit" class="btn btn-primary">Add</button>
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
                <div class="col-md-3"></div>
                 <div class="col-md-6" style="margin-top:-15px;">
                    <div class="panel panel-default">

                        <div class="col-md-12" style="margin-top:15px;">
                            <h5 class="panel-title" style="color:#FFFFFF; background-color:#0a0536; width:100%; font-size:14px;" align="center"><i class="fa fa-users"></i> Main-Category</h5>
                          
                        <div class="panel-body" style="margin-top:-10px; margin-bottom:-15px;">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        
                                        <th>Sr.no</th>
                                        <th>Main Category</th>
                                        
                                    
                                   <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($main as $main)
                                     <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$main->main}}</td>
                                      
                                        <td>
                                      
                                        <a href="{{route('edit_main',$main->id)}}">   <button style="background-color:#0066cc; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit Item"><i class="fa fa-edit" style="margin-left:5px;"></i></button> </a>              
                                        <a href="{{route('destroy-main',$main->id)}}"> <button style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Delete Item"><i class="fa fa-trash-o" style="margin-left:5px;"></i></button></a>                                        
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