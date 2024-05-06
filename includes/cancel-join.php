<?php
    include("../connect.php");
    $stmt_remove = $connection->prepare("DELETE FROM tbluserevents WHERE userID=? AND eventID=?");
    $stmt_remove->bind_param("ii", $_SESSION["userID"], $_GET["eventID"]);
    $stmt_remove->execute();

    header("location: ../profile.php");
?>