<div class="ui pointing secondary menu">
    <a class="item active" data-tab="forum">
    <i class="ui teal talk outline icon"></i> Message Reply</a>
</div>

<!-- forum tab -->
<div class="ui tab active forum" data-tab="forum">
    <form class="ui form" action="" method="POST">
         <input type="hidden" name="from" value="<?php echo $userid; ?>">
        <div class="fields">
            <div class="sixteen wide field">
                <label>Recipient : </label>
                <input type="text" name="text" disabled="true" value="<?php echo $from_user->fullName(); ?>">
            </div>
        </div>
        <div class="fields">
            <div class="sixteen wide field">
                <label>Subject : </label>
                <input type="text" name="subject" placeholder="Message subject">
            </div>
        </div>
        <div class="fields">
            <div class="sixteen wide field">
                <label>Message : </label>
                <textarea name="message" rows="2"></textarea>
            </div>
        </div>
        <button class="ui green right lebeled icon medium button" tabindex="0">Send Message <i class="right arrow icon"></i></button>
        <div class="ui error message"></div>
    </form>
</div>





