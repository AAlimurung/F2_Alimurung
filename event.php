<link href="css/common-styles.css" type="text/css" rel="stylesheet">
<link href="css/event-styles.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body>
    <?php
    	include('includes/header.php');
    	include 'connect.php';
    ?>
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
            $eventName = $_POST['event-name']; //di daw declared
            $evenType = $_POST['event-type']; //di daw declared
            $eventDate = $_POST['date'];
            $eventTime = $_POST['time'];
            $eventVenue = $_POST['venue'];
        }

        $sql1 = "SELECT * FROM tblevent WHERE eventName='$eventName' AND eventType='$eventType'";
        $result = mysqli_query($connection,$sql1);
        $row = mysqli_num_rows($result);
        if($row == 0){
            $sql ="Insert into tblevent(eventName, eventType, date, time, venue) values( ' ".$eventName." ',' ".$eventType." ',' ".$eventDate." ',' ".$eventTime." ',' ".$eventVenue."' )";
            mysqli_query($connection,$sql);
            echo "<script language='javascript'>
                        alert('New record saved.');
                  </script>";
            header("location: index.php");
        }else{
            echo "<script>
                    var x = document.getElementById('exist');
                    x.innerHTML = '*Username or Email Address already exist';
                  </script>";
                  //hey
        }

    ?>

    <?php
    	include('includes/footer.php');
    ?>
</body>