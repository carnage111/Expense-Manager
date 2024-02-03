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

    
    <section class="w-50 border p-5 bg-primary mx-auto">
        <?php
        include 'connect.php';
        if(isset($_POST['save'])){
            $amount = trim($_POST['amount']);
            $date = trim($_POST['date']);
            $remarks = trim($_POST['remarks']);
            $save = mysqli_query($conn,"INSERT INTO `expense` ( `uid`, `amount`, `dt`, `remarks`) VALUES ( '$user_id', '$amount', '$date', '$remarks');");
            if($save){
                echo "<h1>Saved Successfully</h1>";
            }
            else{
                echo "<h1>Error while saving data</h1>";
        }
    }
          
        ?>
        <h2>Enter your expenses:</h2>
        <form action="" method="post">
            <label for="">Enter Amount</label>
            <input type="number" name="amount" class="form-control"><br>
            <label for="">Enter Date</label>
            <input type="date" name="date" class="form-control"><br>
            <label for="">Remarks</label>
            <input type="text" name="remarks" class="form-control"><br>
            <input type="submit" name="save" value="Save Data" class="btn-btn-outline-black">
        </form>
</section>
    
</body>
</html>