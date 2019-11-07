<?php
	include 'connection.php';

	$conn = OpenCon();
	$sql = "INSERT INTO PRODUCT VALUES ('$_POST[ProductID]','$_POST[PName]','$_POST[Description]','$_POST[Category]','$_POST[Cost_Price]',$_POST[Selling_Price]);";
	$res = mysqli_query($conn, $sql);
	echo $res;
	CloseCon($conn);
	header("Location: insert_product.html");
	exit();
	
?>
