<!DOCTYPE html>
<html>
<head>
<title><?php echo $header_data['title']; ?></title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo base_url();?>application/libraries/templates/css/reset.css" />
<link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo base_url();?>application/libraries/templates/css/main.css" />
<link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo base_url();?>application/libraries/templates/css/2col.css" title="2col" />
<link rel="alternate stylesheet" media="screen,projection" type="text/css" href="<?php echo base_url();?>application/libraries/templates/css/1col.css" title="1col" />
<!--[if lte IE 6]><link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo base_url();?>application/libraries/templates/css/main-ie6.css" /><![endif]-->
<link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo base_url();?>application/libraries/templates/css/style.css" />
<link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo base_url();?>application/libraries/templates/css/mystyle.css" />
<script type="text/javascript" src="<?php echo base_url();?>application/libraries/templates/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>application/libraries/templates/js/switcher.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>application/libraries/templates/js/toggle.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>application/libraries/templates/js/ui.core.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>application/libraries/templates/js/ui.tabs.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	$(".tabs > ul").tabs();
});
</script>

<style type="text/css">

.container
{
	margin			: auto;
	width			: 220px;
	padding			: 50px;
	background		: #CCCCCC;
}

.logo
{
	float			: center;
	width			: 100%;
}

img
{
	border			: 2pt grey solid;
	width			: 100%;
}

input
{
	width			: 120px;
}

.forgot
{
	float			: right;
}

.table
{
	float			: right;
}
</style>

</head>

<body>

	<div class = 'container' >
	
		<div class = 'logo'>
			<img src="<?php echo base_url(); ?>application/libraries/images/logo.jpg" height = 35  width = 200 alt="" title = 'Go to Cancerkin Website' />
		</div>
		<div>
		<?php echo form_open(base_url().'index.php/admin'); ?>		
			<table class = 'stable'>
				<tr>
					<td colspan = '2'>
					<!--  <h4> CancerKin Management Application</h4> -->	
					</td>
					</tr>
					<tr>
						<td>
							<p><?php echo form_label('Email Address: ', 'email_address'); ?></p>  
						</td>
						<td>
						    <p> <?php  echo form_input('email_address', set_value('email_address'), 'id="email_address" autofocus'); ?> </p>
						</td>
					</tr>
					<tr>
						<td>
							<p> <?php echo form_label('Password:', 'password'); ?> </p>
						</td>
						<td>
							<p> <?php echo form_password('password', '', 'id="password"'); ?> </p>
						</td>
					</tr>
					<tr>
						<td>
						</td>
						<td>
						<p>
						   <?php echo form_submit('submit', 'Login'); ?>
						</p>
						</td>
				</tr>
			</table>
		<?php echo form_close(); ?>
		<?php echo validation_errors(); ?>
	</div>
	<div class = 'forgot'>
		<a href = '#' >Forgot Password?</a>
	</div>
    <!-- /content -->
	</div>
</body>
</html>
	

