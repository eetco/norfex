


<html>
<div class="login">
	<div class="login-content" style="height: 450px;margin-bottom: 10%;margin-top: -5%;">
	<h2> login to my norfex </h2>
	<table border="0" cellspacing="5" cellpadding="5" style="margin: 8%;">
	<?php echo $this->Form->create(); ?>
		<tr><td>User name </td><td><?php echo $this->Form->input('username', array('label' => false,'name'=>'username',"required" => "true")); ?></td></tr>
		<tr><td>Password </td><td><?php echo $this->Form->input('pin', array('label' => false,'name'=>'pin',"required" => "true")); 
        echo $this->Form->input('sninfo', array('label' => false,'name'=>'sninfo','type' => 'hidden','value' => "$pcbview")); ?>
        </td></tr>
		<tr><td>Otp key</td><td><?php echo $this->Form->input('password', array('label' => false,'name'=>'password',"required" => "true")); ?>
        
         <span style="float: right; text-align: left;margin-top: -14%;margin-right: -45%;"><?PHP echo $this->Session->flash(); ?></span>
        </td></tr>
	
    	<tr ><td ><input type="submit" value="Login" style="width: 475%;" class="read-more"/></td></tr>
	</table>
    </div>
    <div class="login-token">
	<h3 style="margin-left: 1%;margin-bottom: 5%;"> forgot your pin? </h3>
	<table border="0" cellspacing="5" cellpadding="5">
	<?php echo $this->Form->create(); ?>
		<tr><td>
		<tr><td style="margin-bottom: 12%;">Email</td><td><?php echo $this->Form->input('username', array('label' => false)); ?></td></tr>
		<tr><td></td><td><input type="submit" value="Send" style="width: 100%;" class="read-more"/></td></tr>
	</table>
	</div>
</div>
<br />
</html>