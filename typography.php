<?php include 'index.php'; ?>
<?php
include "sessionCon.php";
$sql = "Select * from `user_document`";
$result = mysqli_query($conn, $sql);
?>


<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <button type="button" class="btn btn-info btn-rounded btn-fw pull-mid" data-toggle="modal" data-target="#myModal1">Add New</button>
            <div class="table-responsive pt-3">
              <table class="table" id="table">
                <thead>
                  <tr>
                    <th>
                      <b>
                        Username
                      </b>
                    </th>
                    <th>
                      <b>
                        Complete name
                      </b>
                    </th>
                    <th>
                      <b>
                        Mobile number
                    </th>
                    <th>
                      <b>
                        Password
                      </b>
                    </th>
                    <th>
                      <b>
                        Type
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
                  <?php
                  if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                      $user_name = $row['user_name'];
                      $complete_name = $row['complete_name'];
                      $mobilenumber = $row['mobilenumber'];
                      $password = $row['password'];
                      $type = $row['type'];
                      $document_id = $row['id'];
                      if ($type == 'Administrator') {
                        $indicator = 'Blue';
                      } else {
                        $indicator = 'Green';
                      }
                      echo
                      '<tr>
															<td style="display:none;">' . $document_id . '</td>
															<td>' . $user_name . '</td>
                                                            <td>' . $complete_name . '</td>
                                                            <td>' . $mobilenumber . '</td>
                                                            <td>' . $password . '</td>
                                                            <td style=color:' . $indicator .'>' . $type . '</td>
                                                            <td>
                                                            <button type="button" data-toggle="modal" data-target="#myModal2" name="update" class="btn btn-primary">Update</button>
                                                            <button type="button" name="delete" class="btn btn-danger"><a class="wt" href="deleteUserType.php?deleteid2=' . $document_id . '" style="color: inherit; text-decoration: inherit">Delete</button>
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

      <script>
        var table = document.getElementById('table');
        for (var i = 1; i < table.rows.length; i++) {
          table.rows[i].onclick = function() {
            document.getElementById("update_id").value = this.cells[0].innerHTML;
            document.getElementById("user_name").value = this.cells[1].innerHTML;
            document.getElementById("complete_name2").value = this.cells[2].innerHTML;
            document.getElementById("mobilenumber2").value = this.cells[3].innerHTML;
            document.getElementById("password2").value = this.cells[4].innerHTML;
            document.getElementById("selectorinfo").value = this.cells[5].innerHTML;
          };
        }
      </script>


      <form role="form" action="" name="formR" method="post">
        <div class="modal fade modal-mini modal-primary" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card-body">
                  <form class="forms-sample">
                    <div class="form-group">
                      <p></p>
                      <input class="form-control" type="hidden" name="update_id" id="update_id">
                      <label for="exampleInputUsername1">Username</label>
                      <input type="text" class="form-control" id="user_name2" name="user_name2" placeholder="Username">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Complete Name</label>
                      <input type="text" class="form-control" id="complete_name2" name="complete_name2" placeholder="Complete Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Mobile Number</label>
                      <input type="number" class="form-control" id="mobilenumber2" name="mobilenumber2" placeholder="Mobile Number">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" id="password2" name="password2" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <input type="text" style="border:none; text-align:center;" class="form-control" id="selectorinfo" name="selectorinfo">
                      <select name="selector2" class="form-control form-control-lg" id="selector2">
                        <option>Administrator</option>
                        <option>Employee</option>
                      </select>
                    </div>
                    <button type="submit" name="update_desc" class="btn btn-info mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                    <button type="button" class="btn btn-link btn-simple" data-dismiss="modal">Close</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>

      <form role="form" action="" name="formR" method="post">
        <div class="modal fade modal-mini modal-primary" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card-body">
                  <form class="forms-sample">
                    <div class="form-group">
                      <p></p>
                      <label for="exampleInputUsername1">Username</label>
                      <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Complete Name</label>
                      <input type="text" class="form-control" id="complete_name" name="complete_name" placeholder="Complete Name" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Mobile Number</label>
                      <input type="number" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Mobile Number" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                      <select name="selector" class="form-control form-control-lg" id="exampleFormControlSelect2">
                        <option>Administrator</option>
                        <option>Employee</option>
                      </select>
                    </div>
                    <button type="submit" name="add_user" class="btn btn-info mr-2">Submit</button>
                    <button type="button" class="btn btn-link btn-simple" data-dismiss="modal">Close</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<?php
include "sessionCon.php";
// Add user
if (isset($_POST['add_user'])) {
  mysqli_query($conn, "INSERT INTO `user_document`(`id`, `user_name`, `complete_name`, `mobilenumber`, `password`, `type`) VALUES(NULL,'$_POST[user_name]','$_POST[complete_name]','$_POST[mobilenumber]','$_POST[password]','$_POST[selector]')");
  echo '  <script>window.location = "typography.php";</script>';
}
?>


<?php
include "sessionCon.php";
if (isset($_POST['update_desc'])) {
  // Update user
  mysqli_query($conn, "update `user_document` set 	user_name='$_POST[user_name2]',complete_name='$_POST[complete_name2]',mobilenumber='$_POST[mobilenumber2]',password='$_POST[password2]',type='$_POST[selector2]' where id='$_POST[update_id]'");
  echo '  <script>window.location = "typography.php";</script>';
}
