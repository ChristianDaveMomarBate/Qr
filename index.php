<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Qr_Code</title>
    <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css" />
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/jquery-bar-rating/fontawesome-stars-o.css">
    <link rel="stylesheet" href="vendors/jquery-bar-rating/fontawesome-stars.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="images/favicon.ico" />
    <!-- Boostrap 5 CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.2/js/bootstrap.min.js" integrity="sha512-HSNvqjhsAxRPvbSBEdXWlkR9uYmJtUvXEyfAvUzlA0uS5SyFZMZdczgz8oPWTz2NUEBaXkIYL4kdrBJkP66jYA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Data Tables CDN -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" />
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $("#content-form").submit(function(e) {
        e.preventDefault();
        if ($("#contentText").val() === '') {
          alert("Please enter some text!");
          return false;
        }
        var myData = 'content_txt=' + $("#contentText").val();
        jQuery.ajax({
          type: "POST",
          url: "load-get.php",
          dataType: "text",
          data: myData,
          success: function(response) {
            $("#responds").append(response);
            $('#contentText').val("")
          },
          error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError);
          }
        });
      });

    });
  </script>

  <body style="background-color:white; color:black;">
    <div class="container-scroller">
      <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center" style="background-color:#3794FC; color:black;">
          <a class="navbar-brand brand-logo" href="index.php"><i class="icon-content-right mx-0"></i></a>
          <a class="navbar-brand brand-logo-mini" href="index.php"><i class="icon-content-right mx-0"></i></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end" style="background-color:#3794FC; color:white;">
          <span class="menu-title"><b>Qr_Code Tracking System Dashboard</b></span>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
          <ul class="navbar-nav mr-lg-2">
            <li class="nav-item nav-search d-none d-lg-block">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="search" style=" text-align:justify-center; color:white;">
                  </span>
                </div>
                <input type="text" name="passholder" class="form-control" style=" color:white;" aria-label="search" aria-describedby="search" readonly value=" <?php $name = $_SESSION['complete_name'];
                                                                                                                                                                echo ($name); ?>">
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
          </button>
        </div>
      </nav>
      <div class="container-fluid page-body-wrapper" style="background-color:white; color:black;">
        <nav class="sidebar sidebar-offcanvas" id="sidebar" style="background-color:white; color:black;">
          <ul class="nav">
              <li class="nav-item">
                <a class="nav-link" href="dashboard_received.php" style="background-color:#3794FC; color:white; border: 2px solid;padding: 10px;
border-radius: 50px 20px;">
                  <i class="icon-box menu-icon"></i>
                  <span class="menu-title">Tracking System</span>
                </a>
              </li>
            <?php
            $current_user_id = $_SESSION['type'];
            if ($current_user_id == "Seller" or $current_user_id == "Administrator") :
            ?>
              <li class="nav-item">
                <a class="nav-link" href="crud.php" style="background-color:#3794FC; color:white;border: 2px solid;padding: 10px;
border-radius: 50px 20px;">
                  <i class="icon-paper menu-icon"></i>
                  <span class="menu-title">Add Document Type</span>
                </a>
              </li>
            <?php endif; ?>
            <?php
            $current_user_id = $_SESSION['type'];
            if ($current_user_id == "Seller" or $current_user_id == "Administrator") :
            ?>
              <li class="nav-item">
                <a class="nav-link" href="typography.php" style="background-color:#3794FC; color:white;border: 2px solid;padding: 10px;
border-radius: 50px 20px;">
                  <i class="icon-head menu-icon"></i>
                  <span class="menu-title">Register Employee</span>
                </a>
              </li>
            <?php endif; ?>

            
            <!--
          <li class="nav-item">
            <a class="nav-link" href="chart.php" style="background-color:#3794FC; color:white; border: 2px solid;padding: 10px;
border-radius: 50px 20px;">
              <i class="icon-globe menu-icon"></i>
              <span class="menu-title">Reports</span>
            </a>
          </li>
          -->
            <li class="nav-item">
              <a class="nav-link" href="request_form.php" style="background-color:#3794FC; color:white; border: 2px solid;padding: 10px;
border-radius: 50px 20px;">
                <i class="icon-file-add menu-icon"></i>
                <span class="menu-title">QR Code Form</span>
              </a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="track.php" style="background-color:#3794FC; color:white; border: 2px solid;padding: 10px;
border-radius: 50px 20px;">
                <i class="icon-location menu-icon"></i>
                <span class="menu-title">Track</span>
              </a>
            </li> 
            <li class="nav-item">
              <a class="nav-link" href="logout.php" style="background-color:#3794FC; color:white; border: 2px solid;padding: 10px;
border-radius: 50px 20px;">
                <i class="icon-arrow-left menu-icon"></i>
                <span class="menu-title">Logout</span>
              </a>
            </li>
          </ul>
        </nav>
        <script src="vendors/base/vendor.bundle.base.js"></script>
        <script src="js/off-canvas.js"></script>
        <script src="js/hoverable-collapse.js"></script>
        <script src="js/template.js"></script>
        <script src="vendors/chart.js/Chart.min.js"></script>
        <script src="vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
        <script src="js/dashboard.js"></script>
  </body>
  </html>
<?php
} else {
  header("Location: superlogin.php");
  exit();
}
?>