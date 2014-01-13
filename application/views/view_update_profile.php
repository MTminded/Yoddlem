<div id="hero_cover" style="background-image: url('<?php echo asset_url();?>profile_banners/<?php echo $cover;?>')">
	<div class='container user_info'>
		<img class='left' src="<?php echo asset_url(); ?>profile_pics/<?php echo $pic;?>"/>
		<div class="info_section">
			<h1 class="left"><?php echo $user_name;?> - Edit Profile</h1>
			
		</div>
	</div> <!-- end .container -->
</div> <!-- end #hero_cover -->

<div class="clearfix"></div>

<div id="profile_main">
	<div class='container'>
		<div class='grid_1_fifth' id='profile_menu'>
			<a class='profile_menu_item selected transition300'>Info</a>
			<!-- <a class='profile_menu_item transition300'>Account</a> -->
		</div>

		<div class="grid_4_fifth omega profile_main profile_activities" >

			<div class='grid_12 omega content_box'>
				<div class='container'>
					
					<?php if ($updated_message) :?>
						<div class="clearfix"></div>
						<div class="message"><?php echo $updated_message;?></div>

					<?php endif;?>
					<form id="update_profile" action="<?php echo base_url();?>user/update/<?php echo $user_name;?>" method="post" accept-charset="utf-8" data-ajax="false" class="ui-hide-label">
						
						<div class='grid_6'>
							<div class='input_label'>First Name</div>
							<input class="input_normal" name="first_name" value="<?php echo $first_name;?>" />
						</div>

						<div class='grid_6 omega'>
							<div class='input_label'>Last Name</div>
							<input class="input_normal" name="last_name" value="<?php echo $last_name;?>" />
						</div>

						<div class="clearfix"></div>

						<div class='grid_12 omega'>
							<div class='input_label'>Email</div>
							<input class="input_normal" name="email" value="<?php echo $email;?>" />
						</div>

						<div class="clearfix"></div>

						<div class='grid_6'>
							<div class='input_label'>Profile Picture</div>
							
							<a class='button transition300 block' id="upload_profile_picture">Change Picture</a>
							<input type='file' id='profile_picture_input' name="profile_pic_file" class="hidden" value=""/>
							<button type="submit" id="btn" class='hidden'>Upload Files!</button>
							<input type="hidden" name="profile_picture" value="<?php echo $pic;?>" />

							<div class="clearfix"></div>

							<img class='profile_pic_preview' src="<?php echo asset_url();?>profile_pics/<?php echo $pic;?>" />

						</div>

							

						<div class='grid_6 omega'>
							<div class='input_label'>Cover</div>
							
							<a class='button transition300 block' id="upload_profile_banner">Change Banner</a>
							<input type='file' id='profile_banner_input' name="profile_banner_file" class="hidden" value=""/>
							<button type="submit" id="btn" class='hidden'>Upload Files!</button>
							<input type="hidden" name="profile_banner" value="<?php echo $cover;?>" />

							<div class="clearfix"></div>

							<img class='profile_banner_preview' src="<?php echo asset_url();?>profile_banners/<?php echo $cover;?>" />

						</div>

						<div class="clearfix"></div>
						<div class="clearfix"></div>
						

						<div class='grid_12 omega'>
							
							<button type="submit" class="button button_blue transition300 block">Save</button>
						</div>

					</form>

					<div class="clearfix"></div>
					
				</div>
			</div>

			<div class="clearfix"></div>


		</div> <!-- end .profile_main -->


		<!-- <div class="grid_4_fifth omega profile_main profile_followers hidden" >

			<div class='grid_12 omega content_box'>
				<div class='container'>
					
					<form>

						<div class='grid_6'>
							<div class='input_label'>Username</div>
							<input class="input_normal disabled" name="user_name" value="<?php echo $user_name;?>" disabled="disabled" />
						</div>

						

						<div class="clearfix"></div>

						<div class='grid_6'>
							<div class='input_label'>Password</div>
							<a class="button button_blue block">Change Password</a>
						</div>



					</form>
					
				</div>
			</div>

			<div class="clearfix"></div>


		</div>  -->
		
	</div>
</div>

<div class="clearfix"></div>