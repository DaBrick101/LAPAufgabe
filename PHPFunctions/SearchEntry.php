<?php


require_once 'db.php';

GLOBAL $conn;

// Suchlogik
if (isset($_POST['submit'])) {
    $suchbegriff = $_POST['suchbegriff'];

    $sql = "SELECT Auto.AutoID, Modell.Modellname, Hersteller.Name, Auto.Farbe, Auto.Kilometerstand, Auto.Erstzulassung
            FROM Auto
            INNER JOIN Modell ON Auto.ModellID = Modell.ModellID
            INNER JOIN Hersteller ON Modell.HerstellerID = Hersteller.HerstellerID
            WHERE Auto.Farbe LIKE '%$suchbegriff%' OR Modell.Modellname LIKE '%$suchbegriff%' OR Hersteller.Name LIKE '%$suchbegriff%'";
    $result = $conn->query($sql);
} else {
    // Standardabfrage, um alle Autos mit Informationen zu Modell und Hersteller abzurufen
    $sql = "SELECT Auto.AutoID, Modell.Modellname, Hersteller.Name, Auto.Farbe, Auto.Kilometerstand, Auto.Erstzulassung
            FROM Auto
            INNER JOIN Modell ON Auto.ModellID = Modell.ModellID
            INNER JOIN Hersteller ON Modell.HerstellerID = Hersteller.HerstellerID";
    $result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <title>Document</title>
    </head>

    <nav class="navbar navbar-expand-lg bg-dark-subtle">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><span><img style="max-height: 30px; margin-right: 20px;"src="https://img.icons8.com/ios/250/FFFFFF/source-code.png"></img></span>LAP Praktische</a>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="..\HTML\index.html">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="..\HTML\AddEntryPage.html">Add Entry</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="DeleteAndEdit.php">Delete/Edit</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="GetAllEntries.php">Get All Entries</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="SearchEntry.php">Search</a>
            </li>
            
        </ul>
        </div>
    </div>
    </nav>
<body>
    <h1>Autosuche</h1>
    <form method="POST" action="">
        Suchbegriff: <input type="text" name="suchbegriff">
        <input type="submit" name="submit" value="Suchen">
    </form>
    
    <h2>Ergebnisse</h2>
    <table class="table">
        <tr>
            <th>AutoID</th>
            <th>Modell</th>
            <th>Hersteller</th>
            <th>Farbe</th>
            <th>Kilometerstand</th>
            <th>Erstzulassung</th>
        </tr>
        <?php
        // Schleife über die Ergebnisdaten
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["AutoID"] . "</td>";
                echo "<td>" . $row["Modellname"] . "</td>";
                echo "<td>" . $row["Name"] . "</td>";
                echo "<td>" . $row["Farbe"] . "</td>";
                echo "<td>" . $row["Kilometerstand"] . "</td>";
                echo "<td>" . $row["Erstzulassung"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Keine Ergebnisse gefunden</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
// Datenbankverbindung schließen
$conn->close();
?>