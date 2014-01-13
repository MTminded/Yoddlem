<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $page_title;?></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="<?php echo asset_url(); ?>css/normalize.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo asset_url(); ?>css/grid.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo asset_url(); ?>css/style.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo asset_url(); ?>css/modal.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo asset_url(); ?>css/flashblock.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo asset_url(); ?>css/360player.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo asset_url(); ?>css/360player-visualization.css" />
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo asset_url(); ?>css/ladda.min.css" /> -->
</head>
<body>
	<!--[if lt IE 7]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
	<div id='header'>
		<div class='nav container'>
			
			<a href='<?php echo base_url(); ?>' class='logo left' rel="external", data-ajax="false"><img src="<?php echo asset_url(); ?>images/yoddlem_logo.png" alt='Yoddlem'/></a>
			<!-- <a class='nav_link left hide_smallest' href="#">Browse</a> -->
			<a class='nav_link left hide_smallest' href="<?php echo base_url(); ?>songs/add" rel="external", data-ajax="false">Upload a Song</a>
			<!-- <a class='nav_link left hide_smallest' href="#">About Us</a> -->
			
			<a class='nav_link right last hide_smallest' href="<?php echo base_url(); ?>user/logout" rel="external", data-ajax="false">Sign Out</a>
			<a class='nav_link right hide_smallest' href="<?php echo base_url(); ?>user/profile/<?php echo $this->session->userdata('user_name'); ?>" rel="external", data-ajax="false"><?php echo $this->session->userdata('user_name'); ?></a>
			<a class='nav_link mobile_menu'><img class="mobile_button" src="<?php echo asset_url(); ?>images/menu.png" /></a>
		</div>
	</div> <!-- end #header -->

	<div id="mobile_nav">
		
		<!-- <a class='mobile_link transition300' href="#">Browse</a> -->
		<a class='mobile_link transition300' href="<?php echo base_url(); ?>songs/add">Upload a song</a>
		<a class='mobile_link transition300' href="#">About Us</a>
		<a class='mobile_link transition300' href="<?php echo base_url(); ?>user/profile/<?php echo $this->session->userdata('user_name'); ?>"><?php echo $this->session->userdata('user_name'); ?></a>
		<a class='mobile_link transition300 last' href="<?php echo base_url(); ?>user/logout">Sign Out</a>
		
	</div>
	<div id="mobile_nav_overlay"></div>

	<div class="md-modal md-effect-1" id="modal-sign-in">
		<div class="md-content">
			<h3>Sign In</h3>
			<div>
				<form action="<?php echo base_url(); ?>user/login" method="post" accept-charset="utf-8" id="signin_form" data-ajax="false" class="ui-hide-label">
					<div class='grid_6'>
						<div class='input_label modal_label white'>Email</div>
						<input class="input_normal" type="text" name="email" value="" />
					</div>

					<div class='grid_6 omega'>
						<div class='input_label modal_label white'>Password</div>
						<input class="input_normal" type="password" name="pass" value="" />
					</div>
					<div class="clearfix"></div>
					
					<div class='grid_12 omega block'>
						<button type="submit" class="button button_modal md-close transition300 block" data-role="none">Sign In</button>
						<p class="align_middle light modal_subtext">Not a member?&nbsp; <a class='modal_link md-trigger' data-modal="modal-sign-up" >Sign Up</a></p> 
						
					</div>
					<div class="clearfix_small"></div>
		 		</form>
			</div>
		</div>
	</div>

	<div class="md-modal md-effect-1" id="modal-sign-up">
		<div class="md-content">
			<h3>Sign Up</h3>
			<div>
				
				<div class='grid_12 omega'>
					<div class='input_label modal_label white'>Email</div>
					<input class="input_normal" name="last_name" value="" />
				</div>
				

				<div class='grid_6'>
					<div class='input_label modal_label white'>Password</div>
					<input class="input_normal" name="fist_name" value="" />
				</div>

				<div class='grid_6 omega'>
					<div class='input_label modal_label white'>Confirm Password</div>
					<input class="input_normal" name="last_name" value="" />
				</div>
				<div class="clearfix"></div>
				<div class="clearfix"></div>
				
				<div class='grid_12 omega block'>
					<a class="button button_modal transition300 md-close block">Sign Up</a>
					<p class="align_middle light modal_subtext">Yep, it's that easy.</p> 

				</div>
				<div class="clearfix_small"></div>
				
			</div>
		</div>
	</div>