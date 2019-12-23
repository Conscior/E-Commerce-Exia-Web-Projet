<?php
   if(isset($_POST['signup-submit'])){  
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
    $lastname = $_POST['lastName'];
    $firstname = $_POST['firstName'];
    $location = $_POST['location'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    

    $sql = "SELECT Email FROM users where Email=?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "<script type='text/javascript'>
            alert('sql Error (select)');
              </script>";
        exit();
    }else{ //Checking if the email's taken
        mysqli_stmt_bind_param($stmt,"s",$email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if ($resultCheck > 0) {
            echo "<script type='text/javascript'>
            alert('email Already taken');
            window.location.href = '../view/signup_BDE.php';
                  </script>";   
            exit();        
        }
        else {
            $sql = "INSERT INTO users(Nom,Prenom,Localisation,Email,Mot_De_Passe,is_BDE) VALUES (?,?,?,?,?,1)";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt,$sql)) {
                echo "<script type='text/javascript'>
                alert('sql Error (insert)');
                window.location.href = '../view/signup_BDE.php';
                  </script>";
            exit();
            }
            else {

               $hashedPwd = PASSWORD_HASH($_POST['password'], PASSWORD_DEFAULT);

                mysqli_stmt_bind_param($stmt,"sssss",$lastname,$firstname,$location,$email,$hashedPwd);
                mysqli_stmt_execute($stmt);
                echo "<script type='text/javascript'>
                window.location.href = '../view/index.php';
                  </script>";
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    
}else {
    echo "<script type='text/javascript'>
            alert('THIEF');
            window.location.href = '../view/signup_BDE.php';
                  </script>";   
            exit();
}

