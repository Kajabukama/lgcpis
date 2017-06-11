<div class="ui pointing secondary menu">
    <a class="item active" data-tab="messages">
    <i class="ui teal mail icon"></i> Messages</a>
</div>


<!-- activities tab -->
<div class="ui tab active" data-tab="messages">
    <div class="ui comments">
        <?php
            if (count($mails_to) == 0) {
                echo "<div class='ui info icon message'><i class='inbox icon'></i><div class='content'><div class='header'>Empty Inbox</div><p>Sorry, you currently do not have any Messages</p></div></div>";
            }
            foreach ($mails_to as $key => $value):
            $from_user = User::findById($value->from_user); 
        ?>
      <div class="comment">
        <a class="avatar"><img src="../images/avatar/<?php echo $user->avatar; ?>"></a>
        <div class="content">
          <div class="summary">
            <a class="ui teal author summary"><?php echo $value->subject; ?> </a> - 
            <span class="time-ago">From <?php echo $from_user->fullName(); ?></span>
          </div>
          <div class="text"><?php echo $value->message; ?></div>
          <div class="actions">
            <!-- <a class="reply"><i class="ui teal reply icon"></i>Reply</a> -->
            <a class="save">
            <i class="ui teal reply icon"></i>Reply</a>
            <!-- <a class="hide"><i class="ui teal delete icon"></i>Delete</a> -->
            <a class="reply" href="message-delete?userid=<?php echo $userid; ?>&mid=<?php echo $value->id; ?>&action=delete-message&view=welcome">
            <i class="ui teal trash outline icon"></i>Delete</a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

</div>

