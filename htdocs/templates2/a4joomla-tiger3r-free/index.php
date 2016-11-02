<?php // no direct access 
defined( '_JEXEC' ) or die( 'Restricted access' ); 
$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$showLeftColumn = (bool) $this->countModules('position-7');
$showRightColumn = (bool) $this->countModules('position-6');
$showRightColumn &= $app->input->getCmd('layout', '') != 'edit' ;

$logoText	= $this->params->get("logoText","TIGER3R");
$logoFontsize	= $this->params->get("logoFontsize", "58");
$slogan	= $this->params->get("slogan","Joomla template from a4joomla.com");

$searchurl = $this->params->get("searchUrl");
$twitterurl = $this->params->get("twitterUrl");
$facebookurl = $this->params->get("facebookUrl");
$feedurl = $this->params->get("feedUrl");
$googleurl = $this->params->get("googleUrl");
$youtubeurl = $this->params->get("youtubeUrl");

$rightColumnWidth	= $this->params->get("rightColumnWidth", "3");
$leftColumnWidth	= $this->params->get("leftColumnWidth", "3");
$logoWidth	= $this->params->get("logoWidth", "4");
$logoTextPosition	= $this->params->get("logoTextPosition", "50");
$sloganPosition	= $this->params->get("sloganPosition", "-5");
$headerrightWidth = 12 - $logoWidth;

if ($showLeftColumn && $showRightColumn) {
   $contentWidth = 12 - $leftColumnWidth - $rightColumnWidth;
} elseif (!$showLeftColumn && $showRightColumn) {
   $contentWidth = 12 - $rightColumnWidth;
} elseif ($showLeftColumn && !$showRightColumn) {
   $contentWidth = 12 - $leftColumnWidth;
} else {
   $contentWidth = 12 ;
}

// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');

// Add Stylesheets
$doc->addStyleSheet(JURI::base().'templates/'.$this->template.'/css/template.css', $type = 'text/css');

// Load optional RTL Bootstrap CSS
JHtml::_('bootstrap.loadCss', false, $this->direction);  
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<jdoc:include type="head" />

	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/icomoon2.css" type="text/css" />

<style type="text/css">
 #logo h2 {
    font-size:<?php echo $logoFontsize; ?>px;
	margin-top:<?php echo $logoTextPosition; ?>px;
 }
 #logo h3 {
	margin-top:<?php echo $sloganPosition; ?>px;
 }
</style>

<!--[if lt IE 9]>
	<script src="<?php echo $this->baseurl ?>/media/jui/js/html5.js"></script>
<![endif]-->
<!--[if lte IE 7]>
	<script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/lte-ie7.js"></script>
<![endif]-->
</head>
<body>
<div id="menuwrap">
	
	<div id="topmenu" class="navbar navbar-inverse container">
		<div class="navbar-inner">

				<span class="brand hidden-tablet hidden-desktop">MENU</span>
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-downarrow"></span>
				</a>
				<div class="nav-collapse collapse clearfix">
					<?php if($this->countModules('position-1')) : ?>
						<jdoc:include type="modules" name="position-1" style="none" />
					<?php endif; ?>
					<div id="hsocial" class="hidden-phone pull-right">
						<div id="soci">
						<?php if($searchurl) : ?>
							<a class="mysearch pull-right" href="<?php echo $searchurl; ?>" title="Search"><i class="icon2-search"></i></a>
						<?php endif; ?>
						<?php if($youtubeurl) : ?>
							<a target="_blank" class="myyoutube pull-right" href="<?php echo $youtubeurl; ?>" title="Youtube"><i class="icon2-youtube"></i></a>
						<?php endif; ?>
						<?php if($feedurl) : ?>
							<a target="_blank" class="myfeed pull-right" href="<?php echo $feedurl; ?>" title="Feed"><i class="icon2-feed-3"></i></a>
						<?php endif; ?>
						<?php if($twitterurl) : ?>
							<a target="_blank" class="mytwitter pull-right" href="<?php echo $twitterurl; ?>" title="Twitter"><i class="icon2-twitter-2"></i></a>
						<?php endif; ?>
						<?php if($googleurl) : ?>
							<a target="_blank" class="mygoogle pull-right" href="<?php echo $googleurl; ?>" title="Google"><i class="icon2-google-plus-3"></i></a>
						<?php endif; ?>
						<?php if($facebookurl) : ?>
							<a target="_blank" class="myfacebook pull-right" href="<?php echo $facebookurl; ?>" title="Facebook"><i class="icon2-facebook-2"></i></a>
						<?php endif; ?>
						</div>
					</div>
				</div>

		</div>
		<div id="hsocial2" class="hidden-desktop hidden-tablet pull-left">
					<div id="soci2">
					<?php if($searchurl) : ?>
						<a class="mysearch pull-right" href="<?php echo $searchurl; ?>" title="Search"><i class="icon2-search"></i></a>
					<?php endif; ?>
					<?php if($youtubeurl) : ?>
						<a target="_blank" class="myyoutube pull-right" href="<?php echo $youtubeurl; ?>" title="Youtube"><i class="icon2-youtube"></i></a>
					<?php endif; ?>
					<?php if($feedurl) : ?>
						<a target="_blank" class="myfeed pull-right" href="<?php echo $feedurl; ?>" title="Feed"><i class="icon2-feed-3"></i></a>
					<?php endif; ?>
					<?php if($twitterurl) : ?>
						<a target="_blank" class="mytwitter pull-right" href="<?php echo $twitterurl; ?>" title="Twitter"><i class="icon2-twitter-2"></i></a>
					<?php endif; ?>
					<?php if($googleurl) : ?>
						<a target="_blank" class="mygoogle pull-right" href="<?php echo $googleurl; ?>" title="Google"><i class="icon2-google-plus-3"></i></a>
					<?php endif; ?>
					<?php if($facebookurl) : ?>
						<a target="_blank" class="myfacebook pull-right" href="<?php echo $facebookurl; ?>" title="Facebook"><i class="icon2-facebook-2"></i></a>
					<?php endif; ?>
					</div>
		</div>
		
	</div> 

</div>
<div id="headerwrap">
	<div id="header" class="container">      
		<div class="row">
			<div id="logo" class="span<?php echo $logoWidth; ?>">
					<h2><a href="<?php echo JURI::base(); ?>" title="<?php echo htmlspecialchars($logoText); ?>"><?php echo htmlspecialchars($logoText); ?></a></h2>
					<h3><?php echo htmlspecialchars($slogan); ?></h3> 
			</div>
			<div id="headerright" class="span<?php echo $headerrightWidth; ?>">
				<?php if($this->countModules('position-8')) : ?>
					<div id="slideshow-allwrap">
						<div id="slideshow-mod">
							<div id="slsh">
								<jdoc:include type="modules" name="position-8" style="html5" />  
							</div>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>



<div id="allwrap">

	<div id="wrap" class="container">

		<?php if($this->countModules('position-2')) : ?>
			<div id="pathway">
				<jdoc:include type="modules" name="position-2" />
			</div>
		<?php endif; ?> 
		<div id="cbody" class="row-fluid">
			<?php if($showLeftColumn) : ?>
				<div id="sidebar" class="span<?php echo $leftColumnWidth; ?>">     
					<jdoc:include type="modules" name="position-7" style="xhtml" />    
				</div>
			<?php endif; ?>
			<div id="content60" class="span<?php echo $contentWidth; ?>">    
				<div id="content">
					<jdoc:include type="message" />
					<jdoc:include type="component" /> 
				</div> 
			</div>
			<?php if($showRightColumn) : ?>
				<div id="sidebar-2" class="span<?php echo $rightColumnWidth; ?>">     
					<jdoc:include type="modules" name="position-6" style="xhtml" />     
				</div>
			<?php endif; ?>
		</div>
  
<!--end of wrap-->
	</div>
    
<!--end of allwrap-->
</div>

<div id="footerwrap"> 
	<div id="footer" class="container">  
		<?php if($this->countModules('position-14')) : ?>	
			<jdoc:include type="modules" name="position-14" style="xhtml" />    
		<?php endif; ?>
	</div>
	<div id="a4j" class="container"><a href="http://a4joomla.com/"><?php echo JText::_('TPL_A4JOOMLA-TIGER3R-FREE_FOOTER_LINK_TEXT');?></a></div> 
</div>

</body>
</html>
