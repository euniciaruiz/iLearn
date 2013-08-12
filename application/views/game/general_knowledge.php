<!DOCTYPE html>

<html>
<head>
	<title>Interactive Learning Game</title>
</head>
<body>
	<?php
	$rand = array_rand($general_knowledge);
	
		 echo $general_knowledge[$rand][0];
		 echo $general_knowledge[$rand][1][0];
		 echo $general_knowledge[$rand][1][1];
		 echo $general_knowledge[$rand][1][2];
	     echo $general_knowledge[$rand][1][3];
	     echo $general_knowledge[$rand][2];
  ?>
</body>
</html>