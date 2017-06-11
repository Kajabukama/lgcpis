<div class="ui basic small modal sms">
    <i class="close icon"></i>
     <div class="ui teal header center aligned">Compose New Message</div> 
    <div class="content">
        <div class="description">
            <form id="message" class="ui form">
                <input type="hidden" name="sender" id="sender" value="<?php echo $user->id; ?>">
                <div class="two fields">
                    <div class="required field">
                        <div class="ui fluid search selection dropdown">
                            <input type="hidden" name="recipient" id="recipient">
                            <i class="dropdown icon"></i>
                            <div class="default text">Select Friend</div>
                            <div class="menu">
                                <?php foreach ($users as $key => $value): ?>
                                <div class="item" data-value="<?php echo $value->id; ?>"><?php echo $value->fullName(); ?></div>
                                <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                    <div class="required field">
                        <input type="text" name="subject" id="subject" placeholder="Message Subject">
                    </div>
                </div>
                <div class="required field">
                    <textarea id="message" name="message" rows="2" placeholder="Enter your message here"></textarea>
                </div>
                <button type="submit" class="ui medium teal right labeled icon  button">
                    Send <i class="white send icon"></i>
                </button>
                <!-- <button class="ui basic red deny right floated button">Cancel</button> -->
                <div class="ui error message"></div>
            </form>
        </div>
    </div>
</div>