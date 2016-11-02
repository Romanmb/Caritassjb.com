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
<div class = "jshop">
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
                <div class="product_name">
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
                    <?php if ($this->config->show_delivery_time_step5 && $this->step==5 && $prod['delivery_times_id']){?>
                    <div class="deliverytime"><?php print _JSHOP_DELIVERY_TIME?>: <?php print $this->deliverytimes[$prod['delivery_times_id']]?></div>
                    <?php }?>
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
                  <?php print _JSHOP_NUMBER ?><?php print $prod['quantity']?><?php print $prod['_qty_unit'];?>
                </div>
                <div>
                    <?php print _JSHOP_PRICE_TOTAL ?>
                    <?php print formatprice($prod['price']*$prod['quantity']);?>
                    <?php print $prod['_ext_price_total_html']?>
                    <?php if ($this->config->show_tax_product_in_cart && $prod['tax']>0){?>
                        <span class="taxinfo"><?php print productTaxInfo($prod['tax']);?></span>
                    <?php }?>
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
    
    <?php if ($this->config->show_weight_order){?>  
        <div class="weightorder">
            <?php print _JSHOP_WEIGHT_PRODUCTS?>: <span><?php print formatweight($this->weight);?></span>
        </div>
    <?php }?>
  <br/>
  
  <table class = "jshop jshop_subtotal">
  <?php if (!$this->hide_subtotal){?>
  <tr>    
    <td class = "name">
      <?php print _JSHOP_SUBTOTAL ?>
    </td>
    <td class = "value">
      <?php print formatprice($this->summ);?><?php print $this->_tmp_ext_subtotal?>
    </td>
  </tr>
  <?php } ?>
  <?php if ($this->discount > 0){ ?>
  <tr>
    <td class = "name">
      <?php print _JSHOP_RABATT_VALUE ?>
    </td>
    <td class = "value">
      <?php print formatprice(-$this->discount);?><?php print $this->_tmp_ext_discount?>
    </td>
  </tr>
  <?php } ?>
  <?php if (isset($this->summ_delivery)){?>
  <tr>
    <td class = "name">
         <?php print _JSHOP_SHIPPING_PRICE;?>
    </td>
    <td class = "value">
      <?php print formatprice($this->summ_delivery);?><?php print $this->_tmp_ext_shipping?>
    </td>
  </tr>
  <?php } ?>
  <?php if (isset($this->summ_package)){?>
  <tr>
    <td class = "name">
         <?php print _JSHOP_PACKAGE_PRICE;?>
    </td>
    <td class = "value">
      <?php print formatprice($this->summ_package);?><?php print $this->_tmp_ext_shipping_package?>
    </td>
  </tr>
  <?php } ?>
  <?php if ($this->summ_payment != 0){ ?>
  <tr>
    <td class = "name">
         <?php print $this->payment_name;?>
    </td>
    <td class = "value">
      <?php print formatprice($this->summ_payment);?><?php print $this->_tmp_ext_payment?>
    </td>
  </tr>
  <?php } ?>  
  <?php if (!$this->config->hide_tax){ ?>
  <?php foreach($this->tax_list as $percent=>$value){?>
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
      <?php print $this->text_total; ?>
    </td>
    <td class = "value">
      <?php print formatprice($this->fullsumm)?><?php print $this->_tmp_ext_total?>
    </td>
  </tr>
  <?php if ($this->free_discount > 0){?>  
  <tr>
    <td colspan="2" align="right">    
        <span class="free_discount"><?php print _JSHOP_FREE_DISCOUNT;?>: <?php print formatprice($this->free_discount); ?></span>  
    </td>
  </tr>
  <?php }?>  
</table>
</div>