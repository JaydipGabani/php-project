<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Login</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="<?php echo base_url();?>application/css/materialize.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>application/css/style.css">

	<script src="<?php echo base_url();?>application/js/jquery-3.1.1.min.js"></script>
	<script src="<?php echo base_url();?>application/js/main.js"></script>
	<script src="<?php echo base_url();?>application/js/materialize.min.js"></script>
</head>
<body style=" background: url(<?php echo base_url();?>application/css/AluminumBackground.jpg);background-size: cover;">

<?php
echo '<div class="row custom-container card">';
echo form_open('login/validate',array('class'=>'col s12 custom-inner-login'));
echo '<div class="row">
		<div class="input-field col s12">
			 <h3>Login:</h3>
		</div>
	 </div>';
echo '<div class="row">
	 		<div class="input-field col s12">';
				echo form_input(array('name'=>'uname','class'=>'validate','required'=>'required'));
				echo '<label for="email">User name</label>
	  		</div>
   	  </div>';
echo '<div class="row">
			<div class="input-field col s12">';
				echo form_password(array('name'=>'pass','class'=>'validate','required'=>'required','pattern'=>'.{6,10}'));
				echo ' <label for="password">Password</label>
			</div>
	  </div>';
echo '<div class="row center">';
	echo form_submit(array('name'=>'submit','value'=>'submit','class'=>'btn'));
echo '</div>';
echo form_close();
echo '</div>';
?>
</body>
</html>
