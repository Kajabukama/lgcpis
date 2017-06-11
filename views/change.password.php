<div class="eleven wide column">
    <form class="ui form" action="" method="POST">
        
        <div class="ui info message">
          <div class=" dividing header">
            Dear <?php echo $user->fullName(); ?>, you are about to change your account password, you can do this anytime.  
          </div>
          <ul class="list">
          <li>Passwords must be eight or more characters long</li>
            <li>Passwords must contain alphanumeric characters as well as special characters</li>
            <li>Change your password after every 1 month for better improved security</li>
          </ul>
        </div>
        
        <div class="fields">
            <div class="eight wide field">
                <label>New Password</label>
                <input type="text" name="new" placeholder="Enter new password">
            </div>
            <div class="eight wide field">
                <label>Confirm new Password</label>
                <input type="text" name="confirm" placeholder="Confirm Password">
            </div>
            
        </div>
        <button class="ui green right lebeled icon mediun button" tabindex="0">
          Change Password <i class="right arrow icon"></i>
        </button>
        <div class="ui error message"></div>
    </form>
</div>