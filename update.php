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
  function getFormData($id)
  {
    $query = "SELECT * FROM `oops-table` WHERE   `id` = ' " . $id . "' ";
    $result = mysqli_query($this->conn, $query);
    $getData = mysqli_fetch_array($result);
    // echo "<pre>"; print_r($getData); die;
    return $getData;
  }

  function updateFormData($data, $id)
  {
    $query = "UPDATE `oops-table` SET `name`='" . $data['name'] . "',`class`='" . $data['class'] . "',`section`='" . $data['section'] . "',`gender`='" . $data['gender'] . "' WHERE  `id` = '" . $id . "'";
    $runQuery = mysqli_query($this->conn, $query);
    if ($runQuery) {
      return true;
    } else {
      return false;
    }
  }
}
$user = new Users();

if (isset($_GET['id'])) {
  // echo "yes";
  $editData = $user->getFormData($_GET['id']);

  if (isset($_POST["update"])) {
    $updates = $user->updateFormData($_POST, $_GET['id']);
    if ($updates) {
      header('Location: table.php');
    } else {
      echo 'error';
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/bootstrap.css">
  <title>Edit form</title>
  <style>
    form {
      width: 700px;
      display: flex;
      flex-direction: column;
      text-align: left;
      gap: 10px;
      /* align-items: left; */
    }

    .radio-btn {
      display: flex;
      gap: 4px;
      align-items: center;
    }

    .btn {
      border: 1px solid;
      background-color: beige;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>Insert Form</h1>
    <form action="#" method="post" align="center">
      <label for="name"> Name :</label>
      <input type="text" name="name" id="name" value="<?php echo $editData['name']; ?>">

      <label for="class">Class :</label>
      <input type="text" name="class" id="class" value="<?php echo $editData['class']; ?>">

      <label for="section"> Section :</label>
      <input type="text" name="section" id="section" value="<?php echo $editData['section']; ?>">

      <label for="gender">Gender :</label>
      <div class="radio-btn">
        <!-- <input type="hidden" name="gender"> -->
        <input type="radio" name="gender" id="male" value="Male" <?php if ($editData['gender']=="Male" ) {
          echo "checked" ; } ?>>
        <label for="male"> Male </label>
        <input type="radio" name="gender" id="female" value="Female" <?php if ($editData['gender']=="Female" ) {
          echo "checked" ; } ?>>
        <label for="female"> Female </label>
      </div>
      <input type="submit" name="update" class="btn" value="Update">
    </form>
  </div>
</body>

</html>