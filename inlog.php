<!DOCTYPE html>
<html>
<head>
    <title>Inloggen</title>
</head>
<body>
    <h2>Inloggen</h2>
    <form method="post" action=""> <!-- Verander "login.php" naar de naam van je PHP-bestand -->
        <label for="gebruikersnaam">Gebruikersnaam:</label>
        <input type="text" name="gebruikersnaam" id="gebruikersnaam" required>

        <br>

        <label for="wachtwoord">Wachtwoord:</label>
        <input type="password" name="wachtwoord" id="wachtwoord" required>

        <br>

        <input type="submit" name="login" value="Inloggen">
    </form>
</body>
</html>
<?php
require_once "conn.php";

session_start();
if (isset($_POST['login'])) {
    $username = $_POST['gebruikersnaam'];
    $password = $_POST['wachtwoord'];

    $sql = "SELECT  gebruikersnaam,  rol_id FROM gebruikers WHERE gebruikersnaam = '$username' AND wachtwoord = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $id = $row['rol_id'];
        $username = $row['gebruikersnaam'];

        // Inloggen gelukt
        $_SESSION["gebruikersnaam"] = $username;
        $_SESSION["rol_id"] = $id; // Sla de gebruikers-ID op in de sessie
        echo "<p>Welkom, $username!</p";

        // Terug naar index.php na 3 seconden
        header("refresh:1;url=index.php");
    } else {
        echo "<p>Ongeldige inloggegevens. Probeer opnieuw.</p>";
    }
}
?>
