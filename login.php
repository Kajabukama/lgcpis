<?php

   require './core/twilio.config.php';  
   require_once "core/config.php"; 
?>
<?php

    $online = new Online();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $username = $_POST['username'];
        $password = md5($_POST['password']);
        
        if(!empty($username) && !empty($password)){

            $result = User::authenticate($username, $password);
            
            if (count($result) > 0) {
                // user found, fetch access, id and status
                while($row = $database->fetchAssoc($result)){
                    $access = $row['access'];
                    $uid = $row['id'];
                    $phone = $row['phone'];
                    $token = $row['token'];
                    $fullname = $row['fname']." ".$row['lname'];
                    $status = $row['status'];
                }
                // encrypt user id and set it into a session
                $salt = encryptor("encrypt",$uid);
                Session::set("userid",$salt);

                // check if user account is activated 1 - active 0 - inactive
                if ($status == 1) {

                    $online->id = randomToken(5);
                    $online->user_id = $uid;
                    $online->ip_address = getip();
                    $online->create();

                    if ($access == 0) {
                        // admin access level
                        $url = "admin/welcome?userid=".$salt."&view=welcome";
                        logAction("login", "$username logged in successfully");
                        Redirect::to($url);
                    }
                    // ward officer admin access level
                    if($access == 1){
                        $url = "ward/welcome?userid=".$salt."&view=welcome";
                        logAction("login", "$username logged in successfully");
                        Redirect::to($url);
                    }
                    // public access level - citizen
                    if($access == 2){
                        $url = "public/welcome?userid=".$salt."&view=welcome";
                        logAction("login", "$username logged in successfully");
                        Redirect::to($url);
                    }
                    
                }else{
                     $sms  = $fullname.", use this token : ".$token." to activate your account";
                     $to = $phone;
                     try {
                        $client->messages->create($to,array('from'=> $from, 'body'=> $sms));
                        Redirect::to('unlock.php?status=not-activated');
                     }catch(Exception $e){
                        echo 'Message: ' .$e->getMessage();
                     }
                    Redirect::to('unlock.php?status=not-activated');
                }
            }else{ 
                // user not found
              echo "<script>alert('Sorry, the user does not exists on the system')</script>";
                Redirect::to('login.php?status=user-not-found');
            }

        }else{
            echo "<script>alert('Sorry, you must provide a usename and password')</script>";
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
  <link rel="shortcut icon" href="images/favicon.png">
  <link rel="stylesheet" href="css/material-design-iconic-font.css">
  <link rel="stylesheet" href="css/semantic.css">
  <link rel="stylesheet" href="css/styles.css">
  <style type="text/css">
    body{
            background: #006064 url(images/tanzania_flag_map.png);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
         }
  </style>
</head>
<body class="p-top-body">
  <div class="ui grid centered stackable">
   <div class="four wide column">
      <div class="ui very padded stacked segment">

        <img class="ui centered tiny image" src="images/logo.svg">
        <h2 class="ui teal center aligned icon header">Signin</h2>
        <!--<p>Use your registered credentials to log onto the System, if you have trouble contact the System Administrator</p>-->
        <form id="signin" class="ui form" action="" method="POST"> 
          <div class="field" data-inverted="teal" data-tooltip="Use your registered Email address to login" data-position="top center">
            <label>Enter Email address</label>
            <div class="ui left icon input">
                <i class="user icon"></i>
               <input type="text" name="username" placeholder="Email address" autocomplete="off">
            </div>
        </div>
        <div class="field" data-inverted="teal" data-tooltip="Use the password sent to you, you may choose to change it later" data-position="top center">
            <label>Enter Password</label>
            <div class="ui left icon input">
                <i class="lock icon"></i>
               <input type="password" name="password" placeholder="Password" autocomplete="off">
            </div>
        </div>
        <div class="field">
            <div>
              <p>Having trouble to Signin? <a href="password-recovery?action=recovery">Recover Password</a></p>
          </div>
      </div>
      <div class="field">
        <button class="ui fluid large teal button" type="submit" name="signin">Signin</button>
    </div>
      <p>Do you have an Account ? <a href="register-basic?action=registration&step=basic" class="ui large green link">Signup</a></p>
      <div class="ui error message"></div>
</form>
</div>
</div>
</div>
<script src="./js/jquery-3.2.0.min.js"></script>
<script src="./js/semantic.min.js"></script>
 <!--<script src="./js/form-processing.js"></script> -->
<script src="./js/common.js"></script>
</body>
</html>