<?php
session_start();
require_once '../project/conn.php';
$con= new connect();
$id = $_SESSION['userid'];
$selected = "select * from writer where id = $id";
$reslult = mysqli_query($con->conection(),$selected);
$row = mysqli_fetch_array($reslult);
$book="select bookname from books where writerid =$id ";
$bookselected = mysqli_query($con->conection(),$book);
$selectedbook = mysqli_fetch_array($bookselected);
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">    
    </head>
    <body>
    <div class="page-content page-container" id="page-content">
    <div class="padding">   
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-6 col-md-12">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">
                                <?php if ($row['writerimg']==""){?>
                                <div class="m-b-25"> <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image"> </div>
                                <?php }else{?>
                                    <div class="m-b-25"> <img src="<?php echo 'uploads/'. $row['writerimg'] ?>" class="img-radius" alt="User-Profile-Image"> </div>
                                    <?php }?>
                                <h6 class="f-w-600"><?php echo $row['fname']." ".$row['lname']?></h6>
                                <p>publisher</p> <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Email</p>
                                        <h6 class="text-muted f-w-400"><?php echo $row['email']?></h6>
                                    </div>
                                    
                                </div>
                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">bookslist</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <?php while($selectedbook=mysqli_fetch_array($bookselected)){?>
                                    <ul>
                                  <li><?php echo $selectedbook['bookname'] ?></li>
                                        </ul>
                                 <?php } ?>
                                    </div>
                                    
                                </div> 
                                <a  class="btn btn-secondary"href="editprofile.php">edit profile</a>
                                <a  class="btn btn-secondary"href="homepage.php">home</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </body>
</html>