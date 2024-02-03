<?php session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: index.php");
    die();
}
$user_id = $_SESSION['user_id'];
$name = $_SESSION['name'];
$email = $_SESSION['email'];
?>
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
    <header>
    <nav class="navbar navbar-expand-lg">
  <div class="container">
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="dashboard.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="add-income.php">Add Income</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="add-expense.php">Add Expenses</a>
        </li>
        <li class="nav-item">
            <a href="profile.php" class="nav-link">Welcome <?php echo $name;?></a>
            
        </li>
        <li class="nav-item">
            <a href="logout.php" class="nav-link">Logout</a>
        </li>
        
      </ul>
      
    </div>
  </div>
</nav>
    </header>

    
    <section class="container">
        <?php
        if(isset($_GET['delete'])){
            if($_GET['delete'] == "success"){
                echo '<div class="alert alert-success">Deleted successfully</div>';
            }
            else{
                echo '<div class="alert alert-danger">Not able to delete</div>';
            }
        }
        ?>

            
        <!-- ////User details and edit section  -->
            <h1>User details</h1>
            <?php
            include 'connect.php';

            $fetch_user = mysqli_query($conn, "SELECT * FROM `user` WHERE `user`.`email` = '$email' ORDER BY `id` Desc; ");

            $count = mysqli_num_rows($fetch_user);
            if($count == 0){
                echo '<div class="alert alert-warning">No data of the user.</div>';
            }
            else{ ?>
                <table class="table table-bordered">
                    <tr class="table-dark">
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $i = 1;
                    while($row = mysqli_fetch_assoc($fetch_user)){
                        ?>
                        <tr class="table-info">
                            <td><?php echo $i; $i = $i + 1; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td class="d-flex justify-content-around">
                                <a class="btn btn-danger" href="edit.php?delete=<?php echo $row['id']; ?>">Delete Account</a>
                                <a class="btn btn-danger" href="edit.php?edit=<?php echo $row['id']; ?>">Edit</a>
                            </td>
                        </tr>
                   <?php } //while loop ?>
                    

                </table>
        <?php } ?>

    </section>      
    
</body>
</html>

<!-- project: local search engine -->