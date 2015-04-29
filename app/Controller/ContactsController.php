<?php
App::uses('AppController', 'Controller');

class ContactsController extends AppController {

	public $components = array('RequestHandler');

	public function beforeFilter() {
		parent::beforeFilter();

		// Change layout for Ajax requests
		if ($this->request->is('ajax')) {
			$this->layout = 'ajax';
		}
	}

	public function index() {
		// form posted
		if ($this->request->is('post')) {
			// create
			$this->Contact->create();

			// attempt to save
			if ($this->Contact->save($this->request->data)) {
				$this->Session->setFlash('Thank you for choosing norfex, we will contact you shortly');
				$this->redirect(array('action' => 'index'));
			}
		}
	}
}

?>