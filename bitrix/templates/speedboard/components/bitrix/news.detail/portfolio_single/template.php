<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="section section_bg section_page-info">
	<div class="section__container section__container_bg">
		<div class="container">
			<div class="page-info">
				<div class="row">
					<div class="col_sm_7">
						<?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
							<div class="page-info__title">
								<h1><?=$arResult["NAME"]?></h1>
							</div>								
						<?endif;?>					
					</div>
					<div class="col_sm_5">
						<div class="page-info__back">
							<a href="<?=SITE_DIR?>"><?=GetMessage('PORTFOLIO_SINGLE_HOME');?></a>
						</div>						
					</div>	
				</div>
			</div>
		</div>
	</div>
</div>		

<div class="section section_gallery-box">
	<div class="section__container">
		<div class="container">
			<div class="article article_gallery-box">
				<?if(strlen($arResult["DETAIL_TEXT"]) > 0):?>
					<?echo $arResult["DETAIL_TEXT"];?>
				<?endif?>				
			</div>
			<div class="gallery-box gallery-box_mfp">
		      <div class="gallery-box__container">
			  <?
			  foreach($arResult["IMG_PORTFOLIO"] as $arFile):
				$file = CFile::ResizeImageGet($arFile,array('width'=>600, 'height'=>450), BX_RESIZE_IMAGE_EXACT, true); 			  
			  ?>
		        <div class="gallery-box__item">
		          <a href="<?=$arFile['SRC']?>" class="gallery-box__inner">
		          	<img width="600" height="450" src="<?=$file['src']?>" alt="<?=$file["NAME"]?>">
		          	<div class="gallery-box__meta">
		          		<div class="gallery-box__align-center gallery-box__align-center_icon">
			          		<span><?=GetMessage('PORTFOLIO_SINGLE_VIEW');?></span>
		          		</div>
		          	</div>
		          </a>
		        </div>
			   <?endforeach;?>          
		      </div>	
			</div>					
		</div>
	</div>
</div>
<script>
$(function(){
	$('.gallery-box_mfp').magnificPopup({
		delegate: 'a',
		type: 'image',
		tLoading: '<?=GetMessage('PORTFOLIO_SINGLE_LOADING');?> image #%curr%...',
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			tCounter: '<span class="mfp-counter">%curr% <?=GetMessage('PORTFOLIO_SINGLE_OF');?> %total%</span>'
		},  
	});	
})
</script>