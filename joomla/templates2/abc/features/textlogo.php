<?php
/**
 * @author    TKSTUDIODESIGN / http://www.tkstudiodesign.com
 * @copyright Copyright (C) 2014 tkstudiodesign.com
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 *
 * Gantry uses the Joomla Framework (http://www.joomla.org), a GNU/GPLv2 content management system
 *
 */

defined('JPATH_BASE') or die();

gantry_import('core.gantryfeature');
/**
 * @package     gantry
 * @subpackage  features
 */
class GantryFeatureTextlogo extends GantryFeature
{
	var $_feature_name = 'textlogo';

	function render($position)
	{
		global $gantry;
		ob_start();
		?>
	<div class="clear"></div>
	<div class="rt-block tksd-text-logo">
	<a href="<?php echo $gantry->baseUrl; ?>" class="tk-rt-logo">
		<?php echo $this->get('text'); ?>
	</a>
		
	</div>
	<?php
		return ob_get_clean();
	}
	
	
}
