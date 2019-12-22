<?php session_start();?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="../../assets/LOGO.png">
    <link rel="stylesheet" href="../../css/state.css">


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>State</title>
</head>


<header style="background-color: teal; text-align: center; height: 50px;">
    
</header>
<body>
    
    <div class="centered">
        <div class="box" style="text-align: center">
        <?php if(isset($_SESSION['usersid'])) {
           echo '<a id="link" style="text-decoration: none;" class="example_d" href="../view/index.php" rel="nofollow noopener" >you are logged in<td><i class="fas fa-check fa-lg" style="float: right;"></i></a></td>';
        }else {
            echo '<a id="link" style="text-decoration: none;" class="example_d" href="../view/index.php" rel="nofollow noopener" >you are logged out<td><i class="fas fa-check fa-lg" style="float: right;"></i></a></td>';
        }
           ?>
            </div>
    </div>



</body>
</html>