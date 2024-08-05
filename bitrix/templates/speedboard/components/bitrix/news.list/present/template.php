<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="shell">
	<div class="fs-present-display" >
		<div class="container">
			<div class="present-info">
				<div class="present-carousel owl-carousel">		
					<? 	$count = 0;
						foreach($arResult["ITEMS"] as $arItem):
						$count++;
					?>			
						<div class="present-carousel__item">					
							<div class="present-info__inner">
								<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
									<div class="it-aimation">
										<?if($count == 1):?>
											<h1><?=$arItem["NAME"]?></h1>
										<?else:?>
											<h2><?=$arItem["NAME"]?></h2>
										<?endif;?>
									</div>
								<?endif;?>
								<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
									<div class="it-aimation">
										<p><?=$arItem["PREVIEW_TEXT"]?></p>
									</div>
								<?endif;?>
								<?if(!empty($arItem["DISPLAY_PROPERTIES"]['TEXT_BUTTON_PRESENT']['VALUE'])):?>
									<div class="it-aimation">
										<?if ($arItem["DISPLAY_PROPERTIES"]['TEXT_BUTTON_PRESENT']['VALUE'] == "Хочу посмотреть") {?>
											<a href="#advantages" class="button button_large button_fs-present-display">
												<?if(!empty($arItem["DISPLAY_PROPERTIES"]['ICON_BUTTON_PRESENT']['VALUE'])):?>
													<small class="icon-font-<?=$arItem["DISPLAY_PROPERTIES"]['ICON_BUTTON_PRESENT']['VALUE']?>"></small>
												<?endif;?>
												<?=$arItem["DISPLAY_PROPERTIES"]['TEXT_BUTTON_PRESENT']['VALUE']?>
											</a>
										<?} else if ($arItem["DISPLAY_PROPERTIES"]['TEXT_BUTTON_PRESENT']['VALUE'] == "Хочу заказать") {?>
											<a href="#services" class="button button_large button_fs-present-display">
												<?if(!empty($arItem["DISPLAY_PROPERTIES"]['ICON_BUTTON_PRESENT']['VALUE'])):?>
													<small class="icon-font-<?=$arItem["DISPLAY_PROPERTIES"]['ICON_BUTTON_PRESENT']['VALUE']?>"></small>
												<?endif;?>
												<?=$arItem["DISPLAY_PROPERTIES"]['TEXT_BUTTON_PRESENT']['VALUE']?>
											</a>
										<?} else if ($arItem["DISPLAY_PROPERTIES"]['TEXT_BUTTON_PRESENT']['VALUE'] == "Хочу выбрать тур") {?>
											<a href="#services" class="button button_large button_fs-present-display">
												<?if(!empty($arItem["DISPLAY_PROPERTIES"]['ICON_BUTTON_PRESENT']['VALUE'])):?>
													<small class="icon-font-<?=$arItem["DISPLAY_PROPERTIES"]['ICON_BUTTON_PRESENT']['VALUE']?>"></small>
												<?endif;?>
												<?=$arItem["DISPLAY_PROPERTIES"]['TEXT_BUTTON_PRESENT']['VALUE']?>
											</a>
										<?} else {?>
											<span data-dialog="callback" class="button button_large button_fs-present-display">
												<?if(!empty($arItem["DISPLAY_PROPERTIES"]['ICON_BUTTON_PRESENT']['VALUE'])):?>
													<small class="icon-font-<?=$arItem["DISPLAY_PROPERTIES"]['ICON_BUTTON_PRESENT']['VALUE']?>"></small>
												<?endif;?>
												<?=$arItem["DISPLAY_PROPERTIES"]['TEXT_BUTTON_PRESENT']['VALUE']?>
											</span>
										<?}?>
									</div>
								<?endif;?>		
							</div>
						</div>					
					<?endforeach;?>						
				</div>				
			</div>
		</div>
	</div>
</div>