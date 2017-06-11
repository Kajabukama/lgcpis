<div class="ui vertical menu fluid">
    <div class="ui item">
        <?php echo $user->fullName(); ?>
        <i class="zmdi zmdi-account-circle green zmdi-icon"></i>
    </div>
    <!-- <div class="item">
        <div class="ui input"><input type="text" placeholder="Search..."></div>
    </div> -->
    <div class="active item">
        Account Actions
        <div class="menu">
            <a href="change-password?userid<?php echo $userid; ?>&action=change-password&view=welcome" class="item" data-inverted="teal" data-tooltip="Change your account Password" data-position="right center"><i class="send icon"></i> Change Password</a>

            <a href="update-profile?userid=<?php echo $userid; ?>&action=update-profile&view=welcome" class="item"  data-inverted="teal" data-tooltip="You can Update your Profile Information" data-position="right center"><i class="edit icon"></i> Update Profile</a>

            <a href="suspend-account?userid=<?php echo $userid; ?>&action=suspend-account&view=welcome" class="item" data-inverted="teal" data-tooltip="Use this link to temporarily close your account" data-position="right center"><i class="trash icon"></i> Deactivate Account</a>
        </div>
    </div>
    <a class="item">
        <div class="ui red label"><?php echo Announcement::countAnnouncement();?></div>
        <i class="zmdi zmdi-notifications-active zmdi-icon"></i> Announcements
        
    </a>
    <div class="active item">
        <div class="ui red label"><?php echo Message::countMessageTo($cleanid); ?></div>
        <i class="zmdi zmdi-email zmdi-icon"></i> Message Information 
        
        <div class="menu">
            <a  class="item" data-inverted="teal" data-tooltip="Message Inbox" data-position="top center"> 
            Message Received - [ <?php echo Message::countMessageTo($cleanid); ?> ] </a>

            <a class="item"  data-inverted="teal" data-tooltip="Messages that you have sent" data-position="top center">
            Message Sent - [ <?php echo Message::countMessageFrom($cleanid); ?> ]
            
            </a>
        </div>
    </div>
</div>