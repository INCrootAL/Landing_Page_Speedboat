<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="gallery-isotope__filter">
	<ul>
		<li><a href="#" data-filter="*"><?=GetMessage('PORTFOLIO_FILTER_ALL');?></a></li>
		<?foreach($arResult["SECTIONS"] as $arSection):?>
			<li><a href="#" data-filter=".<?=$arSection["CODE"]?>"><?=$arSection["NAME"]?></a></li>
		<?endforeach?>			  
	</ul>
</div>