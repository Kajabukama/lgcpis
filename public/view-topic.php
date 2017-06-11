<?php require_once "../core/config.php"; ?>
<?php

    if (!Session::exists('userid')) {
        Redirect::to('../index.php');
    }else{
        // get userid from session
        $userid = Session::get('userid');
        $toid = $_GET['tid'];
        // descrypt userid in session from database querying
        $cleanid = encryptor('decrypt',$userid);
        $tid = encryptor('decrypt',$toid);

        $user = User::findById($cleanid);
        $topic = Forum::findById($tid);
        
        $mails_to = Message::toUserMessage($cleanid);

        // grab view
        require_once '../views/view.utility.php';

        $author = User::findById($topic->user_id);
        $mid = encryptor('encrypt',$author->id);

        $comments = Comment::findCommentByTopic($topic->id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $new_comment = new Comment();
            $comment = $_POST['comment'];

            // echo "<script>alert('some dat asent');</script>";
            if (!empty($comment)) {

              $new_comment->id = randomToken(6);
              $new_comment->user_id = $cleanid; 
              $new_comment->topic_id = $tid;
              $new_comment->comment = $comment;
              $new_comment->created = time();

              if ($new_comment->create()) {
                $url = "view-topic?userid=".$userid."&tid=".$toid."&view=view-topic";
                Redirect::to($url);
              }
            }
        }
    }
?>
<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="description" content="Local Government Citizen Participation Information System">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
      <title>LoGov : CiPaIS</title>
      <link rel="shortcut icon" href="../images/favicon.png">
      <link rel="stylesheet" href="../css/material-design-iconic-font.css">
      <link rel="stylesheet" href="../css/semantic.css">
      <link rel="stylesheet" href="../css/customscrollbar.min.css">
      <link rel="stylesheet" href="../css/styles.css">
   </head>
   <body>
        
        <?php  require_once '../views/menu.php'; ?>

        <div class="ui grid two column centered stackable container fluid">
            <div class="four wide column">
                <?php require_once '../views/menu_public.php' ?>
            </div>
            <div class="twelve wide column">
                <div class="ui grid two column">
                  <div class="thirteen wide column">
                    <div class="ui segment">
                       <h4 style="margin-bottom: 2px;"><?php echo $topic->topic_name; ?></h4>
                       <span>Member : <a href="view-member?userid=<?php echo $userid; ?>&mid=<?php echo $mid; ?>&view=welcome"><?php echo $author->fullName(); ?></a></span>
                          <span class="ui pull-right">Post created: <?php echo timeAgo($now, $topic->created); ?></span>
                    </div>
                    <div class="ui segment ">
                          <?php require_once '../views/view.topic.php'; ?>
                      </div>
                      <div class="ui segment m-top">
                          <?php require_once '../views/view.comments.php'; ?>
                        </div>
                  </div>
                  <div class="three wide column">
                    <?php require_once '../views/view.topic.sidebar.php'; ?>
                  </div>
                </div>
            </div>

        </div>
      <script src="../js/jquery-3.2.0.min.js"></script>
      <script src="../js/semantic.min.js"></script>
      <script src="../js/customscrollbar.min.js"></script>
      <script src="../js/common.js"></script>
      <!-- <script src="../js/process.message.js"></script> -->
      <!-- <script src="../js/process.topic.js"></script> -->
      <script src="../js/delete.forum.js"></script>
      <script src="../js/custom-scroller.js"></script>
   </body>
</html>