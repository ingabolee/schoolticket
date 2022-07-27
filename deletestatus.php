<?php
session_start();
include 'config.php';

$Ticket_status_id = $_GET["id"];

$sql = "DELETE FROM ticket_status WHERE Ticket_status_id  = '$Ticket_status_id'";
$result = mysqli_query($conn, $sql);

if ($result){
    if ($_SESSION['Role_id'] == "1"){
        header("Location: adminticket.php");
    } elseif($_SESSION['Role_id'] == "3"){
        header("Location: departmentticket.php");
    }

}
else{
    echo "<p>Unable to delete element.</p>";
}


?>