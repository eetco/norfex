<div class="wizard">
<div id="message" style="">
<?php echo $this->Session->flash(); ?>
</div>
<?php

echo $this->Form->create( 'Response' ) ;

?>
  <div style="padding-left: 2%;padding-top: 2%;">
	<p>At this stage, user is redirected to payment vendor</p>
	<p>for demo purposes, please choose between 2 scenarios. <?php    
        echo ' Order number : '.$this->Session->read('Config.ordernumber' ); ?></p>
  
<?php

             
        
echo $this->Form->input( 'Sender.amount_sender', array( 'label' => false, 'type' =>
		'hidden', "style" => "margin-left:12.1%;margin-top:1%", 'id' => 'email', 'value' =>
		$this->Session->read( 'Wizard.neworders.general.WizardForm.totalamount' ) ) ) ;
        $amount_sender=$this->Session->read( 'Wizard.neworders.general.WizardForm.totalamount' ) ;
        
       $paymentmethod=$this->Session->read( 'Wizard.neworders.payment.Payment.paymentMethod');
     
        

?>
<a class="btn btn-primary span3" style="margin-left:300px;margin-top:2%" href="http://localhost/norfex02/pay/index/<?php echo  $amount_sender.'/'.$paymentmethod;?>/<?php echo $this->Session->read('Config.ordernumber' ); ?>">
Pay
</a><br ><br ><br ><br >
<?php

echo $this->Form->end() ;

?>
</div>
</div>