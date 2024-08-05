<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="section__container">
	<div class="container">
		<div class="prices">
			<div class="row row_prices">
				<?
					$count = 0; 
					foreach($arResult["ITEMS"] as $arItem):
					$count++;
					
					$position = "prices__container_left";
						if($count == 2) $position = "prices__container_accent";
						if($count == 3) $position = "prices__container_right";
						if($count > 3) break;
				?>	
					<div class="col_md_4 col_prices">						
						<div class="prices__container <?=$position?>">
							<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
								<div class="prices__title <?if($count == 2) echo "prices__title_accent";?>">
									<h3><?=$arItem["NAME"]?></h3>
								</div>
							<?endif;?>	
							<?if(is_array($arItem["DISPLAY_PROPERTIES"]["HOWMUCH_PLUS"]) || is_array($arItem["DISPLAY_PROPERTIES"]["HOWMUCH_MINUS"])):?>
							<div class="prices__include">
								<ul class="prices__list">
									<?foreach($arItem["DISPLAY_PROPERTIES"]["HOWMUCH_PLUS"]["VALUE"] as $value):?>
										<li class="prices__li"><?=$value?></li>
									<?endforeach;?>
									<?foreach($arItem["DISPLAY_PROPERTIES"]["HOWMUCH_MINUS"]["VALUE"] as $value):?>
										<li class="prices__li prices__li_none"><?=$value?></li>
									<?endforeach;?>									
								</ul>
							</div>
							<?endif;?>
							<div class="prices__info <?if($count == 2) echo "prices__info_accent";?>">
								<?if(!empty($arItem["DISPLAY_PROPERTIES"]["PRICE_HOWMUCH"]["VALUE"])):?>
									<div class="prices__price">
									<?=$arItem["DISPLAY_PROPERTIES"]["PRICE_HOWMUCH"]["VALUE"]?>
									</div>
								<?endif;?>
								<?if(!empty($arItem["DISPLAY_PROPERTIES"]["TEXT_BUTTON_HOWMUCH"]["VALUE"])):?>
									<span data-dialog="callback" class="button button_prices">
										<?=$arItem["DISPLAY_PROPERTIES"]["TEXT_BUTTON_HOWMUCH"]["VALUE"]?>
									</span>
								<?endif;?>
							</div>							
						</div>
					</div>
				<?endforeach;?>						
			</div>
		</div>		
	</div>
</div>