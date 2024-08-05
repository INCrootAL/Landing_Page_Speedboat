<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="section__container section__container_bg">
	<div class="container">
		<div class="reviews-carousel owl-carousel">
			<?
				foreach($arResult["ITEMS"] as $arItem):
				$words = explode(" ", $arItem['NAME']);
			?>		
				<div class="reviews-carousel__item">
					<div class="reviews-carousel__person">
						<?
							if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):
						
							$arrFile = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>400, 'height'=>400), BX_RESIZE_IMAGE_EXACT, true); 
						?>
							<div class="reviews-carousel__img">
								<div class="owl-slider__img">
									<img src="<?=$arrFile["src"]?>" width="400" height="400" alt="<?=$arItem["NAME"]?>">
								</div>
							</div>
						<?endif;?>					
						<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
							<div class="reviews-carousel__name">
							<?
								if(isset($words[0])) echo "<span>".$words[0]." </span>";
								if(isset($words[1])) echo "<small>".$words[1]." </small>";
								if(isset($words[2])) echo "<small>".$words[2]." </small>";
							?>
							</div>
						<?endif;?>	
					</div>
					<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
						<p><?=$arItem["PREVIEW_TEXT"]?></p>
					<?endif;?>	
				</div>	
			<?endforeach;?>				
		</div>		
	</div>
</div>