<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/*
	Добавляем скрипты и стили при необходимости
*/
if($arParams['SET_JQ']=='Y'){
	CUtil::InitJSCore(
					  array('jquery')
					  );
}
if($arParams['SET_FB']=='Y'){
	foreach($arResult['SCRIPTS'] as $js_source){
		$APPLICATION->AddHeadScript($js_source);
	}
	foreach($arResult['CSS'] as $css_source){
		$APPLICATION->SetAdditionalCSS($css_source);
	}
}
?>