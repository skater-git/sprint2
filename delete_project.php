<?php 

 require 'conn.php'; 
$id = $_GET['p_id'];
$sql = "DELETE FROM projects WHERE p_id='$id'";

if (mysqli_query($conn, $sql)) {
    header('Location: project_list.php');
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

$sql_emp = "UPDATE stars SET project_id ='1' WHERE project_id ='$id'";
if (mysqli_query($conn, $sql_emp)) {
    header('Location: project_list.php');
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
?>