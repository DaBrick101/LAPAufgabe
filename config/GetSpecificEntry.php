<?php 

require_once 'db.php';

$personal_ID = $_POST["personal_id"];
$prename = $_POST["vorname"];
$name = $_POST["nachname"];
$kostenstelle =  $_POST["kostenstelle"];

global $conn;
$query = "SELECT * FROM benutzer WHERE personal_id LIKE '$personal_ID' OR vorname LIKE '$prename' OR nachname LIKE '$name' OR kostenstelle LIKE '$kostenstelle'";

$result = mysqli_query($conn,$query);

?>

<!-- HTML-Tabelle zur Anzeige der Ergebnisse -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table>
  <thead>
    <tr>
      <th>Spaltenname 1</th>
      <th>Spaltenname 2</th>
      <th>Spaltenname 3</th>
      <th>Spaltenname 4</th>
      <!-- Weitere Spaltennamen hier -->
    </tr>
  </thead>
  <tbody>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
      <tr>
        <td><?php echo $row['Personal_ID']; ?></td>
        <td><?php echo $row['Vorname']; ?></td>
        <td><?php echo $row['Nachname']; ?></td>
        <td><?php echo $row['Kostenstelle']; ?></td>
        <!-- Weitere Spaltenwerte hier -->
      </tr>
    <?php } ?>
  </tbody>
</table>
</body>
</html>
