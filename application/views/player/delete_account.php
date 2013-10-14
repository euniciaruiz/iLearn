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
    <link href="<?php echo base_url();?>css/deleteAccount.css" media="screen" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url();?>css/jquery-ui.css" />
    <script src="<?php echo base_url();?>js/jquery-1.9.1.js"></script>
    <script src="<?php echo base_url();?>js/jquery-ui.js"></script>
    <title>Copy of questions</title>
  </head>
  <body>
    <div id="page-wrapper">
      <div id="absolute-wrapper">
        <div class="rectangle rectangle-1 rectangle-2 rectangle-4">
          <div class="rectangle rectangle-5">
            <div class="paragraph">
              <p>Click the delete button if you want your account here in iLearn to be deleted. If you do, future attempt on accessing the deleted&nbsp;account will be impossible.</p>
            </div>
            <button class="btn btn-1" id="delete">Delete</button>
            <?php echo form_open('playerController/player_profile'); ?>
            <button class="btn btn-2">Cancel</button>
            <?php echo form_close(); ?>
          </div>
          <div class="rectangle rectangle-1 rectangle-2">
            <h1 class="heading">Delete Account</h1>
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
                      <?php echo anchor('playerController/player_profile', 'Profile'); ?>
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
    <script>
      $( document ).ready(function() {
        $( "#delete" ).click(function(event) {
          $( "#dialog-confirm" ).dialog( "open" );
        });

        $( "#dialog-confirm" ).dialog({
          autoOpen: false,
          //resizable: true,
          height:150,
          width:400,
          modal: true,
          show: {
            effect: "blind",
            duration: 1000
          },
          hide: {
            effect: "explode",
            duration: 1000
          },
          buttons: {
            "Delete Account": function() {
              location.href='<?php echo base_url() ?>index.php/playerController/deletePlayer/<?php echo $query[0]['id']; ?>';
            },
            Cancel: function() {
              $( this ).dialog( "close" );
            }
          }
        });   
      });
    </script>
    <div id="dialog-confirm" title="Delete Confirmation">
      <p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>Are you sure?</p>
    </div>
  </body>

</html>