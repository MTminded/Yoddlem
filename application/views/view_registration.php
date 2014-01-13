<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<?php $page_title="Yoddlem";?>
	
</head>
<body>
	
	

	<div id="content">
		<div class="signup_wrap">
		<div class="signin_form">
		 <?php echo form_open("user/login"); ?>
		  <label for="email">Email:</label>
		  <input type="text" id="email" name="email" value="" />
		  <label for="password">Password:</label>
		  <input type="password" id="pass" name="pass" value="" />
		  <input type="submit" class="" value="Sign in" />
		 <?php echo form_close(); ?>
		</div><!--<div class="signin_form">-->
		</div><!--<div class="signup_wrap">-->
		<div class="reg_form">
		<div class="form_title">Sign Up</div>
		<div class="form_sub_title">It's free and anyone can join</div>
		 <?php echo validation_errors('<p class="error">'); ?>
		 <?php echo form_open("user/registration"); ?>
		  <p>
		  <label for="user_name">User Name:</label>
		  <input type="text" id="user_name" name="username" value="<?php echo set_value('user_name'); ?>" />
		  </p>
		 
		  <p>
		  <label for="password">Password:</label>
		  <input type="password" id="password" name="password" value="<?php echo set_value('password'); ?>" />
		  </p>
		  <p>
		  <label for="con_password">Confirm Password:</label>
		  <input type="password" id="con_password" name="confirm_password" value="<?php echo set_value('con_password'); ?>" />
		  </p>
		  <p>
		  <input type="submit" class="greenButton" value="Submit" />
		  </p>
		 <?php echo form_close(); ?>
		</div><!--<div class="reg_form">-->
	</div><!--<div id="content">-->

    

</body>
</html>