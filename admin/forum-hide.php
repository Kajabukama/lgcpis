<?php
    require_once '../core/config.php';

    if(isset($_GET['forum_id']) && isset($_GET['action']) && isset($_GET['userid'])){

        $action = $_GET['action'];
        $fid = $_GET['forum_id'];
        $userid = $_GET['userid'];

        $clean = encryptor('decrypt',$userid);

        $user = User::findById($clean);
        $get_forum = Forum::findById($fid);
        $forum = new Forum();

        if($action == 'hide-forum'){

            $forum->id = $fid;
            $forum->user_id = $get_forum->user_id;
            $forum->description = $get_forum->description;
            $forum->created = $get_forum->created;
            $forum->region_name = $get_forum->region_name;
            $forum->topic_name = $get_forum->topic_name;
            $forum->created = $get_forum->created;
            $forum->visible = 0;


            if($forum->update()){
                logAction('Hide Forum',$user->username." has disabled forum with id : {$fid}");
                Redirect::to('welcome?userid='.$userid.'&view=welcome');
            }

        }else{

            $forum->id = $fid;
            $forum->user_id = $get_forum->user_id;
            $forum->description = $get_forum->description;
            $forum->created = $get_forum->created;
            $forum->region_name = $get_forum->region_name;
            $forum->topic_name = $get_forum->topic_name;
            $forum->created = $get_forum->created;
            $forum->visible = 1;


            if($forum->update()){
                logAction('Show Forum',$user->username." has enabled forum with id : {$fid}");
                Redirect::to('welcome?userid='.$userid.'&view=welcome');
            }
        }

    }
        


?>