<!DOCTYPE html>

<html>
<head>
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
        <button class="btn btn-1 btn-2"><?php echo $general_knowledge[$rand][1][0]; ?></button>
        <button class="btn btn-1 btn-3"><?php echo $general_knowledge[$rand][1][1]; ?></button>
        <button class="btn btn-3 btn-4"><?php echo $general_knowledge[$rand][1][2]; ?></button>
        <button class="btn btn-2 btn-4"><?php echo $general_knowledge[$rand][1][3]; ?></button>
        <img src="<?php echo base_url();?>images/images-4.jpg" class="image image-7">
      </div>
    </div>
  </body>

</html>