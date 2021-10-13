<!DOCTYPE html>
<html>
  <head>
    <title>Bootstrap 101 Template2</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <a href="CRUDprocess.php"></a>
  </head>
  <body>

    <?php 
    
    require_once 'CRUDprocess.php'; ?>

<?php

if (isset($_SESSION['message'])): ?>

    <div class= "alert alert-<?=$_SESSION['msg_type']?>">

        <?php
          echo $_SESSION['message'];
          unset($_SESSION['message']);

        ?>
        <?php endif ?>
    </div>
    <div class= "container">
    <?php
      $conn = new mysqli("127.0.0.1", "root", "hyvhr", "crud php") or die("Connection failed: " . mysqli_error($conn));
      $result = $conn->query("SELECT * FROM crud") or die ($conn->error);
      //pre_r($result);
    ?>

      <div class="row justify-content-center">
          <table class="table">
              <thead>
                 <tr>
                      <th>Name</th>
                      <th>Age</th> 
                      <th coolspan="2">Action</th>
                  </tr>
               </thead>
        <?php
            while ($row = $result->fetch_assoc()): ?>
              <tr>
                  <td> <?php echo $row['fullname']; ?> </td> 
                  <td> <?php echo $row['age']; ?> </td>  
                  <td> 
                  <a href ="index.php?edit=<?php echo $row['id']; ?>" 
                      class="btn btn-info"> Edit </a>
                  <a href= "CRUDprocess.php?delete=<?php echo $row['id']; ?>"
                      class="btn btn-danger"> Delete </a>
                  </td>        
              </tr>
            <?php endwhile; ?>
           </table>
      </div>

    <?php


      function pre_r($array) {
          echo '<pre>';
          print_r($array);
          echo '</pre>';

        }
    ?>

    <div class="row justify-content-center">
        <form action="CRUDprocess.php" method="POST">
        <input type="hidden" name="id" value=" <?php echo $id?>">
            <div class="form-group">
            <label>Name</label>
            <input type="text" name = "name" class="form-control"
             value="<?php echo $name; ?>"placeholder="Enter your name">
            </div>
            <div class="form-group">
            <label>Age</label>
            <input type="text" name = "age" 
            value= "<?php echo $age; ?>" class="form-control" placeholder="Enter your age">
            </div>
            <div class="form-group">
            <?php
            if ($update == true):
            ?>
              <button type= "submit" class="btn btn-info"  name= "update">update </button>
            <?php else: ?>
            <button type= "submit" class="btn btn-primary"  name= "save">save </button>
            <?php endif; ?>
            </div>
        </form>
    </div>
    </div>



  </body>
<script src="https://code.jquery.com/jquery.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>