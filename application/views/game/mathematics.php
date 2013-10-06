<!DOCTYPE html>
<?php
	session_start();
	$username = $this->session->userdata('username');
	$is_logged_in = $this->session->userdata('is_logged_in');
?>
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
    <script src="<?php echo base_url();?>js/jquery-1.9.1.js"></script>
    <script src="<?php echo base_url();?>js/jquery-ui.js"></script>
	<title>Interactive Learning Game</title>
</head>
 <body>

    <div id="page-wrapper">
      <div id="absolute-wrapper">
        <div class="rectangle rectangle-1">
          <h1 class="heading">iLearn</h1>
          <?php if($is_logged_in) { ?>
	        <div class="dom-body-text paragraph paragraph-1 paragraph-2 paragraph-3">
	            <p><?php echo anchor('playerController/logout', 'Logout'); ?></p>
	        </div>
	        <div class="dom-body-text paragraph paragraph-1 paragraph-5">
	            <p>Hello, <?php echo $username;?></p>
	        </div>
		   <?php } else { ?>
	          <div class="dom-body-text paragraph paragraph-1 paragraph-2 paragraph-3">
	            <p><?php echo anchor('playerController/signup', 'Signup'); ?></p>
	          </div>
	          <div class="dom-body-text paragraph paragraph-1 paragraph-2 paragraph-4">
	            <p><?php echo anchor('playerController/login', 'Login'); ?></p>
	          </div>
	       	<?php }; ?>
          <div class="dom-body-text paragraph paragraph-6">
            <p>Interactive Learning Game</p>
          </div>
        </div>
        <img src="<?php echo base_url();?>images/mat.jpg" class="image image-8">
        <div class="hero-unit hero-unit-1">
          <h1 class="heading"></h1>
          <div class="btns"></div>
        </div>
        <div class="paragraph paragraph-7 paragraph-8">
          <p>Score: 0</p>
        </div>
        <div class="paragraph paragraph-7 paragraph-9">
          <p>Lives: 3</p>
        </div>
        <div class="hero-unit hero-unit-2">
          <?php $rand = array_rand($mathematics); ?>
          <p><?php echo $mathematics[$rand][0];?></p>
          <div class="btns"></div>
        </div>
        <button class="btn btn-1 btn-2 btn-4"  value="<?php echo $mathematics[$rand][1][0]; ?>"><?php echo $mathematics[$rand][1][0]; ?></button>
        <button class="btn btn-1 btn-5"  value="<?php echo $mathematics[$rand][1][1]; ?>"><?php echo $mathematics[$rand][1][1]; ?></button>
        <button class="btn btn-3 btn-6"  value="<?php echo $mathematics[$rand][1][2]; ?>"><?php echo $mathematics[$rand][1][2]; ?></button>
        <button class="btn btn-2 btn-3"  value="<?php echo $mathematics[$rand][1][3]; ?>"><?php echo $mathematics[$rand][1][3]; ?></button>
		<div class="rectangle rectangle-2"></div>
      </div>
    </div>
    <script>
			var correctAnswer = '<?php echo $mathematics[$rand][2]; ?>';

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
			<?php unset($mathematics[$rand]);?>
			<?php echo form_open('subjectController/next_question'); ?>
				<input type="hidden" name="questionlimit" value="<?php echo serialize($question_limit + 1);?>" />
				<input type="hidden" name="scoretemp" value="<?php echo serialize($score + 2);?>" />
				<input type="hidden" name="subject_name" value="mathematics" />
				<input type="hidden" name="subject" value="<?php echo base64_encode(serialize($mathematics));?>" />
				<input type="hidden" name="livestemp" value="<?php echo serialize($lives);?>"/>
				<button>Next Question</button>
			<?php echo form_close(); ?>
		</div>
		<div id="dialog-message-incorrect" title="SORRY!">
			<p class="validateTips">The answer is incorrect!</p><br/>
			<?php unset($mathematics[$rand]);?>
			<?php echo form_open('subjectController/next_question'); ?>
				<input type="hidden" name="questionlimit" value="<?php echo serialize($question_limit + 1);?>" />
				<input type="hidden" name="scoretemp" value="<?php echo serialize($score);?>" />
				<input type="hidden" name="subject_name" value="mathematics" />
				<input type="hidden" name="subject" value="<?php echo base64_encode(serialize($mathematics));?>" />
				<input type="hidden" name="livestemp" value="<?php echo serialize($lives - 1);?>"/>
				<button>Next Question</button>
			<?php echo form_close(); ?>
		</div>
  </body>
</html>