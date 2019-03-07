<?php
session_start();

if(isset($_SESSION['userName'])) {
    header("Location: selectMedication.php");
    
}

$activeMenu = "Medication";
include("includes/header.php");
include("includes/menu.php");

include_once("includes/dbConnect.php");
 
?>
<div id="content">
    This is the Medication page
</div>
