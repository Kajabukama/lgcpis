<?php
    require_once '../core/config.php';

    if(isset($_GET['tid']) && isset($_GET['cid']) && isset($_GET['action']) && isset($_GET['userid'])){

        $action = $_GET['action'];
        $cid = $_GET['cid'];
        $tid = $_GET['tid'];
        $userid = $_GET['userid'];

        $clean = encryptor('decrypt',$userid);
        $c_cid = encryptor('decrypt',$cid);

        $user = User::findById($clean);
        $get_comment = Comment::findById($c_cid);

        $like = new LikeComment();

        if($action == 'like-comment'){

           if(!LikeComment::findLikeByUser($clean, $c_cid)){
                $like->id = randomToken(5);
                $like->user_id = $clean;
                $like->comment_id = $c_cid;
                $like->likes = LikeComment::countLikeComment() + 1;

                if($like->create()){
                    logAction('Like Comment',$user->username." likes comment with id : {$c_cid}");
                    Redirect::to('view-topic?userid='.$userid.'&tid='.$tid.'&view=view-topic');
                }
           }
        }

        Redirect::to('forum?userid='.$userid.'&view=forum');

    }
        


?>