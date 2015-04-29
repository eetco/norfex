	<?php

$step = $this->Wizard->stepNumber() ;
$steps = $this->Wizard->config( 'steps' ) ;


if ( $step > 1 && $step<>7 )
{
		echo $this->Wizard->link( 'Previous', '/' . $steps[$step - 2], array( 'class' =>
				'btn btn-primary span2', 'style' => 'margin-left:230px;margin-top:1%' ) ) ;


		echo $this->Form->submit( 'Next', array( 'div' => false, 'class' => 'btn btn-primary span2',
				'style' => 'margin-left:1%;margin-top:1%;width:20%', ) ) ;


}

if ( $step <= 1  ) echo $this->Form->submit( 'Next', array( 'div' => false,
				'class' => 'btn btn-primary span2', 'style' => 'margin-left:440px;margin-top:1%;width:20%' ) ) ;

if ( $step == 7 ) echo $this->Html->link( 'Pay', array( 'div' => false,
				'class' => 'btn btn-primary span3', 'style' => 'margin-left:300px;margin-top:2%' ) )."<br><br><br>" ;

?>