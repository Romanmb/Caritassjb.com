<?php 
/**
* @version      4.3.1 13.08.2013
* @author       MAXXmarketing GmbH
* @package      Jshopping
* @copyright    Copyright (C) 2010 webdesigner-profi.de. All rights reserved.
* @license      GNU/GPL
*/
defined('_JEXEC') or die('Restricted access');
$i = 0;
?>
<?php $countprod = count($this->products);?>
<div class="jshop">
<form action="<?php print SEFLink('index.php?option=com_jshopping&controller=cart&task=refresh')?>" method="post" name="updateCart">
<?php print $this->_tmp_ext_html_cart_start?>
<?php if ($countprod > 0) : ?>
<div class = "jshop cart">
    <?php foreach($this->products as $key_id => $prod) : ?>
        <?php if ($i % 2 == 0) : ?>
            <div class = "row-fluid">
        <?php endif; ?>
        <div class = "span6 jshop_prod_cart">
            <div class = "span4 jshop_img_description_center">
                <a href="<?php print $prod['href']?>">
                    <img src="<?php print $this->image_product_path ?>/<?php if ($prod['thumb_image']) print $prod['thumb_image']; else print $this->no_image; ?>" alt="<?php print htmlspecialchars($prod['product_name']);?>" class="jshop_img" />
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
                    <?php print _JSHOP_SINGLEPRICE; ?>:
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
                    <?php print _JSHOP_NUMBER?>:
                    <input type = "text" name = "quantity[<?php print $key_id ?>]" value = "<?php print $prod['quantity'] ?>" class = "inputbox" style = "width: 25px" />
                    <?php print $prod['_qty_unit'];?>
                    <span class = "cart_reload"><img style="cursor:pointer" src="<?php print $this->image_path ?>/images/reload.png" title="<?php print _JSHOP_UPDATE_CART ?>" alt = "<?php print _JSHOP_UPDATE_CART ?>" onclick="document.updateCart.submit();" /></span>
                </div>
                <div>
                    <?php print _JSHOP_PRICE_TOTAL?>:
                    <?php print formatprice($prod['price']*$prod['quantity']); ?>
                    <?php print $prod['_ext_price_total_html']?>
                    <?php if ($this->config->show_tax_product_in_cart && $prod['tax']>0){?>
                        <span class="taxinfo"><?php print productTaxInfo($prod['tax']);?></span>
                    <?php }?>
                </div>
                <div>
                    <a class = "btn btn-danger" href="<?php print $prod['href_delete']?>" onclick="return confirm('<?php print _JSHOP_CONFIRM_REMOVE?>')"><?php print _JSHOP_REMOVE?></a>
                </div>
            </div>
        </div>
        <?php if ($i % 2 == 1) : ?>
            <div class = "clearfix"></div>
            </div>
        <?php endif; ?>
        <?php $i++; ?>
    <?php endforeach; ?>
    <?php if (--$i % 2 != 1) : ?>
        <div class = "clearfix"></div>
        </div>
    <?php endif; ?>
</div>

<?php if ($this->config->show_weight_order) : ?>
<div class = "weightorder">
    <?php print _JSHOP_WEIGHT_PRODUCTS?>: <span><?php print formatweight($this->weight);?></span>
</div>
<?php endif; ?>
  
<?php if ($this->config->summ_null_shipping > 0) : ?>
<div class = "shippingfree">
    <?php printf(_JSHOP_FROM_PRICE_SHIPPING_FREE, formatprice($this->config->summ_null_shipping, null, 1));?>
</div>
<?php endif; ?>
  
<div class = "cartdescr"><?php print $this->cartdescr; ?></div>
<br/>
<table class="jshop jshop_subtotal">
  <?php if (!$this->hide_subtotal){?>
  <tr>
    <td class="name">
      <?php print _JSHOP_SUBTOTAL ?>
    </td>
    <td class="value">
      <?php print formatprice($this->summ);?><?php print $this->_tmp_ext_subtotal?>
    </td>
  </tr>
  <?php } ?>
  <?php if ($this->discount > 0){ ?>
  <tr>
    <td class="name">
      <?php print _JSHOP_RABATT_VALUE ?>
    </td>
    <td class="value">
      <?php print formatprice(-$this->discount);?><?php print $this->_tmp_ext_discount?>
    </td>
  </tr>
  <?php } ?>
  <?php if (!$this->config->hide_tax){?>
  <?php foreach($this->tax_list as $percent=>$value){ ?>
  <tr>
    <td class = "name">
      <?php print displayTotalCartTaxName();?>
      <?php if ($this->show_percent_tax) print formattax($percent)."%"?>
    </td>
    <td class = "value">
      <?php print formatprice($value);?><?php print $this->_tmp_ext_tax[$percent]?>
    </td>
  </tr>
  <?php } ?>
  <?php } ?>
  <tr class="total">
    <td class = "name">
      <?php print _JSHOP_PRICE_TOTAL ?>
    </td>
    <td class = "value">
      <?php print formatprice($this->fullsumm)?><?php print $this->_tmp_ext_total?>
    </td>
  </tr>
  <?php if ($this->config->show_plus_shipping_in_product){?>  
  <tr>
    <td colspan="2" align="right">    
        <span class="plusshippinginfo"><?php print sprintf(_JSHOP_PLUS_SHIPPING, $this->shippinginfo);?></span>  
    </td>
  </tr>
  <?php }?>
  <?php if ($this->free_discount > 0){?>  
  <tr>
    <td colspan="2" align="right">    
        <span class="free_discount"><?php print _JSHOP_FREE_DISCOUNT;?>: <?php print formatprice($this->free_discount); ?></span>  
    </td>
  </tr>
  <?php }?>  
</table>
<?php else : ?>
    <div class="cart_empty_text"><?php print _JSHOP_CART_EMPTY?></div>
<?php endif; ?>

<div class = "jshop">
    <div id = "checkout">
        <div class = "pull-left td_1">
            <a href = "<?php print $this->href_shop ?>" class = "btn">
                <img src = "<?php print $this->image_path ?>/images/arrow_left.gif" alt="<?php print _JSHOP_BACK_TO_SHOP ?>" />
                <?php print _JSHOP_BACK_TO_SHOP ?>
            </a>
        </div>
        <div class = "pull-right td_2">
        <?php if ($countprod>0) : ?>
            <a href = "<?php print $this->href_checkout ?>" class = "btn">
                <?php print _JSHOP_CHECKOUT ?>
                <img src = "<?php print $this->image_path ?>/images/arrow_right.gif" alt="<?php print _JSHOP_CHECKOUT ?>" />
            </a>
        <?php endif; ?>
        </div>
        <div class = "clearfix"></div>
    </div>
</div>
</form>

<?php print $this->_tmp_ext_html_before_discount?>
<?php if ($this->use_rabatt && $countprod>0) : ?>
<br /><br />
<form name="rabatt" method="post" action="<?php print SEFLink('index.php?option=com_jshopping&controller=cart&task=discountsave'); ?>">
    <div class = "row-fluid jshop">
        <div class = "span12">
            <?php print _JSHOP_RABATT ?>
            <input type = "text" class = "inputbox" name = "rabatt" value = "" />
            <input type = "submit" class = "button btn" value = "<?php print _JSHOP_RABATT_ACTIVE ?>" />
        </div>
    </div>
</form>
<?php endif; ?>
</div>