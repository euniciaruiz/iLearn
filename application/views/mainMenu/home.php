<!DOCTYPE html>
<?php
	session_start();
	$username = $this->session->userdata('username');
	$is_logged_in = $this->session->userdata('is_logged_in');
?>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Main Menu</title>
		<link href="https://fonts.googleapis.com/css?family=Limelight|Flamenco|Federo|Yesteryear|Josefin Sans|Spinnaker|Sansita One|Handlee|Droid Sans|Oswald:400,300,700" media="screen" rel="stylesheet" type="text/css" />
	    	<link href="<?php echo base_url();?>css/bootstrap.css" media="screen" rel="stylesheet" type="text/css" />
	    	<link href="<?php echo base_url();?>css/bootstrap-responsive.css" media="screen" rel="stylesheet" type="text/css" />
	    	<link href="<?php echo base_url();?>css/common.css" media="screen" rel="stylesheet" type="text/css" />
	    	<link href="<?php echo base_url();?>css/fontawesome.css" media="screen" rel="stylesheet" type="text/css" />
	    	<link href="<?php echo base_url();?>css/home.css" media="screen" rel="stylesheet" type="text/css" />
	    	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/component.css" />
	    	<script src="<?php echo base_url();?>js/modernizr.custom.js"></script>		
	</head>
<body>
    <div id="page-wrapper">
      <div id="absolute-wrapper">
        <div class="image">
          <?php echo form_open('subjectController/play');?>
          <button class="btn btn-success">PLAY</button>
          <?php echo form_close();?>
          <?php echo form_open('mainmenuController/help');?>
          <button class="btn btn-primary">HELP</button>
          <?php echo form_close();?>
        </div>
        <div class="rectangle rectangle-1">
          <h1 class="heading">iLearn</h1>
          <?php if($is_logged_in) { ?>
	        <div class="dom-body-text paragraph paragraph-1 paragraph-2 paragraph-3">
	            <p><?php echo anchor('playerController/logout', 'Logout'); ?></p>
	        </div>
	        <div class="dom-body-text paragraph paragraph-1 paragraph-5">
	            <p>Welcome, <?php echo $username;?></p>
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
        <div class="rectangle rectangle-2">
          <div class="dom-body-text paragraph">
            <p>Copyright @&nbsp;</p>
          </div>
        </div>
      </div>
    </div>
  </body>

</html>