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
<div class="jshop">
<div class = "jshop cart">
    <?php $i=1; $countprod = count($this->products); foreach($this->products as $key_id=>$prod) : ?> 
        <?php if ($i % 2 == 1) : ?>
            <div class = "row-fluid">
        <?php endif; ?>
        <div class = "span6 jshop_prod_cart">
            <div class = "span4 jshop_img_description_center">
                <a href = "<?php print $prod['href']; ?>">
                    <img src = "<?php print $this->image_product_path ?>/<?php if ($prod['thumb_image']) print $prod['thumb_image']; else print $this->no_image; ?>" alt = "<?php print htmlspecialchars($prod['product_name']);?>" class = "jshop_img" />
                </a>
            </div>
            <div class = "span8">
                <div class = "product_name">
                    <a href="<?php print $prod['href']?>"><?php print $prod['product_name']?></a>
                    <?php if ($this->config->show_product_code_in_cart){?>
                    <span class="jshop_code_prod">(<?php print $prod['ean']?>)</span>
                    <?php }?>
                    <?php if ($prod['manufacturer']!=''){?>
                    <div class="manufacturer"><?php print _JSHOP_MANUFACTURER?>: <span><?php print $prod['manufacturer']?></span></div>
                    <?php }?>
                    <?php print sprintAtributeInCart($prod['attributes_value']);?>
                    <?php print sprintFreeAtributeInCart($prod['free_attributes_value']);?>
                    <?php print sprintFreeExtraFiledsInCart($prod['extra_fields']);?>
                    <?php print $prod['_ext_attribute_html']?>        
                </div>    
                <div>
                    <?php print _JSHOP_SINGLEPRICE ?>
                    <?php print formatprice($prod['price'])?>
                    <?php print $prod['_ext_price_html']?>
                    <?php if ($this->config->show_tax_product_in_cart && $prod['tax']>0){?>
                        <span class="taxinfo"><?php print productTaxInfo($prod['tax']);?></span>
                    <?php }?>
                    <?php if ($this->config->cart_basic_price_show && $prod['basicprice']>0){?>
                        <div class="basic_price"><?php print _JSHOP_BASIC_PRICE?>: <span><?php print sprintBasicPrice($prod);?></span></div>
                    <?php }?>
                </div>
                <div>
                    <?php print _JSHOP_NUMBER ?>
                    <?php print $prod['quantity']?><?php print $prod['_qty_unit'];?>
                </div>
                <div>
                    <?php print _JSHOP_PRICE_TOTAL ?>
                    <?php print formatprice($prod['price']*$prod['quantity']);?>
                    <?php print $prod['_ext_price_total_html']?>
                    <?php if ($this->config->show_tax_product_in_cart && $prod['tax']>0){?>
                        <span class="taxinfo"><?php print productTaxInfo($prod['tax']);?></span>
                    <?php }?>
                </div>
                <div>
                  <a class = "btn btn-primary"  href = "<?php print $prod['remove_to_cart'] ?>" ><?php print _JSHOP_REMOVE_TO_CART?></a>
                </div>
                <div>
                  <a class = "btn btn-danger" href = "<?php print $prod['href_delete'] ?>" onclick="return confirm('<?php print _JSHOP_REMOVE?>')"><?php print _JSHOP_DELETE?></a>
                </div>
            </div>
        </div>
        <?php if ($i % 2 == 0) : ?>
            <div class = "clearfix"></div>
            </div>
        <?php endif; ?>  
    <?php $i++; endforeach; ?>
    <?php if (--$i % 2 != 0) : ?>
        <div class = "clearfix"></div>
        </div>
    <?php endif; ?>
</div>
<div class = "jshop">
    <div id = "checkout">
        <div class = "pull-left td_1">
           <a href = "<?php print $this->href_shop ?>" class = "btn">
             <img src = "<?php print $this->image_path ?>/images/arrow_left.gif" alt = "<?php print _JSHOP_BACK_TO_SHOP ?>" />
             <?php print _JSHOP_BACK_TO_SHOP ?>
           </a>
        </div>
        <div class = "pull-right td_2">
           <a href = "<?php print $this->href_checkout ?>" class = "btn">
             <?php print _JSHOP_GO_TO_CART ?>
             <img src = "<?php print $this->image_path ?>/images/arrow_right.gif" alt = "<?php print _JSHOP_GO_TO_CART ?>" />
           </a>
        </div>
        <div class = "clearfix"></div>
    </div>
</div>
</div>