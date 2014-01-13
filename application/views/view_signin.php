<div id="upload_song">
	<div class='container'>

		<div class="grid_12">
			<h1 class="page_title">Sign in to Yoddlem</h1>
		</div> 

		<div class="clearfix"></div>
		<div class="error"><?php echo $signin_error;?></div>

		<div class="grid_4 form_section">


			<form action="<?php echo base_url(); ?>user/login" method="post" accept-charset="utf-8" data-ajax="false" class="ui-hide-label">

				<div class='input_label'>Username</div>
				<input class="input_normal" type="text" name="username"/>

				<div class='input_label'>Password</div>
				<input class="input_normal" name="password" type="password"/>
				
				<div class="clearfix"></div>
				<div class="clearfix"></div>
				<button type="submit" class='grid_12 omega button button_blue transition300' data-role="none">Sign In</button>

			</form>

		</div>

	</div> <!-- end .container -->
</div> <!-- end #hero_song -->