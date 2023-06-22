<?php

require_once 'db.php';

GLOBAL $conn;
// Funktion zum Löschen eines Autos
if (isset($_GET['delete'])) {
    $autoID = $_GET['delete'];
    $sql = "DELETE FROM Auto WHERE AutoID = $autoID";
    $conn->query($sql);
}

// SQL-Abfrage, um alle Autos mit Informationen zu Modell und Hersteller abzurufen
$sql = "SELECT Auto.AutoID, Modell.Modellname, Hersteller.Name, Auto.Farbe, Auto.Kilometerstand, Auto.Erstzulassung
        FROM Auto
        INNER JOIN Modell ON Auto.ModellID = Modell.ModellID
        INNER JOIN Hersteller ON Modell.HerstellerID = Hersteller.HerstellerID";

$result = $conn->query($sql);

// Bearbeiten des Autos
if (isset($_POST['submit'])) {
    $autoID = $_POST['autoID'];
    $farbe = $_POST['farbe'];
    $kilometerstand = $_POST['kilometerstand'];
    $erstzulassung = $_POST['erstzulassung'];

    $sql = "UPDATE Auto SET Farbe = '$farbe', Kilometerstand = $kilometerstand, Erstzulassung = '$erstzulassung' WHERE AutoID = $autoID";
    $conn->query($sql);
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
    <div class="container text-center">
        <div style="height: 30px;"></div>
        <div class="jumbotron">
            <h2 class="display-3">Delete and Edit - LAP Praktische</h2>
            <div style="height: 30px;"></div>
            <p class="lead">Diese Website beinhaltet die Praktische LAP Übung</p>
            <hr class="my-2">
        </div>
    <div class="table-responsive">
        <table class="table">
                <tr>
                    <th>AutoID</th>
                    <th>Modell</th>
                    <th>Hersteller</th>
                    <th>Farbe</th>
                    <th>Kilometerstand</th>
                    <th>Erstzulassung</th>
                    <th>Aktionen</th>
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
                        echo "<td>
                                <a href='?edit=" . $row["AutoID"] . "'>Bearbeiten</a> |
                                <a href='?delete=" . $row["AutoID"] . "' onclick='return confirm(\"Möchtest du das Auto wirklich löschen?\")'>Löschen</a>
                            </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>Keine Daten vorhanden</td></tr>";
                }
                ?>
            </table>
    </div>
        

    <?php
    // Bearbeitungsformular anzeigen, wenn ein Auto bearbeitet werden soll
    if (isset($_GET['edit'])) {
        $autoID = $_GET['edit'];

        $sql = "SELECT * FROM Auto WHERE AutoID = $autoID";
        $editResult = $conn->query($sql);

        if ($editResult->num_rows == 1) {
            $editData = $editResult->fetch_assoc();

            echo "<h2>Bearbeiten: Auto #" . $editData["AutoID"] . "</h2>";
            echo "<form method='POST' action=''>
                <div class='row'>
                <input type='hidden' class='form-control' name='autoID' value='" . $editData["AutoID"] . "'>
                <div class='col'>
                    Farbe: <input type='text' class='form-control' name='farbe' value='" . $editData["Farbe"] . "'>
                </div>
                <div class='col'>
                    Kilometerstand: <input type='number' class='form-control' name='kilometerstand' value='" . $editData["Kilometerstand"] . "'>
                </div>
                <div class='col'>
                    Erstzulassung: <input type='date' class='form-control' name='erstzulassung' value='" . $editData["Erstzulassung"] . "'><br>
                </div>
                    <input type='submit' name='submit' class='btn btn-warning' value='Speichern' onclick='location.reload()'>
                </div>
                    
                  </form>";
        }
    }
    ?>

    </div>
    
    </body>
</html>
<?php
// Datenbankverbindung schließen
$conn->close();
?>