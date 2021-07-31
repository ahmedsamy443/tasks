<?php
require_once './conn.php';
session_start();
$connection = new connect();
$writerir= $_SESSION['userid'];
$selectedquery="select * from books where writerid=$writerir";
//echo $selectedquery;
$result=mysqli_query($connection->conection(),$selectedquery);
 $row=mysqli_fetch_array($result);

?>

<<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet">

    </head>
    <body>
    <body>
    <div class="row">
        <?php while($row=mysqli_fetch_array($result)){?>
    <div class="col-4">
    <div class="card"> 
    <img src="<?php  echo 'uploads/'. $row['bookimg']?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h2 class="card-title"><?php echo"book name "." ".": ". $row['bookname']?></h2 >

    <h3 class="card-title"><?php echo "desc" . " ".  " :"  .  $row['description']?></h3>
    <p class="card-text"><?php echo "book content"." : ".$row['content']?></p>
  </div>
</div>
    </div>
    
    <?php }?>
    </div>

    </body>
</html>