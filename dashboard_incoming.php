<?php include 'index.php'; ?>

<?php
require __DIR__ . "/vendor/autoload.php";

use Zxing\QrReader;
// $qrcode = new QrReader('temp/Philip Estobo1725QrCode.png');
// $text = $qrcode->text();
// echo $text;
?>

<?php
if (isset($_POST['submit_desc'])) {
    include "sessionCon.php";
    $holder = $_POST['qrcode'];

    if (empty($_POST['qrcode'])) {
        echo '<script>alert("No qrcode detected please scan")</script>';
    } else {
        mysqli_query($conn, "UPDATE `tracking_document` SET  `status`='Received',`received_time`='$_POST[rdate]',`receiver_name`='$_POST[passholder]' WHERE qr_code like '%$holder%'");
        mysqli_query($conn, "INSERT into history_track 
        SELECT * FROM tracking_document WHERE qr_code like '%$holder%'");
        echo '<script>alert("Successfully Received")</script>';
    }
}
?>

<?php
include "sessionCon.php";
$sql2 = "Select * from `tracking_document` ";
$result2 = mysqli_query($conn, $sql2);
?>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
<script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>


<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" readonly name="rdate" value="<?php echo date('Y-m-d'); ?>" />
                            <input type="hidden" name="passholder" class="form-control" style=" color:white;" aria-label="search" aria-describedby="search" readonly value=" <?php $name = $_SESSION['complete_name'];
                                                                                                                                                                                echo ($name); ?>">
                            <div class="form-group" style="display:flex; align-items:center; justify-content:center; flex-direction:column">
                                <label for="exampleInputUsername1" style="font-size: 1.5rem; margin-top: 20px">Receive this request</label>
                                <p style="color: grey">Please scan the attached QR Code in the document</p>
                                <!-- <div class="button" onclick="dosomething(this)"><button class="btn btn-success mr-2"><i class="icon-repeat"></button></i></div> -->
                                <input type="password" name="qrcode" id="text" readonly style="border:none; width:100%; text-align:center;" required>
                                <br>
                                <video id="preview" width="500px" height="300px" style="border:1px white grey"></video>
                            </div>
                            <button type="submit" name="submit_desc" class="btn btn-info mr-2" style="float:right;">Mark as received</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    // DISPLAY INPUTTED IMAGE
    var output = document.getElementById('qr-img');
    var loadFile = function(event) {
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
    // DISPLAY INPUTTED IMAGE TO MODAL
</script>

<script>
    let scanner = new Instascan.Scanner({
        video: document.getElementById('preview')
    });
    Instascan.Camera.getCameras().then(function(cameras) {
        if (cameras.length > 0) {
            scanner.start(cameras[0]);
        } else {
            alert('No cameras found');
        }
    }).catch(function(e) {
        console.error(e);
    });

    scanner.addListener('scan', function(c) {
        document.getElementById('text').value = c;
    });
</script>


</html>