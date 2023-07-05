<?php
include_once "./config.php";

$user = new Users();

$record = $user->tableList();

if(isset($_GET['id'])){
  $del = $user->deleteData($_GET['id']);
  if($del){
    header("Location: ./table.php");
  } else {
    echo $del;
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/bootstrap.css">
  <title>CRUD</title>
  <style>
    table,
    th,
    td {
      border: 1px solid;
      text-align: center;
      padding: 10px;
    }

    .btn{
      margin: auto;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1 align="center">Data Table</h1>
    <button><a href="./insert_form.php" class = "btn">Insert</a></button>
    <table align="center">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Class</th>
        <th>Section</th>
        <th>Gender</th>
        <th>Action</th>
      </tr>
      <?php
            $id = "";
          foreach($record as $val){
              $id++;
          echo "<tr>
            <td> $id </td>
            <td>" . $val['name'] . "</td>
            <td>" . $val['class'] . "</td>
            <td>" . $val['section'] . "</td>
            <td>" . $val['gender'] .  "</td>
            <td>" . '<a href="update.php?id=' . $val['id'] . '">Edit</a> 
            <a href="table.php?id=' . $val['id'] . '">Delete</a>' .  "</td>
          </tr>";
          }
      ?>
    </table>
  </div>
</body>

</html>