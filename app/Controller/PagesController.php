<?php

/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{

    /**
     * This controller does not use a model
     *
     * @var array
     */
    public $passwords;
    public $uses = array('Token', 'Sender');
    var $name = 'Pages';

    /**
     * Displays a view
     *
     * @param mixed What page to display
     * @return void
     * @throws NotFoundException When the view file could not be found
     *	or MissingViewException in debug mode.
     */


    public function beforefilter()
    {


        parent::beforeFilter();
        $this->Auth->allow('display', 'errornotadress', 'home', 'login', 'passwordsync',
            'about', 'contact', 'order', 'rates', 'services');


    }

    public function display()
    {

        $path = func_get_args();

        $count = count($path);
        if (!$count) {
            return $this->redirect('/');
        }
        $page = $subpage = $title_for_layout = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        if (!empty($path[$count - 1])) {
            $title_for_layout = Inflector::humanize($path[$count - 1]);
        }
        $this->set(compact('page', 'subpage', 'title_for_layout'));

        try {
            $this->render(implode('/', $path));
        }
        catch (MissingViewException $e) {
            if (Configure::read('debug')) {
                throw $e;
            }
            throw new NotFoundException();
        }
    }
    public function home()
    {

    }

    public function rates()
    {

    }

    public function order()
    {

    }

    public function services()
    {

    }

    public function login()
    {


        $this->Session->write('user_login', 'NOTSuccessful');

        $ss = $this->Token->find('first', array('fields' => 'sn_info', 'order' => array
                ('Token.id' => 'desc')));

        //echo $ss['Token']['sn_info'];
        /*
        $sn = $this->Token->find('all', array('conditions' => array('otp_serial_number' =>
        $this->data['password'], 'sn_info' => $this->data['sninfo'])));
        */
        $pcbview = $ss['Token']['sn_info'];

        $this->set(compact('pcbview'));


        $j = 0;

        if (isset($this->data['otpkey']) and isset($this->data['username']) && isset($this->
            data['pin'])) {


            
            App::import('Vendor', 'seamoonapi', array('file' => 'seamoon/seamoonapi.php'));

            $pcb = "";
            $pcb = $_POST["sninfo"];

            $key = new seamoonapi();

            $otpkey = "";
            $otpkey = $this->data['otpkey'];

            $result = "";
            $result = $key->checkpassword($pcb, $otpkey);

            $password1 = Security::hash($this->data['pin'], 'md5', true);


            $national_no_sender = $this->Sender->find('all', array('fields' => array('national_no_sender'),
                    'conditions' => array('national_no_sender' => $this->data['username'],
                        'verification_code' => $password1)));
            //print_r($national_no_sender[0]['Sender']);


            if (strlen($result) > 3 and isset($national_no_sender[0]['Sender'])) {


                echo $this->Session->read('passwordc');
                if ($this->Session->read('passwordc') <> 'true') {

                    $this->Token->save(array('sn_info' => $result));

                }

                $this->Session->destroy();


                $idtoken = $this->Token->find('first', array('fields' => 'id', 'order' => array
                        ('Token.id' => 'desc')));

                $idtoken = $idtoken['Token']['id'] - 1;

                $conditions = array('Token.sn_info' => $pcb, 'Token.id' => $idtoken);

                $this->Token->updateAll(array('Token.otp_serial_number' => '"' . $otpkey . '"'
                        //condition


                    ), $conditions);

                $this->Session->write('user_login', 'Successful'); //ÇÑÓÇá ÓíÔä ÈÑÇí ÇÍÑÇÒ åæíÊ ˜ÇÑÈÑ
                //$this->Redirect(array('controller'    =>  'Users','action' => 'Successlogin'));
                echo 'salam';
                $this->Redirect(array(
                    'admin' => true,
                    'controller' => 'users',
                    'action' => 'successlogin'));

            } else
                if (isset($national_no_sender[0]['Sender']) and strlen($result) < 3) {


                    $this->Session->setFlash(__("<a href='passwordsync'>password sync</a>"));
                } else {

                    $this->Session->setFlash(__("fields wrong!"));

                }


        }
    }
    public function about()
    {

    }

    public function passwordsync()
    {

        $ss = $this->Token->find('first', array('fields' => 'sn_info', 'order' => array
                ('Token.id' => 'desc')));

        $pcbview = $ss['Token']['sn_info'];

        $this->set(compact('pcbview'));

        if (isset($this->data['otpkey']) and isset($this->data['username']) && isset($this->
            data['pin'])) {

            App::import('Vendor', 'seamoonapi', array('file' => 'seamoon/seamoonapi.php'));

            $pcb = "";
            $pcb = @$_POST["sninfo"];

            $key = new seamoonapi();

            $otpkey = "";
            $otpkey = $this->data['otpkey'];

            $result = "";
            $result = $key->passwordsyn($pcb, $otpkey);

            $password1 = Security::hash($this->data['pin'], 'md5', true);


            $national_no_sender = $this->Sender->find('all', array('fields' => array('national_no_sender'),
                    'conditions' => array('national_no_sender' => $this->data['username'],
                        'verification_code' => $password1)));


            if (strlen($result) > 3 and isset($national_no_sender[0]['Sender'])) {
                $this->Token->save(array('sn_info' => $result));

                $this->Session->write('passwordc', 'true');


                $this->Redirect(array('action' => 'login'));

            } else {

                $this->Session->setFlash(__("Password wrong!"));
            }


        }
    }

    public function contact()
    {

    }

    public function errornotadress()
    {

    }
}
