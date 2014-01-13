<div id="hero">
	<div class='overlay'></div>
	<div class='container hero_content'>
		<div class="grid_6 main_title alpha">
			<?php if ($this->session->userdata('welcome_message')):?>
				<h1 class='main_tagline light'><?php echo $this->session->userdata('welcome_message');?></h1>
			<?php else :?>
				<h1 class='main_tagline light'>Hear it first.</h1>
			<?php endif; ?>
			<h2 class='small_tagline'>Discover the music stars of tomorrow.</h2>
		</div>
		<div class="grid_6 main_cover right omega box">
			<img class='cover left' src="<?php echo asset_url(); ?>php/resizer.php?src=<?php echo asset_url(); ?>covers/<?php echo $hero[0]['song']['cover_art'];?>&amp;w=520&amp;h=520&amp;zc=1"/>
			<div id="sm2-visualization" class="sm2-inline-list main_cover_player">		
				<div class="ui360 ui360-vis">
					<a href="<?php echo asset_url(); ?>_mp3/<?php echo $hero[0]['song']['file_path'];?>" class="exclude button-exclude inline-exclude" style="position:absolute;color:#ffffff"></a>
				</div>
				
			</div>
			<div class='image_caption'>
				<a class="cover_title" rel="external" data-ajax="false" class="reg_link" href="<?php echo base_url();?>songs/play/<?php echo $hero[0]['song_id'];?>"><?php echo $hero[0]['song']['title'];?></a>
				<a class="cover_artist" rel="external" data-ajax="false" class="reg_link" href="<?php echo base_url();?>user/profile/<?php echo $hero[0]['song']['user']['user_name'];?>"><?php echo $hero[0]['song']['user']['user_name'];?></a>
			</div>
			<h2><a rel="external" data-ajax="false" class="reg_link" href="<?php echo base_url();?>songs/play/<?php echo $hero[0]['song_id'];?>"><?php echo $hero[0]['song']['title'];?></a></h2>
			<h3><a rel="external" data-ajax="false" class="reg_link" href="<?php echo base_url();?>user/profile/<?php echo $hero[0]['song']['user']['user_name'];?>"><?php echo $hero[0]['song']['user']['user_name'];?></a></h3>
			<p><?php echo $hero[0]['song']['description'];?></p>
			
		</div> <!-- end .main_cover -->
	</div> <!-- end .hero_content -->
</div> <!-- end #hero -->

<div class="content container">
	<h2 class="grid_12">Trending Now</h2>
	<div class="featured_big grid_4">
			<a href="<?php echo base_url();?>songs/play/<?php echo $trending[0]['id'];?>">
				<img src="<?php echo asset_url(); ?>php/resizer.php?src=<?php echo asset_url(); ?>covers/<?php echo $trending[0]['cover_art'];?>&amp;w=520&amp;h=520&amp;zc=1"/>
			</a>
			<div class='image_caption'>
				<a class="cover_title reg_link" href="<?php echo base_url();?>songs/play/<?php echo $trending[0]['id'];?>"><?php echo $trending[0]['title'];?></a>
				<a class="cover_artist reg_link" href="<?php echo base_url();?>user/profile/<?php echo $trending[0]['user']['user_name'];?>"><?php echo $trending[0]['user']['user_name'];?></a>
			</div>
	</div>
	<div class="featured_small grid_2">
		<?php foreach ($trending as $key => $trendingSong):?>
			<?php if ($key == 1 || $key == 2):?>
				<div class="wrapper">
					<a href="<?php echo base_url();?>songs/play/<?php echo $trending[$key]['id'];?>">
						<img src="<?php echo asset_url(); ?>php/resizer.php?src=<?php echo asset_url(); ?>covers/<?php echo $trending[$key]['cover_art'];?>&amp;w=520&amp;h=520&amp;zc=1"/>
					</a>
					<div class='image_caption'>
						<a class="cover_title reg_link" href="<?php echo base_url();?>songs/play/<?php echo $trending[$key]['id'];?>"><?php echo $trending[$key]['title'];?></a>
						<a class="cover_artist reg_link" href="<?php echo base_url();?>user/profile/<?php echo $trending[$key]['user']['user_name'];?>"><?php echo $trending[$key]['user']['user_name'];?></a>
					</div>
				</div>
			<?php endif;?>
		<?php endforeach;?>
	</div>

	<div class="featured_small grid_2 omega_smaller">
		<?php foreach ($trending as $key => $trendingSong):?>
			<?php if ($key == 3 || $key == 4):?>
				<div class="wrapper">
					<a href="<?php echo base_url();?>songs/play/<?php echo $trending[$key]['id'];?>">
						<img src="<?php echo asset_url(); ?>php/resizer.php?src=<?php echo asset_url(); ?>covers/<?php echo $trending[$key]['cover_art'];?>&amp;w=520&amp;h=520&amp;zc=1"/>
					</a>
					<div class='image_caption'>
						<a class="cover_title reg_link" href="<?php echo base_url();?>songs/play/<?php echo $trending[$key]['id'];?>"><?php echo $trending[$key]['title'];?></a>
						<a class="cover_artist reg_link" href="<?php echo base_url();?>user/profile/<?php echo $trending[$key]['user']['user_name'];?>"><?php echo $trending[$key]['user']['user_name'];?></a>
					</div>
				</div>
			<?php endif;?>
		<?php endforeach;?>
	</div>
	<div class="grid_4 omega">
		<?php foreach ($trending as $key => $trendingSong):?>
			<?php if ($key == 5 || $key == 6 || $key == 7):?>
				<div class="featured_list grid_12 delta">
					<a href="<?php echo base_url();?>songs/play/<?php echo $trending[$key]['id'];?>" class="delta">
						<img src="<?php echo asset_url(); ?>php/resizer.php?src=<?php echo asset_url(); ?>covers/<?php echo $trending[$key]['cover_art'];?>&amp;w=520&amp;h=520&amp;zc=1"/>
					</a>
					<a class="cover_title block reg_link" href="<?php echo base_url();?>songs/play/<?php echo $trending[$key]['id'];?>"><?php echo $trending[$key]['title'];?></a>
					<a class="cover_artist block reg_link" href="<?php echo base_url();?>user/profile/<?php echo $trending[$key]['user']['user_name'];?>"><?php echo $trending[$key]['user']['user_name'];?></a>
					
				</div>
				
			<?php endif;?>
		<?php endforeach;?>		
	</div>
	

</div>

<div class="content container">
	<h2 class="grid_12 margin_gap">Featured</h2>
	
	<?php foreach ($featured as $key => $featuredSong):?>
		<div class="featured_medium grid_3 <?php if($key == 1) echo 'omega_smaller';?><?php if($key == 3) echo 'omega';?>">
			<div class="wrapper">
				<a href="<?php echo base_url(); ?>songs/play/<?php echo $featuredSong['song_id'];?>">
					<img src="<?php echo asset_url(); ?>php/resizer.php?src=<?php echo asset_url(); ?>covers/<?php echo $featuredSong['song']['cover_art'];?>&amp;w=520&amp;h=520&amp;zc=1" alt="">
				</a>
				<div class='image_caption'>
					<a class="cover_title_small reg_link" href="<?php echo base_url(); ?>songs/play/<?php echo $featuredSong['song_id'];?>"><?php echo $featuredSong['song']['title'];?></a>
					<a class="cover_artist_small reg_link" href="<?php echo base_url(); ?>user/profile/<?php echo $featuredSong['song']['user']['user_name'];?>"><?php echo $featuredSong['song']['user']['user_name'];?></a>
				</div>
			</div>
		</div>
	<?php endforeach;?>

</div>

<div class="content container">
	<h2 class="grid_12 margin_gap">Staff Picks</h2>
	
	<div class="featured_big grid_4">
		<a href="#">
			<img src="<?php echo asset_url(); ?>images/cover4.jpg"/>
		</a>
		<div class='image_caption'>
			<a class="cover_title" href="#">Song title</a>
			<a class="cover_artist" href="#">First Last Name</a>
		</div>
	</div>
	<div class="featured_small grid_2">
		<div class="wrapper">
			<a href="#">
				<img src="<?php echo asset_url(); ?>images/cover2.jpg" alt="">
			</a>
			<div class='image_caption'>
				<a class="cover_title_small" href="#">Song title</a>
				<a class="cover_artist_small" href="#">First Last Name</a>
			</div>
		</div>
		<div class="wrapper">
			<a href="#">
				<img src="<?php echo asset_url(); ?>images/cover3.jpg" alt="">
			</a>
			<div class='image_caption'>
				<a class="cover_title_small" href="#">Somewhere only we know</a>
				<a class="cover_artist_small" href="#">First Last Name</a>
			</div>
		</div>
	</div>
	<div class="featured_small grid_2 omega_smaller">
		<div class="wrapper">
			<a href="#">
				<img src="<?php echo asset_url(); ?>images/cover1.jpg" alt="">
			</a>
			<div class='image_caption'>
				<a class="cover_title_small" href="#">Song title</a>
				<a class="cover_artist_small" href="#">First Last Name</a>
			</div>
		</div>
		<div class="wrapper">
			<a href="#">
				<img src="<?php echo asset_url(); ?>images/cover5.jpg" alt="">
			</a>
			<div class='image_caption'>
				<a class="cover_title_small" href="#">Somewhere only we know</a>
				<a class="cover_artist_small" href="#">First Last Name</a>
			</div>
		</div>
	</div>
	<div class="featured_small grid_2 hide_smaller">
		<div class="wrapper">
			<a href="#">
				<img src="<?php echo asset_url(); ?>images/cover3.jpg" alt="">
			</a>
			<div class='image_caption'>
				<a class="cover_title_small" href="#">Song title</a>
				<a class="cover_artist_small" href="#">First Last Name</a>
			</div>
		</div>
		<div class="wrapper">
			<a href="#">
				<img src="<?php echo asset_url(); ?>images/cover4.jpg" alt="">
			</a>
			<div class='image_caption'>
				<a class="cover_title_small" href="#">Somewhere only we know</a>
				<a class="cover_artist_small" href="#">First Last Name</a>
			</div>
		</div>
	</div>
	<div class="featured_small grid_2 omega hide_smaller">
		<div class="wrapper">
			<a href="#">
				<img src="<?php echo asset_url(); ?>images/cover2.jpg" alt="">
			</a>
			<div class='image_caption'>
				<a class="cover_title_small" href="#">Song title</a>
				<a class="cover_artist_small" href="#">First Last Name</a>
			</div>
		</div>
		<div class="wrapper">
			<a href="#">
				<img src="<?php echo asset_url(); ?>images/cover3.jpg" alt="">
			</a>
			<div class='image_caption'>
				<a class="cover_title_small" href="#">Somewhere only we know</a>
				<a class="cover_artist_small" href="#">First Last Name</a>
			</div>
		</div>
	</div>
	
	
</div>

<div class="clearfix"></div>
<div class="clearfix"></div>
<div class="clearfix"></div>
<div class="clearfix"></div>