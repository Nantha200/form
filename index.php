<!-- Invoice Form -->
<?php
// Database Connection file
include "db_connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
    <style>
        @media print {
            .btn {
                display: none;
            }

            .NoPrint {
                display: none;
            }

            .form-control,
            .input-group-text {
                border: none;
            }
        }

        .btn btn-danger {
            width: 20px;
        }
        .bg-primary{
            background-color: ##a86032;
        }
        .tm_invoice_left>.tm_logo{
           
        }
    </style>
</head>

<body>

    <div class="container">
    <div class="tm_invoice_left">
        <div class="tm_logo"><img src="assets/img/nearlook logo.png" alt="Logo" style="width:125px; hight:75px"></div>
    </div>
        <div class="text" style="color:coral">
            Invoice Form
        </div>
        <!-- Form -->
        <form action="backend.php" method="post">
            <?php
            // Invoice query
            $sql = "SELECT * FROM `invoice` ORDER BY `id` DESC LIMIT 1";
            $query = mysqli_query($conn, $sql);

            if ($query && mysqli_num_rows($query) > 0) {
                $row = mysqli_fetch_assoc($query);

                if (!isset($row['invoice_no']) || $row['invoice_no'] == '') {
                    $invoice = "INVO-" . date('dmy') . "-01";
                } else {
                    // If previous invoices exist, increment the last invoice number
                    $invoice = $row['invoice_no'];
                    $parts = explode("-", $invoice);
                    $autoIncrement = (isset($parts[1]) && isset($parts[2])) ? intval($parts[2]) : 0;
                    $autoIncrement++;
                    $invoice = $parts[0] . '-' . $parts[1] . '-' . str_pad($autoIncrement, 2, '0', STR_PAD_LEFT);
                }
            }
            ?>

            <div class="form-row">
                <label for="">INVOICE No:</label>
                <div class="input-data">
                    <input type="text" value="<?php echo $invoice; ?>" name="invoice_no" readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="input-data">
                    <input type="text" name="name" required>
                    <div class="underline"></div>
                    <label for="">Name</label>
                </div>
                <div class="input-data">
                    <input type="text" name="phone" required>
                    <div class="underline"></div>
                    <label for="">Phone No</label>
                </div>
            </div>
            <table class="table table-bordered">
                <thead class="bg-primary" style="background-color: coral;">
                    <tr style="background-color: coral;">
                        <th scope="col" class="text-end" style="background-color: coral;">Product Name</th>
                        <th scope="col" class="text-end"style="background-color: coral;">Price</th>
                        <th scope="col" class="text-end"style="background-color: coral;">Quantity</th>
                        <th scope="col" class="text-end"style="background-color: coral;">Total</th>
                       
                        <td class="NoPrint"><button type="button" class="btn btn-warning" onclick="addProductPriceRow()">+</button></td>
                    </tr>
                </thead>
                <tbody id="TBody">
                    <tr class="product-price-row">
                        <td><input type="text" class="form-control" name="product[]"></td>
                        <td><input type="text" class="form-control text-end" name="price[]" onChange="calculation(this);"></td>
                        <td><input type="text" class="form-control text-end" name="quantity[]" onChange="calculation(this);"></td>
                        <td><input type="text" class="form-control text-end" name="total[]" readonly></td>
                        <td class="NoPrint"><button type="button" class="btn btn-danger" onclick="removeProductPriceRow(this)">x</button></td>
                    </tr>
                </tbody>
            </table>
            <div style="margin-left:470px;">
                <div class="input-group nb-3">
                    <span class="input-group-text" id="basic-addon1" style="width:40%">SubTotal:</span>
                    <input type="text" id="ftotal" name="subtotal" class="form-control"  style="width:50%" readonly>
                </div>
                <div class="input-group nb-3">  
                    <span class="input-group-text" id="basic-addon1" style="width:40%">GST: </span>
                    <input type="text" id="fgst" name="gst" class="form-control" oninput="calculateGST()">
                </div>
                <div class="input-group nb-3">
                    <span class="input-group-text" id="basic-addon1">Net Amount: </span>
                    <input type="text" id="fnettotal" name="nettotal" class="form-control" readonly>
                </div>
            </div><br><br>
            <div class="form-row">
                <div class="input-data textarea" style="margin-top:-80px">
                    <textarea rows="8" cols="80" name="address" required></textarea>
                    <div class="underline"></div>
                        <label for="">Write your Address</label>
                    </div>
                    <br>
                    
                        <div class="input-data" style="margin-left:-750px;width: 150px;border-radius:120px;"><br>
                            <input type="submit" name="submit" value="submit" style="border-radius:120px;background-color: coral; box-shadow: 5px 5px;">
                        </div>
                        <div class="input-data"style="margin-left:10px;width: 150px;border-radius:120px;height:25px;"><br>
                            <a href="invoice_list.php" style="color: black;text-decoration:none;background-color: coral; border:1px solid;box-shadow: 5px 5px;height:255px;">Invoice List</a>
                        </div>
                 
                    <br>
                </div>
            </div>
        </form>
    </div>

    <!-- Script for Dynamically Adding Products -->
    <script>
        function addProductPriceRow() {
            var container = document.getElementById('TBody');
            var newRow = container.querySelector('.product-price-row').cloneNode(true);

            // Clear the values in the cloned row
            var inputs = newRow.querySelectorAll('input');
            inputs.forEach(function (input) {
                input.value = '';
                input.oninput = function () {
                    calculation(this);
                };
            });

            // Append the cloned row to the container
            container.appendChild(newRow);
        }

        function removeProductPriceRow(element) {
            var container = document.getElementById('TBody');
            if (container.childElementCount > 1) {
                container.removeChild(element.parentNode.parentNode);
            } else {
                alert("At least one product and price row is required.");
            }

            // Recalculate total when a product is removed
            GetTotal();
        }

        function calculation(input) {
            var row = input.parentNode.parentNode; // Get the parent row
            var priceInput = row.querySelector('input[name="price[]"]');
            var quantityInput = row.querySelector('input[name="quantity[]"]');
            var totalInput = row.querySelector('input[name="total[]"]');

            if (priceInput && quantityInput && totalInput) {
                var price = parseFloat(priceInput.value) || 0;
                var quantity = parseFloat(quantityInput.value) || 0;
                var total = price * quantity;
                totalInput.value = total.toFixed(2);
            } else {
                console.error("One or more input elements not found. Check the names and indices.");
            }

            // Recalculate total when a product value is changed
            GetTotal();
        }

        function GetTotal() {
            var sum = 0;
            var amts = document.getElementsByName('total[]');

            for (let index = 0; index < amts.length; index++) {
                var total = amts[index].value;
                sum = +(sum) + +(total);
            }

            document.getElementById('ftotal').value = sum;

            var gst = document.getElementById("fgst").value;
            var gstAmount = (sum * gst) / 100;
            var netvalue = +(sum) + +(gstAmount);

            document.getElementById("fnettotal").value = netvalue;
        }

        // Define calculateGST function
        function calculateGST() {
            // Get net amount and GST rate from input fields
            var ftotal = parseFloat(document.getElementById("ftotal").value) || 0;
            var fgst = parseFloat(document.getElementById("fgst").value) || 0;

            // Calculate GST amount and display the result
            var gstAmount = (ftotal * fgst) / 100;
            document.getElementById("result").innerHTML = "GST Amount: " + gstAmount.toFixed(2) + "<br>";
        }

        // Set up oninput event handler after all functions are defined
        document.addEventListener("DOMContentLoaded", function () {
            var inputs = document.querySelectorAll('input[name="price[]"], input[name="quantity[]"], input[name="gst"]');
            inputs.forEach(function (input) {
                input.oninput = function () {
                    calculation(input);
                };
            });
        });
    </script>
</body>

</html>
