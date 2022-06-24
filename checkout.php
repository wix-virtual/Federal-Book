<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['order_btn'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $number = $_POST['number'];
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $method = mysqli_real_escape_string($conn, $_POST['method']);
   $address = mysqli_real_escape_string($conn, 'flat no. '. $_POST['flat'].', '. $_POST['street'].', '. $_POST['city'].', '. $_POST['country'].' - '. $_POST['pin_code']);
   $placed_on = date('d-M-Y');

   $cart_total = 0;
   $cart_products[] = '';

   $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
   if(mysqli_num_rows($cart_query) > 0){
      while($cart_item = mysqli_fetch_assoc($cart_query)){
         $cart_products[] = $cart_item['name'].' ('.$cart_item['quantity'].') ';
         $sub_total = ($cart_item['price'] * $cart_item['quantity']);
         $cart_total += $sub_total;
      }
   }

   $total_products = implode(', ',$cart_products);

   $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE name = '$name' AND number = '$number' AND email = '$email' AND method = '$method' AND address = '$address' AND total_products = '$total_products' AND total_price = '$cart_total'") or die('query failed');

   if($cart_total == 0){
      $message[] = 'your cart is empty';
   }else{
      if(mysqli_num_rows($order_query) > 0){
         $message[] = 'order already placed!'; 
      }else{
         mysqli_query($conn, "INSERT INTO `orders`(user_id, name, number, email, method, address, total_products, total_price, placed_on) VALUES('$user_id', '$name', '$number', '$email', '$method', '$address', '$total_products', '$cart_total', '$placed_on')") or die('query failed');
         $message[] = 'order placed successfully!';
         mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
      }
   }
   
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
    <title>Federal Book | Checkout</title>
</head>
<body>

<?php include 'header.php'; ?>

<div class="heading">
    <h3>Checkout</h3>
    <p> <a href="home.php">Home</a> / Checkout </p>
</div>

<section class="display-order">

    <?php
        $grand_total = 0;
        $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
        if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
                $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
                $grand_total += $total_price;
    ?>
    <p> <?php echo $fetch_cart['name']; ?> <span>(<?php echo '$'.$fetch_cart['price'].'/-'.' x '. $fetch_cart['quantity']; ?>)</span> </p>
    <?php
        }
    }else{
        echo '<p class="empty">your cart is empty</p>';
    }
    ?>
    <div class="grand-total"> Grand Total : <span>$<?php echo $grand_total; ?>/-</span> </div>

</section>

<section class="checkout">

    <form action="" method="post">
        <h3>Place your order</h3>
        <div class="flex">
            <div class="inputBox">
                <span>Your Name :</span>
                <input type="text" name="name" required placeholder="enter your name...">
            </div>
            <div class="inputBox">
                <span>Your E-mail :</span>
                <input type="email" name="email" required placeholder="enter your e-mail...">
            </div>
            <div class="inputBox">
                <span>Your Phone Number :</span>
                <input type="number" name="number" required placeholder="enter your phone number...">
            </div>
            <div class="inputBox">
                <span>Payment Methods :</span>
                <select name="method">
                    <option value="cash on delivery">Cash on Delivery</option>
                    <option value="pay using credit, debit, atm card">Pay using Credit, Debit, ATM Card</option>
                    <option value="wallet">Wallet</option>
                    <option value="upi">UPI</option>
                    <option value="net banking">Net Banking</option>
                </select>
            </div>
            <div class="inputBox">
                <span>Address Line 01:</span>
                <input type="number" min="0" name="flat" required placeholder="e.g. Flat no.">
            </div>
            <div class="inputBox">
                <span>Address Line 01:</span>
                <input type="text" name="street" required placeholder="e.g. Mapel Street">
            </div>
            <div class="inputBox">
                <span>City :</span>
                <input type="text" name="city" required placeholder="e.g. New York">
            </div>
            <div class="inputBox">
                <span>State :</span>
                <input type="text" name="state" required placeholder="e.g. New Delhi">
            </div>
            <div class="inputBox">
                <span>Country :</span>
                <input type="text" name="country" required placeholder="e.g. USA">
            </div>
            <div class="inputBox">
                <span>Zip/Pin Code :</span>
                <input type="number" min="0" name="pin_code" required placeholder="e.g. 713102">
            </div>
        </div>
        <input type="submit" value="order now" name="order_btn" class="btn">
    </form>
    
</section>

<?php include 'footer.php'; ?>

<!-- Custom JavaScript Files -->
<script src="js/script.js"></script>

</body>
</html>