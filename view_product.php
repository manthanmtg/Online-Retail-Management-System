<!DOCTYPE html>

<html lang="en" dir="ltr">

    <head>
        <meta charset="utf-8">
        <title>Product View</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <?php

            include 'connection.php';

            $conn = OpenCon(); // opening an mysql connecting and storing the reference
            $column_headings = array("ProductID", "PName", "Description", "Category", "Cost_Price", "Selling_Price");
            $sql = "SELECT ";
            $selected_attributes = array(); // The selected attributes for Viewing
            $conditions = array();
            
            //print_r($_POST);
            
            foreach ($_POST as $key => $value){
                if(in_array($key, $column_headings)){
                    $selected_attributes[$key] = $value;
                }
                else{
                    $conditions[$key] = $value;
                }
            }

            //print_r($selected_attributes);
            
            foreach ($selected_attributes as $key => $value) {
                $sql = $sql.$key.",";
            }
            $sql = rtrim($sql, ",");
            $sql = $sql." ";
            /* Condition Part */
            $sql = $sql." FROM PRODUCT ";
            $where = "";
            foreach ($conditions as $key => $value) {
                if($value == "")
                    continue;
                else {
                    if ($where == "") {
                        $where="WHERE ";
                    }
                    if($key == "pidcond") {
                        if(preg_match("/[0-9]*-[0-9]*/", $value)){
                            $arr = explode("-", $value);
                            if($arr[0]!="" and $arr[1]!="")
                                $where = $where."ProductID>=".$arr[0]." AND "."ProductID<=".$arr[1];
                            if($arr[0]=="" and $arr[1]!="")
                                $where = $where."ProductID<=".$arr[1];
                            if($arr[0]!="" and $arr[1]=="")
                                $where = $where."ProductID>=".$arr[0];
                            if($arr[0]=="" and $arr[1]=="")
                                $where = "";
                        }
                        else{
                            $where = $where."ProductID=".$value;
                        }
                    }
                }
            }
            /* Condition Part ends here */
            $sql = $sql.$where.";"; // append the where condition

            /*   Query Part Ends Here */

            //echo $sql;

            $result = $conn->query($sql);   // Query is executed here

            //echo "Your query: ".$sql;
            /* Web Page Part Starts Here */
            echo "<table class=\"table table-hover table-bordered\">";
            echo "<thead class=\"thead-light\">";
            echo "<tr>";
            foreach ($selected_attributes as $key => $value){
                echo "<th>".$key."</th>";
            }
            echo "</tr>";
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    foreach($row as $k => $v){
                        echo "<td>".$v."</td>";
                    }
                    echo "</tr>";
                }
            } else {
                echo "0 results";
            }
            echo "</table>";
            echo "Number of rows selected: ".$result->num_rows;
            /* Web Page Part ends here */
            CloseCon($conn);   // closing the connection
            exit();
        ?>
    </body>
</html>
