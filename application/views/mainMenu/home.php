<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8" />
		<title>Main Menu</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/default.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/component.css" />
		<script src="<?php echo base_url();?>js/modernizr.custom.js"></script>
		
	</head>
	
	<body bgcolor="black">
		<div class="md-modal md-effect-3" id="modal-3">
			<div class="md-content">
				<h3>How to Play</h3>
				<div>
					<ul>
						<li><strong>1.</strong> After pressing the 'Start' button in the main menu, choose a subject you like.</li>
						<li><strong>2.</strong> A question related to the subject you chose will be displayed.</li>
						<li><strong>3.</strong> You must answer the question correctly to move on to the next question.</li>
					</ul>
					<button class="md-close">Close me!</button>
				</div>
			</div>
		</div>
		<div class="md-modal md-effect-4" id="modal-4">
			<div class="md-content">
				<h3>Create User</h3>
				<div>
				<?php echo form_open('mainmenuController/create');?>
					<ul>
						<p>
							<label for="content">Name:</label>
							<input type="text" name="name" />
						</p>
					</ul>
					
					<input type="submit" value="Create!" />
				<?php echo form_close(); ?>
				</div>
			</div>
		</div>
		<div class="md-modal md-effect-1" id="modal-1">
			<div class="md-content">
				<h3>Select User</h3>
				<div>
					<ul>
						<?php foreach($query->result() as $player) {
							if ($player->id > 0) {
								echo $player->name;
								echo "<br/><br/>";
							}
							else {
								echo "no players found";
							}
						}?>
					</ul>
					<button class="md-close">Close me!</button>
				</div>
			</div>
		</div>
		<div class="container">
			<header>
				<h1>iLearn<span>Interactive Learning Game</span></h1>
				<h3><span><?php foreach($query->result() as $player) {
					if ($player->id > 0) {
						echo "Welcome back ";
						echo $player->name;
						echo "!";
						break;
					}
					else {
						echo "No Players Found";
					}
					}?>
				<button class="md-trigger" data-modal="modal-1">Change User</button>
				<button class="md-trigger" data-modal="modal-4">Create User</button>
			</header>
			<div class="main clearfix">
				<div class="column">
					<button class="md-trigger" data-modal="modal-3">Help</button>
				</div>
				<div class="column">
					<?php echo anchor('subjectController/play', 'Start');?><br>
				</div>
			</div>
		</div>
		
		<div class="md-overlay"></div>
		<script src="<?php echo base_url();?>js/classie.js"></script>
		<script src="<?php echo base_url();?>js/modalEffects.js"></script>
		<script>
			// this is important for IEs
			var polyfilter_scriptpath = '/js/';
		</script>
		<script src="<?php echo base_url();?>js/cssParser.js"></script>
		<script src="<?php echo base_url();?>js/css-filters-polyfill.js"></script>
	</body>

</html>