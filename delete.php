<?php
    include "db_connect.php";

    if(isset($_GET['invoice'])){
        $invoice = $_GET['invoice'];

        $sql = "DELETE FROM `invoice` WHERE `invoice_no`='$invoice'";

        $result = $conn->query($sql);
        if($result === TRUE){
            echo "Record deleted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>