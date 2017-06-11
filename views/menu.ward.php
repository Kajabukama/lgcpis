<div class="ui top fixed teal stackable inverted pointing menu" style="margin-bottom: 2em; border:none;">
		<div class="ui container">
			<?php
				if(Session::exists('userid')){
					// echo "<a class='item'><img src='../images/logo.png'></a>";
					echo "<a href='welcome?userid={$userid}&view=welcome' class='{$welcome} item'><i class='home icon'></i> Dashboard</a>";
					echo "<a href='view-citizens?userid={$userid}&view=view-citizens' class='{$view_officers} item'><i class='users icon'></i> Citizens</a>";

					echo "<a href='view-topics?userid={$userid}&view=topics' class='{$topics} item'><i class='users icon'></i> Topics</a>";

					echo "<div class='right menu'>";
					echo "<a href='profile?userid={$userid}&view=profile' class='{$profile} item'><img    src='../images/avatar/{$user->avatar}' class='ui avatar image'> Welcome, {$user->username} </a>";
					echo "<a class='item' href='../logout.php?action=logout'><i class='lock icon'></i> Signout</a> ";
					echo "</div>";
				}else{
					// echo "<a class='item'><img src='./images/logo.png'></a>";
					echo "<a class='item'><i class='home icon'></i> Home</a>";
					echo "<a class='item'><i class='talk icon'></i> Forum</a>";
					echo "<div class='right menu'>";
					echo "<a class='item active'><img src='./images/default.png' class='ui avatar image'> Citizen Registration</a>";
					echo "<a class='item' href='index.php'><i class='unlock icon'></i> Signin</a>";
					echo "</div>";
				}
				
			?>
			
		</div>
	<img src="" alt="">
			
</div>