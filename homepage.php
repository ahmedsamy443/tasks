<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="./public/css/styles.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <style>
    .container-fluid .btn i {
      border-radius: 50%;
      width: 60px;
      height: 60px;
      line-height: 60px;
    }

    .container-fluid .card {
      margin: 20px auto;
      max-width: 900px;
    }
  </style>
</head>

<body>
  <!-- nav -->
  <div class="container-fluid">
    <div class="row bg-light border-end">
      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <div class="
              container-fluid
              d-flex
              flex-row-reverse
              justify-content-md-between
            ">
          <div class="col-1 offset-lg-8 offset-xxl-9">
            <a class="btn" href="add.php" id="sidebarToggle"><i class="fa fa-facebook text-white bg-primary fs-2"></i></a>
          </div>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="col-2 collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mt-2 mt-lg-0 d-flex flex-row-reverse">
              <li class="nav-item active">
                <a class="nav-link" href="#!">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="control.php">Log out</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="control.php">addpost</a>
              </li>
              
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </div>
  <!-- content -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-9 m-auto">
        <div class="card mb-3">
          <div class="card-header">Header</div>
          <p class="card-text">
            This is a wider card with supporting text below as a natural
            lead-in to additional content. This content is a little bit
            longer.
          </p>
          <img width="200px" src="https://via.placeholder.com/150/FF0000/808080/?text=Down.com"  alt="..." />
          <div class="card-body">
            <div class="card-footer">
              <form action="#" method="post">
                <input type="text" class="form-control" name="comment" placeholder="Write a comment ..." id="" />
                <input type="submit" class="btn btn-primary" name="go" value="Go" />
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="col-3 col-xxl-2">
        <div class="bg-white end-0" id="sidebar-wrapper">
          <div class="list-group list-group-flush border-start">
            <a class="
                  list-group-item list-group-item-action list-group-item-light
                  p-3
                " href="../student/list.php">Profile
            </a>
           
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>