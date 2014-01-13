<div id="upload_song">
	<div class='container'>

		<div class="grid_12">
			<h1 class="page_title">Sign up</h1>
		</div> 

		<div class="clearfix"></div>
		<?php echo validation_errors('<p class="error">'); ?>

		<div class="grid_4 form_section">

			<form action="<?php echo base_url(); ?>user/signup" method="post" accept-charset="utf-8" data-ajax="false" class="ui-hide-label">

				<div class='input_label'>Username</div>
				<input class="input_normal" type="text" name="username" value="" />
			

			
				<div class='input_label'>Password</div>
				<input class="input_normal" type="password" name="password" value="" />
			

			
				<div class='input_label'>Confirm Password</div>
				<input class="input_normal" type="password" name="confirm_password" value="" />
				

				<div class="clearfix"></div>
				<div class="clearfix"></div>
				
				<div class='grid_12 omega block'>
					<button type="submit" class="button button_blue transition300 block" data-role="none">Sign Up</button>
					<p class="align_middle">Yep, it's that easy.</p> 
				</div>

			</form>

		</div>

	</div> <!-- end .container -->
</div> <!-- end #hero_song -->