 <?php 
		$q="select * from news where id='".$_GET['id']."'";
		$sql=mysql_query($q);
		$r=mysql_fetch_assoc($sql);
			?>
   	  <div id="templatemo_main_leftcol">
      	<h3>News Details</h3>
        
         <div id="templatemo_topnews"></div>
       	 	<div  style="padding:10px;">
         <img src="bluetech/files/<?php echo $r['image']?>" class="polaroid" width="530" />
         </div>
         	<h2><?php echo $r['headline'];?></h2>
		 	<div id="templatemo_topnews"></div>
			<span><?php echo $r['date'];?></span>
        <div style="text-align:justify; width:95%; font-size:14px; margin-top:10px;"><?php echo $r['details']; ?></div>
              
        </div>      