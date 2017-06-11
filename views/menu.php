<div class="ui top fixed teal stackable inverted pointing menu" style="margin-bottom: 2em; border:none;">
    <div class="ui container">
      <?php
        if(Session::exists('userid')){
          echo "<a class='item'><img src='../images/logo.png'></a>";
          echo "<a href='welcome?userid={$userid}&view=welcome' class='{$welcome} item'><i class='home icon'></i> Dashboard</a>";
          echo "<a href='forum?userid={$userid}&view=forum' class='{$forum} item'><i class='talk icon'></i> Forum</a>";
          echo "<a href='messages?userid={$userid}&view=message' class='{$message} item'><i class='mail icon'></i> Messages</a>";
          echo "<div class='right menu'>";
          echo "<a href='profile?userid={$userid}&view=profile' class='{$profile} item'><img    src='../images/avatar/{$user->avatar}' class='ui avatar image'> Welcome, {$user->username} </a>";
          echo "<a class='item' href='../logout.php?action=logout'><i class='lock icon'></i> Signout</a> ";
          echo "</div>";
        }else{
          // echo "<a class='item'><img src='./images/logo.png'></a>";
          echo "<a class='item'><i class='home icon'></i> Home</a>";
          echo "<a class='item'><i class='talk icon'></i> Forum</a>";
          echo "<div class='right menu'>";
          echo "<a class='item active'><img src='./images/default.png' class='ui avatar image'> Citizen Registration</a>";
          echo "<a class='item' href='index.php'><i class='unlock icon'></i> Signin</a>";
          echo "</div>";
        }
        
      ?>
      
    </div>
  <img src="" alt="">
      
</div>