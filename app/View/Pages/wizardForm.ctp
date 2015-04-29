<div class="wizard">
	<?php
	$step = $this->Wizard->stepNumber();
	$steps = $this->Wizard->config('steps');
	if ($step > 1)
		echo $this->Wizard->link('Previous', '/'.$steps[$step - 2]);
	echo '&ensp;&ensp;&ensp;'
			. $this->Form->submit('Next', array('div' => false));
	?>
</div>

