<?php include 'index.php';
include './phpqrcode/qrlib.php';
?>

<!-- partial -->
<div class="main-panel" >
    <div class="content-wrapper" style="display: flex; justify-content: center; align-items: center;">
        <div style="width:60%;">   
        <?php
        if ($_POST['vale'] == NULL) {
            echo '<script>
            window.location = "dashboard_received.php";
        </script>';
        }else {
            include_once("connection.php");
            $valholder = $_POST['vale'];
            $query = "SELECT * FROM history_track where complete_name like '$valholder'";
            $Result = mysqli_query($connecDB, $query);
            $followingdata = $Result->fetch_assoc();
            $tempDir = 'temp/';
            $complete_name = $followingdata['complete_name'];
            $qrValue = $followingdata['qr_code'];
            $filename = $complete_name;
            $codeContents = $qrValue;
            QRcode::png($codeContents, $tempDir . '' . $filename . '.png', QR_ECLEVEL_L, 5);
            echo '  
      
                    <div style="display: flex; justify-content: center; align-items: center;">
                        <img src="temp/' . @$filename . '.png" style="width:250px; height:250px; margin-bottom:25px " ><br>
                    </div>
                <p>Document Type: <span id="track-type" style="font-weight: bold;">' . $followingdata["document_type"] . '</span></p>
                <p>Name: <span id="track-name" style="font-weight: bold;">' . $followingdata["complete_name"] . '</span></p>
                <p>Description: <span id="track-descrip" style="font-weight: bold;">' . $followingdata["description"] . '</span></p>
                <p>Status: <span id="track-status" style="font-weight: bold;">' . $followingdata["status"] . '</span></p>
                <p>Created on: <span id="track-creation" style="font-weight: bold;">' . $followingdata["created_time"] . '</span></p>
                <hr style="border-top: 1px solid #3794FC; border-bottom: 1px solid #fff;;">
                <br><h6 style="text-align: center; font-weight: bold">Track History</h6><br>
                <hr style="border-top: 1px solid #3794FC; border-bottom: 1px solid #fff;;">
                <p>' . $followingdata["received_time"] . ': <span id="track-receiver" style="font-weight: bold;">' . $followingdata["receiver_name"] . '</span></p>';
                while ($row = mysqli_fetch_array($Result)) {
                    echo '           
                <p>' . $row["received_time"] . ': <span id="track-receiver" style="font-weight: bold;">' . $row["receiver_name"] . '</span></p>
                
                ';
            }
            
        }
        ?>
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