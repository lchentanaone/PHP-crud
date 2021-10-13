<?php
function save($conn) {
    $name= $_POST['name'];
    $age= $_POST['age'];

$conn->query ("INSERT INTO crud (fullname,age) VALUES('$name', '$age')") or die  ($conn->error);

   $_SESSION['message']= "Record has been save";
   $_SESSION['msg_type']= "success";

   header("location: index.php");
}
function delete($conn) {
$id = $_GET['delete'];
      $conn->query ("DELETE FROM crud WHERE id=$id") or die ($conn->error);
      
      $_SESSION['message']= "Record has been deleted!";
      $_SESSION['msg_type']= "danger!";

      header("location: index.php");
}