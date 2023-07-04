<?php
class Users
{
  private $conn;
  function __construct()
  {
    $this->conn = mysqli_connect("localhost", "root", "", "oop");
    if (mysqli_connect_error()) {
      echo mysqli_connect_error();
    }
  }
  function tableList()
  {
    $query = "SELECT * FROM `oops-table`";
    $getQuery = mysqli_query($this->conn, $query);
    while($data = mysqli_fetch_array($getQuery)){
      echo "<pre>"; print_r($data); die;
    }
  }
  function deleteData($id)
  {
    $query = "DELETE FROM `oops-table` WHERE `id` = '".$id."'";
    $result = mysqli_query($this->conn, $query);
    if($result){
      return true;
    } else {
      return false;
    } 
    echo "new function";
  }
}
$user = new Users();
$record = $user->tableList();
if(isset($_GET['id'])){
  $del = $user->deleteData($_GET['id']);
  if($del){
    header("Location : table.php");
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
  </style>
</head>

<body>
  <div class="container">
    <h1 align="center">Data Table</h1>
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
          foreach($arr as $data){
              $id++;
          echo "<tr>
            <td> $id </td>
            <td>" . $data['name'] . "</td>
            <td>" . $data['class'] . "</td>
            <td>" . $data['section'] . "</td>
            <td>" . $data['gender'] .  "</td>
            <td>" . '<a href="update.php?id=' . $data['id'] . '">Edit</a> 
            <a href="table.php?id=' . $data['id'] . '">Delete</a>' .  "</td>
          </tr>";
          }
      ?>
    </table>
  </div>
</body>

</html>