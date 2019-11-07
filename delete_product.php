<?php
	include 'connection.php';
	$conn=OpenCon();
	$done = 0;

	if(!empty($_POST[ProductID])){
		$sql = " DELETE FROM PRODUCT WHERE ProductID = $_POST[ProductID];";
		$res = mysqli_query($conn, $sql);
		echo $res;
		$done = 1;
	}

	if(!empty($_POST[PName]) and $done==0){
		$sql = " DELETE FROM PRODUCT WHERE PName = '$_POST[PName]';";
		$res = mysqli_query($conn, $sql);
		echo $res;
		$done = 1;
	}

	CloseCon($conn);
	header("Location: delete_product.html");
	exit();
?>
