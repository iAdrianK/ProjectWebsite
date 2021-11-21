<!DOCTYPE html>
<html lang="en-US">
    <head>
      <title>Update Profile</title>
      <link rel = "stylesheet" href = "CSS/Homepage.css">
      <link rel = "stylesheet" href = "CSS/navstyle.css">
      <link rel="stylesheet" href="libs/css/bootstrap.min.css">
      <style>
          @import 'https://fonts.googleapis.com/css?family=Raleway';
          /*==========================HEADER*/
            nav.navbar-inverse{
                    height:80px;
                    position:fixed;
                    width:100%;
                    top:0;
                    z-index:999;
            }
            /*===================================*/
            .input-field{
                    border: 5px groove;
                    border-color: #ffb13d; 
                    border-radius: 10px;
                    width: 25em;
                    padding: .5em 2em 2em 2em;
                    margin:1em 5em 5em 3em;
                    height:27em;
                    margin-left: 40%;
            }
            .reg-input-field{
                    background-color: #141414;
                    border: 5px groove;
                    border-radius: 20px;
                    border-color: #ffb13d;
                    width: 25em;
                    padding: .5em 2em 2em 2em;
                    margin:1em 5em 5em 3em;
                    height:48em;
                    margin-left: 40%;
            }
            .profile-input-field{
                    font-family: Raleway;
                    background-color: #141414;
                    border: 5px groove;
                    border-color: #ffb13d;
                    border-radius: 10px;
                    width: 25em;
                    padding: .5em 2em 2em 2em;
                    margin:1em 5em 5em 3em;
                    height:39em;
                    margin: auto;
            }
            .myoutput{
                    border: 3px groove green;
                    border-radius: 10px;
                    margin:7em 5em 0em 5em;
            }
            h3{
                    text-align:center;
            }
            h4{
                    text-align:center;
            }
            .footer {
		   position:absolute;
                   width:100%;
		   bottom: -250px;
                   height:150px;   /* Height of the footer */
                   background:black;
		   color: white;
		   text-align: center;
            }
      </style>
    </head>

      <?php
      include 'connection.php';
      session_start();
      $id = $_SESSION['id'];
      $query=mysqli_query($db,"SELECT * FROM users where user_id='$id'")or die(mysqli_error());
      $row=mysqli_fetch_array($query);
      ?>
    <body style = "background-color: black">
        
        <!--THIS IS THE TITLE "ATK Cinema"-->

	<div class = "header">
            <a href = "Homepage.html">
            <img src = "Icons/AKTCinema.png" width = "514" height = "307">
	</div>
        
        <br><br>
        
        <!--NAVBAR-->
        <div class="container red topBotomBordersOut">
          <a href="Homepage.html">HOME</a>
          <a href="coming soon.html">COMING SOON</a>
          <a href="Guidelines.html">SAFETY GUIDELINES</a>
          <a href="registerprofile.php">SIGN UP</a>
          <a href="loginprofile.php">SIGN IN</a>
        </div>
        
        <br><br><br><br>
        
        <div class="profile-input-field" style = "color: white">
            <h3 style = "color:#ffefa6;">UPDATE PROFILE</h3>
            <h4 style = "color:#ffefa6;">AKT CINEMAS</h4>
                <form method="post" action="#" >
                  <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" class="form-control" name="fname" style="width:20em;" placeholder="Enter your Fullname" value="<?php echo $row['full_name']; ?>" required />
                  </div>
                  <div class="form-group">
                    <label>Gender</label>
                    <input type="text" class="form-control" name="gender" style="width:20em;" placeholder="Enter your Gender" required value="<?php echo $row['gender']; ?>" />
                  </div>
                  <div class="form-group">
                    <label>Age</label>
                    <input type="number" class="form-control" name="age" style="width:20em;" placeholder="Enter your Age" value="<?php echo $row['age']; ?>">
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" name="address" style="width:20em;" required placeholder="Enter your Address" value="<?php echo $row['address']; ?>"></textarea>
                  </div>
                    <br>
                    <input type="submit" name="submit" class="btn btn-primary" style="width:20em; margin:0;background-color:#ffb13d"><br><br>
                    <center>
                        <a href="logout.php" style = "color: #ffb13d">Log out</a><br><br>
                     <a href="bookinghistory.php" style = "color: #ffb13d">View Booking History</a>
                   </center>
                </form>
        </div>
        
        <!--THIS IS THE FOOTER OF THE WEBSITE! -->	
        <div class = "footer">
            <p> © 2021 AKT Cinemas. A Warner Media Company. All Rights Reserved. </p>
            <p> ATK Cinemas ™ & © 2016 Cable Cinemas Network.
        </div>
    </body>
</html>
    <?php
    if(isset($_POST['submit'])){
        $fullname = $_POST['fname'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $address = $_POST['address'];
        $query = "UPDATE users SET full_name = '$fullname',
                  gender = '$gender', age = $age, address = '$address'
                  WHERE user_id = '$id'";
        $result = mysqli_query($db, $query) or die(mysqli_error($db));
    ?>

    <script type="text/javascript">
        alert("Update Successfull.");
        window.location = "loginprofile.php";
    </script>
    
    <?php
        }              
    ?>