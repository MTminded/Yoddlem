<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<?php $page_title="Yoddlem";?>
	
</head>
<body>
	
	

	<div class="content">
  <h2>Welcome Back, <?php echo $this->session->userdata('user_name'); ?>!</h2>
  <p>This section represents the area that only logged in members can access.</p>
  <h4><?php echo anchor('user/logout', 'Logout'); ?></h4>
</div><!--<div class="content">-->



</body>
</html>