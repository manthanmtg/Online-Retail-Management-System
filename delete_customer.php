<?php
	include 'connection.php';
	$conn=OpenCon();
	$done = 0;

	if(!empty($_POST[custid])){
		$sql = " DELETE FROM CUSTOMER WHERE CustomerID = $_POST[custid];";
		$res = mysqli_query($conn, $sql);
		echo $res;
		$done = 1;
	}

	if(!empty($_POST[email]) and $done==0){
		$sql = " DELETE FROM CUSTOMER WHERE EmailID = '$_POST[email]';";
		$res = mysqli_query($conn, $sql);
		echo $res;
		$done = 1;
	}

	if(!empty($_POST[phno]) and $done==0){
		$sql = " DELETE FROM CUSTOMER WHERE PhNo = $_POST[phno];";
		$res = mysqli_query($conn, $sql);
		echo $res;
		$done = 1;
	}

	CloseCon($conn);
	header("Location: delete_customer.html");
	exit();
?>
