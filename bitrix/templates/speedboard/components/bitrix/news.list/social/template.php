<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="social-buttons">
	<ul>
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?if(!empty($arItem["DISPLAY_PROPERTIES"]["LINK_SOCIAL"]["VALUE"]) 
			&& !empty($arItem["DISPLAY_PROPERTIES"]["ICON_SOCIAL"]["VALUE"]) ):?>
		<li class="social-buttons__item">
			<a href="<?=$arItem["DISPLAY_PROPERTIES"]["LINK_SOCIAL"]["VALUE"]?>">
				<? 
				$APPLICATION->IncludeFile(
					SITE_DIR."/include/icons/social/".$arItem["DISPLAY_PROPERTIES"]["ICON_SOCIAL"]["VALUE"].".svg",
					Array(),
					Array("MODE"=>"html")
				);
				?>							
			</a>
		</li>		
		<?endif;?>	
	<?endforeach;?>			
	</ul>
</div>