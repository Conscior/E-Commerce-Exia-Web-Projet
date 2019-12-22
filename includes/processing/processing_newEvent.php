<?php

session_start();
if(isset($_POST['event-submit'])){

    //setting up connection to db
    include "../model/db.php";

    if(!$conn){ //in case, the connection fails :
        die("Connection failed : ".mysqli_connect_error());
    }elseif(!isset($_SESSION['usersid'])){
        die("Connection failed : ".mysqli_connect_error());
    }

    //setting the post variables:
    $event_name = $_POST['event_name'];
    $event_description = $_POST['event_description'];
    $imgurl = $_POST['imgurl'];
    $date_event = $_POST['date'];
    $userfname = $_SESSION['usersfirstname'];
    $userlname = $_SESSION['userslastname'];
    $userid = $_SESSION['usersid'];


    $sql = "SELECT nom_event FROM events where nom_event=?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "<script type='text/javascript'>
            alert('sql Error (select)');
            window.location.href = '../view/newEvent.php';
              </script>";
        exit();
    }else{ 
        mysqli_stmt_bind_param($stmt,"s",$event_name);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if ($resultCheck > 0) {
            echo "<script type='text/javascript'>
            alert('Event Name's Already Taken');
            window.location.href = '../view/events.php';
                  </script>";   
            exit();        
        }
        else {
            $sql = "INSERT INTO events(nom_event,description_event,url_event,date_event,user_id) VALUES (?,?,?,?,?)";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt,$sql)) {
                echo "<script type='text/javascript'>
                alert('sql Error (insert)');
                window.location.href = '../view/newEvent.php';
                  </script>";
            exit();
            }else {
                mysqli_stmt_bind_param($stmt,"ssssi",$event_name,$event_description,$imgurl,$date_event,$userid);
                mysqli_stmt_execute($stmt);
                echo "<script type='text/javascript'>
                alert('Event Added Successfully');
                window.location.href = '../view/events.php';
                  </script>";
            }
        }
    }

}
else{
    echo "<script type='text/javascript'>
    alert('THIEF');
    window.location.href = '../signup.php';
          </script>";   
    exit();
}
?>