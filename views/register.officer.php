<div class="ui info message">
  <div class=" dividing header">
    <?php echo $user->fullName(); ?>, you are creating Ward Executive officer account.  
  </div>
  <ul class="list">
    <li>Validate the information given against this officer</li>
    <li>When registered, an account will need activation before signin</li>
    <li>You have full control over their access account</li>
  </ul>
</div>
<div class="eleven wide column">
    <form class="ui form" action="" method="POST">

        <div class="two fields">
            <div class="four wide field">
                <!-- <label>Residence Type</label> -->
                    <select class="ui fluid dropdown" name="type">
                        <option value="-1">Residence type</option>
                        <option value="Tenant">Tenant</option>
                        <option value="Landlord">Landlord</option>
                    </select>
            </div>
            <div class="three wide field">
                <!-- <label>Title</label> -->
                <select class="ui fluid dropdown" name="title">
                    <option value="-1">Title</option>
                    <option value="Mr.">Mr.</option>
                    <option value="Ms.">Ms.</option>
                    <option value="Mrs.">Mrs.</option>
                    <option value="Dr.">Dr.</option>
                    <option value="Prof.">Prof.</option>
                </select>
            </div>
            
        </div>
        <div class="field">
            <div class="three fields">
                <div class="field" data-inverted="" data-tooltip="Officer First name" data-position="top center">
                <!-- <label>First Name</label> -->
                    <input type="text" name="fname" placeholder="First Name">
                </div>
                <div class="field" data-inverted="" data-tooltip="Officer second name" data-position="top center">
                    <!-- <label>Middle Name</label> -->
                    <input type="text" name="sname" placeholder="Second Name">
                </div>
                <div class="field" data-inverted="" data-tooltip="Officer Last name" data-position="top center">
                    <!-- <label>Last Name/Surname</label> -->
                    <input type="text" name="lname" placeholder="Last Name">
                </div>
            </div>
        </div>
        <div class="fields">
            <div class="seven wide field">
                <select class="ui fluid dropdown" name="sex">
                    <option value="-1">Choose Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="nine wide field">
                <div class="ui calendar" id="dob">
                    <div class="ui input left icon">
                    <i class="calendar icon"></i>
                    <input type="text" name="dob" placeholder="Date of Birth">
                    </div>
                </div>
            </div>
        </div>

        
        <div class="two fields">
        <div class="six wide field">
                <select class="ui fluid dropdown" name="region">
                    <option value="-1">Choose Region</option>
                    <option value="Dar es salaam">Dar es salaam</option>
                </select>
            </div>
            <div class="five wide field">
                <select class="ui fluid dropdown" name="district">
                    <option value="-1">Choose District</option>
                    <option value="Kinondoni">Kinondoni Municipal</option>
                    <option value="Ilala">Ilala Municipal</option>
                    <option value="Ilala">Temeke Municipal</option>
                </select>
            </div>
            <div class="five wide field">
                <select class="ui fluid dropdown" name="ward">
                   <option value="-1">Choose Ward</option>
                    <option value="Kinondoni">Kinondoni</option>
                    <option value="Ilala">Ilala</option>
                </select>
            </div>
        </div>
        <div class="field">
            <div class="three fields">
                <div class="field" data-inverted="" data-tooltip="Active Mobile phone number" data-position="top center">
                    <input type="text" name="mobile" placeholder="Mobile Number">
                </div>
                <div class="field" data-inverted="" data-tooltip="Active email address" data-position="top center">
                    <input type="text" name="email" placeholder="Email address">
                </div>
                <div class="field" data-inverted="" data-tooltip="Provide House number" data-position="top center">
                    <input type="text" name="houseno" placeholder="Your House number">
                </div>
            </div>
        </div>
        <div class="fields">
            <div class="nine wide field">
                <input type="text" name="streetname" placeholder="Street Name">
            </div>
            <div class="seven wide field">
                <select class="ui fluid dropdown" name="occupation">
                    <option value="-1">Choose Occupation</option>
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
        <button class="ui positive right lebeled icon button" tabindex="0">
        Save Details <i class="plus icon"></i></button>
        <div class="ui error message"></div>
    </form>
</div>