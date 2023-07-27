<?php
ini_set( "display_errors", 0);
include('connection.php');

if(isset($_POST['Login'])){
		$sql="select * from login where username='".$_POST['username']."'";
		$q=mysql_query($sql) or die(mysql_error());
		$r=mysql_fetch_assoc($q);
		if($r['id'] && $r['password']==$_POST['password']){
			$_SESSION['udata']=$r;
			header('Location:index.php');
		} else{
                    echo '<script>alert("Username & Password Invalid");</script>';
                }
}
if($_SESSION['udata']){
	header('Location:index.php');
	exit;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>
            News Portal-Bluetech
        </title>
<!--        <link href="http://fonts.googleapis.com/css?family=Lato:100,300,400,700" media="all" rel="stylesheet" type="text/css" />-->
        <link href="css/bootstrap.min.css" media="all" rel="stylesheet" type="text/css" />
        <link href="css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css" />
        <link href="css/se7en-font.css" media="all" rel="stylesheet" type="text/css" />
        <link href="css/style.css" media="all" rel="stylesheet" type="text/css" />
        <script src="js/jquery-1.10.2.min.js" type="text/javascript"></script>
        <script src="js/jquery-ui.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/raphael.min.js" type="text/javascript"></script>
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
<!--        <script src="js/masonry.min.js" type="text/javascript"></script>-->
        <script src="js/modernizr.custom.js" type="text/javascript"></script>
        <script src="js/jquery.fancybox.pack.js" type="text/javascript"></script>
        <script src="js/select2.js" type="text/javascript"></script>
        <script src="js/styleswitcher.js" type="text/javascript"></script>
        <script src="js/wysiwyg.js" type="text/javascript"></script>
        <script src="js/jquery.inputmask.min.js" type="text/javascript"></script>
        <script src="js/jquery.validate.js" type="text/javascript"></script>
        <script src="js/bootstrap-fileupload.js" type="text/javascript"></script>
        <script src="js/bootstrap-datepicker.js" type="text/javascript"></script>
        <script src="js/bootstrap-timepicker.js" type="text/javascript"></script>
        <script src="js/bootstrap-colorpicker.js" type="text/javascript"></script>
        <script src="js/bootstrap-switch.min.js" type="text/javascript"></script>
        <script src="js/daterange-picker.js" type="text/javascript"></script>
        <script src="js/date.js" type="text/javascript"></script>
        <script src="js/morris.min.js" type="text/javascript"></script>
        <script src="js/skycons.js" type="text/javascript"></script>
        <script src="js/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="js/fitvids.js" type="text/javascript"></script>
        <script src="js/main.js" type="text/javascript"></script>
        <script src="js/respond.js" type="text/javascript"></script>
        <script src="js/extra.js" type="text/javascript"></script>
<!--        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">-->
    </head>
    <body class="login1">
        <!-- Login Screen -->
        <div class="login-wrapper">
            <div class="login-container">
                <a href="#"><img width="200" height="166px" src="images/favicon.png" /></a>
                <form action="" method="Post" name="login_form" onsubmit="return valdiation_login()">
                    <div class="form-group">
                        <input class="form-control" placeholder="Username" type="text" name="username">
                      
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="Password" type="password" name="password">
                         
                        <input type="submit" name="Login" value="&#xf054;">
                    </div>
                    <div class="form-options clearfix">
                      
                        <div class="text-left">
                            <label class="checkbox"><input type="checkbox"><span>Remember me</span></label>
                        </div>
                    </div>
                </form>
<!--                <div class="social-login clearfix">
                    <a class="btn btn-primary pull-left facebook" href="https://www.facebook.com/"><i class="fa fa-facebook"></i>Facebook login</a><a class="btn btn-primary pull-right twitter" href="https://twitter.com/"><i class="fa fa-twitter"></i>Twitter login</a>
                </div>-->
               
            </div>
        </div>
        <!-- End Login Screen -->
    </body>
</html>