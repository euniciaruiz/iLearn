<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Limelight|Flamenco|Federo|Yesteryear|Josefin Sans|Spinnaker|Sansita One|Handlee|Droid Sans|Oswald:400,300,700" media="screen" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.css" type="text/css" media="screen" charset="utf-8" />
	<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-responsive.css" type="text/css" media="screen" charset="utf-8" />
	<link rel="stylesheet" href="<?php echo base_url();?>css/common.css" type="text/css" media="screen" charset="utf-8" />
	<link rel="stylesheet" href="<?php echo base_url();?>css/fontawesome.css" type="text/css" media="screen" charset="utf-8" />
	<link rel="stylesheet" href="<?php echo base_url();?>css/project.css" type="text/css" media="screen" charset="utf-8" />
	<link rel="stylesheet" href="<?php echo base_url();?>css/main.css" type="text/css" media="screen" charset="utf-8" />
	<script src="<?php echo base_url();?>js/jquery.js"></script>
	<title>Interactive Learning Game</title>
</head>
 <body>
    <div id="page-wrapper">
      <div id="absolute-wrapper">
        <img src="<?php echo base_url();?>images/mat.jpg" class="image">
		<i class="icon icon-home"></i>

        <div class="hero-unit hero-unit-1">
          <h1 class="heading"></h1>
          <div class="btns"></div>
        </div>
		<?php $rand = array_rand($mathematics); ?>
        <div class="hero-unit hero-unit-2">
          <p><?php echo $mathematics[$rand][0]; ?></p>
          <div class="btns"></div>
        </div>
<<<<<<< HEAD
        <button class="btn btn-1 btn-2"><a><?php echo $mathematics[$rand][1][0]; ?></a></button>
=======
        <button class="btn btn-1 btn-2" i><a><?php echo $mathematics[$rand][1][0]; ?></a></button>
>>>>>>> dd17da06e320400c917ccbcc1e7d992b6ba6daf2
        <button class="btn btn-1 btn-3"><a><?php echo $mathematics[$rand][1][1]; ?></a></button>
        <button class="btn btn-3 btn-4"><a><?php echo $mathematics[$rand][1][2]; ?></a></button>
        <button class="btn btn-2 btn-4"><a><?php echo $mathematics[$rand][1][3]; ?></a></button>
		<script>
		if(true){
		$( document ).ready(function() {
			$( "a" ).click(function( event ) {
				alert( "Your Answer is Correct!" );
			});
		});
		}
		else{
		$( document ).ready(function() {
			$( "a" ).click(function( event ) {
				alert( "Your Answer is Incorrect!" );
			});
		});
		}
		
	 
		</script>
      </div>
    </div>
  </body>

</html>