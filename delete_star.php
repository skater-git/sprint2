<?php 

 require 'conn.php'; 
$id = $_GET['s_id'];
$sql = "DELETE FROM stars WHERE s_id='$id'";

if (mysqli_query($conn, $sql)) {
    header('Location: index.php');
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
?>