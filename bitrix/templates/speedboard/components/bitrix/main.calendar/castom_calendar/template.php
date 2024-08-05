<?php
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();

/** @var array $arParams */

if (isset($arParams['SILENT']) && $arParams['SILENT'] === 'Y')
{
	return;
}

$cnt = isset($arParams['INPUT_NAME_FINISH']) && $arParams['INPUT_NAME_FINISH'] !== '' ? 2 : 1;
?>

<img src="/bitrix/templates/partner_teal/img/calendar_site.svg" id="calendar-icon" alt="Посмотреть свободные даты" class="calendar-icon" data-reserv="<?=$displayProperty['DISPLAY_VALUE']?>" onclick="BX.calendar({node:this, field:'<?=htmlspecialcharsbx(CUtil::JSEscape($arParams['INPUT_NAME'.($i == 1 ? '_FINISH' : '')]))?>', form: '<?if ($arParams['FORM_NAME'] != ''){echo htmlspecialcharsbx(CUtil::JSEscape($arParams['FORM_NAME']));}?>', bTime: <?=$arParams['SHOW_TIME'] == 'Y' ? 'true' : 'false'?>, currentTime: '<?=(time()+date("Z")+CTimeZone::GetOffset())?>', bHideTime: <?=$arParams['HIDE_TIMEBAR'] == 'Y' ? 'true' : 'false'?>}); changeCalendarBlock(); changeCalendar(); reservDate(this)" onmouseover="BX.addClass(this, 'calendar-icon-hover');" onmouseout="BX.removeClass(this, 'calendar-icon-hover');" border="0"/>
<?if ($cnt == 2 && $i == 0):?>
<?endif;?>
<script>
	function changeCalendarBlock() {
		var el = $('[id ^= "calendar_popup_"]'); 
		var links = el.find(".bx-calendar-cell"); 
		var date = new Date();
		for (var i = 0; i < links.length; i++)
		{
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
	// Clear old class
	function reservDate(e) {
		var el = $('[id ^= "calendar_popup_"]'); 
		var links = el.find(".bx-calendar-cell");
		var parsDate = $(e).data("reserv");
		var date = new Date();

		const [day, month, year] = parsDate.split('.');
		const dateReserv = new Date(+year, +month - 1, +day, 04, 00, 00);
		for (var i = 0; i < links.length; i++) {
			var seach = links[i].attributes['data-date'].value;

			if(date - seach < 24*60*60*1000){
				$('[data-date="'+seach+'"]').removeClass("unavailable");
			}
			
			var _seach = new Date(Number(seach));
			if (dateReserv.getTime() == seach) {
				$('[data-date="'+seach+'"]').addClass("unavailable");
			}
		}
	}
</script>
