<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="owl-slider">
	<div class="owl-slider__container owl-carousel">
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<?
				if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):
			
				$arrFile = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>1000, 'height'=>750), BX_RESIZE_IMAGE_EXACT, true); 
			?>
				<div class="owl-slider__item">
					<div class="owl-slider__img">
						<img src="<?=$arrFile["src"]?>" width="1000" height="750" alt="<?=$arItem["NAME"]?>">
					</div>
				</div>
			<?
				endif;
			?>
		<?endforeach;?>						
	</div>							
</div>