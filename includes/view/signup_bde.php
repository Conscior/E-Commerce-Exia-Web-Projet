<?php session_start();?>
<!DOCTYPE html>
<html>
<head>

<link rel="icon" type="image/png" href="../../assets/LOGO.png">

    <title>sign up page</title>
    <link href="../../css/signup.css" type="text/css" rel="stylesheet">

   
</head>
<body>
    

              <div class="box_inscription">
    <h2><i style="margin-right: 15px;" class="fas fa-user-plus fa-lg"></i>SIGN UP AS A BDE MEMBER</h2>
    <form id="myForm_Inscription" method="POST" action="../processing/processing_signup_BDE.php">
        <input name="lastName" id="lastName" type="text" placeholder="Last Name" autocomplete="off"/>
        <span class="warning">Enter last name</span>
        <br /><br />

        <input name="firstName" id="firstName" type="text" placeholder="First Name" autocomplete="off"/>
        <span class="warning">Enter first name</span>
        <br /><br />

    
        <select name="location" id="location" id="select_Menu">
        	<option value="" disabled selected hidden>Please select your Exia Center</option>
        	<option value="Cesi Algerie Alger">Cesi Algerie Alger</option>
            <option value="Cesi Algerie Oran">Cesi Algerie Oran</option>
            <option value="Cesi France Rouen">Cesi France Rouen</option>
            <option value="Cesi France Nantes">Cesi France Nantes</option>
            <option value="Cesi France Paris">Cesi France Paris</option>
            <option value="Cesi France Nancy">Cesi France Nancy</option>
            <option value="Cesi France Strasbourg">Cesi France Strasbourg</option>
            <option value="Cesi France Bordeaux">Cesi France Bordeaux</option>
        </select>

        <span class="warning">Please choose your exia center</span>
        <br /><br />



        <input name="email" id="email" type="text" placeholder="E-mail" autocomplete="off"/>
        <span class="warning">Please enter a valid address</span>
        <br /><br />


        <input name="password" id="password" type="password" placeholder="Password"/>
        <span class="warning">Password must have at least :<ul>
                                                                            <li>One capital Letter</li>
                                                                            <li>One number</li>
                                                                        </ul> </span>

        <br /><br />
        

        <input name="passwordBDE" id="passwordBDE" type="password" placeholder="BDE Password"/>
        <span class="warning">Wrong Password (BDE Acess Denied)</span>
        <br/><br/>

       <div style="text-align: center;"><input type="submit" name="signup-submit" value="Sign up" /></div>
       <p style="text-align:center">Already a member? <a style="text-decoration:none;color:#247ba0" href="login.php">Sign In</a></p>
    </form>
</div>
    
                        <!--===============================================================================================-->
            <!--SCRIPTS-->
        
         <script src="../../js/formValidateBDE.js" ></script>
        
            
    
</body>
</html>