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

    <div class="main">
        <!-- kani sha kay mu appear if admin ka -->
        <!-- so make a condition where if the user's admin status 
            is admin, then appear;
            else not appear -->
        <?php
            if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] === true){
                echo '
                <div class="for-admin">
                    <a href="event.php">
                        <span>Create Event</span>
                    </a>
                    <a href="your-events.php">
                        <span>Your Events</span>
                    </a>
                </div> ';
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
        </table>
    </div>

    <?php
    	include('includes/footer.php');
    ?>
</body>