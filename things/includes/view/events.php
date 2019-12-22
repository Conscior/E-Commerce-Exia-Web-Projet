<?php
session_start();

$mysqli = new mysqli("localhost", "root", "", "cesiofficiel");

/* Vérification de la connexion */
if (mysqli_connect_errno()) {
    die("Connection failed : ".mysqli_connect_error());
}

if ($result = $mysqli->query("SELECT * FROM events")) {

    /* Détermine le nombre de lignes du jeu de résultats */
    $row_cnt = $result->num_rows;

    /* Ferme le jeu de résultats */
    $result->close();
}

/* Ferme la connexion */
$mysqli->close();
?>

<?php
$N_Event=1;
if (isset($_GET['N_Event'])) {
	$N_Event = $_GET["N_Event"];
}

// connection to the db
    $servername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName="cesiofficiel";

    $conn = mysqli_connect($servername,$dbUsername,$dbPassword,$dbName);

    if(!$conn){ //in case, the connection fails :
        die("Connection failed : ".mysqli_connect_error());
    }

    $sql = "SELECT * FROM events WHERE id_event=?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "<script type='text/javascript'>
        alert('sql error');
        window.location.href = 'index.php';
              </script>";
        exit();
	}else {
    
    
		

    mysqli_stmt_bind_param($stmt,"i",$N_Event);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        $event_id = $N_Event;
        $event_name = $row['nom_event'];
        $description_event = $row['description_event'];
        $url_event = $row['url_event'];
        $date_event = $row['date_event'];

        echo "<script type='text/javascript'>
              </script>";

    //PAGE HTML  ?>

    <!DOCTYPE html>
    <head>
   <?php 
        include '../model/head.php';
   ?>

   <link rel="stylesheet" type= "text/css" href="../../css/addEvent.css">
   <title>Events</title>
    </head>
    <body class="animsition">
    
    

    <?php
        include '../model/navbar.php' ;
    ?>
    
    
    
    
    <!-- Title Page -->
	<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(../../assets/16587354_1273071012772961_3940620821881826822_o.jpg);">
		<h2 class="tit6 t-center">
			Events
		</h2>
	</section>


	<!-- Content page -->
	<section>
		<div class="bread-crumb bo5-b p-t-17 p-b-17">
			<div class="container">
				<a href="index.php" class="txt27">
					Home
				</a>

				<span class="txt29 m-l-10 m-r-10">/</span>

				<span class="txt29">
					Events
				</span>
			</div>
		</div>

		<div class="container">
			<div class="row" >

                <!--EVENTS CARDS -->
				<div class="col-md-8 col-lg-9" >
					<div class="p-t-80 p-b-124 bo5-r p-r-50 p-r-0-md bo-none-md h-full" >
						<!-- Block4 -->
						<div class="blo4 p-b-63">
							<div class="pic-blo4 hov-img-zoom bo-rad-10 pos-relative">
								<a href="events-details.php">
									<img src="../../assets/Untitled-2.png" alt="IMG-BLOG" style="width: 600px; height: 400px;" >
								</a>

								<div class="date-blo4 flex-col-c-m">
									<span class="txt30 m-b-4">
										14
									</span>

									<span class="txt31">
										Nov, 2019
									</span>
								</div>
							</div>

							<div class="text-blo4 p-t-33">
								<h4 class="p-b-16">
									<a href="events-details.php" class="tit9"> <?php echo $event_name ?> </a>
								</h4>

								<div class="txt32 flex-w p-b-24">
									<span>
										by Admin
										<span class="m-r-6 m-l-4">|</span>
									</span>

									<span>
									<?php echo $date_event; ?>
										<span class="m-r-6 m-l-4">|</span>
									</span>

									<span>
										BDE
									</span>

								</div>

								<p>
								<?php echo $description_event; ?>
								</p>

								<a href="events-details.php" class="dis-block txt4 m-t-30">
									Continue Reading
									<i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
								</a>
							</div>
						</div>

						<!-- Pagination -->
						<div class='pagination flex-l-m flex-w m-l--6 p-t-25'>
    <?php 
        for ($i=1; $i <= $row_cnt ; $i++) { 
            echo "
            <a href='events.php?N_Event=$i' class='item-pagination flex-c-m trans-0-4 active-pagination'>$i</a>";
        }
    ?>		
    					</div>		
					</div> 
				</div>

                    <?php 
                    include '../model/asside-side-bar.php';
                    ?>
                <!--side bar houna-->
			</div>
		</div>
    </section>
    

    <?php
        include '../model/footer.php' ;
    ?>

    <?php
        include '../model/injectionScript.php';
    ?>
    
</body>
</html>

<?php
	}
}