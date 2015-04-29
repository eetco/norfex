<div class="wizard">
<h2>step 2: sender details </h2>
 <div style="padding-left: 20px;padding-top: 10px;"> <br >
<?php


echo $this->Form->create('WizardForm');

?>
<script>

$(document).ready(function(){
        
  var sum=0;
   
          // alert($("#list3"). val());
          var regpostal =  /^[-+]?[0-9]*[\/]*.?[0-9]+$/;
          var regname=/[0-9][a-z]*/;
        
          var regtel=/[a-z][0-9]*/;
         
        $("#postalc").focusout(function(){
            if(!regpostal.test($("#postalc").val())){
                
                $("#postalc").attr("value","");
                $("#postalc").attr("placeholder", "Field is Invalid!");
                $("#postalc").css("border-color", "red"); 
            }
            else{
                 $("#postalc").css("border-color", ""); 
            }
    
            }); 
            
             $("#firstname").focusout(function(){
              
            if(regname.test($("#firstname").val())){
                
                $("#firstname").attr("value","");
                $("#firstname").attr("placeholder", "Field is Invalid!");
                $("#firstname").css("border-color", "red"); 
            }
            else{
                 $("#firstname").css("border-color", ""); 
            }
    
            }); 
            
            $("#lastname").focusout(function(){
              
            if(regname.test($("#lastname").val())){
                
                $("#lastname").attr("value","");
                $("#lastname").attr("placeholder", "Field is Invalid!");
                $("#lastname").css("border-color", "red"); 
            }
            else{
                 $("#lastname").css("border-color", ""); 
            }
    
            }); 
            
            $("#city").focusout(function(){
              
            if(regname.test($("#city").val())){
                
                $("#city").attr("value","");
                $("#city").attr("placeholder", "Field is Invalid!");
                $("#city").css("border-color", "red"); 
            }
            else{
                 $("#city").css("border-color", ""); 
            }
    
            }); 
            
                $("#tel").focusout(function(){
              
            if(regtel.test($("#tel").val())){
                
                $("#tel").attr("value","");
                $("#tel").attr("placeholder", "Field is Invalid!");
                $("#tel").css("border-color", "red"); 

            }
            else{
                 $("#tel").css("border-color", ""); 
            }
    
            }); 
            
            
            
            
            
            });
</script>

<div style="margin-top: 20px;">
<?php
echo "<br><br>";

echo $this->Form->input('Sender.first_name_sender', array("required" => "true", 'label' => false,
    'between' => '   First Name   * ', "style" => "margin-left:8.1%;margin-top:1%",
    'id' => 'firstname'));

echo $this->Form->input('Sender.last_name_sender', array("required" => "true", 'label' => false,
    'between' => '   Last Name   * ', "style" => "margin-left:8.1%;margin-top:1%",
    'id' => 'lastname'));

//echo $this->Form->input('Sender.dateOfBirth',array(
//"required"=>"true",'label' => false,"type"=>"date",'between' => ' Date of birth : ',"style"=>"margin-left:5%;margin-top:1%"));

echo $this->Form->input('Sender.dob_sender', array('label' => false,
    'dateFormat' => 'YMD', 'minYear' => date('Y') - 50, 'maxYear' => date('Y') - 10,
    'type' => 'date', "style" => "margin-left:0.8%;margin-top:1%;width:67px",
    'before' => ' <span style=margin-left:0%;margin-right:6.7%>Date of birth * </SPAN>',
    'id' => 'date',
    'separator' =>'  '
    )
    
    
    );

echo $this->Form->input('Sender.address_sender', array("required" => "true", 'label' => false,
    'between' => ' Address * ', "style" => "margin-left:9.8%;margin-top:1%", 'id' =>
    'address'));

echo $this->Form->input('Sender.address_cont_sender', array(
    'label' => false ,'between' => ' Address Cont  ', "style" =>
    "margin-left:7.3%;margin-top:1%", 'id' => 'addressc'));

echo $this->Form->input('Sender.postal_code_sender', array("required" => "true", 'label' => false,
    'between' => ' Postal Code * ', "style" => "margin-left:7.2%;margin-top:1%","maxlength"=>5,
    'id' => 'postalc'));

echo $this->Form->input('Sender.city_sender', array('label' => false, 'between' =>
    ' City * ', "style" => "margin-left:12.8%;margin-top:1%", 'id' => 'city'));

echo $this->Form->input('Sender.country_sender', array("disabled" => "true", "value" =>
    "Sweden", 'label' => false, 'between' => ' Country  ', "style" =>
    "margin-left:11.2%;margin-top:1%", 'id' => 'country','type'=>'text'));

echo $this->Form->input('Sender.email_sender', array('label' => false, 'between' =>
    ' Email  ', 'type' => 'email', "style" => "margin-left:12.4%;margin-top:1%",'id' => 'email'));

echo $this->Form->input('Sender.telephone_sender', array('label' => false, 'between' =>
    ' Telephone * ', "style" => "margin-left:8.4%;margin-top:1%",'id' =>'tel'));

?>

<div style="padding-top: 10px;padding-bottom: 3%;">
<?php echo "<BR>" . $this->element('wizardFormSteps') . "<BR>" . "<BR>"; ?>
</div>

</div>
<?php echo $this->Form->end(); ?>
</div>
</div>