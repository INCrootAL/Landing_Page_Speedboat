<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); 

$arFilter = Array('IBLOCK_ID'=>$arResult["ID"]);
$arSelect = Array('CODE','ID');

$sectionList = CIBlockSection::GetList(Array($by => $order), $arFilter, false, $arSelect);

while($result = $sectionList->GetNext()) {
	$arrSectList[$result['ID']] = $result['CODE'];
}  

$arResult['SECTION_LIST'] = $arrSectList;
?>