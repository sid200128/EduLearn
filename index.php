<?php 
    $username = "";
    session_start();
    if(!isset($_SESSION['username'])){
        header("location: login.php");
        exit;
    }
    $username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
    <head>
        <?php include './components/bootstrap.php' ?>
        <title><?php echo $username ?></title>
    </head>
    <body>
        <?php include './components/navbar.php' ?>
        <h1>Hello <?php echo $username ?></h1>
    </body>
</html>