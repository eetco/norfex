<div class="wizard">
<?php echo $this->Form->create('Signup', array('id' => 'SignupForm', 'url' => $this->here)); ?>
	<h2>Step 3 : Account Information</h2>
	<?php 
		echo $this->Form->input('Client.first_name', array('label' => 'First Name:'));
		echo $this->Form->input('Client.last_name', array('label' => 'Last Name:'));
		echo $this->Form->input('Client.phone', array('label' => 'Phone Number:'));
		echo $this->Form->input('User.email', array('label'=>'Email:'));
		echo $this->Form->input('User.password',array('label'=>'Password:'));
		echo $this->Form->input('User.confirm', array('label'=>'Confirm:', 'type'=>'password'));
	?>
<?php echo $this->element('wizardFormSteps'); ?>
<?php echo $this->Form->end(); ?>
</div>