<?php
   //Need to replace the last part of URL("your-vanityUrlPart") with your Testing/Live URL
    $formPostUrl = "https://sandbox.citruspay.com/sslperf/xxxxxxxx";	
    //Need to change with your Secret Key
    $secret_key = "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";	//Your secret key from merchant dashboard
    //Need to change with your Vanity URL Key from the citrus panel
    $vanityUrl = "xxxxxxxxxx"; // Your vanity URL stub created over merchant dashboard.
	$returnUrl = "http://localhost/citrus/php/citrusCheckout/result.php"; //Your callback URL
	$notifyUrl = "notify.html"; //your server notification URL
    //Should be unique for every transaction
    $merchantTxnId = uniqid(); 
    //Need to change with your Order Amount
    $orderAmount = "1.00"; //Fill your amount here
    $currency = "INR"; // Fill desired currency here
    $data= $vanityUrl.$orderAmount.$merchantTxnId.$currency; // TO be hashed in next line - salting taking place here
    $securitySignature = hash_hmac('sha1', $data, $secret_key);
?>


 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2//EN">
 <html>
     <head>
         <meta HTTP-EQUIV="Content-Type" CONTENT="text/html;CHARSET=iso-8859-1">
     </head>
     <body>
        <form align="center" method="post" action="<?php echo $formPostUrl;?>">
             <input type="hidden" id="merchantTxnId" name="merchantTxnId" value="<?php echo $merchantTxnId;?>" />
             <input type="hidden" id="orderAmount" name="orderAmount" value="<?php echo $orderAmount;?>" />
             <input type="hidden" id="currency" name="currency" value="<?php echo $currency;?>" />
             <input type="hidden" name="returnUrl" value="<?php echo $returnUrl;?>" />
             <input type="hidden" id="notifyUrl" name="notifyUrl" value="<?php echo $notifyUrl;?>" />
             <input type="hidden" id="secSignature" name="secSignature" value="<?php echo $securitySignature;?>" />
             <input type="Submit" value="Pay Now"/>
         </form>
     </body>
 </html>