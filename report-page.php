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
            $sql_events = "SELECT eventName FROM tblevent WHERE adminID=5 ORDER BY eventID DESC";
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
                </tr>
                
                <?php endwhile;?>
                
            </tbody>
        </table>

        <?php
            $ctr = 1;
            $sql_orgs ="SELECT age, username FROM tblaccount WHERE age <=20";
            $all_orgs = mysqli_query($connection, $sql_orgs);
        ?>

        <table class="table" cellspacing="1" width="75%">
            <center>
                <h1> Accounts by Age </h1>
            </center>
            <thead>
                <tr>
                    <th>Seq. No.</th>
                    <th>Age</th>
                    <th>Username</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($row = $all_orgs->fetch_assoc()):
                ?>
            
                <tr>
                    <td><?= $ctr++; ?> </td>
                    <td><?= $row['age']; ?> </td>
                    <td><?=$row['username'];?></td>
                </tr>
                
                <?php endwhile;?>
                
            </tbody>
        </table>

        <!-- all admins count -->
        <?php
        
            $sql_events = "SELECT count(adminID) FROM tbladminaccount";
            $all_events = mysqli_query($connection,$sql_events);
        ?>
        <center>
            <h1>Number of Admins</h1>
            <h2><?=$all_events->fetch_column()?></h2>
        </center>

    <?php
    	include('includes/footer.php');
    ?>
</body>