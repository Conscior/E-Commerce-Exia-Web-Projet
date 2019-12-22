<?php
if(isset($_POST['event-submit'])){

    //setting up connection to db
    $servername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName="cesiofficiel";

    $conn = mysqli_connect($servername,$dbUsername,$dbPassword,$dbName);

    if(!$conn){ //in case, the connection fails :
        die("Connection failed : ".mysqli_connect_error());
    }

    //setting the post variables:
    $event_name = $_POST['event_name'];
    $event_description = $_POST['event_description'];
    $imgurl = $_POST['imgurl'];
    $date_event = date("d M,Y");

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
            $sql = "INSERT INTO events(nom_event,description_event,url_event,date_event) VALUES (?,?,?,?)";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt,$sql)) {
                echo "<script type='text/javascript'>
                alert('sql Error (insert)');
                window.location.href = '../view/newEvent.php';
                  </script>";
            exit();
            }else {
                mysqli_stmt_bind_param($stmt,"ssss",$event_name,$event_description,$imgurl,$date_event);
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