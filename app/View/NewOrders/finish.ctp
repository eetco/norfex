<div  class="wizard" style="">
<h2 style="">step 1: general information </h2>
<?php

echo $this->Form->create('WizardForm');

?>
<div style="width: 100%;margin-top: 1%;;background-color: #3498db;color: white;text-align: center;">

<div id="message" style="">
<?php echo $this->Session->flash(); ?>
</div>
<script>
$(document).ready(function(){
    
    $("#message").hide('fast');
    $("#message").show('slow');

    
 });

</script>
</div>
<!--<script type='text/javascript' src="http://norfex02.zgig.ir/js/jQuery.js"></script>--!>


    <script>
    $(document).ready(function(){
        
  var sum=0;
   
          // alert($("#list3"). val());
          var reg = /^[-+]?[0-9]*\.?[0-9]+$/;
        $("#list option").click(function(){
                var am = $("#amount").val();
             sum=1;
  
            //var value = $(this).text();
            var list=$(this).val();
     var index = $('li').index($(this));
    // alert(value+index);
         
         if(am && reg.test(am)){
             $("#amount").css("border-color", "green"); 
   
       $.ajax({
            type:"POST",
            async: false,
			 data: { am:am , list:list},
			 dataType: "json",
            url:"<?php

echo 'http://localhost/norfex02/wizard_forms/rate/'

?> "+list+"/"+am,     
            success:function(response){
                
                
                //alert(response['success']);
                
                $("#des-am").attr("value",response['success']);
                
            	 }
		
});

}
else if(!am){
  
    $("#amount").css("border-color", "red"); 
    $("#amount").attr("placeholder", "fild is null!");
     $("#des-am").attr("value","");
  
    
}
else if(!reg.test(am)){
  alert(reg.test(am));
    $("#amount").css("border-color", "red"); 
    
    $("#amount").val("").attr("placeholder", "fild is invalid!");
   
  
    
}

    	});
        
        
        
         $("#amount").change(function(){
            
            
            
            var am = $("#amount").val();
  
            //var value = $(this).text();
            var list=$("#list option").val();
     var index = $('li').index($(this));
    // alert(value+index);
         
         if(am && reg.test(am) && sum==1){
             $("#amount").css("border-color", "green"); 
   
       $.ajax({
            type:"POST",
			 data: { am:am , list:list},
			 dataType: "json",
            url:"<?php

echo 'http://localhost/norfex02/wizard_forms/rate/'

?> "+list+"/"+am,     
            success:function(response){
                
                
                //alert(response['success']);
                
                $("#des-am").attr("value",response['success']);
                
            	 }
		
});

}
else if(!am){
  
    $("#amount").css("border-color", "red"); 
    $("#amount").attr("placeholder", "fild is null!");
     $("#des-am").attr("value","");
  
    
}
else if(!reg.test(am)){
  alert(reg.test(am));
    $("#amount").css("border-color", "red"); 
    
    $("#amount").val("").attr("placeholder", "fild is invalid!");
       $("#expeditionfee2").val("").attr("value","");
            $("#totalamount2").val("").attr("value","");
   
  
    
}


    	});
        var am3;
        $("#economy").click(function(){
            am3=50;
           var am2=parseInt( $("#amount").val());
            $("#expeditionfee2").val("").attr("value","50");
            $("#totalamount2").val("").attr("value",am2+50);
             });
           
             
             $("#standard").click(function(){
                 am3=70;
            
            var am2=parseInt( $("#amount").val());
            $("#expeditionfee2").val("").attr("value","70");
            $("#totalamount2").val("").attr("value",am2+70);  
             });
             
             $("#urgent").click(function(){
                 am3=150;
            var am2=parseInt( $("#amount").val()); 
            $("#expeditionfee2").val("").attr("value","150");
            $("#totalamount2").val("").attr("value",am2+150);
            
             });
          
             $("#amount").change(function(){
                if(am3){
           var am2=parseInt( $("#amount").val());
       
            $("#totalamount2").val("").attr("value",am2+am3);
            }
            else{
                 $("#expeditionfee2").val("").attr("value","");
            $("#totalamount2").val("").attr("value","");
            }
                });
        
        
        });
    
    </script>





 <div style="padding-left: 10px;">  
	
	<legend >Origin</legend>
	<table border="0" cellspacing="5" cellpadding="5">
	<tr><td style="float: left;margin-left:  1%;">I intend to send money</td><td></td></tr>  
	<tr><td>Origin country</td><td style="float: left;margin-left:  16%;">Sweden</td></tr>
	<tr><td>Origin currency</td><td style="float: left;margin-left:  16%;">Swedish krona</td></tr>
	<tr><td>Origin amount</td><td style="float: left;margin-left: 16%;"><?php

echo $this->Form->input('amountToSend', array('label' => false, 'id' => 'amount'));

?></td></tr>
	</table>

	<legend>Destination</legend>
	<table border="0" cellspacing="5" cellpadding="5">
	<tr><td>Destination country</td><td  style="float: left;margin-left: 10%;" class="span4" ><select name="country">

              <?php

foreach ($Country as $Country)
{

?>
		  <option id="list1"   value="<?php

				echo $Country["Country"]["Countryavailable"];

?>" ><?php

				echo $Country["Country"]["Countryavailable"];

?></option>

<?php

}

?>

		</select></td></tr>
     

	<tr><td>Destination city</td><td style="float: left;margin-left:10%;" class="span4"><?php

echo $this->Form->input('destinationCity', array('label' => false, 'placeholder' =>
				"City"));

?></td></tr>
   <!---
	<tr><td>Destination currency</td><td>	<select id="list" name="list[]" >
    <?php

foreach ($currencies as $currencies)
{

?>
		  <option id="list1" value="<?php

				echo $currencies["Currency"]["id"];

?>" ><?php

				echo $currencies["Currency"]["currency_name"];

?></option>
<?php

}

?>
		</select></td></tr>
	<tr><td>Destination amount</td><td><input id="des-am" type="text" name="some_name" value="" id="some_name" disabled></td></tr>
    --!>
	</table>

		<legend>Order Specification</legend>
		<table  border="0" cellspacing="5" cellpadding="5">
		<tr><td style="">Priority of order :</td><td style="float: left;margin-left: 12.2%;" class="span4">	
        	
			<input <?php

if (@$this->data["priority_sender"] == "economy") echo "checked";

?>  style="margin-top: -2px;"  type="radio" name="priority_sender" id="economy" value="economy" required><span  style="" ><span>&nbsp;Economy&nbsp;</span>
                &nbsp;</span>
				<input  <?php

if (@$this->data["priority_sender"] == 'standard') echo "checked";

?> style="margin-top: -2px;" type="radio" name="priority_sender"id="standard" value="standard"  required><span  style="" ><span>&nbsp; Standard&nbsp;</span>
				<input  <?php

if (@$this->data["priority_sender"] == 'urgent') echo "checked";

?> style="margin-top: -2px;" type="radio" name="priority_sender"id="urgent" value="urgent" required><span  style="" ><span>&nbsp; Urgent&nbsp;</span>
                	
                     
                    		
				</td>
	</tr>
		<tr><td>Expedition fee</td><td style="float: left;margin-left: 12.2%;" class="span4">
        <?php

if (isset($this->data["expeditionfee"]))
{
				$e = $this->data["expeditionfee"];
}
if (isset($this->data["totalamount"]))
{
				$t = $this->data["totalamount"];
}
echo $this->Form->input('expeditionfee', array('label' => false, 'id' =>
				'expeditionfee2', 'readonly' => true, ' required' => true, 'value' => @$e));

?>
    
</td>
		<tr><td>Total amount</td><td style="float: left;margin-left: 12.2%;" class="span4">
        <?php

echo $this->Form->input('totalamount', array('label' => false, 'id' =>
				'totalamount2', 'readonly' => true, ' required' => true, 'value' => @$t));

?>

        
        </td>
			
		</table>

<?php

echo "<br>" . $this->element('wizardFormSteps') . "<br>";

?>

<?php

echo $this->Form->end();

?><br ><br >
</div>
 </div> 