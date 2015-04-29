<div class="wizard">
<?php echo $this->Form->create('NewCustomer'); ?>
	<h2>step 3: verification</h2>
     <div style="padding-left: 20px;padding-top: 20px;"> <br >
<?php

echo "<BR><BR>";
//echo $codev;


echo $this->Form->input('code1' , array(
	'label' => 'If your request service is urgent, you may contact norfex and receive your verification code.
In order to use this service, you must enter your verification code. Verification code is 8 digit number that will be sent to the address that you provided eailer.
Requested the service before 17.00, you will receive the verification code next working day.<br><br>',
    'placeholder' => 'Date of Birth + 
Last two digits  postal code',
    'id' => 'input-code'
    ,'between' =>'<span style=margin-top:10%>Verification Code &nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> ',
    "required" => "true",
   
    
//	'value' => uniqid(),
//	'readonly'
));

echo $this->Form->input('code2' , array(
	'label' => false,
    'placeholder' => 'Date of Birth + 
Last two digits  postal code',
    'id' => 'input-code',
    'style' =>'float:left;margin-left:42.5%;margin-top:-4.8%',
    
    "required" => "true",
   
    
//	'value' => uniqid(),
//	'readonly'
));

echo $this->Form->input('code' , array(
	'label' => 'If your request service is urgent, you may contact norfex and receive your verification code.
In order to use this service, you must enter your verification code. Verification code is 8 digit number that will be sent to the address that you provided eailer.
Requested the service before 17.00, you will receive the verification code next working day.<br><br>',
    'placeholder' => 'Date of Birth + 
Last two digits  postal code',
    'id' => 'input-code'
    ,'between' =>'<span style=margin-top:10%>Verification Code &nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> ',
    'required' => 'true',
    'type'      => 'hidden',
    'value'     => $codev
   
    
//	'value' => uniqid(),
//	'readonly'
));

?>
<script>

$(document).ready(function(){
    
     var c2=parseInt( $("#code").val());
    $("#input-code").focusout(function(){
         var c=parseInt( $("#input-code").val());
        if( c != c2){
            
        $(":submit").attr("disabled", true);
         $("#input-code").attr("value","");
         $("#input-code").css("border-color", "red");
         }
         else{
              $(":submit").attr("disabled", false);
         }
        });
        
         $("#input-code").keyup(function(){
         var c=parseInt( $("#input-code").val());
        if( c != c2){
            
        $(":submit").attr("disabled", true);
        
         $("#input-code").css("border-color", "red");
         }
         else{
              $(":submit").attr("disabled", false);
         }
        });
 });

</script>
<input id="code" type="hidden" value="<?php echo $codev2; ?>" />

<?php



?>
<div style="padding-top: 10px;padding-bottom: 3%;">
<?php echo "<BR>".$this->element('wizardFormSteps')."<BR>"."<BR>"; ?>
</div>
<?php echo $this->Form->end(); ?>
</div>
</div>