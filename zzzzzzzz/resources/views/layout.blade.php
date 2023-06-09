<!DOCTYPE html>
<html lang="en">
<head>        
        <!-- META SECTION -->
        <title>SZIPY</title>                
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="../../logo/fav1.png" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="../../css/theme-default.css"/>
        <link rel="stylesheet" type="text/css" id="theme" href="../../css/notification.css"/>
        <!-- EOF CSS INCLUDE -->                                     
    </head>
    <body>
        <!-- START PAGE CONTAINER -->
       <div class="page-container page-navigation-top">            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
                
                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal">
                    <li class="xn-logo" style="margin-right:30px;">
                        <a> <img src="../../logo/logo.png" alt="EMR - OPD Software" style="margin-top:-15px;"/></a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>

                     
                    <li class="xn-openable">
                        <a href="#" title="Master Entries"><span class="fa fa-list"></span>Masters</a>
                        <ul>
                            <li><a href="{{route('maincategory')}}" title="Master Entries"><span class="fa fa-cog"></span>Main-Category</a></li>
                            <li><a href="{{route('restro')}}" title="Master Entries"><span class="fa fa-cog"></span>Restro/Vendor</a> </li>
                            <li><a href="{{route('item')}}" title="Master Entries"><span class="fa fa-cog"></span>Item Master</a>
                            <li><a href="{{route('additem')}}" title="Master Entries"><span class="fa fa-cog"></span>Add Item</a>

                                <!-- <li><a href="{{route('vendor')}}" title="Master Entries"><span class="fa fa-cog"></span>Vendor Registration</a> -->
                                    <li><a href="{{route('city')}}" title="Master Entries"><span class="fa fa-cog"></span>City</a>
                                    <li><a href="{{route('area')}}" title="Master Entries"><span class="fa fa-cog"></span>Area</a>
                                    
                            <li><a href="{{route('assignarea')}}" title="Master Entries"><span class="fa fa-cog"></span>Assign Area</a>
                                        <li><a href="{{route('delivery')}}" title="Master Entries"><span class="fa fa-cog"></span>Delivery Boy</a>
                                        <li><a href="{{route('slider')}}" title="Master Entries"><span class="fa fa-cog"></span>Slider</a>
                            </li>
                        </ul>
                    </li>
                    <li class="xn-openable">
                        <a href="{{route('internal')}}"><span class="fa fa-bell"></span>Internal Notification</a>
                     
                    </li>

                    <li class="xn-openable">
                        <a href="{{route('assign')}}"><span class="fa fa-cog"></span>Asign Items To</a>
                     
                    </li>
                    <li class="xn-openable">
                        <a href="report.html"><span class="fa fa-book" ></span>Reports</a><li class="report">
                     
                    </li>

                 
                    <li class="xn-openable">
                        <a href="{{route('coupon')}}"><span class="fa fa-cog"></span>Coupon</a>
                     
                    </li>
                    <li class="xn-icon-button pull-right">
                        <a href="{{route('logout')}}" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>                        
                    </li>
                    <!-- MESSAGES -->
                    <li class="xn-icon-button pull-right" style="margin-right:25px; min-width:100px; color:#FFFFFF; padding-top:20px;">
                        Welcome, SZIPY
                    </li>
                    
                </ul>
                

                @yield('content')

                     
        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="{{route('logout')}}" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->             
        
    <!-- START SCRIPTS -->
        <script type="text/javascript" src="../../js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="../../js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="../../js/plugins/bootstrap/bootstrap.min.js"></script>                
        <!-- END PLUGINS -->
        
        <!-- THIS PAGE PLUGINS -->    
        <script type='text/javascript' src='../../js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="../../js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        
        
        
        <script type="text/javascript" src="../../js/plugins/bootstrap/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="../../js/plugins/bootstrap/bootstrap-timepicker.min.js"></script>
        <script type="text/javascript" src="../../js/plugins/bootstrap/bootstrap-colorpicker.js"></script>
        <script type="text/javascript" src="../../js/plugins/bootstrap/bootstrap-file-input.js"></script>
        <script type="text/javascript" src="../../js/plugins/bootstrap/bootstrap-select.js"></script>
        <script type="text/javascript" src="../../js/plugins/tagsinput/jquery.tagsinput.min.js"></script>
        
        
        <script type="text/javascript" src="../../js/plugins/datatables/jquery.dataTables.min.js"></script>    

        
        <script type="text/javascript" src="../../js/plugins/dropzone/dropzone.min.js"></script>
        <script type="text/javascript" src="../../js/plugins/fileinput/fileinput.min.js"></script>        
        <script type="text/javascript" src="../../js/plugins/filetree/jqueryFileTree.js"></script>
        <!-- END PAGE PLUGINS -->
        
      
        
        
        <!-- START TEMPLATE -->
    
        
        <script type="text/javascript" src="../../js/plugins.js"></script>        
        <script type="text/javascript" src="../../js/actions.js"></script>
        <!-- END TEMPLATE -->
        
        
        <script>
            $(function(){
                $("#file-simple").fileinput({
                        showUpload: false,
                        showCaption: false,
                        browseClass: "btn btn-danger",
                        fileType: "any"
                });            
                $("#filetree").fileTree({
                    root: '/',
                    
                    expandSpeed: 100,
                    collapseSpeed: 100,
                    multiFolder: false                    
                }, function(file) {
                    alert(file);
                }, function(dir){
                    setTimeout(function(){
                        page_content_onresize();
                    },200);                    
                });                
            });            
        </script>
  
    </body>
</html>
