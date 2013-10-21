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
    <link href="<?php echo base_url();?>css/chart.css" media="screen" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url();?>css/jquery-ui.css" />
    <script language="JavaScript" src="<?php echo base_url();?>js/FusionCharts.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui.js"></script>
    <title>Game Statistics</title>
    <script language="JavaScript">
    $(document).ready(function(){      
      $('#date').datepicker({ dateFormat: 'yy-mm-dd' }).val();

      $( "#from" ).datepicker({
        dateFormat: 'yy-mm-dd',
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 3,
        onClose: function( selectedDate ) {
          $( "#to" ).datepicker( "option", "minDate", selectedDate );
        }
      });
      $( "#to" ).datepicker({
        dateFormat: 'yy-mm-dd',
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 3,
        onClose: function( selectedDate ) {
          $( "#from" ).datepicker( "option", "maxDate", selectedDate );
        }
      });
    });
    </script>
  </head>
  <body>
    <div id="page-wrapper">
      <div id="absolute-wrapper">
        <div class="rectangle rectangle-1 rectangle-2 rectangle-3 rectangle-7">
          <div class="rectangle rectangle-3 rectangle-4 rectangle-8">
          	<?php echo form_open('playerController/gameStatisticsDay'); ?>
            <div class="rectangle rectangle-5 rectangle-9">
              <div class="paragraph paragraph-1">
                <p>Select a date</p>
              </div>
              <button class="btn btn-primary">View Chart</button>
              <input class="textinput" type="text" placeholder="Current Date" id="date" name="date" value="<?php echo $currentDate; ?>">
            </div>
            <?php echo form_close(); ?>
            <?php echo form_open('playerController/gameStatisticsMonth'); ?>
            <div class="rectangle rectangle-5 rectangle-10">
              <div class="paragraph paragraph-1">
                <p>Select Month &amp; Year</p>
              </div>
              <button class="btn btn-primary">View Chart</button>
              <select name="year" id="year" class="select-1">
                <?php
                  $i = 2013;
                  while ($i <= 2020) {
                    echo '<option value="'.$i.'">'.$i.'</option>';
                    $i++;
                  }
                ?>
              </select>
              <select name="month" id="month" class="select-2">
                <option value="01">January</option>
                <option value="02">February</option>
                <option value="03">March</option>
                <option value="04">April</option>
                <option value="05">May</option>
                <option value="06">June</option>
                <option value="07">July</option>
                <option value="08">August</option>
                <option value="09">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
              </select>
            </div>
            <?php echo form_close(); ?>
            <div class="paragraph paragraph-4">
              <p>Choose how you want your chart&nbsp;to be shown to you according to the date that you'll specify</p>
            </div>
            <?php echo form_open('playerController/gameStatisticsRange'); ?>
            <div class="rectangle rectangle-5 rectangle-11">
              <div class="paragraph paragraph-2 paragraph-5">
                <p>Select a Date Range</p>
              </div>
              <button class="btn btn-primary">View Chart</button>
              <input class="textinput textinput-1" type="text" placeholder="To" id="to" name="to">
              <input class="textinput textinput-2" type="text" placeholder="From" id="from" name="from">
              <div class="paragraph paragraph-3 paragraph-6">
                <p>to</p>
              </div>
              <div class="paragraph paragraph-2 paragraph-3">
                <p>From</p>
              </div>
            </div>
            <?php echo form_close(); ?>
          </div>
          <div class="rectangle rectangle-1 rectangle-2 rectangle-3 rectangle-12"></div>
          <div class="rectangle rectangle-1 rectangle-2 rectangle-3 rectangle-13">
            <div class="paragraph">
              <p>Game Statistics</p>
            </div>
          </div>
          <div class="rectangle rectangle-3 rectangle-4 rectangle-14">
            <div><?php $chart->renderChart();?></div>
          </div>
        </div>
        <div class="rectangle rectangle-2 rectangle-3 rectangle-6 rectangle-15">
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
        <div class="rectangle rectangle-2 rectangle-3 rectangle-6 rectangle-16">
          <div class="paragraph">
            <p>Copyright @</p>
          </div>
        </div>
      </div>
    </div>
  </body>

</html>