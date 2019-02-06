<?php 
    if (isset($_POST["btnLogout"])) {
        session_unset();
    }
?>

<!doctype html>
<title>AND - <?php echo $activeMenu ?></title>
<link rel="stylesheet" href="css/styles.css" />

<div id="header">
    <div id="headerTitle">
        <a href="home.php" style="color:black;">And</a>
    </div>
    
    <div id="headerSignIn">
<?php
if (isset($_SESSION['userName'])) {
?>
    <b id="welcome">Welcome <?php echo $_SESSION['userName'] ?></b><br><br>
    <form method="post">
        <button type="submit" name="btnLogout" id="btnLogout">Sign out</button>
    </form>
<?php
} else {
    echo "<a href='authLogin.php'>Sign in</a>";
}
?>
    </div>
    
</div>
