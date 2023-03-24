<?php

session_start();

?>
<!DOCTYPE html>
    <html lang="en">
        <head>
            <title>home</title>
                <link href="profolio.css" rel="stylesheet">
                <link rel="stylesheet" href="https://use.fontawesome.com/release/v5.7.1/css/all.com">
        </head>
        <body>
            <div class="home">
                    <h3>Home</h3>

                        <?php if(isset($_SESSION["user_id"])): ?>

                            <p class="index">You are logged in.</p>

                            <p><a href="logout.php">Log out</a></p>

                        <?php else: ?>
                            <p class="index">You are logged in.</p>
                            <p><a href="login1.php">Log in</a> or <a href="signup.html">sign up</a></p>

                        <?php endif; ?>
            </div>
        </body>
    </html>
