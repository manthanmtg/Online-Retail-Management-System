<?php
	include 'connection.php';
	$conn = OpenCon();
	//echo "Connected Successfully";
	//print_r($_POST);

	//The if statements check if the checkboxes were checked. To those that were checked another if condition is applied to check if the input is null or empty. Only after both these statements equate to true will the updation happen.

	$custid=0;
	$email=0;
	$phno=0;

	//Checking which all conditions have been checked.

	if(isset($_POST[CustIdCond_CB]))
		$custid=1;
	if(isset($_POST[EmailIDCond_CB]))
		$email=1;
	if(isset($_POST[PhNoCond_CB]))
		$phno=1;


	//if(isset($_POST[CustIdCond_CB]) and !isset($_POST[EmailIDCond_CB]) and !isset($_POST[PhNoCond_CB])){
	if($custid==1){

		$conn = OpenCon();
		if(isset($_POST[EmailID_CB])){
			if(!empty($_POST[email])){
				$sql = "UPDATE CUSTOMER 
						SET EmailID = '$_POST[email]' 
						WHERE CustomerID = $_POST[custidcond] ;";
				$res = mysqli_query($conn, $sql);
				mysqli_query($conn, $sql);
				echo $res;
			}
		}

		$conn = OpenCon();
		if(isset($_POST[Fname_CB])){
			if(!empty($_POST[fname])){
				$sql = "UPDATE CUSTOMER 
						SET Fname = '$_POST[fname]' 
						WHERE CustomerID = $_POST[custidcond] ";
				$res = mysqli_query($conn, $sql);
				echo $res;
			}
		}

		$conn = OpenCon();
		if(isset($_POST[Minit_CB])){
			if(!empty($_POST[mname])){
				$sql = "UPDATE CUSTOMER 
						SET Minit = '$_POST[mname]' 
						WHERE CustomerID = $_POST[custidcond] ;";
				$res = mysqli_query($conn, $sql);
				echo $res;
			}
		}

		$conn = OpenCon();
		if(isset($_POST[Lname_CB])){
			if(!empty($_POST[lname])){
				$sql = "UPDATE CUSTOMER 
						SET LName = '$_POST[lname]' 
						WHERE CustomerID = $_POST[custidcond] ";
				$res = mysqli_query($conn, $sql);
				echo $res;
			}
		}

		$conn = OpenCon();
		if(isset($_POST[PhNo_CB])){
			if(!empty($_POST[phno])){
				$sql = "UPDATE CUSTOMER 
						SET PhNo = $_POST[phno] 
						WHERE CustomerID = $_POST[custidcond] ;";
				$res = mysqli_query($conn, $sql);
				echo $res;
			}
		}

		$conn = OpenCon();
		if(isset($_POST[Address_CB])){
			if(!empty($_POST[add])){
				$sql = "UPDATE CUSTOMER 
						SET Address = '$_POST[add]' 
						WHERE CustomerID = $_POST[custidcond] ;";
				$res = mysqli_query($conn, $sql);
				echo $res;
			}
		}
		$conn=CloseCon();
		header("Location: update_customer.html");
		exit();
	}

//custid changes work fine as we dont have contradictory cases where we have to handle the changed value midway in the WHERE clause!

	if($email==1){
		$var=$_POST[emailcond];
		$conn = OpenCon();
		if(isset($_POST[EmailID_CB])){
			if(!empty($_POST[email])){
				$sql = "UPDATE CUSTOMER 
						SET EmailID = '$_POST[email]' 
						WHERE EmailID = '$var' ;";
				$res = mysqli_query($conn, $sql);
				mysqli_query($conn, $sql);
				echo $res;
				$var=$_POST[email];
			}
		}

		$conn = OpenCon();
		if(isset($_POST[Fname_CB])){
			if(!empty($_POST[fname])){
				$sql = "UPDATE CUSTOMER 
						SET Fname = '$_POST[fname]' 
						WHERE EmailID = '$var' ;";
				$res = mysqli_query($conn, $sql);
				echo $res;
			}
		}

		$conn = OpenCon();
		if(isset($_POST[Minit_CB])){
			if(!empty($_POST[mname])){
				$sql = "UPDATE CUSTOMER 
						SET Minit = '$_POST[mname]' 
						WHERE EmailID = '$var' ;";
				$res = mysqli_query($conn, $sql);
				echo $res;
			}
		}

		$conn = OpenCon();
		if(isset($_POST[Lname_CB])){
			if(!empty($_POST[lname])){
				$sql = "UPDATE CUSTOMER 
						SET LName = '$_POST[lname]' 
						WHERE EmailID = '$var' ;";
				$res = mysqli_query($conn, $sql);
				echo $res;
			}
		}

		$conn = OpenCon();
		if(isset($_POST[PhNo_CB])){
			if(!empty($_POST[phno])){
				$sql = "UPDATE CUSTOMER 
						SET PhNo = $_POST[phno] 
						WHERE EmailID = '$var' ;";
				$res = mysqli_query($conn, $sql);
				echo $res;
			}
		}

		$conn = OpenCon();
		if(isset($_POST[Address_CB])){
			if(!empty($_POST[add])){
				$sql = "UPDATE CUSTOMER 
						SET Address = '$_POST[add]' 
						WHERE EmailID = '$_POST[emailcond]' ;";
				$res = mysqli_query($conn, $sql);
				echo $res;
			}
		}
		$conn=CloseCon();
		header("Location: update_customer.html");
		exit();
	}

	if($phno==1){

		$var=$_POST[phnocond];
		$conn = OpenCon();
		if(isset($_POST[EmailID_CB])){
			if(!empty($_POST[email])){
				$sql = "UPDATE CUSTOMER 
						SET EmailID = '$_POST[email]' 
						WHERE PhNo = $_POST[phnocond] ;";
				$res = mysqli_query($conn, $sql);
				mysqli_query($conn, $sql);
				echo $res;
			}
		}

		$conn = OpenCon();
		if(isset($_POST[Fname_CB])){
			if(!empty($_POST[fname])){
				$sql = "UPDATE CUSTOMER 
						SET Fname = '$_POST[fname]' 
						WHERE PhNo = $_POST[phnocond] ";
				$res = mysqli_query($conn, $sql);
				echo $res;
			}
		}

		$conn = OpenCon();
		if(isset($_POST[Minit_CB])){
			if(!empty($_POST[mname])){
				$sql = "UPDATE CUSTOMER 
						SET Minit = '$_POST[mname]' 
						WHERE PhNo = $_POST[phnocond] ;";
				$res = mysqli_query($conn, $sql);
				echo $res;
			}
		}

		$conn = OpenCon();
		if(isset($_POST[Lname_CB])){
			if(!empty($_POST[lname])){
				$sql = "UPDATE CUSTOMER 
						SET LName = '$_POST[lname]' 
						WHERE PhNo = $_POST[phnocond] ";
				$res = mysqli_query($conn, $sql);
				echo $res;
			}
		}

		$conn = OpenCon();
		if(isset($_POST[PhNo_CB])){
			if(!empty($_POST[phno])){
				$sql = "UPDATE CUSTOMER 
						SET PhNo = $_POST[phno] 
						WHERE PhNo = $_POST[phnocond] ;";
				$res = mysqli_query($conn, $sql);
				echo $res;
				$var=$_POST[phno];
			}
		}

		$conn = OpenCon();
		if(isset($_POST[Address_CB])){
			if(!empty($_POST[add])){
				$sql = "UPDATE CUSTOMER 
						SET Address = '$_POST[add]' 
						WHERE PhNo = $_POST[phnocond] ;";
				$res = mysqli_query($conn, $sql);
				echo $res;
			}
		}
		$conn=CloseCon();
		header("Location: update_customer.html");
		exit();
	}

	CloseCon($conn);
	header("Location: update_customer.html");
	exit();
?>
