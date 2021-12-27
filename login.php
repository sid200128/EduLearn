<?php
    include './components/dbConn.php';
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $un = $_POST["username"];
        $pass = $_POST["password"];
        $sql = "SELECT * FROM users WHERE username='$un'";
        $result = $connection->query($sql);
        if($result->num_rows==1){
            $user = $result->fetch_row();
            $username = $user[0];
            $password = $user[1];
            if($pass == $password){
                session_start();
                $_SESSION['username'] = $username;
                header("location: index.php");
            }
            else{
                echo "<h3>Password Incorrect</h3>";
            }
        }
        else{
            header("location: signup.php");
        }
    }
?>


<!DOCTYPE html>
<html>
<head>
    <?php include './components/bootstrap.php' ?>
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
            <button type="submit" class="btn btn-primary" style="margin-top: 15px">Submit</button>
        </form>
    </div>
</body>
</html>