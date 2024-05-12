<?php
    $conn = mysqli_connect("localhost", "root", "", "patients");

    if ($conn->connect_error) {
        die("Fatal error, unable to connect to database: " . $conn->connect_error);
    }

    $idNumber = $firstName = $midName = $lastName = "";

    if(isset($_GET['search-btn']) && isset($_GET['search-field'])){
        $idNumber = $_GET['search-field'];

        $dbinfo = "SELECT idNumber, firstName, midName, lastName FROM `patients-info` WHERE idNumber='$idNumber'";
        $result = mysqli_query($conn, $dbinfo);
        
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $disp = mysqli_fetch_array($result);

                $firstName = $disp['firstName'];
                $midName = $disp['midName'];
                $lastName = $disp['lastName'];
                $idNumber = $idNumber;

                if(isset($_GET['confirm-btn'])) {
                    header("Location: homePatientsReports.php?id=$idNumber");
                    exit();
                }

            } else {
                echo "No records found for ID: $idNumber";
            }
            mysqli_free_result($result);
        } else {
            echo "Error executing query: " . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home-Patient-Reports-Style.css">
    <link rel = "shortcut icon" type = "icon" href = "media/logo.png">
    <title>Patient Report Confirmation</title>
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
            <div class="search-container">
            <form method="GET">
                <button id="search-btn" name="search-btn" type="submit">Search</button>
                <input type="search" name="search-field" placeholder="Search Student ID">
                <div  id="patients-Label">
                    <p>Patient's Report Confirmation</p>
               </div>  
            </div>

            <table id="table-form">
                <tr>
                    <td style="text-align: left;">Student ID: </td>
                    <td style="text-align: left;" id="idNumber"><?php echo $idNumber ?></td>
                </tr>
                <tr>
                    <td style="text-align: left;">Firstname: </td>
                    <td style="text-align: left;" id="firstName"><?php echo $firstName ?></td>
                </tr>
                <tr>
                    <td style="text-align: left;">Middlename: </td>
                    <td style="text-align: left;"   id="midName"><?php echo $midName ?></td>
                </tr>
                <tr>
                    <td style="text-align: left;">Lastname: </td>
                    <td style="text-align: left;" id="lastName"><?php echo $lastName ?></td>
                </tr>
                <tr>
                    <td colspan="2"> 
                        <?php if (!empty($firstName) && !empty($midName) && !empty($lastName)) { ?>
                            <a href="homePatientsReports.php?confirm-btn=true&id=<?php echo $idNumber; ?>" class="patientsConfirmButton">Confirm</a>
                            <?php } else { ?>
                            <a class="patientsConfirmButton">Confirm</a>
                        <?php } ?>
                    </td>
                </tr>
            </table>
        </form>
        </div>            
        </div>
</body>
</html>
