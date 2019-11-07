<?php
	include 'connection.php';

	$conn = OpenCon();
	$sql = "INSERT INTO INVOICE VALUES ('$_POST[InvoiceNO]','$_POST[OrderDate]','$_POST[AmountPaid]','$_POST[GSTIN]');";
	$res = mysqli_query($conn, $sql);
	echo $res;
	CloseCon($conn);
	header("Location: insert_invoice.html");
	exit();
	
?>
