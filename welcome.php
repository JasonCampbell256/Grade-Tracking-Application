    <?php 
			session_start();
			require('config.php');
			require('functions.php');
			
			if (!auth($_SESSION['uname'])) {
				notAuth();
			} else {
				
			$firstName = firstName();

			?>				
			Welcome <?php echo $firstName; ?>.<br />
			
			<a href="viewclass.php">View your classes</a><br />
			
			
			<p>
			<a href="admin.php">Admin Control Panel</a><br />
			
			
			
			
			<?php 
			}

		?>
