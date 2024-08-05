<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="section__container">
	<div class="container">
		<div class="cols-promo cols-promo_services">
			<?
				$amountItem = count($arResult["ITEMS"]);
				$count = 0;
				
				foreach($arResult["ITEMS"] as $arItem):
					$count++;
				
					if($count == 1) 
						echo '<div class="row row_cols-promo">';
			?>
					<div class="col_md_4">
						<div class="cols-promo__item cols-promo__item_services">
							<?if(!empty($arItem["DISPLAY_PROPERTIES"]['ICON_SERVICES']['VALUE'])):?>
								<div class="cols-promo__icon cols-promo__icon_services">
									<span class="icon-font-<?=$arItem["DISPLAY_PROPERTIES"]['ICON_SERVICES']['VALUE']?>"></span>
								</div>
							<?endif;?>
							<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
								<div class="cols-promo__title cols-promo__title_services">
									<h3><?=$arItem["NAME"]?></h3>
								</div>
							<?endif;?>
							<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
								<div class="cols-promo__decr cols-promo__decr_services">
									<p><?=$arItem["PREVIEW_TEXT"]?></p>
								</div>
							<?endif;?>
						</div>
					</div>	
				<? 
					if($count % 3 == 0 && $count !== $amountItem) 
						echo '</div><div class="row row_cols-promo">';
					
					if($count == $amountItem) 
						echo '</div>';	
				?>	
			<?endforeach;?>																	
		</div>
	</div>
</div>