<div>	
		<?php 
			foreach($users->result() as $user) {
				echo anchor('mainmenuController', $user->username).'<br/>';
			}
			
		?>
</div>	