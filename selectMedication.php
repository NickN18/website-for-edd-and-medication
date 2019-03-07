<?php
session_start();

$activeMenu = "Medication";
include "includes/header.php";
include "includes/menu.php";

$servername = getenv("IP");
$username = getenv("C9_USER");
$password = "";
$database = "mediPerUser"; 
$dbport = 3306;

$db = new mysqli($servername, $username, $passowrd, $database, $dbport);

if($db->connect_error) {
    die("Connection failed" . $db->connect_error);
}


?>

<div id="content">
    Yee yee
</div>



<h2> <?php echo $_SESSION['userName'] ?> , here is your medication schedule for this week</h2>

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

Database Name: mediPerUser

Values(userEmail, medication, dosage, dateToTake)

*******************************************************************************
*******************************************************************************
*/



$sql = "select medication, dosage, dateToTake from mediPerUser order by dateToTake";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
?>

    <tr>
<!--        

Down below, need to create a secondary database in MySQL where it will take the data
from the "user" database and show specific data according to the userEmail.

The patient should not be able to edit any of this data, but instead, if discussed, have a contact
button to their doctor and a information button to get more specific information to the medication type


-->

        </td>
        <td><?php echo $row["movieID"]; ?></td>
        <td><?php echo $row["title"]; ?></td>
        <td><?php echo $row["releaseDate"]; ?></td>
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

