<?php
App::uses('AppModel', 'Model');
class Order extends AppModel {
    public $name = 'Orders';
	public $validate = array(
		// step 2 senders info
		'peyment_status'       => array(
			'notEmpty' => array(
				'rule'    => 'notEmpty',
				'message' => 'Required'
			)
		),
		'order_id'        => array(
			'notEmpty' => array(
				'rule'    => 'notEmpty',
				'message' => 'Required'
			)
		),
		'sender_id'         => array(
			'notEmpty' => array(
				'rule'    => 'notEmpty',
				'message' => 'Required'
			)
		),
		'receiver_id'       => array(
			'notEmpty' => array(
				'rule'    => 'notEmpty',
				'message' => 'Required'
			)
		),
        'amount_sender'       => array(
			'notEmpty' => array(
				'rule'    => 'notEmpty',
				'message' => 'Required'
			)
		),
        
        'currency_sender'       => array(
			'notEmpty' => array(
				'rule'    => 'notEmpty',
				'message' => 'Required'
			)
		),
        
        
        'payment_method_sender'       => array(
			'notEmpty' => array(
				'rule'    => 'notEmpty',
				'message' => 'Required'
			)
		),
        
        'sender_paid_at'       => array(
			'notEmpty' => array(
				'rule'    => 'notEmpty',
				'message' => 'Required'
			)
		),
	);
    

}