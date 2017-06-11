<?php require_once "core/config.php";?>
<?php 

    if($_SERVER['REQUEST_METHOD']=='POST'){
        // setting step one into a session
        Session::set('step_one',1);
        // an array to store all form data 
        $form_data = array();

        $form_data['fname'] = $_POST['fname'];
        $form_data['mname'] = $_POST['mname'];
        $form_data['lname'] = $_POST['lname'];
        $form_data['sex'] = $_POST['sex'];
        $form_data['dob'] = $_POST['dob'];
        $form_data['type'] = $_POST['type'];
        $form_data['title'] = $_POST['title'];
        $form_data['avatar'] = $_POST['avatar'];

        Session::set('data_one',$form_data);
        Redirect::to('register-other?step=other');
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
    <?php  require_once './views/menu.php'; ?>
    <div class="ui two column grid container stackable m-b-10">

        <div class="five wide column">
            <div class="ui segment basic">
                <div class="ui vertical steps">
                <div class="active step">
                    <i class="user icon"></i>
                    <div class="content">
                    <div class="title">Personal</div>
                    <div class="description">Enter your Personal Details</div>
                    </div>
                </div>
                <div class="step">
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
                <h4 class="ui whiteS">Basic Information</h4>
            </div>
            <div class="ui very padded segment">
                <!--<h4 class="ui horizontal divider header">
                <i class="tag icon"></i>BASIC INFORMATION
            </h4>-->
            <form class="ui form" action="" method="POST">
                <div class="three fields">
                    <div class="eight wide field">
                        <label>Residence Type</label>
                            <select class="ui fluid dropdown" name="type">
                                <option value="">Select Category</option>
                                <option value="Tenant">Tenant</option>
                                <option value="Landlord">Landlord</option>
                            </select>
                    </div>
                    <div class="four wide field">
                        <label>Title</label>
                        <select class="ui fluid dropdown" name="title">
                            <option value="">Select title</option>
                            <option value="Mr.">Mr.</option>
                            <option value="Ms.">Ms.</option>
                            <option value="Mrs.">Mrs.</option>
                            <option value="Dr.">Dr.</option>
                            <option value="Prof.">Prof.</option>
                        </select>
                    </div>
                    <div class="four wide field">
                        <label>Choose Avatar</label>
                            <select class="ui fluid search dropdown" name="avatar">
                                <option value="">Choose Avatar</option>
                                <option value="lena.png">Lena Avatar</option>
                                <option value="mark.png">Mark Avatar</option>
                                <option value="lindsay.png">Lindsay Avatar</option>
                                <option value="matthew.png">Matthew Avatar</option>
                                <option value="molly.png">Molly Avatar</option>
                                <option value="rachel.png">Rachel Avatar</option>
                            </select>
                    </div>
                </div>
                <div class="field">
                    <div class="three fields">
                        <div class="field">
                        <label>First Name</label>
                            <input type="text" name="fname" placeholder="First Name">
                        </div>
                        <div class="field">
                            <label>Middle Name</label>
                            <input type="text" name="mname" placeholder="Middle Name">
                        </div>
                        <div class="field" data-inverted="teal" data-tooltip="This will also be your default Password, you can change it later" data-position="top center">
                            <label>Last Name/Surname</label>
                            <input type="text" name="lname" placeholder="Last Name">
                        </div>
                    </div>
                </div>
                <div class="fields">
                    <div class="seven wide field">
                        <label>Gender</label>
                        <select class="ui fluid dropdown" name="sex">
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="nine wide field">
                        <label>Date of Birth</label>
                        <div class="ui calendar" id="dob">
                            <div class="ui input left icon">
                            <i class="calendar icon"></i>
                            <input type="text" name="dob" placeholder="Date of Birth">
                            </div>
                        </div>
                    </div>
                </div>
                <button class="ui basic positive right labeled icon button" tabindex="0" type="submit"><i class="right arrow icon"></i>Continue</button>
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