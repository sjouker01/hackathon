<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gebruikersbeheer</title>
</head>
<body>
    <h2>Gebruikersbeheer</h2>
    <table border="1">
        <tr>
            <th>Gebruikersnaam</th>
            <th>Rol</th>
            <th>Actie</th>
        </tr>
        <?php
        require "dbconnect.php";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Verwerk de rolwijziging
            $gebruiker_id = $_POST['gebruiker_id'];
            $nieuwe_rol_id = $_POST['nieuwe_rol'];

            // Query om de rol van de gebruiker bij te werken
            $updateQuery = "UPDATE gebruikers SET rol_id = :nieuwe_rol WHERE id = :gebruiker_id";
            $updateStmt = $conn->prepare($updateQuery);
            $updateStmt->bindParam(':nieuwe_rol', $nieuwe_rol_id);
            $updateStmt->bindParam(':gebruiker_id', $gebruiker_id);

            if ($updateStmt->execute()) {
                echo "Rolverandering succesvol.";
            } else {
                echo "Rolverandering mislukt.";
            }
        }

        // Query om alle gebruikers op te halen
        $query = "SELECT gebruikers.id, gebruikers.gebruikersnaam, rollen.rol_naam FROM gebruikers
                  INNER JOIN rollen ON gebruikers.rol_id = rollen.id";
        $stmt = $conn->query($query);

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['gebruikersnaam'] . "</td>";
            echo "<td>" . $row['rol_naam'] . "</td>";
            echo "<td>
                    <form method='post' action='wijzig_rol.php'>
                        <input type='hidden' name='gebruiker_id' value='" . $row['id'] . "'>
                        <select name='nieuwe_rol'>";
                        
            // Query om alle beschikbare rollen op te halen
            $rolQuery = "SELECT * FROM rollen";
            $rolStmt = $conn->query($rolQuery);

            while ($rol = $rolStmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='" . $rol['id'] . "'>" . $rol['rol_naam'] . "</option>";
            }

            echo "</select>
                  <input type='submit' value='Wijzig Rol'>
                  </form>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
