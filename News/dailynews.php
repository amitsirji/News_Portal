<script type="text/javascript" src="js/jquery-1.5.min.js"></script>
<script type="text/javascript" src="js/jquery.jcarousel.js"></script>
<script type="text/javascript" src="js/newscarousel.js"></script>
   	  <div id="templatemo_main_leftcol">     
      <h2>Dalily News</h2>
				 <div id="news">      
       <div id="scroll"> 
      	<a href="#" id="newslist-prev" class="jbutton"></a> <a href="#" id="newslist-next" class="jbutton"></a> 
      </div>
      <div class="clearfix"></div>
      <div id="newslist">
        <ul>
        	<?php 
				$q="select * from news ORDER BY id DESC";
				$sql=mysql_query($q);
				while($r=mysql_fetch_assoc($sql))
				{					
			?>
          <!-- Begin Entry Heading 1 -->
          <li style="width:94%;"> 
          	<a href="index.php?p=newsdetails&id=<?php echo $r['id'];?>">
          	<img src="bluetech/files/<?php echo $r['image']; ?>"  width="60px" height="60px" alt="" class="left" />
            <h4 class="title"><?php echo $r['headline'];?></h4></a>
            <p><?php echo $r['details'];?> 
            &nbsp;&nbsp;&nbsp;
            <a href="index.php?p=newsdetails&id=<?php echo $r['id'];?>" class="more">Continue Reading &raquo;</a></p>
          </li>
          <?php } ?>        
        </ul>
      </div>
      <div class="clearfix"></div>   
    </div>
    	</div>