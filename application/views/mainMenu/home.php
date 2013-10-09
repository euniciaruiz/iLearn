<!DOCTYPE html>
<?php
	session_start();
	$username = $this->session->userdata('username');
	$is_logged_in = $this->session->userdata('is_logged_in');
?>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Home</title>
		<link href="https://fonts.googleapis.com/css?family=Limelight|Flamenco|Federo|Yesteryear|Josefin Sans|Spinnaker|Sansita One|Handlee|Droid Sans|Oswald:400,300,700" media="screen" rel="stylesheet" type="text/css" />
	    <link href="<?php echo base_url();?>css/bootstrap.css" media="screen" rel="stylesheet" type="text/css" />
	    <link href="<?php echo base_url();?>css/bootstrap-responsive.css" media="screen" rel="stylesheet" type="text/css" />
	    <link href="<?php echo base_url();?>css/common.css" media="screen" rel="stylesheet" type="text/css" />
	    <link href="<?php echo base_url();?>css/fontawesome.css" media="screen" rel="stylesheet" type="text/css" />
	    <link href="<?php echo base_url();?>css/home.css" media="screen" rel="stylesheet" type="text/css" />
	</head>
 	<body>
	    <div id="page-wrapper">
	      <div id="absolute-wrapper">
	        <div class="image">
	          <?php echo form_open('subjectController/play');?>
	          <button class="btn btn-primary btn-primary-1">PLAY</button>
	          <?php echo form_close();?>
	          <?php echo form_open('mainmenuController/help');?>
	          <button class="btn btn-primary btn-primary-2">HELP</button>
	          <?php echo form_close();?>
	        </div>
	        <div class="rectangle rectangle-1">
	          <h1 class="heading">iLearn</h1>
	          <div class="navbar navbar-inverse">
	            <div class="navbar-inner">
	              <div class="responsive-container">
	              	<?php if($is_logged_in) { ?>
	                <a class="btn btn-navbar">
	                  <span class="icon-bar"></span>
	                  <span class="icon-bar"></span>
	                </a>
	                <div class="nav-collapse collapse">
	                  <ul class="nav">
	                    <li>
	                      <?php echo anchor('playerController/player_profile', $username."'s Profile"); ?>
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
	          <div class="dom-body-text paragraph">
	            <p>Interactive Learning Game</p>
	          </div>
	        </div>
	        <div class="rectangle rectangle-2">
	          <div class="dom-body-text paragraph">
	            <p>Copyright @&nbsp;</p>
	          </div>
	        </div>
	      </div>
	    </div>
  </body>
</html>