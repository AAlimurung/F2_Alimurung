<?php
    include('../connect.php');
    $sql = "DELETE FROM tbluseraccount WHERE userID='".$_GET['userID']."'";
    $all_admin = mysqli_query($connection, $sql);
    header("location:../index.php");
?>