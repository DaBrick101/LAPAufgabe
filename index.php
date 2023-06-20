<!--Diese Seite Zeigt alle einträge in der DB an, sozusagen Select * from Table -->
<?php 

require_once 'config/db.php';
require_once 'config/GetAllEntries.php';

$resultAllUser = GetAllUser_data();

?>
<!DOCTYPE html>
<html lang="en">
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
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="EditAndDeleteEntryPage.php">Edit and Delete</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="AddEntryPage.php">Add Entry Page</a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>

<body>
  <h1>Person Browser (All Entrys)</h1>
  <div style="height: 80px;"></div>
  
  
  <div class="container text-center">
    <h2>All Entrys</h2>
    <div style="height: 20px;"></div>
    <table class="table">
        <thead>
          <tr>
            <th>Personal_ID</th>
            <th>Vorname</th>
            <th>Nachname</th>
            <th>Kostenstelle</th>
          </tr>
        </thead>
        <tbody>
          <tr>
          <?php 
              while($row = $resultAllUser->fetch_assoc()){
              ?>
              <td><?php echo $row['Personal_ID']?></td>
              <td><?php echo $row['Vorname']?></td>
              <td><?php echo $row['Nachname']?></td>
              <td><?php echo $row['Kostenstelle']?></td>
          </tr>
          <?php 
          }
          ?>
        </tbody>
      </table>
  </div>

<div style="height: 50px;"></div>
  <div class="container text-center">
    <div class="row justify-content-center">
      <h2>Search for Entry</h2>
      <div style="height: 20px;"></div>

      <div class="col-md-8">
        <form method="POST" action="config/GetSpecificEntry.php">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="personal_id" class="form-label">Personal_id:</label>
              <input type="text" class="form-control" id="personal_id" name="personal_id">
            </div>
            <div class="col-md-6 mb-3">
              <label for="vorname" class="form-label">Vorname:</label>
              <input type="text" class="form-control" id="vorname" name="vorname">
            </div>
            <div class="col-md-6 mb-3">
              <label for="nachname" class="form-label">Nachname:</label>
              <input type="text" class="form-control" id="nachname" name="nachname">
            </div>
            <div class="col-md-6 mb-3">
              <label for="kostenstelle" class="form-label">Kostenstelle:</label>
              <input type="text" class="form-control" id="kostenstelle" name="kostenstelle">
            </div>
          </div>
          <button type="submit" class="btn btn-primary" name="search" >Search</button>
        </form>
      </div>
    </div>
  </div>
  
</body>
</html>