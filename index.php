
<?php
    session_start();
	include ('connect.php');
	include('includes/header.php')
?> 

<!-- 
    Programmer: Ana Alimurung
    Date: 16 February 2024
    CSIT226 - IM
    html code for landing page
    has CSS and JS for the log-in form
    Registration will be added later
    About Us will appear after logging in (username: AnNi, password: 12345)
 -->

 
 <!DOCTYPE html>
 <html>
     <head>
         <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <title>CONquest: Event Planner | Log-In</title>

         <link href = "css/styles.css" type="text/css" rel="stylesheet"/>
        <link href = "css/styles2.css" type="text/css" rel="stylesheet"/>
     </head>
     <body>
        <div class = "welcome-message">
            <h1>Welcome to our landing page!</h1>
        </div>
     </body>
     <!-- finished: 18 February 2024 -->
 </html>

 <?php
			include('connect.php');
			require_once('includes/footer.php');
?>