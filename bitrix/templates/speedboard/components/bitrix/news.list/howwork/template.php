<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="section__container">
	<div class="container">
		<div class="timeline-vertical">
		<?	
			$count = 0;
			foreach($arResult["ITEMS"] as $arItem):
				$count++;
				$inverse = ($count % 2 == 0) ? (true) : (false);
		?>	
				<div class="timeline-vertical__row">
					<div class="timeline-vertical__info">
						<div class="timeline-vertical__date <?if($inverse) echo "timeline-vertical__date_inverse";?>">
							<span><?=GetMessage('HOWWORK_STEP')." ".$count?></span>
						</div>
						<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
							<div class="timeline-vertical__title <?if($inverse) echo "timeline-vertical__title_inverse";?>">
								<h3><?=$arItem["NAME"]?></h3>
							</div>			
						<?endif;?>						
					</div>			
					<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
						<div class="timeline-vertical__text <?if($inverse) echo "timeline-vertical__text_inverse";?>">
							<p><?=$arItem["PREVIEW_TEXT"]?></p>
						</div>
					<?endif;?>
				</div>
		<?endforeach;?>					
		</div>			
	</div>
</div>