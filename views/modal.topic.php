<div class="ui basic small modal topic">
    <i class="close icon"></i>
     <div class="ui teal header center aligned">Create Topic</div> 
    <div class="content">
        <div class="description">
            <form id="topic" class="ui form">
                <input type="hidden" name="user" id="user" value="<?php echo $user->id; ?>">
                <input type="hidden" name="region" id="region" value="<?php echo $citizen->region_name; ?>">
                <div class="field">
                  <input id="topic" name="topic" type="text" placeholder="Topic title ...">
                </div>
                <div class="field">
                    <textarea id="description" name="description" rows="2" 
                    placeholder="Whats in your mind..."></textarea>
                </div>
                <div class="field">
                    <button type="submit" 
                    class="ui medium teal right labeled icon medium button">
                        Post Topic <i class="send icon"></i>
                    </button>
                </div>
                
                <div class="ui error message"></div>
            </form>
        </div>
    </div>
</div>