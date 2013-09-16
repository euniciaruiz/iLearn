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
		<?php $rand = array_rand($general_knowledge); ?>
        <div class="hero-unit hero-unit-2">
          <p><?php echo $general_knowledge[$rand][0];
			?></p>
          <div class="btns"></div>
        </div>
		
        <button class="btn btn-1 btn-2"  value="<?php echo $general_knowledge[$rand][1][0]; ?>"><?php echo $general_knowledge[$rand][1][0]; ?></button>
        <button class="btn btn-1 btn-3"  value="<?php echo $general_knowledge[$rand][1][1]; ?>"><?php echo $general_knowledge[$rand][1][1]; ?></button>
        <button class="btn btn-2 btn-4"  value="<?php echo $general_knowledge[$rand][1][2]; ?>"><?php echo $general_knowledge[$rand][1][2]; ?></button>
        <button class="btn btn-3 btn-4"  value="<?php echo $general_knowledge[$rand][1][3]; ?>"><?php echo $general_knowledge[$rand][1][3]; ?></button>
		
		<?php
			$correctAnswer = $general_knowledge[$rand][2];
		?>
		<script>
		var correctAnswer = '<?php echo $correctAnswer ?>';
		if(true){
		$( document ).ready(function() {
			$(".btn").click(function( event ) {
				if(($(this).attr("value").toLowerCase()) == correctAnswer.toLowerCase())
				{
					$( "#dialog-message-correct" ).dialog();
				}	
				else{
					$( "#dialog-message-incorrect" ).dialog();
				}
			});
		});
		}
		else{
		$( document ).ready(function() {
			$( "a" ).click(function( event ) {
				$( "#dialog-message-incorrect" ).dialog({
					autoOpen: false,
				    height: 300,
				    width: 350,
				    modal: true,
				});
			});
		});
		}
		</script>
		<div id="dialog-message-correct" title="YEHEEY!">
			<p class="validateTips">The answer is correct!</p><br/>
			<?php unset($general_knowledge[$rand]);?>
			<?php echo form_open('subjectController/next_question'); ?>
				<input type="hidden" name="subject_name" value="general_knowledge" />
				<input type="hidden" name="subject" value="<?php echo base64_encode(serialize($general_knowledge));?>" />
				<button>Next Question</button>
			<?php echo form_close(); ?>
		</div>
		<div id="dialog-message-incorrect" title="SORRY!">
			<p class="validateTips">The answer is incorrect!</p><br/>
			<?php unset($general_knowledge[$rand]);?>
			<?php echo form_open('subjectController/next_question'); ?>
				<input type="hidden" name="subject_name" value="general_knowledge" />
				<input type="hidden" name="subject" value="<?php echo base64_encode(serialize($general_knowledge));?>" />
				<button>Next Question</button>
			<?php echo form_close(); ?>
		</div>
      </div>
    </div>
  </body>
</html>



