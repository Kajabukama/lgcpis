<div class="ui two grid column">
   
    <div class="eight wide column">
        <div class="ui segment">
            <img class="ui centered tiny circular image" src="../images/avatar/<?php echo $member->avatar; ?>">
        <h4 class="ui center aligned header"><?php echo $member->fullName(); ?>
            <br/><small>Member Since <?php echo $user->formatDate($member->created); ?></small>
        </h4>
         <!-- <h4 class="ui horizontal divider header">Account</h4>  -->
        <div class="ui segments centered">
            <div class="ui segment"><p>Fullname : <?php echo $member->fullName(); ?></p></div>
            <div class="ui segment"><p>Username : <?php echo $member->username; ?></p></div>
            <div class="ui segment"><p>Email address: <?php echo $member->username; ?></p></div>
            <div class="ui segment"><p>Mobile : <?php echo $member->phone; ?></p></div>
            <div class="ui segment"><p>Gender : <?php echo $member->sex; ?></p></div>
        </div>
        </div>
        <div class="ui clearing segment">
            <a class="ui red left floated button" href="delete-account?userid=<?php echo $userid; ?>&officerid=<?php echo $oid; ?>&action=delete"> Delete Account</a>

            <a class="ui red right floated button" href="delete-account?userid=<?php echo $userid; ?>&officerid=<?php echo $oid; ?>&action=suspend"> Suspend Account</a>

        </div>
    </div>
    <div class="eight wide column">
        <div class="ui segment">
            <div class="ui column">
                <div class="column">
                    <p>This officer started using the system on <?php echo $officer->formatDate(); ?>.All activities for <?php echo $officer->title." ".$officer->fullName(); ?> will be logged in a logfile</p>
                     
                    <div class="ui segments borderless centered">
                        <div class="ui horizonal segment">
                            <p>Residence Category: <?php echo $officer->type_name; ?></p>
                        </div>
                        <div class="ui segment">
                            <p>Full name : <?php echo $officer->title." ".$officer->fullName(); ?></p>
                        </div>
                        <div class="ui segment">
                            <p>Officer <?php echo $officer->fullName();?> is a ward Executive Officer - WEO for <b><?php echo $officer->ward_name; ?> ward</b> in <?php echo $officer->region_name; ?> region in <?php echo $officer->district_name; ?> district.</p>
                        </div>
                        
                        <div class="ui segment">
                            <p>Date of Birth: <?php echo $officer->dob; ?></p>
                        </div>
                        <div class="ui segment">
                            <p>Mobile : <?php echo $officer->phone; ?></p>
                        </div>
                        <div class="ui segment">
                            <p>Gender : <?php echo $officer->sex; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>