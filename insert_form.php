<?php
include_once "./config.php";

$user = new Users();

if (isset($_POST['submit'])) {
  $user->addRecord($_POST);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/bootstrap.css">
  <title>insert form</title>
  <style>
  form{
    width:700px;
    display:flex;
    flex-direction: column;
    text-align: left;
    gap: 10px;
    /* align-items: left; */
  }
  .radio-btn{
    display: flex;
    gap: 4px;
    align-items: center;
  }
  .btn{
    border:1px solid;
    background-color:beige;
  }
  </style>
</head>

<body>
  <div class="container">
    <h1>Insert Form</h1>
  <form action="./table.php" method="post" align="center">
  <label for="name"> Name :</label>
  <input type="text" name="name" id="">

  <label for="class">Class :</label>
  <input type="text" name="class" id="class">

  <label for="section"> Section :</label>
  <input type="text" name="section" id="section">

  <label for="gender">Gender :</label>
  <div class="radio-btn">
  <input type="hidden" name="gender">
  <input type="radio" name="gender" id="male" value="Male">
  <label for="male"> Male </label>
  <input type="radio" name="gender" id="female" value ="Female">
  <label for="female"> Female </label>
  </div>
    
  <input type="submit" name="submit" class="btn" value = "Submit">
  </form>
  </div>
</body>

</html>