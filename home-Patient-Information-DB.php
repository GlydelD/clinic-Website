<?php

session_start();

$conn = mysqli_connect('localhost', 'root', '', 'patients');

if ($conn->connect_error) {
    die('Fatal error, unable to connect to database : ' . $conn->connect_error);
} else {
    if (isset($_POST["submit-btn"])) {

        $firstName = $_POST['firstName'];
        $midName = $_POST['midName'];
        $lastName = $_POST['lastName'];
        $age = $_POST['age'];
        $sex = $_POST['sex'];
        $birthdate = $_POST['birthdate'];
        $course = $_POST['course'];
        $address = $_POST['address'];
        $cNumber = $_POST['cNumber'];
        $parentName = $_POST['parentName'];
        $parentCNumber = $_POST['parentCNumber'];

        $query = "INSERT INTO `patients-info` (firstName, midName, lastName, age, sex, birthdate, course, address, cNumber, parentName, parentCNumber)
        VALUES ('$firstName', '$midName', '$lastName', '$age', '$sex', '$birthdate', '$course', '$address', '$cNumber', '$parentName', '$parentCNumber')";

        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            $_SESSION['patientInformation_saved'] = true;
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Details</title>

    <style>

        :root {
            --1color: #164863;
            --2color: #427D9D;
            --3color:#9BBEC8;
            --4color: #DDF2FD;

            }

        body {
            background-image: url(media/bg.png);
            padding: 0;
            margin: 0;
            font-family: Open Sans;
        }
        .container {
            width: 30vw;
            height: 25vh;
            background-color: white;
            border-radius: 10px;
            position: fixed;
            top: 0;
            margin-top: 35vh;
            margin-left: 50%;
            transform: translate(-50%, 0);
            box-shadow: 2px 2px 5px #000;
        }

        .header-title {
            background-color:var(--2color);
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            height: 6vh;
            font-size: 4vh;
            color: white;
            font-weight: bolder;
            text-align: center;
        }

        h1 {
            margin-top: 5vh;
            font-size: 2.5vh;
            text-align: center;
        }

        p {
            text-align: center;
        }

        p:before {
            font-size: 2vh;
            text-align: center;
            color: blue;
            content: "This page will automatically reload please wait . .";
            animation: dotdotdot 3s infinite;
        }

        @keyframes dotdotdot {
            0% {content: "This page will automatically reload please wait . . ."};
            33% { content: "This page will automatically reload please wait . .";}
            66% {content: "This page will automatically reload please wait ."}
        }
        
    </style>
</head>
<body>
<?php
    if (isset($_SESSION['patientInformation_saved']) && $_SESSION['patientInformation_saved'] === true) {
        echo '
            <div class="container" id="container">
                <div class="header-title"> </div>
                <h1>Patient Information Submitted !</h1>
                <p></p>
            </div>

            <script>
                redirect_Page();
                
                function redirect_Page() {
                    var redirector = setTimeout(function () {
                        window.location.href = "homePatientsInformations.html";
                        window.clearTimeout(redirector);
                    }, 2000);
                }
            </script>';
        unset($_SESSION['patientInformation_saved']);
    }
    ?>
    </script>
</body>
</html>