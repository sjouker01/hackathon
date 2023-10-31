<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post">
        Gebruikersnaam: <input type="text" name="gebruikersnaam"><br>
        Wachtwoord: <input type="password" name="wachtwoord"><br>
        <input type="submit" value="Inloggen">
    </form>

    <?php
    if (isset($_POST["gebruikersnaam"]) && isset($_POST["wachtwoord"])) {
        require "dbconnect.php";

        // Gebruikersnaam en wachtwoord van het formulier ophalen
        $gebruikersnaam = $_POST["gebruikersnaam"];
        $wachtwoord = $_POST["wachtwoord"];

        // Query voor het controleren van gebruikersnaam en wachtwoord
        $query = "SELECT * FROM gebruikers WHERE gebruikersnaam = :gebruikersnaam AND wachtwoord = :wachtwoord";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':gebruikersnaam', $gebruikersnaam);
        $stmt->bindParam(':wachtwoord', $wachtwoord);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Inloggen gelukt
            session_start();
            $_SESSION["gebruikersnaam"] = $gebruikersnaam;
            echo "Inloggen geslaagd. Welkom, $gebruikersnaam!";
            header("Location: dashboard.php");
        } else {
            // Inloggen mislukt
            echo "Inloggen mislukt. Controleer je gegevens.";
        }
    }
    ?>
</body>
</html>