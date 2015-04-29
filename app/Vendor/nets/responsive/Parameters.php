<?php

// Please change the value of the following lines according to your environment

// MerchantId provided by Netaxept
$merchantId = "511809";

// Token provided by Netaxept
$token = "s?9ZEq=7";


// WSDL location found in documentation
$wsdl1="https://test.epayment.nets.eu/Netaxept.svc?wsdl";

// Redirect from Netaxept to your site
$path_parts = pathinfo($_SERVER["PHP_SELF"]);
// this is an example is showing how to add one (or several additional parameters on the terminal)
// $redirect_url = "http://" . $_SERVER["HTTP_HOST"] . $path_parts['dirname'] . "/Process.php?webshopParameter=1234567";
//$redirect_url = "http://" . $_SERVER["HTTP_HOST"] . $path_parts['dirname'] . "/Process.php";
$redirect_url = "http://www.norfex.se/fa/PaymentStatus/callingQuery.php";

// Netaxept Terminal Location
$terminal = "https://epayment.bbs.no/terminal/default.aspx";

?>

