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
  
class GantryFeatureAddWaypoint extends GantryFeature {
    var $_feature_name = 'waypoint';
     
    function init() {
        global $gantry;
                
        if ($gantry->get('waypoint-enabled')) {
        
        
        $gantry->addScript('waypoints.min.js');
        // effects for rt-transition 
        if($gantry->get('waypointAnimation1-enabled')){
        
                $gantry->addInlineScript (
        
                "jQuery(document).ready(function(){
	                jQuery('.rt-container-wrapper').css({'opacity':'0'});
			jQuery('.rt-container-wrapper').waypoint(function(){
				jQuery('.rt-container-wrapper').css({'opacity':'1'});
			        jQuery('.rt-container-wrapper').addClass('animated ".$gantry->get('waypointAnimation1-effect')."');
			} , {
                offset:'90%'
                });
	        });"
	    
	     );//eof addscript
        
        };//eof if 
	if($gantry->get('waypointAnimationTop-enabled')){
        
                $gantry->addInlineScript (
        
                "jQuery(document).ready(function(){

		                jQuery('#rt-maintop .rt-container').css({'opacity':'0'});
			        jQuery('#rt-maintop .rt-container').waypoint(function() {
			        jQuery('#rt-maintop .rt-container').css({'opacity':'1'});
                                jQuery('#rt-maintop .rt-container').addClass('animated ".$gantry->get('waypointAnimationSocial-effect')."');
                                 }  , {
                                offset: '50%'
                                      });
			
		
		
		});"
	    
	     );//eof addscript
        
        };//eof if for social
	
	if($gantry->get('waypointAnimationMainbottom-enabled')){
        
                $gantry->addInlineScript (
        
                "jQuery(document).ready(function(){

		                jQuery('#rt-mainbottom .rt-container').css({'opacity':'0'});
			        jQuery('#rt-mainbottom .rt-container').waypoint(function() {
			        jQuery('#rt-mainbottom .rt-container').css({'opacity':'1'});
                                jQuery('#rt-mainbottom .rt-container').addClass('animated ".$gantry->get('waypointAnimationMainbottom-effect')."');
                                 }  , {
                                offset: '90%'
                                      });
			
		
		
		});"
	    
	     );//eof addscript
		
        
        };//eof if for mainbottom
	
	if($gantry->get('waypointAnimationFooter-enabled')){
        
                $gantry->addInlineScript (
        
                "jQuery(document).ready(function(){

		                jQuery('#rt-footer .rt-container .footer-anim-0').css({'opacity':'0'});
			        jQuery('#rt-footer .rt-container .footer-anim-0').waypoint(function() {
			     
                                jQuery('#rt-footer .rt-container .footer-anim-0').addClass('animated fadeInLeft');
                                 }  , {
                                offset: '85%'
                                      });
			        jQuery('#rt-footer .rt-container .footer-anim-1').css({'opacity':'0'});
			        jQuery('#rt-footer .rt-container .footer-anim-1').waypoint(function() {
			  
                                jQuery('#rt-footer .rt-container .footer-anim-1').addClass('animated fadeInLeft');
                                 }  , {
                                offset: '85%'
                                      });
			        jQuery('#rt-footer .rt-container .footer-anim-2').css({'opacity':'0'});
			        jQuery('#rt-footer .rt-container .footer-anim-2').waypoint(function() {
			        
                                jQuery('#rt-footer .rt-container .footer-anim-2').addClass('animated fadeInRight');
                                 }  , {
                                offset: '85%'
                                      });
			        jQuery('#rt-footer .rt-container .footer-anim-3').css({'opacity':'0'});
			        jQuery('#rt-footer .rt-container .footer-anim-3').waypoint(function() {
			        
                                jQuery('#rt-footer .rt-container .footer-anim-3').addClass('animated fadeInRight');
                                 }  , {
                                offset: '85%'
                                      });
			
		
		
		});"
	    
	     );//eof addscript
		
        
        };//eof if for mainbottom


        

             
} //end waypoint enabled
 }
  }
