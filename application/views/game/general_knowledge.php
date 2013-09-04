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
        <div class="image image-5"><i class="icon icon-home"></i>
        </div>
        <img src="<?php echo base_url();?>images/movies.jpg" class="image image-6">
        <div class="hero-unit hero-unit-1">
          <h1 class="heading"></h1>
          <div class="btns"></div>
        </div>
        <?php $rand = array_rand($general_knowledge); ?>
        <div class="hero-unit hero-unit-2">
          <p><?php echo $general_knowledge[$rand][0]; ?></p>
          <div class="btns"></div>
        </div>
        <button class="btn btn-1 btn-2" ><?php echo $general_knowledge[$rand][1][0]; ?></button>
        <button class="btn btn-1 btn-3" ><?php echo $general_knowledge[$rand][1][1]; ?></button>
        <button class="btn btn-3 btn-4" ><?php echo $general_knowledge[$rand][1][2]; ?></button>
        <button class="btn btn-2 btn-4" ><?php echo $general_knowledge[$rand][1][3]; ?></button>
        <img src="<?php echo base_url();?>images/images-4.jpg" class="image image-7">
      </div>
    </div>
  </body>

</html>


