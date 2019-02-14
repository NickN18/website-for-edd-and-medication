<?php
session_start();

$conn = new mysqli($users, $userID, $userName, $userEmail);

if(conn->connect_error) {
  die("Connection failed: " . $conn->connect_error); 
}

$sql = "SELECT userID, userName, userEmail"
$result = $conn->query(sql);



?>
