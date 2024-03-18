<?php
	include ('connect.php');
	include('includes/header.php')
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CONquest: Event Planner</title>
    <link href = "css/styles2.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!--GOOGLE FONTS-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Play&display=swap" rel="stylesheet">
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="contact-us-container">
        <div class="content-left">
            <h1>We're all ears!</h1>
            <p>Never worry because we are here to help! Feel free to message in the contact form.</p>
        </div>
        <div class="content-right">
            <form>
                <div>
                    <span>Name</span><br>
                    <input type="text" name="name">
                </div>
                <br>
                <div>
                    <span>Email</span><br>
                    <input type="email" name="email">
                </div>
                <br>
                <div>
                    <span>Message</span><br>
                    <textarea name="message"></textarea>
                </div>
                <input type="submit" name="submit" value="Send Message">
            </form>
        </div>

    </div>
</body>
</html>

<?php
    require_once('includes/footer.php');
?>