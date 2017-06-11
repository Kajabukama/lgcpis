
    <div class="ui column">
        <div class="column">
        	<p>Information given here is based on the user's registration to LoGov citizen participation Information system, from <?php echo $citizen->formatDate(); ?>.</p>
             
            <div class="ui segments borderless centered">
            	<div class="ui horizonal segment">
                	<p>Residence Category: <?php echo $citizen->type_name; ?></p>
                </div>
                <div class="ui segment">
                	<p>Full name : <?php echo $citizen->title." ".$citizen->fullName(); ?></p>
                </div>
                <div class="ui segment">
                	<p>Lives in : <?php echo $citizen->region_name; ?> region, <?php echo $citizen->district_name; ?> district in <?php echo $citizen->ward_name; ?> ward. Physical address is along the <?php echo $citizen->streetname; ?> street house number <?php echo $citizen->houseno; ?></p>
                </div>
                <div class="ui segment">
                	<p>Occupation: <?php echo $citizen->occupation; ?></p>
                </div>
                <div class="ui segment">
                	<p>Date of Birth: <?php echo $citizen->dob; ?></p>
                </div>
                <div class="ui segment">
                	<p>Mobile : <?php echo $citizen->phone; ?></p>
                </div>
                <div class="ui segment">
                	<p>Gender : <?php echo $citizen->sex; ?></p>
                </div>
            </div>
        </div>
    </div>
