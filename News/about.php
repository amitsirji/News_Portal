

   	  <div id="templatemo_main_leftcol"><!-- end of left column -->
      	<div style="width:94%;  font-size:14px; text-align:justify;">
		<?php 
        $q="select * from page where name='About Us'";
        $sql=mysql_query($q);
        $r=mysql_fetch_assoc($sql);
        echo $r['detail'];
    	?>
     
      <div class="clearfix"></div>
    </div>
    	</div> 