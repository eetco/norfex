<?php
App::uses('AppModel', 'Model');
class WizardForm extends AppModel
{
	public $useTable = false;

	public $validate = array(
		// step 1 general info
		'amountToSend'       => array(
			'decimal' => array(
				'rule'    => array('decimal', 1, '/(^\d*\.?\d*[1-9]+\d*$)|(^[1-9]+\d*\.\d*$)/'),
				'message' => 'must be a valid amount'
			)
		),
		'currency'           => array(
			'notEmpty' => array(
				'rule'    => 'notEmpty',
				'message' => 'Required'
			)
		),
		'originCountry'      => array(
			'notEmpty' => array(
				'rule'    => 'notEmpty',
				'message' => 'Required'
			)
		),
		'destinationCity'    => array(
			'notEmpty' => array(
				'rule'    => 'notEmpty',
				'message' => 'Required'
			),
		),
		'destinationCountry' => array(
			'notEmpty'         => array(
				'rule'    => 'notEmpty',
				'message' => 'Required'
			),
			'destinationCheck' => array(
				'rule'    => 'destinationCheck',
				'message' => 'sorry, this destination is unavailable'
			)

		),
		'priorityOfOrder'    => array(
			'notEmpty' => array(
				'rule'    => 'notEmpty',
				'message' => 'Required'
			)
		),
		'typeOfDelivery'     => array(
			'notEmpty' => array(
				'rule'    => 'notEmpty',
				'message' => 'Required'
			)
		),

	);

	public function destinationCheck($check)
	{
		App::import('model', 'Countries');
		$Country              = new Country();
		$destinationCountry   = $check['destinationCountry'];
		$destinationCountries = $Country->find('list', array(
			'fields' => array('id', 'available')
		));
		return $destinationCountries[$destinationCountry] == 1;
	}

}//-cl