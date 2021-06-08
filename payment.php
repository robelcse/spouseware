<?php

    ob_start();
?>

<?php

   include 'payment/class/Paypal.php';
   include 'payment/class/Westernunion.php';

//paypal information read from database

   $paypal = new Paypal();
   $paypal_data = $paypal->readDatafrompaypal();
   //var_dump($paypal_data);

//western union information read from databse

   $wu = new Westernunion();
   $wu_data = $wu->readDatafromwu();
   //var_dump($wu_data);









?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require 'vendor/autoload.php';
require_once 'currency-converter.php';
use Dompdf\Dompdf;
use Dompdf\Options;

$lineItem = "Spouseware™在线包";
$price = 300;
$btccoin = file_get_contents("https://blockchain.info/tobtc?currency=USD&value=300");

if (isset($_GET['package'])) {
    $package = $_GET['package'];

    if($package==1) {
        $lineItem = "Spouseware™在线包";
        $price = floor($usdTOyuan*300);
        $btccoin = file_get_contents("https://blockchain.info/tobtc?currency=USD&value=300");
    } elseif ($package==2) {
        $lineItem = "Spouseware™ App Pack";
        $price =  floor($usdTOyuan*400);
        $btccoin = file_get_contents("https://blockchain.info/tobtc?currency=USD&value=400");
    } else {
        $lineItem = "Spouseware™ Pro Pack";
        $price =  floor($usdTOyuan*500);
        $btccoin = file_get_contents("https://blockchain.info/tobtc?currency=USD&value=500");
    }
}


if(isset($_POST['download'])){
    $invoice = $_POST['invoice'];
    $dompdf = new Dompdf();
    $html = file_get_contents('https://spouseware.net/jp/invoice.php?invoice_no='.$invoice.'&package='.$package);
    $dompdf->loadHtml($html);
    $dompdf->set_paper('a4','landscape');
    $dompdf->set_option('isHtml5ParserEnabled', true);
    $dompdf->set_option('isRemoteEnabled', true);
    $dompdf->render();
    $dompdf->stream("dompdf_out.pdf", array("Attachment" => false));
    //$dompdf->stream();
    exit(0);
}
?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" lang="en" data-clp="clp-active">



<head>
    <meta charset="utf-8">
    <title>付款说明- Spouseware™</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="description" content="通过远程追踪您的孩子和家人的手机来保护他们，查看他们的社交媒体活动、gps位置、相机等">
    <meta name="keywords" content="电话追踪应用程序，在线追踪合作伙伴电话，手机黑客应用程序，侵入合作伙伴电话，追踪社交媒体合作伙伴">
    <meta name="author" content="Spouseware™">
    <link rel="canonical" href="https://spouseware.net/payment.php" />
    <link rel="alternate" hreflang="en" href="https://spouseware.net/payment.php">

    <!-- Spouseware Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/icons/favicon-16x16.png">
    <link rel="manifest" href="assets/images/icons/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i&display=swap&subset=cyrillic" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="canonical" href="payment.php" />
    <script asyn src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    
    
        <style type="text/css">
        
      /*@media print{*/

             /* Hide every other eleents */
      /*       body * {*/

      /*            visibility: hidden;*/
      /*       }*/

             /* Than displaying print container elements */

      /*       .payment-wrapper, .payment-wrapper * {*/

      /*             visibility: visible;*/
      /*       }*/
      /*   }*/
    </style>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-180445870-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-180445870-1');
    </script>

</head>

<body data-page-name='payment_page' class='payment-page ' data-country="GB">

    <header data-button-translate="BUY NOW" style="background: black" id="headerHide">
        <div class="wr wr-flex wr-flex-center wr-flex-space-between">
            <div class="l-side" style="height: 60px;">
                <a href="index.php" class="logo-box" data-ga-event="onClick" data-ga-group="Menu Top" data-ga-details="https://spouseware.net/">
                    <img src="logo.png" width="50" alt="spouseware" title="Spouseware™">
                </a>

                <div class="mobile-menu">
                    <nav class="nav-main" style="margin: 14px 0 0 20px;">
                        <div class="mobile-menu__info"></div>

                        <ul>
                            <li>
                                <a href="index.php#features" class="scroll" style="color:white"><span>特色</span></a>
                            </li>
                            <li>
                                <a href="index.php#how-it-works" class="scroll"  style="color:white"><span>如何运作</span></a>
                            </li>
                            <li>
                                <a href="index.php#price" class="scroll"  style="color:white"><span>价格</span></a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <div class="language-select">
                	<div class="language-select-button">
                		<svg id="Layer_1" height="512" viewBox="0 0 128 128" width="512" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"><path d="m12 27.751h104v72.497h-104z" fill="#d60a2e"/><g fill="#fed953"><path d="m29.33 40.976 3.645 7.386 8.15 1.184-5.898 5.749 1.393 8.118-7.29-3.833-7.291 3.833 1.393-8.118-5.898-5.749 8.15-1.184z"/><path d="m50.92 55.152 1.457 2.951 3.257.473-2.357 2.298.556 3.243-2.913-1.531-2.913 1.531.556-3.243-2.356-2.298 3.257-.473z"/><path d="m49.196 42.248 2.662 1.936 3.103-1.095-1.019 3.13 2.001 2.613-3.291-.002-1.868 2.71-1.015-3.131-3.154-.938 2.663-1.933z"/><path d="m44.927 33.343-.622 3.232 2.31 2.345-3.266.407-1.516 2.921-1.396-2.98-3.247-.54 2.403-2.249-.491-3.254 2.882 1.59z"/><path d="m44.927 66.456-.622 3.232 2.31 2.344-3.266.407-1.516 2.921-1.396-2.98-3.247-.539 2.403-2.249-.491-3.254 2.882 1.59z"/></g></svg>
                	</div>
    
                    <ul class="language-select-wr">
                        <li>
                            <a href="https://www.spouseware.net" data-site-protocol="https" data-site-domain="www.spouseware.net" data-site-page="/" data-ga-event="onClick" data-ga-group="Language Switch" data-ga-details="en" class="change-language">
                                <svg>
                                    <use xlink:href="flags.svg#icon-en"></use>
                                </svg>English
                            </a>
                        </li>
                        <li>
                            <a href="https://www.spouseware.net/jp/" data-site-protocol="https" data-site-domain="www.spouseware.net" data-site-page="/" data-ga-event="onClick" data-ga-group="Language Switch" data-ga-details="ja" class="change-language">
                                <svg>
                                <use xlink:href="flags.svg#icon-ja"></use>
                                </svg>Japanese
                            </a>
                        </li>
                        
                        <li>
                            <a href="https://www.spouseware.net/kr/" data-site-protocol="https" data-site-domain="www.spouseware.net" data-site-page="/" data-ga-event="onClick" data-ga-group="Language Switch" data-ga-details="ko" class="change-language">
                                <svg>
                                    <use xlink:href="flags.svg#icon-ko"></use>
                                </svg>Korean
                            </a>
                        </li>
                    </ul>
                </div>

                <a href="index.php#price" class="scroll buy-now-button buy-now-button--header" style="background: #7cb937;color:white">
                    <div class="span">
                        立即购买
                    </div>
                </a>
            </div>
            <div class="main-menu-button"><i></i><i></i><i></i></div>
        </div>

        <div class="scroll-up">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 46.001 46.001">
                <path d="M5.906 34.998a3.484 3.484 0 01-4.893 0 3.404 3.404 0 010-4.846l19.54-19.148a3.486 3.486 0 014.895 0l19.539 19.148a3.402 3.402 0 010 4.846 3.484 3.484 0 01-4.893 0L23 19.295 5.906 34.998z" fill="#fff" />
            </svg>
        </div>
    </header>

    <section id="printdata" class="payment-wrapper">
        <style type="text/css">
            .payment-wrapper .payment-header {
                margin-bottom: 50px;
            }
            .payment-wrapper .payment-table {
                margin-bottom: 15px;
            }
            .payment-wrapper .payment-instruction .footer-instruction {
                margin-top: 50px;
            }
            thead, tfoot {
                color: #89b82a;
                font-weight: bold;
            }
            .checked {
                color: #89b929;
            }
            .card {
                border: 1px solid #89b929;
            }
         .hidden {
            display:none;
        }
        </style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
        <div class="container payment-header">
            <div class="row">
                <div class="col">
                 <p><?php echo date("d M Y"); ?></p>
                </div>
                <div class="col">
                    <p class="text-center"><?php $invoice_no = rand(1111111111, 9999999999); echo $invoice_no; ?></p>
                    <img class="barcode mx-auto d-block" src="assets/images/barcode.png" alt="barcode" title="Spouseware™ Barcode" width="115">
                </div>
                <div class="col">
                    <div class="float-left">
                        <p>Spouseware&trade;Cears<br>Technology Ltd</p>
                        <strong>www.spouseware.net</strong>
                        <p>support@spouseware.net</p>
                    </div>
                    <div class="float-right">
                        <img src="logo.png" width="100" alt="spouseware" title="Spouseware™">
                    </div>
                </div>
            </div>
        </div>
        <div class="container payment-table">
            <div class="table-responsive">
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
                            <td>¥<?php echo $price; ?></td>
                        </tr>
                        <tr>
                            <td>小计</td>
                            <td></td>
                            <td>¥<?php echo $price; ?></td>
                        </tr>
                        <tr>
                            <td>增值税</td>
                            <td></td>
                            <td>¥0</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>总计</th>
                            <th></th>
                            <th>¥<?php echo $price; ?></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <div class="container payment-instruction">
            <h4>付款选项和说明</h4>
            <p>我们确保您的匿名支付，Spouseware™ 将无法追踪到您的交易。请按照以下说明，使用信用卡、礼物卡、比特币、PayPal支付：</p>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header text-center">付款方式1： 礼物卡 <img class="mx-auto" src="assets/images/wechat-logo.png" width="75" alt="wechat" title="WeChat Pay"></div>
                        <div class="card-body text-center">请送价值 ¥<?php echo $price; ?> 的礼物<br><br>
                        <img class="mx-auto d-block" src="assets/images/wechat.png" width="200" alt="wechat" title="WeChat Pay"><br>
                        <img class="mx-auto d-block" src="assets/images/wechat-qr-code.png" width="200" alt="wechat" title="WeChat Pay">
                        <br>将微信支付交易转发至 <a href = "mailto:support@spouseware.net">support@spouseware.net</a><br><br>
                        <i>备注： <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span> 快的，熟悉的，好上手的。</i>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <div class="card-header text-center"> 付款方式2： 比特币 <img class="mx-auto" src="assets/images/wu.png" width="90" alt="bitcoin" title="We accept bitcoin"></div>
                        <div class="card-body">在 <a href="https://location.westernunion.com/" target="_blank">locations.westernunion.com</a> 上访问您附近的商店，发送 <strong>¥<?php echo $price; ?></strong> (相当于BDT)至您的收款人。<br><br>
                        <strong style="font-style: italic">
                            Full Name: <?php echo $wu_data['fullname']; ?><br>
                            Address: <?php echo $wu_data['address']; ?><br>
                            City/State: <?php echo $wu_data['state']; ?><br>
                            Postcode: <?php echo $wu_data['postcode']; ?><br>
                            Country: <?php echo $wu_data['country']; ?><br>
                            Tel: <?php echo $wu_data['tel']; ?>
                        </strong><br>
                        <br>给我们发一张完整的收据照片 <a href = "mailto:support@spouseware.net">support@spouseware.net</a><br><br>
                        <i>备注： <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>迅速，但需要3到5个小时</i>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-header text-center">付款方式3: 比特币  <img class="mx-auto" src="assets/images/bitcoin.png" width="75" alt="bitcoin" title="We accept bitcoin"></div>
                        <div class="card-body">访问 <a href="https://buy.coingate.com/" target="_blank">https://buy.coingate.com.</a> 选择 Yuan，输入<strong>¥<?php echo $price; ?></strong>。然后输入比特币地址1McDpMvyztoPG7r154zjFaKQ26yGb8D9fH并结算。您也可以从 <a href="https://paybis.com/" target="_blank">paybis.com</a>. 或者 <a href="http://bitpay.com/" target="_blank">bitpay.com</a>. 或者 <a href="https://buy.chainbits.com/" target="_blank">buy.chainbits.com</a> 或者其他诸多公司付款。将比特币交易的屏幕截图发送至 <a href = "mailto:support@spouseware.net">support@spouseware.net</a><br><br><img class="mx-auto d-block" src="assets/images/qr-code.png" width="150" alt="qr-code" title="QR Code"><br>
                        <i>备注：<span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span> 快但对某些用户来讲很生疏</i>
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="row footer-instruction">
                <div class="col-12">
                    <strong>授权:</strong>
                    <p>Spouseware&trade;支付与计费团队<br>联系技术支持：support@spouseware.net</p>
                    <span class="float-left">
                        <!--<form method="post" target="_blank">-->
                        <!--    <input name="invoice" type="hidden" value="<?php echo $invoice_no; ?>">-->
                        <!--    <button name="download" type="submit">下载发票</button>-->
                        <!--</form>-->
                        <button id="printButton"  onclick="generatePdf()">下载发票</button>
                    </span> 
                    
                    
                </div>
                
            </div>
        </div>
    </section>

    

    <footer style="background: black;position: absolute;width: 100%;color: white" id="footerHide">
        <div class="wr">
            <div class="m-side">
                <div class="col">
                     <ul class="">
                        <li><a href="index.php">Spouseware&trade;</a></li>
                        <li><a href="terms-of-use.html">使用条款</a></li>
                        <li><a href="privacy-policy.html">隐私政策</a></li>
                        <li><a href="refund-policy.html">退款政策</a></li>
                        <li><a href="https://blog.spouseware.net/" target="_blank">Blog</a></li>
                    </ul>
                </div>
                <div class="col">
                    <div class="f-title">
                       特色
                    </div>
                    <ul class="logo-list-2">
                        <li>
                            <a href="https://www.bbc.com/news/technology-50166147" target="_blank">
                                <img class="b-lazy" width="194" height="50" src="bbc.png" data-src="bbc.png" alt="bbc" title="BBC">
                            </a>
                        </li>
                        <li>
                            <a href="https://www.forbes.com/sites/thomasbrewster/2017/02/16/government-iphone-android-spyware-is-the-same-as-seedy-spouseware/#409e4e83455c" target="_blank" rel="nofollow">
                                <img class="b-lazy" width="150" height="100" src="forbes.png" data-src="forbes.png" alt="forbes" title="Forbes" style="max-width: 120px;">
                            </a>
                        </li>
                        <li>
                            <a href="https://finance.yahoo.com/news/stalkerware-technology-made-easy-abusive-200056821.html" target="_blank" rel="nofollow">
                                <img class="b-lazy" width="150" height="100" src="yahoo.png" data-src="yahoo.png" alt="yahoo" title="Yahoo" style="max-width: 120px;">
                            </a>
                        </li>
                        <li>
                            <a href="https://www.trustpilot.com/review/spouseware.net" target="_blank" rel="nofollow">
                                <img class="b-lazy" width="150" height="100" src="../assets/images/trustpilot.png" data-src="../assets/images/trustpilot.png" alt="trustpilot" title="TrustPilot" style="max-width: 120px;">
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col">
                    <div class="f-title">
                       社交
                    </div>
                    <ul class="social-links">
                        <li><a href="https://www.facebook.com/spouseware" title="FaceBook" data-ga-event="onClick" data-ga-group="Social" data-ga-details="facebook" target="_blank" rel="nofollow"><i class="fab fa-facebook"></i></a></li>
                        <li><a href="https://www.linkedin.com/company/spouseware/" title="LinkedIn" rel="nofollow" target="_blank" data-ga-event="onClick" data-ga-group="Social" data-ga-details="linkedin"><i class="fab fa-linkedin"></i></a></li>
                        <li><a href="https://twitter.com/spouseware" title="Twitter" rel="nofollow" target="_blank" data-ga-event="onClick" data-ga-group="Social" data-ga-details="twitter"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="https://www.youtube.com/channel/UClZzAwqjcQUiZm1-zw9TVJw" title="YouTube" rel="nofollow" target="_blank" data-ga-event="onClick" data-ga-group="Social" data-ga-details="youtube"><i class="fab fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>

            <div class="b-side">
                <div class="copyrights">
                    &copy; <?php echo date('Y') ?> <a href="https://spouseware.net/">Spouseware™</a> | 版权所有<br><br>
                    <p>支持联系人：<a href = "mailto:support@spouseware.net">support@spouseware.net</a></p>
                </div>
            </div>
        </div>
    </footer>

    <script>
        window.localisation = 'GB';
        window.localeLanguage = 'en';
    </script>

    
    <script src="spouseware.js"></script>

    <script>
            function generatePdf() {
                 document.getElementById("footerHide").style.display = "none";
                 document.getElementById("headerHide").style.display = "none";
                $('#printButton').addClass('hidden');
                var printContents = document.getElementById('printdata').innerHTML;
                var originalContents = document.body.innerHTML;
                document.body.innerHTML = printContents;
                window.print();
                document.body.innerHTML = originalContents;
                setInterval(function(){ 
                    $('#printButton').removeClass('hidden');
                    document.getElementById("footerHide").style.display = "block";
                    document.getElementById("headerHide").style.display = "block";
                    
                },1000);
            }
            
            
            
    // function generatePdf(){
 


            
    //         window.print();
    //         //document.getElementById('printButton').style.display = 'none';
    //       // document.getElementById('printButton').style.display = 'block';


    //  }
    

        $('.scroll').click(function() {
            if($('.main-menu-button').hasClass('open')) {
                $('.main-menu-button').removeClass('open');
                $('body').removeClass('mobile-menu-open');
            }
        });

        // handle links with @href started with '#' only
        $(document).on('click', '.scroll', function(e) {
            // target element id
            var id = $(this).attr('href');

            // target element
            var $id = $(id);
            if ($id.length === 0) {
                return;
            }

            // prevent standard hash navigation (avoid blinking in IE)
            e.preventDefault();

            // top position relative to the document
            var pos = $id.offset().top;

            // animated top scrolling
            $('body, html').animate({scrollTop: pos});
        });
    </script>
    

</body>
</html>