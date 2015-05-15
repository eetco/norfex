<?php
App::uses('AppModel', 'Model');
class Sender extends AppModel {
    public $name = 'Sender';

	public $validate = array(
		// step 2 senders info
		'first_name_sender'       => array(
			'notEmpty' => array(
				'rule'    => 'notEmpty',
				'message' => 'Required'
			)
		),
		'last_name_sender'        => array(
			'notEmpty' => array(
				'rule'    => 'notEmpty',
				'message' => 'Required'
			)
		),
		'address_sender'         => array(
			'notEmpty' => array(
				'rule'    => 'notEmpty',
				'message' => 'Required'
			)
		),
		'postal_code_sender'       => array(
			'notEmpty' => array(
				'rule'    => 'notEmpty',
				'message' => 'Required'
			)
		),
        
		'city_sender'       => array(
			'notEmpty' => array(
				'rule'    => 'notEmpty',
				'message' => 'Required'
			)
		),
        
        	'telephone_sender'       => array(
			'notEmpty' => array(
				'rule'    => 'notEmpty',
				'message' => 'Required'
			)
		),
        
	);
}