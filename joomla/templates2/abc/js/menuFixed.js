
		jQuery(document).ready(function(){
                var $header = jQuery('#rt-top-surround');
		
		jQuery(window).on('scroll',function(){
                var $fromTop = jQuery(document).scrollTop();
                jQuery('#rt-top-surround').toggleClass('down animated bounceInDown',($fromTop>400));
		jQuery('.gf-menu-toggle').toggleClass('menu-toggle-fixed animated bounceInDown',($fromTop>450));
		if (!(jQuery('.menu-block').find('.gf-menu').length>0)&&($header.length && $header.hasClass('down'))){
		console.log('Responsive menu');
		jQuery('.layout-mode-responsive .gf-menu-device-wrapper-sidemenu .gf-menu-device-container').css('padding-top','70px');
                console.log('menu ON');
		}else{
                    console.log('menu OFF');
		jQuery('.layout-mode-responsive .gf-menu-device-wrapper-sidemenu .gf-menu-device-container').css('padding-top','0px');
		}
		
		                           });
                });
		
		
		

