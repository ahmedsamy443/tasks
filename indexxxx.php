
<?php
require_once'./controller/crud.php';
session_start();
$opertions =new opertions();
$con=$opertions->dbcon(); 
$selectedquery="select * from post";
$result=mysqli_query($con,$selectedquery);
$row=mysqli_fetch_array($result);
echo$row['body'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>

      .cntainer
      {
          width: 600px;
          height: 200px;
          border: 1px solid black;
          margin-left: 400px;
          margin-top: 200px;
      }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="addpost.php">addpost</a></li>     
    </ul>
    <?php
    if(isset($_SESSION['userid'])){
    ?>
    <ul style="float: right;" class="nav navbar-nav">
      <li class="active"><a href="login.php">logout</a></li>
        </ul>

    <?php }else{?>
        <ul style="float: right;" class="nav navbar-nav">
      <li class="active"><a href="login.php">login</a></li>
      <li><a href="register.php">register</a></li>     
    </ul>
    <?php }?>
  </div>
</nav>
  
<table class="table">
<?php while($row=mysqli_fetch_array($result)){  ?>
    <tr>
      <th scope="row"><?php echo $row['body'] ?></th>
      <th scope="row"><?php echo $row['image'] ?></th>
      <th scope="row"><?php echo $row['user_id'] ?></th>

    </tr>
  <?php  }?>
</table>

</div>
</body>
</html>
