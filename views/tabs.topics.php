<div class="ui pointing secondary menu transition fade">
    <a class="item active" data-tab="trending">
    <i class="ui teal user icon"></i> Trending</a>
</div>
<!-- trending tab -->
<div class="ui tab active" data-tab="trending">
   <div class="ui comments">
        <?php
            if (count($get_visible) == 0) {
                echo "<div class='ui info icon message'><i class='inbox icon'></i><div class='content'><div class='header'>No Threads Yet!</div><p>Sorry, there are currently no threads!</p></div></div>";
            }
            foreach ($get_visible as $key => $value):
            $user_forum = User::findById($value->user_id);
            $mid = encryptor('encrypt',$user_forum->id);
             
        ?>
      <div class="padded comment">
        <a class="avatar"><img src="../images/avatar/<?php echo $user_forum->avatar; ?>"></a>
        <div class="content">
          <div class="summary">
            <a href="view-topic?userid=<?php echo $userid; ?>&tid=<?php echo encryptor('encrypt',$value->id); ?>&view=view-topic" class="ui teal author summary"><?php echo $value->topic_name; ?> </a>
            <span class="time-ago">Posted
            <?php echo timeAgo($now, $value->created); ?></span><br/>
             <a href="view-member?userid=<?php echo $userid; ?>&mid=<?php echo $mid; ?>&view=welcome"><?php echo $user_forum->fullName(); ?></a>
          </div>
          <div class="text ellipsis">
            <span class="text-concat"><?php echo $value->description; ?></span>
          </div>
          <div class="actions">
             <!--<a class="reply"><i class="ui teal edit icon"></i>Edit</a> -->
             <a class="hide delete-forum">
                 <i class="ui teal talk outline icon"></i>Comments - <?php echo Comment::countCommentByTopic($value->id); ?>
            </a> 
            <a class="reply" href="forum-like?userid=<?php echo $userid; ?>&action=like-forum&forum_id=<?php echo $value->id; ?>">
            <i class="ui teal heart outline icon"></i>Likes - <?php echo Like::countLikeByTopic($value->id); ?></a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
</div>