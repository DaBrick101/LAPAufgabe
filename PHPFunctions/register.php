<?php 

require_once 'db.php';

$personal_ID = htmlspecialchars($_POST["inputPersonalID"]);
$vorname = htmlspecialchars($_POST["inputVorname"]);
$nachname = htmlspecialchars($_POST["inputNachname"]);
$kostenstelle = htmlspecialchars($_POST["inputKostenstelle"]);
$email = htmlspecialchars($_POST["inputEmail"]);
$passwort = password_hash(htmlspecialchars($_POST["inputPasswort"]), PASSWORD_DEFAULT);

GLOBAL $conn;

$sql = "INSERT INTO benutzer (Personal_ID, Vorname, Nachname, Kostenstelle, Email, Passwort)
VALUES ('$personal_ID','$vorname', '$nachname','$kostenstelle','$email','$passwort')";

if (mysqli_query($conn, $sql)) {
    //INVOKE SQL QUERY
    } else {
    echo "Error: " . $sql . " " . mysqli_error($conn);
    //Error msg @ failure
    }
  mysqli_close($conn);
  //End mysql connection!!
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
        <a class="navbar-brand" href="#">LAP Praktische</a>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../indexRebuild.php">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="AddEntryPage.php">Add Entry Page</a>
            </li>
            
        </ul>
        </div>
    </div>
    </nav>

    <body>
    <div class="container text-center">
        <div style="height: 30px;"></div>
        <div class="jumbotron">
            <h2 class="display-3">Register - LAP Praktische</h2>
            <div style="height: 30px;"></div>
            <p class="lead">Diese Website beinhaltet die Praktische LAP Übung</p>
            <hr class="my-2">
        </div>
        <div style="height: 30px;"></div>
        <div class="row column text-center">
      <h2>Successfully registered</h2>
      <p>You can now register another user, or get the Data of your User. You can also delete the User</p>      
    </div>    
    </div>