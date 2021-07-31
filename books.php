<?php
require_once './conn.php';
$connection = new connect();
$selectedquery="SELECT books.id,books.bookname,books.description,books.bookimg,writer.fname,writer.lname FROM books
INNER JOIN writer ON books.writerid = writer.id;";
$result=mysqli_query($connection->conection(),$selectedquery);
 $row=mysqli_fetch_array($result);
//var_dump($row);
// echo $row['id']

?>



<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet">

    </head>
    <body>
    <div class="row">

        <?php while($row=mysqli_fetch_array($result)){?>
    <div class="col-4">
    <div class="card">
    <img src="<?php  echo 'uploads/'. $row['bookimg']?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h2 class="card-title"><?php echo"book name "." ".": ". $row['bookname']?></h2 >
    <h4 class="card-title"><?php echo"author "." ".": ". $row['fname'] . " ". $row['lname']?></h4 >

    <h5 class="card-title"><?php echo "desc" . " ".  " :"  .  $row['description']?></h5>

    <a href="bookdetails.php?id=<?php echo $row['id']?>" class="btn btn-primary">readmore</a>
  </div>
</div>
    </div>
    
    <?php }?>
    </div>


</body>
</html>
