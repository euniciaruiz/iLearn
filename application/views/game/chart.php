<!DOCTYPE html>
<?php
  session_start();
  $username = $this->session->userdata('username');
  $is_logged_in = $this->session->userdata('is_logged_in');
?>
<html>
  <head>
    <title>Dynamic Graphs with JQuery and FusionCharts</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Limelight|Flamenco|Federo|Yesteryear|Josefin Sans|Spinnaker|Sansita One|Handlee|Droid Sans|Oswald:400,300,700" media="screen" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.css" type="text/css" media="screen" charset="utf-8" />
    <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-responsive.css" type="text/css" media="screen" charset="utf-8" />
    <link rel="stylesheet" href="<?php echo base_url();?>css/common.css" type="text/css" media="screen" charset="utf-8" />
    <link rel="stylesheet" href="<?php echo base_url();?>css/fontawesome.css" type="text/css" media="screen" charset="utf-8" />
    <link rel="stylesheet" href="<?php echo base_url();?>css/chart.css" type="text/css" media="screen" charset="utf-8" />
    <link rel="stylesheet" href="<?php echo base_url();?>css/jquery-ui.css" />
    <script language="JavaScript" src="<?php echo base_url();?>js/FusionCharts.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui.js"></script>
    <script language="JavaScript">
      function drawChart(chartSWF, strXML, chartdiv) {
      	//Create another instance of the chart.
      	var chart = new FusionCharts(chartSWF, "chart1Id", "400", "300", "0", "0"); 
      	chart.setDataXML(strXML);
      	chart.render(chartdiv);
      }
      function updateChart() {
      	$.get('/ilearn/index.php/playerController/game_statistics/'+$('#date').val(), function(data) {
      		drawChart("<?php echo base_url();?>Charts/FCF_Column3D.swf", data,"chart1div");
      	});
      }
      $(document).ready(function(){
       	$('#date').datepicker({ dateFormat: 'yy-mm-dd' }).val();
       	$("#changeDate").click(function( event ) {
      		  updateChart();
      	});
      });
    </script>
  </head>
 <body>
    <div id="page-wrapper">
      <div id="absolute-wrapper">
        <div class="rectangle rectangle-1 rectangle-2 rectangle-4">
          <div class="rectangle rectangle-5">
            <div class="paragraph">
              <p>Choose a&nbsp;date to view your game statistics.</p>
            </div>
            <input class="textinput" type="text" id="date" name="date" placeholder="Choose Date">
            <button class="btn btn-primary" id="changeDate" name="changeDate">View Chart</button>
          </div>
          <div class="rectangle rectangle-6">
            <div id="chart1div">This message will be replaced by the chart.</div>
          </div>
          <div class="rectangle rectangle-1 rectangle-2">
            <h1 class="heading">Game Statistics</h1>
          </div>
        </div>
        <div class="rectangle rectangle-2 rectangle-3 rectangle-7">
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
                      <?php echo anchor('mainmenuController', 'Home'); ?>
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
        <div class="rectangle rectangle-2 rectangle-3 rectangle-8">
          <div class="paragraph">
            <p>Copyright @</p>
          </div>
        </div>
      </div>
    </div>
  </body>

</html>