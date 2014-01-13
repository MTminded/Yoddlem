<div id="hero_song">
	<div class='container'>

		<div class="grid_6 main_song">
			<img class='left' src="<?php echo asset_url(); ?>covers/<?php echo $cover_art;?>"/>
			<div id="sm2-visualization" class="sm2-inline-list song_player">		
				<div class="ui360 ui360-vis">
					<a href="<?php echo asset_url(); ?>_mp3/<?php echo $file_path; ?>" class="exclude button-exclude inline-exclude" style="position:absolute;color:#ffffff"></a>
				</div>
			</div>
		</div> <!-- end .main_song -->

		<div class="grid_6 omega">
			<h1 class="song_title"><?php echo $title;?></h1>

			<h2 class="artist_name">
				<a rel="external" data-ajax="false" class="reg_link" href="<?php echo base_url();?>/user/profile/<?php echo $user_name;?>">
					<?php echo $user_name;?>
				</a>
			</h2>
			<div class='vote_wrapper'>
				<div class="vote_button_wrapper left">
					<a class="upvote_button transition300 <?php if ($previousVote == 2) echo "upvoted";?>" id="upvote_button" name="<?php echo base_url()?>songs/upvote/<?php echo $song_id;?>" rel="external", data-ajax="false"><img src="<?php echo asset_url(); ?>images/up.png" /></a>
					<a class="downvote_button transition300 <?php if ($previousVote == 1) echo "downvoted";?>" id="downvote_button" name="<?php echo base_url()?>songs/downvote/<?php echo $song_id;?>" rel="external", data-ajax="false"><img src="<?php echo asset_url(); ?>images/down.png" /></a>
				</div>
				<div class="vote_score left"><?php echo $upvotes - $downvotes ; ?></div>
				
			</div>
			<div class="clearfix"></div>
			<h3 class="song_description"><?php echo $description;?></h3>

			<div class="clearfix"></div>
			<?php if($this->session->userdata('user_id')== $user_id) :?>
				<a rel="external", data-ajax="false" href="<?php echo base_url();?>songs/edit/<?php echo $song_id;?>" class="button button_grey block left edit_song">Edit song</a>
			<?php endif;?>
			
		</div>

	</div> <!-- end .container -->
</div> <!-- end #hero_song -->

<div class="content container">
	<div class="comment_section grid_8">
		<h2>Join the conversation</h2>
		<div id="disqus_thread"></div>
	    <script type="text/javascript">
	        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
	        var disqus_shortname = 'theyoddlem'; // required: replace example with your forum shortname

	        /* * * DON'T EDIT BELOW THIS LINE * * */
	        (function() {
	            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
	            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
	            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
	        })();
	    </script>
	    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">&nbsp;</a></noscript>
	    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
	</div>
	
	<div class="side_section grid_4 omega">
		
		<h2>More by <?php echo $user_name;?></h2>

		<?php foreach ($otherSongs as $otherSong):?>
			<div class="featured_list grid_12 delta">
				<a href="<?php echo base_url();?>songs/play/<?php echo $otherSong['id'];?>">
					<img src="<?php echo asset_url(); ?>covers/<?php echo $otherSong['cover_art'];?>" class="delta" />
				</a>
				<div class="cover_title">
					<a href="<?php echo base_url();?>songs/play/<?php echo $otherSong['id'];?>">
						<?php echo $otherSong['title'];?>
					</a>
				</div>
				<div class="cover_artist"><?php echo $otherSong['upvotes'] - $otherSong['downvotes'];?> points</div>
			</div>
		<?php endforeach;?>

		
		<div class="clearfix"></div>
		<h2>Featured</h2>
		<div class="featured_list grid_12 delta">
			<img src="<?php echo asset_url(); ?>images/cover1.jpg" class="delta" />
			<div class="cover_title">This is the song title</div>
			<div class="cover_artist">First Last Name</div>
		</div>

		<div class="featured_list grid_12 delta">
			<img src="<?php echo asset_url(); ?>images/cover2.jpg" class="delta" />
			<div class="cover_title">This is the song title</div>
			<div class="cover_artist">First Last Name</div>
		</div>
		<div class="featured_list grid_12 delta">
			<img src="<?php echo asset_url(); ?>images/cover6.jpg" class="delta" />
			<div class="cover_title">This is the song title</div>
			<div class="cover_artist">First Last Name</div>
		</div>
	</div>

</div>

<div class="clearfix"></div>
<div class="clearfix"></div>
<div class="clearfix"></div>
<div class="clearfix"></div>