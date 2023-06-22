<?php 

require_once 'db.php';

$sql = "SELECT Auto.AutoID, Modell.Modellname, Hersteller.Name, Auto.Farbe, Auto.Kilometerstand, Auto.Erstzulassung
        FROM Auto
        INNER JOIN Modell ON Auto.ModellID = Modell.ModellID
        INNER JOIN Hersteller ON Modell.HerstellerID = Hersteller.HerstellerID";

$result = $conn->query($sql);



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
                <h2 class="display-3">All Entries - LAP Praktische</h2>
                <div style="height: 30px;"></div>
                <p class="lead">Diese Website beinhaltet die Praktische LAP Übung</p>
                <hr class="my-2">
            </div>
            <div style="height: 50px;"></div>
            <table class="table">
                <thead>
                    <tr>
                    <th>Auto ID</th>
                    <th>Modell Name</th>
                    <th>Hersteller</th>
                    <th>Farbe</th>
                    <th>Kilometerstand</th>
                    <th>Erstzulassung</th>
                    <!-- Weitere Spaltennamen hier -->
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['AutoID']; ?></td>
                        <td><?php echo $row['Modellname']; ?></td>
                        <td><?php echo $row['Name']; ?></td>
                        <td><?php echo $row['Farbe']; ?></td>
                        <td><?php echo $row['Kilometerstand']; ?></td>
                        <td><?php echo $row['Erstzulassung']; ?></td>
                        <!-- Weitere Spaltenwerte hier -->
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </body>