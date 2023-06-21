<!-- Erstellt einen Eintrag-->
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

// SQL-Abfrage zum Einfügen des neuen Herstellers, falls er noch nicht existiert
$sql = "INSERT IGNORE INTO Hersteller (Name) VALUES ('$herstellername')";

if ($conn->query($sql) === TRUE) {
    $herstellerID = $conn->insert_id;
} else {
    $herstellerID = mysqli_fetch_assoc(mysqli_query($conn, "SELECT HerstellerID FROM Hersteller WHERE Name = '$herstellername'"))['Hersteller_ID'];
}

// SQL-Abfrage zum Einfügen des neuen Modells, falls es noch nicht existiert
$sql = "INSERT IGNORE INTO Modell (Modellname, HerstellerID, Baujahr, Preis) VALUES ('$modellname', $herstellerID, $baujahr, $preis)";

if ($conn->query($sql) === TRUE) {
    $modelID = $conn->insert_id;
} else {
    $modelID = mysqli_fetch_assoc(mysqli_query($conn, "SELECT ModellID FROM Modell WHERE Modellname = '$modellname' AND HerstellerID = $herstellerID"))['ModellID'];
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
                <a class="nav-link" href="..\HTML\DeleteAndEditPage.html">Delete/Edit</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="..\HTML\GetAllEntrysPage.html">Get All Entries</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="..\HTML\SearchEntryPage.html">Search</a>
            </li>
            
        </ul>
        </div>
    </div>
    </nav>

    <body>
    <div class="container text-center">
        <div style="height: 30px;"></div>
        <div class="jumbotron">
            <h2 class="display-3">Home - LAP Praktische</h2>
            <div style="height: 30px;"></div>
            <p class="lead">Diese Website beinhaltet die Praktische LAP Übung</p>
            <hr class="my-2">
        </div>
        <div style="height: 50px;"></div>
        <h2>ADD ENTRY</h2>
        <div style="height: 20px;"></div>
        <h4>Entry successfully added!</h4>
        <p>Add another Entry?</p>
        <a class="btn btn-primary" href="..\HTML\AddEntryPage.html" role="button"></a>
    </div>
    
