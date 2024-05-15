<?php
    include'connect.php';
?>
<link rel="stylesheet" href="css/events-styles.css" type="text/css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<body>
    <?php
        require_once 'includes/header.php';
    ?>

    <div class="main">
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
                    </div>
                    ';
                }
            ?>   
        <div class="for-events">
            <?php
                function isJoin($connection, $eventID) {
                    $statement_letsee = $connection->prepare("SELECT userID FROM tbluserevents WHERE userID=? AND eventID=?");
                    $statement_letsee->bind_param("ii", $_SESSION['userID'], $eventID);
                    $statement_letsee->execute();
                    $res = $statement_letsee->get_result();
                    return $res->num_rows > 0;
                }

                $Statement_allEvents = $connection->prepare("SELECT eventID, eventName, eventType, date, time, image FROM tblevent ORDER BY eventID DESC");
                $Statement_allEvents->execute();
                $res = $Statement_allEvents->get_result();
    
                while ($e = $res->fetch_assoc()):
            ?>
        
            <div class="event-container">
                <div class="event-bg">
                    <img src = "images/events/<?=$e['image'];?>">
                    <a class="view-details" href="event-details.php?eventID=<?=$e['eventID'];?>">View Details</a>
                    <div class="event-infos">
                        <div class="the-event">
                            <?=$e['eventName'];?>
                        </div>
                        <div class="the-event">
                            <div class="event-details">
                                <span>
                                    <?=$e['eventType'];?>
                                </span>
                                <br>
                                <!-- <br> -->
                                <?php
                                    if (!$_SESSION['isAdmin']){
                                        if (!isJoin($connection, $e['eventID'])){
                                            echo '
                                                <a class="not-joined" href="includes/joinEvent.php?userID='.$_SESSION['userID'].'&eventID='.$e['eventID'].'">
                                                    Join
                                                </a>
                                            ';
                                        } else {
                                            echo '
                                                <a class="has-joined">
                                                    Already Joined
                                                </a>
                                            ';
                                        }
                                    }
                                ?>
                            </div>
                            <div class="event-details">
                                <div>Date: <?= date('d M Y',strtotime($e['date']));?></div>
                                <div>Time:  <?= date('h:i A', strtotime($e['time']));?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>

    <?php
        require_once 'includes/footer.php';
    ?>
</body>