<?php
defined('_JEXEC') or die();
if(!class_exists('VmModel'))require(JPATH_VM_ADMINISTRATOR.DS.'helpers'.DS.'vmmodel.php');
if (!class_exists('VmMediaHandler')) require(JPATH_VM_ADMINISTRATOR.DS.'helpers'.DS.'mediahandler.php');

//echo JPATH_VM_ADMINISTRATOR.DS.'helpers'.DS.'vmmodel.php';

?>
<script type="text/javascript">
jQuery(document).ready(function(){
//alert("hi");
})
</script>
<p>
    Hello orld
</p>
<?php 
	$model = VmModel::getModel('Media');
	$list = array();
	$pid = array('1','2');
	$list['images'] = $model->createMediaByIds($pid,'');
	echo $list->file_url ."Hello";
	
	
?>