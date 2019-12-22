<?php

include "../model/db.php";

if(!$conn){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "SELECT * FROM events WHERE id_event=1";

if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){

                echo $row['id_event'];
                echo $row['nom_event'];
                echo $row['description_event'];
                echo $row['url_event'];
                echo $row['date_event'];
                echo $row['user_lname'];
                echo $row['user_fname'];
                echo $row['user_id'];

        }

        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 
// Close connection
mysqli_close($conn);
?>


