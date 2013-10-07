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
    <link href="<?php echo base_url();?>css/project.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>css/editPassword.css" media="screen" rel="stylesheet" type="text/css" />
    <!-- Typekit fonts require an account and a kit containing the fonts used. see https://typekit.com/plans for details. <script type="text/javascript" src="//use.typekit.net/YOUR_KIT_ID.js"></script>
  <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
-->
    <title>Copy of questions</title>
  </head>
  
  <body>
    <div id="page-wrapper">
      <div id="absolute-wrapper">
        <div class="rectangle rectangle-1 rectangle-2 rectangle-4">
          <div class="rectangle rectangle-5">
            <?php echo form_open('playerController/updatePassword');
              foreach($query->result() as $player)
              {
                  echo '<tr><td><input type="hidden" name="id" value="'.$player->id.'"></td></tr>'; ?>
            <div class="paragraph paragraph-1 paragraph-2 paragraph-3">
              <p>Password</p>
            </div>
            <input class="textinput textinput-1" type="text" name="password">
            <div class="paragraph paragraph-1 paragraph-4">
              <p>Password</p>
            </div>
            <div class="paragraph paragraph-1 paragraph-2 paragraph-5">
              <p>Password</p>
            </div>
            <input class="textinput textinput-2" type="text" name="passconf">
            <div class="paragraph paragraph-6">
              <p>Confirm Password</p>
            </div>
            <button class="btn btn-1">Edit</button>
            <?php echo form_close(); }?>
            <?php echo form_open('playerController/player_profile'); ?>
            <button class="btn btn-2">Cancel</button>
            <?php echo form_close(); ?>
          </div>
          <div class="rectangle rectangle-1 rectangle-2">
            <h1 class="heading">Edit Password</h1>
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
                  <span class="icon-bar"></span>
                </a>
                <div class="nav-collapse collapse">
                  <ul class="nav">
                    <li>
                      <?php echo anchor('mainmenuController', "Home"); ?>
                    </li>
                    <li>
                      <?php echo anchor('playerController/player_profile', $username."'s Profile"); ?>
                    </li>
                    <li>
                      <?php echo anchor('playerController/logout', 'Logout'); ?>
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