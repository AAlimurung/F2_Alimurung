<!-- for the list of events in admin account -->
<?php
    include 'connect.php';
?>

<head>
    <meta charset="UTF-8">
    <title>CONquest: Event Planner</title>
    <link href="css/common-styles.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <?php
    	include('includes/header.php');
    ?>  
    <div class="list-event">
        <?php
            if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] === true){
                    
                echo '
                    <div class="for-admin">
                        <a href="event.php">
                            <span>Create Event</span>
                        </a>
                        <a href="your_events.php">
                            <span>Your Events</span>
                        </a>
                    </div>
                    ';
                }
            ?>   
            
            <?php
            $ctr = 1;
            $sql_events ="Select * from tblevent";
            $all_events = mysqli_query($connection,$sql_events);
        ?>
        <table class="table" cellspacing="1" width="75%">
            <center>
                <h1> Events </h1>
            </center>
            <thead>
                <tr>
                    <th>Seq. No.</th>
                    <th>Event Name</th>
                    <th>Event Type</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Venue</th>
                </tr>
            </thead>
            <tbody>

                <?php
                    while($row = $all_events->fetch_assoc()):
                ?>
            
                <tr>
                    <td><?= $ctr++; ?> </td>
                    <td><?= $row['eventName']; ?> </td>
                    <td><?= $row['eventType']; ?> </td>
                    <td><?= $row['date']; ?> </td>
                    <td><?= $row['time']; ?> </td>
                    <td><?= $row['venue']; ?> </td>
                    <td>
                        <a href="includes/deleteEvents.php?eventID=<?=$row['eventID'];?>">Delete</a>
                    </td>
                </tr>
                
                <?php endwhile;?>
                
            </tbody>
        </table>
    </div>

    <?php
    	include('includes/footer.php');
    ?>
</body>

