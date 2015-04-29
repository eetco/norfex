<?php

App::uses('Model', 'Model');

class Contact extends AppModel {

	public $name = 'Contact';

	public $validate = array(
		'telephone' => array(
			'rule' => 'numeric',
			'message' => 'Please enter a numeric Telephone Number'
		)
	);
}