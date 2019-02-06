<?php
session_start();
$activeMenu = "Medication";
include "includes/header.php";
include "includes/menu.php";

$servername = getenv("IP");
$username = getenv("C9_USER");
$password = "";
$database = "";
$dbport = 3306;
 
$db = new mysqli($servername, $username, $password, $database, $dbport);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

?>
<div id="content">
    This is the Medication page
</div>
<script>

var selectMedication = document.querySelector('#selectMedication');
selectMedication.addEventListener('click', selectMedicationClick, false);

function selectMedicationClick() {
    window.location = "selectMedication.php";
}
    
</script>