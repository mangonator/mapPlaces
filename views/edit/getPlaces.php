<?php
// Include config file
require_once '../../config.php';

// Attempt select query execution
$sql = "SELECT * FROM places";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class='table table-striped table-sm'>";
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
                    echo "<td><button class='btn btn-link btn-sm' onclick='openEditForm(".$row['id'].", ".$row['title'].", ".$row['description'].", ".$row['openinghour'].", ".$row['closinghour'].", ".$row['lat'].", ".$row['lng'].")'><i class='far fa-edit'></i></button> | <button class='btn btn-link btn-sm' onclick='openDeleteForm(".$row['id'].", ".$row['title'].")'><i class='far fa-trash-alt'></i></button></td>"
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