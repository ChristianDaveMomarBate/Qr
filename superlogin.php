<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>qr_code</title>
  <link rel="stylesheet" href="./vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="./vendors/feather/feather.css">
  <link rel="stylesheet" href="./vendors/base/vendor.bundle.base.css">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="shortcut icon" href="./images/favicon.ico" />
</head>

<body>
  <form action="login.php" method="post">
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth lock-full-bg">
          <div class="row w-100">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-transparent text-left p-5 text-center">
                <h5>Document Tracking System Using Qr-Code</h5>
                <img src="./images/faces/icons8-tracking-100.png" class="lock-profile-img" alt="img">
                <form class="pt-5">
                  <div class="form-group">
                    <label for="examplePassword1" style="color:white;">Username</label>
                    <input type="text" class="form-control text-center" name="uname" id="examplePassword1">
                    <label for="examplePassword1" style="color:white;">Password </label>
                    <input type="password" class="form-control text-center" name="password" id="examplePassword1">
                    <?php if (isset($_GET['error'])) { ?>
                      <p style="color:red;"><?php echo $_GET['error']; ?></p>
                    <?php } ?>
                  </div>
                  <div class="mt-5">
                    <button class="btn btn-block btn-info  btn-lg font-weight-medium" type="submit">Signin</button>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
  <script src="//vendors/base/vendor.bundle.base.js"></script>
  <script src="./js/off-canvas.js"></script>
  <script src="./js/hoverable-collapse.js"></script>
  <script src="./js/template.js"></script>
</body>

</html>