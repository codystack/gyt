<?php
session_start();
// Connect database
include "./config/db.php";



// Application Request Script
if (isset($_POST['request_btn'])) {

    $fullName = $conn->real_escape_string($_POST['fullName']);
    $companyName = $conn->real_escape_string($_POST['companyName']);
    $email = $conn->real_escape_string($_POST['email']);


    // Insert informations if there are no errors in the form
    $query = "INSERT INTO application (fullName, companyName, email) 
                VALUES('$fullName', '$companyName', '$email')";
    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) > 0) {

        $_SESSION['success_message'] = "Application form request sent!";
        echo "<meta http-equiv='refresh' content='3; URL=get-started'>";
    }else {
        $_SESSION['error_message'] = "Error processing application".mysqli_error($conn);
        echo "<meta http-equiv='refresh' content='5; URL=get-started'>";
    }
}