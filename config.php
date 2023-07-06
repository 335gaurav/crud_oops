<?php
class Users
{
  private $conn;
  function __construct()
  {
    $this->connection();
  }

  function connection()
  {
    $this->conn = mysqli_connect("localhost", "root", "", "oop");
    if (mysqli_connect_error()) {
      echo mysqli_connect_error();
    }
  }

  function runQuery($sql)
  {
    $runQuery = mysqli_query($this->conn, $sql);
    if ($runQuery) {
      return $runQuery;
    } else {
      echo mysqli_errno($this->conn);
    }
  }
  public function addRecord($data)
  {
    $query = "INSERT INTO `oops-table` (`name`, `class`, `section`, `gender`) VALUES ('" . $data['name'] . "','" . $data['class'] . "', '" . $data['section'] . "', '" . $data['gender'] . "');";
    $response = $this->runQuery($query);
    return $response;
  }

  function tableList()
  {
    $query = "SELECT * FROM `oops-table`";
    $response = $this->runQuery($query);
    $getData = mysqli_fetch_all($response, MYSQLI_ASSOC);
    return $getData;
  }

  function getFormData($id)
  {
    $query = "SELECT * FROM `oops-table` WHERE   `id` = ' " . $id . "' ";
    $response = $this->runQuery($query);
    $getData = mysqli_fetch_array($response);
    return $getData;
  }

  function updateFormData($data, $id)
  {
    $query = "UPDATE `oops-table` SET `name`='" . $data['name'] . "',`class`='" . $data['class'] . "',`section`='" . $data['section'] . "',`gender`='" . $data['gender'] . "' WHERE  `id` = '" . $id . "'";
    $response = $this->runQuery($query);
    return $response;
  }

  function deleteData($id)
  {
    $query = "DELETE FROM `oops-table` WHERE `id` = '" . $id . "'";
    $response = $this->runQuery($query);
    return $response;
  }

  function searchData($search)
  {
    $query = "SELECT * FROM `oops-table` WHERE `name` like '%$search%' ";
    $response = $this->runQuery($query);
    //$rows = mysqli_num_rows($response);

    $getData = mysqli_fetch_all($response, MYSQLI_ASSOC);
    return $getData;
  }
}
