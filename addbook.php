<?php   
session_start();
require_once'./controller/crud.php';
if(isset($_POST['submit']) && !empty($_FILES['postimg']['name'])&&!empty($_POST['bookname'])&&!empty($_POST['desc'])&&!empty($_POST['content']))
{  
  $bookname=$_POST['bookname'];
  $bookdesc=$_POST['desc'];
  $content=$_POST['content'];

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
    
    $opertions->adddata("books",["bookname"=>$bookname,"bookimg"=>$fileName,"description"=>$bookdesc,"content"=>$content,"writerid"=>$_SESSION['userid']]);
    header("location:homepage.php");
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
</head>
<body>
<form method="POST" action="#" enctype="multipart/form-data">
  <div class="form-group">
    <label for="formGroupExampleInput">bookname</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="please enter your book name" name="bookname">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">desc</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="please enter description" name="desc">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">content</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="please enter content" name="content">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">book cover</label>
    <input type="file" class="form-control" id="formGroupExampleInput2" placeholder="upload  enter content" name="postimg">
  </div>
  <input class="btn btn-primary" type="submit" value=" submit" name="submit">
  
</form>

</div>
</body>
</html>
