<?php

   include 'class/Paypal.php';
   include 'class/Westernunion.php';


   $paypal = new Paypal();
   $paypal_data = $paypal->readDatafrompaypal();
   //var_dump($paypal_data);

   if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['payupdate'])) {

        $fname     = $_POST['fname'];
        $lname     = $_POST['lname'];
        $address   = $_POST['address'];
        $district  = $_POST['district'];
        $division  = $_POST['division'];
        $phone     = $_POST['phone'];

        $Updatepaymentinfo = $paypal->updatepaymentinfo($fname,$lname,$address,$district,$division,$phone);


    }//

  
   $wu = new Westernunion();
   $wu_data = $wu->readDatafromwu();
   //var_dump($wu_data);


    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['wubtn'])) {


        $fullname     = $_POST['fullname'];
        $address      = $_POST['address'];
        $state        = $_POST['state'];
        $postcode     = $_POST['postcode'];
        $country      = $_POST['country'];
        $tel          = $_POST['tel'];

        $Updatewuinfo = $wu->updatewuinfo($fullname,$address,$state,$postcode,$country,$tel);
    }//
  



?>

 

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update payment information</title>
  <meta charset="utf-8">
   <link rel="icon" type="image/png" sizes="32x32" href="https://www.spouseware.net/assets/images/icons/apple-touch-icon.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css"> 
</head>
<body>
 
<div class="container">
    <div class="row">
         <div class="col-md-8 col-lg-8 col-md-offset-2">
             <div class="panel panel-default">
                <div class="panel-heading">
                     <div class="row">
                          <div class="col-md-12">
                              <h3>Update payment information</h3>
                          </div>
                     </div>
                </div>
                <div class="panel-body">
                     <div class="row">
                          <div class="col-md-12">
                             <div class="active-btn">
                                <ul class="nav nav-tabs">
                                   <li class="active"><a id="ac-link" data-toggle="tab" href="#home"><img src="img/paypal.png" alt="image" height="50px" width="50px"></a></li>
                                   <li><a data-toggle="tab" href="#menu1"><img src="img/wu.png" alt="image" height="50px" width="50px"></a></li>
                                </ul> 
                              </div>
                            </div>
                      </div>

            <div class="row">
               <div class="tab-content">
                <?php
 
                      if (isset($Updatepaymentinfo)) {
                          
                           echo $Updatepaymentinfo;
                      }
                      if (isset($Updatewuinfo)) {
                          
                           echo $Updatewuinfo;
                      }

                ?>
                <!--paypal form section-->
                  <div id="home" class="tab-pane fade in active">
                      <form action="" method="post">
                          <div class="form-group">
                            <label for="fname">First name:</label>
                            <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $paypal_data['fname']; ?>">
                          </div>
                          <div class="form-group">
                            <label for="lname">Last name:</label>
                            <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $paypal_data['lname']; ?>">
                          </div>
                           <div class="form-group">
                            <label for="address">Address:</label>
                            <input type="text" class="form-control" id="address" name="address" value="<?php echo $paypal_data['address']; ?>">
                          </div>
                          <div class="form-group">
                            <label for="lname">District:</label>
                            <input type="text" class="form-control" id="district" name="district" value="<?php echo $paypal_data['district']; ?>"> 
                          </div>
                          <div class="form-group">
                            <label for="lname">Division:</label>
                            <input type="text" class="form-control" id="division" name="division" value="<?php echo $paypal_data['division']; ?>">
                          </div>
                           <div class="form-group">
                            <label for="lname">Phone:</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $paypal_data['phone']; ?>">
                          </div>
                         <div class="form-group">
                            <input type="submit" class="btn btn-info" name="payupdate" value="Update Paypal">
                        </div>
                    </form>
                </div>
                <!--//paypal form section end-->
                <!--western union form section-->
                 <div id="menu1" class="tab-pane fade">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="fname">Full name:</label>
                            <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $wu_data['fullname']; ?>">
                        </div>
                        <div class="form-group">
                           <label for="lname">Address:</label>
                           <input type="text" class="form-control" id="address" name="address" value="<?php echo $wu_data['address']; ?>">
                        </div>
                        <div class="form-group">
                           <label for="lname">City/State:</label>
                           <input type="text" class="form-control" id="state" name="state" value="<?php echo $wu_data['state']; ?>">
                        </div>
                        <div class="form-group">
                           <label for="lname">Postcode:</label>
                           <input type="text" class="form-control" id="postcode" name="postcode" value="<?php echo $wu_data['postcode']; ?>">
                        </div>
                         <div class="form-group">
                            <label for="lname">Country:</label>
                            <input type="text" class="form-control" id="country" name="country" value="<?php echo $wu_data['country']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="lname">Tel:</label>
                            <input type="text" class="form-control" id="tel" name="tel" value="<?php echo $wu_data['tel']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-danger" name="wubtn" value="Update WU">
                        </div>
                   </form>
                </div>
                <!--western union form section end-->
            </div>
         </div>
        </div>
      </div>
      </div>
   </div>
</div>
</body>
</html>
