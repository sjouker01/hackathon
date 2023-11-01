<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
session_start();

// Gebruiker: iedereen met toegang tot het systeem 
// Analyzer: beheert logs en escaleert logs naar incidenten 
// Operator: beheert incidenten af 
// Manager: overzicht van alle logs en incidenten 
// Administrator: een gebruiker met alle rechten   



// switscase

 if (isset($_SESSION['rol_id'])) {

    switch ($_SESSION['rol_id']) {
        case 1:
            echo "Gebruiker";
            break;
        case 2:
            echo "Analyzer";
            break;
        case 3:
            echo "Operator";
            break;
        case 4:
            echo "Administrator";
            break;
        case 5:
            echo "manager";
            break;
        default:
            echo "Geen rol";
            echo " ga naar inlog";
            header("refresh:1;url=index.php");
            break;
    }
 }



 <main class="main-ilya">
 <section id="warning-table-container">
     <article id="table-info">
         <h1>Beveiligingslogs</h>
     </article>
     <table border="1" class="table-ilya">
         <thead>
             <tr class="th-ilya">
                 <th class="th-ilya">LogID</th>
                 <th class="th-ilya">Prioriteit</th>
                 <th class="th-ilya">Datum en tijd</th>
                 <th class="th-ilya">Waarschuwing</th>
             </tr>
         </thead>
         <tbody>
             <?php
             foreach ($logs as $log):
             ?>
                 <tr class="th-ilya">
                     <td class="th-ilya"><?= $log['LogID'] ?></td>
                     <td class="th-ilya"><?= $log['Prioriteit'] ?></td>
                     <td class="th-ilya"><?= $log['Datum_en_tijd'] ?></td>
                     <td class="th-ilya"><?= $log['Waarschuwing'] ?></td>
                 </tr>
             <?php endforeach; ?>
         </tbody>
     </table>
 </section>
 <section id="create-log-container">
     <h3>Voeg log toe</h3>
     <form method="post" action="" id="log-form">
         <fieldset>
             <label for="prioriteit">Prioriteit:</label>
             <select id="prioriteit" name="prioriteit">
                 <option value="waarschuwing">waarschuwing</option>
                 <option value="beveiliging">Beveiliging</option>
             </select>
         </fieldset>
         <fieldset>
             <label for="datum_en_tijd">Datum & Tijd:</label>
             <input type="datetime-local" id="datum_en_tijd" name="datum_en_tijd">
         </fieldset>
         <fieldset>
             <label for="waarschuwing">Waarschuwing</label>
             <input type="text" id="waarschuwing" name="waarschuwing" required>
         </fieldset>
         <input type="submit" value="Voeg toe" name="create" id="submit-button">
     </form>
 </section>
</main>
    




?>
</body>
</html>