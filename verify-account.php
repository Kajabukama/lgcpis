<?php
  require_once './core/twilio.config.php'; 
  require_once "./core/config.php";
?>
<?php 

    $step_two = Session::get('step_two');
    $data_one = Session::get('data_one');
    $data_two = Session::get('data_two');


    if($step_two == 2){
        $completed = "completed";
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $citizen = new Citizen();
        $user = new User();

        $citizen->id = randomToken(6);
        $citizen->region_name = $data_two['region'];
        $citizen->district_name = $data_two['district'];
        $citizen->ward_name = $data_two['ward'];
        $citizen->type_name = $data_one['type'];
        $citizen->title = $data_one['title'];
        $citizen->fname = $data_one['fname'];
        $citizen->sname = $data_one['mname'];
        $citizen->lname = $data_one['lname'];
        $citizen->sex = $data_one['sex'];
        $citizen->dob = $data_one['dob'];
        $citizen->phone = prepare($data_two['phone']);
        $citizen->email = $data_two['email'];
        $citizen->houseno = $data_two['houseno'];
        $citizen->streetname = $data_two['street'];
        $citizen->occupation = $data_two['occupation'];
        $citizen->created = time();

        $user->fname = $citizen->fname;
        $user->sname = $citizen->sname;
        $user->lname = $citizen->lname;
        $user->sex = $citizen->sex;
        $user->avatar = $data_one['avatar'];
        $user->phone = $citizen->phone;
        $user->email = $citizen->email;
        $user->username = $citizen->email;
        $user->password = md5($data_one['lname']);
        $user->token = randomToken(3)."-".randomToken(2)."-".randomToken(3);
        $user->access = 2;
        $user->avatar = $data_one['avatar'];
        $user->status = 0;
        $user->suspended = 0;
        $user->created = time();
        $user->id = $citizen->id;

        $sms  = "Hello ".$citizen->title.",".$citizen->fullName().", thank you for joining LoGov - CiPaIS, use this token : ".$user->token." to unlock your account";
        $to = $user->phone;

        // citizenship account creation
        $citizen->create();
        $log = $user->fullName()." registered successfully";
        logAction('Citizen Signup',$log);

        // system account creation for the citizen above
        $user->create();
        $log = $user->fullName()." created an account successfully";
        logAction('Account Signup',$log);

        // send a token to the citizen's mobile phone for account activatio
        try {
            $client->messages->create($to,array('from'=>$from, 'body'=>$sms));
            Session::delete('data_one');
            Session::delete('data_two');
            Redirect::to('unlock?action=unlock-details');

        }catch(Exception $e){
            echo 'Message: ' .$e->getMessage();
        }
    }

    ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Local Government Citizen Participation Information System">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>LoGov : CiPaIS</title>
    <link rel="shortcut icon" href="images/favicon.png">
    <link rel="stylesheet" href="css/material-design-iconic-font.css">
    <link rel="stylesheet" href="css/semantic.css">
    <link rel="stylesheet" href="./css/calendar.min.css" />
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php 
        require_once './views/menu.php';
    ?>
    <div class="ui two column grid container">
        <div class="five wide column">
            <div class="ui segment basic">
                <div class="ui vertical steps">
                <div class="<?php echo $completed; ?> step">
                    <i class="user icon"></i>
                    <div class="content">
                    <div class="title">Personal</div>
                    <div class="description">Enter your Personal Details</div>
                    </div>
                </div>
                <div class="<?php echo $completed; ?> step">
                    <i class="address icon"></i>
                    <div class="content">
                    <div class="title">Address</div>
                    <div class="description">Enter address information</div>
                    </div>
                </div>
                <div class="active step">
                    <i class="unlock outline icon"></i>
                    <div class="content">
                    <div class="title">Confirm</div>
                    <div class="description">Verify ccount details</div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="eleven wide column">
            <!-- <div class="ui basic segment">
                <h4>Confirm Details</h4>
            </div> -->
            <div class="ui padded segment">
            <form class="ui form" action="" method="POST">

                <div class="two fields">
                    <div class="three wide field">
                        <label>Title</label>
                        <select class="ui fluid dropdown">
                            <option value="<?php echo $data_one['title'] ?>"><?php echo $data_one['title'] ?></option>
                            <option value="Mr.">Mr.</option>
                            <option value="Ms.">Ms.</option>
                            <option value="Mrs.">Mrs.</option>
                            <option value="Dr.">Dr.</option>
                            <option value="Prof.">Prof.</option>
                        </select>
                    </div>
                    <div class="thirteen wide field">
                        <label>Residence Type</label>
                            <select class="ui fluid dropdown" name="type">
                                <option value="<?php echo $data_one['type'] ?>"><?php echo $data_one['type'] ?></option>
                                <option value="Arusha">Tenant</option>
                                <option value="Dar es salaam">Landlord</option>
                            </select>
                    </div>
                </div>
                <div class="field">
                    <div class="three fields">
                        <div class="field">
                        <label>First Name</label>
                            <input type="text" name="personal[first-name]" placeholder="First Name" value="<?php echo $data_one['fname'] ?>">
                        </div>
                        <div class="field">
                            <label>Middle Name</label>
                            <input type="text" name="personal[middle-name]" placeholder="Middle Name" value="<?php echo $data_one['mname'] ?>">
                        </div>
                        <div class="field">
                            <label>Last Name/Surname</label>
                            <input type="text" name="personal[last-name]" placeholder="Last Name" value="<?php echo $data_one['lname'] ?>">
                        </div>
                    </div>
                </div>
                <div class="fields">
                    <div class="seven wide field">
                        <label>Gender</label>
                        <select class="ui fluid dropdown" name="sex]">
                            <option  value="<?php echo $data_one['sex'] ?>"><?php echo $data_one['sex'] ?></option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="nine wide field">
                        <label>Date of Birth</label>
                        <div class="ui calendar" id="dob">
                            <div class="ui input left icon">
                            <i class="calendar icon"></i>
                            <input type="text" name="dob" placeholder="Date of Birth" <?php echo $data_one['dob'] ?>>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="two fields">
                <div class="six wide field">
                        <label>Region</label>
                        <select class="ui fluid dropdown">
                            <option value="<?php echo $data_two['region'] ?>"><?php echo $data_two['region'] ?></option>
                            <option value="Arusha">Arusha</option>
                            <option value="Dar es salaam">Dar es salaam</option>
                        </select>
                    </div>
                    <div class="five wide field">
                        <label>District</label>
                        <select class="ui fluid dropdown">
                            <option value="<?php echo $data_two['district'] ?>"><?php echo $data_two['district'] ?></option>
                            <option value="Kinondoni">Kinondoni</option>
                            <option value="Ilala">Ilala</option>
                        </select>
                    </div>
                    <div class="five wide field">
                        <label>Ward</label>
                        <select class="ui fluid dropdown" name="ward">
                            <option value="<?php echo $data_two['ward'] ?>"><?php echo $data_two['ward'] ?></option>
                            <option value="Kinondoni">Kinondoni</option>
                            <option value="Ilala">Ilala</option>
                        </select>
                    </div>
                </div>
                <div class="field">
                    <div class="three fields">
                        <div class="field">
                        <label>Mobile Number</label>
                            <input type="text" name="phone" placeholder="Mobile Number" value="<?php echo $data_two['phone'] ?>">
                        </div>
                        <div class="field">
                            <label>Email address</label>
                            <input type="text" name="email" placeholder="Email address" value="<?php echo $data_two['email'] ?>">
                        </div>
                        <div class="field">
                            <label>House Number</label>
                            <input type="text" name="houseno" placeholder="Your House number" value="<?php echo $data_two['houseno'] ?>">
                        </div>
                    </div>
                </div>
                <div class="fields">
                    <div class="nine wide field">
                        <label>Street Name</label>
                            <input type="text" name="street" placeholder="Street Name" value="<?php echo $data_two['street'] ?>">
                    </div>
                    <div class="seven wide field">
                        <label>Occupation</label>
                        <select class="ui fluid dropdown" name="occupation">
                            <option value="<?php echo $data_two['occupation'] ?>"><?php echo $data_two['occupation'] ?></option>
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
                <button class="ui basic positive right lebeled icon button" tabindex="0"><i class="right arrow icon"></i>Save Details</button>
                <div class="ui error message"></div>
            </form>
            </div>
        </div>
    </div>
    <script src="./js/jquery-3.2.0.min.js"></script>
    <script src="./js/semantic.min.js"></script>
    <script src="./js/calendar.min.js"></script>
    <script src="./js/form-processing.js"></script>
    <script src="./js/common.js"></script>
</body>
</html>