<?php
App::uses('AppModel', 'Model');
class Summary extends AppModel
{
	public $useTable = false;

	public $name = 'Summary';

	public $validate = array(

		'confirm' => array(
			'comparison' => array(
				'rule'     => array('comparison', '!=', 0),
				'required' => true,
				'message'  => 'Please check this box if you want to proceed.'
			)

		),
	);
}