<?php

if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("valid email is required");
    end();
}

if (strlen($_POST["password"]) < 6 ) {
    die("Password must be least 6 characters");
}

if (!preg_match("/(?=.*[a-z])(?=.*[A-Z])/", $_POST["password"])){
    die("Password must contain at least one letter lowercase and uppercase.");
}

if (!preg_match("/[0-9]/", $_POST["password"])){
    die("Password must contain at least one number");
}

if ($_POST["password"] !== $_POST["repassword"]){
    die("Passwords must match");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO users (email, password_hash)
        VALUES (?, ?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("ss",
                  $_POST["email"],
                  $password_hash);
  
if ($stmt->execute()) {

    header("Location: signup-success.html");
    exit;
    
} else {
    
    if ($mysqli->errno === 1062) {
        die("email already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}
?>
