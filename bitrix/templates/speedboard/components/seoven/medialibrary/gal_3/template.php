<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>

<?php
IncludeModuleLangFile(__FILE__);
if (@count($arResult['COLLECTIONS']['ITEMS'])>0) {
?>
<ul class="seoven_gallery_thumbs"> 
<?
foreach ($arResult['COLLECTIONS']['ITEMS'] as $index => $item) { 
	$element_name = substr($item['NAME'],0,25);
	if(strlen($element_name)==25){ $element_name .= '...'; }

?>
<li class="seoven_gallery_element">
					<a href="<?=$item['PATH']?>" class="thumb_link fancybox_gallery" title="<?=$item['NAME'];?>"  rel="gal1">
						<div class="seoven_gallery_image">
							<img id="element_<?=$index;?>" src="<?=$item['THUMB_PATH'];?>" alt="<?=$item['NAME'];?>" title="<?=$item['NAME'];?>"/>
						</div>
     				</a>
</li>
<?php
}
?>
</ul>

<a id="loadMore_3">Загрузить еще</a>

<script type="text/javascript">
	var j = jQuery.noConflict();
	j(document).ready(function() {
		j('.fancybox_gallery').fancybox({nextClick : true});
	})

</script>
<script>
window.onload = function () {
	var box3 = document.querySelectorAll('.gallery_3 .seoven_gallery_element');
	var btn3 = document.getElementById('loadMore_3');
	for (let i = 11; i<box3.length; i++) {
		box3[i].style.display = "none";
	}

	btn3.addEventListener("click", function() {
		var box3 = document.querySelectorAll('.gallery_3 .seoven_gallery_element');
		let countD3 = 10;
		for(let i=0;i<countD3;i++){
			countD3+=10
			box3[i].style.display = "block";
		}
		
	})
}
</script>

<?php
} else {
echo '<span style="color: red;font-weight: bold;width: 100%;padding: 10px;margin: 5px;">'.GetMessage("seoven.medialibrary_NO_MEDIA").'</span>';	
}
?>

