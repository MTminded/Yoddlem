	<div class="md-overlay"></div><!-- the overlay element -->
	
	<div id='footer'>
		<div class="footer_overlay">
			<div class='footer_nav container'>
				<div class='logo left'><img src="<?php echo asset_url(); ?>images/yoddlem_logo.png"/></div>
				<div class='right'>Copyright 2013</div>
			</div>
		</div>

	</div> <!-- end #header -->

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	
    <script>window.jQuery || document.write('<script src="<?php echo asset_url(); ?>js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
    <script src="<?php echo asset_url(); ?>js/plugins.js"></script>
    <script type="text/javascript">
    	var asset_url = "<?php echo asset_url();?>";
    	var base_url = "<?php echo base_url();?>";
    </script>
	<script src="<?php echo asset_url(); ?>js/main.js"></script>

	<script src="<?php echo asset_url(); ?>js/classie.js"></script>
	<script src="<?php echo asset_url(); ?>js/modalEffects.js"></script>

	<!-- special IE-only canvas fix -->
	<!--[if IE]><script type="text/javascript" src="script/excanvas.js"></script><![endif]-->

	<!-- Apache-licensed animation library -->
	<script type="text/javascript" src="<?php echo asset_url(); ?>script/berniecode-animator.js"></script>

	<!-- the core stuff -->
	<script type="text/javascript" src="<?php echo asset_url(); ?>script/soundmanager2.js"></script>
	<script type="text/javascript" src="<?php echo asset_url(); ?>script/360player.js"></script>

	<!-- Loading buttons -->
	<script src="<?php echo asset_url(); ?>js/spin.min.js"></script>

	<script type="text/javascript">

		soundManager.setup({
		  // path to directory containing SM2 SWF
		  url: '<?php echo asset_url(); ?>swf/'
		});

		threeSixtyPlayer.config.scaleFont = (navigator.userAgent.match(/msie/i)?false:true);
		threeSixtyPlayer.config.showHMSTime = true;

		// enable some spectrum stuffs

		threeSixtyPlayer.config.useWaveformData = true;
		threeSixtyPlayer.config.useEQData = true;

		// enable this in SM2 as well, as needed

		if (threeSixtyPlayer.config.useWaveformData) {
		  soundManager.flash9Options.useWaveformData = true;
		}
		if (threeSixtyPlayer.config.useEQData) {
		  soundManager.flash9Options.useEQData = true;
		}
		if (threeSixtyPlayer.config.usePeakData) {
		  soundManager.flash9Options.usePeakData = true;
		}

		if (threeSixtyPlayer.config.useWaveformData || threeSixtyPlayer.flash9Options.useEQData || threeSixtyPlayer.flash9Options.usePeakData) {
		  // even if HTML5 supports MP3, prefer flash so the visualization features can be used.
		  soundManager.preferFlash = true;
		}

		// favicon is expensive CPU-wise, but can be enabled.
		threeSixtyPlayer.config.useFavIcon = false;

	</script>
	<script>
        (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src='//www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
        ga('create','UA-XXXXX-X');ga('send','pageview');
    </script>

</body>
</html>