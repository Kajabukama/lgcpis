<?php 
      require_once 'core/twilio.config.php';
      require_once "core/config.php";

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

         $token = $_POST['token'];
         $password = $_POST['password'];
         $confirm = $_POST['confirm'];

         $user = User::findByToken($token);
         $upd = new User();


         $upd->fname = $user->fname;
         $upd->sname = $user->sname;
         $upd->lname = $user->lname;
         $upd->sex = $user->sex;
         $upd->phone = $user->phone;
         $upd->username = $user->username;
         $upd->password = md5($password);
         $upd->token = $user->token;
         $upd->access = $user->access;
         $upd->suspended = $user->suspended;
         $upd->avatar = $user->avatar;
         $upd->status = $user->status;
         $upd->created = $user->created;
         $upd->id = $user->id;

        // print_r($user);
         // die();


         if ($password == $confirm) {
            
            if ($upd->update()) {
               Redirect::to('login.php?action=login');
            }

         } else {
            echo "<script>alert('Passswords do not match')</script>";
         }


      }
?>

<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
      <title>LoGov : CiPaIS</title>
      <link rel="shortcut icon" href="images/favicon.png">
      <link rel="stylesheet" href="css/material-design-iconic-font.css">
      <link rel="stylesheet" href="css/semantic.css">
      <link rel="stylesheet" href="css/styles.css">
   </head>
   <body class="p-top-body">
      <div class="ui grid centered stackable">
         <div class="four wide column">
          <div class="ui very padded tall stacked segment">
            <img class="ui centered tiny image" src="images/logo.svg">
            <h2 class="ui teal center aligned icon header">New Password</h2>
            <p>Create a new password, please make sure it is more than 6 characters long</p>
            <form id="recovery_password" class="ui form" action="" method="POST">
                <div class="field">
                <label>Password Recovery Code</label>
                <input type="text" name="token" 
                placeholder="Security code" autocomplete="off">
              </div>
              <div class="field">
                <label>New Password</label>
                <input type="text" name="password" 
                placeholder="New password" autocomplete="off">
              </div>
              
              <div class="field">
                <label>Confirm New Password</label>
                <input type="text" name="confirm" 
                placeholder="Confirm new password" autocomplete="off">
              </div>

              <!--<div class="field">
                <div><p>Do you an Account? <a href=".">Signin</a></p></div>
              </div>-->
              <button class="ui positive button fluid" type="submit" name="signin">Recover Password</button>
            </form>
          </div>
         </div>
      </div>
      
      <?php require_once 'views/modal.alert.php'; ?>

      <script src="./js/jquery-3.2.0.min.js"></script>
      <script src="./js/semantic.min.js"></script>
      <script>
        $(document).ready(function(){
          $('.ui.checkbox').checkbox();
        })
      </script>
   </body>
</html>