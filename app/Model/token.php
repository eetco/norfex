<?php
App::uses('AppModel', 'Model');
class Token extends AppModel {
    public $name = 'Token';

	public $validate = array(
		// step 2 senders info
		'otp_serial_number'       => array(
			'notEmpty' => array(
				'rule'    => 'notEmpty',
				'message' => 'Required'
			)
		),
		'sn_info'        => array(
			'notEmpty' => array(
				'rule'    => 'notEmpty',
				'message' => 'Required'
			)
		));
}