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
	<link rel="stylesheet" href="<?php echo base_url();?>css/questions.css" type="text/css" media="screen" charset="utf-8" />
	<link rel="stylesheet" href="<?php echo base_url();?>css/jquery-ui.css" />
    <script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui.js"></script>
	<title>Interactive Learning Game</title>
  <body>
    <div id="page-wrapper">
      <div id="absolute-wrapper">
        <img src="<?php echo base_url();?>images/earth.jpg" class="image image-1">
        <img src="<?php echo base_url();?>images/movies.jpg" class="image image-2">
        <div class="rectangle rectangle-1">
          <h1 class="heading">iLearn</h1>
          <div class="paragraph paragraph-1 paragraph-3">
            <p>Login</p>
          </div>
          <div class="paragraph paragraph-1 paragraph-2 paragraph-4">
            <p>Signup</p>
          </div>
          <div class="paragraph paragraph-1 paragraph-2 paragraph-5">
            <p>Home</p>
          </div>
          <div class="paragraph paragraph-6">
            <p>Interactive Learning Game</p>
          </div>
        </div>
        <div class="hero-unit hero-unit-1">
          <h1 class="heading"></h1>
          <div class="btns"></div>
        </div>
        <div class="paragraph paragraph-7 paragraph-8">
          <p>Score: <?php echo $score;?></p>
        </div>
        <div class="paragraph paragraph-7 paragraph-9">
          <p>Lives: <?php echo $lives;?></p>
        </div>
        <div class="hero-unit hero-unit-2">
          <?php $rand = array_rand($general_knowledge); ?>
          <p><?php echo $general_knowledge[$rand][0];?></p>
          <div class="btns"></div>
        </div>
        <button class="btn btn-1 btn-2 btn-4"  value="<?php echo $general_knowledge[$rand][1][0]; ?>"><?php echo $general_knowledge[$rand][1][0]; ?></button>
        <button class="btn btn-1 btn-5"  value="<?php echo $general_knowledge[$rand][1][1]; ?>"><?php echo $general_knowledge[$rand][1][1]; ?></button>
        <img src="<?php echo base_url();?>images/images-4.jpg" class="image image-3">
        <button class="btn btn-3 btn-6"  value="<?php echo $general_knowledge[$rand][1][2]; ?>"><?php echo $general_knowledge[$rand][1][2]; ?></button>
        <button class="btn btn-2 btn-3"  value="<?php echo $general_knowledge[$rand][1][3]; ?>"><?php echo $general_knowledge[$rand][1][3]; ?></button>
        <div class="rectangle rectangle-2"></div>
      </div>
    </div>
    <script>
			var correctAnswer = '<?php echo $general_knowledge[$rand][2]; ?>';

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
			<?php unset($general_knowledge[$rand]);?>
			<?php echo form_open('subjectController/next_question'); ?>
				<input type="hidden" name="questionlimit" value="<?php echo serialize($question_limit + 1);?>" />
				<input type="hidden" name="scoretemp" value="<?php echo serialize($score + 2);?>" />
				<input type="hidden" name="subject_name" value="general_knowledge" />
				<input type="hidden" name="subject" value="<?php echo base64_encode(serialize($general_knowledge));?>" />
				<input type="hidden" name="livestemp" value="<?php echo serialize($lives);?>"/>
				Your Score: <?php echo $score + 2;?><br>
				Lives: <?php echo $lives;?>
				<button>Next Question</button>
			<?php echo form_close(); ?>
		</div>
		
		<div id="dialog-message-incorrect" title="SORRY!">
			<p class="validateTips">The answer is incorrect!</p><br/>
			<?php unset($general_knowledge[$rand]);?>
			<?php echo form_open('subjectController/next_question'); ?>
				<input type="hidden" name="questionlimit" value="<?php echo serialize($question_limit + 1);?>" />
				<input type="hidden" name="scoretemp" value="<?php echo serialize($score);?>" />
				<input type="hidden" name="subject_name" value="general_knowledge" />
				<input type="hidden" name="subject" value="<?php echo base64_encode(serialize($general_knowledge));?>" />
				<input type="hidden" name="livestemp" value="<?php echo serialize($lives - 1);?>"/>
				Your Score: <?php echo $score;?><br>
				Lives: <?php echo $lives - 1;?>
				<button>Next Question</button>
			<?php echo form_close(); ?>
		</div>
  </body>

</html>



