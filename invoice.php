<?php
require_once 'currency-converter.php';
$price = $usdTOyuan*300;
$invoice = $_GET['invoice_no'];
if (isset($_GET['package'])) {
    $package = $_GET['package'];

    if($package==1) {
        $lineItem = "Spouseware™在线包";
        $price = $usdTOyuan*300;
        $btccoin = file_get_contents("https://blockchain.info/tobtc?currency=USD&value=300");
    } elseif ($package==2) {
        $lineItem = "Spouseware™应用程序";
        $price = $usdTOyuan*400;
        $btccoin = file_get_contents("https://blockchain.info/tobtc?currency=USD&value=400");
    } else {
        $lineItem = "Spouseware™ Pro Pack";
        $price = $usdTOyuan*500;
        $btccoin = file_get_contents("https://blockchain.info/tobtc?currency=USD&value=500");
    }
}
?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" lang="zh_CN" data-clp="clp-active">



<head>
    <meta charset="utf-8">
    <title>付款说明- Spouseware™</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="description" content="通过远程追踪您的孩子和家人的手机来保护他们，查看他们的社交媒体活动、gps位置、相机等">

    <!-- Spouseware Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/icons/favicon-16x16.png">
    <link rel="manifest" href="assets/images/icons/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

</head>

<body data-page-name='payment_page' class='payment-page ' data-country="GB">

    

    <section id="printdata" class="payment-wrapper">
        <style type="text/css">
        html { font-family: simkai; }
            *, ::after, ::before {
                box-sizing: content-box !important;
            }
            .payment-wrapper .payment-header, .payment-wrapper .payment-table {
                margin-bottom: 50px;
            }
            .payment-wrapper .payment-instruction .footer-instruction {
                margin-top: 50px;
            }
            thead, tfoot {
                color: #7cb937;
            }
            
            .table {
  width: 100%;
  max-width: 100%;
  margin-bottom: 1rem;
}

.table th,
.table td {
  padding: 0.75rem;
  vertical-align: top;
  border-top: 1px solid #eceeef;
}

.table thead th {
  vertical-align: bottom;
  border-bottom: 1px solid #eceeef;
}

.table tbody + tbody {
  border-top: 1px solid #eceeef;
}

.table .table {
  background-color: #fff;
}

.table-sm th,
.table-sm td {
  padding: 0.3rem;
}

.table-bordered {
  border: 1px solid #eceeef;
}

.table-bordered th,
.table-bordered td {
  border: 1px solid #eceeef;
}

.table-bordered thead th,
.table-bordered thead td {
  border-bottom-width: 2px;
}

.table-striped tbody tr:nth-of-type(odd) {
  background-color: rgba(0, 0, 0, 0.05);
}

.table-hover tbody tr:hover {
  background-color: rgba(0, 0, 0, 0.075);
}

.table-active,
.table-active > th,
.table-active > td {
  background-color: rgba(0, 0, 0, 0.075);
}

.table-hover .table-active:hover {
  background-color: rgba(0, 0, 0, 0.075);
}

.table-hover .table-active:hover > td,
.table-hover .table-active:hover > th {
  background-color: rgba(0, 0, 0, 0.075);
}

.table-success,
.table-success > th,
.table-success > td {
  background-color: #dff0d8;
}

.table-hover .table-success:hover {
  background-color: #d0e9c6;
}

.table-hover .table-success:hover > td,
.table-hover .table-success:hover > th {
  background-color: #d0e9c6;
}

.table-info,
.table-info > th,
.table-info > td {
  background-color: #d9edf7;
}

.table-hover .table-info:hover {
  background-color: #c4e3f3;
}

.table-hover .table-info:hover > td,
.table-hover .table-info:hover > th {
  background-color: #c4e3f3;
}

.table-warning,
.table-warning > th,
.table-warning > td {
  background-color: #fcf8e3;
}

.table-hover .table-warning:hover {
  background-color: #faf2cc;
}

.table-hover .table-warning:hover > td,
.table-hover .table-warning:hover > th {
  background-color: #faf2cc;
}

.table-danger,
.table-danger > th,
.table-danger > td {
  background-color: #f2dede;
}

.table-hover .table-danger:hover {
  background-color: #ebcccc;
}

.table-hover .table-danger:hover > td,
.table-hover .table-danger:hover > th {
  background-color: #ebcccc;
}

.thead-inverse th {
  color: #fff;
  background-color: #292b2c;
}

.thead-default th {
  color: #464a4c;
  background-color: #eceeef;
}

.table-inverse {
  color: #fff;
  background-color: #292b2c;
}

.table-inverse th,
.table-inverse td,
.table-inverse thead th {
  border-color: #fff;
}

.table-inverse.table-bordered {
  border: 0;
}

.table-responsive {
  display: block;
  width: 100%;
  overflow-x: auto;
  -ms-overflow-style: -ms-autohiding-scrollbar;
}

.table-responsive.table-bordered {
  border: 0;
}

tr{
    text-align:left !important;
}
            
        </style>
        
        
        <div class="container payment-table">
            <table class="table table-hover">
                
                
                    <tr>
                        <td width="33%"><p><?php echo date("d M Y"); ?></p></td>
                        <td width="33%" align="center">
                          <p style="text-align: center;"><?php echo $invoice; ?></p>
                          <img width="150" src="https://spouseware.net/assets/images/barcode.png" alt="barcode" title="Spouseware® Barcode">
                        </td>
                        <td width="33%">
                            <div style="float:left">
                                <p>Spouseware&trade;Cears<br>科技有限公司</p>
                                <strong>www.spouseware.net</strong>
                                <p>pay@spouseware.net</p>
                            </div>
                            <div style="float:right">
                                <img src="https://spouseware.net/logo.png" width="70" alt="">
                            </div>
                        </td>
                        
                    </tr>
                    
                
                
            </table>
        </div>
        <div class="container payment-table">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>单项产品</th>
                        <th>数量</th>
                        <th>价格</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $lineItem; ?></td>
                        <td>01</td>
                        <td>$<?php echo $price; ?></td>
                    </tr>
                    <tr>
                        <td>小计</td>
                        <td></td>
                        <td>$<?php echo $price; ?></td>
                    </tr>
                    <tr>
                        <td>增值税</td>
                        <td></td>
                        <td>$0</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th>总计</th>
                        <th></th>
                        <th>$<?php echo $price; ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="container payment-instruction">
            <h4>付款选项和说明</h4>
            <p>我们确保您的匿名支付，Spouseware™将无法追踪到您的交易。请按照以下说明，使用信用卡、礼物卡、比特币、PayPal支付：</p><br><br>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 22%;">付款方式1：礼物卡 <img class="mx-auto" src="https://spouseware.net/assets/images/paypal-logo.png" width="75" alt="paypal" title="We accept paypal"></th>
                        <th style="width: 22%;">付款方式2：比特币 <img class="mx-auto" src="https://spouseware.net/assets/images/bitcoin-card.png" width="25" alt="bitcoin" title="We accept bitcoin"></th>
                        <th style="width: 22%;">付款方式3: 比特币  <img class="mx-auto" src="https://spouseware.net/assets/images/bitcoin-cash.png" width="25" alt="bitcoin" title="We accept bitcoin"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                          访问 <a href="https://www.airmiles.gift/" target="_blank">www.airmiles.gift</a> 送价值 <?php echo $price; ?> 美元的礼物<br><br>
                          <img class="mx-auto d-block" src="https://spouseware.net/assets/images/paypal.png" width="200" alt="paypal" title="We accept paypal"><br><br>
                          <i>备注： <img src="https://spouseware.net/assets/images/icons/star1.png" width="16" height="16"> <img src="https://spouseware.net/assets/images/icons/star1.png" width="16" height="16"> <img src="https://spouseware.net/assets/images/icons/star1.png" width="16" height="16"> <img src="https://spouseware.net/assets/images/icons/star1.png" width="16" height="16"> <img src="https://spouseware.net/assets/images/icons/star1.png" width="16" height="16"> 快的，熟悉的，好上手的。</i><br><br>
                          <strong>Pay by: Card, Paypal</strong>
                        </td>
                        <td>
                          支付 <strong><?php echo substr($btccoin, 0, 5); ?></strong> 比特币至以下地址： 1McDpMvyztoPG7r154zjFaKQ26yGb8D9fH。 您可以刷卡购买并从PayBis、Biterex、CashApp、Coinbase、Binance、Localbitcoins和更多选项中送比特币。将事务ID发送到 pay@spouseware.net。<br><br>
                          <i>备注：<img src="https://spouseware.net/assets/images/icons/star1.png" width="16" height="16"> <img src="https://spouseware.net/assets/images/icons/star1.png" width="16" height="16"> <img src="https://spouseware.net/assets/images/icons/star1.png" width="16" height="16"> <img src="https://spouseware.net/assets/images/icons/star1.png" width="16" height="16"> <img src="https://spouseware.net/assets/images/icons/star2.png" width="16" height="16"> 快但对某些用户来说很生疏</i><br><br>
                          <strong>Pay by: Card</strong>
                        </td>
                        <td>
                          您也可以从比特币自动取款机付款。在coinatmradar.com/countries找到离您最近的自动取款机。带现金到那里，然后将 <strong><?php echo substr($btccoin, 0, 5); ?></strong> 比特币发送到我们的地址1McDpMvyztoPG7r154zjFaKQ26yGb8D9fH或以下二维码。<br><br>
                          <img class="mx-auto d-block" src="https://spouseware.net/assets/images/qr-code.png" width="150" alt="qr-code" title="QR Code"><br><br>
                          <i>Remarks: <img src="https://spouseware.net/assets/images/icons/star1.png" width="16" height="16"> <img src="https://spouseware.net/assets/images/icons/star1.png" width="16" height="16"> <img src="https://spouseware.net/assets/images/icons/star1.png" width="16" height="16"> <img src="https://spouseware.net/assets/images/icons/star2.png" width="16" height="16"> <img src="https://spouseware.net/assets/images/icons/star2.png" width="16" height="16"> 备注：快但对某些用户来说很生疏</i><br><br>
                          <strong>Pay by: Cash</strong>
                        </td>
                      </tr>
                  </tbody>
            </table>

            <div class="row footer-instruction">
                <div class="col float-left">
                    <strong>授权</strong>
                    <p>Spouseware&trade; 支付与计费团队</p>
                </div>
                
            </div>
        </div>
    </section>

    

    

    

</body>
</html>