<?php 
ini_set( "display_errors", 0);
include 'connection.php';
if(!$_SESSION['udata']){
	header('Location:login.php');
}
if(isset($_GET['logout']))
if($_GET['logout']=='yes'){
	unset($_SESSION['udata']);
	header('Location:login.php');	
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            News Portal-Bluetech
        </title>
        <!--    <link href="http://fonts.googleapis.com/css?family=Lato:100,300,400,700" media="all" rel="stylesheet" type="text/css" />-->
        <link href="css/bootstrap.min.css" media="all" rel="stylesheet" type="text/css" />
        <link href="css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css" />
        <link href="css/se7en-font.css" media="all" rel="stylesheet" type="text/css" />
        <link href="css/isotope.css" media="all" rel="stylesheet" type="text/css" />
        <link href="css/jquery.fancybox.css" media="all" rel="stylesheet" type="text/css" />
        <link href="css/fullcalendar.css" media="all" rel="stylesheet" type="text/css" />
        <link href="css/wizard.css" media="all" rel="stylesheet" type="text/css" />
        <link href="css/select2.css" media="all" rel="stylesheet" type="text/css" />
        <link href="css/morris.css" media="all" rel="stylesheet" type="text/css" />
        <link href="css/datatables.css" media="all" rel="stylesheet" type="text/css" />
        <link href="css/datepicker.css" media="all" rel="stylesheet" type="text/css" />
        <link href="css/timepicker.css" media="all" rel="stylesheet" type="text/css" />
        <link href="css/colorpicker.css" media="all" rel="stylesheet" type="text/css" />
        <link href="css/bootstrap-switch.css" media="all" rel="stylesheet" type="text/css" />
        <link href="css/bootstrap-editable.css" media="all" rel="stylesheet" type="text/css" />
        <link href="css/daterange-picker.css" media="all" rel="stylesheet" type="text/css" />
        <link href="css/typeahead.css" media="all" rel="stylesheet" type="text/css" />
        <link href="css/summernote.css" media="all" rel="stylesheet" type="text/css" />
        <link href="css/ladda-themeless.min.css" media="all" rel="stylesheet" type="text/css" />
        <link href="css/social-buttons.css" media="all" rel="stylesheet" type="text/css" />
        <link href="css/pygments.css" media="all" rel="stylesheet" type="text/css" />
        <link href="new/ckeditor/contents.css" media="all" rel="stylesheet" type="text/css" />
        <link href="css/style.css" media="all" rel="stylesheet" type="text/css" />
        <link href="css/color/green.css" media="all" rel="alternate stylesheet" title="green-theme" type="text/css" />
        <link href="css/color/orange.css" media="all" rel="alternate stylesheet" title="orange-theme" type="text/css" />
        <link href="css/color/magenta.css" media="all" rel="alternate stylesheet" title="magenta-theme" type="text/css" />
        <link href="css/color/gray.css" media="all" rel="alternate stylesheet" title="gray-theme" type="text/css" />
        <link href="css/jquery.fileupload-ui.css" media="screen" rel="stylesheet" type="text/css" />
        <link href="css/dropzone.css" media="screen" rel="stylesheet" type="text/css" />
        <script src="js/jquery-1.10.2.min.js" type="text/javascript"></script>
        <script src="js/jquery-ui.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript">
        </script>
        <script src="js/raphael.min.js" type="text/javascript">
        </script>
        <script src="js/selectivizr-min.js" type="text/javascript"></script>
        <script src="js/jquery.mousewheel.js" type="text/javascript"></script>
        <script src="js/jquery.vmap.min.js" type="text/javascript"></script>
        <script src="js/jquery.vmap.sampledata.js" type="text/javascript"></script>
        <script src="js/jquery.vmap.world.js" type="text/javascript"></script>
        <script src="js/jquery.bootstrap.wizard.js" type="text/javascript"></script>
        <script src="js/fullcalendar.min.js" type="text/javascript"></script>
        <script src="js/gcal.js" type="text/javascript"></script>
        <script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="js/datatable-editable.js" type="text/javascript"></script>
        <script src="js/jquery.easy-pie-chart.js" type="text/javascript"></script>
        <script src="js/excanvas.min.js" type="text/javascript"></script>
        <script src="js/jquery.isotope.min.js" type="text/javascript"></script>
        <script src="js/isotope_extras.js" type="text/javascript"></script>
        <script src="js/modernizr.custom.js" type="text/javascript"></script>
        <script src="js/jquery.fancybox.pack.js" type="text/javascript"></script>
        <script src="js/select2.js" type="text/javascript"></script>
        <script src="js/styleswitcher.js" type="text/javascript"></script>
        <script src="js/wysiwyg.js" type="text/javascript"></script>
        <script src="js/typeahead.js" type="text/javascript"></script>
        <script src="js/summernote.min.js" type="text/javascript"></script>
        <script src="js/jquery.inputmask.min.js" type="text/javascript"></script>
        <script src="js/jquery.validate.js" type="text/javascript"></script>
        <script src="js/bootstrap-fileupload.js" type="text/javascript"></script>
        <script src="js/bootstrap-datepicker.js" type="text/javascript"></script>
        <script src="js/bootstrap-timepicker.js" type="text/javascript"></script>
        <script src="js/bootstrap-colorpicker.js" type="text/javascript"></script>
        <script src="js/bootstrap-switch.min.js" type="text/javascript"></script>
        <script src="js/typeahead.js" type="text/javascript"></script>
        <script src="js/spin.min.js" type="text/javascript"></script>
        <script src="js/ladda.min.js" type="text/javascript"></script>
        <script src="js/moment.js" type="text/javascript"></script>
        <script src="js/mockjax.js" type="text/javascript"></script>
        <script src="js/bootstrap-editable.min.js" type="text/javascript"></script>
        <script src="js/xeditable-demo-mock.js" type="text/javascript"></script>
        <script src="js/xeditable-demo.js" type="text/javascript"></script>
        <script src="js/address.js" type="text/javascript"></script>
        <script src="js/daterange-picker.js" type="text/javascript"></script>
        <script src="js/date.js" type="text/javascript"></script>
        <script src="js/morris.min.js" type="text/javascript"></script>
        <script src="js/skycons.js" type="text/javascript"></script>
        <script src="js/fitvids.js" type="text/javascript"></script>
        <script src="js/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="js/dropzone.js" type="text/javascript"></script>
        <script src="js/main.js" type="text/javascript"></script>
        <script src="new/ckeditor/ckeditor.js" type="text/javascript"></script>
        <script src="new/ckeditor/config.js" type="text/javascript"></script>
        <script src="new/ckeditor/build-config.js" type="text/javascript"></script>
        <script src="new/ckeditor/styles.js" type="text/javascript"></script>
        <script src="new/ckfinder/ckfinder.js" type="text/javascript"></script>
        <script src="js/respond.js" type="text/javascript"></script>
        

        <!--    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">-->
    </head>
    <body class="page-header-fixed bg-1">
        <div class="modal-shiftfix">
            <!-- Navigation -->
            <div class="navbar navbar-fixed-top scroll-hide">
                <div class="container-fluid top-bar">
                    <div class="pull-right">
                        <ul class="nav navbar-nav pull-right">
                            
                            <li class="dropdown user hidden-xs"><a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                 </a>
<!--                                <ul class="dropdown-menu">
                                   
                                    <li><a href="index.php?p=accountsetting">
                                            <i class="fa fa-gear"></i>Account Settings</a>
                                    </li>
                                    <li><a href="index.php?logout=yes">
                                            <i class="fa fa-sign-out"></i>Logout</a>
                                    </li>
                                </ul>-->
                            </li>
                        </ul>
                    </div>
                    <div class="pull-right">
                        <ul class="nav navbar-nav pull-right">
                            
                            <li class="dropdown user hidden-xs"><a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                    <img width="34" height="34" src="images/avatar-male.jpeg" />Admin<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                   
                                    <li><a href="index.php?p=accountsetting">
                                            <i class="fa fa-gear"></i>Account Settings</a>
                                    </li>
                                    <li><a href="index.php?logout=yes">
                                            <i class="fa fa-sign-out"></i>Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <button class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="logo" href="index.php"></a>
                </div>
                <div class="container-fluid main-nav clearfix">
                    <div class="nav-collapse">
                        <ul class="nav">
                            <li>
                                <a class="current" href="index.php"><span aria-hidden="true" class="se7en-home"></span>Dashboard</a>
                            </li>
                                                        
                             <li class="dropdown"><a data-toggle="dropdown" href="#">
                                    <span aria-hidden="true" class="se7en-tables"></span>Today Images<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="index.php?p=addtodayimage">Add</a>
                                    </li>
                                    <li>
                                        <a href="index.php?p=viewtodayimage">View/Edit</a>
                                    </li>
                                    
                                </ul>
                            </li>
                            <li class="dropdown"><a data-toggle="dropdown" href="#">
                                    <span aria-hidden="true" class="se7en-forms"></span>News<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="index.php?p=addnews">Add</a>
                                    </li>
                                    <li>
                                        <a href="index.php?p=viewnews">View/Edit</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown"><a data-toggle="dropdown" href="#">
                                    <span aria-hidden="true" class="se7en-tables"></span>Banner<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="index.php?p=addbanner">Add</a>
                                    </li>
                                    <li>
                                        <a href="index.php?p=viewbanner">View/Edit</a>
                                    </li>
                                    
                                </ul>
                            </li>
                            
                            <li class="dropdown"><a data-toggle="dropdown" href="#">
                                    <span aria-hidden="true" class="se7en-pages"></span>Pages<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="index.php?p=addpage">
                                          Add
                                           </a>

                                    </li>
                                    <li>
                                        <a href="index.php?p=viewpage">View/Edit</a>
                                    </li>
                                    
                                    
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Navigation -->
            <!--      <div class="container-fluid main-content">
                     Statistics 
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="widget-container stats-container">
                          <div class="col-md-3">
                            <div class="number">
                              <div class="icon globe"></div>
                              86<small>%</small>
                            </div>
                            <div class="text">
                              Overall growth
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="number">
                              <div class="icon visitors"></div>
                              613
                            </div>
                            <div class="text">
                              Unique visitors
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="number">
                              <div class="icon money"></div>
                              <small>$</small>924
                            </div>
                            <div class="text">
                              Sales
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="number">
                              <div class="icon chat-bubbles"></div>
                              325
                            </div>
                            <div class="text">
                              New followers
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                     End Statistics 
                    <div class="row">
                       Weather 
                      <div class="col-md-8">
                        <div class="widget-container weather">
                          <div class="widget-content padded">
                            <div class="row text-center">
                              <div class="col-sm-6 col-md-6 col-lg-4 today">
                                <p>
                                  TODAY
                                </p>
                                <canvas class="skycons-element" data-skycons="RAIN" height="100" id="rain" width="100"></canvas>
                                <div class="number">
                                  72<small>&deg;</small>
                                </div>
                                <p class="location">
                                  Washington, D.C.
                                </p>
                              </div>
                              <div class="col-sm-2 hidden-xs">
                                <p>
                                  MON
                                </p>
                                <canvas class="skycons-element" data-skycons="CLEAR_DAY" height="60" id="clear-day" width="60"></canvas>
                                <div class="number">
                                  86<small>&deg;</small>
                                </div>
                              </div>
                              <div class="col-sm-2 hidden-xs">
                                <p>
                                  TUE
                                </p>
                                <canvas class="skycons-element" data-skycons="RAIN" height="60" id="cloudy" width="60"></canvas>
                                <div class="number">
                                  75<small>&deg;</small>
                                </div>
                              </div>
                              <div class="col-sm-2 hidden-xs">
                                <p>
                                  WED
                                </p>
                                <canvas class="skycons-element" data-skycons="PARTLY_CLOUDY_DAY" height="60" id="partly-cloudy-day" width="60"></canvas>
                                <div class="number">
                                  82<small>&deg;</small>
                                </div>
                              </div>
                              <div class="col-sm-2 hidden-md hidden-sm hidden-xs">
                                <p>
                                  THU
                                </p>
                                <canvas class="skycons-element" data-skycons="SLEET" height="60" id="sleet" width="60"></canvas>
                                <div class="number">
                                  64<small>&deg;</small>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                       end Weather  Bar Graph 
                      <div class="col-md-4">
                        <div class="widget-container small">
                          <div class="heading">
                            <i class="fa fa-signal"></i>New sign ups<i class="fa fa-list pull-right"></i><i class="fa fa-refresh pull-right"></i>
                          </div>
                          <div class="widget-content padded">
                            <div class="bar-chart-widget">
                              <div class="chart-graph">
                                <div id="barcharts">
                                  Loading...
                                </div>
                                <ul class="chart-text-axis">
                                  <li>
                                    1
                                  </li>
                                  <li>
                                    2
                                  </li>
                                  <li>
                                    3
                                  </li>
                                  <li>
                                    4
                                  </li>
                                  <li>
                                    5
                                  </li>
                                  <li>
                                    6
                                  </li>
                                  <li>
                                    7
                                  </li>
                                  <li>
                                    8
                                  </li>
                                  <li>
                                    9
                                  </li>
                                  <li>
                                    10
                                  </li>
                                  <li>
                                    11
                                  </li>
                                  <li>
                                    12
                                  </li>
                                  <li>
                                    13
                                  </li>
                                  <li>
                                    14
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                       End Bar Graph 
                    </div>
                    <div class="row">
                       Area Charts:Morris 
                      <div class="col-md-6">
                        <div class="widget-container fluid-height">
                          <div class="heading">
                            <i class="fa fa-bar-chart-o"></i>Area Chart
                          </div>
                          <div class="widget-content padded text-center">
                            <div class="graph-container">
                              <div class="caption"></div>
                              <div class="graph" id="hero-area"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                       Area Charts:Morris  Chat 
                      <div class="col-md-6">
                        <div class="widget-container scrollable chat" style="height: 427px;">
                          <div class="heading">
                            <i class="fa fa-comments"></i>Chat Widget<i class="fa fa-smile-o pull-right"></i>
                          </div>
                          <div class="widget-content padded">
                            <ul>
                              <li>
                                <img width="30" height="30" src="images/avatar-male.jpg" />
                                <div class="bubble">
                                  <a class="user-name" href="">John Smith</a>
                                  <p class="message">
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.
                                  </p>
                                  <p class="time">
                                    <strong>Today </strong>3:53 pm
                                  </p>
                                </div>
                              </li>
                              <li class="current-user">
                                <img width="30" height="30" src="images/avatar-female.jpg" />
                                <div class="bubble">
                                  <a class="user-name" href="">Jane Smith</a>
                                  <p class="message">
                                    Donec odio. Quisque volutpat mattis eros.
                                  </p>
                                  <p class="time">
                                    <strong>Today </strong>3:53 pm
                                  </p>
                                </div>
                              </li>
                              <li>
                                <img width="30" height="30" src="images/avatar-male.jpg" />
                                <div class="bubble">
                                  <a class="user-name" href="">John Smith</a>
                                  <p class="message">
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros.
                                  </p>
                                  <p class="time">
                                    <strong>Today </strong>3:53 pm
                                  </p>
                                </div>
                              </li>
                              <li>
                                <img width="30" height="30" src="images/avatar-male.jpg" />
                                <div class="bubble">
                                  <a class="user-name" href="">John Smith</a>
                                  <p class="message">
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros.
                                  </p>
                                  <p class="time">
                                    <strong>Today </strong>3:53 pm
                                  </p>
                                </div>
                              </li>
                            </ul>
                          </div>
                          <div class="post-message">
                            <input class="form-control" placeholder="Write your message hereâ€¦" type="text"><input type="submit" value="Send">
                          </div>
                        </div>
                      </div>
                       End Chat 
                    </div>
                    <div class="row">
                       Pie Graph 1 
                      <div class="col-lg-5">
                        <div class="widget-container fluid-height">
                          <div class="heading">
                            <i class="fa fa-bar-chart-o"></i>Donut Charts
                          </div>
                          <div class="widget-content clearfix">
                            <div class="col-sm-6">
                              <div class="pie-chart1 pie-chart pie-number" data-percent="87">
                                87%
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="pie-chart2 pie-chart pie-number" data-percent="26">
                                26%
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-7">
                        <div class="widget-container fluid-height">
                           Table 
                          <table class="table table-filters">
                            <tbody>
                              <tr>
                                <td class="filter-category blue">
                                  <div class="arrow-left"></div>
                                  <i class="fa fa-stethoscope"></i>
                                </td>
                                <td>
                                  National Distribution Co.
                                </td>
                                <td>
                                  $9204
                                </td>
                                <td class="hidden-xs">
                                  <div class="sparkslim">
                                    50,55,60,40,30,35,30,20,25,30,40,20,15
                                  </div>
                                </td>
                                <td>
                                  <div class="danger">
                                    -4%
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td class="filter-category green">
                                  <div class="arrow-left"></div>
                                  <i class="fa fa-coffee"></i>
                                </td>
                                <td>
                                  Star Organization Co.
                                </td>
                                <td>
                                  $23,890
                                </td>
                                <td class="hidden-xs">
                                  <div class="sparkslim">
                                    5,10,15,50,80,50,40,30,50,60,70,75,75
                                  </div>
                                </td>
                                <td>
                                  <div class="success">
                                    +12%
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td class="filter-category orange">
                                  <div class="arrow-left"></div>
                                  <i class="fa fa-gamepad"></i>
                                </td>
                                <td>
                                  Companysoft, LLC
                                </td>
                                <td>
                                  $10,995
                                </td>
                                <td class="hidden-xs">
                                  <div class="sparkslim">
                                    100,100,80,70,40,20,20,40,50,60,70
                                  </div>
                                </td>
                                <td>
                                  <div class="success">
                                    +5%
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td class="filter-category red">
                                  <div class="arrow-left"></div>
                                  <i class="fa fa-gift"></i>
                                </td>
                                <td>
                                  Craft Co.
                                </td>
                                <td>
                                  $6,790
                                </td>
                                <td class="hidden-xs">
                                  <div class="sparkslim">
                                    5,10,15,20,30,40,80,100,120,120,140
                                  </div>
                                </td>
                                <td>
                                  <div class="success">
                                    +26%
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td class="filter-category blue">
                                  <div class="arrow-left"></div>
                                  <i class="fa fa-stethoscope"></i>
                                </td>
                                <td>
                                  National Distribution Co.
                                </td>
                                <td>
                                  $9204
                                </td>
                                <td class="hidden-xs">
                                  <div class="sparkslim">
                                    50,55,60,40,30,35,30,20,25,30,40,20,15
                                  </div>
                                </td>
                                <td>
                                  <div class="danger">
                                    -4%
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td class="filter-category magenta">
                                  <div class="arrow-left"></div>
                                  <i class="fa fa-trophy"></i>
                                </td>
                                <td>
                                  Fastnation Co.
                                </td>
                                <td>
                                  $22,156
                                </td>
                                <td class="hidden-xs">
                                  <div class="sparkslim">
                                    20,40,50,60,70,80,90,95,100,80,70,60
                                  </div>
                                </td>
                                <td>
                                  <div class="danger">
                                    -4%
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                       End Pie Graph 1 
                    </div>
                  </div>-->

            <?php
            if (file_exists($_GET['p']) . '.php' && $_GET['p']) {

                include $_GET['p'] . '.php';
            } else {
                include 'dashboard.php';
            }
            ?>
        </div>
        
    </body>
</html>