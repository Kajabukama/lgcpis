<div class="ui pointing secondary menu">
    <a class="item active" data-tab="officer">
    <i class="ui teal user icon"></i> Citizens</a>
</div>
<?php print_r($citizens); ?>

<!-- activities tab -->
<div class=" active ui tab announcement" data-tab="officer">
    <?php 

        if (count($citi) == 0) {
            $message = "<div class='ui negative icon message'><i class='announcement icon'></i><div class='content'><div class='header'>Oops!</div><p>Sorry, there are currently no Ward Executive officers registered</p></div></div>";
            echo $message;
        }else{


    ?>
    <table class="ui striped selectable compact table">
        <thead>
            <tr>
                <th>Citizen Name</th>
                <th>Region</th>
                <th>District</th>
                <th>Ward</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php
                }
                
                foreach($citi as $key => $value):
                $cid = encryptor('encrypt',$value->id);
                $member = User::findById($value->id);
                
            ?>
                
            <tr>
                    <td><a href="view-citizen?userid=<?php echo $userid; ?>&cid=<?php echo $cid; ?>&view=view-officer">
                    <?php echo $value->fullName(); ?>
                    </a>
                </td>
                <td><?php echo $value->region_name; ?></td>
                <td><?php echo $value->district_name; ?></td>
                <td><?php echo $value->ward_name; ?></td>
                <td><?php echo $value->email; ?></td>
                
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

