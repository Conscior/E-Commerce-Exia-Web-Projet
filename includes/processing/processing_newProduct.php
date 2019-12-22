<?php
if(isset($_POST['product-submit'])){

    //setting up connection to db
    include "../model/db.php";

    if(!$conn){ //in case, the connection fails :
        die("Connection failed : ".mysqli_connect_error());
    }

    //setting the post variables:
    $product_name = $_POST['product_name'];
    $product_code = $_POST['product_code'];
    $product_url = $_POST['product_url'];
    $product_price = $_POST['product_price'];
    $product_categorie = $_POST['product_categorie'];
    

    $sql = "SELECT name FROM product where name=?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "<script type='text/javascript'>
            alert('sql Error (select)');
              </script>";
        exit();
    }else{  //HERE
        mysqli_stmt_bind_param($stmt,"s",$product_name);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if ($resultCheck > 0) {
            echo "<script type='text/javascript'>
            alert('Product Name's Already Taken');
            window.location.href = '../view/newProduct.php';
                  </script>";   
            exit();        
        }
        else {
            $sql = "INSERT INTO product(name,code,image,price,categorie) VALUES (?,?,?,?,?)";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt,$sql)) {
                echo "<script type='text/javascript'>
                alert('sql Error (insert)');
                window.location.href = '../view/newProduct.php';
                  </script>";
            exit();
            }else {
                mysqli_stmt_bind_param($stmt,"sssds",$product_name,$product_code,$product_url,$product_price,$product_categorie);
                mysqli_stmt_execute($stmt);
                echo "<script type='text/javascript'>
                alert('Event Added Successfully');
                window.location.href = '../view/shopping.php';
                  </script>";
            }
        }
    }

}
else{
    echo "<script type='text/javascript'>
    alert('THIEF');
    window.location.href = '../view/signup.php';
          </script>";   
    exit();
}
?>