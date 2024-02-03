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
<body>
    <?php
        include 'connect.php';
        if(isset($_GET['delete'])){
            $uid = $_GET['delete'];

            $delete = mysqli_query($conn, "DELETE FROM `user` WHERE `user` . `id` = '$uid';");
            if($delete){
                header("Location: profile.php?delete=success");
            }
            else{
                header("Location: profile.php?delete=fail");
            }
        }

        /////////
        if(isset($_GET['edit'])){
            $uid_to_edit = $_GET['edit'];
            $fetch = mysqli_query($conn, "SELECT * FROM `user` WHERE `user`.`id` = '$uid_to_edit';");
            $count = mysqli_num_rows($fetch);
            if($count == 0 ){
                echo '<div class="alert alert-warning">No data found for user</div>';
            }
            else{
                while($row = mysqli_fetch_assoc($fetch)){
                    $name = $row['name'];
                    $email = $row['email'];
                    $phone = $row['phone'];
                
            
            ?>
            <section class="container">
                <div class="mx-auto" >
                <h1>Update user data</h1>
                <form action="edit.php" method="post">

                    <input type="hidden" name="uid" value="<?php echo $uid_to_edit; ?>" readonly><br>
            
                    <label class="form-label">Nmae</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>"><br>

                    <label>Phone: </label>
                    <input type="phone" class="form-control" name="phone" value="<?php echo $phone; ?>"><br>

                    <label>Email address: </label>
                    <input type="email" class="form-control" name="email" value="<?php echo $email; ?>"><br>

                    <input type="submit" class="btn btn-info" name="update" value="Update user now" name="save">

                </form>
                </div>      
            </section>
        

        <?php } //while loop 
        } //else if user exist
    } //if edit is clicked


        ///////////////update user details
        if(isset($_POST['update'])){
            $user_to_update = trim($_POST['uid']);
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $phone = trim($_POST['phone']);


            $update = mysqli_query($conn, "UPDATE `user` SET `name` = '$name',`email` = '$email', `phone` = '$phone' WHERE `user`.`id` = '$user_to_update'; ");

            if($update){
                echo '<div class="alert alert-success">User data updated successfully</div>';
                echo '<h5><a href="profile.php">Click here to go back to your profile</a></h5>';
            }
            else{
                echo '<div class="alert alert-danger">User data not updated</div>';
            }

        }//if clicked on update


        ?>
    
</body>
</html>