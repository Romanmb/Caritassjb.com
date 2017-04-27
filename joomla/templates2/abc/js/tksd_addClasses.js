
		jQuery(document).ready(function(){
                var $tksdSelector = jQuery('#rt-footer .rt-container');
		var $step=0;
                var $collection=[];
                $collection=jQuery($tksdSelector).find('.rt-block');
                console.log($collection);
                jQuery($collection).each(function(i,e){
                    $step= i;
                    $(e).addClass("footer-anim-" + $step);
                    
                    console.log($step);
                    console.log($tksdSelector);

                });
		                      
                });
		
		
		

