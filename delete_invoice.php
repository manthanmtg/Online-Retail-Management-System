<?php
	include 'connection.php';
	$conn=OpenCon();

	if(!empty($_POST[InvoiceNO])){
		$sql = " DELETE FROM INVOICE WHERE InvoiceNO = $_POST[InvoiceNO];";
		$res = mysqli_query($conn, $sql);
		echo $res;
		$done = 1;
	}
	CloseCon($conn);
	header("Location: delete_invoice.html");
	exit();
?>
