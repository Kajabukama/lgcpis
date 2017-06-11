<div class="ui pointing secondary menu">
    <a class="item  active" data-tab="online">
    <i class="ui teal user icon"></i> Online <?php echo Online::countOnline(); ?></a>
</div>

<!-- activity tab -->
<div class="ui tab active" data-tab="online">
    <?php 
    		$online = Online::findAll();

    ?>
    <div class="list">
    	<?php
    		foreach($online as $key => $value):
    		$user_online = User::findById($value->user_id);
    		$mid = encryptor('encrypt',$value->user_id);
    	?>
    	<div class="ui list">
    		<a href="view-member?userid=<?php echo $userid; ?>&mid=<?php echo $mid;  ?>&view=welcome">
    			<img class="ui avatar image" src="../images/avatar/<?php echo $user_online->avatar; ?>">
			<span><?php echo $user_online->username; ?></span>
    		</a>
    	</div>
    	<?php endforeach; ?>
    </div>
</div>
