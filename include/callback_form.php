<?
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");?>
<div class="dialog__header">
	<span>Добавленные туры</span>
	<button class="icon-font-cross" data-dialog-close></button>
</div>
<?$APPLICATION->IncludeComponent(
	"asib:main.callback", 
	"callback", 
	array(
		"USE_CAPTCHA" => "Y",
		"OK_TEXT" => "Спасибо, ваша заявка принята:)",
		"EMAIL_TO" => "",
		"EVENT_MESSAGE_ID" => array(
		),
		"IBLOCK_ID_ADD" => "14"
	),
	false
);?>