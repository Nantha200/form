<!---------- Printing Invoice File  ---------->
<?php
// Database connection hfile
include "db_connect.php";
?>
<?php
$invoice = $_GET['invoice'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<style>
    *,
    *::after,
    *::before {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    :root {
        --blue-color: #0c2f54;
        --dark-color: #535b61;
        --white-color: #fff;
    }

    ul {
        list-style-type: none;
    }

    ul li {
        margin: 2px 0;
    }
    .design{
        margin-left:700px;
        margin-top:-53px;
        height:100px;
        width:450px;
    }
    /* text colors */
    .text-dark {
        color: var(--dark-color);
    }

    .text-blue {
        color: var(--blue-color);
    }

    .text-end {
        text-align: right;
    }

    .text-center {
        text-align: center;
    }

    .text-start {
        text-align: left;
    }

    .text-bold {
        font-weight: 700;
    }

    /* hr line */
    .hr {
        height: 1px;
        background-color: rgba(0, 0, 0, 0.1);
    }

    /* border-bottom */
    .border-bottom {
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }

    body {
        font-family: "Poppins", sans-serif;
        color: var(--dark-color);
        font-size: 14px;
    }

    .invoice-wrapper {
        min-height: 100vh;
        /* background-color: rgba(0, 0, 0, 0.1); */
        padding-top: 20px;
        padding-bottom: 20px;
    }

    .invoice {
        max-width: 850px;
        margin-right: auto;
        margin-left: auto;
        background-color: var(--white-color);
        padding: 70px;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-radius: 5px;
        min-height: 920px;
    }

    .invoice-head-top-left img {
        width: 130px;
    }

    .invoice-head-top-right h3 {
        font-weight: 500;
        font-size: 27px;
        color: var(--blue-color);
    }

    .invoice-head-middle,
    .invoice-head-bottom {
        padding: 16px 0;
    }

    .invoice-body {
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: 4px;
        overflow: hidden;
    }

    .invoice-body table {
        border-collapse: collapse;
        border-radius: 4px;
        width: 100%;
    }

    .invoice-body table td,
    .invoice-body table th {
        padding: 12px;
    }

    .invoice-body table tr {
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }

    .invoice-body table thead {
        background-color: rgba(0, 0, 0, 0.02);
    }

    .invoice-body-info-item {
        display: grid;
        /* grid-template-columns: 80% 20%; */
    }

    .invoice-body-info-item .info-item-td {
        padding: 12px;
        background-color: rgba(0, 0, 0, 0.02);
    }

    .invoice-foot {
        padding: 30px 0;
    }

    .invoice-foot p {
        font-size: 12px;
    }

    .invoice-btns {
        margin-top: 20px;
        display: flex;
        justify-content: center;
    }

    .invoice-btn {
        padding: 3px 9px;
        color: var(--dark-color);
        font-family: inherit;
        border: 1px solid rgba(0, 0, 0, 0.1);
        cursor: pointer;
    }

    .invoice-head-top,
    .invoice-head-middle,
    .invoice-head-bottom {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        padding-bottom: 10px;
    }

    @media screen and (max-width: 992px) {
        .invoice {
            padding: 40px;
        }
    }

    @media screen and (max-width: 576px) {

        .invoice-head-top,
        .invoice-head-middle,
        .invoice-head-bottom {
            grid-template-columns: repeat(1, 1fr);
        }

        .invoice-head-bottom-right {
            margin-top: 12px;
            margin-bottom: 12px;
        }

        .invoice * {
            text-align: left;
        }

        .invoice {
            padding: 28px;
        }
    }

    .overflow-view {
        overflow-x: scroll;
    }

    .invoice-body {
        min-width: 600px;
    }

    @media print {
        body {
            margin: 0;
            overflow-y: hidden;
        }

        .invoice-wrapper,
        .invoice {
            page-break-inside: avoid;
        }

        .invoice {
            padding: 20px;
        }

        .invoice-btns {
            display: none;
        }

        .overflow-view {
            overflow-x: hidden;
        }

        @page {
            size: auto;
            margin: 0mm;

            @top-center, @top-right, @top-left {
                content: "";
            }

            @bottom-center, @bottom-right, @bottom-left {
                content: "";
            }
        }
    }
</style>

<body onload="window.print()">

<div class="tm_container">
    <div class="tm_invoice_wrap">
      <div class="tm_invoice tm_style1 tm_type1" id="tm_download_section">
        <div class="tm_invoice_in">
          <div class="tm_invoice_head tm_top_head tm_mb15 tm_align_center">
            <div class="tm_invoice_left">
                        <div class="tm_logo"><img src="assets/img/nearlook logo.png" alt="Logo" width:50px; hight:50px></div>
                            
                        </div>
                        <div class="tm_invoice_right tm_text_right tm_mobile_hide">
                        <div class="tm_f50 tm_text_uppercase tm_white_color">Invoice</div>
                        </div>
                        <div class="tm_shape_bg tm_accent_bg tm_mobile_hide"></div>
                    </div>
                    <div class="tm_invoice_info tm_mb25" >
                        <div class="tm_invoice_info_list tm_white_color" style="margin-left:400px">
                        <p class="tm_invoice_number tm_m0" >Invoice No: <?php echo $_GET['invoice']; ?></p>
                        <p class="tm_invoice_date tm_m0">Date: <?php echo date('d-m-y'); ?></p>
                        </div>
                        <div class="tm_invoice_seperator tm_accent_bg"></div>
                    </div> 

                    
                    <div class="hr"></div>
                    <div class="tm_invoice_head tm_mb10">
                    <div class="tm_invoice_left">
                    <p class="tm_mb2"><b class="tm_primary_color">Invoice To:</b></p>
  
                    <?php
                    $sql = "SELECT Distinct(name),address,phone FROM invoice WHERE invoice_no ='$invoice'";
                    $query = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($query)) {
                        echo " " . $row['name'] . "<br>";
                        $address = $row['address'];
                        $addressParts = explode(',', $address);
                      
                        foreach ($addressParts as $part) {
                            echo trim($part) . "<br>";
                        }
                        echo "";
                        echo "Phone No :" . $row['phone'] . "";
                    }
                    ?>
                    </div>
                    <div class="tm_invoice_right tm_text_right">
                    <p class="tm_mb2"><b class="tm_primary_color">Pay To:</b></p>
                    <p>
                        Nearlook Mart Private Limited<br>
                        184/F-31/1 Solaimalai Ayyanar Kovil Street, <br> Pugal Coffee opp Theni,  Tamilnadu-625531.<br> info@nearlooks.com
                    
                    </p>
                    </div>
                </div>
                   
                </div>
                <div class="overflow-view">
                    <div class="invoice-body">
                        <table >
                            <thead>
                                <tr style="background-color:#FA6226; color:white; margin-right:200px">
                                    <td class="text-bold">S.No</td>
                                    <td class="text-bold">Product</td>
                                    <td class="text-bold">Price</td>
                                    <td class="text-bold">Qty</td>
                                    <td class="text-bold" style="margin-right:200px">Total</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                $total = 0;
                                $sql1 = "SELECT * FROM invoice WHERE invoice_no='$invoice'";
                                $query1 = mysqli_query($conn, $sql1);
                                while ($row = mysqli_fetch_assoc($query1)) {
                                    $total += $row['price'];
                                ?><tr >

                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $row['product']; ?></td>
                                        <td><?php echo "₹" . $row['price']; ?></td>
                                        <td><?php echo   $row['quantity']; ?></td>
                                        <td class="text-end"><?php echo "₹" . $row['total']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <div class="tm_invoice_footer tm_border_top tm_mb15 tm_m0_md">
                        <div class="tm_left_footer">
                            <p class="tm_mb2"><b class="tm_primary_color">Payment info:</b></p>
                            <p class="tm_mb2">
                            <b>Bank Name:</b> HDFC Bank <br>
                            <b>Account Holder:</b> Nearlook Mart Pvt.Ltd, <br>
                            <b> Account No:</b> 99997888744401 <br>
                            <b>Branch Code:</b> 0776 <br>
                            <b>IFSC Code:</b> HDFC0000776 <br>
                            <b>Branch:</b> Theni Allinagaram-Tamilnadu <br>
                            <b>G-Pay/UPI No:</b> 7888744401 </p>
                        
                        </div>
                        <?php
                     

                        // Initialize variables
                        $subtotal = 0;
                        $gst = 0;
                        $grandtotal = 0;

                        // Calculate total
                        $sqlTotal = "SELECT SUM(total) as total FROM invoice WHERE invoice_no='$invoice'";
                        $queryTotal = mysqli_query($conn, $sqlTotal);
                        $totalRow = mysqli_fetch_assoc($queryTotal);
                        $subtotal = $totalRow['total'];

                        // Calculate GST
                        $sqlGST = "SELECT SUM(gst) as gst FROM invoice WHERE invoice_no='$invoice'";
                        $queryGST = mysqli_query($conn, $sqlGST);
                        $gstRow = mysqli_fetch_assoc($queryGST);
                       
                        $gst = $gstRow['gst'];
                        
                        // Calculate Grand Total
                        $grandtotal = $subtotal + ($gst+$subtotal)/100;
                        ?>
                       

                            <p class="tm_mb2">
                            

                            
                            <div class="tm_right_footer">
                            <table class="tm_mb15">
                            <tbody>
                                <tr class="tm_gray_bg ">
                                <td class="tm_width_3 tm_primary_color tm_bold">Subtotal</td>
                                <td class="tm_width_3 tm_primary_color tm_bold tm_text_right"><?php echo " ₹" . $subtotal; ?></td>
                                </tr>
                                <tr class="tm_gray_bg">
                                <td class="tm_width_3 tm_primary_color">Tax <span class="tm_ternary_color"></span></td>
                                <td class="tm_width_3 tm_primary_color tm_text_right"><?php echo  $gst; ?></td>
                                </tr>
                                <tr class="tm_accent_bg">
                                <td class="tm_width_3 tm_border_top_0 tm_bold tm_f16 tm_white_color">Grand Total	</td>
                                <td class="tm_width_3 tm_border_top_0 tm_bold tm_f16 tm_white_color tm_text_right"><?php echo "₹" . $grandtotal; ?></td>
                                </tr>
                            </tbody>
                            </table>
                            </div>
                        </div>
                </div>
                <br><br>
                <div class="text-start">
                  
                    <div>
                        <br>
                        <?php
                        $sql2 = "SELECT * FROM invoice WHERE invoice_no='$invoice' limit 1";
                        $query2 = mysqli_query($conn, $sql2);
                        
                        ?>

                    </div>

                </div>
                <div class="tm_note tm_text_center tm_font_style_normal">
                    <hr class="tm_mb15">
                    <p class="tm_mb2"><b class="tm_primary_color">Terms & Conditions:</b></p>
                    <p class="tm_m0">All claims relating to quantity or shipping errors shall be waived by Buyer unless made in writing to <br>Seller within thirty (30) days after delivery of goods to the address stated.</p>
                </div><!-- .tm_note -->
               
            </div>
        </div>
    </div>

</body>

</html>