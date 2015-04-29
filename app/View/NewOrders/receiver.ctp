<div class="wizard">
<?php echo $this->Form->create('WizardForm'); ?>
	<h2>Step 4: Receivers info </h2>
     <div style="padding-left: 20px;padding-top: 10px;">
     <style>
     
     input{
        
        margin-top:1%;
     }
     </style>
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
<?php
echo "<br><br><br><br>";
 

 
echo $this->Form->input('Receiver.first_name_receiver',
array('between' => 'First Name *','label' => false,'style' => 'margin-left:7.9%','required'=>'true',
    'id' => 'firstname'));

echo $this->Form->input('Receiver.family_name_receiver',
array('between' => 'Last Name *','label' => false,'style' => 'margin-left:7.9%','required'=>'true',
    'id' => 'lastname'));



echo $this->Form->input('Receiver.telephone_receiver',
array('between' => 'Telephone ','label' => false,'style' => 'margin-left:8.9%',
    'id' => 'tel'));

echo $this->Form->input('Receiver.email_receiver',
array('between' => 'Email  ','label' => false,'style' => 'margin-left:11.9%',
    'id' => 'email','type'=>'email'));

echo $this->Form->input('Receiver.country_receiver',
array('between' => 'Email  ','label' => false,'style' => 'margin-left:11.9%','required'=>'true',
   
    'type'=>'hidden',
    'value'=>$this->Session->read('Wizard.WizardForms.general.country_receiver')));
    
 echo $this->Form->input('Receiver.city_receiver',
array('between' => 'Email  ','label' => false,'style' => 'margin-left:11.9%','required'=>'true',
    
    'type'=>'hidden',
    'value'=>$this->Session->read('Wizard.WizardForms.general.city_receiver')));

switch($countryname){

case 'Iran':
    echo $this->Form->input('Receiver.bank_number_receiver',
    array('between' => 'Bank  *','label' => false,'style' => 'margin-left:11.8%','required'=>'true',
    'id' => 'bank'));


    echo $this->Form->input('Receiver.iban_number_receiver',
    array('between' => 'Iban  *','label' => false,'style' => 'margin-left:12.3%','required'=>'true',
    'id' => 'iban'));
    
       echo $this->Form->input('Receiver.comment_receiver',
    array('between' => 'Comment  *','label' => false,'type'=>'textarea','style' => 'margin-left:8.6%;margin-top:1.2%','required'=>'true',
    'id' => 'comment'));
    
break;
    
default:
    
     echo $this->Form->input('Receiver.swift_receiver',
    array('between' => 'Swift *','label' => false,'style' => 'margin-left:12.1%','required'=>'true',
    'id' => 'swift'));


    echo $this->Form->input('Receiver.iban_number_receiver',
    array('between' => 'Iban * ','label' => false,'style' => 'margin-left:12%','required'=>'true',
    'id' => 'iban'));
    
     echo $this->Form->input('Receiver.comment_receiver',
    array('between' => 'Comment * ','type'=>'textarea','label' => false,'style' => 'margin-left:8.4%;margin-top:1.2%','required'=>'true',
    'id' => 'comment'));
    
    
    }



?>
<div style="padding-top: 10px;padding-bottom: 3%;">
<?php echo "<BR>".$this->element('wizardFormSteps')."<BR>"."<BR>"; ?>
</div>
<?php echo $this->Form->end(); ?>
</div>
</div>