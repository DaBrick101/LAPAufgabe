//Diese Seite Zeigt alle einträge in der DB an, sozusagen Select * from Table
<?php 

require_once 'config/db.php';
require_once 'config/functions.php';

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
<body>
  <h1>Person Browser (All Entrys + Edit/Delete)</h1>
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Prename</th>
        <th>Date Of Birth</th>
        <th>Email</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      <?php 
        while($row = $resultAllUser->fetch_assoc()){
        ?>
        <td><?php echo $row['ID']?></td>
        <td><?php echo $row['Name']?></td>
        <td><?php echo $row['Prename']?></td>
        <td><?php echo $row['DateOfBirth']?></td>
        <td><?php echo $row['Email']?></td>
        <td><a href="#" class="btn btn-primary">Edit</a></td>
        <td><a href="#" class="btn btn-danger">Delete</a></td>

      
      </tr>
      <?php 
      }
      ?>
    </tbody>
  </table>
</body>
</html>