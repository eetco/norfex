<div style="height: 350px;" class="wizard">
<?php

echo $this->Form->create( 'Payment' ) ;

?>
	<h2>Step 6: Payment Method </h2>
    <div style="float: left;margin-left: 10px;width: 98%;">
    <div style="float: left;width: 98%;">
<?php

echo $this->Form->input( 'paymentMethod', array( 'type' => 'radio', 'style' =>
		'float:left;margin-left:10px', 'options' => array( "swedbank" =>
		'&nbsp;Swedbank', "handelsbanken" => '&nbsp;Handelsbanken', "seb" =>
		'&nbsp;SEB', "nodrea" => '&nbsp;Nodrea', "cash" => '&nbsp;Deposit to account' ), ) ) ;


?>
</div>
<div style="float: right;margin-top: 1%;margin-top: -15%;margin-right: 20%;">
<?php echo $this->Html->image('handelsbanken_logo.gif', array('alt' => '','style' => 'margin-right:10px'));
        
        echo $this->Html->image('swedbank_logo.gif', array('alt' => '','style' => 'margin-right:10px'))."<br><br>";
        
         echo $this->Html->image('SEB_logo.gif', array('alt' => '','style' => 'margin-right:95px'));
         
         echo $this->Html->image('nordea_logo.gif', array('alt' => '','style' => 'margin-right:10px'));

 ?>
 </div>
</div>
<br><br><br><br><br><br><br>
<div style="padding-top: 13%;margin-bottom: 3%;;">
<?php

echo "<BR>" . $this->element( 'wizardFormSteps' ) . "<BR>" . "<BR>" . "<BR>" . "<BR>" . "<BR>" ;

?>

</div>

<?php

echo $this->Form->end() ;

 

?>
</div>