<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Customer View</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <?php
        include 'connection.php';
        $queries = array(
            "1"=>"SELECT OrderID,Quantity,ProductID,InvoiceNo,OrderDate
FROM CUSTOMER ,ORDERS
WHERE CUSTOMER.EmailID=\"lhmufv.lwofk@ljt.co\" AND CUSTOMER.CustomerID=ORDERS.CustomerID;",
            "2"=>"SELECT SUM(Selling_Price) AS TOTAL_AMT_SPENT
FROM ORDERS,PRODUCT
WHERE PRODUCT.ProductID=ORDERS.ProductID AND CustomerID=10;",
            "3"=>"SELECT OrderID,Quantity,DelSysID,CustomerID,InvoiceNo,OrderDate
FROM ORDERS
WHERE ProductID=5;",
            "8"=>"SELECT COURIER_SERVICE.CourierID,COURIER_SERVICE.Cname,
COUNT(HIRES.OrderID) AS TOTAL_DELIVERIES
FROM COURIER_SERVICE,HIRES
WHERE COURIER_SERVICE.CourierID=HIRES.CourierID
GROUP BY HIRES.CourierID
HAVING TOTAL_DELIVERIES=
(SELECT COUNT(HIRES.OrderID) AS NUM
FROM HIRES
GROUP BY (CourierID)
ORDER BY NUM DESC LIMIT 1
);"
);
        $conn = OpenCon(); // opening an mysql connecting and storing the reference
        $conn->query("CREATE VIEW temp AS ".$queries[$_POST["queryNum"]]);
        $result = $conn->query("SHOW COLUMNS FROM temp;");
        $selected_attributes = array();
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                //print_r($row->Field);
                array_push($selected_attributes, $row["Field"]);
                }
        } else {
            echo "No rows exist";
        }
        $result = $conn->query($queries[$_POST["queryNum"]]);
        /* Web Page Part Starts Here */
        echo "<table class=\"table table-hover table-bordered\">";
        echo "<thead class=\"thead-light\">";
        echo "<tr>";
        foreach ($selected_attributes as $key => $value){
            echo "<th>".$value."</th>";
        }
        echo "</tr>";
        //print_r($result);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                foreach($row as $k => $v){
                    echo "<td>".$v."</td>";
                }
                echo "</tr>";
            }
        } else {
            echo "No results returned";
        }
        $conn->query("DROP VIEW temp;");
        exit();
        ?>
    </body>
</html>
