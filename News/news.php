
   	  <div id="templatemo_main_leftcol">
      	<h3>Category : <?php echo $r['type']; ?> News</h3>
        <hr />
        <?php 
		$q="select * from news where type='".$_GET['type']."' ORDER BY id DESC";
		$sql=mysql_query($q);
		while($r=mysql_fetch_assoc($sql))
		{
			$resizeObj = new resize('bluetech/files/' . $r['image']);

			//                // *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
			$resizeObj->resizeImage(150, 150, 'exact');
			//
			//                // *** 3) Save image
			$resizeObj->saveImage('bluetech/files/' .'news'. $r['image'], 100);

			?>
        <div class="rt-container"  style="margin-top:25px;">
        	<div class="rt-grid-2">
        		<img src="bluetech/files/news<?php echo $r['image']?>" class="polaroid left" />
            </div>
            <div class="rt-grid-5 rt-push-1">
                <h2 style="border-bottom:dashed 1px #000;"><a href="index.php?p=newsdetails&id=<?php echo $r['id'];?>"> <?php echo $r['headline']; ?></a></h2>
                
                <span><?php echo $r['date'];?></span>
                <div style="height:120px; border-bottom:1px dotted #000; font-size:14px; padding:5px; overflow:hidden; line-height:19px;">
                	<p  align="justify">
                    
                    <?php echo $r['details']; ?>j
                </p>
                
                </div>
                <a href="index.php?p=newsdetails&id=<?php echo $r['id'];?>" style="font-size:14px;">Read More</a>
            </div>
        </div>
        <div style="clear:both; border-bottom: dashed 3px #000;"></div>
        
        <?php }?>
    	</div> 
        
     
            
           