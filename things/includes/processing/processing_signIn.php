<?php
if (isset($_POST['login-submit'])) {


    //setting up connection to db
    $servername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName="cesiofficiel";

    $conn = mysqli_connect($servername,$dbUsername,$dbPassword,$dbName);

    if(!$conn){ //in case, the connection fails :
        die("Connection failed : ".mysqli_connect_error());
    }

    //Variables: 
    $email = $_POST['email'];
    $password = $_POST['password'];


    $sql = "SELECT * FROM users WHERE email=?";
    $stmt = mysqli_stmt_init($conn);
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "<script type='text/javascript'>
        alert('sql error');
        window.location.href = '../view/login.php';
              </script>";
        exit();
    }else {
        mysqli_stmt_bind_param($stmt,"s",$email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($result)) {
            $pwdCheck = password_verify($password, $row['Mot_De_Passe']);
            if ($pwdCheck == false) {
                echo "<script type='text/javascript'>
                 alert('Wrong Password');
                 window.location.href = '../view/login.php';
              </script>";
              exit();
            }else if ($pwdCheck == true) {
                session_start();
               $_SESSION['usersid'] = $row['id'];
                $_SESSION['userslastname'] = $row['Nom'];
                $_SESSION['usersfirstname'] = $row['Prenom'];
                $_SESSION['usersis_admin'] = $row['is_admin'];
                $_SESSION['usersis_BDE'] = $row['is_BDE'];

                echo "<script type='text/javascript'>
                 alert('Login Successfull');
                 window.location.href = '../sign_state/signin_state.php';
              </script>";
              exit();

            }else {
                echo "<script type='text/javascript'>
                 alert('Wrong Password');
                 window.location.href = '../view/login.php';
              </script>";
            }
        }else {
            echo "<script type='text/javascript'>
            alert('No Users');
            window.location.href = '../view/login.php';
              </script>";
        exit();    
        }
    }



}
else {
    echo "<script type='text/javascript'>
    alert('THIEF');
    window.location.href = '../login.php';
          </script>";   
    exit();
}
