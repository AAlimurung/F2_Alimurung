<?php
    include("../connect.php");
    $eventName = $_GET['eventName'];
    $eventID = $_GET['eventID'];
    $res = NULL;

    $sql_query = "SELECT eventID, eventName, eventStatus FROM tblevent WHERE eventID != $eventID && eventStatus = 1";
    try {
        $res = mysqli_query($conn, $sql_query);
    }catch(Exception $e) {
        echo "Something went wrong...";
    }

    $ctr = 1;
    while ($row = mysqli_fetch_array($res)) {
        $counter = ($row['eventStatus'] == 1) ? "text-confirm": "text-danger";
        $archiveStatus = $row["eventStatus"] == 1 ?"Archive" : "Archived";
        echo'
        <tr>
            <td>'.$ctr++.'</td>
            <td class = "'.$counter.'">'.$archiveStatus.'</td>
            <td><a href="includes/deleteEvents.php?eventStatus='.$row['eventID'].'&eventName='.$eventName.'&eventID='.$eventID.'" class="btn btn-success">Enable Event</a></td>
        </tr>';
    }
?>