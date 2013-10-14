<!DOCTYPE HTML>
<?php
	session_start();
	$username = $this->session->userdata('username');
	$is_logged_in = $this->session->userdata('is_logged_in');
?>
<html lang="en">
  
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Limelight|Flamenco|Federo|Yesteryear|Josefin Sans|Spinnaker|Sansita One|Handlee|Droid Sans|Oswald:400,300,700" media="screen" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>css/bootstrap.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>css/bootstrap-responsive.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>css/common.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>css/fontawesome.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>css/questions.css" media="screen" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url();?>css/magnific-popup.css">
    <script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/jquery.magnific-popup.js"></script>
    <title>iLearn|Interactive Learning Game</title>
    <style>
      .white-popup {
        position: relative;
        background: #FFF;
        padding: 20px;
        width: auto;
        max-width: 500px;
        margin: 20px auto;
      }
    </style>
  </head>
  
  <body>
    <div id="page-wrapper">
      <div id="absolute-wrapper">
        <img src="<?php echo base_url();?>images/mat.jpg" class="image image-6">
        <div class="rectangle rectangle-1 rectangle-2 rectangle-3">
          <h1 class="heading">iLearn</h1>
          <div class="navbar navbar-inverse">
            <div class="navbar-inner">
              <div class="responsive-container">
                <?php if($is_logged_in) { ?>
                <a class="btn btn-navbar">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </a>

                <div class="nav-collapse collapse">
                  <ul class="nav">
                    <li>
                      <?php echo anchor('mainmenuController', 'Home'); ?>
                    </li>
                    <li>
                      <?php echo anchor('playerController/player_profile', 'Profile'); ?>
                    </li>
                    <li>
                      <?php echo anchor('playerController/logout', 'Logout'); ?>
                    </li>
                  </ul>
                </div>
                <?php } else {; ?>
                <a class="btn btn-navbar">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </a>

                <div class="nav-collapse collapse">
                  <ul class="nav">
                    <li>
                      <?php echo anchor('mainmenuController', 'Home'); ?>
                    </li>
                    <li>
                      <?php echo anchor('playerController/signup', 'Signup'); ?>
                    </li>
                    <li>
                      <?php echo anchor('playerController/login', 'Login'); ?>
                    </li>
                  </ul>
                </div>
                <?php }; ?>
              </div>
            </div>
          </div>
          <div class="paragraph">
            <p>Interactive Learning Game</p>
          </div>
        </div>
        <div class="rectangle rectangle-4">
          <div class="paragraph paragraph-1">
            <p>Score: <?php echo $score;?></p>
          </div>
          <div class="paragraph paragraph-2">
            <p>Lives: <?php echo $lives;?></p>
          </div>
          <div class="hero-unit">
            <?php $rand = array_rand($mathematics); ?>
          	<p><?php echo $mathematics[$rand][0];?></p>
            <div class="btns"></div>
          </div>
          <button class="btn btn-1 btn-2" value="<?php echo $mathematics[$rand][1][0]; ?>"><?php echo $mathematics[$rand][1][0]; ?></button>
	      <button class="btn btn-1 btn-3" value="<?php echo $mathematics[$rand][1][1]; ?>"><?php echo $mathematics[$rand][1][1]; ?></button>
	      <button class="btn btn-2 btn-4" value="<?php echo $mathematics[$rand][1][2]; ?>"><?php echo $mathematics[$rand][1][2]; ?></button>
	      <button class="btn btn-5" value="<?php echo $mathematics[$rand][1][3]; ?>"><?php echo $mathematics[$rand][1][3]; ?></button>
        </div>
        <div class="rectangle rectangle-2 rectangle-5">
          <div class="paragraph">
            <p>MATHEMATICS</p>
          </div>
        </div>
        <div class="rectangle rectangle-1 rectangle-2 rectangle-6">
          <div class="paragraph">
            <p>Copyright @</p>
          </div>
        </div>
      </div>
    </div>
    	<script>
			var correctAnswer = '<?php echo $mathematics[$rand][2]; ?>';

			$( document ).ready(function() {
				$(".btn").click(function( event ) {
					if(($(this).attr("value").toLowerCase()) == correctAnswer.toLowerCase())
					{
						$.magnificPopup.open({
              items: {
                src: '#dialog-message-correct',
                type: 'inline'
              },
              preloader: false,
              modal: true
            });
					}	
					else{
						$.magnificPopup.open({
              items: {
                src: '#dialog-message-incorrect',
                type: 'inline'
              },
              preloader: false,
              modal: true
            });
					}
				});
			});
		</script>

		<div id="dialog-message-correct" class="white-popup mfp-hide">
			<p>The answer is correct!</p><br/>
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
		<div id="dialog-message-incorrect" class="white-popup mfp-hide">
			<p>The answer is incorrect!</p><br/>
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