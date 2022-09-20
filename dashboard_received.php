<?php include 'index.php';
include './phpqrcode/qrlib.php';
include_once("connection.php");
$nameholder = $_SESSION['complete_name'];
$position =  $_SESSION['type'];
?>

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <?php
        $current_user_id = $_SESSION['type'];
            if ($position == "Administrator") :
            ?>
                <a href="dashboard_incoming.php"><button type="button" class="btn btn-info btn-rounded btn-fw pull-mid">Received</button><a>
            <?php endif; ?>
                <p>&nbsp;</p>
                <p style="text-align: center;">ALL RECEIVED DOCUMENTS</p>
                <div class="row" id="responds">
                    <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="passholder2" class="form-control" style=" color:white;" aria-label="search" aria-describedby="search" readonly value=" <?php $name = $_SESSION['complete_name'];echo ($name); ?>">
                    </form>
                    <?php
                    // include_once("connection.php");
                    // $nameholder = $_SESSION['complete_name'];
                    // $position =  $_SESSION['type'];
                    if ($position == 'Administrator') {
                        // If current user is admin, retrieve all doc records
                        // $sql = "Select `id`,`document_type`,`complete_name`,`description`,`qr_code`,`status`,`created_time`,`received_time`,`receiver_name` from `history_track` GROUP by `complete_name` ORDER BY `received_time` desc";
                        // $sql = "Select * from `history_track`";
                        $Result = mysqli_query($connecDB, "SELECT * FROM history_track where receiver_name  like '%$nameholder%'");
                        // $result1 = mysqli_query($conn, $sql);
                    } else {
                        // If current user is not admin, retrieve all his doc records
                        $sql = "Select `id`,`document_type`,`complete_name`,`description`,`qr_code`,`status`,`created_time`,`received_time`,`receiver_name` from `history_track` WHERE `complete_name` like '%$nameholder%' GROUP by `complete_name` ORDER BY `received_time` desc ";
                        // $sql = "Select * from `history_track` where complete_name like '%$name%'";
                        $Result = mysqli_query($connecDB, $sql);
                        // $result1 = mysqli_query($conn, $sql);
                    }

                    // $Result = mysqli_query($connecDB, "SELECT * FROM history_track where receiver_name  like '%$nameholder%'");
                    while ($row = mysqli_fetch_array($Result)) {
                        echo '
                            <div class="col-xl-3 stretch-card">
                            <div class="card">
                            <div class="card-body" style="display:flex; align-items:center; justify-content: center; flex-direction: column;">
                            <img style="border-radius: 50%; display: block;margin-left: auto;margin-right: auto;" src="images/faces/rtf-document.png" alt="Avatar">
                            <h5 style="text-align: center; color:#3794FC; font-weight: bold">' . $row["document_type"] . '</h5>
                            <p style="text-align: center; color:#3794FC; font-weight: bold">' . $row["complete_name"] . '</p>
                            <label style="text-align: center;">Status</label>
                            <p style="text-align: center; color:#3794FC; font-weight: bold">' . $row["status"] . '</p>
                            <label style="text-align: center;">Last Received Date</label>
                            <p style="text-align: center; color:#3794FC; font-weight: bold">' . $row["received_time"] . '</p>
                            <form class="forms-sample" action="trackinfo.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="vale" value="' . $row["complete_name"] . '">
                            <input type="submit" name="submit_desc" value="View History" class="btn btn-info mr-2" style="float:right;"/>
                            </form>
                            </div>
                            </div>
                            </div>
                            ';}?>
                </div>
    </div>
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