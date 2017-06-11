<div class="ui pointing secondary menu">
    <a class="item active" data-tab="forum">
    <i class="ui teal talk outline icon"></i> My Threads</a>
    <a class="item" data-tab="messages">
    <i class="ui teal mail icon"></i> Messages</a>
    <a class="item" data-tab="announce">
    <i class="ui teal announcement icon"></i> Announcement</a>
</div>
<!-- forum tab -->
<div class="ui tab active forum" data-tab="forum">
    <div class="ui comments">
        <?php
            if (count($forums) == 0) {
                echo "<div class='ui info icon message'><i class='inbox icon'></i><div class='content'><div class='header'>No threads yet!</div><p>Sorry, you currently do not have any threads posted.</p></div></div>";
            }
            foreach ($forums as $key => $value):
            $user_forum = User::findById($value->user_id);
            $mid = encryptor('encrypt',$user_forum->id);
            Session::set('mid',$mid); 
        ?>
      <div class="padded comment">
        <a class="avatar"><img src="../images/avatar/<?php echo $user->avatar; ?>"></a>
        <div class="content">
          <div class="summary">
            <a class="ui teal author summary"><?php echo $value->topic_name; ?> </a>
            <span class="time-ago">Posted
            <?php echo timeAgo($now, $value->created); ?></span><br/>
             <a href="view-member?userid=<?php echo $userid; ?>&mid=<?php echo $mid; ?>&view=welcome"><?php echo $user_forum->fullName(); ?></a>
          </div>
          <div class="text"><?php echo $value->description; ?></div>
          <div class="actions">
             <!--<a class="reply"><i class="ui teal edit icon"></i>Edit</a> -->
             <a class="hide" href="forum-delete?userid=<?php echo $userid; ?>&forum_id=<?php echo $value->id; ?>&action=delete-forum&view=welcome">
                 <i class="ui teal trash outline icon"></i>Delete
            </a>
            <?php

                    $visible = $value->visible;
                    if($visible == 0){
                        echo "<a class='reply' href='forum-hide?userid=$userid&forum_id=$value->id&action=show-forum'><i class='ui teal hide icon'></i>Show</a>";
                    }else{
                        echo "<a class='reply' href='forum-hide?userid=$userid&forum_id=$value->id&action=hide-forum'><i class='ui teal hide icon'></i>Hide</a>";
                    }

            ?>  
            <!--<a class="reply"><i class="ui teal hide icon"></i>Hide</a>-->
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
</div>

<!-- activities tab -->
<div class="ui tab" data-tab="messages">
    <div class="ui comments">
        <?php
            if (count($mails_to) == 0) {
                echo "<div class='ui info icon message'><i class='inbox icon'></i><div class='content'><div class='header'>Empty Inbox</div><p>Sorry, you currently do not have any Messages</p></div></div>";
            }
            foreach ($mails_to as $key => $value):
            $from_user = User::findById($value->from_user); 
        ?>
      <div class="comment">
        <a class="avatar"><img src="../images/avatar/<?php echo $from_user->avatar; ?>"></a>
        <div class="content">
          <div class="summary">
            <a class="ui teal author summary"><?php echo $value->subject; ?> </a> - 
            <span class="time-ago">From <?php echo $from_user->fullName(); ?></span>
          </div>
          <div class="text"><?php echo $value->message; ?></div>
          <div class="actions">
            <!-- <a class="reply"><i class="ui teal reply icon"></i>Reply</a> -->
            <a class="reply" href="reply-message?userid=<?php echo $userid; ?>&mid=<?php echo $value->id; ?>&from=<?php echo encryptor('encrypt',$value->from_user); ?>&action=reply-message&view=welcome">
            <i class="ui teal reply outline icon"></i>Reply</a>
            <!-- <a class="hide"><i class="ui teal delete icon"></i>Delete</a> -->
            <a class="reply" href="message-delete?userid=<?php echo $userid; ?>&mid=<?php echo $value->id; ?>&action=delete-message&view=welcome">
            <i class="ui teal trash outline icon"></i>Delete</a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

</div>

<!-- announcement tab -->
<!-- announcement tab -->
<div class="ui tab announce" data-tab="announce">
    <div class="ui comments">
        <?php
            if (count($announcement) == 0) {
                echo "<div class='ui info icon message'><i class='inbox icon'></i><div class='content'><div class='header'>No Threads yet!</div><p>Sorry, there are currently no threads available</p></div></div>";
            }
            foreach ($announcement as $key => $value):
            $user_forum = User::findById($value->user_id); 
        ?>
      <div class="padded comment">
        <a class="avatar">
            <img src="../images/avatar/<?php echo $user_forum->avatar; ?>">
        </a>
        <div class="content">
          <div class="summary">
            <a class="ui teal author summary"><?php echo $value->title; ?> </a> - 
            <span class="time-ago">Posted
            <?php echo timeAgo($now, $value->created); ?></span>
          </div>
          <div class="text"><?php echo $value->announcement; ?></div>
          
        </div>
      </div>
      <?php endforeach; ?>
    </div>
</div>