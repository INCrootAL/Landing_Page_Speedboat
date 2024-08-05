<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="section__container">
	<div class="container">
		<div class="gallery-box">		          		
		  <div class="gallery-box__container">
		  <?
			foreach($arResult["ITEMS"] as $arItem):
				if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):
				
				$arrFile = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>600, 'height'=>450), BX_RESIZE_IMAGE_EXACT, true);
			?>
				<div class="gallery-box__item">
				  <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="gallery-box__inner">
					<img width="600" height="450" src="<?=$arrFile["src"]?>" alt="">
					<div class="gallery-box__meta">
						<div class="gallery-box__align-center">
							<span><?=$arItem["NAME"]?></span>
						</div>
					</div>
				  </a>
				</div>						
			<?
				endif;
			endforeach;
		  ?>				
		  </div>	
		</div>		
	</div>
</div>