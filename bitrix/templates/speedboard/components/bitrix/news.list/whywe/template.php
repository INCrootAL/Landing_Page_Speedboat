<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="promo-list">
	<ul>
	<?foreach($arResult["ITEMS"] as $arItem):?>	
		<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
			<li class="promo-list__item">
				<?if(!empty($arItem["DISPLAY_PROPERTIES"]['ICON_WHYWE']['VALUE'])):?>
					<span class="promo-list__icon icon-font-<?=$arItem["DISPLAY_PROPERTIES"]['ICON_WHYWE']['VALUE']?>"></span>
				<?endif;?>
				<div class="promo-list__text">
					<p><?=$arItem["NAME"]?></p>
				</div>
			</li>		
		<?endif;?>	
	<?endforeach;?>				
	</ul>
</div>