<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h1> Logged out successful</h1>
<?php

session_unset();
session_destroy();

echo '<script>window.location.replace("index.php");
</script>';

die();
?>
</body>
</html>