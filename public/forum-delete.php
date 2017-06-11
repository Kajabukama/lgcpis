<?php
    require_once '../core/config.php';

    if(isset($_GET['forum_id']) && isset($_GET['action']) && isset($_GET['userid'])){

        $action = $_GET['action'];
        $fid = $_GET['forum_id'];
        $userid = $_GET['userid'];

        $clean = encryptor('decrypt',$userid);
        $user = User::findById($clean);

        if($action == 'delete-forum'){

            $forum = new Forum();
            $forum->id = $fid;

            if($forum->delete()){
                logAction('Delete',$user->username." has deleted forum with id : {$fid}");
                Redirect::to('welcome?userid='.$userid.'&view=welcome');
            }

        }

    }
        


?>