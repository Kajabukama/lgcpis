<div class="ui pointing secondary menu transition fade">
    <a class="item active" data-tab="profile">
    <i class="ui teal user icon"></i> Profile</a>
</div>
<!-- profile tab -->
<div class="ui tab active profile" data-tab="profile">
    <div class="ui column container">
        <div class="column">
            <img class="ui centered tiny circular image" src="../images/avatar/<?php echo $user->avatar; ?>">
            <h4 class="ui center aligned header"><?php echo $user->fullName(); ?>
                <br/><small><?php echo $user->profileDate($user->created); ?></small>
            </h4>
             <!--<h4 class="ui horizontal divider header">Account</h4> -->
            <div class="ui segments borderless centered">
                <div class="ui segment"><p>Name : <?php echo $user->fullName(); ?></p></div>
                <div class="ui segment"><p>Login : <?php echo $user->username; ?></p></div>
                <div class="ui segment"><p>Email: <?php echo $user->username; ?></p></div>
                <div class="ui segment"><p>Mobile : <?php echo $user->phone; ?></p></div>
                <div class="ui segment"><p>User's Sex : <?php echo $user->sex; ?></p></div>
            </div>
        </div>
    </div>
</div>

<!-- settings tab -->
<!-- <div class="ui tab settings" data-tab="settings">
    <div class="eight wide column">
        
    </div>
</div> -->