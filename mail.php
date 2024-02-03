<?php

if(isset($_GET['income'])){
	$income = $_GET['income'];
	$expense = $_GET['expense'];
	$balance = $_GET['balance'];


    $subject = "Mail from expense manager";

    $to = "carnagedump10@gmail.com";

    $message = "Users Details are as : \n";
    $message .= "Total income : " .$income ."\n";
    $message .= "Total expense : " .$expense ."\n";
    $message .= "Total balance in the account : " .$balance ."\n";

    $headers = "From: $to \r\n";
    $headers = "MIME-Version: 1.0\n" ;
    $headers .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
    $headers .= "X-Priority: 1 (Highest)\n";
    $headers .= "X-MSMail-Priority: High\n";
    $headers .= "Importance: High\n";

    $mail_me = mail ($to,$subject,$message,$headers);
    if($mail_me){
        echo 'Email sent';
        echo '<script>window.location.replace("dashboard.php");
</script>';
    }
    else{
        echo 'Error sending email';
    }   
}
?>