<?php
session_start();

    require_once './model/user.php';
if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    $user2 = new userssss();
    $user2->setemail($_POST['email']);
    $user2->setpassword($_POST['password']);
    if(count($user2->checkvalid()) > 0)
   {
   // echo $user2->checkvalid();
   }
   else
   {
       $email=$user2->getemail();
       echo $email;
       $password=$user2->getpassword();
    $dbcon=mysqli_connect("localhost","root","","first");
    $selectedquery="select id, email,pass from users where email='$email' and pass ='$password'";
    //echo $selectedquery;
    $result =mysqli_query($dbcon,$selectedquery);
    if(mysqli_num_rows($result)> 0)
    {

        $row=mysqli_fetch_array($result);
        var_dump($row);
        echo $row['id'] ;
        $id= $row['id'];
       $_SESSION['userid']= $id;
       $_SESSION['login']=true;

       // header("location:indexxxx.php");
       // var_dump($_SESSION['userid']);
    }
    else
    {
        $_SESSION['errorauth']="email or password incorrect";
    }

   }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="./public/css/styles.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="./public/css/main.css" />
    <style></style>
</head>

<body class="pt-xl-5">
    <div class="container w-75 pt-5 mt-xl-5">
        <form method="POST" action="#" class="row bg-white pt-3 pb-5 px-5 shadow">
            <div class="col-12 mb-5 text-center">
                <i class="fa fa-key"></i>
                <p class="fs-1 text-info fw-bolder">Login Page</p>
            </div>
            <div class="col-12 mb-5">
                <i class="fa fa-user text-info"></i>
                <label for="username" class="text-secondary">USERNAME</label>
                <input type="email" name="email" id="username" class="form-control" />
            </div>
            <div class="col-12 mb-5">
                <i class="fa fa-lock text-info"></i>
                <label for="username" class="text-secondary">PASSWORD</label>
                <input type="password" name="password" id="username" class="form-control" />
            </div>
            <div class="col-12 text-center">
                <input type="submit" class="btn btn-outline-info" value="LOGIN" name="submit"/>
            </div>
            <?php
        if (isset($_SESSION["errorauth"])) {
          echo '<div style="color:#F00; text-align:center;">' . $_SESSION["errorauth"] . '</div>';;
          unset($_SESSION["errorauth"]);
        } ?>
        </form>
        <!-- <div class="login-links">
        <p class="text-center">Already have an account? <a class="txt-brand" href="login.html">Login</a>
        </p>
    </div> -->
    </div>
    <p class="col text-center text-secondary mt-3">
        <a href="register.html" class="text-decoration-none">Create a Page</a>
        for a celebrity, band or business.
    </p>
</body>

</html>