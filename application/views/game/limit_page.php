<!DOCTYPE HTML>
<html lang="en">
  
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Limelight|Flamenco|Federo|Yesteryear|Josefin Sans|Spinnaker|Sansita One|Handlee|Droid Sans|Oswald:400,300,700" media="screen" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Limelight|Flamenco|Federo|Yesteryear|Josefin Sans|Spinnaker|Sansita One|Handlee|Droid Sans|Oswald:400,300,700" media="screen" rel="stylesheet" type="text/css" />
    <link href="stylesheets/bootstrap.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="stylesheets/bootstrap-responsive.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="stylesheets/common.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="stylesheets/fontawesome.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="stylesheets/project.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="stylesheets/congratulations.css" media="screen" rel="stylesheet" type="text/css" />
    <!-- Typekit fonts require an account and a kit containing the fonts used. see https://typekit.com/plans for details. <script type="text/javascript" src="//use.typekit.net/YOUR_KIT_ID.js"></script>
  <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
-->
    <title>Congratulations! </title>
  </head>
  
  <body>
    <div id="page-wrapper">
      <div id="absolute-wrapper">
		<?php echo form_open('mainmenuController/home');?>
	   <center><img width="400" height="300" src="<?php echo base_url();?>images/congratulations.jpg" class="image">
        <h1 class="dom-heading">Aye sir! We did it! Fish for you!&nbsp;</h1>
        <button class="btn"><strong>Main Menu</strong></center>
        </button>
		<?php echo form_close();?>
      </div>
    </div>
  </body>

</html>