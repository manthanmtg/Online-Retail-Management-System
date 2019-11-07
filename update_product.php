<?php
	include 'connection.php';
	$conn = OpenCon();

	//The if statements check if the checkboxes were checked. To those that were checked another if condition is applied to check if the input is null or empty. Only after both these statements equate to true will the updation happen.

	$ProductID=0;
	$PName=0;

	//Checking which all conditions have been checked.

	if(isset($_POST[ProductIDCond_CB]))
		$ProductID=1;
	if(isset($_POST[PNameCond_CB]))
		$PName=1;

	//if(isset($_POST[CustIdCond_CB]) and !isset($_POST[EmailIDCond_CB]) and !isset($_POST[PhNoCond_CB])){
	if($ProductID==1){
		$conn = OpenCon();
		if(isset($_POST[PName_CB])){
			if(!empty($_POST[PName])){
				$sql = "UPDATE PRODUCT 
						SET PName = '$_POST[PName]' 
						WHERE ProductID = $_POST[ProductIDCond] ;";
				$res = mysqli_query($conn, $sql);
				mysqli_query($conn, $sql);
				echo $res;
			}
		}

		$conn = OpenCon();
		if(isset($_POST[Description_CB])){
			if(!empty($_POST[Description])){
				$sql = "UPDATE PRODUCT 
						SET Description = '$_POST[Description]' 
						WHERE ProductID = $_POST[ProductIDCond] ";
				$res = mysqli_query($conn, $sql);
				echo $res;
			}
		}

		$conn = OpenCon();
		if(isset($_POST[Category_CB])){
			if(!empty($_POST[Category])){
				$sql = "UPDATE PRODUCT 
						SET Category = '$_POST[Category]' 
						WHERE ProductID = $_POST[ProductIDCond] ;";
				$res = mysqli_query($conn, $sql);
				echo $res;
			}
		}

		$conn = OpenCon();
		if(isset($_POST[Cost_Price_CB])){
			if(!empty($_POST[Cost_Price])){
				$sql = "UPDATE PRODUCT 
						SET Cost_Price = '$_POST[Cost_Price]' 
						WHERE ProductID = $_POST[ProductIDCond] ";
				$res = mysqli_query($conn, $sql);
				echo $res;
			}
		}

		$conn = OpenCon();
		if(isset($_POST[Selling_Price_CB])){
			if(!empty($_POST[Selling_Price])){
				$sql = "UPDATE CUSTOMER 
						SET Selling_Price = $_POST[Selling_Price] 
						WHERE ProductID = $_POST[Product_IDCond] ;";
				$res = mysqli_query($conn, $sql);
				echo $res;
			}
		}
		CloseCon($conn);
		header("Location: update_product.html");
		exit();
	}

//productid changes work fine as we dont have contradictory cases where we have to handle the changed value midway in the WHERE clause!

	if($PName==1){
		$conn = OpenCon();
		$value = $_POST[PNameCond];
		if(isset($_POST[PName_CB])){
			if(!empty($_POST[PName])){
				$sql = "UPDATE PRODUCT 
						SET PName = '$_POST[PName]' 
						WHERE PName = '$_POST[PNameCond]' ;";
				$res = mysqli_query($conn, $sql);
				mysqli_query($conn, $sql);
				echo $res;
				$value = $_POST[PName]; 
			}
		}

		$conn = OpenCon();
		if(isset($_POST[Description_CB])){
			if(!empty($_POST[Description])){
				$sql = "UPDATE PRODUCT 
						SET Description = '$_POST[Description]' 
						WHERE PName = '$value'; ";
				$res = mysqli_query($conn, $sql);
				echo $res;
			}
		}

		$conn = OpenCon();
		if(isset($_POST[Category_CB])){
			if(!empty($_POST[Category])){
				$sql = "UPDATE PRODUCT 
						SET Category = '$_POST[Category]' 
						WHERE PName = '$value';";
				$res = mysqli_query($conn, $sql);
				echo $res;
			}
		}

		$conn = OpenCon();
		if(isset($_POST[Cost_Price_CB])){
			if(!empty($_POST[Cost_Price])){
				$sql = "UPDATE PRODUCT 
						SET Cost_Price = '$_POST[Cost_Price]' 
						WHERE PName = '$value'; ";
				$res = mysqli_query($conn, $sql);
				echo $res;
			}
		}

		$conn = OpenCon();
		if(isset($_POST[Selling_Price_CB])){
			if(!empty($_POST[Selling_Price])){
				$sql = "UPDATE CUSTOMER 
						SET Selling_Price = $_POST[Selling_Price] 
						WHERE PName = '$value';";
				$res = mysqli_query($conn, $sql);
				echo $res;
			}
		}
		CloseCon($conn);
		header("Location: update_product.html");
		exit();
	}

	CloseCon($conn);
	header("Location: update_product.html");
	exit();
?>
