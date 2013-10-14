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
    <link href="<?php echo base_url();?>css/signup.css" media="screen" rel="stylesheet" type="text/css" />
    <title>Sign-up</title>
  </head>
  
  <body>
    <div id="page-wrapper">
      <div id="absolute-wrapper">
        <div class="rectangle rectangle-1 rectangle-2 rectangle-4">
          <div class="rectangle rectangle-5">
            <?php echo form_open('playerController/create');?>
            <div class="paragraph paragraph-1 paragraph-3">
              <p><?php echo form_error('username');?></p>
            </div>
            <input class="textinput textinput-1" type="text" name="username" value="<?php echo set_value('username'); ?>">
            <div class="paragraph paragraph-4">
              <p>Username</p>
            </div>
            <div class="paragraph paragraph-1 paragraph-5">
              <p><?php echo form_error('password');?></p>
            </div>
            <input class="textinput textinput-2" type="password" name="password" value="<?php echo set_value('password'); ?>">
            <div class="paragraph paragraph-2 paragraph-6">
              <p>Password</p>
            </div>
            <div class="paragraph paragraph-1 paragraph-7">
              <p><?php echo form_error('passconf');?></p>
            </div>
            <input class="textinput textinput-3" type="password" name="passconf" value="<?php echo set_value('passconf'); ?>">
            <div class="paragraph paragraph-2 paragraph-8">
              <p>Confirm Password</p>
            </div>
            <button class="btn btn-1">Signup</button>
            <?php echo form_close(); ?>
            <?php echo form_open('mainmenuController');?>
            <button class="btn btn-2">Cancel</button>
            <?php echo form_close(); ?>
          </div>
          <div class="rectangle rectangle-1 rectangle-2">
            <h1 class="heading">Signup</h1>
          </div>
        </div>
        <div class="rectangle rectangle-2 rectangle-3 rectangle-6">
          <h1 class="heading">iLearn</h1>
          <div class="navbar navbar-inverse">
            <div class="navbar-inner">
              <div class="responsive-container">
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
                      <?php echo anchor('playerController/login', 'Login'); ?>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="paragraph">
            <p>Interactive Learning Game</p>
          </div>
        </div>
        <div class="rectangle rectangle-2 rectangle-3 rectangle-7">
          <div class="paragraph">
            <p>Copyright @</p>
          </div>
        </div>
      </div>
    </div>
  </body>

</html>

