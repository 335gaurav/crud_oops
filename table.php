<?php
include_once "./config.php";

$user = new Users();

if (isset($_GET['id'])) {
  $del = $user->deleteData($_GET['id']);
  if ($del) {
    header("Location: ./table.php");
  } else {
    echo $del;
  }
}
$search = null;
if (isset($_GET['search'])) {
  $search = $_GET["search"];
  // echo "<pre>"; print_r($_GET); die;
  $record = $user->searchData($_GET['search']);

  if (!$record) {
    echo "No Data Found !!";
  }
} else {
  $record = $user->tableList();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../lib/css/bootstrap.css">
  <title>CRUD</title>
  <style>
    table {
      border: 2px solid;
      text-align: center;
      padding: 10px;
      border-collapse: collapse;
    }

    th,
    td {
      border: 1px solid;
      text-align: center;
      padding: 10px;
      border-collapse: collapse;
    }

    .search {
      border: 1px solid grey;
      padding: 5px;
      border-radius: 4px;
    }

    .btn-wrap {
      display: flex;
      justify-content: space-between;
      padding-bottom: 10px;
    }

    .search-btn-wrap {
      display: flex;
      gap: 10px;
    }

    /* .btn{
      text-align:center;
      border: 1px solid grey;
    } */
  </style>
</head>

<body>
  <div class="container">
    <h1 align="center">Data Table</h1>
    <div class="btn-wrap">
      <a class="btn btn-outline-primary" href="./insert_form.php">Insert</a>
      <div class="search-btn-wrap">
        <form action="" method="get">
          <input class="search" type="search" placeholder="search..." name="search" value="<?php echo $search; ?>">
          <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </div>
    <table align="center" class="table">
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
      foreach ($record as $val) {
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