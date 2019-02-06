<?php
session_start();

include_once 'includes/dbConnect.php';

if (isset($_SESSION['userSession'])) {
    session_unset();
}

// ************************************
// Did the user click on the SUBMIT button?
if (isset($_POST['btnLogin'])) {
    // the user is trying to log in
    // lets scrub up any user typed input
    $userEmail = strip_tags($_POST['userEmail']);
    $userPassword = strip_tags($_POST['userPassword']);

    $userEmail = $DBcon->real_escape_string($userEmail);
    $userPassword = $DBcon->real_escape_string($userPassword);

    $sql = "SELECT userID, userName, userEmail, userPassword ";
    $sql .= "FROM users ";
    $sql .= "WHERE userEmail='$userEmail' AND userPassword='$userPassword'";
    
    $query = $DBcon->query($sql);
    $row = $query->fetch_array();
    $count = $query->num_rows; // if email/password are correct returns must be 1 row

    if ($count==1) {
        $_SESSION["userSession"] = $row["userID"];
        $_SESSION["userName"] = $row["userName"];
        header("Location: home.php");
        exit;
    } else {
        $msg = "<div>Incorrect Username or Password</div>";
    }
    
}

$DBcon->close();

include "includes/headerNoSignIn.php";
?>

<form method="post" id="loginForm">
    <?php if (isset($msg)) { echo $msg; } ?>
    <div>
        <input type="email" placeholder="Email address" name="userEmail" required />
    </div>
    <div>
        <input type="password" placeholder="Password" name="userPassword" required />
    </div>
    <div id="loginBtn">
        <button type="submit" name="btnLogin" id="btnLogin">Sign in</button> 
    </div>  
</form>
<hr/>
<div>
    Need to register? <a href="authRegister.php" id = "createAccountBut"> Create an account HERE</a>
</div>

