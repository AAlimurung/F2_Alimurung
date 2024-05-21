<header class="header">
	<div class="header-inner">
		<img src="images/logo-1.png">
	</div>
	<div class="header-inner navs">
		<a href="index.php">
			<span class="nav-item">Home</span>
		</a>
		<a href="your-events.php">
			<span class="nav-item">Events</span>
		</a>
		<?php
			if (!isset($_SESSION['username'])){
				echo '
				<a href="register.php">
					<span class="nav-item">Sign-Up</span>
				</a>
				<a href="logout.php">
					<span class="nav-item">Logout</span>
				</a>
				';
			} else {
				echo '
				<a href="profile.php">
					<span class="nav-item">Profile</span>
				</a>
				<a href="logout.php">
					<span class="nav-item">Logout</span>
				</a>
				';
			}
		?>
	</div>
</header>

<hr class="under-header">