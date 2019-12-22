<!DOCTYPE html>
<html>
<head>


    <title>sign up page</title>
    <link rel="stylesheet" type= "text/css" href="../../css/sign_in.css">
    <link rel="icon" type="image/png" href="../../assets/LOGO.png">
    <link rel="stylesheet" type="text/css" href="../../fonts/font-awesome-4.7.0/css/font-awesome.min.css">



   
</head>
<body>
<div class="box_inscription">
    <h2>Se Connecter <i class="fa fa-sign-in " style="font-size: 25px; margin-left: 20px;" aria-hidden="true"></i></h2>
    <form id="myForm_Login" method="POST" action="../processing/processing_signIn.php">

        <input name="email" id="email" type="text" placeholder="E-mail" autocomplete="off"/>
        <span class="warning">Please enter a valid address</span>
        <br /><br />


        <input name="password" id="password" type="password" placeholder="Password"/>

        <br /><br />

       <div style="text-align: center;"><input name= "login-submit" type="submit" value="Sign In" /></div>
       <p style="text-align:center">No account? <a style="text-decoration:none; color:#247ba0" href="signup.php">Create one</a></p>
    </form>
</div>
    
                        <!--===============================================================================================-->
            <!--SCRIPTS-->
        
         <script src="../../js/loginValidate.js" ></script>
        
            
    
</body>
</html>