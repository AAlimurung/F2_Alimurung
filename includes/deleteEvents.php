<?php
    include ('../connect.php');
    // $sql="DELETE FROM tblevents WHERE eventID='".$_GET['eventID']."'";
    // mysqli_query($connection,$sql);
    $delete = true;
    $statement = $connection->prepare("UPDATE tblevent SET eventStatus = ? WHERE eventID=?");
    $statement->bind_param("ii", $delete, $_GET['eventID']);
    $statement->execute();
    // header("location: ../index.php");
    header("location: ../profile.php");
?>