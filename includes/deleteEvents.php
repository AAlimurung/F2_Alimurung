<script src="sweetalert2.all.min.js"></script>
<script>
    Swal.fire({
        icon: "warning",
        title: "Do you want to archive event?",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Archive"
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: "Archived!",
                text: "This event has been archived!",
                icon: "success"
            });
        }   
    });
</script>

<?php
    include('../connect.php');
    $eventStat = 1;
    $sql_cancel = $connection->prepare("UPDATE tblevent SET eventStatus = ? WHERE eventID=?");
    $sql_cancel->bind_param("ii", $eventStat, $_GET['$eventID']);
    $all_admin = mysqli_query($connection, $sql_cancel);
    header("location:../your_events.php");
?>