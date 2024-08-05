
<script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js" type="text/javascript"></script>
<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
$this->addExternalJS("script.js");
?>
<div class="dialog__contain">

	<?
	if(!empty($arResult["ERROR_MESSAGE"]))
	{
		?>
		<div class="dialog__error">
			<?
				foreach($arResult["ERROR_MESSAGE"] as $v)
					ShowError($v);			
			?>
		</div>
		<?	
	}
	if(strlen($arResult["OK_MESSAGE"]) > 0)
		{
			?>
			<div class="dialog__success">
				<span><?=$arParams["OK_TEXT"];?></span>
			</div>
			<?$_SESSION['BX_CART'] = array();?>

			<script>
				document.querySelector("#callback-form").style.display = "none";
				document.querySelector(".not-add-cart").style.display = "none";
				//the reload page
				setTimeout(function(){
				    location.reload();
				}, 3000);
			</script>		
			<?
		}
	?>
	<?if (empty($_SESSION['BX_CART'])) {?>
		<div class="not-add-cart">
			<a>Упс, кажется у вас нету добавленных туров...</a>
		</div>
	<?}?>
	
	
	<form <?if (empty($_SESSION['BX_CART'])) {?> style="display:none;" <?}?>id="callback-form" action="<?=POST_FORM_ACTION_URI?>" method="POST">
	
	<?=bitrix_sessid_post()?>
	<div class="item-adding" data-items="<?if(is_array($_SESSION['BX_CART'])) {
			foreach ($_SESSION['BX_CART'] as $sessionID) {
				echo $sessionID . "; ";
			}
		}
		?>">
		<div class="container-cart">
			<h1 class="add-tour-info"></h1>
			<div class="items-add-tour-info">
			<?
			if (is_array($_SESSION['BX_CART'])) {
				echo "<table class=item_".$key.">";
				echo "<tr><th></th><th class='ph-cart-item-inf'>Фото</th><th>Название</th><th class='op-cart-item-inf'>Заезд-Выезд</th><th>Цена</th><th>Предоплата</th></tr>";
				foreach ($_SESSION['BX_CART'] as $key=>$sessionID) {
					echo "<tr class='cart_about". " item_".$key. "'" .">";
					$arIBlockElement = false;
					if (CModule::IncludeModule('iblock') && ($arIBlockElement = GetIBlockElement($sessionID))) {
						$arProps = $arIBlockElement['PROPERTIES'];
						//Is array for verifacation 
						$arrayData = array(20,31,24,32,23,19,27,28,33);
						$arrayPicty = array(19,23,27);
						$arrayPrepay = array(22,26,30);
						$arraySumm = array(21,25,29);
						$arrayPrePay = array(22,30,26);
						foreach($arProps as $property_code=>$arValue) {
							if(!is_array($arValue['VALUE'])) {
								if (!in_array($arValue["ID"],$arrayData)) {
									if (in_array($arValue["ID"],$arraySumm)) {
										echo "<td class='price_tour_".$key."'>".$arValue['VALUE']."</td>";
									} else if (in_array($arValue["ID"],$arrayPrePay)) {
										echo "<td class='prepayer_tour_".$key."'>".$arValue['VALUE']."</td>";
									}
								};
								if (in_array($arValue["ID"],$arrayPicty)) {
									if(!empty($arValue['VALUE'])) {
										echo "<td class='item-close' onclick='deletIsBuy(".$sessionID.")'>"."</td>";
										echo "<td class='ph-cart-item-inf'>".ShowImage($arValue['VALUE'], 150, 150, 'border="0"', '', true)."</td>";
										echo "<td>".$arIBlockElement['NAME']."</td>";
										echo "<input style='display:none' id='input_name_tour' name='TOUR_WITH_DATE_CALLBACK".$key."' type='text'  value='".$arIBlockElement['NAME']."'>";
										foreach($arProps as $property_code=>$arValue1) {
											if (in_array($arValue1["ID"],$arrayPrepay)) {
												echo "<td class='item-time-race'>";
												$date_start = "date_fld_".$key;
												$date_finish = "date_fld_finish_".$key;
												$APPLICATION->IncludeComponent(
													"bitrix:main.calendar",
													"castom-for-cart-calendar",
													Array(
														"FORM_NAME" => $sessionID,
														"HIDE_TIMEBAR" => "Y",
														"INPUT_NAME" => $date_start,
														"INPUT_NAME_FINISH" => $date_finish,
														"INPUT_VALUE" => "",
														"INPUT_VALUE_FINISH" => "",
														"SHOW_INPUT" => "Y",
														"SHOW_TIME" => "N"
													)
												);
												echo "</td>";
											}
										}
									} else {
										echo "<td class='item-close' onclick='deletIsBuy(".$sessionID.")'>"."</td>";?>
										<td class="no-photo-item" style="background-image: url('/bitrix/templates/partner_teal/components/bitrix/catalog.section/castom_section_main/images/no_photo.png'); "></td>
										<?echo "<td>".$arIBlockElement['NAME']."</td>";
										foreach($arProps as $property_code=>$arValue1) {
											if (in_array($arValue1["ID"],$arrayPrepay)) {
												echo "<td class='item-time-race'>";
												$date_start = "date_fld_".$key;
												$date_finish = "date_fld_finish_".$key;
												$APPLICATION->IncludeComponent(
													"bitrix:main.calendar",
													"castom-for-cart-calendar",
													Array(
														"FORM_NAME" => $sessionID,
														"HIDE_TIMEBAR" => "Y",
														"INPUT_NAME" => $date_start,
														"INPUT_NAME_FINISH" => $date_finish,
														"INPUT_VALUE" => "",
														"INPUT_VALUE_FINISH" => "",
														"SHOW_INPUT" => "Y",
														"SHOW_TIME" => "N"
													)
												);
												echo "</td>";
											}
										}
									}
								};
							} else {
								if (!in_array($arValue["ID"],$arrayData)) {
									echo $arValue['NAME'].": ".$arValue['VALUE'];
								}
							}
						}
					}
					echo "</tr>";
				};
				echo "</table>";?>
				
			<?};?>
			
			</div>
		</div>
	</div>
	<div class="item-dop-item">
		<div class="bittons">Дополнительные услги</div>
		<div class="dop-table-for-client">
			<table>
				<?
				CModule::IncludeModule('iblock');
				$arSelect = Array("ID", "IBLOCK_ID", "NAME", "DATE_ACTIVE_FROM","PROPERTY_*");
				$arFilter = Array("IBLOCK_ID"=>18, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
				$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
				$key = 0;
				echo '<tr><th></th><th>Название</th><th>Кол-во дней</th><th>Цена</th><th></th></tr>';
				while($ob = $res->GetNextElement()) { 
					echo "<tr>";
					echo "<td></td>";
					$arFields = $ob->GetFields();
					echo "<td>".$arFields["NAME"]."</td>";
					$arProps = $ob->GetProperties();
					$key++;
					if ($arProps['ENTER_QUANTITY']['VALUE'] == "Да") {
						echo "<td class='item-quantity-day-dop'><div class='item-quantity-day-dop minus yes' id='svg_".$key."_'  data-minus='".$key."' onclick='calcPandM(this)' ></div><input readonly type='text' maxlength='2' data-inputQuanti='".$key."' id='item-quantity-day-dop-input' value='0'><div data-name='".$arFields["NAME"] ."'". "data-pri='".$arProps['PRICE_DOP_CALLBACK']['VALUE']."' id='svg_".$key."' class='item-quantity-day-dop plus yes' data-querdop='0' onclick='calcPandM(this)' data-plus='".$key."'></div></td>";
					} else {
						echo "<td class='item-quantity-day-dop-one'><div class='item-quantity-day-dop minus no' id='svg_".$key."_' data-minus='".$key."' onclick='calcPandM(this)' ></div><input readonly type='text' maxlength='2' data-inputQuanti='".$key."' id='item-quantity-day-dop-input' value='0'><div data-name='".$arFields["NAME"] ."'". "data-pri='".$arProps['PRICE_DOP_CALLBACK']['VALUE']."' id='svg_".$key."' class='item-quantity-day-dop plus no' onclick='calcPandM(this)' data-plus='".$key."'></div></td>";
					};
					echo "<td id='dop-table-for-client-price'>".$arProps['PRICE_DOP_CALLBACK']['VALUE']."</td>";
					/*if ($arProps['ENTER_QUANTITY']['VALUE'] == "Да") {
						echo '<td class="dop-table-for-client-app-add"><svg data-querdop="1" data-name="'.$arFields["NAME"] .'"'. 'data-pri="'.$arProps['PRICE_DOP_CALLBACK']['VALUE'].'" class="svg1" id="svg_'.$key.'" onclick="oneClickPlusAdd(this)" xmlns="http://www.w3.org/2000/svg" version="1.1" width="30" height="30" viewBox="-3 -3 106 106" >
							<circle cx="50" cy="50" r="50" fill="#009688" stroke="#009688" stroke-width="3" />
							<path d="m10 41.7h80l0.1 16.2H10Z" stroke="grey" fill="#FF9800" stroke-width="3"/>
							<path fill="#FF9800" d="M41.5 10.7C41.2 5.6 58 7.2 58 10c0 14.5 0.1 32.7 0.1 32.7l0.3 47.2c0 2.6-16.3 3.4-16.3 0.3L41.9 57.9c0-9.8 0-39-0.4-47.2z" stroke="grey" stroke-width="3"></path></svg></td>';
					} else {
						echo '<td class="dop-table-for-client-app-add"><svg data-name="'.$arFields["NAME"].'"'. 'data-pri="'.$arProps['PRICE_DOP_CALLBACK']['VALUE'].'" class="svg1" id="svg_'.$key.'" onclick="oneClickPlusAdd(this)" xmlns="http://www.w3.org/2000/svg" version="1.1" width="30" height="30" viewBox="-3 -3 106 106" >
							<circle cx="50" cy="50" r="50" fill="#009688" stroke="#009688" stroke-width="3" />
							<path d="m10 41.7h80l0.1 16.2H10Z" stroke="grey" fill="#FF9800" stroke-width="3"/>
							<path fill="#FF9800" d="M41.5 10.7C41.2 5.6 58 7.2 58 10c0 14.5 0.1 32.7 0.1 32.7l0.3 47.2c0 2.6-16.3 3.4-16.3 0.3L41.9 57.9c0-9.8 0-39-0.4-47.2z" stroke="grey" stroke-width="3"></path></svg></td>';
					};*/
					echo "</tr>";
				}
				echo "<input style='display:none' id='input_name__dop_tour' name='TOUR_DOP_PRICE' type='text'  value=''>";
				?>
			</table>
		</div>
	</div>
	<div class="item-summ">
		<div class="item-summ-all">
			<span class="item-summ-all-info">Общая сумма: </span><a id="animation-number-summ" class="final-summ">-</a><a id="currency"> руб.</a>
			<input type="text" name="TOTAL_AMOUNT_CALLBACK" value="" style="display:none;">  
		</div>
		<div class="item-summ-prepay-all">
			<span class="item-summ-prepay-all-info">Общая сумма предоплаты: </span><a id="animation-number-pre" class="final-prepay">-</a><a id="currency"> руб.</a>
			<input type="text" name="TOTAL_AMOUN_PREPAY_CALLBACK" value="" style="display:none;"> 
		</div>
	</div>
	<div class="info-about-client">	
		<div class="container-left">
			<div>
				<input 
					type="text" 
					name="NAME_CALLBACK" 
					placeholder="<?=GetMessage("MCT_NAME")?>" 
					value="<?=$arResult["AUTHOR_NAME"]?>">
			</div>
			<div>
				<input type="text" id="PHONE_CALLBACK_FUNC"
					name="PHONE_CALLBACK" 
					placeholder="<?=GetMessage("MCT_PHONE")?>" 
					value="<?=$arResult["AUTHOR_PHONE"]?>">
			</div>
		</div>
		<div class="container-right">
			<div>
				<input type="text" id="EMAIL_CALLBACK_FUNC"
					name="EMAIL_CALLBACK" 
					placeholder="<?=GetMessage("MCT_EMAIL")?>" 
					value="<?=$arResult["AUTHOR_EMAIL"]?>">
			</div>
			<div>
				<input type="text" 
					name="COMMENTS_CALLBACK" 
					placeholder="<?=GetMessage("MCT_COMM")?>" 
					value="<?=$arResult["AUTHOR_COMMENT"]?>">
			</div>
		</div>
	</div>
	<script>
		$('#item-quantity-day-dop-input').on('input', function () {
			this.value = this.value.replace(/[^0-9]/g, '');
		});	

		//mask input for numver phone
		$("#PHONE_CALLBACK_FUNC").mask("+7(999) 999-9999");
		// Function for blocking date which reservations
		function reservDateCart(e) {
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
	</script>
	<div class="politics-ver">
		<?$APPLICATION->IncludeComponent(
			"bitrix:main.userconsent.request",
			"",
			Array(
				"AUTO_SAVE" => "Y",
				"ID" => "1",
				"IS_CHECKED" => "Y",
				"IS_LOADED" => "N"
			)
		);?>
	</div>
	
	<?if($arParams["USE_CAPTCHA"] == "Y"):?>
	<div>
		<input type="hidden" name="captcha_sid" value="<?=$arResult["capCode"]?>">	
		<input type="text" placeholder="<?=GetMessage("MCT_CAPTCHA_CODE")?>"  name="captcha_word" value="">
	</div>	
	<div class="dialog__captcha">	
		<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["capCode"]?>" width="180" height="40" alt="CAPTCHA">
	</div>		
	<?endif;?>
	
	<input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
	<div class="dialog_button-container">
		<input class="button" type="submit" name="submit" value="<?=GetMessage("MCT_SUBMIT")?>">
	</div>		

	</form>

</div>
<script>
$(function(){
	//Add new mothod to object for checking other character () +
	$.validator.addMethod("laxEmail", function(value, element) {

	return this.optional( element ) || /^([+]?[0-9\s-\(\)]{3,25})*$/.test( value );

	}, '<?=GetMessage("MCT_FIELDS_NUMBERS")?>');
	
	//Validate callback form
	$("#callback-form").validate({ 
		submitHandler: function(form) {
			$(form).ajaxSubmit({
				target:'.dialog__content', 
				url: "<?=SITE_DIR?>include/callback_form.php",	
				beforeSubmit:function(){
					$(".dialog__content").addClass(".dialog__content_loading");
				},
				success:function(){		
					$('[data-dialog-close]').click(dlg.toggle.bind(dlg));	
					$(".dialog__content").removeClass(".dialog__content_loading");
				}			
			});
		},
		focusInvalid: true,
		focusCleanup: false,
		rules: {			
		'NAME_CALLBACK': {
			required: true,
			maxlength: 40,
			minlength: 3,	
		},
		'PHONE_CALLBACK': {
			required: true,
			maxlength: 20,
			minlength: 7,			
		},						
		},
		messages: {
		'NAME_CALLBACK': {
			required: "<?=GetMessage("MCT_FIELDS_NONE")?>",
		},	
		'PHONE_CALLBACK': {
			required: "<?=GetMessage("MCT_FIELDS_NONE")?>",			
		},					
		},
		errorPlacement: function(error, element) {
			var er = element.attr("name");
			error.appendTo( element.parent());	    
		}		
	});
});
</script>
