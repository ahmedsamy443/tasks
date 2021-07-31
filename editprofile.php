
<?php   
session_start();
require_once'./controller/crud.php';
require_once '../project/conn.php';
$con = new connect();
$selected= "select * from writer where id = $_SESSION[userid]";
$result = mysqli_query($con->conection(),$selected);
$row=mysqli_fetch_array($result);
if(isset($_POST['submit']) && !empty($_FILES['postimg']['name'])&&!empty($_POST['fname'])&&!empty($_POST['lname'])&&!empty($_POST['email'])&&!empty($_POST['password']) )
{  
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $email=$_POST['email'];
  $password=$_POST['password'];

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
   // $opertions = new opertions();
    //$opertions->adddata("writer",["fname"=>$fname,"writerimg"=>$fileName,"lname"=>$lname,"email"=>$email,"password"=>$password]);
    $userid=$_SESSION['userid'];
   
   
   // $db=mysqli_connect("localhost","root","","book");
    echo $updteprofile="update writer set fname='$fname',lname='$lname',email='$email',password='$password',writerimg='$fileName' where id =$userid";
    $s= mysqli_query($con->conection(),$updteprofile);
   if($s)
   {
       echo"updated";
       header("location:profile.php");
   }
   else
   {
      echo "notupdted"; 
   }
  // 
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
    <label for="formGroupExampleInput">fname</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="please enter your first name" name="fname" value="<?php echo $row['fname']?>">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput">lname</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="please enter your second name" name="lname" value="<?php echo $row['lname']?>">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">password</label>
    <input type="password" class="form-control" id="formGroupExampleInput2" placeholder="please enter password" name="password" value="<?php echo $row['password']?>">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">email</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="please enter email" name="email" value="<?php echo $row['email']?>"> 
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">profilephoto</label>
    <input type="file" class="form-control" id="formGroupExampleInput2" placeholder="upload  profilephotox" name="postimg">
  </div>
  <input class="btn btn-primary" type="submit" value=" submit" name="submit">
  
</form>

</div>
</body>
</html>
