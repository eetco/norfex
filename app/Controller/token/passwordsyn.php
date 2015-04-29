

<?php include("seamoonapi.php") ?>
<?php 
$pcb="";
$pcb= $_POST["sninfo"]; 

$key=new seamoonapi();

$password="";
$password=$_POST["password"];

$result="";
echo $result=$key->passwordsyn($pcb,$password);

 
?>



