
<link rel="stylesheet" href="css/vlightbox1.css" type="text/css" />
<link rel="stylesheet" href="css/visuallightbox.css" type="text/css" media="screen" />

<script src="js/visuallightbox.js" type="text/javascript"></script>

   	  <div id="templatemo_main_leftcol">

<div id="rt-transition" class="rt-hidden">
  <div id="rt-showcase" class="showcasepanel-overlay-dark">
    <div id="rt-showcase2" class="showcasepanel-pattern-denim">
      <div id="rt-showcase3" class="showcasepanel-accentoverlay-dark">
			<div class="rt-container">
            <h3 class="title">Our Photo Gallery</h3>
            <div class="clear"></div>
					</div>
				</div></div></div>
				
                <div id="rt-feature" class="featurepanel-overlay-light">
                <div id="rt-feature2">
                <div id="rt-feature3" class="featurepanel-accentoverlay-dark">
                <div id="rt-feature4" class="featurepanel-pattern-textile">
					<div class="rt-container">
                     	
    <div id="vlightbox1" align="center">
    <?php 
		$q="select * from todayimage";
		$sql=mysql_query($q);
		while($r=mysql_fetch_assoc($sql))
		{
			
			$resizeObj = new resize('bluetech/files/' . $r['image']);
			$resizeObj->resizeImage(200, 180, 'exact');
			$resizeObj->saveImage('bluetech/files/' .'smallgal'. $r['image'], 100);
			
	?>
        <a class="vlightbox1" href="bluetech/files/<?php echo $r['image']; ?>" title="">
        	<img src="bluetech/files/smallgal<?php echo $r['image']; ?>" width="200" height="180" alt="Alcionario di Kluzinger"/>
        </a>
        <?php } ?>      
	</div>
                        
                   		<div class="clear"></div>
					</div>
				</div></div></div></div>
								<div id="rt-main-container" class="body-overlay-light">
					<div id="rt-body-surround" class="body-accentoverlay-dark"></div>
				</div>
							</div>
						
									
</div>
<!--<script type='text/javascript' src='js/thickbox.js?ver=3.1-20121105'></script>
-->	<script src="js/vlbdata1.js" type="text/javascript"></script>

    <style>
    #rq { list-style:none; padding:5px;}
    #rq li{ margin-bottom:5px; }
    .rq-ticket #rq a { color:#5DACC3; font-weight:bold; }
    .rq-ticket #rq p a { font-weight:normal; color:#2C6B87; }
    .rq-ticket #rq p a:hover { border:0; }
    .rq-ticket #rq small { font-size:11px; display:block; font-weight:bold; }
    </style>
    <script>
    $(function(){$('#rq .gbutton').click(function(){
        if (this.open_p){
            this.className = 'gbutton';
            $('p', this.parentNode).slideUp(200);
        } else {
            this.className = 'gbutton-open';
            $('p', this.parentNode).slideDown(200);
        }
        this.open_p = !(this.open_p);
    });});
    </script>
