<div id="hero_cover" style="background-image: url('<?php echo asset_url();?>profile_banners/<?php echo $cover;?>')">
	<div class='container user_info'>
		<img class='left' src="<?php echo asset_url(); ?>profile_pics/<?php echo $pic;?>"/>
		<div class="info_section">
			<h1 class="left"><?php echo $user_name;?></h1>
			
			<?php if ($this->session->userdata('user_id') != ""):?>
				<?php if($this->session->userdata('user_id')== $id) :?>
					<a class="button button_grey right edit_profile_button" rel="external", data-ajax="false" href="<?php echo base_url(); ?>user/edit/<?php echo $user_name;?>">Edit Profile</a>
				<?php else:?>
					<div class="follow_buttons right">
						<?php if ($isFollower) :?>
							<a class="button unfollow_button follow_button_top transition300 right" name="<?php echo base_url();?>user/unfollow/<?php echo $id?>">Following</a>
							<a class="button button_blue follow_button follow_button_top transition300 right hidden" name="<?php echo base_url();?>user/follow/<?php echo $id?>">Follow</a>

						<?php else: ?>
							<a class="button unfollow_button follow_button_top transition300 hidden right" name="<?php echo base_url();?>user/unfollow/<?php echo $id?>">Following</a>
							<a class="button button_blue follow_button follow_button_top transition300 right" name="<?php echo base_url();?>user/follow/<?php echo $id?>">Follow</a>
						<?php endif;?>
					</div>
				<?php endif;?>
			<!-- show dummy follow button that asks the user to login -->
			<?php else:?>
				<div class="follow_buttons right">
					<a class="button button_blue follow_button_disabled follow_button_top transition300 right md-trigger" data-modal="modal-sign-in3">Follow</a>
				</div>
			<?php endif;?>	
		</div>
	</div> <!-- end .container -->
</div> <!-- end #hero_cover -->

<div class="clearfix"></div>

<div id="profile_main">
	<div class='container'>
		<div class='grid_1_fifth' id='profile_menu'>
			<?php if ($albums || $singles) :?>
			<a class='profile_menu_item selected transition300'>Songs</a>
			<a class='profile_menu_item transition300'>Activities</a>
			<?php else:?>
			<a class='profile_menu_item selected transition300'>Activities</a>
			<?php endif;?>
			<a class='profile_menu_item transition300'>Followers</a>
			<a class='profile_menu_item last_item transition300'>Following</a>
		</div>

		<?php if ($albums || $singles) :?>
		<div class="grid_4_fifth omega profile_main profile_songs" >

			<?php if ($albums) :?>
			<div class='grid_12 omega content_box'>
				<div class='container'>
					<div class="grid_12 omega section_title">Albums</div>
					
					<?php foreach ($albums as $key => $album) :?>

					<div class="grid_4">
						<img src="<?php echo asset_url(); ?>covers/<?php echo $album['cover_art'];?>"/>
					</div>
					<div class="grid_8 omega">
						<h3 class='subsection_title'><?php echo $album['title'];?></h3>
						<ul class="song_list_table grid_12 omega">
							<?php foreach ($album['songs'] as $key => $song) :?>
							<li><a class="reg_link" rel="external", data-ajax="false" href="<?php echo base_url();?>songs/play/<?php echo $song['id'];?>">
									<?php echo $key+1;?>. <?php echo $song['title'];?>
								</a>
							</li>
							<?php endforeach;?>
						</ul>
					</div>
					<div class="clearfix"></div>
					<div class="clearfix"></div>

					<?php endforeach;?>

				</div>
			</div>

			<div class="clearfix"></div>
			<?php endif?>

			

			<?php if ($singles) :?>
			<div class='grid_12 omega content_box'>
				<div class='container'>
					<div class="grid_12 omega section_title">Singles</div>
					
					<?php foreach ($singles as $key => $single) :?>
					<div class="grid_6 single_section">
						<div class="grid_4">
							<a rel="external", data-ajax="false" href="<?php echo base_url();?>songs/play/<?php echo $single['id'];?>">
								<img src="<?php echo asset_url(); ?>covers/<?php echo $single['cover_art'];?>"/>
							</a>
						</div>
						<div class="grid_8 omega">
							<h3 class='subsection_title2'>
								<a class="reg_link" rel="external", data-ajax="false" href="<?php echo base_url();?>songs/play/<?php echo $single['id'];?>">
									<?php echo $single['title'];?>
								</a>
							</h3>
							<div><?php echo $single['upvotes'] - $single['downvotes'];?> points</div>
							<?php if($this->session->userdata('user_id')== $id) :?>
							<a rel="external", data-ajax="false" href="<?php echo base_url();?>songs/edit/<?php echo $single['id'];?>" class="button button_grey left edit_song">Edit</a>
							<?php endif;?>
						</div>
					</div>
					<?php endforeach;?>
					
				</div>
			</div>
			<?php endif;?>

		</div> <!-- end .profile_main -->
		<?php endif;?>

		<div class="grid_4_fifth omega profile_main profile_activities <?php if ($albums || $singles) :?>hidden<?php endif;?>" >

			<div class='grid_12 omega content_box'>
				<div class='container'>
					<div class="grid_12 omega section_title">Recent Activities</div>
					
					<!-- <div class="grid_12 omega recent_song">
						<div class="grid_2">
							<img src="<?php echo asset_url(); ?>images/cover5.jpg"/>
						</div>
						<div class="grid_7">
							<h3 class='subsection_title2'>This is the song name</h3>
							<div>by Name</div>
						</div>
						<div class="grid_3 omega">
							<div class='vote_wrapper'>
								<div class="vote_button_wrapper left">
									<a class="upvote_button transition300"><img src="<?php echo asset_url(); ?>images/up.png" /></a>
									<a class="downvote_button transition300"><img src="<?php echo asset_url(); ?>images/down.png" /></a>
								</div>
								<div class="vote_score vote_score_grey left">1231</div>
								
							</div>
						</div>
					</div>

					<div class="clearfix"></div>

					<div class="grid_12 omega recent_song">
						<div class="grid_2">
							<img src="<?php echo asset_url(); ?>images/cover4.jpg"/>
						</div>
						<div class="grid_7">
							<h3 class='subsection_title2'>This is the song name</h3>
							<div>by Name</div>
						</div>
						<div class="grid_3 omega">
							<div class='vote_wrapper'>
								<div class="vote_button_wrapper left">
									<a class="upvote_button transition300"><img src="<?php echo asset_url(); ?>images/up.png" /></a>
									<a class="downvote_button transition300"><img src="<?php echo asset_url(); ?>images/down.png" /></a>
								</div>
								<div class="vote_score vote_score_grey left">1231</div>
								
							</div>
						</div>
					</div>

					<div class="clearfix"></div>

					<div class="grid_12 omega recent_song">
						<div class="grid_2">
							<img src="<?php echo asset_url(); ?>images/cover3.jpg"/>
						</div>
						<div class="grid_7">
							<h3 class='subsection_title2'>This is the song name</h3>
							<div>by Name</div>
						</div>
						<div class="grid_3 omega">
							<div class='vote_wrapper'>
								<div class="vote_button_wrapper left">
									<a class="upvote_button transition300"><img src="<?php echo asset_url(); ?>images/up.png" /></a>
									<a class="downvote_button transition300"><img src="<?php echo asset_url(); ?>images/down.png" /></a>
								</div>
								<div class="vote_score vote_score_grey left">1231</div>
								
							</div>
						</div>
					</div>
					-->

					<div class="grid_12 omega">No activities....yet</div>
					<div class="clearfix"></div>
					
				</div>
			</div>

			<div class="clearfix"></div>


		</div> <!-- end .profile_main -->

		<div class="grid_4_fifth omega profile_main profile_followers hidden" >

			<div class='grid_12 omega content_box'>
				<div class='container'>
					<div class="grid_12 omega section_title">Followers</div>
					<?php if ($followers):?>
						<!-- show the list of followers -->
						<?php foreach ($followers as $key => $follower) :?>
						<div class="grid_12 omega followers">
							<div class="grid_2">
								<a rel="external", data-ajax="false" href="<?php echo base_url();?>user/profile/<?php echo $follower['follower']['user_name'];?>">
									<img class="corner100" src="<?php echo asset_url(); ?>profile_pics/<?php echo $follower['follower']['pic'];?>"/>
								</a>
							</div>
							<div class="grid_7">
								<h3 class='subsection_title2 follow_name'>
									<a class='reg_link' rel="external", data-ajax="false" href="<?php echo base_url();?>user/profile/<?php echo $follower['follower']['user_name'];?>">
										<?php echo $follower['follower']['user_name'];?>
									</a>
								</h3>
							</div>

							<!-- If user is logged in, show whether or not the user follows these followers in the button, else just show dummy follow button -->
							<?php if ($this->session->userdata('user_id') != ""):?>

								<!-- Only show the follow button if follow is not the logged in user -->
								<?php if($this->session->userdata('user_id') != $follower['follower']['id']) :?>

									<!-- Reflect whether or not the logged in user follows the follower in the button -->
									<?php if ($follower['follower']['follow_status']):?>
										<div class="grid_3 omega follow_buttons">
											<a class="button unfollow_button transition300 right" name="<?php echo base_url();?>user/unfollow/<?php echo $follower['follower']['id'];?>">Following</a>
											<a class="button button_blue follow_button transition300 right hidden" name="<?php echo base_url();?>user/follow/<?php echo $follower['follower']['id'];?>">Follow</a>
										</div>
									<?php else:?>
										<div class="grid_3 omega follow_buttons">
											<a class="button unfollow_button transition300 right hidden" name="<?php echo base_url();?>user/unfollow/<?php echo $follower['follower']['id'];?>">Following</a>
											<a class="button button_blue follow_button transition300 right" name="<?php echo base_url();?>user/follow/<?php echo $follower['follower']['id'];?>">Follow</a>
										</div>

									<?php endif;?>

								<?php endif;?>

							<!-- show dummy follow button that asks the user to login -->
							<?php else:?>
								<div class="grid_3 omega follow_buttons">
									<a class="button button_blue follow_button_disabled transition300 right md-trigger" data-modal="modal-sign-in3">Follow</a>
								</div>
							<?php endif;?>

							
						</div>
						<div class="clearfix"></div>
						<?php endforeach;?>
					<?endif;?>

					
				</div>
			</div>

			<div class="clearfix"></div>


		</div> <!-- end .profile_main -->

		<div class="grid_4_fifth omega profile_main profile_Following hidden" >

			<div class='grid_12 omega content_box'>
				<div class='container'>
					<div class="grid_12 omega section_title">Following</div>
					
					<?php if ($followings):?>
						<!-- show the list of followings -->
						<?php foreach ($followings as $key => $following) :?>
						<div class="grid_12 omega followings">
							<div class="grid_2">
								<a rel="external", data-ajax="false" href="<?php echo base_url();?>user/profile/<?php echo $following['following']['user_name'];?>">
									<img class="corner100" src="<?php echo asset_url(); ?>profile_pics/<?php echo $following['following']['pic'];?>"/>
								</a>
							</div>
							<div class="grid_7">
								<h3 class='subsection_title2 follow_name'>
									<a class='reg_link' rel="external", data-ajax="false" href="<?php echo base_url();?>user/profile/<?php echo $following['following']['user_name'];?>">
										<?php echo $following['following']['user_name'];?>
									</a>
								</h3>
							</div>

							<!-- If user is logged in, show whether or not the user follows these followings in the button, else just show dummy follow button -->
							<?php if ($this->session->userdata('user_id') != ""):?>

								<!-- Only show the follow button if the follower is not the logged-in user -->
								<?php if($this->session->userdata('user_id') != $following['following']['id']) :?>

									<!-- Reflect whether or not the logged in user follows the following in the button -->
									<?php if ($following['following']['follow_status']):?>
										<div class="grid_3 omega follow_buttons">
											<a class="button unfollow_button transition300 right" name="<?php echo base_url();?>user/unfollow/<?php echo $following['following']['id'];?>">Following</a>
											<a class="button button_blue follow_button transition300 right hidden" name="<?php echo base_url();?>user/follow/<?php echo $following['following']['id'];?>">Follow</a>
										</div>
									<?php else:?>
										<div class="grid_3 omega follow_buttons">
											<a class="button unfollow_button transition300 right hidden" name="<?php echo base_url();?>user/unfollow/<?php echo $following['following']['id'];?>">Following</a>
											<a class="button button_blue follow_button transition300 right" name="<?php echo base_url();?>user/follow/<?php echo $following['following']['id'];?>">Follow</a>
										</div>

									<?php endif;?>

								<?php endif;?>

							<!-- show dummy follow button that asks the user to login -->
							<?php else:?>
								<div class="grid_3 omega follow_buttons">
									<a class="button button_blue follow_button_disabled transition300 right md-trigger" data-modal="modal-sign-in3">Follow</a>
								</div>
							<?php endif;?>

							
						</div>
						<div class="clearfix"></div>
						<?php endforeach;?>
					<?endif;?>

				</div>
			</div>

			<div class="clearfix"></div>


		</div> <!-- end .profile_main -->

	</div>
</div>

<div class="clearfix"></div>