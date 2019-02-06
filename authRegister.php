<?php
session_start();

include_once 'includes/dbConnect.php';

// ************************************
// Did the user click on the SUBMIT button?
if (isset($_POST['btnRegister'])) {
    // the user is trying to register
    // lets scrub up any user typed input
    $userName = strip_tags($_POST['userName']);
    $userEmail = strip_tags($_POST['userEmail']);
    $userPassword = strip_tags($_POST['userPassword']);

    $userName = $DBcon->real_escape_string($userName);
    $userEmail = $DBcon->real_escape_string($userEmail);
    $userPassword = $DBcon->real_escape_string($userPassword);

    // FIRST, check to make sure this email isn't already in the system
    $sql = "SELECT userID ";
    $sql .= "FROM users ";
    $sql .= "WHERE userEmail='$userEmail'";
    $query = $DBcon->query($sql);
    $row = $query->fetch_array();
    $count = $query->num_rows; // if email/password are correct returns must be equivalent to 1 row
    
    if ($count==0) {
        // No matching email was found in the database
        // Ok to add new user
        $sql = "INSERT INTO users ";
        $sql .= "(userName, userEmail, userPassword) ";
        $sql .= "VALUES ";
        $sql .= "('$userName','$userEmail','$userPassword')";
        echo "sql = " . $sql;
        if ($DBcon->query($sql) === TRUE) {
            header("Location: authLogin.php");
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $db->error;
        }
        
    } else {
        // an existing email exists in the database
        // send a message to the user
        $msg = "<div><i> I'm sorry Dave, I'm afraid I can't do that </i> <br> <br> Email address is already registered</div>";
    }
    
}

$DBcon->close();

include "includes/headerNoSignIn.php";
?>

<form method="post" id="RegisterForm">
    <?php if (isset($msg)) { echo $msg; } ?>
    <div>
        <input type="text" placeholder="Name" name="userName" required />
    </div>
    <div>
        <input type="email" placeholder="Email address" name="userEmail" required />
    </div>
    <div>
        <input type="password" placeholder="Password" name="userPassword" required />
    </div>
    <div id="registerBtn">
        <button type="submit" name="btnRegister" id="btnRegister">Register</button> 
    </div>  
</form>
<hr/>
<div>
    Already have an account? <a href="authLogin.php" id="signInBut">Sign in here</a>
</div>

