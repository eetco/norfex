<?php 
	// Layer of abstraction
		
	require_once("Parameters.php");
	require_once("ClassOrder.php");
	require_once("ClassTerminal.php");
	require_once("ClassRegisterRequest.php");
	require_once("ClassEnvironment.php");
	
	
	switch ($payment_mehtod_sender) {

    	case 'FSPA' :
   			$payment_mehtod = 'SwedishBankSwedbank';
		break;

   		case 'NORDEASE':
   			$payment_mehtod = 'SwedishBankNordea';
		break;

		case 'SEBPRV' :
   			$payment_mehtod = 'SwedishBankSEB';
		break;

		case 'SHB':
   			$payment_mehtod = 'SwedishBankHandelsbanken';
		break;

   		default :
    	
		break;
   }
	

	####  PARAMETERS IN ORDER  ####
	// The amount described as the lowest monetary unit, example: 100,00 NOK is noted as "10000", 9.99 USD is noted as "999".	
	$amount               = $amount_sender*100; 
	$currencyCode         = "SEK";  //The currency code, following ISO 4217. Typical examples include "NOK" and "USD".
	$force3DSecure        = null;   // Optional parameter
	$orderNumber          = $order_id;
	$UpdateStoredPaymentInfo = null;


	####  PARAMETERS IN Environment  ####
	$Language             = null; // Optional parameter
	$OS                   = null; // Optional parameter
	$WebServicePlatform   = 'PHP5'; // Required (for Web Services)

	####  PARAMETERS IN TERMINAL  ####
	$autoAuth             = null; // Optional parameter
	$paymentMethodList    = $payment_mehtod; // Optional parameter
	$language             = null; // Optional parameter
	$orderDescription     = null; // Optional parameter
	$redirectOnError      = null; // Optional parameter

	####  PARAMETERS IN REGISTER REQUEST  ####
	$AvtaleGiro           = null; // Optional parameter
	$CardInfo             = null; // Optional parameter
	$Customer             = null; // Optional parameter
	$description          = null; // Optional parameter
	$DnBNorDirectPayment  = null; // Optional parameter
	$Environment          = null; // Optional parameter
	$MicroPayment         = null; // Optional parameter
	$serviceType          = null; // Optional parameter: null ==> default = "B" <=> BBS HOSTED
	$Recurring            = null; // Optional parameter
	$transactionId        = null; // Optional parameter
	$transactionReconRef  = null; // Optional parameter

	####  ENVIRONMENT OBJECT  ####
	$Environment = new Environment(
	  $Language           ,
	  $OS                 ,
	  $WebServicePlatform 
	);

	####  TERMINAL OBJECT  ####
	$Terminal = new Terminal(
	  $autoAuth,
	  $paymentMethodList,
	  $language,
	  $orderDescription,
	  $redirectOnError,
	  $redirect_url
	);

	$ArrayOfItem = null; // no goods for Klana ==> normal transaction
	####  ORDER OBJECT  ####
	$Order = new Order(
	  $amount,
	  $currencyCode,
	  $force3DSecure,
	  $ArrayOfItem,
	  $orderNumber,
	  $UpdateStoredPaymentInfo
	);


	####  START REGISTER REQUEST  ####
	$RegisterRequest = new RegisterRequest(
	  $AvtaleGiro,
	  $CardInfo,
	  $Customer,
	  $description,
	  $DnBNorDirectPayment,
	  $Environment,
	  $MicroPayment,
	  $Order,
	  $Recurring,
	  $serviceType,
	  $Terminal,
	  $transactionId,
	  $transactionReconRef
	);


	####  ARRAY WITH REGISTER PARAMETERS  ####
	$InputParametersOfRegister = array
	(
	        "token"                 => $token,
	        "merchantId"            => $merchantId,
	        "request"               => $RegisterRequest
	);


	####  Display all parameters  ####
	/*
	echo "<h3><font color='gray'>Input parameters:</font></h3>";

	echo "merchantId= " . $merchantId . "<br/>";
	echo "token= " . $token . "<br/>";

	echo "amount= " . $amount . "<br/>";
	echo "currencyCode= " . $currencyCode . "<br/>";
	echo "orderNumber= " . $orderNumber . "<br/>";
	echo "redirect_url= " . $redirect_url . "<br/>";
	*/
	/*
	  // you can also display this way
	  echo "<br/>Parameters in RegisterRequest<br/>"; 
	  echo "<pre>"; 
	  echo print_r($InputParametersOfRegister); 
	  echo "</pre>";
	*/
	

	####  START REGISTER CALL  ####
	try 
	{
	  if (strpos($_SERVER["HTTP_HOST"], 'uapp') > 0)
	  {
	  	// Creating new client having proxy
	  	$client = new SoapClient($wsdl, array('proxy_host' => "isa4", 'proxy_port' => 8080, 'trace' => true,'exceptions' => true));
	  }
	  else
	  {
	  	// Creating new client without proxy
	  	$client = new SoapClient($wsdl, array('trace' => true,'exceptions' => true ));
	  }

	  $OutputParametersOfRegister = $client->__call('Register' , array("parameters"=>$InputParametersOfRegister));

	  // RegisterResult
	  $RegisterResult = $OutputParametersOfRegister->RegisterResult; 

	  $terminal_parameters = "?merchantId=". $merchantId . "&transactionId=" .  $RegisterResult->TransactionId;  
	  $process_parameters = "?transactionId=" .  $RegisterResult->TransactionId;  

	  // No need to display this
	  // echo "<h3><font color='gray'>Output parameters:</font></h3>";

	  // echo "TransactionId= " . $RegisterResult->TransactionId . "<br/>";

	/*
	  // you can also display this way
	  echo "<br/>Parameters in RegisterResult<br/>"; 
	  echo "<pre>"; 
	  echo print_r($RegisterResult); 
	  echo "</pre>";
	*/
	
	$Amount_string = $amount / 100; 
	$Customer_refno = $order_id;	
 	
/*	
	echo "<p>";
	echo $lang['AURIGA_TEXT_PART_ONE']." $Amount_string ".$lang['AURIGA_TEXT_PART_TWO']." $Customer_refno ".$lang['AURIGA_TEXT_PART_THREE'];
	echo "</p>";
	echo "<p>";
	echo $lang['AURIGA_TEXT_PART_FOUR'];
	echo "</p>";
	echo "<p>";
	echo $lang['AURIGA_TEXT_PART_FIVE'];
	echo "</p>";
	echo "<p>";
	echo $lang['AURIGA_TEXT_PART_SIX'];
	echo "</p>";
	echo "<p>";
	echo $lang['AURIGA_TEXT_PART_SEVEN'];
	echo "</p>";
	echo "<p> <img src='../../template/img/nitso_logo.gif' alt='Nordic IT Solutions' /> </p>";
*/	
	
?>	

<p> <?php echo $lang['AURIGA_TEXT_PART_ONE']." $Amount_string ".$lang['AURIGA_TEXT_PART_TWO']." $Customer_refno ".$lang['AURIGA_TEXT_PART_THREE'];?> </p>
<p> <?php echo $lang['AURIGA_TEXT_PART_FOUR']; ?> </p>
<p> <?php echo $lang['AURIGA_TEXT_PART_FIVE']; ?> </p>
<p> <?php echo $lang['AURIGA_TEXT_PART_SIX']; ?> </p>
<p> <?php echo $lang['AURIGA_TEXT_PART_SEVEN']; ?> </p>
<p> <img src="../../template/img/nitso_logo.gif" alt="Nordic IT Solutions" /> </p>
<p> <?php //echo $wizard->getValue('query_insert'); ?> </p>
	<table border="0" cellspacing="5" cellpadding="5">
		<tr>
			<td>
				<form method='post' action="<?php echo "$terminal$terminal_parameters" ?>">
					<input name="submitter" type='submit' value="<?php echo $lang['PAY_NOW']; ?>">
				</form>				
			</td>	
		</tr>
	</table>

<?php

	}
	
	catch (SoapFault $fault) 
	{
	  // Printing errors from the communication
	  echo "<h3><a href='nets.php'>norfex</a><h3>";
	  echo "<h3><font color='red'>EXCEPTION IN REGISTER CALL:</font></h3>";
	  echo "<pre>"; 
	  print_r($fault);
	  echo "</pre>";
	}
		
	####  END   REGISTER CALL  ####		
	
?>