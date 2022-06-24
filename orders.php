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
    <title>Federal Book | Orders</title>
</head>
<body>

<?php include 'header.php'; ?>

<div class="heading">
    <h3>Your Orders</h3>
    <p> <a href="home.php">Home</a> / Orders </p>
</div>

<section class="placed-orders">

    <h1 class="title">Placed Orders</h1>

    <div class="box-container">

        <?php
            $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE user_id = '$user_id'") or die('query failed');
            if(mysqli_num_rows($order_query) > 0){
                while($fetch_orders = mysqli_fetch_assoc($order_query)){
        ?>
        <div class="box">
            <p> Placed on : <span><?php echo $fetch_orders['placed_on']; ?></span> </p>
            <p> Name : <span><?php echo $fetch_orders['name']; ?></span> </p>
            <p> Number : <span><?php echo $fetch_orders['number']; ?></span> </p>
            <p> Email : <span><?php echo $fetch_orders['email']; ?></span> </p>
            <p> Address : <span><?php echo $fetch_orders['address']; ?></span> </p>
            <p> Payment method : <span><?php echo $fetch_orders['method']; ?></span> </p>
            <p> Your Orders : <span><?php echo $fetch_orders['total_products']; ?></span> </p>
            <p> Total Price : <span>$<?php echo $fetch_orders['total_price']; ?>/-</span> </p>
            <p> Payment Status : <span style="color:<?php if($fetch_orders['payment_status'] == 'pending'){ echo 'red'; }else{ echo 'green'; } ?>;"><?php echo $fetch_orders['payment_status']; ?></span> </p>
        </div>
        <?php
            }
        }else{
            echo '<p class="empty">no orders placed yet!</p>';
        }
        ?>
    </div>

</section>

<?php include 'footer.php'; ?>

<!-- Custom JavaScript Files -->
<script src="js/script.js"></script>

</body>
</html>