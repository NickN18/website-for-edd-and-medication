<div id="menu">
    <div id="menuHome" class="menuItem<?php if ($activeMenu == "Home") { echo " menuActive"; } ?>">Home</div>
    <div id="menuMedi" class="menuItem<?php if ($activeMenu == "Medication") { echo " menuActive"; } ?>">Medication</div>
    <div id="menuAdmin" class="menuItem<?php if ($activeMenu == "Admin") { echo " menuActive"; } ?>">Admin</div>
    <div id="menuContact" class="menuItem<?php if ($activeMenu == "Contact") { echo " menuActive"; } ?>">Contact</div>
</div>

<script>
var menuHome = document.querySelector("#menuHome");
menuHome.addEventListener("click", function(){ window.location = "home.php"; }, false);
var menuMedi = document.querySelector("#menuMedi");
menuMedi.addEventListener("click", function(){ window.location = "medication-prescrip.php"; }, false);
var menuAdmin = document.querySelector("#menuAdmin");
menuAdmin.addEventListener("click", function(){ window.location = "adminTrivia.php"; }, false);
var menuContact = document.querySelector("#menuContact");
menuContact.addEventListener("click", function(){ window.location = "contactUs.php";}, false);
</script>
