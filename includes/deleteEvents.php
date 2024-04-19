<?php
    include('../connect.php');
    $sql = "DELETE FROM tblevent WHERE eventID='".$_GET['eventID']."'";
    $all_admin = mysqli_query($connection, $sql);
    header("location:../index.php");
?>