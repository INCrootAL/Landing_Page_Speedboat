<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if(!empty($arResult)):?>
	<div class="navbar-wrapper">
		<div class="navbar" role="navigation">
			<div class="navbar__header">
				<div class="container">
				  <span class="button_callback_top">Ваши туры</span>
				  <span class="button_callback_top-name">Дельта-тур</span>
				  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar__collapse">
					<span class="navbar-toggle__icon-bar"></span>
					<span class="navbar-toggle__icon-bar"></span>
					<span class="navbar-toggle__icon-bar"></span>
				  </button>   	    		
				</div>     	
			</div>
			<div class="navbar__collapse collapse">
				<div class="container">
				  <ul class="nav navbar__nav">			
					<?	
						$count = 0;
						foreach($arResult as $arItem):
						$count++;
					?>   
						<li>
							<a <?if($count == 0) echo "class='active-item'";?> href="<?=$arItem["LINK"]?>">
								<?=$arItem["TEXT"]?>
							</a>
						</li>
					<?endforeach?>	
				  </ul>					
				</div>	
			</div>
		</div>
	</div>
	<script>
		document.querySelector(".button_callback_top").onclick = function() {
			document.querySelector(".easy-header__callback .button").click();
		}
	</script>
<?endif?>