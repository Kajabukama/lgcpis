<!DOCTYPE html>
<html>
   <head>
      <!-- Standard Meta -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
      <!-- Site Properties -->
      <title>Homepage - Semantic</title>
      <link rel="stylesheet" type="text/css" href="css/semantic.min.css">
      <style type="text/css">
         body{
            background: #006064 url(images/tanzania_flag_map.png);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            color: #fff;
         }
         .hidden.menu {
         display: none;
         }
         .masthead.segment {
         min-height: 600px;
         padding: 1em 0em;
         }
         .masthead .logo.item img {
         margin-right: 1em;
         }
         .masthead .ui.menu .ui.button {
         margin-left: 0.5em;
         }
         .masthead h1.ui.header {
         margin-top: 3em;
         margin-bottom: 0em;
         font-size: 4em;
         font-weight: normal;
         }
         .masthead h2 {
         font-size: 1.7em;
         font-weight: normal;
         }
         .ui.vertical.stripe {
         padding: 8em 0em;
         }
         .ui.vertical.stripe h3 {
         font-size: 2em;
         }
         .ui.vertical.stripe .button + h3,
         .ui.vertical.stripe p + h3 {
         margin-top: 3em;
         }
         .ui.vertical.stripe .floated.image {
         clear: both;
         }
         .ui.vertical.stripe p {
         font-size: 1.33em;
         }
         .ui.vertical.stripe .horizontal.divider {
         margin: 3em 0em;
         }
         .quote.stripe.segment {
         padding: 0em;
         }
         .quote.stripe.segment .grid .column {
         padding-top: 5em;
         padding-bottom: 5em;
         }
         .footer.segment {
         padding: 5em 0em;
         }
         .secondary.pointing.menu .toc.item {
         display: none;
         }
         @media only screen and (max-width: 700px) {
         .ui.fixed.menu {
         display: none !important;
         }
         .secondary.pointing.menu .item,
         .secondary.pointing.menu .menu {
         display: none;
         }
         .secondary.pointing.menu .toc.item {
         display: block;
         }
         .masthead.segment {
         min-height: 350px;
         color: #fff;
         }
         .masthead h1.ui.header {
         font-size: 2em;
         margin-top: 1.5em;
         }
         .masthead h2 {
         margin-top: 0.5em;
         font-size: 1.5em;
         }
         }
      </style>
      <script src="assets/library/jquery.min.js"></script>
      <script src="../dist/components/visibility.js"></script>
      <script src="../dist/components/sidebar.js"></script>
      <script src="../dist/components/transition.js"></script>
      
   </head>
   <body class="bg">
      <!-- Page Contents -->
      <div class="pusher">
         <div class="ui vertical masthead center aligned segment">
            <div class="ui container" style="border: none;">
               <div class="ui large secondary inverted menu">
                  
                  <a class="active item">Home</a>
                  <a class="item">About</a>
                  <a class="item">Forum</a>
                  <div class="right item">
                     <a href="login.php?action=login" class="ui inverted button">Log in</a>
                     <a href="register-basic.php?action=registration&step=basic" class="ui inverted button">Sign Up</a>
                  </div>
               </div>
            </div>
            <div class="ui text container">
               <h1 class="ui inverted header">
                  LGov-CPIS
               </h1>
               <h2>Local Government Citizen Participation Information System.</h2>
               <a href="register-basic.php?action=registration&step=basic" class="ui huge primary button">Join Today</a>
            </div>
         </div>
      </div>
   </body>
</html>