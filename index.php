<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Охота, рыбалка, аренда яхт в Астрахани");
$APPLICATION->SetPageProperty("description", "Заказ и бронирование туров в Астрахани");
$APPLICATION->SetPageProperty("keywords", "Тур, аренда, охота, рыбалка, Астрахань, отдых");
$APPLICATION->SetTitle("Охота, рыбалка, аренда яхт в Астрахани");
?>

<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"present", 
	array(
		"IBLOCK_TYPE" => "content",
		"IBLOCK_ID" => "1",
		"NEWS_COUNT" => "5",
		"SORT_BY1" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "ACTIVE_FROM",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_TEXT",
			2 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "TEXT_BUTTON_PRESENT",
			1 => "ICON_BUTTON_PRESENT",
			2 => "",
		),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "N",
		"SET_BROWSER_TITLE" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_STATUS_404" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "N",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);?>


<?$APPLICATION->IncludeComponent("bitrix:menu", "menu_top", Array(
	"ROOT_MENU_TYPE" => "top",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => "",
		"MAX_LEVEL" => "1",
		"CHILD_MENU_TYPE" => "",
		"USE_EXT" => "N",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N",
	),
	false
);?>


<div id="howwork" class="section">
	<div class="section__name">
		<div class="container">
			<h2>
			<?$APPLICATION->IncludeFile(
				SITE_DIR."include/title_sections/howwork.php",
				Array(),
				Array("MODE"=>"html")
			);?>				
			</h2>
		</div>
	</div>
	<?$APPLICATION->IncludeComponent("bitrix:news.list", "howwork", Array(
	"IBLOCK_TYPE" => "content",
		"IBLOCK_ID" => "7",	
		"NEWS_COUNT" => "8",	
		"SORT_BY1" => "SORT",	
		"SORT_ORDER1" => "DESC",	
		"SORT_BY2" => "ACTIVE_FROM",	
		"SORT_ORDER2" => "ASC",	
		"FILTER_NAME" => "",	
		"FIELD_CODE" => array(	
			0 => "NAME",
			2 => "PREVIEW_TEXT",
			3 => "",
		),
		"PROPERTY_CODE" => array(	
			0 => "",
			1 => "",
		),
		"CHECK_DATES" => "Y",	
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",	
		"AJAX_OPTION_STYLE" => "N",
		"AJAX_OPTION_HISTORY" => "N",	
		"CACHE_TYPE" => "A",	
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",	
		"CACHE_GROUPS" => "Y",	
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",	
		"SET_TITLE" => "N",	
		"SET_BROWSER_TITLE" => "N",	
		"SET_META_KEYWORDS" => "N",
		"SET_META_DESCRIPTION" => "N",	
		"SET_STATUS_404" => "N",	
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",	
		"ADD_SECTIONS_CHAIN" => "N",	
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",	
		"PARENT_SECTION" => "",	
		"PARENT_SECTION_CODE" => "",	
		"INCLUDE_SUBSECTIONS" => "N",	
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "N",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"PAGER_TEMPLATE" => ".default",	
		"DISPLAY_TOP_PAGER" => "N",	
		"DISPLAY_BOTTOM_PAGER" => "N",	
		"PAGER_TITLE" => "",	
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",	
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	
		"PAGER_SHOW_ALL" => "N",	
		"AJAX_OPTION_ADDITIONAL" => "",	
	),
	false
);?>
</div>


<div id="services" class="section section_inv">
	<div class="">
		<img class="tour-img-fishing" src="/bitrix/templates/partner_teal/img/fishing-man.png" alt="">
		<div class="fish_tour">Рыболовный тур</div>
		<?$APPLICATION->IncludeComponent(
			"bitrix:catalog.section", 
			"castom_section_main", 
			array(
				"ACTION_VARIABLE" => "action",
				"ADD_PICT_PROP" => "IMG",
				"ADD_PROPERTIES_TO_BASKET" => "Y",
				"ADD_SECTIONS_CHAIN" => "N",
				"AJAX_MODE" => "N",
				"AJAX_OPTION_ADDITIONAL" => "",
				"AJAX_OPTION_HISTORY" => "N",
				"AJAX_OPTION_JUMP" => "N",
				"AJAX_OPTION_STYLE" => "Y",
				"BACKGROUND_IMAGE" => "-",
				"BASKET_URL" => "/personal/basket.php",
				"BROWSER_TITLE" => "-",
				"CACHE_FILTER" => "N",
				"CACHE_GROUPS" => "Y",
				"CACHE_TIME" => "36000000",
				"CACHE_TYPE" => "N",
				"COMPATIBLE_MODE" => "N",
				"CYCLIC_LOADING" => "N",
				"CYCLIC_LOADING_COUNTER_NAME" => "cycleCount",
				"DEFERRED_LOAD" => "N",
				"DETAIL_URL" => "",
				"DISABLE_INIT_JS_IN_COMPONENT" => "N",
				"DISPLAY_BOTTOM_PAGER" => "Y",
				"DISPLAY_COMPARE" => "N",
				"DISPLAY_TOP_PAGER" => "N",
				"ELEMENT_SORT_FIELD" => "sort",
				"ELEMENT_SORT_FIELD2" => "id",
				"ELEMENT_SORT_ORDER" => "asc",
				"ELEMENT_SORT_ORDER2" => "desc",
				"ENLARGE_PRODUCT" => "STRICT",
				"FILTER_NAME" => "arrFilter",
				"IBLOCK_ID" => "15",
				"IBLOCK_TYPE" => "content",
				"INCLUDE_SUBSECTIONS" => "Y",
				"LABEL_PROP" => array(
				),
				"LAZY_LOAD" => "N",
				"LINE_ELEMENT_COUNT" => "15",
				"LOAD_ON_SCROLL" => "N",
				"MESSAGE_404" => "",
				"MESS_BTN_ADD_TO_BASKET" => "В корзину",
				"MESS_BTN_BUY" => "Купить",
				"MESS_BTN_DETAIL" => "Подробнее",
				"MESS_BTN_LAZY_LOAD" => "Показать ещё",
				"MESS_BTN_SUBSCRIBE" => "Подписаться",
				"MESS_NOT_AVAILABLE" => "Нет в наличии",
				"MESS_NOT_AVAILABLE_SERVICE" => "Недоступно",
				"META_DESCRIPTION" => "-",
				"META_KEYWORDS" => "-",
				"OFFERS_LIMIT" => "5",
				"PAGER_BASE_LINK_ENABLE" => "N",
				"PAGER_DESC_NUMBERING" => "N",
				"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
				"PAGER_SHOW_ALL" => "N",
				"PAGER_SHOW_ALWAYS" => "N",
				"PAGER_TEMPLATE" => ".default",
				"PAGER_TITLE" => "Товары",
				"PAGE_ELEMENT_COUNT" => "18",
				"PARTIAL_PRODUCT_PROPERTIES" => "N",
				"PRICE_CODE" => array(
				),
				"PRICE_VAT_INCLUDE" => "Y",
				"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
				"PRODUCT_ID_VARIABLE" => "id",
				"PRODUCT_PROPS_VARIABLE" => "prop",
				"PRODUCT_QUANTITY_VARIABLE" => "quantity",
				"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
				"RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
				"RCM_TYPE" => "personal",
				"SECTIONS_OFFSET_MODE" => "N",
				"SECTIONS_OFFSET_VARIABLE" => "",
				"SECTIONS_SECTION_CODE" => "",
				"SECTIONS_SECTION_ID" => "",
				"SECTIONS_TOP_DEPTH" => "2",
				"SECTION_CODE" => "",
				"SECTION_ID" => "",
				"SECTION_ID_VARIABLE" => "SECTION_ID",
				"SECTION_URL" => "",
				"SECTION_USER_FIELDS" => array(
					0 => "",
					1 => "",
				),
				"SEF_MODE" => "N",
				"SET_BROWSER_TITLE" => "N",
				"SET_LAST_MODIFIED" => "N",
				"SET_META_DESCRIPTION" => "N",
				"SET_META_KEYWORDS" => "N",
				"SET_STATUS_404" => "N",
				"SET_TITLE" => "N",
				"SHOW_404" => "N",
				"SHOW_ALL_WO_SECTION" => "N",
				"SHOW_FROM_SECTION" => "N",
				"SHOW_PRICE_COUNT" => "1",
				"SHOW_SECTIONS" => "Y",
				"SHOW_SLIDER" => "Y",
				"SLIDER_INTERVAL" => "3000",
				"SLIDER_PROGRESS" => "N",
				"TEMPLATE_THEME" => "blue",
				"USE_ENHANCED_ECOMMERCE" => "N",
				"USE_MAIN_ELEMENT_SECTION" => "N",
				"USE_PRICE_COUNT" => "N",
				"USE_PRODUCT_QUANTITY" => "N",
				"COMPONENT_TEMPLATE" => "castom_section_main",
				"PROPERTY_CODE_MOBILE" => array(
				)
			),
			false
		);?>
		<img class="tour-img-fish" src="/bitrix/templates/partner_teal/img/fish.png" alt="">
	</div>
	<div class="hunting_tour">
		<img class="tour-img-hunterman" src="/bitrix/templates/partner_teal/img/hunter-man.png" alt="">
		<div class="tour_title">Охотничий тур</div>
		<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section", 
	"castom_section_main", 
	array(
		"ACTION_VARIABLE" => "action",
		"ADD_PICT_PROP" => "IMG",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BACKGROUND_IMAGE" => "-",
		"BASKET_URL" => "/personal/basket.php",
		"BROWSER_TITLE" => "-",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "N",
		"COMPATIBLE_MODE" => "N",
		"CYCLIC_LOADING" => "N",
		"CYCLIC_LOADING_COUNTER_NAME" => "cycleCount",
		"DEFERRED_LOAD" => "N",
		"DETAIL_URL" => "",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_COMPARE" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_ORDER2" => "desc",
		"ENLARGE_PRODUCT" => "STRICT",
		"FILTER_NAME" => "arrFilter",
		"IBLOCK_ID" => "16",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_SUBSECTIONS" => "Y",
		"LABEL_PROP" => array(
		),
		"LAZY_LOAD" => "N",
		"LINE_ELEMENT_COUNT" => "15",
		"LOAD_ON_SCROLL" => "N",
		"MESSAGE_404" => "",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_BTN_LAZY_LOAD" => "Показать ещё",
		"MESS_BTN_SUBSCRIBE" => "Подписаться",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"MESS_NOT_AVAILABLE_SERVICE" => "Недоступно",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"OFFERS_LIMIT" => "5",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Товары",
		"PAGE_ELEMENT_COUNT" => "18",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRICE_CODE" => array(
		),
		"PRICE_VAT_INCLUDE" => "Y",
		"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
		"RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
		"RCM_TYPE" => "personal",
		"SECTIONS_OFFSET_MODE" => "N",
		"SECTIONS_OFFSET_VARIABLE" => "",
		"SECTIONS_SECTION_CODE" => "",
		"SECTIONS_SECTION_ID" => "",
		"SECTIONS_TOP_DEPTH" => "2",
		"SECTION_CODE" => "",
		"SECTION_ID" => "",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SECTION_URL" => "",
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SEF_MODE" => "N",
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SHOW_ALL_WO_SECTION" => "N",
		"SHOW_FROM_SECTION" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"SHOW_SECTIONS" => "Y",
		"SHOW_SLIDER" => "Y",
		"SLIDER_INTERVAL" => "3000",
		"SLIDER_PROGRESS" => "N",
		"TEMPLATE_THEME" => "blue",
		"USE_ENHANCED_ECOMMERCE" => "N",
		"USE_MAIN_ELEMENT_SECTION" => "N",
		"USE_PRICE_COUNT" => "N",
		"USE_PRODUCT_QUANTITY" => "N",
		"COMPONENT_TEMPLATE" => "castom_section_main",
		"PROPERTY_CODE_MOBILE" => array(
		)
	),
	false
);?>
	</div>
	<div class="relax_tour">
		<div class="tour_relax_title">Отдых</div>
		<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section", 
	"castom_section_main", 
	array(
		"ACTION_VARIABLE" => "action",
		"ADD_PICT_PROP" => "IMG",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BACKGROUND_IMAGE" => "-",
		"BASKET_URL" => "/personal/basket.php",
		"BROWSER_TITLE" => "-",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "N",
		"COMPATIBLE_MODE" => "N",
		"CYCLIC_LOADING" => "N",
		"CYCLIC_LOADING_COUNTER_NAME" => "cycleCount",
		"DEFERRED_LOAD" => "N",
		"DETAIL_URL" => "",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_COMPARE" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_ORDER2" => "desc",
		"ENLARGE_PRODUCT" => "STRICT",
		"FILTER_NAME" => "arrFilter",
		"IBLOCK_ID" => "17",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_SUBSECTIONS" => "Y",
		"LABEL_PROP" => array(
		),
		"LAZY_LOAD" => "N",
		"LINE_ELEMENT_COUNT" => "15",
		"LOAD_ON_SCROLL" => "N",
		"MESSAGE_404" => "",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_BTN_LAZY_LOAD" => "Показать ещё",
		"MESS_BTN_SUBSCRIBE" => "Подписаться",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"MESS_NOT_AVAILABLE_SERVICE" => "Недоступно",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"OFFERS_LIMIT" => "5",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Товары",
		"PAGE_ELEMENT_COUNT" => "18",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRICE_CODE" => array(
		),
		"PRICE_VAT_INCLUDE" => "Y",
		"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
		"RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
		"RCM_TYPE" => "personal",
		"SECTIONS_OFFSET_MODE" => "N",
		"SECTIONS_OFFSET_VARIABLE" => "",
		"SECTIONS_SECTION_CODE" => "",
		"SECTIONS_SECTION_ID" => "",
		"SECTIONS_TOP_DEPTH" => "2",
		"SECTION_CODE" => "",
		"SECTION_ID" => "",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SECTION_URL" => "",
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SEF_MODE" => "N",
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SHOW_ALL_WO_SECTION" => "N",
		"SHOW_FROM_SECTION" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"SHOW_SECTIONS" => "Y",
		"SHOW_SLIDER" => "Y",
		"SLIDER_INTERVAL" => "3000",
		"SLIDER_PROGRESS" => "N",
		"TEMPLATE_THEME" => "blue",
		"USE_ENHANCED_ECOMMERCE" => "N",
		"USE_MAIN_ELEMENT_SECTION" => "N",
		"USE_PRICE_COUNT" => "N",
		"USE_PRODUCT_QUANTITY" => "N",
		"COMPONENT_TEMPLATE" => "castom_section_main",
		"PROPERTY_CODE_MOBILE" => array(
		)
	),
	false
);?>
	</div>
</div>


<div id="advantages" class="section section_cols-promo">
	<div class="section__name">
		<div class="container">
			<h2>
			<?$APPLICATION->IncludeFile(
				SITE_DIR."include/title_sections/advantages.php",
				Array(),
				Array("MODE"=>"html")
			);?>				
			</h2>
		</div>
	</div>
	<div class="section_gallery_portpho">
		<div class="_section_gallery_spring">Весна</div>
		<div class="gallery_1">
			<?$APPLICATION->IncludeComponent(
				"seoven:medialibrary",
				"",
				Array(
					"CHOSEN_COLLECTIONS" => "1",
					"SET_FB" => "N",
					"SET_JQ" => "Y"
				)
			);?>
		</div>
		<div class="_section_gallery_summer">Лето</div>
		<div class="gallery_2">
			<?$APPLICATION->IncludeComponent("seoven:medialibrary", "gal_casom_2", Array(
				"CHOSEN_COLLECTIONS" => "2",	// Раздел галереи
					"SET_FB" => "Y",	// Подключить Fancybox
					"SET_JQ" => "Y",	// Подключить JQuery
				),
				false
			);?>
		</div>
		<div class="_section_gallery_fall">Осень</div>
		<div class="gallery_3">
			<?$APPLICATION->IncludeComponent("seoven:medialibrary", "gal_3", Array(
				"CHOSEN_COLLECTIONS" => "3",	// Раздел галереи
					"SET_FB" => "Y",	// Подключить Fancybox
					"SET_JQ" => "Y",	// Подключить JQuery
				),
				false
			);?>
		</div>
	<div>
</div>


<div id="reviews" class="section section_bg section_reviews-carousel">
	<div class="section__name section__name_bg">
		<div class="container">
			<h2>
			<?$APPLICATION->IncludeFile(
				SITE_DIR."include/title_sections/reviews.php",
				Array(),
				Array("MODE"=>"html")
			);?>				
			</h2>
		</div>
	</div>
	<?$APPLICATION->IncludeComponent("bitrix:news.list", "reviews", Array(
		"IBLOCK_TYPE" => "content",
			"IBLOCK_ID" => "10",	
			"NEWS_COUNT" => "6",	
			"SORT_BY1" => "SORT",	
			"SORT_ORDER1" => "DESC",	
			"SORT_BY2" => "ACTIVE_FROM",	
			"SORT_ORDER2" => "ASC",	
			"FILTER_NAME" => "",	
			"FIELD_CODE" => array(	
				0 => "NAME",
				1 => "PREVIEW_TEXT",
				2 => "PREVIEW_PICTURE",
			),
			"PROPERTY_CODE" => array(	
				0 => "",
				1 => "",
			),
			"CHECK_DATES" => "Y",	
			"DETAIL_URL" => "",
			"AJAX_MODE" => "N",
			"AJAX_OPTION_JUMP" => "N",	
			"AJAX_OPTION_STYLE" => "N",
			"AJAX_OPTION_HISTORY" => "N",	
			"CACHE_TYPE" => "A",	
			"CACHE_TIME" => "36000000",
			"CACHE_FILTER" => "N",	
			"CACHE_GROUPS" => "Y",	
			"PREVIEW_TRUNCATE_LEN" => "",
			"ACTIVE_DATE_FORMAT" => "d.m.Y",	
			"SET_TITLE" => "N",	
			"SET_BROWSER_TITLE" => "N",	
			"SET_META_KEYWORDS" => "N",
			"SET_META_DESCRIPTION" => "N",	
			"SET_STATUS_404" => "N",	
			"INCLUDE_IBLOCK_INTO_CHAIN" => "N",	
			"ADD_SECTIONS_CHAIN" => "N",	
			"HIDE_LINK_WHEN_NO_DETAIL" => "N",	
			"PARENT_SECTION" => "",	
			"PARENT_SECTION_CODE" => "",	
			"INCLUDE_SUBSECTIONS" => "N",	
			"DISPLAY_DATE" => "N",
			"DISPLAY_NAME" => "Y",
			"DISPLAY_PICTURE" => "Y",
			"DISPLAY_PREVIEW_TEXT" => "Y",
			"PAGER_TEMPLATE" => ".default",	
			"DISPLAY_TOP_PAGER" => "N",	
			"DISPLAY_BOTTOM_PAGER" => "N",	
			"PAGER_TITLE" => "",	
			"PAGER_SHOW_ALWAYS" => "N",
			"PAGER_DESC_NUMBERING" => "N",	
			"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	
			"PAGER_SHOW_ALL" => "N",	
			"AJAX_OPTION_ADDITIONAL" => "",	
		),
		false
	);?>
</div>


<div id="contact" class="section section_map">	
	<div class="section__container section__container_map">
		<div class="contact">
			<div class="container container_contact">
				<div class="contact-card">
					<div class="contact-card__name">
						<h2>
							<?$APPLICATION->IncludeFile(
								SITE_DIR."include/title_sections/contact.php",
								Array(),
								Array("MODE"=>"html")
							);?>							
						</h2>
					</div>
					<div class="contact-card__container">
						<div class="contact-card__row contact-card__row_address">
							<p>
								<?$APPLICATION->IncludeFile(
									SITE_DIR."include/address.php",
									Array(),
									Array("MODE"=>"html")
								);?>								
							</p>
						</div>	
						<div class="contact-card__row contact-card__row_phones modificated-to-mobile">
								<span>
								<?$APPLICATION->IncludeComponent(
	"PMGroup:weather.info", 
	".default", 
	array(
		"ALL" => "N",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"COMPONENT_TEMPLATE" => ".default",
		"DISPLAY_CITY" => "N",
		"DISPLAY_CITY_ALL" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_DATE_ALL" => "Y",
		"OBLACHNOST" => "N",
		"OSADKI" => "N",
		"PRESSURE" => "N",
		"RELWET" => "N",
		"TEMPERATURE" => "Y",
		"WEATHER_BASE_SPISOK" => "969",
		"WIND" => "Y"
	),
	false
);?>
								</span>
								<span>
									<?$APPLICATION->IncludeFile(
										SITE_DIR."include/phone_01.php",
										Array(),
										Array("MODE"=>"html")
									);?>								
								</span>	
								<span>
									<?$APPLICATION->IncludeFile(
										SITE_DIR."include/phone_02.php",
										Array(),
										Array("MODE"=>"html")
									);?>								
								</span>
						</div>
						<div class="contact-card__row contact-card__row_email">
							<?$APPLICATION->IncludeFile(
								SITE_DIR."include/email.php",
								Array(),
								Array("MODE"=>"html")
							);?>							
						</div>							
					</div>
					<?$APPLICATION->IncludeComponent("bitrix:news.list", "social", Array(
						"IBLOCK_TYPE" => "settings",
							"IBLOCK_ID" => "13",	
							"NEWS_COUNT" => "4",	
							"SORT_BY1" => "SORT",	
							"SORT_ORDER1" => "DESC",	
							"SORT_BY2" => "ACTIVE_FROM",	
							"SORT_ORDER2" => "ASC",	
							"FILTER_NAME" => "",	
							"FIELD_CODE" => array(	
								0 => "NAME",
								1 => "",
							),
							"PROPERTY_CODE" => array(	
								0 => "LINK_SOCIAL",
								1 => "ICON_SOCIAL",
							),
							"CHECK_DATES" => "Y",	
							"DETAIL_URL" => "",
							"AJAX_MODE" => "N",
							"AJAX_OPTION_JUMP" => "N",	
							"AJAX_OPTION_STYLE" => "N",
							"AJAX_OPTION_HISTORY" => "N",	
							"CACHE_TYPE" => "A",	
							"CACHE_TIME" => "36000000",
							"CACHE_FILTER" => "N",	
							"CACHE_GROUPS" => "Y",	
							"PREVIEW_TRUNCATE_LEN" => "",
							"ACTIVE_DATE_FORMAT" => "d.m.Y",	
							"SET_TITLE" => "N",	
							"SET_BROWSER_TITLE" => "N",	
							"SET_META_KEYWORDS" => "N",
							"SET_META_DESCRIPTION" => "N",	
							"SET_STATUS_404" => "N",	
							"INCLUDE_IBLOCK_INTO_CHAIN" => "N",	
							"ADD_SECTIONS_CHAIN" => "N",	
							"HIDE_LINK_WHEN_NO_DETAIL" => "N",	
							"PARENT_SECTION" => "",	
							"PARENT_SECTION_CODE" => "",	
							"INCLUDE_SUBSECTIONS" => "N",	
							"DISPLAY_DATE" => "N",
							"DISPLAY_NAME" => "Y",
							"DISPLAY_PICTURE" => "N",
							"DISPLAY_PREVIEW_TEXT" => "N",
							"PAGER_TEMPLATE" => ".default",	
							"DISPLAY_TOP_PAGER" => "N",	
							"DISPLAY_BOTTOM_PAGER" => "N",	
							"PAGER_TITLE" => "",	
							"PAGER_SHOW_ALWAYS" => "N",
							"PAGER_DESC_NUMBERING" => "N",	
							"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	
							"PAGER_SHOW_ALL" => "N",	
							"AJAX_OPTION_ADDITIONAL" => "",	
						),
						false
					);?>					
									</div>
			</div>			
		</div>
		<?$APPLICATION->IncludeComponent(
	"bitrix:map.yandex.view", 
	"map", 
	array(
		"INIT_MAP_TYPE" => "MAP",
		"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:46.01249841392264;s:10:\"yandex_lon\";d:47.880690060550975;s:12:\"yandex_scale\";i:8;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:47.99830483548663;s:3:\"LAT\";d:45.85235894671368;s:4:\"TEXT\";s:68:\"Старт вашего отдыха###RN###(с. Гандурино)\";}}}",
		"MAP_WIDTH" => "100%",
		"MAP_HEIGHT" => "100%",
		"CONTROLS" => array(
		),
		"OPTIONS" => array(
			0 => "ENABLE_DBLCLICK_ZOOM",
			1 => "ENABLE_DRAGGING",
		),
		"MAP_ID" => "map",
		"COMPONENT_TEMPLATE" => "map",
		"API_KEY" => ""
	),
	false
);?>
				</div>		
	</div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>