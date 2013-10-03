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
        <div class="hero-unit hero-unit-1">
          <h1 class="heading"></h1>
          <div class="btns"></div>
        </div>
        <div class="rectangle rectangle-1">
          <h1 class="heading">iLearn</h1>
          <div class="paragraph paragraph-1 paragraph-3 paragraph-7">
            <p>Login</p>
          </div>
          <div class="paragraph paragraph-1 paragraph-2 paragraph-4">
            <p>Signup</p>
          </div>
          <div class="paragraph paragraph-1 paragraph-2 paragraph-5">
            <p>Home</p>
          </div>
          <div class="paragraph paragraph-6">
            <p>Interactive Learning Game</p>
          </div>
        </div>
        <div class="paragraph paragraph-7 paragraph-8 div-1">
          <p>Choose a date to view your game statistics.</p>
        </div>
        <input class="textinput" type="text" placeholder="Placeholder" name="date" id="date">
        <button class="btn" id="changeDate" name="changeDate">View Chart</button>
        <div class="hero-unit hero-unit-2">
          <h1 class="heading"></h1>
          <div class="btns"></div>
        </div>
        <div class="div-1 div-2" id="chart1div"></div>
        <div class="rectangle rectangle-2"></div>
      </div>
    </div>
  </body>

</html>