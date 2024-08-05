
<div class="footer">
	<div class="container">
		<div class="row">
			<div class="col_sm_6">
				<div class="footer__copyright">
					<?$APPLICATION->IncludeFile(
						SITE_DIR."include/copyright_company.php",
						Array(),
						Array("MODE"=>"html")
					);?>	
				</div>
			</div>
			<div class="col_sm_6"></div>
		</div>
	</div>
</div>
<div id="callback" class="dialog">
	<div class="dialog__overlay"></div>
	<div class="dialog__content">
		<?$APPLICATION->IncludeFile(
			SITE_DIR."include/callback_form.php",
			Array(),
			Array("MODE"=>"php")
		);?>
	</div>
</div>

<script src="<?=SITE_TEMPLATE_PATH?>/js/libs/jquery.min.js" type="text/javascript"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/libs/jquery.viewport.js" type="text/javascript"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/plugins/jquery.sticky.js" type="text/javascript"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/plugins/jquery.scrollTo.min.js" type="text/javascript"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/plugins/isotope.pkgd.js" type="text/javascript"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/plugins/imagesloaded.pkgd.min.js" type="text/javascript"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/plugins/jquery.waypoints.min.js" type="text/javascript"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/plugins/owl.carousel.js" type="text/javascript"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/plugins/collapse.js" type="text/javascript"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/plugins/transition.js" type="text/javascript"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/plugins/tab.js" type="text/javascript"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/plugins/countUp.min.js" type="text/javascript"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/plugins/jquery.magnific-popup.js" type="text/javascript"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/plugins/jquery.validate.js" type="text/javascript"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/plugins/jquery.form.min.js" type="text/javascript"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/plugins/SmoothScroll.js" type="text/javascript"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/plugins/modernizr.custom.js" type="text/javascript"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/plugins/classie.js" type="text/javascript"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/plugins/dialogFx.js" type="text/javascript"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/init.js" type="text/javascript"></script>
<!--We need-->
</body>
</html>