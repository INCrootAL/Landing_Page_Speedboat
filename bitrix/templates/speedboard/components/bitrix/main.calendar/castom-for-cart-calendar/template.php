<?php
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();

/** @var array $arParams */

if (isset($arParams['SILENT']) && $arParams['SILENT'] === 'Y')
{
	return;
}

$arIBlockElement = false;
if (CModule::IncludeModule('iblock') && ($arIBlockElement = GetIBlockElement($arParams['FORM_NAME']))) {
	$arProps = $arIBlockElement['PROPERTIES'];
	$arrayDate = array(33,32,31);
	foreach($arProps as $property_code=>$arValue) {
		if (in_array($arValue["ID"],$arrayDate)) {
			$_arValue = $arValue['VALUE'];
		};
	}
}

$cnt = isset($arParams['INPUT_NAME_FINISH']) && $arParams['INPUT_NAME_FINISH'] !== '' ? 2 : 1;

for ($i = 0; $i < $cnt; $i++):
	if (isset($arParams['SHOW_INPUT']) && $arParams['SHOW_INPUT'] === 'Y'):
?><input readonly class="only_value" onclick="clickReplac(this);" type="text" id="<?=$arParams['INPUT_NAME'.($i == 1 ? '_FINISH' : '')]?>"<?if($i == 1){ echo "placeholder='по'";} else { echo "placeholder='c'";};?> name="<?=$arParams['INPUT_NAME'.($i == 1 ? '_FINISH' : '')]?>" value="<?=$arParams['INPUT_VALUE'.($i == 1 ? '_FINISH' : '')]?>" <?=(Array_Key_Exists("~INPUT_ADDITIONAL_ATTR", $arParams)) ? $arParams["~INPUT_ADDITIONAL_ATTR"] : ""?>/><?
	endif;
?><img src="/bitrix/templates/partner_teal/img/calendar_site.svg" data-click="<?echo $arParams['INPUT_NAME'.($i == 1 ? '_FINISH' : '')] . "_icon"?>" alt="<?=GetMessage('calend_title')?>" data-id="<?=$arParams['FORM_NAME']?>" data-array="<?=is_array($_arValue)?>" data-reserv="<?if(is_array($_arValue)){foreach($_arValue as $DISP_DATE){ echo $DISP_DATE . ' / '; }}else{echo $_arValue;}?>" id="calendar-icon" class="calendar-icon" onclick="BX.calendar({node:this, field:'<?=htmlspecialcharsbx(CUtil::JSEscape($arParams['INPUT_NAME'.($i == 1 ? '_FINISH' : '')]))?>', form: '<?if ($arParams['FORM_NAME'] != ''){echo htmlspecialcharsbx(CUtil::JSEscape($arParams['FORM_NAME']));}?>', bTime: <?=$arParams['SHOW_TIME'] == 'Y' ? 'true' : 'false'?>, currentTime: '<?=(time()+date("Z")+CTimeZone::GetOffset())?>', bHideTime: <?=$arParams['HIDE_TIMEBAR'] == 'Y' ? 'true' : 'false'?>});changeCalendarBlock(); changeCalendar(); reservDateCart(this);" onmouseover="BX.addClass(this, 'calendar-icon-hover');" onmouseout="BX.removeClass(this, 'calendar-icon-hover');" border="0"/><?if ($cnt == 2 && $i == 0):?><?endif;?><?
endfor;
?>
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
	function clickReplac(e) {
		let id = e.id;
		let idClick = document.querySelector("img[data-click='"+id+"_icon']");
		idClick.click();
	}
</script>
