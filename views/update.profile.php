<div class="eleven wide column">
        <div class="ui green message">
          <!-- <i class="close icon"></i> -->
          <div class=" dividing header">
            <?php echo $user->fullName(); ?>, you are updating your account  
          </div>
          <ul class="list">
            <li>The changes will affect your current profile Information</li>
            <li>These changes will affect your current citizenship information </li>
          </ul>
        </div>
    <form class="ui form" action="" method="POST">

        <div class="two fields">
            <div class="four wide field">
                
                    <select class="ui fluid dropdown" name="title">
                        <option value="<?php echo $citizen->title; ?>"><?php echo $citizen->title; ?></option>
                        <option value="Mr.">Mr.</option>
                        <option value="Ms.">Ms.</option>
                        <option value="Mrs.">Mrs.</option>
                        <option value="Dr.">Dr.</option>
                        <option value="Prof.">Prof.</option>

                    </select>
            </div>
            <div class="four wide field">
                
                    <select class="ui fluid dropdown" name="type">
                        <option value="<?php echo $citizen->type_name; ?>"><?php echo $citizen->type_name; ?></option>
                        <option value="Tenant">Tenant</option>
                        <option value="Landlord">Landlord</option>
                    </select>
            </div>
        </div>
        <div class="field">
            <div class="three fields">
                <div class="field" data-inverted="" data-tooltip="Officer First name" data-position="top center">
                    <input type="text" name="fname" value="<?php echo $citizen->fname; ?>">
                </div>
                <div class="field" data-inverted="" data-tooltip="Officer second name" data-position="top center">
                    <input type="text" name="sname" value="<?php echo $citizen->sname; ?>">
                </div>
                <div class="field" data-inverted="" data-tooltip="Officer Last name" data-position="top center">
                    <input type="text" name="lname" value="<?php echo $citizen->lname; ?>">
                </div>
            </div>
        </div>
        <div class="fields">
            <div class="seven wide field">
                <select class="ui fluid dropdown" name="sex">
                    <option value="<?php echo $citizen->sex; ?>"><?php echo $citizen->sex; ?></option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="nine wide field">
                <div class="ui calendar" id="dob">
                    <div class="ui input left icon">
                    <i class="calendar icon"></i>
                    <input type="text" name="dob" value="<?php echo $citizen->dob; ?>">
                    </div>
                </div>
            </div>
        </div>

        
        <div class="two fields">
        <div class="six wide field">
                <select class="ui fluid dropdown" name="region">
                    <option value="<?php echo $citizen->region_name; ?>"><?php echo $citizen->region_name; ?></option>
                    <option value="Dar es salaam">Arusha</option>
                    <option value="Dar es salaam">Dar es salaam</option>
                    <option value="Dar es salaam">Dodoma</option>
                </select>
            </div>
            <div class="five wide field">
                <select class="ui fluid dropdown" name="district">
                    <option value="<?php echo $citizen->district_name; ?>"><?php echo $citizen->district_name; ?></option>
                    <option value="Kinondoni">Kinondoni Municipal</option>
                    <option value="Ilala">Ilala Municipal</option>
                    <option value="Ilala">Temeke Municipal</option>
                </select>
            </div>
            <div class="five wide field">
                <select class="ui fluid dropdown" name="ward">
                   <option value="<?php echo $citizen->ward_name; ?>"><?php echo $citizen->ward_name; ?></option>
                    <option value="Kinondoni">Kinondoni</option>
                    <option value="Ilala">Ilala</option>
                </select>
            </div>
        </div>
        <div class="field">
            <div class="three fields">
                <div class="field" data-inverted="" data-tooltip="Active Mobile phone number" data-position="top center">
                    <input type="text" name="phone" value="<?php echo $citizen->phone; ?>">
                </div>
                <div class="field" data-inverted="" data-tooltip="Active email address" data-position="top center">
                    <input type="text" name="email" value="<?php echo $citizen->email; ?>">
                </div>
                <div class="field" data-inverted="" data-tooltip="Provide House number" data-position="top center">
                    <input type="text" name="houseno" value="<?php echo $citizen->houseno; ?>">
                </div>
            </div>
        </div>
        <div class="fields">
            <div class="nine wide field">
                <input type="text" name="street" value="<?php echo $citizen->streetname; ?>">
            </div>
            <div class="seven wide field">
                <select class="ui fluid dropdown" name="occupation">
                    <option value="<?php echo $citizen->occupation; ?>"><?php echo $citizen->occupation; ?></option>
                    <option value="Business">Business</option>
                    <option value="Driver">Driver</option>
                    <option value="Teacher">Teacher</option>
                    <option value="Medical Doctor">Medical Doctor</option>
                    <option value="Nurse">Nurse</option>
                    <option value="Technician">Technician</option>
                    <option value="Electrician">Electrician</option>
                </select>
            </div>
            
        </div>
        <button class="ui positive right lebeled icon medium button" tabindex="0">Update Profile <i class="right arrow icon"></i></button>
        <div class="ui error message"></div>
    </form>
</div>