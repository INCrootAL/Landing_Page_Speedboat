<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? //echo "<pre>"; print_r($arResult["ITEMS"]); echo "</pre>";?>
<div class="section__container">
	<div class="container">
		<div class="tabs_faq">
			<ul class="tabs_faq__ul">
				<?
					$count = 0; 
					foreach($arResult["ITEMS"] as $arItem):
					$count++;
				?>				
					<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
						<li class="tabs_faq__li">
							<a href="#tabs-0<?=$count?>"><?=$arItem["NAME"]?></a>
						</li>
					<?endif;?>
				<?endforeach;?>					
			</ul>
			<div class="tabs_faq__content">			
				<?
					$count = 0; 
					foreach($arResult["ITEMS"] as $arItem):
					$count++;
				?>				

					<div class="tabs_faq__pane fade <?if($count == 1) echo "in active";?>" id="tabs-0<?=$count?>">
						<div class="tabs_faq__text">
							<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
								<h2><?=$arItem["NAME"]?></h2>	
							<?endif;?>
							<?if(strlen($arItem["DETAIL_TEXT"]) > 0):?>
								<?=$arItem["DETAIL_TEXT"];?>
							<?endif;?>						
						</div>    	
					</div>				
				<?endforeach;?>	
			</div>			
		</div>	
	</div>
</div>