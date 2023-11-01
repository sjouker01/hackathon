<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<h1>welkom</h1>
<a href="inlog.php"> Login</a><br>
<?php
require_once "conn.php";

    session_start();
if (isset($_SESSION['gebruikersnaam'])) {
        $gebruikersnaam = $_SESSION['gebruikersnaam'];
        echo "Welkom  $gebruikersnaam ! <br>";
        echo "<a href='dashboard.php'>dashboard</a> <br>";
      
    } else {
        echo "Welkom, gast!";
        echo "als iet wil doen moet je inlooggen <br>";
    }

?>
</body>
</html>

