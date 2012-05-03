<?php
//don't allow other scripts to grab and execute our file
defined('_JEXEC') or die('Direct Access to this location is not allowed.');


if (!class_exists( 'VmConfig' )) require(JPATH_ADMINISTRATOR . DS . 'components' . DS . 'com_virtuemart'.DS.'helpers'.DS.'config.php');
VmConfig::loadConfig();
if (!class_exists( 'VmImage' )) require(JPATH_ADMINISTRATOR . DS . 'components' . DS . 'com_virtuemart'.DS.'helpers'.DS.'mediahandler.php');

if(!class_exists('VmModel'))require(JPATH_VM_ADMINISTRATOR.DS.'helpers'.DS.'vmmodel.php');
	if(!class_exists('VirtueMartModelMedia'))
		require(JPATH_VM_ADMINISTRATOR . DS . 'models' . DS . 'media.php');
		
		$attributes_map = Array(
		"productName" => "product_name",
		"productWeightType" => "product_weight_uom",
		"productWeight" => "product_weight",
		"productLength" => "product_length",
		"productInStock" => "product_in_stock",
		"productSales" => "product_sales",
		"categoryName" => "category_name",
		"productPrice" => "product_price",
		
		);
?>
<link type="text/css" href="<?php echo JURI::root()?>modules/mod_jquery_cycle_vm_slideshow/style.css" rel="stylesheet">
<script src="<?php echo JURI::root()?>modules/mod_jquery_cycle_vm_slideshow/jquery.cycle.all.js" language="javascript"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
//alert("hi");

		
		//Slider  
         jQuery('#slideshow').cycle({
            timeout: 	<?php echo $params->get('timeOut'); ?>,  // milliseconds between slide transitions (0 to disable auto advance)
            fx:       	'<?php echo $params->get('fx'); ?>', // choose your transition type, ex: fade, scrollUp, shuffle, etc...            
            speed:		<?php echo $params->get('speed'); ?>, //speed of the transition (any valid fx speed value)
			speedIn:	<?php echo $params->get('speedIn'); ?>,
			speedIn:	<?php echo $params->get('speedOut'); ?>,
			pause:		<?php echo $params->get('pause'); ?>,
			random:		<?php echo $params->get('random'); ?>,
			sync:		<?php echo $params->get('sync');?>,
			delay:		-<?php echo $params->get('delay'); ?>,
			pager:   '#pager',  // selector for element to use as pager container
            pauseOnPagerHover: 0 // true to pause when hovering over pager link
        });

})
</script>

<?php 
	$productModel = VmModel::getModel('Product');

	$id = split(',',$params->get('productIds'));
	$product= $productModel->getProducts($id);
	
	$productModel->addImages($product);
	$mediaModel = VmModel::getModel('Media');

?>
	<div id="slider_container" >
			<div id="slideshow_navigation">
			<div id="pager"></div>
			</div><!-- end slideshow navigation -->
                <div id="slideshow" > 

<?php
foreach($product as $pro)
{
//print_r($pro);
$images = $mediaModel->createMediaByIds($pro->virtuemart_media_id);

	?>	
 
			
    
					<div class="cycle">
						<img class="productImage" alt="" src="<?php echo $images[0]->file_url; ?>">
						<div class="farme-slide-text">
							<ul class="slide-text">
							<?php 
							foreach($attributes_map as $k=>$v)
							{
								$flag=0;
								if  (($params->get('productName') == 'yes') && !strcmp("productName",$k))
								{
									$flag=1;
								}
								else if(($params->get('productWeightType') == 'yes') && !strcmp("productWeightType",$k))
								{
									$flag=1;
								}
								else if(($params->get('productWeight') == 'yes') && !strcmp("productWeight",$k))
								{
									echo ($params->get('productWeight') == 'yes') && !strcmp("productWeight",$k)."hello";
									$flag=1;
								}
								else if(($params->get('productLength') == 'yes') && !strcmp("productLength",$k))
								{
									$flag=1;
								}
								else if(($params->get('productInStock') == 'yes')  && !strcmp("productInStock",$k))
								{
									$flag=1;
								}
								else if(($params->get('productSales') == 'yes') && !strcmp("productSales",$k))
								{
									$flag=1;
								}
								else if(($params->get('productPrice') == 'yes')  && !strcmp("productPrice",$k))
								{
									$flag=1;
								}
								else if(($params->get('categoryName') == 'yes') && !strcmp("categoryName",$k))
								{
									$flag=1;
								}
								else
								{
									$flag=0;
								
								}
								if($flag==1)
								{?>  
										
										<li><span class="left"><?php echo $k?> :</span> <?php echo $pro->$v ?></li>
						<?php	}
							}?>
							</ul>
							<div class="frame-price">
								<div class="slider-button"><a href="<?php echo $pro->link ?>">info</a></div>
								<div class="slider-price"><?php echo $pro->product_price ?></div>
							</div>
						</div>

						</div><!-- end cycle -->                    
        <?php }
?>            

    			</div>
                </div>