<?php
App::uses('AppModel', 'Model');
class Receiver extends AppModel {
    public $name = 'Receiver';

	public $validate = array(
		// step 2 senders info
		'firstName'       => array(
			'notEmpty' => array(
				'rule'    => 'notEmpty',
				'message' => 'Required'
			)
		),
		'lastName'        => array(
			'notEmpty' => array(
				'rule'    => 'notEmpty',
				'message' => 'Required'
			)
		),
		'address'         => array(
			'notEmpty' => array(
				'rule'    => 'notEmpty',
				'message' => 'Required'
			)
		),
		'telephone'       => array(
			'notEmpty' => array(
				'rule'    => 'notEmpty',
				'message' => 'Required'
			)
		),
	);
}