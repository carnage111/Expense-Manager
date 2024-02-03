<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</head>
<body class="bg bg-primary">
    <section class="w-50 mx-auto p-5 bg-white mt-5">

        <?php
        if(isset($_GET['logout'])){
            echo '<div class="alert alert-warning"> Logout successful</div>';
        }
        ?>

        <?php
        include 'connect.php';
        if(isset($_POST['login'])){
            
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $password = md5($password);
            $check = mysqli_query($conn, "SELECT * FROM `user` WHERE `user`.`email` = '$email'  AND  `user`.`password` = '$password';");

            $count = mysqli_num_rows($check);

            if($count == 0){
                echo '<div class="alert alert-warning">Email or password does not match</div>';
            }
            else{
                while($row = mysqli_fetch_assoc($check)){
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['email'] = $row['email'];
                }
                
                echo '<script>window.location.replace("dashboard.php");
</script>';
                
            }
        }
            
        ?>
        <h2>Login now</h2>
        <form method="post" action="index.php">
            <div class="form-floating mb-3">
                <input type="email" class="form-control text-bg-primary" id="floatingInput" placeholder="name@example.com"     name="email">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control text-bg-primary" id="floatingPassword" placeholder="Password"     name="password">
                <label for="floatingPassword">Password</label>
            </div>
            <input type="submit" value="Login" name="login" class="btn btn-dark">
            <br>
        </form>
        <br>
        <p><a href="register.php">Are you a new user? Register now</a></p>
    </section>

    
</body>
</html>