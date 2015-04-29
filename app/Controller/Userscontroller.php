<?php

App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
class Userscontroller extends AppController
{
    var $name = 'Users';
    var $helpers = array('Html', 'Form');

    //var $components = array('Captcha');
    public function beforefilter()
    {

        parent::beforeFilter();
      
if($this->Session->read('user_login')=='Successful')
  $this->Auth->allow( 'admin_Successlogin');
  
    }

    public function beforRender()
    {

    }
    
    public function admin_Successlogin()
    {
      
        
    }
    }

   ?>