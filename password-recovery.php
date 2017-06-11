<?php 
   require_once 'core/twilio.config.php';
   require_once "core/config.php";
?>
<?php
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
         
         $mobile = prepare($_POST['mobile']);
         $user = User::findByMobile($mobile);


         if (count($user) > 0) {

            $sms  = "Hello ".$user->fullName().", use this token : ".$user->token." to create a new password";
            $to = $user->phone;

            $log = $user->fullName()." requested password recovery";
            logAction('Password Recovery',$log);

            try {
               $client->messages->create($to,array('from'=>$from, 'body'=>$sms));
               Redirect::to('new-password?action=recover-password');

            } catch (Exception $e){
               echo 'Message: ' .$e->getMessage();
            }
         } else {
          echo "<script>alert(Sorry, either your mobile phone number is incorrect or we do not have your records)</script>";
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
            <h2 class="ui teal center aligned icon header">Password Recovery</h2>
            <p>Use your registered phone number to recover a password</p>
            <form id="recovery_password" class="ui form" action="" method="POST"> 
              <div class="field" data-inverted="teal" data-tooltip="Use your registered mobile phone number to recover your password" data-position="top center">
                <label>Mobile Phone number (0715333333)</label>
                <input type="text" name="mobile" placeholder="Registered phone number..." autocomplete="off">
              </div>
              
              <div class="field">
                <div><p>Do you an Account? <a href=".">Signin</a></p></div>
              </div>
              <button class="ui red button fluid" type="submit" name="signin">Recover Password</button>
            </form>
          </div>
         </div>
      </div>
      
      <?php require_once 'views/modal.alert.php'; ?>

      <script src="./js/jquery-3.2.0.min.js"></script>
      <script src="./js/semantic.min.js"></script>
      <!--<script src="./js/process.recovery.js"></script>-->
      <script>
        $(document).ready(function(){
          $('.ui.checkbox').checkbox();
        })
      </script>
   </body>
</html>