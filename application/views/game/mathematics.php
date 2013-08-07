<!DOCTYPE html>

<html>
<head>
	<title>Interactive Learning Game</title>
</head>
<body>
	<?php
    echo $mathematics[0][0];
    foreach($mathematics[0][1] as $choice) {
        echo '<button class="btn btn-1 btn-3" name="answer" value="'.$choice.'">'.$choice.'</button>';
    };
    echo $mathematics[0][2];
  ?>
</body>
</html>