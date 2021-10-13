<?php
 
session_start();


// Create connection
$conn = new mysqli("127.0.0.1", "root", "hyvhr", "crud php") or die("Connection failed: " . mysqli_error($conn));
$id = 0;
$update = false;
$name = '';
$age = '';

require_once('functions.php');

if (isset($_POST['save'])){
      save($conn);
}

if (isset($_GET['delete'])){
      delete($conn);
}

if (isset($_GET['edit'])){
      $id = $_GET['edit'];
      $update = true;
      $result = $conn->query ("SELECT * FROM crud WHERE id=$id") or die ($conn->error);
      //print_r($result);
      if ($result) {
            $row = $result->fetch_array();
            $name = $row['fullname'];
            $age = $row['age'];
      }
}
if (isset($_POST['update'])){
      $id= $_POST['id'];
      $name= $_POST['name'];
      $age= $_POST['age'];
      $conn->query ("UPDATE crud SET fullname='$name', age='$age' WHERE id=$id") or die ($conn->error);

      $_SESSION['message'] = "Record has been updated";
      $_SESSION['msg?_type'] = "warning!";

      header("location: index.php");
}

$conn->close();
?>