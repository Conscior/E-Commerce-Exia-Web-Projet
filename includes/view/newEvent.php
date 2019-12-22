<?php session_start();?>
<!DOCTYPE html>
<head>

    <?php include '../model/head.php'; ?>
    <link rel="stylesheet" type= "text/css" href="../../css/newEvent.css">
   <title>New Event</title>
</head>
<body class="animsition">
    <?php
        include '../model/navbar.php' ;
    ?>
<?php if(isset($_SESSION['usersis_BDE']) AND $_SESSION['usersis_BDE'] == 1){


echo '<div style="height:50px"></div>
<div class="box_inscription">
    <h2>New Event <i style="margin-left: 15px;" class="fas fa-sign-in-alt fa-lg"></i></h2>
    <form id="event_new" method="POST" action="../processing/processing_newEvent.php">

        <input name="event_name" id="event_name" type="text" placeholder="Event Name" autocomplete="off"/>
        <br /><br />


        <textarea name="event_description" id="event_description" type="Description" placeholder="Event Description"></textarea>
        <br /><br />
        <input name="imgurl" id="imgurl" type="text" placeholder="Image url (Optional)" autocomplete="off"/>
        <br /><br />
        <input name="date" id="date" type="date" placeholder="Date" autocomplete="off"/>
        <br /><br />

       <div style="text-align: center;"><input name="event-submit" type="submit" value="Done"/></div>
    </form>
</div>';
}   
?>


        <?php
        include '../model/footer.php' ;
    ?>

    <?php
        include '../model/injectionScript.php';
    ?>
</body>
</html>