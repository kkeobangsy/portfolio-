<?php
$is_invalid = false;

if($_SERVER["REQUEST_METHOD"] === "POST") {
	
	$mysqli = require __DIR__ . "/database.php";

	$sql = sprintf("SELECT * FROM users
					WHERE email = '%s'",
					$mysqli->real_escape_string($_POST["email"]));


	$result = $mysqli->query($sql);

	$users = $result->fetch_assoc();

	if($users)	{
		if(password_verify($_POST["psw"], $users["password_hash"])){
			
      session_start();
        $_SESSION["user_id"] = $user["id"];

        header("Location: index.php");
        exit;

		} else {

    }
	}
  $is_invalid = true;


}

?>
<!DOCTYPE html>
    <html lang="en">
        <head>
            <title>Signup</title>
                <link href="profolio.css" rel="stylesheet">
                <link rel="stylesheet" href="https://use.fontawesome.com/release/v5.7.1/css/all.com">
        </head>
        <body>
            <div class="logo1">
                <img src="pic/logo1.jpg">
            </div>
            <div class="login1">
                <h3>Log In</h3>
                  <?php if($is_invalid): ?>
                     <em>Invalid login</em>
                  <?php endif; ?>

                <form method="post">
                    <label for="e_mail" class="e_mail">Email:</label><br>
                        <input type="text" id="email" class="eput" name="email" placeholder="email.."
                            value="<?= htmlspecialchars($_POST["email"] ?? "") ?>"><br>
                    <label for="password" class="password">Password:</label><br>
                        <input type="password" id="psw" class="psw" name="psw" placeholder="password.."><br>
                        <input type="checkbox" onclick="myClick3()" class="check">
                        <p class="spw">Show Password</p><br>
                        <button type="submit" class="submit" value="submit">LogIn</button>
                        <button type="signup" class="signup" value="signup"><a href="signup.html">Home</a></button>
                        <input type="reset" class="resetc1" value="Clear">
                </form>
            </div>
        </body>
    </html>
