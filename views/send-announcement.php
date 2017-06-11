<div class="eleven wide column">
    <form class="ui form" action="" method="POST">
        
        <div class="ui info message">
          <div class=" dividing header">
            Dear <?php echo $user->fullName(); ?>, You are about to Post an announcement to your citizen.  
          </div>
          <ul class="list">
            <li>It will reach their Account</li>
            <li>It will also send to their registered mobile phone numbers</li>
          </ul>
        </div>
        
        <div class="field">
            <div class="sixteen wide field">
                <label>Announcement Title</label>
                <input type="text" name="title" placeholder="Announcement Title">
            </div>
            <div class="sixteen wide field">
                <label>Announcement </label>
                <textarea id="message" name="message" rows="2" placeholder="Enter  announcement here ..."></textarea>
            </div>
            
        </div>
        
        <button class="ui green right lebeled icon mediun button" tabindex="0">
          Send Announcement <i class="right arrow icon"></i>
        </button>
        <div class="ui error message"></div>
    </form>
</div>