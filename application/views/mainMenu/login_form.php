<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8" />
		<title>Login</title>
		<style type ="text/css" media="screen">
		label{display:block;}
	</style>	
		
	</head>
	
	<body>
	
		<?php echo form_open('loginController/validate_credentials');?>
			<p>
				<label for="content">Name:</label>
				<input type="text" name="name" />
			</p>
			<p>
				<label for="content">Password:</label>
				<input type="text" name="password" />
			</p>
			
			<p>
				<input type="submit" value="Submit" />
			</p>

		<?php echo form_close(); ?>

	</body>

</html>