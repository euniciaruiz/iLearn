<!DOCTYPE html>

<html>
<head>
	<title>Interactive Learning Game</title>
</head>
<body>
	<?php
	$rand = array_rand($english);
	
		 echo $english[$rand][0];
		 echo $english[$rand][1][0];
		 echo $english[$rand][1][1];
		 echo $english[$rand][1][2];
	     echo $english[$rand][1][3];
	     echo $english[$rand][2];
  ?>
</body>
</html>