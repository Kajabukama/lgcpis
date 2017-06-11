<div class="ui pointing secondary menu">
    <a class="item active" data-tab="officer">
    <i class="ui teal user icon"></i> Threads</a>
</div>


<!-- activities tab -->
<div class=" active ui tab announcement" data-tab="officer">
    <?php 

        if (count($topi) == 0) {
            $message = "<div class='ui negative icon message'><i class='announcement icon'></i><div class='content'><div class='header'>Oops!</div><p>Sorry, there are currently no Ward Executive officers registered</p></div></div>";
            echo $message;
        }else{


    ?>
    <table class="ui striped selectable compact table">
        <thead>
            <tr>
                <th>Author</th>
                <th>Title</th>
                <th>Thread</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
                }
                
                foreach($topi as $key => $value):
                $tid = encryptor('encrypt',$value->id);
                $member = User::findById($value->user_id);

                if(($value->visible) == 1){
                  $status = "Visible";
                  $color_status = "green";
                  $action = "Activate";
                }else{
                  $status = "Hidden";
                  $color_status = "red";
                  $action = "Deactivate";
                } 
            ?>
                
            <tr>
                    <td><a href="view-topic?userid=<?php echo $userid; ?>&tid=<?php echo $tid; ?>&view=view-officer">
                    <?php echo $member->fullName(); ?>
                    </a>
                </td>
                <td><?php echo $value->topic_name; ?></td>
                <td><?php echo $value->description; ?></td>
                <td>
                    <a class="ui block <?php echo $color_status; ?> label"><?php echo $status; ?></a>
                </td>
                 <td>
                    <?php

                    $visible = $value->visible;
                    if($visible == 0){
                        echo "<a data-inverted='' data-tooltip='Enable Public View' data-position='top center' class='ui button reply' href='forum-hide?userid=$userid&forum_id=$value->id&action=show-forum'>Show</a>";
                    }else{
                        echo "<a data-inverted='' data-tooltip='Disable Public View' data-position='top center' class='ui button reply' href='forum-hide?userid=$userid&forum_id=$value->id&action=hide-forum'>Hide</a>";
                    }

            ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

