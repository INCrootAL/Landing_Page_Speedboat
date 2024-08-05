<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div id="isotope" class="gallery-isotope__container">
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
			if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):

			$arrFile = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>600, 'height'=>450), BX_RESIZE_IMAGE_EXACT, true); 
			
			$sectId = $arItem["IBLOCK_SECTION_ID"];
			$sectCode = $arResult["SECTION_LIST"]["$sectId"];
		?>
			<div class="gallery-isotope__item <?if(!empty($sectCode)) echo $sectCode?>">
			  <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="gallery-isotope__img">
				<img src="<?=$arrFile["src"]?>" width="600" height="450" alt="<?=$arItem["NAME"]?>">
				<div class="gallery-isotope__meta">
					<div class="gallery-isotope__align-center">
						<span><?=$arItem["NAME"]?></span>
					</div>
				</div>
			  </a>
			</div>
		<?
			endif;
		?>	
	<?endforeach;?>
</div>