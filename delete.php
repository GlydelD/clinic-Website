<?php

$conn = mysqli_connect("localhost","root","","patients");

if ($conn->connect_error) {
    die("Fatal error, unable to connect to database : ". $conn->connect_error);
}

if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];

    $sqls_info = "DELETE FROM `patients-info` WHERE idNumber = ?";
    $stmt_info = mysqli_prepare($conn, $sqls_info);
    mysqli_stmt_bind_param($stmt_info, "i", $id);
    $result_info = mysqli_stmt_execute($stmt_info);

    $sqls_report = "DELETE FROM `patients-report` WHERE idNumber = ?";
    $stmt_report = mysqli_prepare($conn, $sqls_report);
    mysqli_stmt_bind_param($stmt_report, "i", $id);
    $result_report = mysqli_stmt_execute($stmt_report);

    if($result_info && $result_report) {
        header("Location: patients-Showing-Information.php?success=Student $id Deleted Successfully!");
    } else {
        header("Location: patients-Showing-Information.php?success=Not deleted!");
    }

    mysqli_stmt_close($stmt_info);
    mysqli_stmt_close($stmt_report);
}

mysqli_close($conn);

?>
