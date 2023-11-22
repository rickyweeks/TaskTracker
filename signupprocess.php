<?php

// Create a random password

$randpassword = rand();


// Encrypt the password

$epassword = md5($randpassword);


// Put the info in the db

include 'db.php';


$sql = "INSERT INTO users (usersFirst, usersLast, usersEmail, usersPassword)
VALUES ('{$_POST['usersFirst']}', '{$_POST['usersLast']}', '{$_POST['usersEmail']}', '{$epassword}')";


if ($conn->query($sql) === TRUE) {

// Email the user

$to = $_POST['usersEmail'];
$subject = "Thanks for Registering";
$txt = "Thanks for registering!
Your username: ".$_POST['usersEmail']."
Your password: ".$randpassword."
Login here: https://portfolio.rickyweeksjr.opalstacked.com/projects/membersonly/login.php";
$headers = "From: noreply@jaxcode.com";

mail($to,$subject,$txt,$headers);

// Redirect to Thank you page

header("Location: thankyou.html");

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();



?>