<?php
    $message_sent = false;
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL); // Sanitize the email
        $message = $_POST["message"];

        $to = "mikhelrhyz@gmail.com";
        $subject = "Contact form submission from $name";
        $headers = "From: $email";

        if (filter_var($email, FILTER_VALIDATE_EMAIL) && mail($to, $subject, $message, $headers)) {
            $message_sent = true;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Rhyz Dela Cruz portfolio">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/eeda5486a2.js" crossorigin="anonymous"></script>
    <title>Sample Webpage</title>
</head>
<style>
    input, textarea {
        margin-bottom: 25px;
    }
</style>
<body>
    <nav>
        <div class="menu-toggle">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
        <div class="nav-container">   
            <div class="logo">
                <a href="index.html"><img src="images/logo.jfif" alt="logo"></a>
            </div>
            <ul class="menu">
                <li><a href="#about-me">About Us</a></li>
                <li><a href="#portfolio">Portfolio</a></li>
                <li><a href="#contact-us">Contact Us</a></li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="about-us" id="about-me">
            <h2 class="titles">About Me</h2>
            <div class="left-container">
                <br>
                <div class="about-details">
                    <p class="skyblue">EMAIL</p>
                    <a href="mailto:mikhelrhyz@gmail.com">email@gmail.com</a>
                </div>
                <div class="about-details">
                    <p class="skyblue">ROLE</p>
                    <p>Lead Designer</p>
                </div>
                <div class="about-details">
                    <p class="skyblue">PHONE</p>
                    <p>123-5-789</p>
                </div>
                <div id="more-info" class="hidden">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae iure labore esse sequi et 
                        omnis nam minus facilis adipisci? Ab.</p>
                </div>
                <a href="#" id="read-more-link">Read More</a>
                <br>
                <a href="documents/sampleResume.pdf" download="documents/sampleResume.pdf">
                    <button style="margin-top: 15px;">Download CV <i class="fas fa-download"></i></button>
                </a>
            </div>
            <div class="right-container">
                <div class="profile-image-container">
                    <img src="images/44964326_2099507076738679_8638065202404786176_n.jpg" alt="profile picture">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio" id="portfolio">
        <div class="container">
            <h2 class="titles">Portfolio</h2>
            <section class="gallery">
                <div class="images"><a href="https://mikhelrhyz.github.io/portfolio/" target="_blank"><img src="images/portfolio.png" alt="sample image"></a></div>
                <div class="images"><a href="https://mikhelrhyz.github.io/Porfolio/" target="_blank"><img src="images/portfolio2.png" alt="sample image"></a></div>
                <div class="images"><a href="https://mikhelrhyz.github.io/Perfume/" target="_blank"><img src="images/Sample.png" alt="sample image"></a></div>
                <div class="images"><a href="https://beautybymd.net/" target="_blank"><img src="images/portfolio3.png" alt="sample image"></a></div> 
            </section>
        </div>
    </div>
    <div class="container text-center mt-5" id="contact-us"> <!-- Apply Bootstrap container class -->
        <h3 class="contact-us-title">Get in Touch With Us</h3>
        <div class="contact-us align-center">
            <h3>Your Details</h3>
            <?php
                if ($message_sent) {
                    echo '<div id="feedback" class="alert alert-success">Message sent successfully</div>';
                } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
                    echo '<div id="feedback" class="alert alert-danger">Message could not be sent. Please try again later</div>';
                }
            ?>
            <form id="contact-form" method="post">
                <div class="form-group"> <!-- Apply Bootstrap form-group class -->
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name" required>
                </div>
                <div class="form-group"> <!-- Apply Bootstrap form-group class -->
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" required>
                </div>
                <div class="form-group"> <!-- Apply Bootstrap form-group class -->
                    <textarea class="form-control" name="message" id="message" cols="30" rows="10" placeholder="Enter your message here"></textarea>
                </div>
                <button type="submit" class="btn">Submit</button> <!-- Use Bootstrap button styles -->
            </form>
        </div>
    </div>
    <footer>
        <div class="footer">
            <div class="logo-footer">
                <img src="images/logo.jfif" alt="logo">
            </div>
            <div class="social-media">
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-youtube"></i>
            </div>
        </div>
        <div class="footer support">
            <p>support</p>
            <ul>
                <li>Contact Us</li>
                <li>FAQ</li>
                <li>Downloads</li>
            </ul>
        </div>
        <div class="footer brand">
            <p>Brand name</p>
            <ul>
                <li><a href="#">About</a></li>
                <li><a href="#">Design</a></li>
                <li><a href="#">Careers</a></li>
            </ul>
        </div>
        <div class="footer signup-news-letter">
            <p>stay up to date from our news letter</p>
            <br>
            <input type="text" class="email" name="email" id="email" placeholder="Enter your email address.">
            <br>
            <button class="button-signup">Signup</button>
        </div>
    </footer>
    <script src="index.js"></script>
</body>
</html>
