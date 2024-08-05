<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="section__container">
	<div class="container">
		<div class="line-carousel owl-carousel">
			<?foreach($arResult["ITEMS"] as $arItem):?>
			<?
				if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):
			
				$arrFile = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>500, 'height'=>350), BX_RESIZE_IMAGE_EXACT, true); 
			?>			
			<div class="line-carousel__item">
				<span>
					<img src="<?=$arrFile["src"]?>" width="500" height="350" alt="<?=$arItem["NAME"]?>">
				</span>
			</div>
			<?
				endif;
			?>
		<?endforeach;?>				
		</div>		
	</div>
</div>