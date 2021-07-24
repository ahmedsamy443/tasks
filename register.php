<?php
require_once './model/user.php';
require_once './controller/crud.php';
if (
  isset($_POST['submit']) && !empty($_POST['fname']) && !empty($_POST['lname']) &&
  !empty($_POST['email']) && !empty($_POST['password'] && !empty($_POST['password_confirmation']))
) {
  $user1 = new userssss();
  $user1->setfname($_POST['fname']);
  $user1->setlname($_POST['lname']);
  $user1->setemail($_POST['email']);
  $user1->setpassword($_POST['password']);
  $user1->setconfirmpassword($_POST['password_confirmation']);
  $opertion1 = new opertions();
  if (count($user1->checkvalid()) > 0) {
    echo $user1->checkvalid()[0];
  } else {
    $ss = $opertion1->adddata('users', ["fname" => $user1->getfname(), "lname" => $user1->getlname(), "email" => $user1->getemail(), "pass" => $user1->getpassword()]);
 
 header("location:login.php");
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
  <style>
    /* .login-footer {
        margin-top: 60px;
        opacity: 0.5;
        -webkit-transition: opacity 0.3s ease-in-out;
        -o-transition: opacity 0.3s ease-in-out;
        transition: opacity 0.3s ease-in-out;
      }

      .login-footer:hover {
        opacity: 1;
      } */
    .social-icon ul {
      list-style: none;
    }

    /**/
    .social-icon ul li a {
      display: inline-block;
      background-color: #eceeef;
      border-radius: 50%;
      width: 40px;
      line-height: 40px;
      height: 40px;
      color: #818a91;
      /* padding: 10px; */
    }

    .social-icon ul li:hover a {
      background-color: #16a8c9;
      color: #fff;
    }
  </style>
</head>

<body class="pt-xl-5">
  <div class="container w-75 pt-5 mt-xl-5">
    <form method="POST" action="#" class="row bg-white pt-3 pb-5 px-5 shadow">
      <div class="col-12 mb-5 text-center">
        <i class="fa fa-key"></i>
        <p class="fs-1 text-info fw-bolder">SIGN UP Page</p>
      </div>
      <div class="col-6 mb-5">
        <i class="fa fa-user text-info"></i>
        <label for="username" class="text-secondary">FIRST NAME</label>
        <input type="text" name="fname" id="username" class="form-control" />
        <?php
        if (isset($_SESSION["errorfname"])) {
          echo '<div style="color:#F00; text-align:center;">' . $_SESSION["errorfname"] . '</div>';;
          unset($_SESSION["errofrname"]);
        } ?>
      </div>
      <div class="col-6 mb-5">
        <i class="fa fa-user text-info"></i>
        <label for="username" class="text-secondary">LAST NAME</label>
        <input type="text" name="lname" id="username" class="form-control" />
        <?php
        if (isset($_SESSION["errorlname"])) {
          echo '<div style="color:#F00; text-align:center;">' . $_SESSION["errorlname"] . '</div>';;
          unset($_SESSION["errorlname"]);
        } ?>
      </div>
      <div class="col-12 mb-5">
        <i class="fa fa-user text-info"></i>
        <label for="username" class="text-secondary">EMAIL</label>
        <input type="email" name="email" id="username" class="form-control" />
        <?php
        if (isset($_SESSION["emailerror"])) {
          echo '<div style="color:#F00; text-align:center;">' . $_SESSION["emailerror"] . '</div>';;
          unset($_SESSION["emailerror"]);
        } ?>
      </div>
      <div class="col-12 mb-5">
        <i class="fa fa-lock text-info"></i>
        <label for="username" class="text-secondary">PASSWORD</label>
        <input type="password" name="password" id="username" class="form-control" />
        <?php
        if (isset($_SESSION["passerror"])) {
          echo '<div style="color:#F00; text-align:center;">' . $_SESSION["passerror"] . '</div>';;
          unset($_SESSION["passerror"]);
        } ?>
      </div>
      <div class="col-12 mb-5">
        <i class="fa fa-lock text-info"></i>
        <label for="username" class="text-secondary">CONFIRM PASSWORD</label>
        <input type="password" name="password_confirmation" id="username" class="form-control" />
        <?php
        if (isset($_SESSION["confimr"])) {
          echo '<div style="color:#F00; text-align:center;">' . $_SESSION["confimr"] . '</div>';;
          unset($_SESSION["confimr"]);
        } ?>
      </div>
      <div class="col-12 text-center">
        <input type="submit" class="btn btn-outline-info" value="LOGIN" name="submit" />
      </div>
      <!-- login-footer -->
      <div class="col-12 text-center social-icon mt-4 text-secondary">
        <p class="">Or register with</p>
        <ul class="social-icons m-0 p-0">
          <li class="d-inline-block">
            <a class="facebook" href="#"><i class="fa fa-google"></i></a>
          </li>
          <li class="d-inline-block">
            <a class="twitter" href="#"><i class="fa fa-yahoo"></i></a>
          </li>
          <li class="d-inline-block">
            <a class="linkedin" href="#"><i class="fa fa-mobile"></i></a>
          </li>
        </ul>
      </div>
    </form>
    <!-- <div class="login-links">
        <p class="text-center">Already have an account? <a class="txt-brand" href="login.html">Login</a>
        </p>
    </div> -->
  </div>
  <!-- <p class="col text-center text-secondary mt-3">
      <a href="register.html" class="text-decoration-none">Create a Page</a>
      for a celebrity, band or business.
    </p> -->
  <p class="col text-center text-secondary mt-3 justify-content-between">
    Already have an account?
    <a class="text-decoration-none" href="login.html">Login</a>
  </p>
</body>

</html>