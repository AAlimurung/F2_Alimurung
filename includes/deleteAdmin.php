<?php
    include('../connect.php');
    $sql = "DELETE FROM tbladminaccount WHERE adminID ='".$_GET['adminID']."'";
    $all_admin = mysqli_query($connection, $sql);
    header("location:../index.php");
?>