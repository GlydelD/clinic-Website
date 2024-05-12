<?php
$conn = new mysqli("localhost", "root", "", "try");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// mag check if na submit ba ang form
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['submit'])) {
    // kuhaon and gi input ni user sa form
    $name = $_GET['name'];
    $password = $_GET['password'];

    // check if the name and password present sa info na table
    $sql = "SELECT * FROM info WHERE name = 'maria' AND password = 'maria123'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
       
        $row = $result->fetch_assoc();
      
        if ($row['password'] == $password && $row['name'] == $name) {
            header("Location: homePatientsInformations.html");
            exit(); 
            echo "Invalid password or username. Please try again.";
        }
    } 
}

$conn->close();
?>
 