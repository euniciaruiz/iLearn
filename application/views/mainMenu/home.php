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
		<?php  
			if(!empty($_SESSION['Username']))  
			{  
				 $username = postgresql_real_escape_string($_POST['username']);
				 $checkusername = postgresql_query("SELECT * FROM users WHERE username = '".$username."' AND id = '".$id."'");  
				 
				 if(postgresql_num_rows($checkusername) == 1)  
				{  
					$row = postgresql_fetch_array($checkusername);    
					  
					$_SESSION['username'] = $username;    
					  
					echo "<h1>Hi!</h1>";  
					
				}  
				else  
				{  
					echo "<h1>Error</h1>";  
					echo "<p>Sorry, your username could not be found.</a>.</p>";  
				} 
			else  
			{  
				?>   
				  
			   <p>Thanks for visiting!  <a href="register.php">click here to add user</a>.</p>  
				   
				  
			   <?php  
			}  
			?>  	 
			  
				 <h1>User</h1>  
				 <pWelcome! <b><?=$_SESSION['username']?></b></p>  
				   
			<?php  
			}
			?>
	</body>

</html>