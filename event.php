<?php
    include 'connect.php';
?>

<link href="css/common-styles.css" type="text/css" rel="stylesheet">
<link href="css/create-event-styles.css" type="text/css" rel="stylesheet">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

<body>
    <?php
    	include('includes/header.php');
    ?>
    
    <div class="for-admin">
        <a href="report-page.php">
            <span>Event Dash</span>
        </a>
        <a href="your_events.php">
            <span>Your Events</span>
         </a>
        </div>
                 
    <div class="main">

        <form action="" method="POST">
            <h3>Create Event</h3>
            <div>
                <label for="event-name">Event Name</label>
                <input type="text" name="event-name" id="first-name">
            </div>
            <div>
                <label for="event-type">Event Type</label>
                <input type="text" name="event-type" id="event-type">
                </div>
            <div>
                <label for="date">Date</label>
                <input type="date" name="date" id="date">
            </div>
            <div>
                <label for="time">Time</label>
                <input type="time" name="time" id="time">
            </div>
            <div id="venue">
                <label for="address">Venue</label>
                <input type="text" name="venue" id="address">
                <!-- <input type="text" id="city"  placeholder="Street Address" placeholder="City"> -->
            </div>
            <button name="create" type="submit">CREATE</button>
        </form>

    </div>

    <?php
        if(isset($_POST['create'])){
            $eventName = $_POST['event-name'];
            $eventType = $_POST['event-type'];
            $eventDate = $_POST['date'];
            $eventTime = $_POST['time'];
            $eventVenue = $_POST['venue'];
    
            $adminID = $_SESSION['adminID'];
    
            $sql1 = "SELECT * FROM tblevent WHERE eventName=? AND eventType=?";
            $stmt = $connection->prepare($sql1);
            $stmt->bind_param("ss", $eventName, $eventType);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->num_rows;
    
            if($row == 0){
                $sql ="INSERT INTO tblevent(adminID, eventName, eventType, date, time, venue) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $connection->prepare($sql);
                $stmt->bind_param("isssss", $adminID, $eventName, $eventType, $eventDate, $eventTime, $eventVenue);
                $stmt->execute();
                echo "<script language='javascript'>
                            alert('New record saved.');
                      </script>";
                // Remove header() call from here
            }else{
                echo "<script>
                        var x = document.getElementById('exist');
                        x.innerHTML = '*Event already exists';
                      </script>";
            }
        }
    ?>

    <?php
    	include('includes/footer.php');
    ?>
</body>