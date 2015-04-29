<?php include("seamoonapi.php") ?>
<?php 

$array=$_POST;
$otpKey=$array['otpKey'];

$otpKey="991041";


$seed = "E6161BACAF5A822D4A61E34F1BD78E7AE1A23C46";
echo base64_encode($seed);

//584149
$pcb=$array['ss'];

$key=new seamoonapi();

//$pass=$key->passwordsyn($pcb,"991041");

//echo $pass;
//echo "<br>";

//check password
$result=$key->checkpassword($pcb,"991041");

echo  $result; 
echo "<br>";
if(strlen($result)>3)
{
    echo "pass";
    
}
else
{
  echo "error";
}

echo "<br>";

//token time sync
 $result=$key->passwordsyn($pcb,"145473");
 echo  $result;
 echo "<br>";
if(strlen($result)>3)
{
    echo "OK";
    
}
else
{
  echo "error";
}


?>