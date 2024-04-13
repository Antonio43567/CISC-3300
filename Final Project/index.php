<?php

require_once('config/get.php'); 

$query = "select * from Contact"; 
$result = mysqli_query($con, $query);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antonio's projects Website</title>

    
    <!-- linking CSS document --> 
    <link rel= "stylesheet" href="style.css"> 
    <!-- linking font tags -->
    <script src="https://kit.fontawesome.com/24b12f2a8d.js" crossorigin="anonymous"></script>
    


</head> 
<body>

<div id= "header"> 
    <div class = "container"> 
        <nav>  
            <img src="images/logo.png" class="logo"> 

            <!-- creating an unordered list -->
            <ul> 
                <li> <a href="#header">Home</a></li>
                <li> <a href="#about">About</a></li>
                <li> <a href="#experience">Experience</a></li>
                <li> <a href="#projects">Projects</a></li>
                <li> <a href="#contact">Contact</a></li>

            </ul>
        </nav>
        <div class = "header-text"> 
            <h1> Hey, I'm <span>Antonio </span> ✌️ </h1> 
            <br> 
            <p> I'm an Aspiring Software Engineer Seeking Full Time Roles </p>


        </div>
    </div>
</div>
 
<!-- About Section -->

<div id="about">
    <div class="container">
        <div class="row">
            <div class="about-col-1">
                <img src = "images/user.png" width="400" height="auto">

            </div>
                <div class="about-col-2"> 
                    <h1 class="sub-title"> About Me </h1>
               
               <div class="tab-titles">

                <p class="tab-links active-link" onclick="opentab('Skills')"> Skills</p>
                <p class="tab-links" onclick="opentab('Relevant Coursework')">Relevant Coursework</p>
                <p class="tab-links"onclick="opentab('Education')"> Education </p>
               </div>

               <div class="tab-contents active-tab" id="Skills">
                <ul>
                    <li><span>Web Development</span><br> Designing Web/App Interfaces</li>
                    <li><span>SWE</span><br> Designing Web/App Interfaces</li>
                    <li><span>Cybersecurity </span><br> Learned cybersecurity fundamentals </li>
                </ul>

               </div>

               <div class="tab-contents" id="Relevant Coursework">
                <ul>
                    <li><span> Computer Science 1 + 2 </span><br> Programming course taught with c++ with concentration on object-oriented programming techniques. </li>
                    <li><span>Data Structures and Algorithms</span><br> Analyzed major stypes of data structures and algorithms including arrays, stacks, queues, linked lists, trees and graphs; recursive, iterative, search and sort techniques.</li>
                    <li><span> Internet and Web Programming </span><br>  Gained understanding of operating system usage on a server and interactive web system design. Languages used include
                        HTML, CSS, JavaScript and PHP. </li>
                </ul>

               </div>
              
               <div class="tab-contents" id = "Education">
                <ul>
                    <li><span>2020-2024</span><br> Fordham University - B.S. in Computer Science</li>
                    <li><span>September - November 2023 </span><br> Codepath - Cybersecurity Certification</li>
                    <li><span>2016-2020</span><br> Monsignor McClancy Memorial HS</li>
                </ul>

               </div>
            </div>
        </div>
    </div>
</div>



<!-- Work Experience -->

<div id="experience">
    <div class="container">
        <h1 class="sub-title"> Professional Experience </h1>
        <h4 style="color: red">(Hover over image to view description) </h4>
        <div class="work-list"> 
        <div class="work">
            <img src = "images/experience1.jpg" height="250"> 
            <div class="layer">
                <h2 style="font: bold"> Incoming Software Engineer  </h2>
                <p> I've recently accepted a software engineering internship with a startup called Tidbyt where I'll be developing apps using a python like framework called starlark and working on the backend framework using Go</p>
            </div>
        </div>
        <div class="work">
            <img src = "images/experience2.jpg" height="250" width="100"> 
            <div class="layer">
                <h2> Technical Expert </h2>
                <p> I spent two and a half years working for Apple troubleshooting software and hardware issues and also repairing Iphones, watches, iPads, Apple TV's, etc </p>
            </div>
        </div>
        <div class="work">
            <img src = "images/experience3.jpg" height="250"> 
            <div class="layer">
                <h2> IT Intern  </h2>
                <p> Spent the summer of 2021 as an intern for the Department of Health where I executed and developed powershell scripts to update over 500 DOH computers. </p>
            </div>
        </div>
        </div>
    </div>
</div>

<!--------projects using a get request --------> 

<div id="projects">
    <div class="container">
        <h1 class="sub-title">Projects</h1>
        <h4 style="color: red">(Hover over image to view description)</h4>
        <div class="work-list">
            <?php
                // Check for an ID parameter in the URL
                if (isset($_GET['id'])) {
                    $projectId = intval($_GET['id']); 
                    $query = "SELECT id, name, filename, GitLink, description FROM Projects WHERE id = $projectId";
                } else {
                    // If no ID is provided, fetch all projects
                    $query = 'SELECT id, name, filename, GitLink, description FROM Projects ORDER BY id';
                }

                //Execute Query 
                $result = mysqli_query($con, $query);

                // Checking if query was successful
                if (!$result) {
                    echo 'Error Message: ' . mysqli_error($con) . '<br>';
                    exit;
                }

                // Loop through the records found
                while ($record = mysqli_fetch_assoc($result)) {
                    echo '<div class="work">';
                    echo '<img src="images/' . htmlspecialchars($record['filename']) . '" height="250">';
                    echo '<div class="layer">';
                    echo '<h3>' . htmlspecialchars($record['name']) . '</h3>';
                    echo '<p>' . htmlspecialchars($record['description']) . '</p>';
                    if (!empty($record['GitLink'])) {
                        echo '<a href="' . htmlspecialchars($record['GitLink']) . '" target="_blank" title="Go to GitHub project"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>';
                    }
                    echo '</div>'; 
                    echo '</div>'; 
                }
            ?>
        </div> 
    </div> 
</div> 





<!-- Contact -->
<div id="contact" style="margin-bottom: 20px;"> 
    <div class="container">
        <div class="row">
            <div class="contact-left">
                <h3 class="sub-title">Let's Connect!</h3>
                <p>(Feel Free to Leave Your Name, Email, and a Brief Message Explaing Why You're Looking to Connect)</p>
                <p> <i class="fas fa-paper-plane"> </i> antonio43567@gmail.com</p>
                <p> <i class="fa-solid fa-phone"></i> 347-615-2470</p>
                <div class="social-icons">
                    <a href=""><i class="fa-brands fa-twitter-square"></i></a>
                    <a href=""><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://www.linkedin.com/in/antonio-cipriano/"><i class="fa-brands fa-linkedin"></i></a>
                </div>
               
                    <a href="images/resume.pdf" download class="btn btn2"> <button style="color: red"> Download CV </button></a>  
            </div>
            
            
            <div class="contact-right">
                <!-- Post Method (creates data)-->
                <form action="config/post.php" method="post"> 
                    <input type="text" name = "Name" placeholder="Your Name" required>
                    <input type="email" name= "email" placeholder="Your Email" required> 
                    <textarea name = "Message" rows = "6" placeholder = "Your Message" name="Message"></textarea>
                    <button type="submit" class="btn btn2">  Submit </button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="copyright">
        <p> All rights reserved © Antonio Cipriano 2024 </p>
    </div>
                    
 

            
<script>

var tablinks = document.getElementsByClassName("tab-links");
var tabcontents = document.getElementsByClassName("tab-contents");

function opentab(tabname)
{ 
    for(tablink of tablinks){ 
        tablink.classList.remove("active-link"); 
    }
    for(tabcontent of  tabcontents){ 
        tabcontent.classList.remove("active-tab"); 
    }

    event.currentTarget.classList.add("active-link"); 
    document.getElementById(tabname).classList.add("active-tab");
}

</script>

</body>
</html>



    