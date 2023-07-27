	<link rel="stylesheet" type="text/css" href="css/style_common.css" />
     <link rel="stylesheet" type="text/css" href="css/style7.css" />

	<script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox').fancybox();

			/*
			 *  Different effects
			 */

			// Change title type, overlay closing speed
			$(".fancybox-effects-a").fancybox({
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedOut : 0
					}
				}
			});

			// Disable opening and closing animations, change title type
			$(".fancybox-effects-b").fancybox({
				openEffect  : 'none',
				closeEffect	: 'none',

				helpers : {
					title : {
						type : 'over'
					}
				}
			});

			// Set custom style, close if clicked, change title type and overlay color
			$(".fancybox-effects-c").fancybox({
				wrapCSS    : 'fancybox-custom',
				closeClick : true,

				openEffect : 'none',

				helpers : {
					title : {
						type : 'inside'
					},
					overlay : {
						css : {
							'background' : 'rgba(238,238,238,0.85)'
						}
					}
				}
			});

			// Remove padding, set opening and closing animations, close if clicked and disable overlay
			$(".fancybox-effects-d").fancybox({
				padding: 0,

				openEffect : 'elastic',
				openSpeed  : 150,

				closeEffect : 'elastic',
				closeSpeed  : 150,

				closeClick : true,

				helpers : {
					overlay : null
				}
			});
			$('.fancybox-buttons').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',

				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,

				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
			});
			$('.fancybox-thumbs').fancybox({
				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,
				arrows    : false,
				nextClick : true,

				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					}
				}
			});
			$('.fancybox-media')
				.attr('rel', 'media-gallery')
				.fancybox({
					openEffect : 'none',
					closeEffect : 'none',
					prevEffect : 'none',
					nextEffect : 'none',

					arrows : false,
					helpers : {
						media : {},
						buttons : {}
					}
				});
			$("#fancybox-manual-a").click(function() {
				$.fancybox.open('1_b.jpg');
			});

			$("#fancybox-manual-b").click(function() {
				$.fancybox.open({
					href : 'iframe.html',
					type : 'iframe',
					padding : 5
				});
			});

			$("#fancybox-manual-c").click(function() {
				$.fancybox.open([
					{
						href : '1_b.jpg',
						title : 'My title'
					}, {
						href : '2_b.jpg',
						title : '2nd title'
					}, {
						href : '3_b.jpg'
					}
				], {
					helpers : {
						thumbs : {
							width: 75,
							height: 50
						}
					}
				});
			});


		});
	</script>
	<style type="text/css">
		.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
		}
	</style>
   	 <div id="templatemo_main_leftcol">
        	<div class="span3 view view-seventh">
            	<img src="images/news_home.jpg"  />
                <div class="mask" style=" background:url(images/news_home.jpg);">
                	<h2>Daily News</h2>
					<p>&nbsp;</p>
                    <a class="fancybox-buttons info" data-fancybox-group="button" href="index.php?p=dailynews">View</a>
                </div>
           </div>
           <div class="span3 view view-seventh">
            	<img src="images/sport_home.jpg"/>
                <div class="mask" style=" background:url(images/sport_home.jpg);">
                	<h2>Sports</h2>
					<p>&nbsp;</p>
                    <a class="fancybox-buttons info" data-fancybox-group="button" href="index.php?p=news&type=Sports">View</a>
                </div>
           </div>
           <div class="span3 view view-seventh">
            	<img src="images/business_home.jpg"/>
                <div class="mask" style=" background:url(images/business_home.jpg);">
                	<h2>Bussiness</h2>
					<p>&nbsp;</p>
                    <a class="fancybox-buttons info" data-fancybox-group="button" href="index.php?p=news&type=Bussiness">View</a>
                </div>
           </div>
           <div class="span3 view view-seventh">
            	<img src="images/political_home.jpg" />
                <div class="mask" style=" background:url(images/political_home.jpg);">
                	<h2>Politics</h2>
					<p>&nbsp;</p>
                    <a class="fancybox-buttons info" data-fancybox-group="button" href="index.php?p=news&type=Politics">View</a>
                </div>
           </div>
            <div class="span3 view view-seventh">
            	<img src="images/entertainment_home.jpg" />
                <div class="mask" style=" background:url(images/entertainment_home.jpg);">
                	<h2>Entertainment</h2>
					<p>&nbsp;</p>
                    <a class="fancybox-buttons info" data-fancybox-group="button" href="index.php?p=news&type=Entertainment">View</a>
                </div>
           </div>
            <div class="span3 view view-seventh">
            	<img src="images/science_home.jpg" />
                <div class="mask" style=" background:url(images/science_home.jpg);">
                	<h2>Science & Technology</h2>
					<p>&nbsp;</p>
                    <a class="fancybox-buttons info" data-fancybox-group="button" href="index.php?p=news&type=Technology">View</a>
                </div>
           </div>

       </div>
