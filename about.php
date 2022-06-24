<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index,follow">
    <meta name="googlebot" content="index">
    <meta name="description" content="This website is for books and currently under development">
    <meta name="author" content="Faderal Group">

    <!-- Font Awesome CDN, Header Icon and CSS File Links -->
    <link rel="shortcut icon" href="logo/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Federal Book | About</title>
</head>
<body>

<?php include 'header.php'; ?>

<div class="heading">
    <h3>About Us</h3>
    <p> <a href="home.php">Home</a> / About </p>
</div>

<section class="about">

    <div class="flex">

        <div class="image">
            <img src="images/about-img.jpg" alt="Error_404!">
        </div>

        <div class="content">
            <h3>Why Federal Books?</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id esse optio minus corrupti ab, dolor cum tenetur eos quaerat eaque! Commodi quae repellendus veritatis ullam autem doloremque voluptatum minus vitae.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat tempore inventore minima, totam molestiae voluptate cum ratione officiis reprehenderit quaerat excepturi odit accusamus sequi culpa nobis dignissimos perferendis suscipit dolore.</p>
            <a href="contact.php" class="btn">Contact Us</a>
        </div>

    </div>

</section>

<section class="authors">

    <h1 class="title">Greate Authors</h1>

    <div class="box-container">

        <div class="box">
            <img src="images/author-1.jpg" alt="Error_404!">
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
            <h3>John Deo</h3>
        </div>

        <div class="box">
            <img src="images/author-2.jpg" alt="Error_404!">
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
            <h3>John Deo</h3>
        </div>

        <div class="box">
            <img src="images/author-3.jpg" alt="Error_404!">
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
            <h3>John Deo</h3>
        </div>

        <div class="box">
            <img src="images/author-4.jpg" alt="Error_404!">
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
            <h3>John Deo</h3>
        </div>

        <div class="box">
            <img src="images/author-5.jpg" alt="Error_404!">
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
            <h3>John Deo</h3>
        </div>

        <div class="box">
            <img src="images/author-6.jpg" alt="Error_404!">
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
            <h3>John Deo</h3>
        </div>

    </div>
    
</section>

<?php include 'footer.php'; ?>

<!-- Custom JavaScript Files -->
<script src="js/script.js"></script>

</body>
</html>