<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
Configure::write('Exception', array(
    'handler' => 'ErrorHandler::handleException',
    'renderer' => 'ExceptionRenderer',
    'log' => true
));
App::uses('Controller', 'Controller');
App::uses('ExceptionRenderer', 'Error');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    
    
    
    
   public $components = array('Session',
            
            'Auth' => array(
            'loginAction' => array('admin'  =>  false,'controller' => 'pages', 'action' => 'login'),
                'loginRedirect' => array('admin'=>true,'controller' => 'users', 'action' => 'Successlogin'),
                'loginUserRedirect' => array('controller' => 'pages', 'action' => 'display'),
                'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
                
            
            )
        );
        
    
    
    public function beforfilter(){
        
        	
            
        parent::beforeFilter();
       $this->Auth->allow( 'admin_Successlogin');
        
    }
    
     public function appError($error) {
        // custom logic goes here.
           
          
           
           
    }
    

    function _checklogin(){
        
        if($this->Session->Read('user_login')==='Successful'){
            return TRUE;
        }
        return FALSE;
        
    }
    
    
    
    
}
