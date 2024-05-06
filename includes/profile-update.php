<?php
    include("../connect.php");
    if(isset($_POST["save-changes"])){
        $fname = $_POST['firstName'];
        $lname = $_POST['lastName'];
        $email = $_POST['email'];
        $age = $_POST['age'];

        $stmt_common =  $connection->prepare("UPDATE tblaccount SET firstName = ?, lastName = ?, age = ?, email = ? WHERE accountID = ?");
    }
?>