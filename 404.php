<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("404 Not Found");?>

<!-- Section -->
<div class="section section_bg section_page-info">
	<div class="section__container section__container_bg">
		<div class="container">
			<div class="page-info">
				<div class="row">
					<div class="col_sm_7">
						<div class="page-info__title">
							<h1>Страница не найдена:)</h1>
						</div>	
					</div>
					<div class="col_sm_5">
						<div class="page-info__back">
							<a href="/">Вернуться на главную</a>
						</div>						
					</div>	
				</div>
			</div>
		</div>
	</div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?> 
<??>