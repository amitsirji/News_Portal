     <!-- Caption Style -->
    <style> 
        .captionOrange, .captionBlack
        {
            color: #fff;
            font-size: 20px;
            line-height: 30px;
            text-align: center;
            border-radius: 4px;
        }
        .captionOrange
        {
            background: #EB5100;
            background-color: rgba(235, 81, 0, 0.6);
        }
        .captionBlack
        {
        	font-size:16px;
            background: #000;
            background-color: rgba(0, 0, 0, 0.4);
        }
        a.captionOrange, A.captionOrange:active, A.captionOrange:visited
        {
        	color: #ffffff;
        	text-decoration: none;
        }
        a.captionOrange:hover
        {
            color: #eb5100;
            text-decoration: underline;
            background-color: #eeeeee;
            background-color: rgba(238, 238, 238, 0.7);
        }
        .bricon
        {
            background: url(../img/browser-icons.png);
        }
    </style>
    <!-- it works the same with all jquery version from 1.x to 2.x -->
    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/jssor.core.js"></script>
    <script type="text/javascript" src="js/jssor.utils.js"></script>
    <script type="text/javascript" src="js/jssor.slider.js"></script>
    <script>

        jQuery(document).ready(function ($) {
            var options = {
                $AutoPlay: true,                                    
                $AutoPlaySteps: 1,                                  
                $AutoPlayInterval: 4000,                            
                $PauseOnHover: 1,                               
                $ArrowKeyNavigation: true,   			        
                $SlideDuration: 500,                            
                $MinDragOffsetToSlide: 20,                     
                $SlideSpacing: 0, 					           
                $DisplayPieces: 1,                            
                $ParkingPosition: 0,                          
                $UISearchMode: 1,                             
                $PlayOrientation: 1,                          
                $DragOrientation: 3,                         
                $ArrowNavigatorOptions: {
                    $Class: $JssorArrowNavigator$,           
                    $ChanceToShow: 1,                       
                    $Steps: 1                              
                },

                $ThumbnailNavigatorOptions: {
                    $Class: $JssorThumbnailNavigator$,
                    $ChanceToShow: 2,                 
                    $ActionMode: 1,                   
                    $AutoCenter: 3,                   
                    $Lanes: 1,                        
                    $SpacingX: 3,                    
                    $SpacingY: 3,                    
                    $DisplayPieces: 9,               
                    $ParkingPosition: 260,           
                    $Orientation: 1,                 
                    $DisableDrag: false              
                }
            };

            var jssor_slider2 = new $JssorSlider$("slider2_container", options);
			
            function ScaleSlider() {
                var parentWidth = jssor_slider2.$Elmt.parentNode.clientWidth;
                if (parentWidth)
                    jssor_slider2.$SetScaleWidth(Math.min(parentWidth, 975));
                else
                    window.setTimeout(ScaleSlider, 30);
            }

            ScaleSlider();

            if (!navigator.userAgent.match(/(iPhone|iPod|iPad|BlackBerry|IEMobile)/)) {
                $(window).bind('resize', ScaleSlider);
            }
        });
    </script>
    <div id="slider2_container" style="position: relative; top: 0px; left: 0px; width:975px; height: 300px; overflow: hidden; box-shadow:#000 0px 0px 5px 5px; border:5px  solid #fff; margin:0px auto;">

        <!-- Loading Screen -->
        <div u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
                background-color: #000000; top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
            <div style="position: absolute; display: block; background: url(../img/loading.gif) no-repeat center center;
                top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
        </div>

        <!-- Slides Container -->
        <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 995px; height: 300px; overflow: hidden;">
           
            <?php 
				$sql="select * from banner where status='Yes'";
				$q=mysql_query($sql);
				while($r=mysql_fetch_assoc($q))
				{
						$resizeObj = new resize('bluetech/files/' . $r['image']);
						$resizeObj->resizeImage(600, 300, 'exact');
						$resizeObj->saveImage('bluetech/files/' .'slide'. $r['image'], 100);
						$resizeObj = new resize('bluetech/files/' . $r['image']);
						$resizeObj->resizeImage(60, 30, 'exact');
						$resizeObj->saveImage('bluetech/files/' .'thumb'. $r['image'], 100);
			?>
             <div>
                <img u="image" src="bluetech/files/<?php echo "slide".$r['image']; ?>" />
                <img u="thumb" src="bluetech/files/<?php echo "thumb".$r['image']; ?>" />
            </div>
            <?php } ?>
            
        </div>
        
        <!-- Arrow Navigator Skin Begin -->
        <style>
            .jssora02l, .jssora02r, .jssora02ldn, .jssora02rdn
            {
            	position: absolute;
            	cursor: pointer;
            	display: block;
                background: url(img/a02.png) no-repeat;
                overflow:hidden;
            }
            .jssora02l { background-position: -3px -33px; }
            .jssora02r { background-position: -63px -33px; }
            .jssora02l:hover { background-position: -123px -33px; }
            .jssora02r:hover { background-position: -183px -33px; }
            .jssora02ldn { background-position: -243px -33px; }
            .jssora02rdn { background-position: -303px -33px; }
        </style>
        <!-- Arrow Left -->
        <span u="arrowleft" class="jssora02l" style="width: 55px; height: 55px; top: 123px; left: 8px;">
        </span>
        <!-- Arrow Right -->
        <span u="arrowright" class="jssora02r" style="width: 55px; height: 55px; top: 123px; right: 8px">
        </span>
        <div u="thumbnavigator" class="jssort03" style="position: absolute; width: 995px; height: 60px; left:0px; bottom: 0px;">
            <div style=" background-color: #000; filter:alpha(opacity=30); opacity:.3; width: 100%; height:100%;"></div>
           <style>
                .jssort03 .w, .jssort03 .pav:hover .w
                {
                	position: absolute;
                	width: 60px;
                	height: 30px;
                	border: white 1px dashed;
                }
                * html .jssort03 .w
                {
                	width /**/: 62px;
                	height /**/: 32px;
                }
                .jssort03 .pdn .w, .jssort03 .pav .w { border-style: solid; }
                .jssort03 .c
                {
                	width: 62px;
                	height: 32px;
                	filter:  alpha(opacity=45);
                	opacity: .45;
                	
                	transition: opacity .6s;
                    -moz-transition: opacity .6s;
                    -webkit-transition: opacity .6s;
                    -o-transition: opacity .6s;
                }
                .jssort03 .p:hover .c, .jssort03 .pav .c
                {
                	filter:  alpha(opacity=0);
                	opacity: 0;
                }
                .jssort03 .p:hover .c
                {
                	transition: none;
                    -moz-transition: none;
                    -webkit-transition: none;
                    -o-transition: none;
                }
            </style>
            <div u="slides" style="cursor: move;">
                <div u="prototype" class="p" style="POSITION: absolute; WIDTH: 62px; HEIGHT: 32px; TOP: 0; LEFT: 0;">
                    <div class=w><ThumbnailTemplate style=" WIDTH: 100%; HEIGHT: 100%; border: none;position:absolute; TOP: 0; LEFT: 0;"></ThumbnailTemplate></div>
                    <div class=c style="POSITION: absolute; BACKGROUND-COLOR: #000; TOP: 0; LEFT: 0">
                    </div>
                </div>
            </div>
            <!-- Thumbnail Item Skin End -->
        </div>
        <!-- ThumbnailNavigator Skin End -->
        <a style="display: none" href="http://www.jssor.com">content slider</a>
    </div>