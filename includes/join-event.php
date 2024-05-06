<?php
    include("../connect.php");
    $userID = $_GET['userID'];
    $eventID = $_GET['eventID'];

    $stmt_toJoin = $connection->prepare("INSERT INTO tbluserevents(userID, eventID) VALUES (?, ?)");
    $stmt_toJoin->bind_param("ii", $userID, $eventID);
    $stmt_toJoin->execute();

    header("location:../event.php");
?>