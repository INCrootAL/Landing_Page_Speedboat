<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
?>
<!DOCTYPE HTML>
<html lang="ru-RU">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width">
	<meta name="yandex-verification" content="a856f14576ea0e77" />
	<?$APPLICATION->ShowHead();?>
	<title><?$APPLICATION->ShowTitle()?></title>
	<link rel="shortcut icon" type="image/x-icon" href="<?=SITE_TEMPLATE_PATH?>/favicon.ico" />
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700|Playfair+Display|Roboto:300|Scada:400,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
	<link href="<?=SITE_TEMPLATE_PATH?>/css/fonts/icomoon.css" rel="stylesheet" type="text/css">
	<link href="<?=SITE_TEMPLATE_PATH?>/css/plugins/owl-carousel.css" rel="stylesheet" type="text/css">
	<link href="<?=SITE_TEMPLATE_PATH?>/css/plugins/magnific-popup.css" media="screen, projection" rel="stylesheet" type="text/css" />
	<link href="<?=SITE_TEMPLATE_PATH?>/css/style.css" media="screen, projection" rel="stylesheet" type="text/css" />
	<link href="<?=SITE_TEMPLATE_PATH?>/colors.css" media="screen, projection" rel="stylesheet" type="text/css" />
	<link href="/bitrix/js/main/core/css/core_date.min.css" rel="stylesheet" type="text/css" />
	<script src="<?=SITE_TEMPLATE_PATH?>/js/libs/jquery.min.js" type="text/javascript"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/js/libs/jquery.viewport.js" type="text/javascript"></script>
	<script src="/bitrix/components/seoven/medialibrary/fancy/source/helpers/jquery.fancybox-media.js" type="text/javascript"></script>
	<script src="/bitrix/components/seoven/medialibrary/fancy/source/helpers/jquery.fancybox-thumbs.js" type="text/javascript"></script>
	<script src="/bitrix/components/seoven/medialibrary/fancy/source/helpers/jquery.fancybox-buttons.js" type="text/javascript"></script>
	<script src="/bitrix/components/seoven/medialibrary/fancy/source/jquery.fancybox.pack.js" type="text/javascript"></script>
</head>
<body>
<?$APPLICATION->ShowPanel();?>
<?
$APPLICATION->IncludeFile(
	SITE_DIR."include/loader.php",
	Array(),
	Array("MODE"=>"html")
);
?>
<div class="easy-header">
	<div class="easy-header__container">
		<div class="container">
			<div class="row">
				<div class="col_md_3 col_sm_4 col_xs_12">
					<div class="easy-header__logo">
						<?$APPLICATION->IncludeFile(
							SITE_DIR."include/logo_company.php",
							Array(),
							Array("MODE"=>"html")
						);?>						
					</div>
				</div>
				<div class="col_md_6 col_sm_4 col_xs_12">
					<div class="easy-header__phones modificated-to-mobile">
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
							<span id="icon-svg">
								<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0 0 40 48">
									<path fill="#fff" d="M4.868,43.303l2.694-9.835C5.9,30.59,5.026,27.324,5.027,23.979C5.032,13.514,13.548,5,24.014,5c5.079,0.002,9.845,1.979,13.43,5.566c3.584,3.588,5.558,8.356,5.556,13.428c-0.004,10.465-8.522,18.98-18.986,18.98c-0.001,0,0,0,0,0h-0.008c-3.177-0.001-6.3-0.798-9.073-2.311L4.868,43.303z"></path><path fill="#fff" d="M4.868,43.803c-0.132,0-0.26-0.052-0.355-0.148c-0.125-0.127-0.174-0.312-0.127-0.483l2.639-9.636c-1.636-2.906-2.499-6.206-2.497-9.556C4.532,13.238,13.273,4.5,24.014,4.5c5.21,0.002,10.105,2.031,13.784,5.713c3.679,3.683,5.704,8.577,5.702,13.781c-0.004,10.741-8.746,19.48-19.486,19.48c-3.189-0.001-6.344-0.788-9.144-2.277l-9.875,2.589C4.953,43.798,4.911,43.803,4.868,43.803z"></path><path fill="#cfd8dc" d="M24.014,5c5.079,0.002,9.845,1.979,13.43,5.566c3.584,3.588,5.558,8.356,5.556,13.428c-0.004,10.465-8.522,18.98-18.986,18.98h-0.008c-3.177-0.001-6.3-0.798-9.073-2.311L4.868,43.303l2.694-9.835C5.9,30.59,5.026,27.324,5.027,23.979C5.032,13.514,13.548,5,24.014,5 M24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974 M24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974 M24.014,4C24.014,4,24.014,4,24.014,4C12.998,4,4.032,12.962,4.027,23.979c-0.001,3.367,0.849,6.685,2.461,9.622l-2.585,9.439c-0.094,0.345,0.002,0.713,0.254,0.967c0.19,0.192,0.447,0.297,0.711,0.297c0.085,0,0.17-0.011,0.254-0.033l9.687-2.54c2.828,1.468,5.998,2.243,9.197,2.244c11.024,0,19.99-8.963,19.995-19.98c0.002-5.339-2.075-10.359-5.848-14.135C34.378,6.083,29.357,4.002,24.014,4L24.014,4z"></path><path fill="#40c351" d="M35.176,12.832c-2.98-2.982-6.941-4.625-11.157-4.626c-8.704,0-15.783,7.076-15.787,15.774c-0.001,2.981,0.833,5.883,2.413,8.396l0.376,0.597l-1.595,5.821l5.973-1.566l0.577,0.342c2.422,1.438,5.2,2.198,8.032,2.199h0.006c8.698,0,15.777-7.077,15.78-15.776C39.795,19.778,38.156,15.814,35.176,12.832z"></path><path fill="#fff" fill-rule="evenodd" d="M19.268,16.045c-0.355-0.79-0.729-0.806-1.068-0.82c-0.277-0.012-0.593-0.011-0.909-0.011c-0.316,0-0.83,0.119-1.265,0.594c-0.435,0.475-1.661,1.622-1.661,3.956c0,2.334,1.7,4.59,1.937,4.906c0.237,0.316,3.282,5.259,8.104,7.161c4.007,1.58,4.823,1.266,5.693,1.187c0.87-0.079,2.807-1.147,3.202-2.255c0.395-1.108,0.395-2.057,0.277-2.255c-0.119-0.198-0.435-0.316-0.909-0.554s-2.807-1.385-3.242-1.543c-0.435-0.158-0.751-0.237-1.068,0.238c-0.316,0.474-1.225,1.543-1.502,1.859c-0.277,0.317-0.554,0.357-1.028,0.119c-0.474-0.238-2.002-0.738-3.815-2.354c-1.41-1.257-2.362-2.81-2.639-3.285c-0.277-0.474-0.03-0.731,0.208-0.968c0.213-0.213,0.474-0.554,0.712-0.831c0.237-0.277,0.316-0.475,0.474-0.791c0.158-0.317,0.079-0.594-0.04-0.831C20.612,19.329,19.69,16.983,19.268,16.045z" clip-rule="evenodd"></path>
								</svg>
							</span>
							<span id="icon-svg">
								<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="35" viewBox="0 0 40 46">
									<path fill="#29b6f6" d="M24 4A20 20 0 1 0 24 44A20 20 0 1 0 24 4Z"></path><path fill="#fff" d="M33.95,15l-3.746,19.126c0,0-0.161,0.874-1.245,0.874c-0.576,0-0.873-0.274-0.873-0.274l-8.114-6.733 l-3.97-2.001l-5.095-1.355c0,0-0.907-0.262-0.907-1.012c0-0.625,0.933-0.923,0.933-0.923l21.316-8.468 c-0.001-0.001,0.651-0.235,1.126-0.234C33.667,14,34,14.125,34,14.5C34,14.75,33.95,15,33.95,15z"></path><path fill="#b0bec5" d="M23,30.505l-3.426,3.374c0,0-0.149,0.115-0.348,0.12c-0.069,0.002-0.143-0.009-0.219-0.043 l0.964-5.965L23,30.505z"></path><path fill="#cfd8dc" d="M29.897,18.196c-0.169-0.22-0.481-0.26-0.701-0.093L16,26c0,0,2.106,5.892,2.427,6.912 c0.322,1.021,0.58,1.045,0.58,1.045l0.964-5.965l9.832-9.096C30.023,18.729,30.064,18.416,29.897,18.196z"></path>
								</svg>
							</span>
							<span id="icon-svg">
								<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="35" viewBox="0 0 40 46">
									<path fill="#1976d2" d="M24 4A20 20 0 1 0 24 44A20 20 0 1 0 24 4Z"></path><path fill="#fff" d="M35.937,18.041c0.046-0.151,0.068-0.291,0.062-0.416C35.984,17.263,35.735,17,35.149,17h-2.618 c-0.661,0-0.966,0.4-1.144,0.801c0,0-1.632,3.359-3.513,5.574c-0.61,0.641-0.92,0.625-1.25,0.625C26.447,24,26,23.786,26,23.199 v-5.185C26,17.32,25.827,17,25.268,17h-4.649C20.212,17,20,17.32,20,17.641c0,0.667,0.898,0.827,1,2.696v3.623 C21,24.84,20.847,25,20.517,25c-0.89,0-2.642-3-3.815-6.932C16.448,17.294,16.194,17,15.533,17h-2.643 C12.127,17,12,17.374,12,17.774c0,0.721,0.6,4.619,3.875,9.101C18.25,30.125,21.379,32,24.149,32c1.678,0,1.85-0.427,1.85-1.094 v-2.972C26,27.133,26.183,27,26.717,27c0.381,0,1.158,0.25,2.658,2c1.73,2.018,2.044,3,3.036,3h2.618 c0.608,0,0.957-0.255,0.971-0.75c0.003-0.126-0.015-0.267-0.056-0.424c-0.194-0.576-1.084-1.984-2.194-3.326 c-0.615-0.743-1.222-1.479-1.501-1.879C32.062,25.36,31.991,25.176,32,25c0.009-0.185,0.105-0.361,0.249-0.607 C32.223,24.393,35.607,19.642,35.937,18.041z"></path>
								</svg>
							</span>
					</div>
				</div>
				<div class="col_md_3 col_sm_4 col_xs_12">
					<div class="easy-header__callback">
						<span data-dialog="callback" class="button">
							<?$APPLICATION->IncludeFile(
								SITE_DIR."include/callback_button.php",
								Array(),
								Array("MODE"=>"html")
							);?>						
						</span>
					</div>
				</div>			
			</div>
		</div>
	</div>
</div>