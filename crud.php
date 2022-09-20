<?php include 'index.php'; ?>

<?php
include "sessionCon.php";
$sql = "Select * from `add_document`";
$result = mysqli_query($conn, $sql);
?>


<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <button type="button" class="btn btn-info btn-rounded btn-fw pull-mid" data-toggle="modal" data-target="#myModal1">Add New</button>
                        <!-- <input type="text" placeholder="Search here..." class="pull-right">
                        <label class="badge badge-danger">Pending</label>
                        <label class="badge badge-info">Pending</label>
                        <label class="badge badge-primary">Pending</label>
                        <label class="badge badge-warning">Pending</label>
                        -->
                        <div class="table-responsive">
                            <table class="table" id="table">
                                <thead>
                                    <tr>
                                        <th>
                                            <b>
                                                Document Type
                                            </b>
                                        </th>
                                        <th>
                                            <b>
                                                Description
                                            </b>
                                        </th>
                                        <th>
                                            <b>
                                                Action
                                            </b>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!--<tr>
                                        <td class="py-1">
                                            <img src="images/faces/rtf-document.png" alt="image" />
                                            Sample Docu
                                        </td>
                                        <td>
                                            Herman Beck
                                        </td>
                                        <td>
                                            <li class="nav-item dropdown d-flex mr-4 ">
                                                <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
                                                    <i class="icon-cog"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                                                    <a class="dropdown-item preview-item">
                                                        <button type="button" class="btn  btn-fw">Delete</button>
                                                    </a>
                                                    <a class="dropdown-item preview-item">
                                                        <button type="button" class="btn  btn-fw">Update</button>
                                                    </a>
                                                </div>
                                            </li>
                                        </td>
                                    </tr>
                                    -->
                                    <?php
                                    if ($result) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $document_type = $row['document_type'];
                                            $document_desc = $row['document_desc'];
                                            $document_id = $row['id'];
                                            echo
                                            '<tr>
															<td style="display:none;">' . $document_id . '</td>
															<td>' . $document_type . '</td>
                                                            <td>' . $document_desc . '</td>
                                                            <td>
                                                            <button type="button" data-toggle="modal" data-target="#myModal2" name="update" class="btn btn-primary">Update</button>
                                                            <button type="button" name="delete" class="btn btn-danger"><a class="wt" href="deleteDocumentType.php?deleteid=' . $document_id . '" style="color: inherit; text-decoration: inherit">Delete</button>
                                                            </td>
                                            </tr>';
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
<!--Start of Add Doc Type-->
<form role="form" action="" name="formR" method="post">
    <div class="modal fade modal-mini modal-primary" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <input type="text" class="form-control" placeholder="Document Type" name="d_type" required>
                </div>
                <div class="modal-header justify-content-center">
                    <input type="text" class="form-control" placeholder=" Document Description" name="d_desc" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link btn-simple" data-dismiss="modal">Close</button>
                    <button class="btn btn-info" name="add_desc">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!--End of Add Doc Type-->
<!--Start of Update Doc Type-->
<form role="form" action="" name="formR" method="post">
    <div class="modal fade modal-mini modal-primary" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <input class="form-control" type="hidden" name="update_id" id="update_id">
                <div class="modal-header justify-content-center">
                    <input id="update_type" type="text" class="form-control" placeholder="Document Type" name="update_type" required>
                </div>
                <div class="modal-header justify-content-center">
                    <input id="update_description" type="text" class="form-control" placeholder="Document Description" name="update_description" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link btn-simple" data-dismiss="modal">Close</button>
                    <button class="btn btn-info" name="update_desc">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    var table = document.getElementById('table');
    for (var i = 1; i < table.rows.length; i++) {
        table.rows[i].onclick = function() {
            document.getElementById("update_id").value = this.cells[0].innerHTML;
            document.getElementById("update_type").value = this.cells[1].innerHTML;
            document.getElementById("update_description").value = this.cells[2].innerHTML;
        };
    }
</script>

<!--End of Update Doc Type-->
<?php
include "sessionCon.php";
// Add Document Type
if (isset($_POST['add_desc'])) {
    mysqli_query($conn, "insert into add_document values(NULL,'$_POST[d_type]','$_POST[d_desc]') ");
    echo '  <script>window.location = "crud.php";</script>';
}
?>

<?php
include "sessionCon.php";
if (isset($_POST['update_desc'])) {
    // Update Document Type
    mysqli_query($conn, "update `add_document` set document_type='$_POST[update_type]',document_desc='$_POST[update_description]' where id='$_POST[update_id]'");
    echo '  <script>window.location = "crud.php";</script>';
}
