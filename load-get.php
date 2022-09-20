<?php
include_once("connection.php");
 if(isset($_POST["content_txt"]) && strlen($_POST["content_txt"])>0) 
{	
	$contentToSave = filter_var($_POST["content_txt"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
 
	if(mysqli_query($connecDB,"INSERT INTO `tracking_document`(`document_type`) VALUES ('$contentToSave')"))
	{
		  $my_id = mysqli_insert_id($connecDB);
		  echo '
		  <div class="col-xl-3 grid-margin stretch-card">
		  <div class="card">
		  <div class="card-body">
		  <img style="border-radius: 50%; display: block;margin-left: auto;margin-right: auto;" src="images/faces/rtf-document.png" alt="Avatar">
              <h5 style="text-align: center; color:red;">' . $contentToSave . '</h5>
			  <p style="text-align: center;">Price of product</p>
              <button type="button" class="btn btn-outline-info btn-rounded btn-fw pull-right">Update</button>
              <button type="button" class="btn btn-outline-danger btn-rounded btn-fw pull-left">Delete</button>
              </div>
              </div>
              </div>
              ';
 
	}
 
}
