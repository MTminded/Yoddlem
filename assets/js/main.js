jQuery(function() {

	//Mobile Navigation controls
	function dismissNav(event){
		$( "#mobile_nav" ).animate({
		    left: "-70%",
		  }, 300, "swing");
		$("#mobile_nav_overlay").fadeOut();
	}

	function showNav(event){
		event.stopPropagation();
		event.preventDefault();
		$("#mobile_nav_overlay").fadeIn();
		$( "#mobile_nav" ).animate({
			left: "0",
		}, 300, "swing");
	}

	//Hero section effect in the Home page
	$('.overlay').fadeOut(2000);
	$( "body" ).bind( "tap click", dismissNav );
	$( ".mobile_menu" ).bind( "tap click", showNav );
	$( "#mobile_nav" ).bind( "tap click", function() {
	  event.stopPropagation();
	  event.preventDefault();
	});

	//Show the right section based on the item selected on the menu on the left
	$( ".profile_menu_item" ).click(function(e) {
	 
		//reflect which button was clicked
		$(".profile_menu_item").removeClass('selected');
		$(this).addClass('selected');
	  
		$(".profile_main").hide();
	  	$(".profile_main").eq($(".profile_menu_item").index(this)).fadeIn();	

	});

	//One the follow button is clicked, hide it and show the unfollow button. Vice versa
	$( ".follow_button" ).click(function(e) {

		var reference = $(this);

		$.ajax({
		  url: $(this).attr( "name" ),
		  cache: false
		})
		  .done(function(html) {
		    	reference.closest('.follow_buttons').find('.unfollow_button').show();
				reference.hide();
		  });
	});

	$( ".unfollow_button" ).click(function(e) {

		var reference = $(this);
		
		$.ajax({
		  url: $(this).attr( "name" ),
		  cache: false
		})
		  .done(function(html) {
		    	reference.closest('.follow_buttons').find('.follow_button').show();
				reference.hide();
		  });

	});

	//Change the text for the unfollow button
	$( ".unfollow_button" ).hover(
	  function() {
	    $(this).html('&nbsp;Unfollow&nbsp;');
	  }, function() {
	    $(this).html('Following');
	  }
	);

	// Upvote
	$('#upvote_button').click(function() {
		
		$.ajax({
		  url: $(this).attr( "name" ),
		  cache: false
		})
		  .done(function(html) {
		    if(html == 1){
		    	//reflect the upvote by changing the button color and adding 1 to the vote score
		    	$('#upvote_button').addClass('upvoted');
		    	$('.vote_score').html(parseInt($('.vote_score').html()) + 1);
		    }
		    else if(html == 0){
		    	//reflect canceling the vote by changing the button color and subtracting 1 from the vote score
		    	$('#upvote_button').removeClass('upvoted');
		    	$('.vote_score').html(parseInt($('.vote_score').html()) - 1);
		    }else if(html == 2){
		    	//reflect changing the vote from down to up and adding 2 to the vote score
		    	$('#upvote_button').addClass('upvoted');
		    	$('#downvote_button').removeClass('downvoted');
		    	$('.vote_score').html(parseInt($('.vote_score').html()) + 2);
		    }
		  });
	});

	// Downvote
	$('#downvote_button').click(function() {
		
		$.ajax({
		  url: $(this).attr( "name" ),
		  cache: false
		})
		  .done(function(html) {
		  	if(html == 1){
		    	//reflect the downvote by changing the button color and subtracting 1 from the vote score
		    	$('#downvote_button').addClass('downvoted');
		    	$('.vote_score').html(parseInt($('.vote_score').html()) - 1);
		    }
		    else if(html == 0){
		    	//reflect canceling the vote by changing the button color and adding 1 to the vote score
		    	$('#downvote_button').removeClass('downvoted');
		    	$('.vote_score').html(parseInt($('.vote_score').html()) + 1);
		    }else if(html == 2){
		    	//reflect changing the vote from up to down and subtracting 2 from the vote score
		    	$('#downvote_button').addClass('downvoted');
		    	$('#upvote_button').removeClass('upvoted');
		    	$('.vote_score').html(parseInt($('.vote_score').html()) - 2);
		    }
		  });
	});


	//when clicking on upload cover art
	$('#upload_cover_art').bind('click', function () {
		$('#cover_art_input').click();
		return false;
	});

	//when clicking on upload song
	$('#upload_song_button').bind('click', function () {
		$('#song_file_input').click();
		return false;
	});

	//when clicking on upload cover art
	$('#upload_profile_picture').bind('click', function () {
		$('#profile_picture_input').click();
		return false;
	});

	//when clicking on upload cover art
	$('#upload_profile_banner').bind('click', function () {
		$('#profile_banner_input').click();
		return false;
	});

	
	//upload profile pic

	var formdata = false;

	if (window.FormData) {
  		formdata = new FormData();
  		$("#btn").hide();
	}
	
 	$('#profile_picture_input').change(function(){
 		
 		var img, reader, file;
	
		file = this.files[0];
		if ( window.FileReader ) {
			reader = new FileReader();
			reader.onloadend = function (e) { };
			reader.readAsDataURL(file);
		}
		if (formdata) {
			formdata.append("pic[]", file);
		}	
		if (formdata) {

			$("#upload_profile_picture").html("Uploading...");
			$.ajax({
				url: base_url + "user/upload_pic",
				type: "POST",
				data: formdata,
				processData: false,
				contentType: false,
				success: function (res) {
					$('input:hidden[name="profile_picture"]').val(res);
					$(".profile_pic_preview").attr("src", asset_url + "profile_pics/" + res).fadeIn();
					$("#upload_profile_picture").html("Change Cover Art");
					
				}
			});
			
		}
	});

	//upload profile banner

	var formdata = false;

	if (window.FormData) {
  		formdata = new FormData();
  		$("#btn").hide();
	}
	
 	$('#profile_banner_input').change(function(){
 		
 		var img, reader, file;
	
		file = this.files[0];
		if ( window.FileReader ) {
			reader = new FileReader();
			reader.onloadend = function (e) { };
			reader.readAsDataURL(file);
		}
		if (formdata) {
			formdata.append("banner[]", file);
		}	
		if (formdata) {

			$("#upload_profile_banner").html("Uploading...");
			$.ajax({
				url: base_url + "user/upload_banner",
				type: "POST",
				data: formdata,
				processData: false,
				contentType: false,
				success: function (res) {
					$('input:hidden[name="profile_banner"]').val(res);
					$(".profile_banner_preview").attr("src", asset_url + "profile_banners/" + res).fadeIn();
					$("#upload_profile_banner").html("Change Cover Art");
					
				}
			});
			
		}
	});
	

	//upload cover art

	var input = document.getElementById("cover_art_input"), 
		formdata = false,
		_progress = document.getElementById('progress_cover');

	if (window.FormData) {
  		formdata = new FormData();
  		document.getElementById("btn").style.display = "none";
	}
	
 	input.addEventListener("change", function (evt) {
 		
 		var i = 0, len = this.files.length, img, reader, file;
	
		for ( ; i < len; i++ ) {
			file = this.files[i];
			if ( window.FileReader ) {
				reader = new FileReader();
				reader.onloadend = function (e) { 
				};
				reader.readAsDataURL(file);
			}
			if (formdata) {
				formdata.append("covers[]", file);
			}	
		}
	
		if (formdata) {
			// $(".progress_outer1").fadeIn();
			$(".cover_art_spinner").fadeIn();
			$("#upload_cover_art").html("Uploading...");
			$.ajax({
			
				url: base_url + "songs/upload_cover",
				type: "POST",
				data: formdata,
				processData: false,
				contentType: false,
				success: function (res) {
					$('input:hidden[name="cover_art"]').val(res);
					$(".cover_preview_pic").attr("src", asset_url + "covers/" + res).fadeIn();
					$("#upload_cover_art").html("Change Cover Art");
					// $(".progress_outer").fadeOut();
					$(".cover_art_spinner").fadeOut();
					
				}
			});
			
		}
	}, false);

	//upload song
	var input_song = document.getElementById("song_file_input"), 
		formdata = false,
		progress_song = document.getElementById('progress_song');  

	if (window.FormData) {
  		formdata = new FormData();
  		document.getElementById("btn").style.display = "none";
	}
	
 	input_song.addEventListener("change", function (evt) {
 		
 		var i = 0, len = this.files.length, img, reader, file;
	
		
		file = this.files[i];
		if ( window.FileReader ) {
			reader = new FileReader();
			reader.onloadend = function (e) { 
			};
			reader.readAsDataURL(file);
		}
		if (formdata) {
			formdata.append("songs[]", file);
		}	
		
	
		if (formdata) {
			// $(".progress_outer2").fadeIn();
			$(".song_spinner").fadeIn();
			$("#upload_song_button").html("Uploading...");
			$.ajax({
	
				url: base_url + "songs/upload_song_file",
				type: "POST",
				data: formdata,
				processData: false,
				contentType: false,
				success: function (res) {
					$('input:hidden[name="file_path"]').val(res);
					// $(".progress_outer").fadeOut();
					$(".song_spinner").hide();
					$("#upload_song_button").html("Change song");
					$(".song_name").html(res).fadeIn();

				}
			});
			
		}
	}, false);

	

});

$( ".single_button" ).click(function(e) {
	$('input:radio[value="1"]').attr('checked', 'checked');
	$('input:radio[value="2"]').removeAttr('checked');
	$(".single_button").addClass("button_blue");
	$(".album_button").removeClass("button_blue");
	$(".album_name_input").slideUp();
});
$( ".album_button" ).click(function(e) {
	$('input:radio[value="2"]').attr('checked', 'checked');
	$('input:radio[value="1"]').removeAttr('checked');
	$(".album_button").addClass("button_blue");
	$(".single_button").removeClass("button_blue");
	$(".album_name_input").slideDown();
});

