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
	<title>Interactive Learning Game</title>
</head>
 <body>
    <div id="page-wrapper">
      <div id="absolute-wrapper">
        <img src="<?php echo base_url();?>images/images-3.jpg" class="image image-1">
		<i class="icon icon-home"></i>

        <img src="<?php echo base_url(); ?>images/language_alphabet1.jpg" class="image image-2">
        <div class="hero-unit hero-unit-1">
          <h1 class="heading"></h1>
          <div class="btns"></div>
        </div>
		<?php $rand = array_rand($english); ?>
        <div class="hero-unit hero-unit-2">
          <p><?php echo $english[$rand][0]; ?></p>
          <div class="btns"></div>
        </div>
        <button class="btn btn-1 btn-2"><?php echo $english[$rand][1][0]; ?></button>
        <button class="btn btn-1 btn-3"><?php echo $english[$rand][1][1]; ?></button>
        <button class="btn btn-2 btn-4"><?php echo $english[$rand][1][2]; ?></button>
        <button class="btn btn-3 btn-4"><?php echo $english[$rand][1][3]; ?></button>
      </div>
    </div>
  </body>

</html>