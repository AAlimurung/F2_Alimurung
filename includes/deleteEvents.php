<?php
    include('../connect.php');
    $sql_cancel = $connection->prepare("UPDATE FROM tblevent WHERE eventID='".$_GET['eventID']."'");
    $sql_cancel->bind_param("i", $_GET['$eventID']);
    $all_admin = mysqli_query($connection, $sql_cancel);
    header("location:../your_events.php");
?>