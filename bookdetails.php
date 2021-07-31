<?php
require_once './conn.php';
$bookid=$_GET['id'];
//echo$bookid;
$connection = new connect();
//$selectedquery="select * from books where id=$bookid";
$selectedquerysss="SELECT books.content,books.bookname,books.description,books.bookimg,writer.fname,writer.lname FROM books
INNER JOIN writer ON books.writerid = writer.id and books.id=$bookid";
$result=mysqli_query($connection->conection(),$selectedquerysss);
 $row=mysqli_fetch_array($result);
//var_dump($row);
// echo $row['id']

?>
asdasd 
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

       
    <div class="col-4">
    <div class="card">
    <img src="<?php  echo 'uploads/'. $row['bookimg']?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h2 class="card-title"><?php echo"book name "." ".": ". $row['bookname']?></h2 >
    <h4 class="card-title"><?php echo"author "." ".": ". $row['fname'] . " ". $row['lname']?></h4 >
    <h5 class="card-title"><?php echo "desc" . " ".  " :"  .  $row['description']?></h5>
    <h4 class="card-title"><?php echo"content "." ".": ". $row['content']?></h4 >


  </div>
</div>
    </div>
    
    </div>


</body>
</html>
