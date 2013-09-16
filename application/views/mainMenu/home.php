<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8" />
		<title>Main Menu</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/default.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/component.css" />
		<script src="<?php echo base_url();?>js/modernizr.custom.js"></script>
		
	</head>
	
	<body>
		<div class="md-modal md-effect-2" id="modal-2">
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
							<?php echo form_error('name'); ?>
							<label for="content">Name:</label>
							<input style="float:right;clear:right" type="text" name="name" value="<?php echo set_value('name'); ?>" /></br>
							<label for="content">Password:</label>
							<input style="float:right;clear:right" type="password" name="password" value="<?php echo set_value('password'); ?>" /></br>
							<label for="content">Confirm Password:</label>
							<input style="float:right;clear:right" type="password" name="passconf" value="<?php echo set_value('passconf'); ?>" />
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
						?>
								<a href="<?php echo base_url() ?>index.php/mainmenuController/display_player/<?php echo $player->id ?>"><?php echo $player->name; ?></a>
						<?php	
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
				<div class="column" align="right">
					<button class="md-trigger" data-modal="modal-2">Help</button>
				</div>
				<div class="column">
					<?php echo anchor('subjectController/play', '<big><big><big><big>Start</big></big></big></big>');?><br>
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