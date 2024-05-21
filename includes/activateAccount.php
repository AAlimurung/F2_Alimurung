<?php
    include '../connect.php';

    $sql_updateStatus = $connection->prepare("UPDATE tblaccount SET isDelete=0 WHERE accountID=?");
    $sql_updateStatus->bind_param("i", $_GET['accountID']);
    $sql_updateStatus->execute();

    header("location: ../report-link.php");
?>

<script src="sweetalert2.all.min.js"></script>
<script>
    Swal.fire({
        icon: "warning",
        title: "Do you want to activate this account?",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Activate"
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: "Activate!",
                text: "Your account has been deactivated.",
                icon: "success"
            });
        }   
    });
</script>