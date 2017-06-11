<?php
    require_once '../core/config.php';

    $action = $_GET['action'];
    $officerid = $_GET['officerid'];
    $userid = $_GET['userid'];

    $c_uid = encryptor('decrypt',$userid);
    $c_oid = encryptor('decrypt',$officerid);

    $user = User::findById($c_uid);
  

    if($action == 'delete'){

        $officer = new Officer();
        $officer->id = $c_oid;
        $log = $user->fullName()." deleted officer account with id : ".$c_oid;

        if($officer->delete()){
            logAction('Delete Account',$log);
            Redirect::to('view-officers?userid='.$userid.'&view=view_officers');
        }

    }

    if ($action == 'suspend') {

        $suspend = new User();
        $new_user = User::findById($c_oid);

        $suspend->id = $new_user->id;
        $suspend->suspended = 1;
        $suspend->status = 0;
        $suspend->access = $new_user->access;
        $suspend->phone = $new_user->phone;
        $suspend->username = $new_user->username;
        $suspend->password = $new_user->password;
        $suspend->fname = $new_user->fname;
        $suspend->sname = $new_user->sname;
        $suspend->lname = $new_user->lname;
        $suspend->sex = $new_user->sex;
        $suspend->avatar = $new_user->avatar;
        $suspend->token = $new_user->token;
        $suspend->created = $new_user->created;

        if ($suspend->update()) {
            $log = $user->fullName()." suspended officer account with id : ".$c_oid;
            logAction('Suspend Account',$log);
            Redirect::to('view-officers?userid='.$userid.'&view=view_officers');
        }
    }

    if ($action == 'Activate') {

        $activate = new User();
        $new_user = User::findById($c_oid);

        $activate->id = $new_user->id;
        $activate->suspended = 0;
        $activate->status = 1;
        $activate->access = $new_user->access;
        $activate->phone = $new_user->phone;
        $activate->username = $new_user->username;
        $activate->password = $new_user->password;
        $activate->fname = $new_user->fname;
        $activate->sname = $new_user->sname;
        $activate->lname = $new_user->lname;
        $activate->sex = $new_user->sex;
        $activate->avatar = $new_user->avatar;
        $activate->token = $new_user->token;
        $activate->created = $new_user->created;

        if ($activate->update()) {
            $log = $user->fullName()." activated officer account with id : ".$c_oid;
            logAction('Activate Account',$log);
            Redirect::to('view-officers?userid='.$userid.'&view=view_officers');
        }
    }

    if ($action == 'Deactivate') {

        $deactivate = new User();
        $new_user = User::findById($c_oid);

        $deactivate->id = $new_user->id;
        $deactivate->suspended = 1;
        $deactivate->status = 0;
        $deactivate->access = $new_user->access;
        $deactivate->phone = $new_user->phone;
        $deactivate->username = $new_user->username;
        $deactivate->password = $new_user->password;
        $deactivate->fname = $new_user->fname;
        $deactivate->sname = $new_user->sname;
        $deactivate->lname = $new_user->lname;
        $deactivate->sex = $new_user->sex;
        $deactivate->avatar = $new_user->avatar;
        $deactivate->token = $new_user->token;
        $deactivate->created = $new_user->created;

        if ($deactivate->update()) {
            $log = $user->fullName()." activated officer account with id : ".$c_oid;
            logAction('Activate Account',$log);
            Redirect::to('view-officers?userid='.$userid.'&view=view_officers');
        }
    }

        


?>