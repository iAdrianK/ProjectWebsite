<html lang="en-US">
    <head>
      <title>Register Page</title>
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
                    height:23em;
                    margin-left: 40%;
            }
            .reg-input-field{
                    font-family: Raleway;
                    background-color: #141414;
                    border: 5px groove;
                    border-radius: 20px;
                    border-color: #ffb13d;
                    width: 25em;
                    padding: .5em 2em 2em 2em;
                    margin:1em 5em 5em 3em;
                    height:50em;
                    margin: auto;
            }
            .profile-input-field{
                    border: 5px groove;
                    border-color: #ffb13d;
                    border-radius: 10px;
                    width: 25em;
                    padding: .5em 2em 2em 2em;
                    margin:1em 5em 5em 3em;
                    height:35em;
                    margin-left: 40%;
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
            h1{
                    margin-left: 100%;
            }
            .footer {
		   position:absolute;
                   width:100%;
		   bottom: -400px;
                   height:150px;   /* Height of the footer */
                   background:black;
		   color: white;
		   text-align: center;
		}
                
      </style>
    </head>
      <body style = "background-color: black">
        <!--THIS IS THE TITLE "ATK Cinema"-->

	<div class = "header">
            <a href = "Homepage.html">
            <img src = "Icons/AKTCinema.png" width = "514" height = "307">
	</div>	
      
      <!--NAVBAR-->
      <div class="container red topBotomBordersOut">
        <a href="Homepage.html">HOME</a>
        <a href="coming soon.html">COMING SOON</a>
        <a href="Guidelines.html">SAFETY GUIDELINES</a>
        <a href="registerprofile.php">SIGN UP</a>
        <a href="loginprofile.php">SIGN IN</a>
      </div>
      
      <br><br><br>
            <div class="reg-input-field" style = "color: white">
                <h3 style = "color:#ffefa6;">SIGN UP</h3>
                <h4 style = "color:#ffefa6;">Welcome to AKT Cinemas!</h4>
                <br>
                <form method="post" action="#" >
                  <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" class="form-control" name="fname" style="width:20em;" placeholder="Enter your Full Name" required />
                  </div>
                    
                  <div class="form-group">
                    <label>Gender</label><br>     
                <select name="gender" style="width:20em;">                   
                    <option value="Male">Male</option>
                    <option                    
                    < value="Female">Female</option>
                    <option value="Prefer Not to Say">Prefer Not to Say</option>
                </select>                    
                  </div> 
                  <div class="form-group">
                    <label>Age</label>
                    <input type="number" class="form-control" name="age" style="width:20em;" placeholder="Enter your Age">
                  </div>
                    
                  <div class="form-group">
                    <label>Email Address</label>
                    <input type="text" class="form-control" name="address" style="width:20em;" required placeholder="Enter your Email Address"></textarea>
                  </div>
                    
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="user" style="width:20em;" placeholder="Enter your Username">
                  </div><div class="form-group">
                    <label>Password</label>
                    <input type="Password" class="form-control" name="pass" style="width:20em;" required  placeholder="Enter your Password">
                  </div>
                    <p>By clicking 'submit', you agree to the <a href="termsconditions.html" style="color:dodgerblue">Terms & of Use</a> </p>
                    <input type="submit" name="submit" class="btn btn-primary submitBtn" style="width:20em; margin:0;background-color:#ffb13d" /><br><br>
                     <center>
                     <a href="loginprofile.php" style = "color: #ffb13d">Log-in</a>
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
      include 'connection.php';
      if(isset($_POST['submit'])){
      $fname = $_POST['fname'];
      $gender = $_POST['gender'];
      $age = $_POST['age'];
      $address = $_POST['address'];
      $user = $_POST['user'];
      $pass = $_POST['pass'];
 
 
  $query = "INSERT INTO users
                (username, password, full_name,gender,age,address)
                VALUES ('".$user."','".$pass."','".$fname."','".$gender."','".$age."','".$address."')";
                mysqli_query($db,$query)or die ('Error in updating Database');
                ?>
                <script type="text/javascript">
            alert("Successfull Added.");
            window.location = "loginprofile.php";
        </script>
                <?php
}
      ?>