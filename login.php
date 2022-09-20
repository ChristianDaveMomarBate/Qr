<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

		$sql = "SELECT * FROM user_document WHERE user_name='$uname' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) == 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['user_name'] == $uname && $row['password'] == $pass) {
            	$_SESSION['user_name'] = $row['user_name'];
            	$_SESSION['id'] = $row['id'];
				$_SESSION['complete_name'] = $row['complete_name'];
				$_SESSION['type'] = $row['type'];
            	header("Location: index.php");
		        exit();
            }else{
				header("Location:  superlogin.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location:  superlogin.php?error=Incorect User name or password");
	        exit();
		}

	
}else{
	header("Location:  superlogin.php");
	exit();
}


