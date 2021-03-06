<!DOCTYPE html>
<!DOCTYPE html>
<?php
	session_start();
	$username = $this->session->userdata('username');
	$is_logged_in = $this->session->userdata('is_logged_in');
?>
<html>
<head>
	<title>SUBJECTS</title>
	<link href="<?php echo base_url();?>css/bootstrap.css" media="screen" rel="stylesheet" type="text/css" />
	    	<link href="<?php echo base_url();?>css/bootstrap-responsive.css" media="screen" rel="stylesheet" type="text/css" />
	    	<link href="<?php echo base_url();?>css/common.css" media="screen" rel="stylesheet" type="text/css" />
	    	<link href="<?php echo base_url();?>css/fontawesome.css" media="screen" rel="stylesheet" type="text/css" />
			<link href="<?php echo base_url();?>css/mainmenu.css" media="screen" rel="stylesheet" type="text/css" />
</head>
  <body>
    <div id="page-wrapper">
      <div id="absolute-wrapper">
        <div class="rectangle rectangle-1">
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
                      <?php echo anchor('mainmenuController', "Home"); ?>
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
                  <span class="icon-bar"></span>
                </a>
                <div class="nav-collapse collapse">
                  <ul class="nav">
                    <li>
                      <?php echo anchor('mainmenuController', "Home"); ?>
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
        <img src="<?php echo base_url();?>images/kdis.jpg" class="image image-1 image-2">
        <img src="<?php echo base_url();?>images/kdis.jpg" class="image image-1 image-3">
        <div class="image image-4">
         <?php
		foreach($query->result() as $subject) {
			if ($subject->subject_name == "english") {
				echo form_open('subjectController/english');
				echo '<button class="btn btn-1 btn-2 btn-3 btn-4" type="submit" name="id" value="'.$subject->id.'">ENGLISH</button>';
				echo form_close();
			}
			else if ($subject->subject_name == "mathematics") {
				echo form_open('subjectController/mathematics');
				echo '<button class="btn btn-1 btn-2 btn-5" type="submit" name="id" value="'.$subject->id.'">MATHEMATICS</button>';
				echo form_close();
			}
			else if ($subject->subject_name == "science") {
				echo form_open('subjectController/science');
				echo '<button class="btn btn-2 btn-3 btn-6" type="submit" name="id" value="'.$subject->id.'">SCIENCE</button>';
				echo form_close();
			}
			else {
				echo form_open('subjectController/general_knowledge');
				echo '<button class="btn btn-3 btn-7" type="submit" name="id" value="'.$subject->id.'">GENERAL KNOWLEDGE</button>';
				echo form_close();
			}
		} ?>
        </div>
        <div class="rectangle rectangle-2">
          <div class="paragraph">
            <p>Copyright @</p>
          </div>
        </div>
      </div>
    </div>
  </body>

</html>

<!--<body>
	   <div id="page-wrapper">
      <div id="absolute-wrapper">
        <div class="image image-1">
		 <?php/*
		foreach($query->result() as $subject) {
			if ($subject->subject_name == "english") {
				echo form_open('subjectController/english');
				echo '<button class="btn btn-1 btn-5" type="submit" name="id" value="'.$subject->id.'">ENGLISH</button>';
				echo form_close();
			}
			else if ($subject->subject_name == "mathematics") {
				echo form_open('subjectController/mathematics');
				echo '<button class="btn btn-1 btn-2 btn-3" type="submit" name="id" value="'.$subject->id.'">MATHEMATICS</button>';
				echo form_close();
			}
			else if ($subject->subject_name == "science") {
				echo form_open('subjectController/science');
				echo '<button class="btn btn-2 btn-3 btn-4" type="submit" name="id" value="'.$subject->id.'">SCIENCE</button>';
				echo form_close();
			}
			else {
				echo form_open('subjectController/general_knowledge');
				echo '<button class="btn btn-2 btn-4 btn-6" type="submit" name="id" value="'.$subject->id.'">GENERAL KNOWLEDGE</button>';
				echo form_close();
			}
		}*/
	?>
        </div>
        <img src="<?php echo base_url();?>images/kdis.jpg" class="image image-2">
      </div>
    </div>

</body>
</html>-->