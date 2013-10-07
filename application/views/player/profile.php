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
    <link href="<?php echo base_url();?>css/profile.css" media="screen" rel="stylesheet" type="text/css" />
    <title>Copy of questions</title>
  </head>
  <body>
    <div id="page-wrapper">
      <div id="absolute-wrapper">
        <div class="rectangle rectangle-1 rectangle-2 rectangle-4">
          <div class="rectangle rectangle-5">
            <table class="table">
              <thead>
                <tr></tr>
              </thead>
              <tbody>
                <tr>
                  <td class="td-1 td-2 td-3">Username:</td>
                  <td class="td-2"><?php echo $query[0]['username']; ?></td>
                  <td class="td-2 td-3"><?php echo anchor('playerController/editUsername', 'Edit'); ?></td>
                </tr>
                <tr>
                  <td class="td-1 td-3 td-4">Password:</td>
                  <td class="td-4"><?php echo $query[0]['password']; ?></td>
                  <td class="td-3 td-4"><?php echo anchor('playerController/editPassword', 'Edit'); ?></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="rectangle rectangle-1 rectangle-2 rectangle-6">
            <h1 class="heading"><?php echo $query[0]['username']; ?>'s Profile</h1>
          </div>
          <div class="rectangle rectangle-1 rectangle-2 rectangle-7">
            <?php echo form_open('playerController/deleteAccount'); ?>
            <button class="btn btn-1">Delete Account</button>
            <?php echo form_close(); ?>
            <?php echo form_open('playerController/chart'); ?>
            <button class="btn btn-2">View Game Statistics</button>
            <?php echo form_close(); ?>
          </div>
        </div>
        <div class="rectangle rectangle-2 rectangle-3 rectangle-8">
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
        <div class="rectangle rectangle-2 rectangle-3 rectangle-9">
          <div class="paragraph">
            <p>Copyright @</p>
          </div>
        </div>
      </div>
    </div>
  </body>

</html>