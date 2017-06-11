<?php 
  require './core/twilio.config.php'; 
  require_once "./core/config.php"; ?>
<?php 

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    	
    	$code = $_POST['code'];
    	
    	if(!empty($code)){
            $user = new User();
            $user_found = User::findByToken($code);
            $password = generateString(8);

            if (count($user_found) == 1) {
                
                $user->id = $user_found->id;
                $user->status = 1;
                $user->access = $user_found->access;
                $user->suspended = 0;
                $user->phone = $user_found->phone;
                $user->username = $user_found->username;
                $user->password = md5($password);
                $user->fname = $user_found->fname;
                $user->sname = $user_found->sname;
                $user->lname = $user_found->lname;
                $user->sex = $user_found->sex;
                $user->avatar = $user_found->avatar;
                $user->token = $user_found->token;
                $user->created = $user_found->created;

                $sms  = "Hello ".$user->fullName().", generated password : ".$password." you can change it when logged in";
                $to = $user->phone;

                if ($user->update()) {
                    try {
                        $client->messages->create($to,array('from'=> $from, 'body'=> $sms));
                        Redirect::to('login.php');
                    }catch(Exception $e){
                        echo 'Message: ' .$e->getMessage();
                    }
                }else{
                    Redirect::to('unlock.php');
                }
            }
    	}
    	else{
    		Redirect::to('register-basic?step=basic');
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
   </head>
   <body class="p-top-body">
      <div class="ui grid centered stackable">
         <div class="four wide column">
          <div class="ui very padded tall stacked segment">
            <img class="ui centered tiny image" src="images/logo.svg">
            <h2 class="ui center aligned icon header">CiPaIS</h2>
            <p>Use your activation code sent to your mobile phone number to activate your account</p>
            <form class="ui form" action="" method="POST"> 
              <div class="field">
                <label>Activation Code (Format XXX-XX-XXX)</label>
                <input type="text" name="code" id="code" 
                placeholder="XXX-XX-XXX" autocomplete="off">
              </div>
              <div class="field">
                <div><p>Do you an Account? <a href=".">Signin</a></p></div>
              </div>
              <button class="ui large green button fluid" type="submit" name="signin">ACTIVATE ACCOUNT</button>
            </form>
          </div>
         </div>
      </div>
      <script src="./js/jquery-3.2.0.min.js"></script>
      <script src="./js/semantic.min.js"></script>
      <script src="./js/form-processing.js"></script>
      <script src="./js/common.js"></script>
   </body>
</html>