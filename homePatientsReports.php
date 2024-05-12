    <?php
        $conn = mysqli_connect("localhost", "root", "", "patients");

        if ($conn->connect_error) {
            die("Fatal error, unable to connect to database: " . $conn->connect_error);
        }
        $fullName = "";
        $idNumber = "";


        if(isset($_GET['id'])){
            $id = $_GET['id'];

            $dbinfo = "SELECT idNumber, firstName, midName, lastName FROM `patients-info` WHERE idNumber='$id'";
            $result = mysqli_query($conn, $dbinfo);
            $disp = mysqli_fetch_array($result);
                
                    $firstName = $disp['firstName'];
                    $midName = $disp['midName'];
                    $lastName = $disp['lastName'];  
                    $idNumber = $disp['idNumber']; 

                    $fullName = $firstName . " " . $midName . " " . $lastName;

                    if(isset($_GET["patients-Save-Button"])) {
                        header("Location: home-Patient-Reports-DB.php?idNumber=$idNumber&fullName=$fullName");
                        exit();
                    }
        }
    ?>


    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/homePatientsReportsInsertion.css">
        <title>Patients Report</title>
        <link rel = "shortcut icon" type = "icon" href = "media/logo.png">

    </head>
    <body background="media/bg.png">

        <div class="navbar">
            <p>STUDENT HEALTH SERVICES CLINIC</p>

            <div class="dropdown">
            <div class="dropbtn"> 
                <div class="menu-icon"></div>
                <div class="menu-icon"></div>
                <div class="menu-icon"></div>
                <i class="ddown"></i> 
            </div>

            <div class="dropdown-content">
            <a href="homePatientsInformations.html" class="icon"><img src="media/person1.png"> Add Patients Information </a>
              <a href="homePatientsReportsConfirmation.php" class="icon"><img src="media/report1.png"> Add Patients Report </a>
              <a href="patients-Showing-Information.php" class="icon"><img src="media/person.png"> Patients  </a>
              <a href="patients-Showing-Reports.php" class="icon"><img src="media/report.png"> Reports </a>
              <!-- <a href="" class="icon"><img src="media/prospectus.png"> Prospectus </a> -->
           
            </div>
            </div>

            <div class="dropdown2">
            <div class="dropbtn2">  
                <div class="name-icon"><img src="media/person.png"></div>
                <div class="name"> Clinic   </div>
                <i class="ddown2"></i>
            </div>
            <div class="dropdown-content2">
                <a href="login-Admin.html" class="icon2"><img src="media/logout.png"> Logout </a>
            </div>
            </div>
        </div>

        <!--------------------------- HOME CONTENT ---------------------------------->
    
        <div class="patients-Reports-Cont" id="patients-reports-incont" >
            <div class="patients-info">
                    <div  id="patients-Label">
                        <p>Patient's Report</p>
                </div>
                
                <form method="post" action="home-Patient-Reports-DB.php?idNumber=<?php echo $idNumber ?>&fullName=<?php echo urlencode($fullName) ?>">
                <table id="table-form">
                    <tr>
                        <td style="text-align: left;">Student ID: </td>
                        <td id="idNumber" name="idNumber"><?php echo $idNumber ?></td>
                    
                    </tr>
                    <tr>
                        <td style="text-align: left;">Fullname: </td>
                        <td id = "fullName"  name="fullName"><?php echo $fullName ?> </td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Sickness: </td>
                        <td><input type="text" placeholder="Ex: Flu" required name="sickness" id="sickness"></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">History: </td>
                        <td><input type="text" placeholder="Ex: Influenza" required name="history" id="history"></td>
                    </tr> 
                    <tr>
                        <td style="text-align: left;">Treatment: </td>
                        <td><input type="text" placeholder="Ex: Oseltamivir" required name="treatment" id="treatment"></td>
                    </tr>              
                    <tr>
                        <td style="text-align: left;">Date: </td>
                        <td><input type="date" name="date" id="date"></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Time: </td>
                        <td><input type="time" name="time" id="time"></td>
                    </tr>
                    <tr>
                        <td colspan="2"> <button class="patientsSaveButton" name="patients-Save-Button" type="patientsSaveButton ">Save</button> </td>
                    </tr>
                    
                </table>
            </form>
            </div>            
            </div>

