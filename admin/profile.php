<?php require_once "../core/config.php";?>
<?php

    if (!Session::exists('userid')) {
        Redirect::to('../index.php');
    }else{

        // statically fetching all records by table

        $announcement = Announcement::findAll();
        $activities = Forum::findAll();
        $messages = Message::findAll();

        // instantiating objects
        $announce = new Announcement();
        $message = new Message();
        $topic = new Forum();

        // get userid from session
        $userid = Session::get('userid');

        // descrypt userid in session from database querying
        $cleanid = encryptor('decrypt',$userid);

        $user = User::findById($cleanid);
        $citizen = Citizen::findById($cleanid);

        // grab view
        require_once '../views/view.utility.php';
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
      <link rel="shortcut icon" href="../images/favicon.png">
      <link rel="stylesheet" href="../css/material-design-iconic-font.css">
      <link rel="stylesheet" href="../css/semantic.css">
      <link rel="stylesheet" href="../css/styles.css">
   </head>
   <body>
        <?php 
            require_once '../views/menu.admin.php';
        ?>

        <div class="ui grid two column stackable container">
            <div class="four wide column">
                <?php require_once '../views/menu-admin.php' ?>
            </div>
            <div class="twelve wide column row">
                
                <div class="seven wide column">
                     <div class="ui segment">
                        <?php require_once '../views/tabs.profile.php'; ?>
                    </div>
                </div>
                <div class="nine wide column">
                  <div class="ui segment">
                    <?php require_once '../views/tabs.citizen.php'; ?>
                  </div>
                </div>
            </div>

        </div>
      <script src="../js/jquery-3.2.0.min.js"></script>
      <script src="../js/semantic.min.js"></script>
      <script src="../js/form-processing.js"></script>
      <script src="../js/process.message.js"></script>
      <script src="../js/process.topic.js"></script>
      <script src="../js/common.js"></script>
   </body>
</html>