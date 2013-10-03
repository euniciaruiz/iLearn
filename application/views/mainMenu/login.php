<!DOCTYPE HTML>
<html lang="en">
  
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Limelight|Flamenco|Federo|Yesteryear|Josefin Sans|Spinnaker|Sansita One|Handlee|Droid Sans|Oswald:400,300,700" media="screen" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>css/bootstrap2.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>css/bootstrap-responsive2.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>css/common2.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>css/fontawesome2.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>css/project2.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>css/copy-of-questions2.css" media="screen" rel="stylesheet" type="text/css" />
    <!-- Typekit fonts require an account and a kit containing the fonts used. see https://typekit.com/plans for details. <script type="text/javascript" src="//use.typekit.net/YOUR_KIT_ID.js"></script>
  <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
-->
    <title>Login</title>
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
        <div class="hero-unit hero-unit-4">
          <h1 class="heading"></h1>
          <div class="btns"></div>
        </div>
		<?php echo form_open('loginController/validate_credentials');?>
        <h1 class="heading heading-1 heading-2">LOGIN</h1>
        <div class="paragraph paragraph-7 paragraph-8">
          <p>Username:</p>
        </div>
        <input class="textinput textinput-1" type="text" name="username" value="<?php echo set_value('username'); ?>">
        <div class="paragraph paragraph-7 paragraph-9">
          <p>Password:</p>
        </div>
        <input class="textinput textinput-2" type="password" name="password" value="<?php echo set_value('password'); ?>">
        <button class="btn btn-2">Login</button>
		<?php echo form_close(); ?>
		<button class="btn btn-1">Cancel</button>
        <div class="rectangle rectangle-2"></div>
      </div>
    </div>
  </body>

</html>