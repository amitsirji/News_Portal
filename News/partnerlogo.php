
    <script>
        jQuery(document).ready(function ($) {
            var options = {
                $AutoPlay: true,                                    
                $AutoPlaySteps: 1,                                  
                $AutoPlayInterval: 0,                            
                $PauseOnHover: 1,                               
                $ArrowKeyNavigation: true,   			        
                $SlideEasing: $JssorEasing$.$EaseLinear,        
                $SlideDuration: 3000,                             
                $MinDragOffsetToSlide: 20,                        
                $SlideWidth: 140,                                 
                $SlideSpacing: 0, 					              
                $DisplayPieces: 7,                                
                $ParkingPosition: 0,                              
                $UISearchMode: 1,                                 
                $PlayOrientation: 1,                              
                $DragOrientation: 1                               
            };

            var jssor_slider1 = new $JssorSlider$("slider1_container", options);
            function ScaleSlider() {
                var bodyWidth = document.body.clientWidth;
                if (bodyWidth)
                    jssor_slider1.$SetScaleWidth(Math.min(bodyWidth, 980));
                else
                    window.setTimeout(ScaleSlider, 30);
            }

            ScaleSlider();

            if (!navigator.userAgent.match(/(iPhone|iPod|iPad|BlackBerry|IEMobile)/)) {
                $(window).bind('resize', ScaleSlider);
            }

        });
    </script>
    <div id="slider1_container" style="position: relative; top: 0px; left: 0px; width: 980px; height: 100px; overflow: hidden; ">

        <!-- Loading Screen -->
        <div u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
                background-color: #000; top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
            <div style="position: absolute; display: block; background: url(img/loading.gif) no-repeat center center;
                top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
        </div>

        <!-- Slides Container -->
        <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 980px; height: 100px; overflow: hidden;">
            <div><img u="image" alt="amazon" src="img/logo/amazon.jpg" /></div>
            <div><img u="image" alt="android" src="img/logo/android.jpg" /></div>
            <div><img u="image" alt="bitly" src="img/logo/bitly.jpg" /></div>
            <div><img u="image" alt="blogger" src="img/logo/blogger.jpg" /></div>
            <div><img u="image" alt="dnn" src="img/logo/dnn.jpg" /></div>
            <div><img u="image" alt="drupal" src="img/logo/drupal.jpg" /></div>
            <div><img u="image" alt="ebay" src="img/logo/ebay.jpg" /></div>
            <div><img u="image" alt="facebook" src="img/logo/facebook.jpg" /></div>
            <div><img u="image" alt="google" src="img/logo/google.jpg" /></div>
            <div><img u="image" alt="ibm" src="img/logo/ibm.jpg" /></div>
            <div><img u="image" alt="ios" src="img/logo/ios.jpg" /></div>
            <div><img u="image" alt="joomla" src="img/logo/joomla.jpg" /></div>
            <div><img u="image" alt="linkedin" src="img/logo/linkedin.jpg" /></div>
            <div><img u="image" alt="mac" src="img/logo/mac.jpg" /></div>
            <div><img u="image" alt="magento" src="img/logo/magento.jpg" /></div>
            <div><img u="image" alt="pinterest" src="img/logo/pinterest.jpg" /></div>
            <div><img u="image" alt="samsung" src="img/logo/samsung.jpg" /></div>
            <div><img u="image" alt="twitter" src="img/logo/twitter.jpg" /></div>
            <div><img u="image" alt="windows" src="img/logo/windows.jpg" /></div>
            <div><img u="image" alt="wordpress" src="img/logo/wordpress.jpg" /></div>
            <div><img u="image" alt="youtube" src="img/logo/youtube.jpg" /></div>
        </div>
    </div>
