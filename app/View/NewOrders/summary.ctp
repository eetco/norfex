<style>
	.results
	{
		width: 500px;
	}

	td:first-child
	{
		width: 200px;
	}
</style>
<div class="wizard">
<?php echo $this->Form->create('WizardForm'); ?>

<h2>Step 5: Summary </h2>
 <div style="padding-left: 40px;padding-top: 30px;">
<?php
    echo "<br><br>";
// we get an array of all filled up fields, grouped by steps

   $fields['sender'] ['Sender']['dob_sender'] = @implode(' / ',$fields['sender'] ['Sender']['dob_sender']);
    unset($fields ['verification']  );
foreach ($fields as $step => $form_raw) {

	// this extracts an array of fields
  
	$form = @end(array_values($form_raw));

	// this prints the name of the step
	printf('<h3>%s</h3>', Inflector::humanize($step));

	// this gathers and prepares fields for output
	$table_rows = array();
  // print_r($form_raw);
   
  
	foreach ($form as $k => $v) {
		$k == 'currency'
				and $v = $currencies[$v];
		$k == 'originCountry'
				and $v = $originCountries[$v];
		$k == 'destinationCountry'
				and $v = $destinationCountries[$v];
                
                        
		$table_rows[] = array(
			Inflector::humanize(Inflector::underscore($k)), $v
		);
	}

	// this prints out the table
       
	printf('<table class="results">%s</table>', $this->Html->tableCells($table_rows));
   
      

}//-fe

echo '<hr><br><p>Some <a>terms and conditions</a></p>';

echo $this->Form->input('Summary.confirm', array(
	'label' => 'I Agree',
	'value' => 1,
	'type'  => 'checkbox',
    'required' => 'true'
));

?>
</div>
<div style="padding-top: 10px;padding-bottom: 3%;">
<?php echo "<BR>".$this->element('wizardFormSteps')."<BR>"."<BR>"; ?>
</div>
<?php echo $this->Form->end(); ?>
</div>