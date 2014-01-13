<div id="upload_song">
	<div class='container'>

		<div class="grid_12">
			<h1 class="page_title">Edit Song</h1>
		</div> 

		<div class="clearfix"></div>

		<div class="grid_8 form_section">

			<form action="<?php echo base_url();?>songs/update/<?php echo $id;?>" method="post" accept-charset="utf-8" data-ajax="false" class="ui-hide-label">

				<div class='input_label'>Song Title</div>
				<input class="input_normal" name="title" placeholder="Enter song title" value="<?php echo $title;?>"/>

				<div class="clearfix"></div>

				<div class='input_label'>Description</div>
				<input class="input_normal" name="description" placeholder="e.g. Composed by..." value="<?php echo $description;?>"/>

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
				<a class='grid_6 button' id="upload_cover_art">Upload New Cover Art</a>
				<input type='file' id='cover_art_input' name="cover_art_file" class="hidden" value=""/>
				<button type="submit" id="btn" class='hidden'>Upload Files!</button>
				<input type="hidden" name="cover_art" value="<?php echo $cover_art;?>" />
				
				<div class='progress_outer progress_outer1 grid_6 omega hidden'>
		            <div class='progress' id="progress_cover">1%</div>
		        </div>

		        <div class="clearfix"></div>

		        <img class='cover_preview_pic grid_6' src="<?php echo asset_url();?>covers/<?php echo $cover_art;?>" />		       
				<div class="clearfix"></div>

				<div class='input_label'>Genre</div>

				<select class='grid_6' data-role="none" name="genre" >
					 <option value="1" <?php if($genre == 1) echo "selected";?>>Rock</option>
					 <option value="2" <?php if($genre == 2) echo "selected";?>>Pop</option>
					 <option value="3" <?php if($genre == 3) echo "selected";?>>Hip Hop</option>
					 <option value="4" <?php if($genre == 4) echo "selected";?>>R&amp;B</option>
					 <option value="5" <?php if($genre == 5) echo "selected";?>>Blues</option>
					 <option value="6" <?php if($genre == 6) echo "selected";?>>Techno</option>
					 <option value="7" <?php if($genre == 7) echo "selected";?>>Reggaeton</option>
					 <option value="8" <?php if($genre == 8) echo "selected";?>>Reggae</option>
					 <option value="9" <?php if($genre == 9) echo "selected";?>>Country</option>
					 <option value="10" <?php if($genre == 10) echo "selected";?>>Neo Soul</option>

				</select>

				<input type="hidden" name="file_path" value="<?php echo $file_path;?>" />

				<div class="clearfix"></div>
				<div class="clearfix"></div>
				<div class="clearfix"></div>

				<button type="submit" class='grid_6 button button_blue block' data-role="none">Save</button>
				<a class='grid_6 omega button button_red block' href="<?php echo base_url();?>songs/delete/<?php echo $id;?>" data-role="none">Delete Song</a>
				

			</form>

		</div>

	</div> <!-- end .container -->
</div> <!-- end #hero_song -->

