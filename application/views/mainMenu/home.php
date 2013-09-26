<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8" />
		<title>Main Menu</title>
		<link href="https://fonts.googleapis.com/css?family=Limelight|Flamenco|Federo|Yesteryear|Josefin Sans|Spinnaker|Sansita One|Handlee|Droid Sans|Oswald:400,300,700" media="screen" rel="stylesheet" type="text/css" />
	    	<link href="<?php echo base_url();?>css/bootstrap.css" media="screen" rel="stylesheet" type="text/css" />
	    	<link href="<?php echo base_url();?>css/bootstrap-responsive.css" media="screen" rel="stylesheet" type="text/css" />
	    	<link href="<?php echo base_url();?>css/common.css" media="screen" rel="stylesheet" type="text/css" />
	    	<link href="<?php echo base_url();?>css/fontawesome.css" media="screen" rel="stylesheet" type="text/css" />
	    	<link href="<?php echo base_url();?>css/project.css" media="screen" rel="stylesheet" type="text/css" />
	    	<link href="<?php echo base_url();?>css/home.css" media="screen" rel="stylesheet" type="text/css" />
	    	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/component.css" />
	    	<script src="<?php echo base_url();?>js/modernizr.custom.js"></script>		
	</head>
	
	<body>
		<div class="md-modal md-effect-2" id="modal-2">
			<div class="md-content">
				<h3>How to Play</h3>
				<div>
					<ul>
						<li><strong>1.</strong> After pressing the 'Start' button in the main menu, choose a subject you like.</li>
						<li><strong>2.</strong> A question related to the subject you chose will be displayed.</li>
						<li><strong>3.</strong> You must answer the question correctly to move on to the next question.</li>
					</ul>
					<button class="md-close">Close me!</button>
				</div>
			</div>
		</div>
		<div class="md-modal md-effect-16" id="modal-16">
			<div class="md-content">
				<h3>Create User</h3>
				<div>
				<?php echo form_open('playerController/create');?>
					<ul>
						<p>
							<?php echo form_error('name'); ?>
							<label for="content">Username:</label>
							<input style="float:right;clear:right" type="text" name="username" value="<?php echo set_value('username'); ?>" /></br>
							<label for="content">Password:</label>
							<input style="float:right;clear:right" type="password" name="password" value="<?php echo set_value('password'); ?>" /></br>
							<label for="content">Confirm Password:</label>
							<input style="float:right;clear:right" type="password" name="passconf" value="<?php echo set_value('passconf'); ?>" />
						</p>
					</ul>
					
					<input type="submit" value="Create!" />
				<?php echo form_close(); ?>
				</div>
			</div>
		</div>
		<div class="md-modal md-effect-1" id="modal-1">
			<div class="md-content">
				<h3>Login</h3>
				<div>
					<?php echo form_open('loginController/validate_credentials');?>
						<ul>
							<p>
								<label for="content">Username:</label>
								<input style="float:right;clear:right" type="text" name="username" value="<?php echo set_value('username'); ?>" /></br>
								<label for="content">Password:</label>
								<input style="float:right;clear:right" type="password" name="password" value="<?php echo set_value('password'); ?>" /></br>
							</p>
						</ul>
						<input type="submit" value="Login" />
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>

	<div id="page-wrapper">
      <div id="absolute-wrapper">
        <div class="rectangle rectangle-1 rectangle-2">
          <h1 class="heading">iLearn</h1>
          <div class="dom-body-text paragraph paragraph-1 paragraph-2">
          	<p><button class="md-trigger" data-modal="modal-1">Login</button></p>
          </div>
          <div class="dom-body-text paragraph paragraph-1 paragraph-3">
             <p><button class="md-trigger" data-modal="modal-16">Sign-up</button></p>
          </div>
          <div class="dom-body-text paragraph paragraph-4">
            <p>Interactive Learning Game</p>
          </div>
        </div>
        <div class="rectangle rectangle-3">
          <img src="images/black_invert_30x40.png" class="image">
        </div>
        <div class="image image-1">
          <?php echo form_open('subjectController/play');?>
          <button class="btn btn-1">PLAY</button>
          <?php echo form_close();?>
          <button class="btn btn-2">HELP</button>
        </div>
        <div class="rectangle rectangle-1 rectangle-4">
          <div class="dom-body-text paragraph">
            <p>Copyright @&nbsp;</p>
          </div>
        </div>
      </div>
    </div>

		
		<div class="md-overlay"></div>
		<script src="<?php echo base_url();?>js/classie.js"></script>
		<script src="<?php echo base_url();?>js/modalEffects.js"></script>
		<script>
			// this is important for IEs
			var polyfilter_scriptpath = '/js/';
		</script>
		<script src="<?php echo base_url();?>js/cssParser.js"></script>
		<script src="<?php echo base_url();?>js/css-filters-polyfill.js"></script>

	</body>

</html>