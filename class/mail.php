<?php


include_once 'Database.php';
  

class Mail {
    
    public $email;
    public $qty=1;
    public $price;
    public $subtotal;
    public $vat=0;
    public $total;
    public $deposit;
    public $payafterwork;
    
    public $package;
    public $subject;
    private $db;
    public $invoice_no; 
    
   
  function __construct($email, $price, $subtotal, $total, $deposit, $payafterwork, $package, $subject, $invoice_no) {
     
      $this->email = $email;
      $this->price = $price;
      $this->subtotal = $subtotal;
      $this->total = $total;
      $this->deposit = $deposit;
      $this->payafterwork = $payafterwork;
      $this->package = $package;
      $this->subject = $subject;
      $this->invoice_no = $invoice_no;
      
      $this->db = new Database();
      $this->sendEmailTouser();
      $this->store_email();
      
      
      
  }
  
  
  
  
  
  public function store_email(){
      
        $email = $this->email;
        $invoice_no = $this->invoice_no;
        $sql = "INSERT INTO projects(email,invoice) VALUES('$email', '$invoice_no')";
        $this->db->insert($sql);
  }
  
  
  
  public function sendEmailTouser(){
      
        $email = $this->email;
        $to      = $email;
        $subject = $this->subject;
         
       
        $price = $this->price;
        $package = $this->package;
        $total = $this->total;
        $subtotal = $this->subtotal;
        $deposit = $this->deposit;
        //$payafterwork = $this->payafterwork;
        $payafterwork = ($price-$deposit);
        
        $date = date("d M Y");
        
        $invoice_no = $this->invoice_no;

          
        
         
         
          
          
           
        /***********************header start*******************************/           
                 
        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
         
        // Create email headers
        $headers .= 'From: Spouseware <support@spouseware.net>'."\r\n".
            'Reply-To: support@spouseware.net' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
         
         
        /***********************header end*******************************/    

$message ='<section id="printdata" class="payment-wrapper">
        <style>
        
                .payment-option-image{
                        width:100%;
                        display:inline-block;
                    }
                    .bitcoin-image{
                        width:100%;
                        display:inline-block;
                    }
                        
                @media (min-width:300px) and (max-width:400px)
                {
                    .payment-option-image{
                        width:335px;
                        display:inline-block;
                    }
                    .bitcoin-image{
                        width:380px;
                        display:inline-block;
                    }
                    
                }
            </style>
     



<div style="width: 80%; margin: 0 auto;margin-bottom: 20px;background:#f8f9fa;">
    <table class="table" style="width: 100%; max-width: 100%; margin-bottom: 1rem;">
        <tr>
            <td align="center" style="padding: 10px;">
                <p>'.$invoice_no.'</p>
                <img width="60" src="https://www.hakerlist.co/wp-content/themes/hackerslist/images/barcode.png" alt="barcode" title="HL Barcode">
                <p>Date: '.$date.'</p>
            </td>
            <td align="center" style="padding: 10px;">
                <div style="text-align: center;">
                    <p style="margin-bottom:0;">Spouseware???Cears<br>Technology Ltd</p>
                    <p style="margin-top:0;margin-bottom:0;"><a href="https://www.spouseware.net/" target="_blank">www.spouseware.net</a></p>
                    <p style="margin-top:0;margin-bottom:0;"><a style="color:#000000;" href="mailto:support@spouseware.net">support@spouseware.net</a></p>
                    <p style="margin-top:0;">ABN: 954 673 652</p>
                </div>
            </td>
            <td align="center" style="padding: 10px;">
                <img src="https://spouseware.net/logo.png" width="60" alt="logo" title="HackersList" style="padding-top: 5px;margin:0 auto;">
            </td>
        </tr>
    </table>
</div>


<div style="width: 80%; margin: 0 auto;margin-bottom: 10px;">
        <table class="table table-hover" style="width: 100%; max-width: 100%; margin-bottom: 1rem;">
            <thead style="color: #7cb937;">
                <tr style="text-align:left;">
                    <th style="vertical-align: bottom; border-bottom: 1px solid #eceeef;border-top: 1px solid #eceeef;padding: 0.75rem;">????????????</th>
                    <th style="vertical-align: bottom; border-bottom: 1px solid #eceeef;border-top: 1px solid #eceeef;padding: 0.75rem;">??????</th>
                    <th style="vertical-align: bottom; border-bottom: 1px solid #eceeef;border-top: 1px solid #eceeef;padding: 0.75rem;">??????</th>
                </tr>
            </thead>

            <tbody>
                <tr style="text-align:left;">
                    <td style="padding: 0.75rem; vertical-align: top; border-top: 1px solid #eceeef;">'.$package.'</td>
                    <td style="padding: 0.75rem; vertical-align: top; border-top: 1px solid #eceeef;">01</td>
                    <td style="padding: 0.75rem; vertical-align: top; border-top: 1px solid #eceeef;">??'.$price.'</td>
                </tr>
                <tr style="text-align:left;">
                    <td style="padding: 0.75rem; vertical-align: top; border-top: 1px solid #eceeef;">??????</td>
                    <td style="padding: 0.75rem; vertical-align: top; border-top: 1px solid #eceeef;"></td>
                    <td style="padding: 0.75rem; vertical-align: top; border-top: 1px solid #eceeef;">??'.$subtotal.'</td>
                </tr>
                <tr style="text-align:left;">
                    <td style="padding: 0.75rem; vertical-align: top; border-top: 1px solid #eceeef;">?????????</td>
                    <td style="padding: 0.75rem; vertical-align: top; border-top: 1px solid #eceeef;"></td>
                    <td style="padding: 0.75rem; vertical-align: top; border-top: 1px solid #eceeef;">??0</td>
                </tr>
                <tr style="text-align:left;">
                    <td style="vertical-align: bottom; border-bottom: 1px solid #eceeef;border-top: 1px solid #eceeef;padding: 0.75rem;">?????????</td>
                    <td style="vertical-align: bottom; border-bottom: 1px solid #eceeef;border-top: 1px solid #eceeef;padding: 0.75rem;"></td>
                    <td style="vertical-align: bottom; border-bottom: 1px solid #eceeef;border-top: 1px solid #eceeef;padding: 0.75rem;">??'.$total.'</td>
                </tr>
            </tbody>

            <tfoot style="color: #7cb937;">
                <tr style="text-align:left;">
                    <th style="vertical-align: bottom; border-bottom: 1px solid #eceeef;border-top: 1px solid #eceeef;padding: 0.75rem;">??????</th>
                    <th style="vertical-align: bottom; border-bottom: 1px solid #eceeef;border-top: 1px solid #eceeef;padding: 0.75rem;"></th>
                    <th style="vertical-align: bottom; border-bottom: 1px solid #eceeef;border-top: 1px solid #eceeef;padding: 0.75rem;">??'.$deposit.'</th>
                </tr>
                <tr style="text-align:left;">
                    <th style="vertical-align: bottom; border-bottom: 1px solid #eceeef;border-top: 1px solid #eceeef;padding: 0.75rem;">???????????????</th>
                    <th style="vertical-align: bottom; border-bottom: 1px solid #eceeef;border-top: 1px solid #eceeef;padding: 0.75rem;"></th>
                    <th style="vertical-align: bottom; border-bottom: 1px solid #eceeef;border-top: 1px solid #eceeef;padding: 0.75rem;">??'.$payafterwork.'</th>
                </tr>
            </tfoot>
        </table>
    </div>

    <div style="width: 50%; margin: 0 auto; border: 1px solid #7cb937;">
        <h2 style="color: #7cb937;text-align:center;text-decoration: none;">???????????? ??'. $deposit.'</h2>
    </div>

    <div style="width: 80%; margin: 0 auto;margin-bottom: 20px;">
        <div style="padding:10px 0;color: #000;" align="center">
            <h3 style="color: #000;">?????????????????????</h3>
            <p>?????????????????????????????????Spouseware??? ???????????????????????????????????????????????????????????????????????????????????????????????????PayPal?????????</p>
        </div>

        <div style="margin-bottom: 35px;">
            <div style=" background: #7cb937;">
               <img src="https://www.hakerlist.co/payment/img/chinese/option-1.png" class="payment-option-image" width="100%">
            </div>
            <div>
                <p>???????????? <strong>??'.$deposit.'</strong> ?????????
                <br/>
                
                 <img src="https://www.hakerlist.co/cn/wp-content/themes/hackerslist/assets/images/we-chat-bg-less.png"   width="350" height="350" style"float:left;"/>
                
                <img src="https://www.hakerlist.co/cn/wp-content/themes/hackerslist/assets/images/wechat-qr-code.jpeg"  width="350" height="350"/> <br><br>

                <p>?????????????????????????????? <a href="mailto:support@spouseware.net">support@spouseware.net</a></p>
                <i>??????: <img src="https://www.spouseware.net/assets/images/icons/star1.png" width="16" height="16"> <img src="https://www.spouseware.net/assets/images/icons/star1.png" width="16" height="16"> <img src="https://www.spouseware.net/assets/images/icons/star1.png" width="16" height="16"> <img src="https://www.spouseware.net/assets/images/icons/star1.png" width="16" height="16"> <img src="https://www.spouseware.net/assets/images/icons/star1.png" width="16" height="16"> ????????????????????????????????????</i><br><br>
                <strong>????????????: WeChat Pay</strong></p>
            </div>
        </div>

        <div style="margin-bottom: 35px;" class="payment-option-two">
            <div style="background: #7cb937">
               <img src="https://www.spouseware.net/payment/img/english/option-2.png" class="payment-option-image" width="100%">
            </div>
            <div>
                <p>??? <a href="https://location.westernunion.com/" target="_blank">locations.westernunion.com</a> ???????????????????????????????????? <strong>??'.$deposit.' </strong> (?????????BDT)?????????????????????<br><br>

                <strong style="font-style: italic">
                    Full Name: RAKIB HASAN <br>
                    Address: 100 Link Road Badda <br>
                    City/State: Dhaka <br>
                    Postcode: 1212 <br>
                    Country: Bangladesh <br>
                    Tel: +8801795322772
                </strong>  
                
                <br><br>
               ??????????????????????????????????????? <a href ="mailto:support@spouseware.net">support@spouseware.net</a>
                <br><br><i>?????????<img src="https://www.spouseware.net/assets/images/icons/star1.png" width="16" height="16"> <img src="https://www.spouseware.net/assets/images/icons/star1.png" width="16" height="16"> <img src="https://www.spouseware.net/assets/images/icons/star1.png" width="16" height="16"> <img src="https://www.spouseware.net/assets/images/icons/star1.png" width="16" height="16"> <img src="https://www.spouseware.net/assets/images/icons/star2.png" width="16" height="16"> ??????????????????3???5?????????</i><br><br>
                <strong>????????????: westernunion</strong></p>
            </div>
        </div>

        <div style="margin-bottom: 35px;" class="payment-option-three">
            
             <div style="background: #7cb937">
               <img src="https://www.spouseware.net/payment/img/english/option-3.png" class="bitcoin-image" width="100%">
            </div>
            <div>
                <p>?????? <a href="https://buy.coingate.com/" target="_blank">https://buy.coingate.com.</a> ?????? Yuan????????? <strong>??'.$deposit.'</strong> ??????????????????????????????1McDpMvyztoPG7r154zjFaKQ26yGb8D9fH??????????????????????????? <a href="https://paybis.com/" target="_blank">paybis.com</a>. ?????? <a href="http://bitpay.com/" target="_blank">bitpay.com</a>. ?????? <a href="https://buy.chainbits.com/" target="_blank">buy.chainbits.com</a> ??????????????????????????????????????????????????????????????????????????? <a href ="mailto:support@spouseware.net">support@spouseware.net</a>
                <br><br>
                <img class="mx-auto d-block" src="https://www.hakerlist.co/wp-content/themes/hackerslist/images/qr-code.png" width="150" alt="qr-code" title="QR Code"><br><br>
                <i>?????????<img src="https://spouseware.net/assets/images/icons/star1.png" width="16" height="16"> <img src="https://spouseware.net/assets/images/icons/star1.png" width="16" height="16"> <img src="https://spouseware.net/assets/images/icons/star1.png" width="16" height="16"> <img src="https://spouseware.net/assets/images/icons/star2.png" width="16" height="16"> <img src="https://spouseware.net/assets/images/icons/star2.png" width="16" height="16"> ????????????????????????????????????</i><br><br>
                <strong>????????????: Bitcoin</strong></p>

            </div>
        </div>
        <hr>
        <div style="background:#7cb937; padding:10px;color:#FFF;">
            <strong>??????:</strong>
            <p>Spouseware&trade;?????????????????????<br>?????????????????????<a href="mailto:support@spouseware.net">support@spouseware.net</a></p>
        </div>
    </div>
</section>';




          mail($to, $subject, $message, $headers);
          
        //   if($this->package==1) {
              
        //         $url  = $_SERVER['REQUEST_URI']; 
        //         header('Location: '.$url);
              
        //      // header('Location: https://www.spouseware.net/payment2.php?package=1');
              
        //   }elseif ($this->package==2){
              
        //       $url  = $_SERVER['REQUEST_URI']; 
        //       header('Location: '.$url);
              
        //      // header('Location: https://www.spouseware.net/payment2.php?package=2');
              
        //   }elseif ($this->package==3){
              
        //       $url  = $_SERVER['REQUEST_URI']; 
        //       header('Location: '.$url);
              
        //       //header('Location: https://www.spouseware.net/payment2.php?package=3');
              
        //   }
          
         
  }
  
  
   
}//end method

 
?>