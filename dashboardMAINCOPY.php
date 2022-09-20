<?php include 'index.php'; ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <button type="button" class="btn btn-info btn-rounded btn-fw pull-mid" data-toggle="modal" data-target="#myModal1">Make New</button>
          <p>&nbsp;</p>
        <div class="row" id="responds">
          <?php
          include_once("connection.php");
          $Result = mysqli_query($connecDB, "SELECT id,fileimage FROM file");
          while ($row = mysqli_fetch_array($Result)) {
            echo '
                <div class="col-xl-3 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                <img style="border-radius: 50%; display: block;margin-left: auto;margin-right: auto;" src="images/faces/rtf-document.png" alt="Avatar">
              <h5 style="text-align: center; color:red;">' . $row["fileimage"] . '</h5>
              <p style="text-align: center;">Price of product</p>
              <button type="button" class="btn btn-outline-info btn-rounded btn-fw pull-right">Update</button>
              <button type="button" class="btn btn-outline-danger btn-rounded btn-fw pull-left">Delete</button>
              </div>
              </div>
              </div>
              ';
          }
          ?>
        </div>
      </div>
      <!-- End of partial -->
      <!--Start Modal-->
      <div class="modal fade modal-mini modal-primary" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header justify-content-center">
              <div class="modal-profile">
                EDIT

                <form id="content-form">
                  <textarea name="content_txt" id="contentText" cols="45" rows="5"></textarea>
                  <br>
                  <button class="btn btn-info btn-rounded btn-fw pull-left" id="FormSubmit" >Add</button>
                </form>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-link btn-simple" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <!--End of Modal-->
    </div>
  </div>
  </div>
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
  <script src="js/dashboard.js"></script>
</body>

</html>