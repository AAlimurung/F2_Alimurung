<script src="sweetalert2.all.min.js"></script>
<script>
    Swal.fire({
        icon: "warning",
        title: "Do you want to deactivate account?",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Deactivate"
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: "Deactivated!",
                text: "Your account has been deactivated.",
                icon: "success"
            });
        }   
    });
</script>

<?php
    include("../connect.php");
    //$accountToDelete = $_GET["isDeleted"];
    //$accountID = $_GET['accountID'];

    $isDeleted = 1;
    $sql_cancel = $connection->prepare("UPDATE tblaccount SET isDeleted = ? WHERE accountID=?");
    $sql_cancel->bind_param("ii", $isDeleted, $_GET['accountID']);
    // $all_admin = mysqli_query($connection, $sql_cancel);
    $sql_cancel->execute();
    header("location:../logout.php");
?>
