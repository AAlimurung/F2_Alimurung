<?php
    $mysqli = new mysqli('localhost', 'root','', 'dbalimurungf2') or die(mysqli_error($mysqli);)

    if(isset($_POST['btnAdd'])){
        $eventID = $_POST['eventID'];
        $eventName = $_POST['eventName'];
        $eventType = $_POST['eventType'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $description = $_POST['description'];
        
        $mysqli->query("INSERT into tbleven ($eventID, $eventName, $eventType, $date, $time, $description) values ('$eventID', '$eventName', '$eventType', '$date', '$time', '$description')") or die(mysqli_error($mysqli));
        header("Location: event.php");
    }

?>