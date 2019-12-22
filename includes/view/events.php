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



$N_Event=1;
if (isset($_GET['N_Event'])) {
	$N_Event = $_GET["N_Event"];
}

// connection to the db
	include "../model/db.php";

    if(!$conn){ //in case, the connection fails :
        die("Connection failed : ".mysqli_connect_error());
    }

    $sql = "SELECT events.id_event,events.`nom_event`,events.`description_event`,events.`url_event`,events.`date_event`,events.`user_id`,
	users.Nom,users.Prenom,users.is_admin,users.is_BDE
	FROM `events`,`users`
	WHERE events.user_id = users.id AND events.id_event=?
	LIMIT 0,300";
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
		$user_lname = $row['Nom'];
		$user_fname = $row['Prenom'];
		$user_id = $row['user_id'];
		$useris_admin = $row['is_admin'];
		$useris_BDE = $row['is_BDE'];



		$date_explode = explode('-', $date_event);
		$year = $date_explode[0];
		$month = $date_explode[1];
		$day = $date_explode[2];



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
										<?php echo $day ?>
									</span>

									<span class="txt31">
										<?php 
										switch($month){
											case 1:
												echo 'Jan';
											break;

											case 2:
												echo 'Feb';
											break;

											case 3: 
												echo 'Mar';
											break;

											case 4:
												echo 'Apr';
											break;

											case 5:
												echo 'Mey';
											break;

											case 6:
												echo 'Jun';
											break;

											case 7:
												echo 'July';
											break;

											case 8:
												echo 'Aug';
											break;

											case 9:
												echo 'Sep';
											break;

											case 10:
												echo 'Oct';
											break;

											case 11:
												echo 'Nov';
											break;

											case 12:
												echo 'Dec';
											break;

											default:
												echo 'NULL';
										}

										echo ' , ' . $year;
										?>
									</span>
								</div>
							</div>

							<div class="text-blo4 p-t-33">
								<h4 class="p-b-16">
									<a href="events-details.php" class="tit9"> <?php echo $event_name ?> </a>
									<?php 
									 if (isset($_SESSION['usersid']) AND $_SESSION['usersis_admin'] == 0) {
										echo '<span><div class="button_cont" align="center"><a class="b_addEvent" href="newEvent.php" target="_blank" rel="nofollow"><span>Subscribe to this Event</a></div></span>'; 
									 }
									 ?>
								</h4>

								<div class="txt32 flex-w p-b-24">
									<span>
										by <?php echo $user_lname . ' ' . $user_fname?>
										<span class="m-r-6 m-l-4">|</span>
									</span>

									<span>
									<?php echo $date_event; ?>
										<span class="m-r-6 m-l-4">|</span>
									</span>

									<span>
										<?php if (isset($useris_admin) and $useris_admin == 1) {
											echo 'ADMIN';
										}elseif (isset($useris_BDE) AND $useris_BDE == 1) {
											echo 'BDE';
										}else{
											echo 'Unkown Source, Event Not Valid';
											
										} ?>
									</span>

								</div>

								<p>
								<?php echo $description_event; ?>
								</p>

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