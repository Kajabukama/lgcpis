<?php
    require_once '../core/config.php';

    if(isset($_GET['mid']) && isset($_GET['action']) && isset($_GET['userid'])){

        $action = $_GET['action'];
        $mid = $_GET['mid'];
        $userid = $_GET['userid'];

        $clean = encryptor('decrypt',$userid);
        $user = User::findById($clean);

        if($action == 'delete-message'){

            $message = new Message();
            $message->id = $mid;

            if($message->delete()){
                logAction('Delete',$user->username." has deleted message with id : {$mid}");
                Redirect::to('welcome?userid='.$userid.'&view=welcome');
            }

        }

    }
        


?>