<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Database configuratie
        $dbServer = "localhost";
        $dbUsername = "jouw_gebruikersnaam";
        $dbPassword = "jouw_wachtwoord";
        $dbName = "jouw_database_naam";

        // Verbinding maken met de database met PDO
        try {
            $dbh = new PDO("mysql:host=$dbServer;dbname=$dbName", $dbUsername, $dbPassword);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Fout: " . $e->getMessage();
        }
?>