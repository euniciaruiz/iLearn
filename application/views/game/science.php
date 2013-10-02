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
	<link rel="stylesheet" href="<?php echo base_url();?>css/jquery-ui.css" />
    <script src="<?php echo base_url();?>js/jquery-1.9.1.js"></script>
    <script src="<?php echo base_url();?>js/jquery-ui.js"></script>
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
		<?php $rand = array_rand($science); ?>
        <div class="hero-unit hero-unit-2">
          <p><?php echo $science[$rand][0];
			?></p>
          <div class="btns"></div>
        </div>
		
        <button class="btn btn-1 btn-2"  value="<?php echo $science[$rand][1][0]; ?>"><?php echo $science[$rand][1][0]; ?></button>
        <button class="btn btn-1 btn-3"  value="<?php echo $science[$rand][1][1]; ?>"><?php echo $science[$rand][1][1]; ?></button>
        <button class="btn btn-2 btn-4"  value="<?php echo $science[$rand][1][2]; ?>"><?php echo $science[$rand][1][2]; ?></button>
        <button class="btn btn-3 btn-4"  value="<?php echo $science[$rand][1][3]; ?>"><?php echo $science[$rand][1][3]; ?></button>
		
		<script>
			var correctAnswer = '<?php echo $science[$rand][2]; ?>';

			$( document ).ready(function() {
				$(".btn").click(function( event ) {
					if(($(this).attr("value").toLowerCase()) == correctAnswer.toLowerCase())
					{
						$( "#dialog-message-correct" ).dialog( "open" );
					}	
					else{
						$( "#dialog-message-incorrect" ).dialog("open");
					}
				});

				$( "#dialog-message-correct" ).dialog({
					autoOpen: false,
					show: {
						effect: "blind",
						duration: 1000
					},
					hide: {
						effect: "explode",
					    duration: 1000
					}
				});
				$( "#dialog-message-incorrect" ).dialog({
					autoOpen: false,
					show: {
						effect: "blind",
						duration: 1000
					},
					hide: {
						effect: "explode",
					    duration: 1000
					}
				});
			});
		</script>
		<div id="dialog-message-correct" title="YEHEEY!">
			<p class="validateTips">The answer is correct!</p><br/>
			<?php unset($science[$rand]);?>
			<?php echo form_open('subjectController/next_question'); ?>
				<input type="hidden" name="scoretemp" value="<?php echo serialize($score + 2);?>" />
				<input type="hidden" name="subject_name" value="science" />
				<input type="hidden" name="subject" value="<?php echo base64_encode(serialize($science));?>" />
				<input type="hidden" name="livestemp" value="<?php echo serialize($lives);?>"/>
				Your Score: <?php echo $score + 2;?><br>
				Lives: <?php echo $lives;?>
				<button>Next Question</button>
			<?php echo form_close(); ?>
		</div>
		<div id="dialog-message-incorrect" title="SORRY!">
			<p class="validateTips">The answer is incorrect!</p><br/>
			<?php unset($science[$rand]);?>
			<?php echo form_open('subjectController/next_question'); ?>
				<input type="hidden" name="scoretemp" value="<?php echo serialize($score);?>" />
				<input type="hidden" name="subject_name" value="science" />
				<input type="hidden" name="subject" value="<?php echo base64_encode(serialize($science));?>" />
				<input type="hidden" name="livestemp" value="<?php echo serialize($lives - 1);?>"/>
				Your Score: <?php echo $score;?><br>
				Lives: <?php echo $lives - 1;?>
				<button>Next Question</button>
			<?php echo form_close(); ?>
		</div>
      </div>
    </div>
  </body>
</html>



