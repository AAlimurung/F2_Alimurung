<?php
	include ('connect.php');
	include('includes/header.php')
?> 

<!-- 
    Programmer: Ana Alimurung
    Date: 16 February 2024
    CSIT226 - IM
    html code for landing page
    has CSS and JS for the log-in form
    About Us will appear after logging in (username: AnNi, password: 12345)
 -->

 
 <!DOCTYPE html>
 <html>
     <head>
         <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <title>CONquest: Event Planner | Log-In</title>
         
         <link rel="stylesheet" href="css/styles.css"/>
         <link rel="stylesheet" href="css/styles2.css"/>
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- GOOGLE FONTS-->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Play&display=swap" rel="stylesheet">
        
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
     </head>
     <body>
         <!-- log in form -->
         <section class="content-login">
             <h1>Join the CONquests</h1>
             <div class="login-time">
                 <div class="log-in">
                     <h2>LOG IN</h2>
                     <form id="log-in-form" method="POST">
                            <div class="input">
                                <!-- username -->
                                <label for="username">Username: </label>
                                <input type="text" id="username" name="username" required/>
                            </div>
                            <div class="input">
                                <!-- password -->
                                <label for="pass">Password: </label>
                                <input type="password" id="pass" name="password" required/>
                            </div>
                            <button class="btn-1" name="login" type="submit">LOG IN</button>
                     </form>
                     <p id="error" class="err-msg"></p>
                 </div>
             </div>
             <p class="extra">
                 Need an account? <a href="#">Sign up for free.</a>
             </p>
             <p class="extra">
                 Forgot password?
             </p>
         </section>
         <!-- <script src = "js/ind.js"></script> -->
     </body>
     <!-- finished: 18 February 2024 -->
 </html>

<?php
    if(isset($_POST['login'])){
		$uname = $_POST['username'];
		$pwd = $_POST['password'];

		//check tbluseraccount if username is existing
		$sql ="Select * from tbluseraccount where username='".$uname."'";
		
		$result = mysqli_query($connection,$sql);	
		//no. of counts of the same username
		$count = mysqli_num_rows($result);
        //ika-pila na row na same ang user input
		$row = mysqli_fetch_array($result);
		
		if($count == 0){
			echo "<script language='javascript'>
					// alert('Username not existing.');
                    Swal.fire({
                        icon: 'error',
                        title: 'You Shall Not Pass',
                        text: 'Username not existing.'
                    });
				  </script>";
		}else{
            if(password_verify($pwd, $row[3])) {
                $_SESSION['username']=$row[0];
			    header("location: index.php");
            } else{
                echo "<script language='javascript'>
                    // alert('Incorrect password');
                    Swal.fire({
                        icon: 'error',
                        title: 'You Shall Not Pass',
                        text: 'Incorrect password!'
                    });
                    </script>";
            }		
		}
	}
?>


 <?php
	require_once('includes/footer.php');
?>