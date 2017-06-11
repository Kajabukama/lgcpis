<div class="ui divided selection list">
	<a class="item">
		<div class="ui red horizontal label"><?php echo Comment::countComments();?></div>
		Comments
	</a>
	<a class="item">
		<div class="ui purple horizontal label"><?php echo Forum::countForums();?></div>
		Posts
	</a>
	<a class="item">
		<div class="ui red horizontal label"><?php echo Citizen::countCitizen(); ?></div>
		Citizen
	</a>
	<a class="item">
		<div class="ui horizontal label"><?php echo Officer::countOfficers(); ?></div>
		Ward Officers
	</a>
</div>