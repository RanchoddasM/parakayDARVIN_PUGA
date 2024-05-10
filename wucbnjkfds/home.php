<?php
session_start();
include 'cnct.php';

$uname = $_SESSION['username'];

if (!$_SESSION['username']) {
  header("location:login.php");
}

?>    


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <style type="text/css">
      h1{
        text-align: center;
        padding-bottom: 2em;
        padding-top: 2em;
      }
      .out{
        float: right;
        padding: 5px;
        margin: 2em 2em 0px 0px;
        border-radius: 6px;
      }
      .out:hover{
        background-color: red;
        color: white;

      }
    </style>
</head>
<body>
    <form method="Post" action="lagawt.php">
      <button class="out">Logout</button>
    </form>
    <h1>Welcome <?php echo $uname ?></h1>

    <form action="add.php" method="Post" class="form">
  <div class="form-group row ml-5">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Add:</label>
    <div class="col-sm-5">
      <input type="text" name="details" class="form-control" id="inputtext" placeholder="Details" required>
    </div>
  </div>
  <div class="form-group row ml-5">
    <div class="col-sm-2">Visibility:</div>
    <div class="col-sm-10">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="gridCheck1" name="pub[]">
        <label class="form-check-label" for="gridCheck1">Public Post?
        </label>
      </div>
    </div>
  </div>
  <div class="form-group row ml-4">
    <div class="col-sm-10 ml-4">
      <button type="submit" class="btn btn-primary" name="add">Add</button>
    </div>
  </div>
</form>

    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th>ID</th>
      <th>Details</th>
      <th>Post Time</th>
      <th>Edit Time</th>
      <th>Edit</th>
      <th>Delete</th>
      <th>Post</th>
      <th>Author</th>
    </tr>
  </thead>
  <tbody>
    <?php
        include 'cnct.php';

        $lqs = mysqli_query($conn, "SELECT * FROM `data`");

        while ($row = mysqli_fetch_array($lqs)) {
          echo "<tr>";

              echo "<td>".$row['id']."</td>";
              echo "<td>".$row['details']."</td>";
              echo "<td>".$row['postdate']. " - ". $row['posttime']."</td>";
              echo "<td>".$row['editdate']. " - ". $row['edittime']."</td>";
              echo "<td><a href='edit.php?id=".$row['id']."'>Edit</a></td>";
              echo "<td><a href='delete.php?id=".$row['id']."'>Delete</a></td>";
              echo "<td>".$row['post']."</td>";
              echo "<td>".$row['Author']."</td>";

          echo "<tr>";
        }

    ?>
    
  </tbody>
</table>

<script type="text/javascript">
    
    function del() {
      var sure = confirm("Delete Item?");
      if (sure == true) {
        window.location.assign("delete.php?id=" + id);
      }
    }

</script>

</body>
</html>