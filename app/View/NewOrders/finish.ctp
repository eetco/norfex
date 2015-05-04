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
<br ><br >
</div>
 </div> 