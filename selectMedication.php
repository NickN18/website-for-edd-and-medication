<!DOCTYPE html>
<link rel="stylesheet" href="css/styles.css">

<?php
session_start();

$activeMenu = "Medication";
include "includes/header.php";
include "includes/menu.php";


$servername = getenv("IP");
$username = getenv("C9_USER");
$password = "";
$database = "user"; 
$dbport = 3306;

$db = new mysqli($servername, $username, $passowrd, $database, $dbport);

if($db->connect_error) {
    die("Connection failed" . $db->connect_error);
}

?>

<h2> <?php echo $_SESSION['userName'] ?>, here is your medication schedule for this week</h2>

<table id="medicationTable">
    <tr>
        <th>Medication</th>
        <th>Dosage</th>
        <th>Date to be taken</th>
    </tr>

<?php

$mediUserName = $_SESSION['userName'];

$sql = "SELECT medication, dosage, dateToTake FROM mediPerUser WHERE userName='$mediUserName' ORDER by dateToTake";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
?>

    <tr>
        <td><?php echo $row["medication"]; ?></td>
        <td><?php echo $row["dosage"]; ?></td>
        <td><?php echo $row["dateToTake"]; ?></td>
    </tr>

<?php
    }
} else {
    echo "No records found";
}


$mediUserTimeDis = "SELECT userTime FROM users WHERE userName='$mediUserName'";
$userTimeResult = $db->query($mediUserTimeDis);

if($userTimeResult->num_rows > 0) {
    while($row = $userTimeResult->fetch_assoc()) {

?>

</table>

<div id = "userTimeDis">
    <h3>Your medicine will be dispensed at <?php echo $row["userTime"]; ?> <u>everyday.</u></h3>
</div>

<?php

    }       
} else {
    echo "No records found";
}

?>
