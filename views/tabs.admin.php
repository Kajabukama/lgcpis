<div class="ui pointing secondary menu">
    <a class="item active" data-tab="forum">
    <i class="ui teal talk outline icon"></i> Threads</a>
    <a class="item" data-tab="officer">
    <i class="ui teal user icon"></i> Officers</a>
    <a class="item" data-tab="announce">
    <i class="ui teal announcement icon"></i> Announcement</a>
    <a class="item" data-tab="inbox">
    <i class="ui teal mail icon"></i> Messages</a>
</div>

<!-- forum tab -->
<div class="ui tab active forum" data-tab="forum">
    <div class="ui comments">
        <?php
            if (count($forums) == 0) {
                echo "<div class='ui info icon message'><i class='inbox icon'></i><div class='content'><div class='header'>No Threads yet!</div><p>Sorry, there are currently no threads available</p></div></div>";
            }
            foreach ($forums as $key => $value):
            $user_forum = User::findById($value->user_id); 
        ?>
      <div class="padded comment">
        <a class="avatar">
            <img src="../images/avatar/<?php echo $user_forum->avatar; ?>">
        </a>
        <div class="content">
          <div class="summary">
            <a class="ui teal author summary"><?php echo $value->topic_name; ?> </a> - 
            <span class="time-ago">Posted
            <?php echo timeAgo($now, $value->created); ?></span>
          </div>
          <div class="text"><?php echo $value->description; ?></div>
          <div class="actions">
             <!--<a class="reply"><i class="ui teal edit icon"></i>Edit</a> -->
             <a data-inverted="" data-tooltip="Delete Topic" data-position="top center" class="hide" href="forum-delete?userid=<?php echo $userid; ?>&forum_id=<?php echo $value->id; ?>&action=delete-forum&view=welcome">
                 <i class="ui teal trash outline icon"></i>Delete
            </a>
            <?php

                    $visible = $value->visible;
                    if($visible == 0){
                        echo "<a data-inverted='' data-tooltip='Enable Public View' data-position='top center' class='reply' href='forum-hide?userid=$userid&forum_id=$value->id&action=show-forum'><i class='ui teal hide icon'></i>Show</a>";
                    }else{
                        echo "<a data-inverted='' data-tooltip='Disable Public View' data-position='top center' class='reply' href='forum-hide?userid=$userid&forum_id=$value->id&action=hide-forum'><i class='ui teal hide icon'></i>Hide</a>";
                    }

            ?>  
            <!--<a class="reply"><i class="ui teal hide icon"></i>Hide</a>-->
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
</div>

<!-- officers tab -->
<div class="ui tab " data-tab="officer">
    <?php 

        if (count($officers) == 0) {
            $message = "<div class='ui negative icon message'><i class='announcement icon'></i><div class='content'><div class='header'>Oops!</div><p>Sorry, there are currently no announcement made by your WEO</p></div></div>";
            echo $message;
        }else{


    ?>
    <table class="ui very basic compact table">
        <thead>
            <tr>
                <th>officer Name</th>
                <th>Ward</th>
                <th>Mobile</th>
                <th>Email</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
                }
                foreach ($officers as $key => $value): 
            ?>
            <tr>
                <td><?php echo $value->fullName(); ?></td>
                <td><?php echo $value->ward_name; ?></td>
                <td><?php echo $value->phone; ?></td>
                <td><?php echo $value->email; ?></td>
                <td>
                    <a href="view-officer?userid=<?php echo $userid; ?>&oid=<?php echo encryptor('encrypt',$value->id); ?>&view=view-officer" class="ui teal label">View</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

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

<!-- inbox tab -->
<div class="ui tab" data-tab="inbox">
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
            <a class="save">
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