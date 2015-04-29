<?php

App::uses('Sanitize', 'Utility');

class NewOrdersController extends AppController
{

    var $name = 'neworders';
    public $codev;
    var $components = array('Wizard');
    var $helpers = array('Wizard');
    var $uses = array(
        'WizardForm',
        'Currency',
        'Country',
        'Sender',
        'NewCustomer',
        'Receiver',
        'Summary',
        'Payment',
        'Orders');


    function beforeFilter()
    {

        $this->Wizard->steps = array(
            'general',
            'sender',
            'verification',
            'receiver',
            'summary',
            'payment',
            array('bank' => array(
                    'bank_confirmation',
                    'bank_receipt',
                    'finish'), 'cash' => array('cash_confirmation', 'finish')));

        $this->Auth->allow('wizard');
    }

    function wizard($step = null, $transactionId = null)
    {

        $this->request->data = Sanitize::clean($this->request->data);


        /**
         * sets vars before form render
         */
        //$this->Session->destroy() ;


        //print_r($this->Session->read('Wizard.neworders'));
        //print_r($this->Session->read('Config.receiver_id'));
        //print_r( $this->Session->read());

        // echo $this->Session->read('sender.last_Name');
        // print_r( $this->Session->read('Wizard.neworders.payment.Payment.paymentMethod'));
        //print_r( $this->Session->read('Wizard.neworders.general.WizardForm.totalamount'));


        //	print_r( $codev ) ;

        //print_r($this->Session->read('Wizard.neworders.general.country_receiver'));

        switch ($step) {

            case 'general':


                //$this->redirect("/wizard_forms/wizard/finish");
                $this->set('title_for_layout', ' Wizard form - ' . $step);

                // currency
                $currencies = $this->Currency->find('all');
                $siteCurrency = array_search('SEK', $currencies);
                // country
                $originCountries = $destinationCountries = $this->Country->find('list');
                $siteCountry = array_search('Sweden', $originCountries);
                // set
                $this->loadModel("Country");

                $Country = $this->Country->find('all');

                $this->Session->write($this->data);
                $this->set(compact('currencies', 'originCountries', 'siteCurrency',
                    'siteCountry', 'destinationCountries', 'Country'));
                break;

            case 'sender':


                $this->set('title_for_layout', ' Wizard form - ' . $step);
                break;

            case 'verification':


                $this->set('title_for_layout', ' Wizard form - ' . $step);

                $postalcodev = $this->Session->read('Wizard.neworders.sender.Sender.postal_code_sender');
                $daycodev = $this->Session->read('Wizard.neworders.sender.Sender.dob_sender.day');


                $postalcodev = substr($postalcodev, -2, 2);

                $codev2 = $codev = $postalcodev + $daycodev;


                $codev = Security::hash($codev, 'md5', true);

                $this->set(compact('codev', 'codev2'));


                break;

            case 'receiver':

                $countryname = $this->Session->read('Wizard.neworders.general.country_receiver');

                $this->set(compact('countryname'));
                $this->set('title_for_layout', ' Wizard form - ' . $step);
                break;


            case 'summary':
                $this->set('title_for_layout', ' Wizard form - ' . $step);

                // fields
                $fields = $this->Wizard->read();
                // currency
                $currencies = $this->Currency->find('list');
                $siteCurrency = array_search('SEK', $currencies);
                // country
                $originCountries = $destinationCountries = $this->Country->find('list');
                $siteCountry = array_search('Sweden', $originCountries);
                // set

                $this->set(compact('fields', 'currencies', 'originCountries', 'siteCurrency',
                    'siteCountry', 'destinationCountries'));


                break;

            case 'payment':

                $this->set('title_for_layout', ' Wizard form - ' . $step);
                break;

            case 'bank_confirmation':
                $this->set('title_for_layout', ' Wizard form - ' . $step);
                $fields = $this->Wizard->read();
                $this->set(compact('fields'));
                //echo 'salam';
                //$this->Session->destroy() ;

                break;


            case 'bank_confirmation':

                $this->set('title_for_layout', ' Wizard form - pay');
                break;

            case 'finish':

                //$orders['sender_paid_at'] = $this->Session->read( 'Config.date' )  ;
                //$orders['peymentstatus'] = 'Waspaid' ;


                $this->Session->destroy();

                $this->Session->setFlash(__('The transaction was successful.'));


                print_r($transactionId);


        }

        // wizard init

        $this->Wizard->process($step);
        // print_r($this->Receiver);


    }

    /**
     * [Wizard Process Callbacks]
     */

    function _processGeneral()
    {
        $this->WizardForm->set($this->request->data);
        return $this->WizardForm->validates();
    }

    function _processSender()
    {

        $this->WizardForm->set($this->request->data);
        return $this->WizardForm->validates();
    }

    function _processVerification()
    {
        $this->NewCustomer->set($this->request->data);
        return true;


        // $this->NewCustomer->save();
    }

    function _processReceiver()
    {
        $this->Receiver->set($this->request->data);
        return $this->Receiver->validates();
    }

    function _processSummary()
    {
        $this->Summary->set($this->request->data);
        return $this->Summary->validates();
    }

    // branch switch
    function _processPayment()
    {
        $this->Payment->set($this->request->data);

        if ($this->Payment->validates()) {

            $fields = $this->Wizard->read();

            echo $order['Order'] = reset($fields['general']);
            $code = @reset($fields['verification']['NewCustomer']['code1']);
            echo @$order['Orders'] = array_merge($order['Orders'], $code);

            print_r($code);

            $code['code1'] = rand(0, 100000) * 10 + 1 + $code['code1'];

            $fields['sender']['Sender']['dob_sender'] = @implode(' / ', $fields['sender']['Sender']['dob_sender']);

            $fields['sender']['Sender']['verification_code'] = $this->Session->read('Wizard.neworders.verification.NewCustomer.code');


            $fields['sender']['Sender']['verification_code'] = $this->Session->read('Wizard.neworders.verification.NewCustomer.code');

            $fields['sender']['Sender']['country_receiver'] = $this->Sender->save($fields['sender']);

            $this->Receiver->save($fields['receiver']);

            $this->loadModel('Sender', 'Receiver');
            //$post_id=$this->Sender->getLastInsertId();


            $orders['Orders']['sender_id'] = $this->Sender->query(" SELECT MAX(id) 
                                                        FROM `senders`");

            $orders['Orders']['receiver_id'] = $this->Receiver->query(" SELECT MAX(id) 
                                                        FROM `receivers`");

            $receiver_id = $orders['Orders']['receiver_id'][0][0]['MAX(id)'];

            $sender_id = $orders['Orders']['sender_id'][0][0]['MAX(id)'];

            // $this->Session->write( $peyment) ;
            $order = array('Orders' => array(
                    'sender_id' => $receiver_id,
                    'receiver_id' => $sender_id,
                    'currency_sender' => 'SEK',
                    'amount_sender' => $this->Session->read('Wizard.neworders.general.WizardForm.totalamount'),
                    'fee' => $this->Session->read('Wizard.neworders.general.WizardForm.expeditionfee'),

                    'order_id' => $code['code1'],
                    'payment_status' => 'notpaid',

                    'payment_method_sender' => $this->request->data['Payment']['paymentMethod']));

            $this->Session->write('Config.sender_id', $order['Orders']['sender_id']);
            $this->Session->write('Config.receiver_id', $order['Orders']['receiver_id']);

            $this->Session->write('Config.ordernumber', $code['code1']);


            $order['Orders']['paymentStatus'] = '0';
            $this->Session->write('Config.date', date('Y - m - d'));

            $this->Orders->save($order);

            // branch
            $peyment = $this->request->data['Payment']['paymentMethod'];
            //$this->Session->Delete( 'Wizard.neworders.payment.Payment.paymentMethod' ) ;
            $this->Session->write('Wizard.neworders.payment.Payment.paymentMethod', $peyment);
            $s = $this->Session->read('Wizard.neworders.payment.Payment.paymentMethod');
            echo $s;
            if ($s == 'cash') {
                $this->Redirect('cash_confirmation');
                //return false ;
            } else {
                $this->Wizard->branch('bank');

                // return true ;
            }

            return true;
        } else {
            return false;
        }
    }

    // branch bank
    function _processBankConfirmation()
    {
        $fields = $this->Wizard->read();
        $code = @reset($fields['verification']);

        $order = $this->Order->find('first', array('conditions' => array('code' => $code['code'])));

        @$this->Order->read(null, $order['Order']['id']);

        if ($this->request->data['Response']['response'] == 'ok') {
            $this->Order->set(array('paymentStatus' => 'paid'));
        } else {
            $this->Order->set(array('paymentStatus' => 'canceled'));
        }


        $this->Order->save();

        return true;

    }

    function _processReceipt()
    {
        return true;
    }
    //- end branch bank

    // branch cash
    function _processCashConfirmation()
    {
        return true;
    }
    function cash_confirmation()
    {
        return true;
    }
    //- end branch cash

    /**
     * [Wizard Completion Callback]
     */
    function _afterComplete()
    {
        die;
    }


}
