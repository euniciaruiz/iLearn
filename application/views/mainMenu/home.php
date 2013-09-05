<!DOCTYPE html>

<html>
	<head>
		<title>Main Menu</title>
	</head>
	
	<body bgcolor="black"><center>
		
		<?php echo anchor('subjectController/play', '<font face="century gothic" color="#F58EA1" size="32">PLAY</font>');?><br>
		<?php echo anchor('subjectController/help', '<font face="century gothic" color="#98EDD4" size="32">Help</font>');?><br>
		<?php echo anchor('subjectController/exit', '<font face="century gothic" color="#E1FC90" size="32">Quit</font>');?><br>
		
		</center>
		<div>	
		<?php 
			foreach($users->result() as $user) {
				if($user->id ==1)
				echo "Hello    " .$user-> username;
				break;
			}
			echo form_open('mainmenuController/display');
			echo 'If this is not you, <button>Click Here</button>';
			echo form_close();
		?>
		</div>
	</body>

</html>