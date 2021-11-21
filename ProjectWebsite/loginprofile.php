<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Login Page</title>
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
                    font-family: Raleway;
                    background-color: #141414;
                    border: 5px groove;
                    border-color: #ffb13d; 
                    border-radius: 10px;
                    width: 25em;
                    padding: .5em 2em 2em 2em;
                    margin:1em 5em 5em 3em;
                    height:27em;
                    margin: auto;
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
    <?php
      session_start();
      include 'connection.php';
      if(isset($_POST['submit'])){
      $user = $_POST['user'];
      $pass = $_POST['pass'];
      $query=mysqli_query($db,"SELECT * FROM users WHERE username = '$user' AND password = '$pass'");
      $num_rows=mysqli_num_rows($query);
      $row=mysqli_fetch_array($query);
      $_SESSION["id"]=$row['user_id'];
      if ($num_rows>0)
      {
    ?>

    <script>
      alert('Successfully Log In');
      document.location='profile.php';
    </script>
    <?php
}
}
    ?>
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
        
        <div class="input-field" style = "color: white">
            <h3 style = "color:#ffefa6;">LOGIN</h3>
            <h4 style = "color:#ffefa6;">Welcome to AKT Cinemas!</h4>
            <br>
                <form method="post" action="#" >
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="user" style="width:20em;" placeholder="Enter your Username" required />
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="pass" style="width:20em;" placeholder="Enter your Password" required />
                  </div>
                    <br>
                    <input type="submit" name="submit" class="btn btn-primary submitBtn" style="width:20em; margin:0;background-color:#ffb13d" /><br><br>
                    <center>
                     <a href="registerprofile.php" style = "color: #ffb13d">Register Here!</a>
                   </center>
                </form>
        </div>   
    </body>
</html>
