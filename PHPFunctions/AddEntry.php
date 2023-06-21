<?php 

require_once 'db.php';

GLOBAL $conn;

$modellname = $_POST['modellname'];
$herstellername = $_POST['herstellername'];
$baujahr = $_POST['baujahr'];
$preis = $_POST['preis'];
$farbe = $_POST['farbe'];
$kilometerstand = $_POST['kilometerstand'];
$erstzulassung = $_POST['erstzulassung'];
$land = $_POST['land'];

// SQL-Abfrage zum Einfügen des neuen Herstellers, falls er noch nicht existiert
$sql = "INSERT IGNORE INTO Hersteller (Name, Land) VALUES ('$herstellername', '$land')";

if ($conn->query($sql) === TRUE) {
    $herstellerID = $conn->insert_id;
} else {
    $herstellerID = mysqli_fetch_assoc(mysqli_query($conn, "SELECT Hersteller_ID FROM Hersteller WHERE Name = '$herstellername'"))['Hersteller_ID'];
}

// SQL-Abfrage zum Einfügen des neuen Modells, falls es noch nicht existiert
$sql = "INSERT IGNORE INTO Modell (Modellname, Hersteller_ID, Baujahr, Preis) VALUES ('$modellname', $herstellerID, $baujahr, $preis)";

if ($conn->query($sql) === TRUE) {
    $modelID = $conn->insert_id;
} else {
    $modelID = mysqli_fetch_assoc(mysqli_query($conn, "SELECT ModellID FROM Modell WHERE Modellname = '$modellname' AND Hersteller_ID = $herstellerID"))['ModellID'];
}

// SQL-Abfrage zum Einfügen des neuen Autos
$sql = "INSERT INTO Auto (ModellID, Farbe, Kilometerstand, Erstzulassung)
        VALUES ($modelID, '$farbe', $kilometerstand, '$erstzulassung')";

if ($conn->query($sql) === TRUE) {
    echo "Neues Auto wurde erfolgreich hinzugefügt.";
} else {
    echo "Fehler beim Hinzufügen des Autos: " . $conn->error;
}

// Datenbankverbindung schließen
$conn->close();
?>