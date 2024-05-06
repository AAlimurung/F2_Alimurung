<?php
    include("../connect.php");
    if(isset($_POST["save-changes"])){
        $fname = $_POST['firstName'];
        $lname = $_POST['lastName'];
        $email = $_POST['email'];
        $age = $_POST['age'];

        $stmt_common =  $connection->prepare("UPDATE tblaccount SET firstName = ?, lastName = ?, age = ?, email = ? WHERE accountID = ?");
        $stmt_common->bind_param("ssisi", $fname, $lname,  $age, $email, $_GET['accountID']);
        $stmt_common->execute();

        if(isset($_POST['password']) && $_POST['password'] != ' '){
            $hash_pword = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $stmt_common = $connection->prepare('UPDATE tblaccount SET password = ? WHERE accountID = ?');
            $stmt_common->bind_param('si', $hash_pword, $_GET['accountID']);
            $stmt_common->execute();
        }

        if(isset($_POST['org'])){
            try{
                $stmt_getAdmin = $connection->prepare('SELECT adminID FROM tbladminaccount WHERE accountID = ?');
                $stmt_getAdmin->bind_param('i', $_GET['accountID']);
                $stmt_getAdmin->execute();
                $theAdmin = $stmt_getAdmin->get_result()->fetch_column();

                $stmt_addOrg = $connection->prepare('INSERT INTO tblorganization(orgnaizationName) VALUES (?)');
                $stmt_adminOrg = $connection->prepare('INSERT INTO tbladminorganization(adminID, organizationID) VALUES(?,?)');

                foreach($_POST['org'] as $value){
                    $stmt_addOrg->bind_param('s', $value);
                    $stmt_addOrg->execute();
                    $orgID = $connection->insert_id;

                    $stmt_adminOrg->bind_param("ii", $theAdmin, $orgID);
                    $stmt_adminOrg->execute();
                }

                $connection->commit();
                echo '<script>console.log("Organizations added successfully!");</script>';
            }catch(Exception $e){
                $connection->rollback();
            }
        }
        header("location:../profile.php");
    }
?>