<?php
$enrollment = $_GET['enrollment'];
?>
<?php

$link = mysqli_connect("localhost", "root", "", "Holi");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 

$sql = "DELETE FROM Students WHERE enrollment='$enrollment'";
if(mysqli_query($link, $sql)){
    echo "Records were deleted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>
