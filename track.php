<?php include 'index.php';
include './phpqrcode/qrlib.php';
?>

<?php
require __DIR__ . "/vendor/autoload.php";
# use Zxing\QrReader;
# $qrcode = new QrReader('temp/Christian Dave M. Bate176QrCode.png');
# $text = $qrcode->text();
#echo $text; 
?>

<?php
include "sessionCon.php";
$name =  $_SESSION['complete_name'];
$position =  $_SESSION['type'];
$sql = "Select * from `history_track` where complete_name like '%$name%'";
$result = mysqli_query($conn, $sql);
?>



<style>
    .timeline:before {
        content: '';
        position: absolute;
        height: 100%;
        left: 50%;
        width: 2px;
        top: -20px;
        background: #3794FC;
        z-index: 1;
    }

    .timeline {
        position: relative;
        margin: 50px auto;
        width: 100%;
    }


    .timeline ul {
        margin: 0;
        padding: 0;
    }

    .timeline ul li {
        list-style: none;
        box-sizing: border-box;
        line-height: normal;
        position: relative;
        width: 50%;
        padding: 0px 20px;
    }

    .timeline ul li .right_content h5 {
        color: rgba(59, 112, 239, 1);
        padding: 0px 2px 18px 0px;
    }

    .timeline ul li:nth-child(odd) {
        float: left;
        text-align: right;
        clear: both;
    }

    .timeline ul li:nth-child(even) {
        float: right;
        text-align: left;
        clear: both;
    }

    .left_content {
        padding-bottom: 20px;
    }

    .timeline ul li:nth-child(odd):before {
        content: '';
        position: absolute;
        width: 10px;
        height: 10px;
        background: rgba(59, 112, 239, 1);
        border-radius: 50%;
        box-shadow: 0 0 0 3px rgba(58, 112, 239, 0.2);
        right: -6px;
        z-index: 1;
    }

    .timeline ul li:nth-child(even):before {
        content: '';
        position: absolute;
        width: 10px;
        height: 10px;
        background: rgba(59, 112, 239, 1);
        border-radius: 50%;
        box-shadow: 0 0 0 3px rgba(58, 112, 239, 0.2);
        left: -6px;
    }



    @media (max-width: 1000px) {
        #card-body {
            padding: 50px 80px;
        }

        .timeline {
            width: 100%;
        }

        .document-details {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center
        }
    }

    @media (max-width: 767px) {
        .timeline {
            width: 100%;
        }

        #card-body {
            padding: 25px 40px;
        }

        .timeline:before {
            left: 20px;
        }

        .timeline ul li:nth-child(odd),
        .timeline ul li:nth-child(even) {
            width: 100%;
            text-align: left;
            padding-left: 50px;
        }

        .timeline ul li:nth-child(odd):before {
            left: 16px;

        }

        .timeline ul li:nth-child(even):before {
            left: 16px;
        }
    }

    @media (max-width: 460px) {
        .card-body {
            padding: 0px 0px;
        }

        .timeline {
            width: 100%;
            font-size: 0.5rem;
        }

        .timeline ul li:nth-child(odd),
        .timeline ul li:nth-child(even) {
            width: 100%;
            text-align: left;
        }

        .timeline ul li:nth-child(odd):before {
            left: 16px;
        }

        .timeline ul li:nth-child(even):before {
            left: 16px;
        }
    }
</style>

<body>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body" id="card-body">
                            <h4 style="text-align: center; color:rgba(59, 112, 239, 1)">Track your documents here</h4>
                            <?php
                            // Retrieve Documents of the current user
                            if ($position == 'Administrator') {
                                // If current user is admin, retrieve all doc records
                                // $sql = "Select `id`,`document_type`,`complete_name`,`description`,`qr_code`,`status`,`created_time`,`received_time`,`receiver_name` from `history_track` GROUP by `complete_name` ORDER BY `received_time` desc";
                                $sql = "Select * from `history_track`";
                                $result1 = mysqli_query($conn, $sql);
                            } else {
                                // If current user is not admin, retrieve all his doc records
                                // $sql = "Select `id`,`document_type`,`complete_name`,`description`,`qr_code`,`status`,`created_time`,`received_time`,`receiver_name` from `history_track` WHERE `complete_name` like '%$name%' GROUP by `complete_name` ORDER BY `received_time` desc ";
                                $sql = "Select * from `history_track` where complete_name like '%$name%'";
                                $result1 = mysqli_query($conn, $sql);
                            }
                            // Select `id`,`document_type`,`complete_name`,`description`,`qr_code`,`status`,`created_time`,`received_time`,`receiver_name` from `history_track` GROUP by `complete_name` ORDER BY `received_time` desc
                            ?>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover  mx-auto w-auto" id="myTable">
                                    <thead style="text-align: center;">
                                        <th>Document ID</th>
                                        <th>Document Type</th>
                                        <th>Complete Name</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Created on</th>
                                        <th>Last Received by</th>
                                        <th>Track</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($result1) {
                                            while ($row = mysqli_fetch_assoc($result1)) {
                                                $document_id = $row['id'];
                                                $document_type = $row['document_type'];
                                                $complete_name = $row['complete_name'];
                                                $description = $row['description'];
                                                $qrValue = $row['qr_code'];
                                                $status = $row['status'];
                                                $created_time = $row['created_time'];
                                                $received_time = $row['received_time'];
                                                $receiver_name = $row['receiver_name'];
                                                if ($status == 'Pending') { // If pending, color to orange
                                                    $indicator = 'orange';
                                                } else {    // If received, color to green
                                                    $indicator = 'green';
                                                }
                                                if ($receiver_name == "") { // If docs is not received, put pending
                                                    $receiver_name = "Pending";
                                                }
                                                if ($receiver_name == 'Pending') {
                                                    $indicator1 = 'orange';
                                                } else {
                                                    $indicator1 = 'blue';
                                                }
                                                if ($document_id) {
                                                }
                                                echo '
                                            <tr>
                                            <td>'.$document_id.'</td>
                                            <td>'.$document_type.'</td>
                                            <td>'.$complete_name.'</td>
                                            <td>'.$description.'</td>
                                            <td style="display:none">'.$qrValue.'</td>
                                            <td style="color: $indicator">'.$status.'</td>
                                            <td>'.$created_time.'</td>
                                            <td style="display:none">'.$received_time.'</td>
                                            <td style="color:'. $indicator1.'">'.$receiver_name.'</td>
                                            <td>
                                            <a data-toggle="modal" data-target="#myModal1" name="view" style="margin: 0 5px; text-decoration:none; color: #3794FC" href=""><i class="fa fa-eye fa-lg"></i> View</a>
                                            <!--<form class="forms-sample" action="trackinfo.php" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="vale" value="' . $row["complete_name"] . '">
                                                <input type="submit" name="submit_desc" value="View" class="btn btn-info mr-2" style="float:right;"/>
                                            </form>-->
                                            </td>
                                            </tr>
                                            ';
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Start of Modal-->

    <div class="modal fade modal-mini modal-primary" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <div class="modal-profile" style="width: 350px;">
                        <p>Search result for</p>

                        <?php
                        include_once("connection.php");
                        $nameholder = $_SESSION['complete_name'];
                        // Retrieve Documents of the current user
                        if ($position == 'Administrator') {
                            // If current user is admin, retrieve all doc records
                            $sql = "Select * from `history_track`";
                            $Result = mysqli_query($connecDB, $sql);
                        } else {
                            // If current user is not admin, retrieve all his doc records
                            $query = "SELECT * FROM history_track where complete_name like '%$nameholder%'";
                            $Result = mysqli_query($connecDB, $sql);
                        }
                        $followingdata = $Result->fetch_assoc();
                        $tempDir = 'temp/';
                        $complete_name = $followingdata['complete_name'];
                        $qrValue = $followingdata['qr_code'];
                        $filename = $complete_name;
                        $codeContents = $qrValue;
                        QRcode::png($codeContents, $tempDir . '' . $filename . '.png', QR_ECLEVEL_L, 5);
                        echo '           
                        <div style="display: flex; justify-content: center; align-items: center">
                        <img src="temp/' . @$filename . '.png" style="width:250px; height:250px; " ><br>
                        </div>
                        <p>Document Type: <span id="track-type" style="font-weight: bold;">' . $followingdata["document_type"] . '</span></p>
                    <p>Name: <span id="track-name" style="font-weight: bold;">' . $followingdata["complete_name"] . '</span></p>
                    <p>Description: <span id="track-descrip" style="font-weight: bold;">' . $followingdata["description"] . '</span></p>
                    <p>Status: <span id="track-status" style="font-weight: bold;">' . $followingdata["status"] . '</span></p>
                    <p>Created on: <span id="track-creation" style="font-weight: bold;">' . $followingdata["created_time"] . '</span></p>
                    <h6 style="text-align: center; font-weight: bold">============Track History============</h6>
                    <p>' . $followingdata["received_time"] . ': <span id="track-receiver" style="font-weight: bold;">' . $followingdata["receiver_name"] . '</span></p>';

                        while ($row = $Result->fetch_assoc()) {
                            echo '           
                        <p>' . $row["received_time"] . ': <span id="track-receiver" style="font-weight: bold;">' . $row["receiver_name"] . '</span></p>';
                        }
                        ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link btn-simple" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        var table = document.getElementById('myTable');
        for (var i = 1; i < table.rows.length; i++) {
            table.rows[i].onclick = function() {
                document.getElementById("track-type").innerHTML = this.cells[1].innerHTML;
                document.getElementById("track-name").innerHTML = this.cells[2].innerHTML;
                document.getElementById("track-descrip").innerHTML = this.cells[3].innerHTML;
                document.getElementById("track-status").innerHTML = this.cells[5].innerHTML;
                document.getElementById("track-creation").innerHTML = this.cells[6].innerHTML;
                document.getElementById("track-creation2").innerHTML = this.cells[6].innerHTML;
                document.getElementById("track-receiver-time").innerHTML = this.cells[7].innerHTML;
                document.getElementById("track-receiver").innerHTML = this.cells[8].innerHTML;
                document.getElementById("track-receiver2nd").innerHTML = this.cells[8].innerHTML;
            };
        }
    </script>
    <!--End of Modal-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        // DISPLAY INPUTTED IMAGE
        var output = document.getElementById('qr-img');
        var loadFile = function(event) {
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>

</html>