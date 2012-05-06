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

		
		//Slider  
         jQuery('#slideshow').cycle({            
			activePagerClass: '<?php echo $params->get('activePagerClass');?>', // class name used for the active pager link
			after:            null,     // transition callback (scope set to element that was shown):  function(currSlideElement, nextSlideElement, options, forwardFlag)
			allowPagerClickBubble: <?php echo $params->get('allowPagerClickBubble');?>, // allows or prevents click event on pager anchors from bubbling
			animIn:           <?php echo $params->get('animIn');?>,     // properties that define how the slide animates in
			animOut:          <?php echo $params->get('animOut');?>,     // properties that define how the slide animates out
			aspect:           false,    // preserve aspect ratio during fit resizing, cropping if necessary (must be used with fit option)
			autostop:         <?php echo $params->get('autostop');?>,        // true to end slideshow after X transitions (where X == slide count)
			autostopCount:    <?php echo $params->get('autostopCount');?>,        // number of transitions (optionally used with autostop to define X)
			backwards:        <?php echo $params->get('backwards','false');?>,    // true to start slideshow at last slide and move backwards through the stack
			before:           null,     // transition callback (scope set to element to be shown):     function(currSlideElement, nextSlideElement, options, forwardFlag)
			center:           null,     // set to true to have cycle add top/left margin to each slide (use with width and height options)
			
			cleartypeNoBg:    <?php echo $params->get('cleartypeNoBg',"false");?>,    // set to true to disable extra cleartype fixing (leave false to force background color setting on slides)
			containerResize:  <?php echo $params->get('containerResize');?>,        // resize container to fit largest slide
			continuous:       <?php echo $params->get('continuous');?>,        // true to start next transition immediately after current one completes
			cssAfter:         <?php echo $params->get('cssAfter');?>,     // properties that defined the state of the slide after transitioning out
			cssBefore:        <?php echo $params->get('cssBefore');?>,     // properties that define the initial state of the slide before transitioning in
			delay:            -<?php echo $params->get('delay');?>,        // additional delay (in ms) for first transition (hint: can be negative)
			easeIn:           null,     // easing for "in" transition
			easeOut:          null,     // easing for "out" transition
			easing:           null,     // easing method for both in and out transitions
			end:              null,     // callback invoked when the slideshow terminates (use with autostop or nowrap options): function(options)
			fastOnEvent:      <?php echo $params->get('fastOnEvent');?>,        // force fast transitions when triggered manually (via pager or prev/next); value == time in ms
			fit:              <?php echo $params->get('fit');?>,        // force slides to fit container
			fx:               '<?php echo $params->get('fx');?>',   // name of transition effect (or comma separated names, ex: 'fade,scrollUp,shuffle')
			fxFn:             null,     // function used to control the transition: function(currSlideElement, nextSlideElement, options, afterCalback, forwardFlag)
			height:           '<?php echo $params->get('height');?>',   // container height (if the 'fit' option is true, the slides will be set to this height as well)
			manualTrump:      <?php echo $params->get('manualTrumph','true');?>,     // causes manual transition to stop an active transition instead of being ignored
			metaAttr:         '<?php echo $params->get('metaAttr');?>',  // data- attribute that holds the option data for the slideshow
			next:             null,     // element, jQuery object, or jQuery selector string for the element to use as event trigger for next slide
			nowrap:           <?php echo $params->get('nowrap');?>,        // true to prevent slideshow from wrapping
			onPagerEvent:     null,     // callback fn for pager events: function(zeroBasedSlideIndex, slideElement)
			onPrevNextEvent:  null,     // callback fn for prev/next events: function(isNext, zeroBasedSlideIndex, slideElement)
			pager:            <?php echo $params->get('pager');?>,     // element, jQuery object, or jQuery selector string for the element to use as pager container
			pagerAnchorBuilder: null,   // callback fn for building anchor links:  function(index, DOMelement)
			pagerEvent:       '<?php echo $params->get('pagerEvent');?>', // name of event which drives the pager navigation
			pause:            <?php echo $params->get('pause');?>,        // true to enable "pause on hover"
			pauseOnPagerHover: <?php echo $params->get('pauseOnPagerHover');?>,       // true to pause when hovering over pager link
			prev:             null,     // element, jQuery object, or jQuery selector string for the element to use as event trigger for previous slide
			prevNextEvent:    '<?php echo $params->get('prevNextEvent');?>',// event which drives the manual transition to the previous or next slide
			random:           <?php echo $params->get('random');?>,        // true for random, false for sequence (not applicable to shuffle fx)
			randomizeEffects: <?php echo $params->get('randomizeEffects');?>,        // valid when multiple effects are used; true to make the effect sequence random
			requeueOnImageNotLoaded: <?php echo $params->get('requeueOnImageNotLoaded');?>, // requeue the slideshow if any image slides are not yet loaded
			requeueTimeout:   <?php echo $params->get('requeueTimeout');?>,      // ms delay for requeue
			rev:              <?php echo $params->get('rev');?>,        // causes animations to transition in reverse (for effects that support it such as scrollHorz/scrollVert/shuffle)
			shuffle:          <?php echo $params->get('shuffle');?>,     // coords for shuffle animation, ex: { top:15, left: 200 }
			skipInitializationCallbacks: false, // set to true to disable the first before/after callback that occurs prior to any transition
			slideExpr:        <?php echo $params->get('slideExpr');?>,     // expression for selecting slides (if something other than all children is required)
			slideResize:      <?php echo $params->get('slideResize');?>,        // force slide width/height to fixed size before every transition
			speed:            <?php echo $params->get('speed');?>,     // speed of the transition (any valid fx speed value)
			speedIn:          <?php echo $params->get('speedIn');?>,     // speed of the 'in' transition
			speedOut:         <?php echo $params->get('speedOut');?>,     // speed of the 'out' transition
			startingSlide:    <?php echo ($params->get('startingSlide') - 1);?>,// zero-based index of the first slide to be displayed
			sync:             <?php echo $params->get('sync');?>,        // true if in/out transitions should occur simultaneously
			timeout:          <?php echo $params->get('timeout');?>,     // milliseconds between slide transitions (0 to disable auto advance)
			timeoutFn:        null,     // callback for determining per-slide timeout value:  function(currSlideElement, nextSlideElement, options, forwardFlag)
			updateActivePagerLink: <?php echo $params->get('updateActivePagerLink');?>,// callback fn invoked to update the active pager link (adds/removes activePagerClass style)
			width:            '<?php echo $params->get('width');?>'      // container width (if the 'fit' option is true, the slides will be set to this width as well)
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
								if($params->get($k)!="null" && $params->get($k)!="")
								{?>
										<li><span class="left"><?php echo $params->get($k)?> :</span> <?php echo $pro->$v ?></li>
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