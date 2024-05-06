<?php
    include("../connect.php");
    $deleteUser = $connection->prepare("DELETE FROM tbluseraccount WHERE accountID = ?");
    $deleteUser->bind_param("i", $_GET["accountID"]);
    $deleteUser->execute();

    $insertToAdmin = $connection->prepare("INSERT INTO tbladminaccount (accountID) VALUES(?)");
    $insertToAdmin->bind_param("i", $_GET["accountID"]);
    $insertToAdmin->execute();
    $adminID = $connection->insert_id;

    $isAdmin = true;
    $updateStatus = $connection->prepare("UPDATE tbladminStatus SET isAdmin = ? WHERE accountID = ?");
    $updateStatus->bind_param("ii", $isAdmin, $_GET["accountID"]);
    $updateStatus->execute();

    $_SESSION['isAdmin'] = true;
    $_SESSION['adminID'] = $adminID;
    header('location: ../edit-profile.php');
?>