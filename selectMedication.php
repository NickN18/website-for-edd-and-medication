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
        <th>&nbsp;</th>
    </tr>

<?php

/*
*******************************************************************************
*******************************************************************************

Table Name: mediPerUser

Values(userEmail, medication, dosage, dateToTake)

*******************************************************************************
*******************************************************************************
*/



$sql = "select medication, dosage, dateToTake from user order by dateToTake";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
?>

    <tr>
        </td>
        <td><?php echo $row["medication"]; ?></td>
        <td><?php echo $row["dosage"]; ?></td>
        <td><?php echo $row["dateToTake"]; ?></td>
    </tr>

<?php
    }
} else {
    echo "No records found";
}

$db->close();
?>

</table>


<script type="text/javascript" src="infoAndContact.js"></script>

