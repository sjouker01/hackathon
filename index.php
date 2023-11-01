<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">
    <title>Login</title>
</head>


<body>
    <nav class="navbar">
        <div class="navbar-brand">
            <a href="#">Dashboard</a>
        </div>
        <ul class="navbar-nav">
            <li><a href="#">Leden beheren</a></li>
            <li><a href="#">Log in</a></li>
        </ul>
    </nav>

    <div class="login-form-container">
        <form class="login-form">
            <div class="login-container">
           
                <h2><b>Inloggen</b></h2>
        </div>
 
            <input type="text" placeholder="Gebruikersnaam" name="gebruikersnaam" required>
            <input type="password" placeholder="Wachtwoord" name="wachtwoord" required>
            <button type="submit">Inloggen</button>
        </form>
    </div>


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


=======


