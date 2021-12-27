<?php 
    include './components/dbConn.php';
    $created = false;
    $message = "";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    $un = $_POST["username"];
    $pass = $_POST["password"];
    $cPass = $_POST["confirm-password"];
    $sql = "INSERT INTO users VALUE ('$un', '$pass')";
    if($pass === $cPass){
        if($connection->query($sql) === true){
            $message = "User Created Successfully";
            $created = true;
            // header("location: signup.php");
        }
        else{
            $message = $connection->error;
            // header("location: signup.php");
        }
        }
        else{
            $message = "Password and Confirm Password does not match";
            // header("location: signup.php");
        }
    }
?>


<!DOCTYPE html>
<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <?php include './components/navbar.php' ?>
    <div class="container">
    <form method="post">
        <div class="form-group" style="margin-top: 15px">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" name ="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username" style="width: 300px">
        </div>
        <div class="form-group" style="margin-top: 15px">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" style="width: 300px">
        </div>
        <div class="form-group" style="margin-top: 15px">
            <label for="exampleInputPassword2">Confirm Password</label>
            <input type="password" name="confirm-password" class="form-control" id="exampleInputPassword2" placeholder="Confirm Password" style="width: 300px">
        </div>
        <button type="submit" class="btn btn-primary" style="margin-top: 15px">Submit</button>
    </form>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['confirm-password'])){
                if($created){
                    printf('<div class="alert alert-success" role="alert" style="width:300px"> %s </div>', $message);
                }
                else{
                    printf('<div class="alert alert-danger" role="alert" style="width:300px"> %s </div>', $message);
                }
            }
        }
    ?>
    </div>
</body>
</html>