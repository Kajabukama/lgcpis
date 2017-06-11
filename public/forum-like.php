<?php
    require_once '../core/config.php';

    if(isset($_GET['forum_id']) && isset($_GET['action']) && isset($_GET['userid'])){

        $action = $_GET['action'];
        $fid = $_GET['forum_id'];
        $userid = $_GET['userid'];

        $clean = encryptor('decrypt',$userid);

        $user = User::findById($clean);
        $get_forum = Forum::findById($fid);

        $like = new Like();

        if($action == 'like-forum'){

           if(!Like::findLikeByUser($clean, $fid)){
                $like->id = randomToken(5);
                $like->user_id = $clean;
                $like->topic_id = $fid;
                $like->likes = Like::countLikes() + 1;

                if($like->create()){
                    logAction('Like Forum',$user->username." likes forum topic with id : {$fid}");
                    Redirect::to('forum?userid='.$userid.'&view=forum');
                }
           }
        }

        Redirect::to('forum?userid='.$userid.'&view=forum');

    }
        


?>