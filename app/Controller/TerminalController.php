<?php

class TerminalController extends AppController {
 public $AutoAuth;
 public $PaymentMethodList;
 public $Language;
 public $OrderDescription;
 public $RedirectOnError;
private $RedirectUrl;

 public function beforefilter(){
  $this->Auth->allow( 'index');
  }
 
 function index
   (
        $AutoAuth,
        $PaymentMethodList,
        $Language,
        $OrderDescription,
        $RedirectOnError,
        $RedirectUrl
   )
   {
        $this->AutoAuth           = $AutoAuth;
        $this->PaymentMethodList  = $PaymentMethodList;
        $this->Language           = $Language;
        $this->OrderDescription   = $OrderDescription;
        $this->RedirectOnError    = $RedirectOnError;
        $this->RedirectUrl        = $RedirectUrl;
   }
};

?>
