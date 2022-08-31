<?php
session_start();
// Connect database
include "./config/db.php";



// Application Request Script
if (isset($_POST['request_btn'])) {

    $userID = $conn->real_escape_string($_POST['userID']);
    $companyName = $conn->real_escape_string($_POST['companyName']);
    $titleHeld = $conn->real_escape_string($_POST['titleHeld']);
    $companyAddress = $conn->real_escape_string($_POST['companyAddress']);
    $telephone = $conn->real_escape_string($_POST['telephone']);
    $mobile = $conn->real_escape_string($_POST['mobile']);
    $fax = $conn->real_escape_string($_POST['fax']);
    $companyPrincipalBusiness = $conn->real_escape_string($_POST['companyPrincipalBusiness']);
    $yearsInBusiness = $conn->real_escape_string($_POST['yearsInBusiness']);
    $typeOfCompany = $conn->real_escape_string($_POST['typeOfCompany']);
    $ownershipStructure = $conn->real_escape_string($_POST['ownershipStructure']);
    $numberOfYearsInBusiness = $conn->real_escape_string($_POST['numberOfYearsInBusiness']);
    $companySize = $conn->real_escape_string($_POST['companySize']);
    $stockExchange = $conn->real_escape_string($_POST['stockExchange']);
    $status = $conn->real_escape_string($_POST['status']);


    $check_form_query = "SELECT * FROM business WHERE userID='".$_SESSION['id']."'";
    $result = mysqli_query($conn, $check_form_query);
    if (mysqli_num_rows($result) > 0) {
        echo "<meta http-equiv='refresh' content='5; URL=application'>";
    }else {
        // Finally, insert business informations if there are no errors in the form
        $query = "INSERT INTO business (userID, companyName, titleHeld, companyAddress, telephone, mobile, fax, companyPrincipalBusiness, yearsInBusiness, typeOfCompany, ownershipStructure, numberOfYearsInBusiness, companySize, stockExchange, status) 
  			        VALUES('$userID', '$companyName', '$titleHeld', '$companyAddress', '$telephone', '$mobile', '$fax', '$companyPrincipalBusiness', '$yearsInBusiness', '$typeOfCompany', '$ownershipStructure', '$numberOfYearsInBusiness', '$companySize', '$stockExchange', 'Filled')";
        mysqli_query($conn, $query);
        if (mysqli_affected_rows($conn) > 0) {

            $_SESSION['success_message'] = "Business Infromation Completed!";
            echo "<meta http-equiv='refresh' content='3; URL=application'>";
        }else {
            $_SESSION['error_message'] = "Error processing application".mysqli_error($conn);
            echo "<meta http-equiv='refresh' content='5; URL=application'>";
        }
    }
}