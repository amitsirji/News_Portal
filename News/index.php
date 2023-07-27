<?php 
	include('bluetech/connection.php');
	include('bluetech/resize-class.php');
	include('bluetech/SimpleImage.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>NEWS PORTAL</title>
<meta name="keywords" content="News Layout, free css template, free website, CSS, HTML" />
<meta name="description" content="News Website Layout - free HTML CSS template provided by templatemo.com" />
<link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/tabcontent.css" />
<link rel="stylesheet" href="css/img-poloroid.css"  type="text/css"/>
 <link rel="stylesheet" href="css/grid-12.css" type="text/css" />
 <link rel="stylesheet" href="css/style5.css" type="text/css" />

<script type="text/javascript" src="js/tabcontent.js">
</script>
</head>
<body>
<div id="templatemo_container">

	<div id="templatemo_top_panel">
        <div id="templatemo_sitetitle">
            NEWS PORTAL
        </div>
        <div id="templatemo_searchbox">
          <form action="#" method="get">
          <br />
              <input type="text" name="q" size="10" id="searchfield" title="searchfield" />
              <input type="submit" name="Search" value="Search" alt="Search" id="searchbutton" title="Search" />
          </form>
        </div>
        <div id="templatemo_currentdate">
			<script type="text/javascript">
				<!--
				var m_names = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
				var d_names = new Array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
				
				var currentTime = new Date()
				var day = currentTime.getDay()
				var month = currentTime.getMonth() + 1
				var date = currentTime.getDate()
				var year = currentTime.getFullYear()
				document.write( d_names[day] + ", " + date + " " + m_names[month] + " " + year + ", ")
				var currentTime = new Date()
				var hours = currentTime.getHours()
				var minutes = currentTime.getMinutes()
				if (minutes < 10){
				minutes = "0" + minutes
				}
				document.write(hours + ":" + minutes + " ")
				if(hours > 11){
				document.write("PM")
				} else {
				document.write("AM")
				}
				//-->
			</script>
        </div>
    </div> <!-- end of top panel -->
    
    
    
    <div id="templatemo_menu">
        <ul>
            <li><a href="index.php?p=home" class="<?php if($_GET['p']=='' || $_GET['p']=='home') {echo "current"; }?>">Home</a></li>
            <li><a href="index.php?p=about" class="<?php if($_GET['p']=='about') {echo "current"; }?>" >About Us</a></li>
            <li><a href="index.php?p=dailynews" class="<?php if($_GET['p']=='dailynews') {echo "current"; }?>"	>Daily News</a></li>
            <li><a href="index.php?p=news&type=Sports" class="<?php if($_GET['p']=='sports') {echo "current"; }?>">Sports</a></li>
            <li><a href="index.php?p=news&type=Bussiness" class="<?php if($_GET['p']=='bussiness') {echo "current"; }?>">Business</a></li>  
            <li><a href="index.php?p=news&type=Politics" class="<?php if($_GET['p']=='politics') {echo "current"; }?>">Politics</a></li> 
            <li><a href="index.php?p=news&type=Entertainment" class="<?php if($_GET['p']=='entertainment') {echo "current"; }?>">Entertainment</a></li>                     
            <li><a href="index.php?p=news&type=Technology" class="<?php if($_GET['p']=='techno') {echo "current"; }?>">Technology &amp; Science</a></li>
            <li><a href="index.php?p=contact" class="<?php if($_GET['p']=='contact') {echo "current"; }?>">Contact</a></li>
        </ul> 
	</div>      
	<div id="templatemo_content">
    <div  style="margin:5px 0;"></div>
   
    <?php  include('slider.php')?>

  	<?php 
		if(file_exists(($_GET['p'].'.php')) && $_GET['p'])
		{
    		include($_GET['p'].'.php');
    	}
		else
		{
        	include('home.php');
    	}
	?>
        
        
          <div id="templatemo_main_rightcol">
            <div class="templatemo_rcol_sectionwithborder">
            	<div id="templatemo_blog_section">
                    <h2>Get In Touch</h2>
                    <p>&nbsp;
                    	<?php if(isset($_GET['akw'])){print "<h2>".$_GET['akw'];}?>
                    </p>
                    <div class="blog_box" style="">
                    		<form name="form1" action="mail.php" enctype="multipart/form-data" method="post">
							<div style="margin:5px 0;"><input type="text" name="name" placeholder="Name"/></div>
                            <div  style="margin:5px 0;"><input type="text" name="mobile" placeholder="Mobile No"/></div>
                            <div style="margin:5px 0;"><input type="text" name="email" placeholder="Email Address"/></div>
                            <div style="margin:5px 0;"><textarea name="message" placeholder="Type Ypur Message Here....."></textarea></div>
                            <div style="margin:5px 0;"><button type="submit" name="submit">Send</button>
                            	<button type="reset" name="reset">Clear</button>
                            </div>
                            
                            </form>
                    </div>
				</div>                                                              
          </div>
          
                
        <div class="templatemo_rcol_sectionwithborder">
        	<div id="templatemo_blog_section">
                    <h2>Today's Image</h2>                    	
                    <div class="blog_box">
                    <?php 
						$q1="select * from todayimage";
						$sql1=mysql_query($q1);
						while($r1=mysql_fetch_assoc($sql1))
						{
							
			$resizeObj = new resize('bluetech/files/' . $r1['image']);

			//                // *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
			$resizeObj->resizeImage(84, 84, 'exact');
			//
			//                // *** 3) Save image
			$resizeObj->saveImage('bluetech/files/' .'thumbgal'. $r1['image'], 100);
					?>
                        <img src="bluetech/files/thumbgal<?php echo $r1['image'];?>" alt="image"  width="84" />
                    	<?php } ?>
                    </div>
                                        <div class="more_button"><a href="index.php?p=gallery">View All</a></div>

             </div>                                
          </div>      
    	
        </div>
        
        
        
       
    <div style="clear:both">
    	
    	 <?php  if($_GET['p']=='about')
		 
		 		{
					echo "<h1>Our Media partner</h1>";
					include('partnerlogo.php');	
				}
		?>
    </div>    
    <div id="templatemo_footer">
   	  <div class="footer_leftcol">
      <style>
			.foot li{float:left;  margin-left:5px; list-style:none; font-weight:bold; font-size:12px; padding-left:5px;}
		</style>
      		<ul style="margin:5px 0;  padding:5px 0; font-weight:bold; font-size:12px; padding-left:5px;">
            	<li>Developed by : Shailesh , Dharmendra , Vivek, Kuntal</li>
                <li>Submitted to : Marwadi Education Foundation Group of &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Institutions.</li>
            </ul>
    	</div>
        
        <div class="footer_rightcol">
          <ul class="foot">
          	<li><a href="">Home</a></li>
            <li><a href="">About Us</a></li>
            <li><a href="">Daily News</a></li>
            <li><a href="">Bussiness</a></li>
            <li><a href="">Contact Us</a></li>
            <li><a href="site_map.php?p=site_map">Sitemap</a></li>
          </ul>
        </div>
        
    </div> <!-- end of footer -->
<!--  HTML CSS Template Designed by w w w . t e m p l a t e m o . c o m  --> 
</div>
<style>
    .inquiry{
        margin: 0px;
    }
    label{
        color: #000;
        font-family: verdana;
    }
    select,input{
        width: 100%;
        height: 28px;
        border-radius: 3px;
        border: 1px solid #ababab;
        box-shadow: inset 2px 2px 5px #aeaeae;
        padding-left: 5px;
    }
    textarea{
        width: 100%;
        height: 80px;
        border-radius: 3px;
        border: 1px solid #ababab;
        box-shadow: inset 2px 2px 5px #aeaeae;
        padding-left: 5px;
		resize:none;
    }
</style>

</body>
</html>