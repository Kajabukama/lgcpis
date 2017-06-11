<div class="column">
   <div class="ui segments">
      <div class="ui segment" style="padding: 5px;">
         <a class="ui image fluid">
            <img src="../images/avatar/<?php echo $author->avatar; ?>">
         </a>
      </div>
      
      <div class="ui teal segment" style="padding: 0px;">
         <div class="ui divided selection list">
           <a class="item">
             Views
             <div class="ui red horizontal label right floated">
               <?php echo Comment::countCommentByTopic($tid); ?>
             </div>
           </a>
           <a class="item">
            Comments
             <div class="ui purple horizontal label right floated">
                  <?php echo Comment::countCommentByTopic($tid); ?>
             </div>
             
           </a>
           <a class="item">
            Posts
             <div class="ui red horizontal label right floated">
               <?php echo Forum::countTopicByAuthor($author->id); ?>
             </div>
           </a>
           <a class="item">
            Likes
             <div class="ui horizontal label right floated">
               <?php echo Like::countLikesByTopic($tid); ?>
             </div>
           </a>
         </div>
      </div>
   </div>
</div>