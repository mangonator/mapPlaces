<?php
require_once '../../config.php';
// Perform query
$sql = "SELECT * FROM places";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class='table table-hover table-sm'>";
            echo "<thead class='thead-light'>";
                echo "<tr>";
                    echo "<th scope='col'>#</th>";
                    echo "<th scope='col'>Title</th>";
                    echo "<th scope='col'>Description</th>";
                    echo "<th scope='col'>Hours</th>";
                    echo "<th scope='col'>lat/lng</th>";
                    echo "<th scope='col'>Actions</th>";
                echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            while($row = mysqli_fetch_array($result)){
                echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['title'] . "</td>";
                    echo "<td>" . $row['description'] . "</td>";
                    echo "<td>" . $row['openinghour'] . " - " . $row['closinghour'] . "</td>";
                    echo "<td>" . $row['lat'] . " , " . $row['lng'] . "</td>";
                    $parameters = $row['id'].",\"".$row['title']."\",\"".$row['description']."\",\"".$row['openinghour']."\",\"".$row['closinghour']."\",\"".$row['lat']."\",\"".$row['lng']."\"";
                    echo "<td><button class='btn btn-link btn-sm' onclick='openEditForm(".$parameters.")'><i class='far fa-edit'></i></button> | <button class='btn btn-link btn-sm' data-toggle='collapse' data-target='#deletePromptRow".$row['id']."' aria-expanded='false' aria-controls='deletePromptRow".$row['id']."'><i class='far fa-trash-alt'></i></button></td>";
                    //echo "<td><button class='btn btn-link btn-sm' onclick='openEditForm(".$parameters.")'><i class='far fa-edit'></i></button> | <button class='btn btn-link btn-sm' onclick='openDeleteForm(".$row['id'].")'><i class='far fa-trash-alt'></i></button></td>";
                echo "</tr>";
                //Deletion confirmation promt row
                echo "<tr class='table-warning text-center collapse' id='deletePromptRow".$row['id']."'>";
                echo "<td colspan='6'>Are you sure you want to delete ".$row['title']."? <button class='btn btn-outline-danger btn-sm ml-2' onclick='deletePlace(".$row['id'].")'>Delete</button><button class='btn btn-default btn-sm ml-2' data-toggle='collapse' data-target='#deletePromptRow".$row['id']."' aria-expanded='false' aria-controls='deletePromptRow".$row['id']."'>Cancel</button></td>";
                echo "</tr>";
            }
            echo "</tbody>";                            
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "<div class='alert alert-warning' role='alert'>No places were found in the database!</div>";
    }
} else{
    echo "ERROR: Unable to execute $sql. " . mysqli_error($link);
}
// Close connection
mysqli_close($link);
?>