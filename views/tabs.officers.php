<div class="ui pointing secondary menu">
    <a class="item active" data-tab="officer">
    <i class="ui teal user icon"></i> Officers</a>
</div>


<!-- activities tab -->
<div class=" active ui tab announcement" data-tab="officer">
    <?php 

        if (count($officers) == 0) {
            $message = "<div class='ui negative icon message'><i class='announcement icon'></i><div class='content'><div class='header'>Oops!</div><p>Sorry, there are currently no Ward Executive officers registered</p></div></div>";
            echo $message;
        }else{


    ?>
    <table class="ui striped selectable compact table">
        <thead>
            <tr>
                <th>officer Name</th>
                <th>Region</th>
                <th>District</th>
                <th>Ward</th>
                <th>Email</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
                }
                
                foreach($officers as $key => $value):
                $oid = encryptor('encrypt',$value->id);
                $member = User::findById($value->id);

                if(($member->suspended) == 1){
                  $status = "Suspended";
                  $color_status = "red";
                  $action = "Activate";
                }else{
                  $status = "Active";
                  $color_status = "green";
                  $action = "Deactivate";
                } 
            ?>
                
            <tr>
                    <td><a href="view-officer?userid=<?php echo $userid; ?>&oid=<?php echo $oid; ?>&view=view-officer">
                    <?php echo $value->fullName(); ?>
                    </a>
                </td>
                <td><?php echo $value->region_name; ?></td>
                <td><?php echo $value->district_name; ?></td>
                <td><?php echo $value->ward_name; ?></td>
                <td><?php echo $value->email; ?></td>
                <td>
                    <a class="ui block <?php echo $color_status; ?> label"><?php echo $status; ?></a>
                </td>
                 <td>
                    <a href="delete-account?userid=<?php echo $userid; ?>&officerid=<?php echo $oid; ?>&action=<?php echo $action; ?>" class="ui block teal label"><?php echo $action; ?></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

