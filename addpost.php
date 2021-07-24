<?php  
require_once'./controller/crud.php';
if(isset($_POST['submit']) && !empty($_FILES['postimg']['name'])&&!empty($_POST['poosttext']))
{  
  $postpost=$_POST['poosttext'];
  $targetDir = "uploads/";
  $fileName = basename($_FILES["postimg"]["name"] );
  $targetFilePath = $targetDir . $fileName;
  $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
  $movedfile = strtolower($fileType);
  $allowTypes = array('jpg','png','jpeg','gif','pdf');
if(in_array($movedfile,$allowTypes))
{
  if(move_uploaded_file($_FILES['postimg']['tmp_name'],$targetFilePath))
  {
    $opertions = new opertions();
    $opertions->adddata("post",["body"=>$postpost,"image"=>$fileName,"user_id"=>$_SESSION['userid']]);
      header("location:list.php");

  }
  
}

}


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
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li>
      <li><a href="#">Page 3</a></li>       
    </ul>
  </div>
</nav>
  
<div class="cntainer">
<form method="POST" action="#" enctype="multipart/form-data">
    <input type="text" name='poosttext'>
    <input type="file" name="postimg">
    <input type="text" name='userid'>
    <input type="submit" value=" submit" name="submit">
</form>
</div>
</body>
</html>
