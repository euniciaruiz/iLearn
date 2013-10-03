<!DOCTYPE HTML>
<html lang="en">
  
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Limelight|Flamenco|Federo|Yesteryear|Josefin Sans|Spinnaker|Sansita One|Handlee|Droid Sans|Oswald:400,300,700" media="screen" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>css/bootstrap.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>css/bootstrap-responsive.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>css/common.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>css/fontawesome.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>css/project.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>css/copy-of-questions.css" media="screen" rel="stylesheet" type="text/css" />
    <!-- Typekit fonts require an account and a kit containing the fonts used. see https://typekit.com/plans for details. <script type="text/javascript" src="//use.typekit.net/YOUR_KIT_ID.js"></script>
  <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
-->
    <title>Sign-up</title>
  </head>
  
  <body>
    <div id="page-wrapper">
      <div id="absolute-wrapper">
        <div class="rectangle rectangle-1">
          <h1 class="heading heading-1">iLearn</h1>
          <div class="paragraph paragraph-1 paragraph-3">
            <p>Login</p>
          </div>
          <div class="paragraph paragraph-1 paragraph-2 paragraph-4">
            <p>Signup</p>
          </div>
          <div class="paragraph paragraph-1 paragraph-2 paragraph-5">
            <p>Home</p>
          </div>
          <div class="container">
            <div class="row-fluid">
              <span class="span12"></span>
            </div>
          </div>
          <div class="paragraph paragraph-6">
            <p>Interactive Learning Game</p>
          </div>
        </div>
        <div class="hero-unit hero-unit-1 hero-unit-2">
          <h1 class="heading"></h1>
          <div class="btns"></div>
        </div>
        <div class="hero-unit hero-unit-1 hero-unit-3">
          <h1 class="heading"></h1>
          <div class="btns"></div>
        </div>
        <h1 class="heading heading-1 heading-2">Sign-up</h1>
        <div class="hero-unit hero-unit-4">
          <h1 class="heading"></h1>
          <div class="btns"></div>
        </div>
		
        <div class="paragraph paragraph-7 paragraph-8 paragraph-9">
		<?php echo form_open('playerController/create');?>
			<p>Username:</p>
		<?php echo form_error('username');?>
        </div>
        <input class="textinput textinput-2" type="text" name="username" value="<?php echo set_value('username'); ?>" />
		
		<div class="paragraph paragraph-7 paragraph-10">
			<p>Password:</p>
		<?php echo form_error('password');?>
        </div>
		<input class="textinput textinput-1 textinput-3" type="password" name="password" value="<?php echo set_value('password'); ?>" /> 
		
		<div class="paragraph paragraph-7 paragraph-8 paragraph-11">
			<p>Confirm Password:</p>
        <?php echo form_error('passconf');?>
		</div>
		
        <input class="textinput textinput-1 textinput-4" type="password" name="passconf" value="<?php echo set_value('passconf'); ?>" />
		<button type="submit" class="btn btn-2">Create</button>
		<?php echo form_close(); ?>
		<?php echo form_open('mainmenuController');?>
        <button class="btn btn-1">Cancel</button>
		<?php echo form_close(); ?>
        <div class="rectangle rectangle-2"></div>
      </div>
    </div>
  </body>

</html>