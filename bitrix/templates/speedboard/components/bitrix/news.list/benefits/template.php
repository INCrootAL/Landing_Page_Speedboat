<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="section__container section__container_bg">
	<div class="container">
		<div class="benefits">
			<div class="row">
				<form action="">
				<?
					$count = 0; 
					foreach($arResult["ITEMS"] as $arItem):
					$count++;
				?>					
					<div class="col_xs_12 col_sm_6 col_md_3 benefits__item">
						<?if(!empty($arItem["DISPLAY_PROPERTIES"]["AMOUNT_BENEFITS"]["VALUE"])):?>
							<input class="benefits__amount" type="hidden" value="<?=$arItem["DISPLAY_PROPERTIES"]["AMOUNT_BENEFITS"]["VALUE"]?>">
							<span id="count-0<?=$count?>" class="benefits__count">1</span>
						<?endif;?>	
						<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>	
							<p class="benefits__descr"><?=$arItem["NAME"]?></p>
						<?endif;?>	
					</div>
				<?endforeach;?>	
				</form>
			</div>
		</div>		
	</div>
</div>
