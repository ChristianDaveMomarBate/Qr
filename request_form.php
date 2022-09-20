<style>
    @media screen and (max-width: 800px) {
        #card-body {
            display: inherit;
            align-items: center;
            justify-content: center !important;
        }
    }
</style>
<?php include 'index.php';
include './phpqrcode/qrlib.php';


// Add download function

function getName($name)
{
    $username = $name . rand(0, 2468) . "QrCode";
    return $username;
}

if (isset($_POST['submit_desc'])) {
    include "sessionCon.php";
    $tempDir = 'temp/';
    $docsType = $_POST['doctype'];
    $name = $_POST['c_name'];
    $description = $_POST['c_description'];
    $filename = getName($name);
    $codeContents = 'documentType:' . $docsType . '?name=' . urlencode($name) . '&body=' . urlencode($description);
    QRcode::png($codeContents, $tempDir . '' . $filename . '.png', QR_ECLEVEL_L, 5);

    mysqli_query($conn, "INSERT INTO `tracking_document` (`id`, `document_type`, `complete_name`, `description`,`qr_code`,`created_time`) values(NULL,'$_POST[doctype]','$_POST[c_name]','$_POST[c_description]','$codeContents','$_POST[okdate]')");
}
?>

<?php
include "sessionCon.php";
$sql2 = "Select * from `add_document` ";
$result2 = mysqli_query($conn, $sql2);
?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body" id="card-body" style="display: flex; flex-wrap: wrap; justify-content: space-between;">
                        <form class="forms-sample" style="width: 70%; margin: 0 auto" method="post" action="">
                            <input type="hidden" readonly name="okdate" value="<?php echo date('Y-m-d'); ?>" />
                            <div class="form-group">
                                <label for="exampleInputUsername1">Document Type</label>
                                <select class="form-control" name="doctype" id="">
                                    <option selected disabled>-- Select --</option>
                                    <?php
                                    while ($row = mysqli_fetch_array($result2)) {
                                        echo ("<option value='" . $row['document_type'] . "'>" . $row['document_type'] . "</option>");
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Complete Name</label>
                                <input value="<?php $name = $_SESSION['complete_name'];echo ($name);?>" name="c_name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Complete Name" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Description</label>
                                <textarea value="<?php echo @$description; ?> " name="c_description" id="" cols="30" rows="10"  maxlength="200" class="form-control" placeholder="Enter description" required></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit_desc" class="btn btn-primary btn-info mr-2" style="width: 100%" />
                            </div>
                        </form>
                        <form role="form" style="display:flex; align-items:center; justify-content:center; flex-direction:column;" action="" name="formR" method="post" enctype="multipart/form-data">
                            <div class="qr-field" id="qr-field">
                                <h2 style="text-align:center">Your QR Code</h2>
                                <p style="font-size: 0.7rem; text-align: center">Please download your QR Code</p>
                                <div style="width:100%">
                                    <input class="form-control" type="hidden" hidden name="id" id="id" name="photo">
                                    <div style="border:2px solid black; width:100%; height:210px; margin-bottom: 25px">
                                        <?php echo '<img src="temp/' . @$filename . '.png" style="width:100%; height:200px;" ><br>'; ?>
                                    </div>
                                    <a class="btn btn-primary btn-info mr-2" style="width:100%; margin:15px 0;" href="download.php?file=<?php echo $filename; ?>.png ">Download QR Code</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>