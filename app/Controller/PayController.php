<?php

class PayController extends AppController
{
    //	private $listname, $amount ;


    // public $TransactionId;

    public $transactionId = "";
    public $Amount;
    public $CurrencyCode;
    public $Force3DSecure;
    public $Goods;
    public $OrderNumber;
    public $UpdateStoredPaymentInfo;


    public $InputParametersOfRegister, $autoAuth;
    public $RedirectUrl;
    public $order_id, $response;

    var $uses = array('pay', 'Orders');

    // MerchantId provided by Netaxept
    public $merchantId = "511809";

    // Token provided by Netaxept
    public $token = "s?9ZEq=7";

    // WSDL location found in documentation
    public $wsdl = "https://test.epayment.nets.eu/Netaxept.svc?wsdl";

    //echo $wsdl;
    // Redirect from Netaxept to your site


    // this is an example is showing how to add one (or several additional parameters on the terminal)
    // $redirect_url = "http://" . $_SERVER["HTTP_HOST"] . $path_parts['dirname'] . "/Process.php?webshopParameter=1234567";
    //$redirect_url = "http://" . $_SERVER["HTTP_HOST"] . $path_parts['dirname'] . "/Process.php";
    public $redirect_url = "http://localhost/norfex02/Pay/callingQuery";

    // Netaxept Terminal Location
    public $terminal = "https://epayment-test.bbs.no/terminal/default.aspx";

    function beforeFilter()
    {


        App::import('Vendor', 'ClassOrder', array('file' => 'nets\pay\ClassOrder.php'));
        App::import('Vendor', 'ClassTerminal', array('file' => 'nets\pay\ClassTerminal.php'));
        App::import('Vendor', 'ClassRegisterRequest', array('file' => 'nets\pay\ClassRegisterRequest.php'));
        App::import('Vendor', 'ClassEnvironment', array('file' => 'nets\pay\ClassEnvironment.php'));

        $this->Auth->allow('index', 'Paramters', 'QueryRequest', 'callingquery',
            'saveupdate', 'test');

    }

    function index($amount_sender = null, $payment_mehtod_sender = null, $order_id = null)
    {
        $path_parts = pathinfo($_SERVER['PHP_SELF']);

        switch ($payment_mehtod_sender) {

            case 'swedbank':
                $payment_mehtod = 'SwedishBankSwedbank';
                break;

            case 'nodrea':
                $payment_mehtod = 'SwedishBankNordea';
                break;

            case 'seb':
                $payment_mehtod = 'SwedishBankSEB';
                break;

            case 'handelsbanken':
                $payment_mehtod = 'SwedishBankHandelsbanken';
                break;

            default:

                break;
        }

        // Please change the value of the following lines according to your environment


        //print_r($InputParametersOfRegister);

        ####  PARAMETERS IN ORDER  ####
        // The amount described as the lowest monetary unit, example: 100,00 NOK is noted as "10000", 9.99 USD is noted as "999".
        $amount = $amount_sender * 100;
        $currencyCode = "SEK"; //The currency code, following ISO 4217. Typical examples include "NOK" and "USD".
        $force3DSecure = null; // Optional parameter
        $orderNumber = $order_id;
        $UpdateStoredPaymentInfo = null;


        ####  PARAMETERS IN Environment  ####
        $Language = "eng"; // Optional parameter
        $OS = null; // Optional parameter
        $WebServicePlatform = 'PHP5'; // Required (for Web Services)

        ####  PARAMETERS IN TERMINAL  ####
        $autoAuth = null; // Optional parameter
        $paymentMethodList = $payment_mehtod; // Optional parameter
        $language = null; // Optional parameter
        $orderDescription = "Contessa FX 25 - Mountainbike"; // Optional parameter
        $redirectOnError = null; // Optional parameter

        ####  PARAMETERS IN REGISTER REQUEST  ####
        $AvtaleGiro = null; // Optional parameter
        $CardInfo = null; // Optional parameter
        $Customer = null; // Optional parameter
        $description = null; // Optional parameter
        $DnBNorDirectPayment = null; // Optional parameter
        //$Environment          = null; // Optional parameter
        $MicroPayment = null; // Optional parameter
        $serviceType = null; // Optional parameter: null ==> default = "B" <=> BBS HOSTED
        $Recurring = null; // Optional parameter
        $transactionId = null; // Optional parameter
        $transactionReconRef = null; // Optional parameter


        ####  ENVIRONMENT OBJECT  ####
        $Environment = new Environment($Language, $OS, $WebServicePlatform);
        // print_r($Environment);

        ####  TERMINAL OBJECT  ####
        $Terminal = new Terminal($autoAuth, $paymentMethodList, $language, $orderDescription,
            $redirectOnError, $this->redirect_url);

        //print_r(	$Terminal);
        $ArrayOfItem = null; // no goods for Klana ==> normal transaction
        ####  ORDER OBJECT  ####
        $Order = new Order($amount, $currencyCode, $force3DSecure, $ArrayOfItem, $orderNumber,
            $UpdateStoredPaymentInfo);

        ####  START REGISTER REQUEST  ####
        $RegisterRequest = new RegisterRequest($AvtaleGiro, $CardInfo, $Customer, $description,
            $DnBNorDirectPayment, $Environment, $MicroPayment, $Order, $Recurring, $serviceType,
            $Terminal, $transactionId, $transactionReconRef);
        //print_r($RegisterRequest);


        ####  ARRAY WITH REGISTER PARAMETERS  ####
        $InputParametersOfRegister = array(
            "token" => $this->token,
            "merchantId" => $this->merchantId,
            "request" => $RegisterRequest);

        try {

            $sender_id = $this->Session->read('Config.sender_id');
            $receiver_id = $this->Session->read('Config.receiver_id');
            $ordernumber = $this->Session->read('Config.ordernumber');


            if (isset($sender_id) && isset($receiver_id) && isset($ordernumber) && $ordernumber ==
                $order_id && $amount_sender == $this->Session->read('Wizard.neworders.general.WizardForm.totalamount') &&
                $payment_mehtod_sender == $this->Session->read('Wizard.neworders.payment.Payment.paymentMethod') &&
                $order_id == $this->Session->read('Config.ordernumber')) {


                if (strpos($_SERVER["HTTP_HOST"], 'uapp') > 0) {
                    // Creating new client having proxy
                    $client = new SoapClient($this->wsdl, array(
                        'proxy_host' => "isa4",
                        'proxy_port' => 8080,
                        'trace' => true,
                        'exceptions' => true));
                } else {
                    // Creating new client without proxy

                    $client = new SoapClient($this->wsdl, array('trace' => true, 'exceptions' => true));

                }


                //print_r($InputParametersOfRegister);
                $OutputParametersOfRegister = $client->__call('Register', array("parameters" =>
                        $InputParametersOfRegister));
                //   $this->RegisterRequest();


                // RegisterResult
                $RegisterResult = $OutputParametersOfRegister->RegisterResult;

                $terminal_parameters = "?merchantId=" . $this->merchantId . "&transactionId=" .
                    $RegisterResult->TransactionId;
                $process_parameters = "?transactionId=" . $RegisterResult->TransactionId;
                $Customer_refno = $order_id;
                $Amount_string = $amount / 100;

                $terminalform = "$this->terminal$terminal_parameters";
                $this->set(compact('terminalform', 'Amount_string', 'Customer_refno'));
                $this->redirect($terminalform);

            } else {
                $this->redirect('/neworders/wizard/bank_confirmation');
            }


        }

        catch (SoapFault $fault) {

            $this->Session->setFlash(__('
Transaction is not successful ! '));
            $this->redirect('/neworders/wizard/bank_confirmation');
            echo "</pre>";
        }

    }


    //caling query////////

    public function callingquery()
    {

        //require_once("Responsive/Parameters.php");

        $path_parts = pathinfo($_SERVER["PHP_SELF"]);

        App::import('Vendor', 'ClassQueryRequest', array('file' =>
                'nets/responsive/ClassQueryRequest.php'));


        if (isset($_GET['transactionId'])) {
            $transactionId = $_GET['transactionId'];
        }
        if (isset($_POST['transactionId'])) {
            $transactionId = $_POST['transactionId'];
        }

        $responseCode = "";
        if (isset($_GET['responseCode'])) {
            //echo  $responseCode = $_GET['responseCode'];
        }

        if (isset($_POST['responseCode'])) {
            $responseCode = $_POST['responseCode'];
        }
        echo $this->token;

        //echo "<h3><font color='gray'>Input parameters:</font></h3>";

        //echo "merchantId= " . $merchantId . "<br/>";
        //echo "token= " . $token . "<br/>";
        //echo "transactionId= " . $transactionId . "<br/>";


        ####  QUERY OBJECT  ####
        $QueryRequest = new QueryRequest($transactionId);

        ####  ARRAY WITH QUERY PARAMETERS  ####
        $InputParametersOfQuery = array(
            "token" => $this->token,
            "merchantId" => $this->merchantId,
            "request" => $QueryRequest,
            "TransactionId" => $transactionId);


        ####  START QUERY CALL  ####
        try {
            if (strpos($_SERVER["HTTP_HOST"], 'uapp') > 0) {
                // Creating new client having proxy
                $client = new SoapClient($this->wsdl, array(
                    'proxy_host' => "isa4",
                    'proxy_port' => 8080,
                    'trace' => true,
                    'exceptions' => true));
            } else {
                // Creating new client without proxy
                $client = new SoapClient($this->wsdl, array('trace' => true, 'exceptions' => true));
            }
            // print_r($InputParametersOfQuery [ "TransactionId"] );
            @$OutputParametersOfQuery = $client->__call('Query', array("parameters" => $InputParametersOfQuery));


            // $this->loadModel('Orders');
            //$this->Session->write('Config.date',date('m.d.y'));
            print_r($orders['sender_paid_at'] = $this->Session->read('Config.date'));

            $orders['peymentstatus'] = 'Paid';

            $sender_id = $this->Session->read('Config.sender_id');
            $receiver_id = $this->Session->read('Config.receiver_id');
            $ordernumber = $this->Session->read('Config.ordernumber');

            print_r($this->Session->read('Wizard.neworders.general.priority_sender'));

            if (isset($sender_id) and isset($receiver_id) and isset($ordernumber)) {


                $this->Orders->sender_id = $sender_id;
                $this->Orders->receiver_id = $receiver_id;


                $conditions = array('Orders.sender_id' => $sender_id, 'Orders.receiver_id' => $receiver_id);

                $this->Orders->updateAll(array(
                    'Orders.peyment_status' => '"' . $orders['peymentstatus'] . '"',

                    'Orders.nets_transaction_id' => '"' . $transactionId . '"',

                    'Orders.sender_paid_at' => '"' . date('Y - m - d') . '"',

                    //fields to update
                    'Orders.order_id' => $this->Session->read('Config.ordernumber'),

                    'Orders.rate' => '"' . $this->Session->read('Wizard.neworders.general.priority_sender') .
                        '"'), $conditions //condition
                    );

                $this->Session->destroy();
                
                $this->Session->setFlash(__('
                                                Transaction is was successful ! '));

                $this->redirect("/neworders/wizard/finish");
                

            } else {
                $this->Session->setFlash(__('
                                                Transaction is not successful ! '));

                $this->redirect("/neworders/wizard/bank_confirmation");

            }


        } // End try
        catch (SoapFault $fault) {
            ## Do some error handling in here...
            $this->Session->setFlash(__('
Transaction is not successful ! '));
            $this->redirect("/neworders/wizard/bank_confirmation");
        } // End catch
        ####  END   QUERY CALL  ####


    }


    function QueryRequest($TransactionId)
    {
        $this->TransactionId = $TransactionId;
        return ($this);

    }

    function saveupdate()
    {


    }


}
