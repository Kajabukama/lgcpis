<div class="ui red message">
  <div class="dividing header">
    Hello <?php echo $user->fullName(); ?>, we are very sorry to see you go, but we appreciate your participation and your contributions will be highly valued.
  </div>
  <ul class="list">
    <li>It has been extremely valuable to have you</li>
    <li>You can still come back, we always have a place for you!</li>
  </ul>
</div>
<div class="eleven wide column">
    <form class="ui form" action="" method="POST">
        <div class="fields">
            <div class="nine wide field">
                <!-- <label>Street Name</label> -->
                <input type="text" name="phone" placeholder="Confirm with your registered mobile phone number">
            </div>
            <div class="seven wide field">
                <!-- <label>Occupation</label> -->
                <select class="ui fluid dropdown" name="deactivate">
                    <option value="-1">Choose how to deactivate your account</option>
                    <option value="1">Permanently</option>
                    <option value="1">Temporarily</option>
                </select>
            </div>
            
        </div>
        <button class="ui red right lebeled icon medium button" tabindex="0">Deactivate Account <i class="right arrow icon"></i></button>
        <div class="ui error message"></div>
    </form>
</div>