<?php
require_once '../../config.php';
 
// Escape user inputs for security
$id = mysqli_real_escape_string($link, $_REQUEST['id']);
$title = mysqli_real_escape_string($link, $_REQUEST['title']);
$description = mysqli_real_escape_string($link, $_REQUEST['description']);
$address = mysqli_real_escape_string($link, $_REQUEST['address']);
$lat = mysqli_real_escape_string($link, $_REQUEST['lat']);
$lng = mysqli_real_escape_string($link, $_REQUEST['lng']);
$openinghour = mysqli_real_escape_string($link, $_REQUEST['openinghour']);
$closinghour = mysqli_real_escape_string($link, $_REQUEST['closinghour']);
// Perform query
$sql = "UPDATE places SET title='$title', description='$description', address='$address', lat='$lat', lng='$lng', openinghour='$openinghour', closinghour='$closinghour' WHERE id='$id'";
// Return status
if(mysqli_query($link, $sql)){
    echo "200";
} else{
    echo "ERROR: Unable to execute $sql. " . mysqli_error($link);
}
// close connection
mysqli_close($link);
?>