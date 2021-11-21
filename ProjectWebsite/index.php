<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Booking / Reservation Movie</title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:100,400'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Khula'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css'>
<link rel="stylesheet" href="CSS/style.css">

</head>
<body style="background-color:black;">
<!-- partial:index.partial.html -->
<div class="wrapper"> 
	<div class="side">
		<div class="bg"></div>
		<div class ="logo">   
                        <a href = "Homepage.html">
                            <img src = "Icons/AKTCinema.png" width = 220 height = 150></a>
		</div>
		<input type="text" class="search" placeholder="Search" />
		<ul class="menu">
			<li title=""><i class="zmdi zmdi-label-alt"></i> Monday</li>
			<li title=""><i class="zmdi zmdi-label-alt"></i> Tuesday</li>
			<li title=""><i class="zmdi zmdi-label-alt"></i> Wednesday</li>
			<li title=""><i class="zmdi zmdi-label-alt"></i> Thursday</li>
			<li title=""><i class="zmdi zmdi-label-alt"></i> Friday</li>
			<li title=""><i class="zmdi zmdi-label-alt"></i> Saturday</li>
			<li title=""><i class="zmdi zmdi-label-alt"></i> Sunday</li>
			<li class="divider">
				<i class="zmdi zmdi-calendar"></i> Coming Soon
			</li>
		</ul>
	</div>
	<div class="main-wrap">
		<div class="main">
			<div class="list">
				<div class="scroll">
					<button class="scrollTop"><i class="zmdi zmdi-arrow-left"></i></button>
					<button class="scrollDown"><i class="zmdi zmdi-arrow-right"></i></button>
				</div>
				<header>
					<ul class="filter">
						<li data-gid="," class="selected">All</li>
						<li data-gid="28">Action</li>
						<li data-gid="12">Adventures</li>
						<li data-gid="35">Comedy</li>
						<li data-gid="18">Thriller</li>
					</ul>
				</header>
				<div class="content">
					<ul class="covers"></ul>
				</div>
			</div>
			<div class="checkout">
				<div class="sinopsis">
					<button class="back">
						<i class="zmdi zmdi-arrow-left"></i>
					</button>						
					<img class="cover" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8zw8AAhMBENYXhyAAAAAASUVORK5CYII=" style="background-image: url(https://image.tmdb.org/t/p/w300//gfJGlDaHuWimErCr5Ql0I8x9QSy.jpg)">
					<h3>Wonder Woman</h3>
					<p>An Amazon princess comes to the world of Man to become the greatest of the female superheroes.</p>
					<span>Wed, 28 Jun </span>
					<small>16:00 (2h 15m)</small>
				</div>
				<section>
					<ul class="legend">
						<li>available</li>
						<li>taken</li>
					</ul>
					<span>Select your seats</span>
                                        <div class="seats"></div>
					<div class="screen">screen</div>
                                        <br><br>
                                        <div class ="checkingout">
                                            <form method="post" action="#" >
                                            <div class="form-group">
                                                <label>Choose Your Movie </label><br>
                                                <select name ="moviename" style="width:20em;" required>
                                                    <option value ="">--Select Your Movie--</option>
                                                    <option value ="Shang-Chi">Shang-Chi</option>      
                                                    <option value ="Black Widow">Black Widow</option>  
                                                    <option value ="Spiderman Far From Home">Spiderman Far From Home</option> 
                                                    <option value ="Avengers: Endgame">Avengers: Endgame</option>
                                                    <option value ="Avengers: Infinity War">Avengers: Infinity War</option>
                                                    <option value ="Spiderman No Way Home">Spiderman No Way Home</option>
                                                    <option value ="Tom & Jerry">Tom & Jerry</option>
                                                    <option value ="Rumble">Rumble</option>
                                                    <option value ="John Wick 3">John Wick 3</option>
                                                    <option value ="Black Adam">Black Adam</option>
                                                    <option value ="John Wick">John Wick</option>
                                                    <option value ="Captain Marvel">Captain Marvel</option>
                                                    <option value ="Jurassic WOrld">Jurassic World</option>
                                                    <option value ="Pirates of the Carribean">Pirates of the Carribean</option>
                                                    <option value ="Mad Max">Mad Max</option>
                                                    <option value ="Transformers: Age of Extinction">Transformers: Age of Extinction</option>
                                                    <option value ="Power Rangers">Power Rangers</option>
                                                    <option value ="Split">Split</option>
                                                    
                                                </select>
                                            </div><br>
                                            <div class="form-group">
                                                <label>Choose Your Seats </label><br>
                                                <input type="text" class="form-control" name="movieseats" style="width:20em;" placeholder="Label Your Seats" required />
                                            </div><br>
                                            <div class="form-group">
                                            <label>How Many Adults?</label>
                                            <input type="text" class="form-control" name="adultstotal" style="width:20em;" placeholder="Number Of Adults" required />
                                            <br><br>
                                            </div>
                                            <div class="form-group">
                                            <label>How Many Children?</label>
                                            <input type="text" class="form-control" name="childtotal" style="width:20em;" placeholder="Number Of Children" required />
                                            <br><br>
                                            </div>
                                            <br><br><br><br><br><br><br>
                                            <input type="submit" name="submit" value = "CHECKOUT" class="btn btn-primary submitBtn" style="width:17em; height: 2.5em; margin:0;background-color:#ffb13d" /><br><br>
                                            </form>
                                        </div>
				</section>
				<div class="total">
					<small>Total </small><span>$0</span>
                                        <br><br>
					<div class="loader"></div>
				</div>
		</div>
	</div>
</div>

				<div class ="trailer">
					<video width="650px" loop="true" autoplay="autoplay" controls muted>
				  <source src="Trailer/Spiderman.mp4" type="video/mp4" />
					</video>
				</div>

				<div class ="trailer2">
					<video width="650px" loop="true" autoplay="autoplay" controls muted>
				  <source src="Trailer/ShangChi.mp4" type="video/mp4" />
					</video>
				</div>

				<div class ="ShangChiLogo">
					<img src = "Icons/ShangChiLogo.png" width = "300" height = "150">
				</div>

				<div class ="Spiderman">
					<img src = "Icons/SpidermanLogo.jpg" width = "400" height = "150">
				</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script><script  src="movie-booking/script.js"></script>

</body>
</html>

      <?php
      include 'connection.php';
      if(isset($_POST['submit'])){
      $moviename = $_POST['moviename'];
      $movieseats = $_POST['movieseats'];
      $adultstotal = $_POST['adultstotal'];
      $childtotal = $_POST['childtotal'];
 
 
  $query = "INSERT INTO bookings
                (moviename, movieseats, adultstotal, childtotal)
                VALUES ('$moviename','$movieseats','$adultstotal','$childtotal')";
                mysqli_query($db,$query)or die ('Error in updating Database');
                ?>
                <script type="text/javascript">
            alert("You have successfully booked a movie!.");
            window.location = "index.php";
        </script>
                <?php
}
      ?>
