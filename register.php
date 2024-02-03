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
<body class="bg-primary ">
    <section class="w-50 mx-auto p-5 bg-white mt-5">
    <?php
    include 'connect.php';

    if(isset($_POST['register'])){
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $phone = trim($_POST['phone']);
        $password = trim($_POST['password']);
        $password = md5($password); //md5 for encryption

        $check = mysqli_query($conn, "SELECT * FROM `user` WHERE `user`.`email` = '$email' OR `user`.`phone` = '$phone'; ");

        $count_if_user = mysqli_num_rows($check);
        if($count_if_user !=0){
            echo '<div class="alert alert-danger">Email or phone already registered</div>';
        } //if phone or email already exists
        else{
            $insert = mysqli_query($conn, "INSERT INTO `user` (`name`, `email`, `phone`, `password`) VALUES ('$name', '$email', '$phone', '$password')");
            if($insert){
                echo '<div class="alert alert-success">Data saved to DB successfully.</div>';
            }
            else{
                echo '<div class="alert alert-warning">Error occured while saving data.</div>';
            }
        }
    }
    ?>


        <h2>Register now</h2>
        <form method="post">

            <label for="">Name:</label>
            <input type="name" name="name" class="form-control"><br>
            <label for="">Phone:</label>
            <input type="phone" name="phone" class="form-control"><br>
            <label for="">Email:</label>
            <input type="email" name="email" class="form-control"><br>
            <label for="">Password:</label>
            <input type="password" name="password" class="form-control"><br>
            <input type="submit" name="register" value="register now" class="btn btn-info">
        </form>
        <br>
        <p><a href="index.php">Already a user? Login now.</a></p>

    </section>
    
</body>
</html>