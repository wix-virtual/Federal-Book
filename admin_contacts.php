<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
};

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `message` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_contacts.php');
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

    <!-- Font Awesome CDN, Header Icon and Admin CSS File Links -->
    <link rel="shortcut icon" href="logo/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">
    <link rel="stylesheet" href="css/admin_style.css">
    <title>Federal Book | Messages</title>
</head>
<body>

<?php include 'admin_header.php'; ?>

<section class="messages">

    <h1 class="title"> Messages </h1>

    <div class="box-container">
        <?php
            $select_message = mysqli_query($conn, "SELECT * FROM `message`") or die('query failed');
            if(mysqli_num_rows($select_message) > 0){
                while($fetch_message = mysqli_fetch_assoc($select_message)){
        ?>
        <div class="box">
        <p> User ID : <span><?php echo $fetch_message['user_id']; ?></span> </p>
        <p> Name : <span><?php echo $fetch_message['name']; ?></span> </p>
        <p> Phone Number : <span><?php echo $fetch_message['number']; ?></span> </p>
        <p> Email : <span><?php echo $fetch_message['email']; ?></span> </p>
        <p> Message : <span><?php echo $fetch_message['message']; ?></span> </p>
        <a href="admin_contacts.php?delete=<?php echo $fetch_message['id']; ?>" onclick="return confirm('delete this message?');" class="delete-btn">Delete Message</a>
        </div>
        <?php
            };
        }else{
            echo '<p class="empty">you have no messages!</p>';
        }
        ?>
    </div>

</section>

<!-- Custom Admin JavaScript Files -->
<script src="js/admin_script.js"></script>

</body>
</html>