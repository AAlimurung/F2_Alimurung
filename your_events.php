<!-- for the list of events in admin account -->
<!-- events.php sa file ni ninya -->
<?php
    include 'connect.php';
?>

<link rel="stylesheet" href="css/events-styles.css" type="text/css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body>
    <?php
    	require_once 'includes/header.php';
    ?>  
    <div class="list-event">
    <?php
            if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] === true){
                    
                echo '
                    <div class="for-admin">
                        <a href="event.php">
                            <span>Create Event</span>
                        </a>
                        <a href="report-page.php">
                            <span>Your Events</span>
                        </a>
                    </div>
                    ';
                }
            ?>  

    <center>
        <h1>REPORT PAGE</h1>
    </center>
        
        <?php
            $ctr = 1;
            $sql_events ="Select eventName, eventType from tblevent";
            $all_events = mysqli_query($connection,$sql_events);
        ?>

        <table class="table" cellspacing="1" width="75%">
            <center>
                <h1> All Events </h1>
            </center>
            <thead>
                <tr>
                    <th>Seq. No.</th>
                    <th>Event Name</th>
                    <th>Event Type</th>
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
                    <!-- <td><?= $row['date']; ?> </td>
                    <td><?= $row['time']; ?> </td>
                    <td><?= $row['venue']; ?> </td> -->
                </tr>
                
                <?php endwhile;?>
                
            </tbody>
        </table>


        <!-- //////////////////////////////////////////////////// -->
        <?php
            $ctr = 1;
            // $sql_events ="Select * from tblevent";
            // $sql_events = "SELECT tblevent.eventID, tblevent.eventName, tblevent.eventType, tblevent.date, tblevent.time, tblevent.venue FROM tblevent INNER JOIN tbladminaccount ON tblevent.adminID = tbladminaccount.adminID";
            $sql_events = "SELECT e.eventName
               FROM tblevent AS e
               INNER JOIN tbladminaccount AS a ON e.adminID = a.adminID 
               WHERE e.adminID = a.adminID";
            $all_events = mysqli_query($connection,$sql_events);
        ?>

        <table class="table" cellspacing="1" width="75%">
            <center>
                <h1> By You </h1>
            </center>
            <thead>
                <tr>
                    <th>Seq. No.</th>
                    <th>Event Name</th>
                </tr>
            </thead>
            <tbody>

                <?php
                    while($row = $all_events->fetch_assoc()):
                ?>
            
                <tr>
                    <td><?= $ctr++; ?> </td>
                    <td><?= $row['eventName']; ?> </td>
                    <!-- <td><?= $row['eventType']; ?> </td>
                    <td><?= $row['date']; ?> </td>
                    <td><?= $row['time']; ?> </td>
                    <td><?= $row['venue']; ?> </td> -->
                </tr>
                
                <?php endwhile;?>
                
            </tbody>
        </table>

        <?php
        
            $sql_events = "SELECT count(adminID) FROM tbladminaccount";
            $all_events = mysqli_query($connection,$sql_events);
        ?>

        <center>
            <h1>Number of Admins</h1>
            <h2><?=$all_events->fetch_column()?></h2>
        </center>
     
            
        <?php
            // $ctr = 1;
            // $adminID = $_SESSION['adminID'];
            $sql_events ="SELECT organizationName FROM tblorganization WHERE organizationName = 'testing5'";
            $all_orgs = mysqli_query($connection, $sql_events);
        ?>
        <!-- <table class="table" cellspacing="1" width="75%">
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
        </table> -->

        
        <table class="table" cellspacing="1" width="75%">
            <center>
                <h1> Organization </h1>
                <h2><?=$all_orgs->fetch_column()?></h2>
            </center>
            <!-- <thead>
                <tr>
                    <th>Seq. No.</th>
                    <th>Event Name</th>
                    <th>Event Type</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Venue</th>
                </tr>
            </thead>
            <tbody> -->

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
                    <!-- <td>
                        <a href="includes/deleteEvents.php?eventID=<?=$row['eventID'];?>">Delete</a>
                    </td> -->
                </tr>
                
                <?php endwhile;?>
                
            </tbody>
        </table>

        <!-- <?php
            $ctr = 1;
            $sql_user ="SELECT * FROM tbluseraccount";
            $all_user = mysqli_query($connection,$sql_user);
        ?>

        <table class="table" cellspacing="1" width="75%">
            <center>
                <h1> Users </h1>
            </center>
            <thead>
                <tr>
                    <th>Seq. No.</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                </tr>
            </thead>
            <tbody>

                <?php while($row = $all_user->fetch_assoc()): 
             
                    $sql_account ="SELECT * FROM tblaccount WHERE accountID='".$row['accountID']."'";
                    $account_result = mysqli_query($connection,$sql_account);
                    $user_account = mysqli_fetch_array($account_result);
                
                ?>
            
                <tr>
                    <td> <?= $ctr++; ?> </td>
                    <td> <?= $user_account['firstName']; ?> </td>
                    <td> <?= $user_account['lastName']; ?> </td>
                    <td> <?= $user_account['username']; ?> </td>
                    <td>
                        <a href="includes/deleteUser.php?userID=<?=$row['userID'];?>">Delete</a>
                    </td>
                </tr>
                
                <?php endwhile;?>
                
            </tbody>
        </table> -->
    </div>

    <?php
    	include('includes/footer.php');
    ?>
</body>

