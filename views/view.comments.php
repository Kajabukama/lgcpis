<div class="ui comments" style="max-height: 230px;">
  <?php
      if (count($comments) == 0) {
          echo "<div class='ui info icon message'><i class='comment outline icon'></i><div class='content'><div class='header'>No Comments Yet!</div><p>Sorry, there are currently no comments for this thread!</p></div></div>";
      }
      foreach($comments as $key => $value):
      $commenter = User::findById($value->user_id);
      $cid = encryptor('encrypt',$value->id);
      

  ?>
  <div class="comment">
    <a class="avatar">
      <img src="../images/avatar/<?php echo $commenter->avatar; ?>">
    </a>
    <div class="content">
      <a class="author"><?php echo $commenter->fullName(); ?> - </a>
      <?php echo timeAgo(time(),$value->created);  ?>
      <div class="text"><?php echo $value->comment; ?> </div>
      <div class="actions">
        <a class="reply" href="comment-like?userid=<?php echo $userid; ?>&cid=<?php echo $cid; ?>&tid=<?php echo encryptor('encrypt',$topic->id); ?>&action=like-comment">
            <i class="ui teal heart outline icon"></i>Likes - <?php echo LikeComment::countLikeByComment($value->id); ?></a>
      </div>
    </div>
  </div>
<?php endforeach; ?>
</div>