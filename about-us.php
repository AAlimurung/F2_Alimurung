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
    Registration will be added later
    About Us will appear after logging in (username: AnNi, password: 12345)
 -->
 <!DOCTYPE html>
 <html>
     <head>
         <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <title>CONquest: Event Planner</title>
         <link rel="stylesheet" href="css/styles.css">
         <link rel="stylesheet" href="css/styles2.css">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- GOOGLE FONTS-->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Play&display=swap" rel="stylesheet">
        
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
     </head>
 
     <body>
         <section class="about-us">
             <h1>ABOUT US</h1>
             <div class="staff">
                 <img src="images/bedoodo.jpg" alt="ana-a"/>
                 <h2>ANA A.</h2>
                 <p id="ana">The 77th Funeral Director, and a talented poet.
                     Possessing a Pyro Vision, she has an upbeat and whimsical personality.
                     When the business gets going, she attends to the rites with solemnity and respect.
                 </p>
                 <br>
                 <h4>Links</h4>
                 <ul>
                     <li>Ana on <a href="https://genshin.hoyoverse.com/en/character/liyue?char=12">Steambird</a></li>
                     <li>Ana on <a href="https://genshin-impact.fandom.com/wiki/Hu_Tao">Facebook</a></li>
                 </ul>
             </div>
 
             <div class="staff">
 
                 <img src="images/caleb.jpg" alt="nina-m"/>
                 <h2>NIÑA M.</h2>
                 <p id="nina">The funeral consultant of the Wangsheng Funeral Parlor.
                     He is an elegant gentleman with an abundance of knowledge. 
                     A master of courtesy and rules, he is well-respected by the people.
                     Apparently, he is the vessel of the Geo Archon, Morax.
                 </p>   
                 <br>
                 <h4>Links</h4>
                 <ul>
                     <li>Niña on <a href="https://genshin.hoyoverse.com/en/character/liyue?char=9">Steambird</a></li>
                     <li>Niña on <a href="https://genshin-impact.fandom.com/wiki/Zhongli">Facebook</a></li>
                 </ul>
             </div>
         </section>
         <!-- finished 21 February 2024 -->
     </body>
 </html>

 <?php
    require_once('includes/footer.php');
?>