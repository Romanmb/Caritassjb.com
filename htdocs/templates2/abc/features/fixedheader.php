<?php
/**
 * @package     gantry
 * @subpackage  features
 * @version     1
 * @author      Tomasz Kisielewski
 * @url         tkstudiodesign.com
 * @license     GPL
 */
  
defined('JPATH_BASE') or die();
  
gantry_import('core.gantryfeature');
  
class GantryFeatureFixedheader extends GantryFeature {
    var $_feature_name = 'fixedheader';
     
    function init() {
        global $gantry;
                
        //if ($gantry->get('fixedheader-enabled')) {
        
        
        //$gantry->addScript('menuFixed.js');
	
	if($gantry->get('fixedheader-enabled')){

        $gantry->addInlineScript (
        	

                "
		
		jQuery(document).ready(function(){
                var myheader = jQuery('#rt-header');
		jQuery(window).on('scroll',function(){
                var fromTop = jQuery(document).scrollTop();
                jQuery('#rt-top-surround #rt-header').toggleClass('down animated ".$gantry->get('fixedheader-effectIn')."',(fromTop>400));
		jQuery('.gf-menu-toggle').toggleClass('menu-toggle-fixed animated" .$gantry->get('fixedheader-effectIn')."',(fromTop>450));
		if (!(jQuery('.menu-block').find('.gf-menu').length>0)&&(myheader.length && myheader.hasClass('down'))){
		jQuery('.layout-mode-responsive .gf-menu-device-wrapper-sidemenu .gf-menu-device-container').css('padding-top','140px');
		jQuery('#rt-header').css('min-height','40px');

		
		}else{
		jQuery('.layout-mode-responsive .gf-menu-device-wrapper-sidemenu .gf-menu-device-container').css('padding-top','0px');
		}
		
		                           });
                });
		
		
		
		"
	    
	     );//eof addscript
    }
	
	
	


        

             
} //end waypoint enabled
 }

