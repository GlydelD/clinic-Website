<?php
// Database connection parameters
// $servername = "localhost";
// $db_username = "root";
// $db_password = "";
// $db_name = "clinic_admin";

$conn = new mysqli("localhost", "root", "", "clinic_admin");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin_users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $user_data = mysqli_fetch_assoc($result);
        if ($user_data['password'] == $password) {
            // echo "Login successful!";
            header("Location: homePatientsInformations.html");
            die;
        } else {
            echo "<script type='text/javascript'> alert('Invalid password'); </script>";
        }
    } else {
        echo "<script type='text/javascript'> alert('Invalid username'); </script>";
    }
}

$conn->close();
?>
