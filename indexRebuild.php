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
            <a class="nav-link active" aria-current="page" href="indexRebuild.php">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="AddEntryPage.html">Add Entry Page</a>
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
        <h2>REGISTER</h2>
        <div style="height: 20px;"></div>

    </div>
    

    <div class="container ">
      <form name="register" id="formRegister" action="PHPFunctions/register.php" method="post" class="row g-3 align-items-center">
            <div class="col-md-2">
                <label for="inputPersonalID" class="form-label">Personalnummer:</label>
                <input type="text" class="form-control" id="inputPersonalID" name="inputPersonalID" required>
            </div>
            <div class="col-md-3">
                <label for="inputVorname" class="form-label">Vorname:</label>
                <input type="text" class="form-control" id="inputVorname" name="inputVorname" required>
            </div>
            <div class="col-md-3">
                <label for="inputNachname" class="form-label">Nachname:</label>
                <input type="text" class="form-control" id="inputNachname" name="inputNachname" required>
            </div>
            <div class="col-md-4">
                <label for="inputKostenstelle" class="form-label">Kostenstelle:</label>
                <input type="text" class="form-control" id="inputKostenstelle" name="inputKostenstelle" required>
            </div>
            <div class="col-md-6">
                <label for="inputEmail" class="form-label">Email:</label>
                <input type="email" class="form-control" id="inputEmail" name="inputEmail" required>
            </div>
            <div class="col-md-6">
                <label for="inputPasswort" class="form-label">Password:</label>
                <input type="password" class="form-control" id="inputPasswort" name="inputPasswort" pattern="0-9]{5}" required>
            </div>
            
            <button type="submit" class="btn btn-warning">Submit</button>
        </div> 
    </div>
    </body>
</html>