<?php require_once "./core/config.php"; ?>
<?php 

    $step_one = Session::get('step_one');

    if($step_one == 1){
        $completed = "completed";
    }

    if($_SERVER['REQUEST_METHOD']=='POST'){
        
        Session::set('step_two',2);

        $form_data = array();

        $form_data['district'] = $_POST['district'];
        $form_data['region'] = $_POST['region'];
        $form_data['ward'] = $_POST['ward'];
        $form_data['phone'] = $_POST['phone'];
        $form_data['email'] = $_POST['email'];
        $form_data['houseno'] = $_POST['houseno'];
        $form_data['street'] = $_POST['street'];
        $form_data['occupation'] = $_POST['occupation'];

        Session::set('data_two',$form_data);
        Redirect::to('verify-account?step=verify');
    }

    ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Local Government Citizen Participation Information System">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
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
                <div class="active step">
                    <i class="credit card icon"></i>
                    <div class="content">
                    <div class="title">Address</div>
                    <div class="description">Enter address information</div>
                    </div>
                </div>
                <div class="step">
                    <i class="unlock icon"></i>
                    <div class="content">
                    <div class="title">Confirm</div>
                    <div class="description">Verify ccount details</div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="eleven wide column">
            <div class="ui basic segment">
                <h4>Physical Address</h4>
                
            </div>
            <div class="ui very padded segment">
                <!--<h4 class="ui horizontal divider header">
                <i class="tag icon"></i>BASIC INFORMATION
            </h4>-->
            <form class="ui form" action="" method="POST">
                
                <div class="two fields">
                <div class="six wide field">
                        <label>Region</label>
                        <select class="ui fluid search dropdown" name="region">
                            <option value="-1">Select Region</option>
                            <option value="Dar es salaam">Dar es salaam</option>
                        </select>
                    </div>
                    <div class="five wide field">
                        <label>District</label>
                        <select class="ui fluid dropdown" name="district">
                            <option value="-1">Select District</option>
                            <option value="Kinondoni">Kinondoni</option>
                            <option value="Ilala">Ilala</option>
                            <option value="Temeke">Temeke</option>
                            <option value="Ubungo">Ubungo</option>
                        </select>
                    </div>
                    <div class="five wide field">
                        <label>Ward</label>
                        <select class="ui fluid dropdown" name="ward">
                            <option value="-1">Select Ward</option>
                            <option value="Kibangu">Kibangu</option>
                            <option value="Ilala Bungoni">Ilala Bungoni</option>
                            <option value="Temeke Wailes">Temeke Wailes</option>
                        </select>
                    </div>
                </div>
                <div class="field">
                    <div class="three fields">
                        <div class="field">
                        <label>Mobile Number</label>
                            <input type="text" name="phone" placeholder="Mobile Number">
                        </div>
                        <div class="field">
                            <label>Email address</label>
                            <input type="text" name="email" placeholder="Email address">
                        </div>
                        <div class="field">
                            <label>House Number</label>
                            <input type="text" name="houseno" placeholder="Your House number">
                        </div>
                    </div>
                </div>
                <div class="fields">
                    <div class="nine wide field">
                        <label>Street Name</label>
                            <input type="text" name="street" placeholder="Street Name" name="street">
                    </div>
                    <div class="seven wide field">
                        <label>Occupation</label>
                        <select class="ui fluid dropdown" name="occupation">
                            <option value="">Select Occupation</option>
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
                <button class="ui basic positive right labeled icon button" type="submit" tabindex="0"> <i class="right arrow icon"></i>Continue </button>
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