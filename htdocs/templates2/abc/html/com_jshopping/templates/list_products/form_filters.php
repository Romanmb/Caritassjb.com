<?php 
/**
* @version      4.3.1 13.08.2013
* @author       MAXXmarketing GmbH
* @package      Jshopping
* @copyright    Copyright (C) 2010 webdesigner-profi.de. All rights reserved.
* @license      GNU/GPL
*/
defined('_JEXEC') or die('Restricted access');
?>
<form action="<?php print $this->action;?>" method="post" name="sort_count" id="sort_count">
<?php if ($this->config->show_sort_product || $this->config->show_count_select_products) : ?>
<div class = "row-fluid block_sorting_count_to_page">
    <?php if ($this->config->show_sort_product) : ?>
        <div class = "span6 box_products_sorting">
            <div class = "span3"><?php print _JSHOP_ORDER_BY.": "; ?></div>
            <div class = "span9"><?php echo $this->sorting?><img src="<?php print $this->path_image_sorting_dir?>" alt="orderby" onclick="submitListProductFilterSortDirection()" /></div>
        </div>
    <?php endif; ?>
    <?php if ($this->config->show_count_select_products) : ?>
        <div class = "span6 box_products_count_to_page">
            <div class = "span3"><?php print _JSHOP_DISPLAY_NUMBER.": "; ?></div>
            <div class = "span9"><?php echo $this->product_count?></div>
        </div>
    <?php endif; ?>
</div>
<?php endif; ?>

<?php if ($this->config->show_product_list_filters && $this->filter_show) : ?>
    <?php if ($this->config->show_sort_product || $this->config->show_count_select_products) : ?>
    <div class="margin_filter"></div>
    <?php endif; ?>
    
    <div class = "row-fluid jshop filters">    
        <?php if ($this->filter_show_category) : ?>
            <div class = "span6 box_category">
                <div class = "span3"><?php print _JSHOP_CATEGORY.": "; ?></div>
                <div class = "span9"><?php echo $this->categorys_sel?></div>
            </div>
        <?php endif; ?>
        <?php if ($this->filter_show_manufacturer) : ?>
            <div class="span6 box_manufacrurer">
                <div class = "span3"><?php print _JSHOP_MANUFACTURER.": "; ?></div>
                <div class = "span9"><?php echo $this->manufacuturers_sel; ?></div>
            </div>
        <?php endif; ?>
        <?php print $this->_tmp_ext_filter_box;?>
    </div>
    <div class = "row-fluid jshop filters">
        <?php if (getDisplayPriceShop()) : ?>
            <div class = "span6 filter_price">
                <div class = "span3"><?php print _JSHOP_PRICE?>: <?php print _JSHOP_FROM?></div>
                <div class = "span9 box_price_from"><input type="text" class="input" name="fprice_from" id="price_from" size="7" value="<?php if ($this->filters['price_from']>0) print $this->filters['price_from']?>" /></div>
            </div>
            <div class = "span6 filter_price">
                <div class = "span3"><?php print _JSHOP_TO?></div>
                <div class = "span9 box_price_to"><input type="text" class="input" name="fprice_to"  id="price_to" size="7" value="<?php if ($this->filters['price_to']>0) print $this->filters['price_to']?>" /> <?php print $this->config->currency_code?></div>
            </div>
        <?php endif; ?>
        
        <?php print $this->_tmp_ext_filter;?>
        <div class = "pull-right">
            <input type="button" class="btn button" value="<?php print _JSHOP_GO; ?>" onclick="submitListProductFilters();" />
            <span class="clear_filter"><a href="#" onclick="clearProductListFilter();return false;"><?php print _JSHOP_CLEAR_FILTERS?></a></span>
        </div>
    </div>
<?php endif; ?>
<input type="hidden" name="orderby" id="orderby" value="<?php print $this->orderby?>" />
<input type="hidden" name="limitstart" value="0" />
</form>