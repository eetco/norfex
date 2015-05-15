<html>
<div class="login">
	<div class="login-content" style="height: 580px;margin-bottom: 10%;margin-top: -5%;">
	<h2> login to my norfex </h2>
	<table border="0" cellspacing="5" cellpadding="5" style="margin-top: 12%;margin-left: 7%;">
	<?php echo $this->Form->create(); ?>
		<tr><td>User name </td><td><?php echo $this->Form->input('username', array('label' => false,'name'=>'username',"required" => "true")); ?></td></tr>
		<tr><td>Password </td><td><?php echo $this->Form->input('pin', array('label' => false,'type' => 'password','name'=>'pin',"required" => "true")); 
        ?>
        </td></tr>
		<tr><td>Otp key</td><td><?php echo $this->Form->input('otpkey', array('label' => false,'type' => 'text','name'=>'otpkey',"required" => "true")); ?>
        
        <span style="float: right; text-align: left;margin-top: -14%;margin-right: -55%;"><?PHP echo $this->Session->flash(); ?></span>
        
        
        </td></tr>
        
        
		<tr ><td ><input type="submit" value="Login" style="width: 475%;" class="read-more"/></td></tr>
	</table>
    </div>
    <div class="login-token">
	<h3 style="margin-left: 1%;margin-bottom: 5%;margin-top: 5%;"> forgot your pin? </h3>
	<table border="0" cellspacing="5" cellpadding="5" style="margin-top: 11.5%;">
	<?php echo $this->Form->create(); ?>
		
		<tr><td style="margin-bottom: 12%;">Email</td><td><?php echo $this->Form->input('email', array('label' => false)); ?></td></tr>
		<tr><td></td><td><input type="submit" value="Send" style="width: 100%;" class="read-more"/></td></tr>
	</table>
	</div>
</div>
<br />
</html>