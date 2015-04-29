<?php
App::uses('AppModel', 'Model');
class Payment extends AppModel
{
	public $useTable = false;

	public $name = 'Payment';

	public $validate = array(
		'paymentMethod' => array(
			'notEmpty' => array(
				'rule'    => 'notEmpty',
				'message' => 'Required'
			)

		),
	);
}