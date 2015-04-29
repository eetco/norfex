<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
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
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
//	Router::connect('/', array('controller' => 'pages', 'action' => 'index', 'index'));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
//	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
/**
 * Static pages routing occurs here rates, 
 *
 *
 *
*/
Router::connect('/', array('controller' => 'pages', 'action' => 'home', 'home'));
	Router::connect('/rates', array('controller' => 'pages', 'action' => 'rates', 'rates'));
	Router::connect('/order', array('controller' => 'pages', 'action' => 'order', 'order'));
	Router::connect('/services', array('controller' => 'pages', 'action' => 'services', 'services'));
	Router::connect('/login', array('controller' => 'pages', 'action' => 'login', 'login'));
	Router::connect('/about', array('controller' => 'pages', 'action' => 'about', 'about'));
	Router::connect('/contact', array('controller' => 'pages', 'action' => 'contact', 'contact'));
    
Router::connect('/neworders', array('controller' => 'NewOrders', 'action' => 'wizard'   , 'neworders'));
Router::connect('/', array('controller' => 'pages', 'action' => 'home'));
    Router::connect('/pay', array('controller' => 'pay', 'action' => 'home', 'home'),array('amount_sender'=>'[a-z]+[A-Z]'));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
