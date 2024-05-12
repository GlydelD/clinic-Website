<?php

    $conn = mysqli_connect("localhost","root","","patients");
    
    if ($conn->connect_error) {
        die("Fatal error, unable to connect to database : ". $conn->connect_error);
    }

    $query = "select * from `patients-info`";
    $result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/homePatientsReportsInsertion.css">
    <title>Patients Information Table</title>
    <style>
      
        :root {
            --1color: #164863;
            --2color: #427D9D;
            --3color:#9BBEC8;
            --4color: #DDF2FD;

            }

        .main-container {
            width: 100vw;
            height: 100vh;
            background-repeat: no-repeat;
            position: absolute;
        }
        

        .table-container {
            box-shadow: 1px 1px 5px black;
            width: 95vw;
            height:83vh;
            margin: 5vh auto;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 20px;
        }

        .table-title {
            width: 95vw;
            height: 16.1vh;
            background-color:var(--2color);
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;            
            padding-top: -1vh;

        }

        .title {
            text-align: center;
            color: white;
            padding-top: 1vh;


        }

        th {
            background-color:var(--2color);
            color: white;
            padding-bottom: 1vh;
            padding-top: 1vh;
            margin-left:10vw;
        }

        th, td {
            padding-left: 1.2vw;
            padding-right: 1.5vw;
            font-size: 1.8vh;
            text-align: center;
        }

        td {
            font-size: 1.5vh;
            font-weight: bold;
            background-color: white;
        }

        #display-data {
            border-collapse: collapse;
            
        }

        .validate-btn {
            background-color: green;
            padding: 1vh 2vh;
            border: 0;
            border-radius: 4px;
            cursor: pointer;
        }

        .validate-btn:hover {
            background-color: darkgreen;
        }

        .delete-btn {
            background-color:var(--1color);
            padding: 1vh 2vh;
            border: 0;
            border-radius: 4px;
            cursor: pointer;
        }

        .delete-btn:hover {
            background-color:var(--2color);
        }

        a {
            color: white;
            text-decoration: none;
        }

        
        .prompt-container {
            position: fixed;
            width: 25vw;
            height: 20vh;
            background-color: white;
            border-radius: 10px;
            margin-left: 50%;
            transform: translate(-50%, 0);
            margin-top: 35vh;
            box-shadow: 1px 1px 5px black;
            z-index: 5;
            display: none;
        }

        #close-btn {
            width: 4vh;
            height: 4vh;
            position: absolute;
            right: 0;
            top: 0;
            font-weight: bolder;
            color:var(--1color);
        }

        #close-btn:hover {
            cursor: pointer;
            color:var(--1color);
        }


    </style>
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
            <div class="name"> Clinic</div>
            <i class="ddown2"></i>
        </div>
        <div class="dropdown-content2">
            <a href="login-Admin.html" class="icon2"><img src="media/logout.png"> Logout </a>
        </div>
        </div>
    </div>
    <!-- =======================================CONTENT==================================== -->

    <div class="main-container">
      <div class="prompt-container" id="prompt">
          <div class="content">
              <div id="close-btn" onclick="closeOpen()">X</div>
              <?php
                  if(isset($_GET['success'])){ ?>
                      <style>
                          #prompt {
                              display: block;
                              text-align: center;
                          }
                      </style>
                      <p style="margin-top: 8vh; olor:var(--1color);
            ; font-weight: bolder;"><?php echo ($_GET['success']); ?></p>
                      
  
              <?php } ?>
          </div>
      </div>
          <div class="table-container">
              <div class="table-title">
                  <h1 class="title">Patients Information</h1>
                  <table id="display-data" align=center>
                      <tr>
                          <th style="border-top-left-radius: 5px">Student ID </th>
                          <th>Firstname</h>
                          <th>Middlename</th>
                          <th>Lastname</th>
                          <th>Age</th>
                          <th>Sex</th>
                          <th>Birthdate</th>
                          <th>Course</th>
                          <th>Address</th>
                          <th>Contact Number</th>
                          <th>ParentName</th>
                          <th>Parent Contact Number</th>
                          <th>Update</th>
                              <th style="border-top-right-radius: 5px">Delete</th>
                      </tr>
                      <tr>
                      <?php
                          while ($row = mysqli_fetch_assoc($result)){
                          ?>
                          <td><?php echo $row['idNumber']; ?></td>
                          <td><?php echo $row['firstName']; ?></td>
                          <td><?php echo $row['midName']; ?></td>
                          <td><?php echo $row['lastName']; ?></td>
                          <td><?php echo $row['age']; ?></td>
                          <td><?php echo $row['sex']; ?></td>
                          <td><?php echo $row['birthdate']; ?></td>
                          <td><?php echo $row['course']; ?></td>
                          <td><?php echo $row['address']; ?></td>
                          <td><?php echo $row['cNumber']; ?></td>
                          <td><?php echo $row['parentName']; ?></td>
                          <td><?php echo $row['parentCNumber']; ?></td>
                          <td><button class="delete-btn" onclick="confirmDelete(<?php echo $row['idNumber']; ?>)">Update</button></td>
                          <td><button class="delete-btn" onclick="confirmDelete(<?php echo $row['idNumber']; ?>)">Delete</button></td>
                          </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <script>
        function closeOpen() {
            var g = document.getElementById("prompt");

            if(g.style.display === "none" || g.style.display === "") {
                g.style.display = "block";
            } else {
                g.style.display = "none";
            }
        }
        function confirmDelete(id) {
            var confirmDelete = confirm("Are you sure you want to delete this entry?");
            if (confirmDelete) {
                window.location.href = "delete.php?deleteid=" + id;
            }
        }
    </script>
</body>