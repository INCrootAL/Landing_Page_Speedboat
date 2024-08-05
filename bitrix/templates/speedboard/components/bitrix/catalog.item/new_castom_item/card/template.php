<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $item
 * @var array $actualItem
 * @var array $minOffer
 * @var array $itemIds
 * @var array $price
 * @var array $measureRatio
 * @var bool $haveOffers
 * @var bool $showSubscribe
 * @var array $morePhoto
 * @var bool $showSlider
 * @var bool $itemHasDetailUrl
 * @var string $imgTitle
 * @var string $productTitle
 * @var string $buttonSizeClass
 * @var string $discountPositionClass
 * @var string $labelPositionClass
 * @var CatalogSectionComponent $component
 */
?>

<div class="product-item">
	<h3 class="product-item-title">
		<? if ($itemHasDetailUrl): ?>
		<a title="<?=$productTitle?>">
			<? endif; ?>
			<?=$productTitle?>
			<? if ($itemHasDetailUrl): ?>
		</a>
	<? endif; ?>
	</h3>
	<div class="panel-1">
	<? if ($itemHasDetailUrl): ?>
	<a class="product-item-image-wrapper" title="<?=$imgTitle?>"
		data-entity="image-wrapper">
		<? else: ?>
		<span class="product-item-image-wrapper" data-entity="image-wrapper">
	<? endif; ?>
		<span class="product-item-image-slider-slide-container slide" id="<?=$itemIds['PICT_SLIDER']?>"
			<?=($showSlider ? '' : 'style="display: none;"')?>
			data-slider-interval="<?=$arParams['SLIDER_INTERVAL']?>" data-slider-wrap="true">
			<?
			if ($showSlider)
			{
				foreach ($morePhoto as $key => $photo)
				{
					?>
					<span class="product-item-image-slide item <?=($key == 0 ? 'active' : '')?>" style="background-image: url('<?=$photo['SRC']?>');"></span>
					<?
				}
			}
			?>
		</span>
		<span class="product-item-image-original" id="<?=$itemIds['PICT']?>" style="background-image: url('<?=$item['PREVIEW_PICTURE']['SRC']?>'); <?=($showSlider ? 'display: none;' : '')?>"></span>
		<?
		if ($item['SECOND_PICT'])
		{
			$bgImage = !empty($item['PREVIEW_PICTURE_SECOND']) ? $item['PREVIEW_PICTURE_SECOND']['SRC'] : $item['PREVIEW_PICTURE']['SRC'];
			?>
			<span class="product-item-image-alternative" id="<?=$itemIds['SECOND_PICT']?>" style="background-image: url('<?=$bgImage?>'); <?=($showSlider ? 'display: none;' : '')?>"></span>
			<?
		}

		if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y')
		{
			?>
			<div class="product-item-label-ring <?=$discountPositionClass?>" id="<?=$itemIds['DSC_PERC']?>"
				<?=($price['PERCENT'] > 0 ? '' : 'style="display: none;"')?>>
				<span><?=-$price['PERCENT']?>%</span>
			</div>
			<?
		}

		if ($item['LABEL'])
		{
			?>
			<div class="product-item-label-text <?=$labelPositionClass?>" id="<?=$itemIds['STICKER_ID']?>">
				<?
				if (!empty($item['LABEL_ARRAY_VALUE']))
				{
					foreach ($item['LABEL_ARRAY_VALUE'] as $code => $value)
					{
						?>
						<div<?=(!isset($item['LABEL_PROP_MOBILE'][$code]) ? ' class="d-none d-sm-block"' : '')?>>
							<span title="<?=$value?>"><?=$value?></span>
						</div>
						<?
					}
				}
				?>
			</div>
			<?
		}
		?>
		<span class="product-item-image-slider-control-container" id="<?=$itemIds['PICT_SLIDER']?>_indicator"
			<?=($showSlider ? '' : 'style="display: none;"')?>>
			<?
			if ($showSlider)
			{
				foreach ($morePhoto as $key => $photo)
				{
					?>
					<span class="product-item-image-slider-control<?=($key == 0 ? ' active' : '')?>" data-go-to="<?=$key?>"></span>
					<?
				}
			}
			?>
		</span>
		<?
		if ($arParams['SLIDER_PROGRESS'] === 'Y')
		{
			?>
			<span class="product-item-image-slider-progress-bar-container">
				<span class="product-item-image-slider-progress-bar" id="<?=$itemIds['PICT_SLIDER']?>_progress_bar" style="width: 0;"></span>
			</span>
			<?
		}
		?>
			<? if ($itemHasDetailUrl): ?>
	</a>
<? else: ?>
	</span>
<? endif; ?>
	<?
	if (!empty($arParams['PRODUCT_BLOCKS_ORDER']))
	{
		foreach ($arParams['PRODUCT_BLOCKS_ORDER'] as $blockName)
		{
			switch ($blockName)
			{
				case 'price': ?>
					<?//del
					break;

				case 'quantityLimit':
					if ($arParams['SHOW_MAX_QUANTITY'] !== 'N')
					{
						if ($haveOffers)
						{
							if ($arParams['PRODUCT_DISPLAY_MODE'] === 'Y')
							{
								?>
								<div class="product-item-info-container product-item-hidden"
									id="<?=$itemIds['QUANTITY_LIMIT']?>"
									style="display: none;"
									data-entity="quantity-limit-block">
									<div class="product-item-info-container-title text-muted">
										<?=$arParams['MESS_SHOW_MAX_QUANTITY']?>:
										<span class="product-item-quantity text-dark" data-entity="quantity-limit-value"></span>
									</div>
								</div>
								<?
							}
						}
						else
						{
							if (
								$measureRatio
								&& (float)$actualItem['CATALOG_QUANTITY'] > 0
								&& $actualItem['CATALOG_QUANTITY_TRACE'] === 'Y'
								&& $actualItem['CATALOG_CAN_BUY_ZERO'] === 'N'
							)
							{
								?>
								<div class="product-item-info-container product-item-hidden" id="<?=$itemIds['QUANTITY_LIMIT']?>">
									<div class="product-item-info-container-title text-muted">
										<?=$arParams['MESS_SHOW_MAX_QUANTITY']?>:
										<span class="product-item-quantity text-dark" data-entity="quantity-limit-value">
												<?
												if ($arParams['SHOW_MAX_QUANTITY'] === 'M')
												{
													if ((float)$actualItem['CATALOG_QUANTITY'] / $measureRatio >= $arParams['RELATIVE_QUANTITY_FACTOR'])
													{
														echo $arParams['MESS_RELATIVE_QUANTITY_MANY'];
													}
													else
													{
														echo $arParams['MESS_RELATIVE_QUANTITY_FEW'];
													}
												}
												else
												{
													echo $actualItem['CATALOG_QUANTITY'].' '.$actualItem['ITEM_MEASURE']['TITLE'];
												}
												?>
											</span>
									</div>
								</div>
								<?
							}
						}
					}

					break;

				case 'quantity':
					if (!$haveOffers)
					{
						if ($actualItem['CAN_BUY'] && $arParams['USE_PRODUCT_QUANTITY'])
						{
							?>
							<div class="product-item-info-container product-item-hidden" data-entity="quantity-block">
								<div class="product-item-amount">
									<div class="product-item-amount-field-container">
										<span class="product-item-amount-field-btn-minus no-select" id="<?=$itemIds['QUANTITY_DOWN']?>"></span>
										<div class="product-item-amount-field-block">
											<input class="product-item-amount-field" id="<?=$itemIds['QUANTITY']?>" type="number" name="<?=$arParams['PRODUCT_QUANTITY_VARIABLE']?>" value="<?=$measureRatio?>">
											<span class="product-item-amount-description-container">
												<span id="<?=$itemIds['QUANTITY_MEASURE']?>"><?=$actualItem['ITEM_MEASURE']['TITLE']?></span>
												<span id="<?=$itemIds['PRICE_TOTAL']?>"></span>
											</span>
										</div>
										<span class="product-item-amount-field-btn-plus no-select" id="<?=$itemIds['QUANTITY_UP']?>"></span>
									</div>
								</div>
							</div>
							<?
						}
					}
					elseif ($arParams['PRODUCT_DISPLAY_MODE'] === 'Y')
					{
						if ($arParams['USE_PRODUCT_QUANTITY'])
						{
							?>
							<div class="product-item-info-container product-item-hidden" data-entity="quantity-block">
								<div class="product-item-amount">
									<div class="product-item-amount-field-container">
										<span class="product-item-amount-field-btn-minus no-select" id="<?=$itemIds['QUANTITY_DOWN']?>"></span>
										<div class="product-item-amount-field-block">
											<input class="product-item-amount-field" id="<?=$itemIds['QUANTITY']?>" type="number" name="<?=$arParams['PRODUCT_QUANTITY_VARIABLE']?>" value="<?=$measureRatio?>">
											<span class="product-item-amount-description-container">
												<span id="<?=$itemIds['QUANTITY_MEASURE']?>"><?=$actualItem['ITEM_MEASURE']['TITLE']?></span>
												<span id="<?=$itemIds['PRICE_TOTAL']?>"></span>
											</span>
										</div>
										<span class="product-item-amount-field-btn-plus no-select" id="<?=$itemIds['QUANTITY_UP']?>"></span>
									</div>
								</div>
							</div>
							<?
						}
					}
					?>
					</div>
					<?break;
				
				case 'buttons':
					?>
					<div class="product-item-info-container product-item-hidden" data-entity="buttons-block">
						<?
						if (!$haveOffers)
						{
							if ($actualItem['CAN_BUY'])
							{
								?>
								<div class="product-item-button-container" id="<?=$itemIds['BASKET_ACTIONS']?>">
									<button class="btn btn-primary <?=$buttonSizeClass?>" id="<?=$itemIds['BUY_LINK']?>"
											href="javascript:void(0)" rel="nofollow">Забронировать
									</button>
								</div>
								<?
							}
							else
							{
								?>
								<div class="product-item-button-container">
									<?
									if ($showSubscribe)
									{
										$APPLICATION->IncludeComponent(
											'bitrix:catalog.product.subscribe',
											'',
											array(
												'PRODUCT_ID' => $actualItem['ID'],
												'BUTTON_ID' => $itemIds['SUBSCRIBE_LINK'],
												'BUTTON_CLASS' => 'btn btn-primary '.$buttonSizeClass,
												'DEFAULT_DISPLAY' => true,
												'MESS_BTN_SUBSCRIBE' => $arParams['~MESS_BTN_SUBSCRIBE'],
											),
											$component,
											array('HIDE_ICONS' => 'Y')
										);
									}
									?>
									<button class="btn btn-link <?=$buttonSizeClass;?><?
									if (is_array($_SESSION['BX_CART'])) {
									if(in_array($item["ID"],$_SESSION['BX_CART'])){ echo " add-cart-use"; } }?>"
											id="button-buy-card" data-item="<?=$item["ID"]?>" href="javascript:void(0)" <?if (is_array($_SESSION['BX_CART'])) { if(!in_array($item["ID"],$_SESSION['BX_CART'])) {?>onclick="Buy(this);"<?} else {?> onclick="clickOpenCart();" <?}} else {?>onclick="Buy(this);"<?}?>rel="nofollow">
											<?if (is_array($_SESSION['BX_CART'])) {
												if(in_array($item["ID"],$_SESSION['BX_CART'])) {
													echo "Открыть заказ";
												} else {
													echo "Забронировать";
												}
											} else {
												echo "Забронировать";
											}
											  ?>
									</button>
									<script>
										function Buy(g) {
											var id = $(g).data("item");
											var formData = new FormData();
											formData.append('id', id);
											var HttpRequest = new XMLHttpRequest();
											HttpRequest.onload = function(e) {
												if (this.status == 200) {
													document.querySelector('.item-adding').innerHTML = this.response;
													g.innerText = "Открыть заказ";
													$(g).attr("onclick", "clickOpenCart()").unbind("click");
													$(g).addClass("add-cart-use");
													document.querySelector("#callback-form").style.display = "contents";
													if (document.querySelector(".not-add-cart")) {
														document.querySelector(".not-add-cart").style.display = "none"
													};
												}
											};

											HttpRequest.open("POST", '/bitrix/templates/partner_teal/ajax/card.php', true);
											HttpRequest.send(formData);
										}
										function clickOpenCart() {
											document.querySelector(".button").click();
										}
									</script>
									
								</div>
								<?
							}
						}
						else
						{
							if ($arParams['PRODUCT_DISPLAY_MODE'] === 'Y')
							{
								?>
								<div class="product-item-button-container">
									<?
									if ($showSubscribe)
									{
										
									}
									?>
									<button class="btn btn-link <?=$buttonSizeClass?>"
											id="<?=$itemIds['NOT_AVAILABLE_MESS']?>" href="javascript:void(0)" rel="nofollow"
										<?=($actualItem['CAN_BUY'] ? 'style="display: none;"' : '')?>>
										Забронировать
									</button>
									<div id="<?=$itemIds['BASKET_ACTIONS']?>" <?=($actualItem['CAN_BUY'] ? '' : 'style="display: none;"')?>>
										<button class="btn btn-primary <?=$buttonSizeClass?>" id="<?=$itemIds['BUY_LINK']?>"
												href="javascript:void(0)" rel="nofollow">
											Забронировать
										</button>
									</div>
								</div>
								<?
							}
							else
							{
								?>
								<div class="product-item-button-container">
									<a class="btn btn-primary <?=$buttonSizeClass?>" href="<?=$item['DETAIL_PAGE_URL']?>">
										<?=$arParams['MESS_BTN_DETAIL']?>
									</a>
								</div>
								<?
							}
						}
						?>
					</div>
					<?
					break;

				case 'props':
					if (!$haveOffers)
					{
						if (!empty($item['DISPLAY_PROPERTIES']))
						{
							?>
							<div class="product-item-info-container product-item-hidden" data-entity="props-block">
								<dl class="product-item-properties">
									<?
									foreach ($item['DISPLAY_PROPERTIES'] as $code => $displayProperty)
									{	
										$NoSeachArray = array(20, 24, 28);
										$SeachArray = array(21, 22, 25, 26, 29, 30);
										$CalendarFree = array(31, 32, 33)?>

										<?if (!in_array($displayProperty['ID'], $NoSeachArray)) {?>
											<dt class="text-muted<?=(!isset($item['PROPERTY_CODE_MOBILE'][$code]) ? ' d-none d-sm-block' : '')?>" <?if (in_array($displayProperty['ID'], $CalendarFree)){?> id="date-reserv-tour" onclick="openCalendar(this)"<?}?>>
												<?=$displayProperty['NAME']?>
												<?if (in_array($displayProperty['ID'], $SeachArray)) {?>
													<?=$displayProperty['DISPLAY_VALUE']?> руб.
												<?} else if (in_array($displayProperty['ID'], $CalendarFree)) {?>
													<?CJSCore::Init(array('date'));?>
													<img src="/bitrix/templates/partner_teal/img/calendar_site.svg" data-id="<?=$item['ID']?>" id="calendar-icon" alt="Посмотреть свободные даты" class="calendar-icon" data-array="<?=is_array($displayProperty['DISPLAY_VALUE'])?>" data-reserv="<?if(is_array($displayProperty['DISPLAY_VALUE'])){foreach($displayProperty['DISPLAY_VALUE'] as $DISP_DATE){ echo $DISP_DATE . ' / '; }}else{echo $displayProperty['DISPLAY_VALUE'];}?>" onclick="BX.calendar({node: this, field: this, bTime: false});; changeCalendarBlock(); changeCalendar(); reservDate(this)" onmouseover="BX.addClass(this, 'calendar-icon-hover');" onmouseout="BX.removeClass(this, 'calendar-icon-hover');" border="0"/>
														<script>
															function changeCalendarBlock() {
																var el = $('[id ^= "calendar_popup_"]'); 
																var links = el.find(".bx-calendar-cell"); 
																var date = new Date();
																for (var i = 0; i < links.length; i++) {
																	var atrDate = links[i].attributes['data-date'].value;
																	var d = date.valueOf();
																	var g = links[i].innerHTML;
																	if(date - atrDate > 24*60*60*1000){
																		$('[data-date="'+atrDate+'"]').addClass("unavailable");
																	}
																}
															}
															function changeCalendar() {
																changeCalendarBlock();
																var BXcalendars = BX.findChildrenByClassName(document,'bx-calendar-cell-block', true);
																const callback = function (mutationList, observer){
																	changeCalendarBlock();
																};
																const observer = new MutationObserver(callback);
																BXcalendars.forEach(function(item,i,arr) {
																	observer.observe(item, {attributes: true, childList: true, subtree:false});
																	}
																);
															}
															// Function for blocking date which reservations
															function reservDate(e) {
																var el = $('[id ^= "calendar_popup_"]'); 
																var links = el.find(".bx-calendar-cell");
																let verArray = $(e).data("array");
																let id_publick = $(e).data("id");
																var date = new Date();
																
																document.querySelector(".bx-calendar-right-arrow").setAttribute("onclick","reservDate(document.querySelector('[data-id=" +'"' + id_publick + '"' + "]'))")
																document.querySelector(".bx-calendar-left-arrow").setAttribute("onclick","reservDate(document.querySelector('[data-id=" +'"' + id_publick + '"' + "]'))")
																//if an array of dates is not used
																if (verArray != 1) {
																	var parsDate = $(e).data("reserv");
																	const [day, month, year] = parsDate.split('.');
																	for (var i = 0; i < links.length; i++) {
																		var seach = links[i].attributes['data-date'].value;
																		
																		if(date - seach < 24*60*60*1000){
																			$('[data-date="'+seach+'"]').removeClass("unavailable");
																		}

																		var _seach = new Date(Number(seach));
																		let timeZone = _seach.toTimeString().substring(0,2);
																		const dateReserv = new Date(+year, +month - 1, +day, timeZone, 00, 00);
																		if (dateReserv.getTime() == seach) {
																			$('[data-date="'+seach+'"]').addClass("unavailable");
																		}
																	}
																} else {
																	for (var h = 0; h < links.length; h++) {
																		var seach_clear = links[h].attributes['data-date'].value;
																		if(date - seach_clear < 24*60*60*1000) {
																			$('[data-date="'+seach_clear+'"]').removeClass("unavailable");
																		}
																	}
																	var parsDate = $(e).data("reserv");
																	var date_list = parsDate.split('/');
																	for  (var i = 0; i < date_list.length - 1; i++) {
																		const [day, month, year] = date_list[i].split('.');
																		for (var g = 0; g < links.length; g++) {
																			var seach = links[g].attributes['data-date'].value;
																			var _seach = new Date(Number(seach));
																			let timeZone = _seach.toTimeString().substring(0,2);
																			const dateReserv = new Date(+year, +month - 1, +day, timeZone,00,00);
																			if (dateReserv.getTime() == seach) {
																				$('[data-date="'+seach+'"]').addClass("unavailable");
																			}
																		}
																	}
																}
															}
															function openCalendar(e) {
																let child = $(e).children('img')[0];
																child.click();
															}
														</script>
												<?}?>
											</dt>
										<?}?>
										
										<?if (in_array($displayProperty['ID'], $NoSeachArray)) {?>
											<dd class="text-dark<?=(!isset($item['PROPERTY_CODE_MOBILE'][$code]) ? ' d-none d-sm-block' : '')?>">
												<?=(is_array($displayProperty['DISPLAY_VALUE'])
													? implode(' / ', $displayProperty['DISPLAY_VALUE'])
													: $displayProperty['DISPLAY_VALUE'])?>
											</dd>
										<?}?>
										<?
									}
									?>
								</dl>
							</div>
							<?
						}

						if ($arParams['ADD_PROPERTIES_TO_BASKET'] === 'Y' && !empty($item['PRODUCT_PROPERTIES']))
						{
							?>
							<div id="<?=$itemIds['BASKET_PROP_DIV']?>" style="display: none;">
								<?
								if (!empty($item['PRODUCT_PROPERTIES_FILL']))
								{
									foreach ($item['PRODUCT_PROPERTIES_FILL'] as $propID => $propInfo)
									{
										?>
										<input type="hidden" name="<?=$arParams['PRODUCT_PROPS_VARIABLE']?>[<?=$propID?>]"
											value="<?=htmlspecialcharsbx($propInfo['ID'])?>">
										<?
										unset($item['PRODUCT_PROPERTIES'][$propID]);
									}
								}

								if (!empty($item['PRODUCT_PROPERTIES']))
								{
									?>
									<table>
										<?
										foreach ($item['PRODUCT_PROPERTIES'] as $propID => $propInfo)
										{
											?>
											<tr>
												<td><?=$item['PROPERTIES'][$propID]['NAME']?></td>
												<td>
													<?
													if (
														$item['PROPERTIES'][$propID]['PROPERTY_TYPE'] === 'L'
														&& $item['PROPERTIES'][$propID]['LIST_TYPE'] === 'C'
													)
													{
														foreach ($propInfo['VALUES'] as $valueID => $value)
														{
															?>
															<label>
																<? $checked = $valueID === $propInfo['SELECTED'] ? 'checked' : ''; ?>
																<input type="radio" name="<?=$arParams['PRODUCT_PROPS_VARIABLE']?>[<?=$propID?>]"
																	value="<?=$valueID?>" <?=$checked?>>
																<?=$value?>
															</label>
															<br />
															<?
														}
													}
													else
													{
														?>
														<select name="<?=$arParams['PRODUCT_PROPS_VARIABLE']?>[<?=$propID?>]">
															<?
															foreach ($propInfo['VALUES'] as $valueID => $value)
															{
																$selected = $valueID === $propInfo['SELECTED'] ? 'selected' : '';
																?>
																<option value="<?=$valueID?>" <?=$selected?>>
																	<?=$value?>
																</option>
																<?
															}
															?>
														</select>
														<?
													}
													?>
												</td>
											</tr>
											<?
										}
										?>
									</table>
									<?
								}
								?>
							</div>
							<?
						}
					}
					else
					{
						$showProductProps = !empty($item['DISPLAY_PROPERTIES']);
						$showOfferProps = $arParams['PRODUCT_DISPLAY_MODE'] === 'Y' && $item['OFFERS_PROPS_DISPLAY'];

						if ($showProductProps || $showOfferProps)
						{
							?>
							<div class="product-item-info-container product-item-hidden" data-entity="props-block">
								<dl class="product-item-properties">
									<?
									if ($showProductProps)
									{
										foreach ($item['DISPLAY_PROPERTIES'] as $code => $displayProperty)
										{
											?>
											<dt class="text-muted1<?=(!isset($item['PROPERTY_CODE_MOBILE'][$code]) ? ' d-none d-sm-block' : '')?>">
												<?=$displayProperty['NAME']?>
											</dt>
											<dd class="text-dark<?=(!isset($item['PROPERTY_CODE_MOBILE'][$code]) ? ' d-none d-sm-block' : '')?>">
												<?=(is_array($displayProperty['DISPLAY_VALUE'])
													? implode(' / ', $displayProperty['DISPLAY_VALUE'])
													: $displayProperty['DISPLAY_VALUE'])?>
											</dd>
											<?
										}
									}

									if ($showOfferProps)
									{
										?>
										<span id="<?=$itemIds['DISPLAY_PROP_DIV']?>" style="display: none;"></span>
										<?
									}
									?>
								</dl>
							</div>
							<?
						}
					}

					break;

				case 'sku':
					if ($arParams['PRODUCT_DISPLAY_MODE'] === 'Y' && $haveOffers && !empty($item['OFFERS_PROP']))
					{
						?>
						<div class="product-item-info-container product-item-hidden" id="<?=$itemIds['PROP_DIV']?>">
							<?
							foreach ($arParams['SKU_PROPS'] as $skuProperty)
							{
								$propertyId = $skuProperty['ID'];
								$skuProperty['NAME'] = htmlspecialcharsbx($skuProperty['NAME']);
								if (!isset($item['SKU_TREE_VALUES'][$propertyId]))
									continue;
								?>
								<div data-entity="sku-block">
									<div class="product-item-scu-container" data-entity="sku-line-block">
										<div class="product-item-scu-block-title text-muted"><?=$skuProperty['NAME']?></div>
										<div class="product-item-scu-block">
											<div class="product-item-scu-list">
												<ul class="product-item-scu-item-list">
													<?
													foreach ($skuProperty['VALUES'] as $value)
													{
														if (!isset($item['SKU_TREE_VALUES'][$propertyId][$value['ID']]))
															continue;

														$value['NAME'] = htmlspecialcharsbx($value['NAME']);

														if ($skuProperty['SHOW_MODE'] === 'PICT')
														{
															?>
															<li class="product-item-scu-item-color-container" title="<?=$value['NAME']?>" data-treevalue="<?=$propertyId?>_<?=$value['ID']?>" data-onevalue="<?=$value['ID']?>">
																<div class="product-item-scu-item-color-block">
																	<div class="product-item-scu-item-color" title="<?=$value['NAME']?>" style="background-image: url('<?=$value['PICT']['SRC']?>');"></div>
																</div>
															</li>
															<?
														}
														else
														{
															?>
															<li class="product-item-scu-item-text-container" title="<?=$value['NAME']?>"
																data-treevalue="<?=$propertyId?>_<?=$value['ID']?>" data-onevalue="<?=$value['ID']?>">
																<div class="product-item-scu-item-text-block">
																	<div class="product-item-scu-item-text"><?=$value['NAME']?></div>
																</div>
															</li>
															<?
														}
													}
													?>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<?
							}
							?>
						</div>
						<?
						foreach ($arParams['SKU_PROPS'] as $skuProperty)
						{
							if (!isset($item['OFFERS_PROP'][$skuProperty['CODE']]))
								continue;

							$skuProps[] = array(
								'ID' => $skuProperty['ID'],
								'SHOW_MODE' => $skuProperty['SHOW_MODE'],
								'VALUES' => $skuProperty['VALUES'],
								'VALUES_COUNT' => $skuProperty['VALUES_COUNT']
							);
						}

						unset($skuProperty, $value);

						if ($item['OFFERS_PROPS_DISPLAY'])
						{
							foreach ($item['JS_OFFERS'] as $keyOffer => $jsOffer)
							{
								$strProps = '';

								if (!empty($jsOffer['DISPLAY_PROPERTIES']))
								{
									foreach ($jsOffer['DISPLAY_PROPERTIES'] as $displayProperty)
									{
										$strProps .= '<dt>'.$displayProperty['NAME'].'</dt><dd>'
											.(is_array($displayProperty['VALUE'])
												? implode(' / ', $displayProperty['VALUE'])
												: $displayProperty['VALUE'])
											.'</dd>';
									}
								}

								$item['JS_OFFERS'][$keyOffer]['DISPLAY_PROPERTIES'] = $strProps;
							}
							unset($jsOffer, $strProps);
						}
					}

					break;
			}
		}
	}

	if (
		$arParams['DISPLAY_COMPARE']
		&& (!$haveOffers || $arParams['PRODUCT_DISPLAY_MODE'] === 'Y')
	)
	{
		?>
		<div class="product-item-compare-container">
			<div class="product-item-compare">
				<div class="checkbox">
					<label id="<?=$itemIds['COMPARE_LINK']?>">
						<input type="checkbox" data-entity="compare-checkbox">
						<span data-entity="compare-title"><?=$arParams['MESS_BTN_COMPARE']?></span>
					</label>
				</div>
			</div>
		</div>
		<?
	}
	?>
</div>