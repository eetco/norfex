<?php

// MerchantId provided by Netaxept
$merchantId = "511809"; 

// Token provided by Netaxept
$token = "s?9ZEq=7"; 

// WSDL location found in documentation
$wsdl="https://test.epayment.nets.eu/Netaxept.svc?wsdl";

//echo $wsdl;
// Redirect from Netaxept to your site
$path_parts = pathinfo($_SERVER["PHP_SELF"]);
// this is an example is showing how to add one (or several additional parameters on the terminal)
// $redirect_url = "http://" . $_SERVER["HTTP_HOST"] . $path_parts['dirname'] . "/Process.php?webshopParameter=1234567";
//$redirect_url = "http://" . $_SERVER["HTTP_HOST"] . $path_parts['dirname'] . "/Process.php";
$redirect_url = "http://localhost/norfex02/Pay/callingQuery";

// Netaxept Terminal Location
$terminal = "https://epayment-test.bbs.no/terminal/default.aspx";

?>
