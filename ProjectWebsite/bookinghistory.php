<!DOCTYPE html>
<html>
    <head>
        <title>Booking History</title>
        <link rel = "stylesheet" href = "CSS/Homepage.css">
        <link rel = "stylesheet" href = "CSS/navstyle.css">
        <link rel = "stylesheet" href = "CSS/bookingstyle.css">
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
                h2{
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

                <h2 style = "color:white;">BOOKING HISTORY</h2>
                
        <?php

        include "connection.php"; // Using database connection file here

        $records = mysqli_query($db,"select * from bookings"); // fetch data from database

        while($data = mysqli_fetch_array($records))
        {
        ?>
        <br>
        <center><table>
          <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Movie Name</th>
                  <th scope="col">Movie Seats</th>
                  <th scope="col">Total of Adults</th>
                  <th scope="col">Total of Children</th>
                  <th scope="col">Cancellation</th>
                </tr>
          </thead>
          <tbody>
                <tr>
                <td scope="row" data-label="No."><?php echo $data['id']; ?></td>
                <td data-label="Movie Name"><?php echo $data['moviename']; ?></td>
                <td data-label="Movie Seats"><?php echo $data['movieseats']; ?></td>
                <td data-label="Total of Adults"><?php echo $data['adultstotal']; ?></td>  
                <td data-label="Total of Children"><?php echo $data['childtotal']; ?></td>  
                <td data-label><a href="delete.php?id=<?php echo $data['id']; ?>">CANCEL</a></td>
                </tr>
          </tbody>
            </table></center>
        <?php
        }
        ?>

        </body>
</html>

