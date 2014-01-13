<div id="upload_song">
	<div class='container'>

		<?php if ($delete_message) :?>
		<div class="error"><?php echo $delete_message;?></div>
		<div class="clearfix"></div>
		<?php endif;?>

		<div class="grid_12">
			<h1 class="page_title">Upload your song</h1>
		</div> 

		<div class="clearfix"></div>

		<div class="grid_8 form_section">

			<form action="<?php echo base_url();?>songs/upload" method="post" accept-charset="utf-8" data-ajax="false" class="ui-hide-label">

				<div class='input_label'>Song Title</div>
				<input class="input_normal" name="title" placeholder="Enter song title"/>

				<div class="clearfix"></div>

				<div class='input_label'>Description</div>
				<input class="input_normal" name="description" placeholder="e.g. Composed by..."/>

				<!-- <div class="clearfix"></div>

				<div class='input_label'>Single or Part of an album?</div>
				<a class='grid_6 button single_button'>This is a single</a>
				<a class="grid_6 omega button album_button">Part of an album</a>
				<input type="radio" name="type" value="1" class="hidden">
				<input type="radio" name="type" value="2" class="hidden">
 -->
				<div class="clearfix"></div>
				<input class="input_normal hidden album_name_input" name="album_name" placeholder="Enter new album name"/>
				

				<div class="clearfix"></div>

				<div class='input_label'>Cover Art</div>
				<a class='grid_6 button' id="upload_cover_art">Upload Cover Art</a>
				<input type='file' id='cover_art_input' name="cover_art_file" class="hidden"/>
				<button type="submit" id="btn" class='hidden'>Upload Files!</button>
				<input type="hidden" name="cover_art" />
				
				<!-- <div class='progress_outer progress_outer1 grid_6 omega hidden'>
		            <div class='progress' id="progress_cover">1%</div>
		        </div> -->

		        <img class="spinner cover_art_spinner" src="<?php echo asset_url();?>images/ajax-loader.gif"/>

		        <div class="clearfix"></div>

		        <img class='cover_preview_pic grid_6 hidden' src="" />		       
				<div class="clearfix"></div>

				<div class='input_label'>Genre</div>

				<select class='grid_6' data-role="none" name="genre" >
					 <option value="1">Rock</option>
					 <option value="2">Pop</option>
					 <option value="3">Hip Hop</option>
					 <option value="4">R&amp;B</option>
					 <option value="5">Blues</option>
					 <option value="6">Techno</option>
					 <option value="7">Reggaeton</option>
					 <option value="8">Reggae</option>
					 <option value="9">Country</option>
					 <option value="10">Neo Soul</option>

				</select>

				<div class="clearfix"></div>

				<div class='input_label'>Upload Song</div>
				<a class='grid_6 button' id="upload_song_button">Upload Song File</a>

				<input type='file' id='song_file_input' name="song_file" class="hidden"/>
				<button type="submit" id="btn" class='hidden'>Upload Files!</button>
				<input type="hidden" name="file_path" />

				<!-- <div class='progress_outer progress_outer2 grid_6 omega hidden'>
		            <div class='progress' id="progress_song">1%</div>
		        </div> -->

		        <img class="spinner song_spinner" src="<?php echo asset_url();?>images/ajax-loader.gif"/>

		        <div class="left song_name">song name</div>

				<div class="clearfix"></div>
				<div class="clearfix"></div>
				<div class="clearfix"></div>

				
				<button type="submit" class='grid_12 omega button button_blue block' data-role="none">Save</button>

			</form>

		</div>

	</div> <!-- end .container -->
</div> <!-- end #hero_song -->

