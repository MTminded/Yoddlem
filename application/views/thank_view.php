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
  <label for="pass">Password:</label>
  <input type="password" id="pass" name="pass" value="" />
  <input type="submit" class="" value="Sign in" />
 <?php echo form_close(); ?>
</div><!--<div class="signin_form">-->
</div><!--<div class="signup_wrap">-->
<h1>Thanks!</h1>
</div><!--<div id="content">-->

  

</body>
</html