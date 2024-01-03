<?php
//Database connection file
include "db_connect.php";
if(isset($_POST['submit'])) {
    $id=$_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $product = $_POST['product'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $total = $_POST['total'];
    $subtotal = $_POST['subtotal'];
    $gst = $_POST['gst'];
    $nettotal=$_POST['nettotal'];
    $invoice_no=$_POST['invoice_no'];
    //$invoice_total=$_POST['invoice_total'];
    //$created_at=$_POST['created_at'];

    // Loop through the submitted products and prices
    foreach ($_POST['product'] as $key => $product) {
        $price = $_POST['price'][$key];
        $quantity= $_POST['quantity'][$key];
        $total= $_POST['total'][$key];
        // Perform the SQL insertion
        $sql = "INSERT INTO invoice (name, phone,  product, price, quantity, total, subtotal, gst, nettotal, address, invoice_no,id) VALUES ('$name', '$phone', '$product', '$price', '$quantity', '$total', '$subtotal', '$gst', '$nettotal', '$address','$invoice_no','$id')";
        
        $query = mysqli_query($conn, $sql);
        if($query) {
            header('location:index.php');
        }
    }
}
?>