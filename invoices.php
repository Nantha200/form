<?php
// Database connection hfile
include "db_connect.php";
?>
<?php
$invoice = $_GET['invoice'];
?>
<!DOCTYPE html>
<html>

<!DOCTYPE html>
<html class="no-js" lang="en">


<!-- Mirrored from invoma.vercel.app/general_3.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Dec 2023 05:41:16 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
  <!-- Meta Tags -->
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Laralink">
  <!-- Site Title -->
  <title>General Purpose Invoice-3</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
</head>

<body onload="window.print()" id="print-area">
<div class="tm_container">
    <div class="tm_invoice_wrap">
      <div class="tm_invoice tm_style1 tm_type1" id="tm_download_section">
        <div class="tm_invoice_in">
          <div class="tm_invoice_head tm_top_head tm_mb15 tm_align_center">
            <div class="tm_invoice_left">
              <div class="tm_logo"><img src="assets/img/nearlook logo.png" alt="Logo"></div>
            </div>
            <div class="tm_invoice_right tm_text_right tm_mobile_hide">
              <div class="tm_f50 tm_text_uppercase tm_white_color">Invoice</div>
            </div>
            <div class="tm_shape_bg tm_accent_bg tm_mobile_hide"></div>
          </div>
          <div class="tm_invoice_info tm_mb25">
            <!-- <div class="tm_card_note tm_mobile_hide"><b class="tm_primary_color">Payment Method: </b>Paypal, Western Union</div> -->
            <div class="tm_invoice_info_list tm_white_color">
              <p class="tm_invoice_number tm_m0">Invoice No: <?php echo $_GET['invoice']; ?></p>
              <p class="tm_invoice_date tm_m0">Date: <?php echo date('d-m-y'); ?></p>
            </div>
            <div class="tm_invoice_seperator tm_accent_bg"></div>
          </div>
          <div class="tm_invoice_head tm_mb10">
            <div class="tm_invoice_left">
              <p class="tm_mb2"><b class="tm_primary_color">Invoice To:</b></p>
              <li class="text-bold" >Invoiced To:</li>
              <?php
              $sql = "SELECT Distinct(name),address,phone FROM invoice WHERE invoice_no ='$invoice'";
              $query = mysqli_query($conn, $sql);
              while ($row = mysqli_fetch_assoc($query)) {
                  echo " " . $row['name'] . "";
                  $address = $row['address'];
                  $addressParts = explode(',', $address);
                  echo "<>";
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
          <div class="tm_table tm_style1">
            <div class="">
              <div class="tm_table_responsive">
                <table>
                  <thead>
                    <tr class="tm_accent_bg">
                      <th class="tm_width_3 tm_semi_bold tm_white_color">SI.No</th>
                      <th class="tm_width_3 tm_semi_bold tm_white_color">Item</th>
                      <th class="tm_width_2 tm_semi_bold tm_white_color">Price</th>
                      <th class="tm_width_1 tm_semi_bold tm_white_color">Qty</th>
                      <th class="tm_width_2 tm_semi_bold tm_white_color tm_text_right">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="tm_width_1">1</td>
                      <td class="tm_width_5">Website Design</td>
                      <td class="tm_width_">8500</td>
                      <td class="tm_width_1">1</td>
                      <td class="tm_width_2 tm_text_right">8500</td>
                    </tr>
                    <tr>
                      <td class="tm_width_1">2</td>
                      <td class="tm_width_5">SEO Optimization</td>
                      <td class="tm_width_">6500</td>
                      <td class="tm_width_1">1</td>
                      <td class="tm_width_2 tm_text_right">6500</td>
                    </tr>
                    <tr>
                      <td class="tm_width_1">3</td>
                      <td class="tm_width_5">Graphics Designing</td>
                      <td class="tm_width_">500</td>
                      <td class="tm_width_1">3</td>
                      <td class="tm_width_2 tm_text_right">1500</td>
                    </tr>
                    <tr>
                      <td class="tm_width_1">4</td>
                      <td class="tm_width_5">Social Media Marketing</td>
                      <td class="tm_width_">7500</td>
                      <td class="tm_width_1">1</td>
                      <td class="tm_width_2 tm_text_right">7500</td>
                    </tr>
            
                 
                  </tbody>
                </table>
              </div>
            </div>
            <div class="tm_invoice_footer tm_border_top tm_mb15 tm_m0_md">
              <div class="tm_left_footer">

                <p class="tm_mb2">
                  
             
              </div>
              <div class="tm_right_footer">
                <table class="tm_mb15">
                  <tbody>
                    <tr class="tm_gray_bg ">
                      <td class="tm_width_3 tm_primary_color tm_bold">Subtoal</td>
                      <td class="tm_width_3 tm_primary_color tm_bold tm_text_right">$1650</td>
                    </tr>
                    <tr class="tm_gray_bg">
                      <td class="tm_width_3 tm_primary_color">Tax <span class="tm_ternary_color">(5%)</span></td>
                      <td class="tm_width_3 tm_primary_color tm_text_right">+$82</td>
                    </tr>
                    <tr class="tm_accent_bg">
                      <td class="tm_width_3 tm_border_top_0 tm_bold tm_f16 tm_white_color">Grand Total	</td>
                      <td class="tm_width_3 tm_border_top_0 tm_bold tm_f16 tm_white_color tm_text_right">$1732</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
      
          </div>
          <div class="tm_note tm_text_center tm_font_style_normal">
            <hr class="tm_mb15">
            <p class="tm_mb2"><b class="tm_primary_color">Terms & Conditions:</b></p>
            <p class="tm_m0">All claims relating to quantity or shipping errors shall be waived by Buyer unless made in writing to <br>Seller within thirty (30) days after delivery of goods to the address stated.</p>
          </div><!-- .tm_note -->
        </div>
      </div>
      <div class="tm_invoice_btns tm_hide_print">
        <a href="javascript:window.print()" class="tm_invoice_btn tm_color1">
          <span class="tm_btn_icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M384 368h24a40.12 40.12 0 0040-40V168a40.12 40.12 0 00-40-40H104a40.12 40.12 0 00-40 40v160a40.12 40.12 0 0040 40h24" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><rect x="128" y="240" width="256" height="208" rx="24.32" ry="24.32" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><path d="M384 128v-24a40.12 40.12 0 00-40-40H168a40.12 40.12 0 00-40 40v24" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><circle cx="392" cy="184" r="24" fill='currentColor'/></svg>
          </span>
          <span class="tm_btn_text">Print</span>
        </a>
        <button id="tm_download_btn" class="tm_invoice_btn tm_color2">
          <span class="tm_btn_icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M320 336h76c55 0 100-21.21 100-75.6s-53-73.47-96-75.6C391.11 99.74 329 48 256 48c-69 0-113.44 45.79-128 91.2-60 5.7-112 35.88-112 98.4S70 336 136 336h56M192 400.1l64 63.9 64-63.9M256 224v224.03" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
          </span>
          <span class="tm_btn_text">Download</span>
        </button>
      </div>
    </div>
  </div>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/jspdf.min.js"></script>
  <script src="assets/js/html2canvas.min.js"></script>
  <script src="assets/js/main.js"></script>
</body>

<!-- Mirrored from invoma.vercel.app/general_3.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Dec 2023 05:41:17 GMT -->
</html>