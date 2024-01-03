<?php
include "db_connect.php";

if(isset($_POST['submit'])) {
    $invoice_no = $_POST['invoice_no'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $product = $_POST['product'];
    $price= $_POST['price'];
    $quantity= $_POST['quantity'];
    $total=$_POST['total'];
    $subtotal=$_POST['subtotal'];
    $gst=$_POST['gst'];
    $nettotal=$_POST['nettotal'];
    $address=$_POST['address'];

    $sql = "UPDATE `invoice` SET `name`='$name', `phone`='$phone', `product`='$product', `price`='$price', `quantity`='$quantity', `total`='$total', `subtotal`='$subtotal', `gst`='$gst', `nettotal`='$nettotal', `address`='$address' WHERE `invoice_no`='$invoice_no'";

    $result = $conn->query($sql);

    if($result == TRUE) {
        echo "Record Updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if(isset($_GET['invoice'])) {
    $invoice = $_GET['invoice'];

    $sql = "SELECT * FROM `invoice` WHERE `invoice_no`='$invoice'";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id=$row['id'];
            $name = $row['name'];
            $phone = $row['phone'];
            $product = $row['product'];
            $price= $row['price'];
            $quantity= $row['quantity'];
            $total=$row['total'];
            $subtotal=$row['subtotal'];
            $gst=$row['gst'];
            $nettotal=$row['nettotal'];
            $address=$row['address'];
            $invoice_no = $row['invoice_no'];
        }
        ?>
        <html>
        <body>
            <h2>User Update Form</h2>
            <form action="" method="post">
                <fieldset>
                    <legend>Personal Information</legend>
                    <input type="hidden" name="id" value="<?php echo $id;?>"><br>
                    <input type="hidden" name="invoice_no" value="<?php echo $invoice_no; ?>"><br>
                    Name:<br>
                    <input type="text" name="name" value="<?php echo $name; ?>"><br>
                    phone:<br>
                    <input type="text" name="phone" value="<?php echo $phone; ?>"><br>
                    product:<br>
                    <input type="text" name="product" value="<?php echo $product; ?>"><br>
                    price:<br>
                    <input type="text" name="price" value="<?php echo $price; ?>"><br>
                    quantity:<br>
                    <input type="text" name="quantity" value="<?php echo $quantity; ?>"><br>
                    total:<br>
                    <input type="text" name="total" value="<?php echo $total; ?>"><br>
                    subtotal:<br>
                    <input type="text" name="subtotal" value="<?php echo $subtotal; ?>"><br>
                    gst:<br>
                    <input type="text" name="gst" value="<?php echo $gst; ?>"><br>
                    nettotal:<br>
                    <input type="text" name="nettotal" value="<?php echo $nettotal; ?>"><br>
                    Address:<br>
                    <input type="text" name="address" value="<?php echo $address; ?>"><br>
                    <br>

                    <input type="submit" name="submit" value="Submit">
                </fieldset>
            </form>
        </body>
        </html>
        <?php
    } else {
        // If the 'id' value is not valid, redirect the user back to view.php page
        header("location:invoice_list.php");
    }
}
?>