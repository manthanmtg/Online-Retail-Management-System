<?php
include 'connection.php';
$conn = OpenCon();
//echo "Connected Successfully";
//print_r($_POST);
$sql = "INSERT INTO CUSTOMER  VALUES ($_POST[custid],'$_POST[email]','$_POST[fname]','$_POST[mname]','$_POST[lname]',$_POST[phno],'$_POST[add]', 0,now() ,'$_POST[pass]');";
$res = mysqli_query($conn, $sql);
echo $res;
CloseCon($conn);
header("Location: insert_customer.html");
exit();
?>
<!-- <html>
<body>
<script>
Location.href="./insert_customer.html";
</script>
</body>
</html> -->
