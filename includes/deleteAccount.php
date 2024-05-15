<?php
    include("../connect.php");
    $isDeleted = 1;
    $sql_cancel = $connection->prepare("UPDATE FROM tblaccount WHERE accountID='".$_GET['accountID']."'");
    $sql_cancel->bind_param("i", $isDeleted);
    // $all_admin = mysqli_query($connection, $sql_cancel);
    $sql_cancel->execute();
    header("location:../logout.php");
?>