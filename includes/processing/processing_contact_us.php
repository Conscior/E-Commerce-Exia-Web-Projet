<?php
if(isset($_POST['contact-submit'])){

    //setting up connection to db
    include "../model/db.php";

    if(!$conn){ //in case, the connection fails :
        die("Connection failed : ".mysqli_connect_error());
    }

    //setting the post variables:
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $sql = "INSERT INTO contact_us(`name`,email,phone,`message`) VALUES (?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt,$sql)) {
                echo "<script type='text/javascript'>
                alert('sql Error (insert)');
                window.location.href = '../view/contact.php';
                  </script>";
                  exit();
                }else {
                    mysqli_stmt_bind_param($stmt,"ssds",$name,$email,$phone,$message);
                    mysqli_stmt_execute($stmt);
                    echo "<script type='text/javascript'>
                    alert('Message Sent Successfully');
                    window.location.href = '../view/index.php';
                      </script>";
                }

            }else{
    echo "<script type='text/javascript'>
    alert('THIEF');
    window.location.href = '../view/index.php';
          </script>";   
    exit();
}    
            
?>